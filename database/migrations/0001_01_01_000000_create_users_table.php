<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Suppression des tables dans le bon ordre
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('role_user'); // Table pivot
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');

        // Création de la table roles
        Schema::create('roles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->timestamps();
        });

        // Création de la table users (sans role_id)
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 100)->index();
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->rememberToken();

            $table->boolean('is_admin')
                ->default(false)
                ->index()
                ->comment('Détermine si l\'utilisateur a des droits administrateur');
            $table->timestamps();
        });

        // Création de la table pivot role_user
        Schema::create('role_user', function (Blueprint $table) {
            $table->uuid('user_id');
            $table->uuid('role_id');
            $table->primary(['user_id', 'role_id']);

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
        });

        // Création de la table sessions
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignUuid('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }
};
