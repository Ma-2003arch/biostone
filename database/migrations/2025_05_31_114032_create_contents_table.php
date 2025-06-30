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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Titre du contenu
            $table->text('description'); // Description détaillée
            $table->string('file_path')->nullable(); // Changé 'image' en 'file_path' pour refléter les différents types de fichiers
            $table->string('file_type')->nullable(); // Nouveau champ pour stocker le type de fichier (image, pdf, doc, etc.)
            $table->date('publish_date')->nullable(); // Date de publication (rendue nullable)
            // Catégorie (article, news, tutorial)
            $table->timestamps(); // created_at et updated_at

            // Index pour améliorer les performances
           
            $table->index('publish_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
