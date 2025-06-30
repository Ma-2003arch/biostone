<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $teams = config('permission.teams');
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');
        $pivotRole = $columnNames['role_pivot_key'] ?? 'role_id';
        $pivotPermission = $columnNames['permission_pivot_key'] ?? 'permission_id';

        throw_if(empty($tableNames), new Exception('Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.'));
        throw_if($teams && empty($columnNames['team_foreign_key'] ?? null), new Exception('Error: team_foreign_key on config/permission.php not loaded. Run [php artisan config:clear] and try again.'));

        // Création de la table permissions en premier
        Schema::create($tableNames['permissions'], function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('name', 125)->comment('Nom technique de la permission');
            $table->string('guard_name', 125)->comment('Guard Laravel associé');
            $table->timestamps();

            $table->unique(['name', 'guard_name']);
        });

        // Création de model_has_permissions avec la bonne référence
        Schema::create($tableNames['model_has_permissions'], function (Blueprint $table) use ($tableNames, $columnNames, $pivotPermission) {
            $table->engine = 'InnoDB';

            $table->unsignedBigInteger($pivotPermission);
            $table->string('model_type', 125);
            $table->unsignedBigInteger($columnNames['model_morph_key']);

            // Correction: Ajout de la référence à la table permissions
            $table->foreign($pivotPermission)
                ->references('id')
                ->on($tableNames['permissions']) // Cette ligne était manquante
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->index([
                $columnNames['model_morph_key'],
                'model_type'
            ], 'model_has_permissions_model_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tableNames = config('permission.table_names');

        if (empty($tableNames)) {
            throw new \Exception('Error: config/permission.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
        }

        // Ordre inverse pour le drop
        Schema::dropIfExists($tableNames['role_has_permissions']);
        Schema::dropIfExists($tableNames['model_has_roles']);
        Schema::dropIfExists($tableNames['model_has_permissions']);
        Schema::dropIfExists($tableNames['roles']);
        Schema::dropIfExists($tableNames['permissions']);
    }
};
