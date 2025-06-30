<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    const STORAGE_DISK = 'public';
    const STORAGE_PATH = 'news';
    const ALLOWED_MIME_TYPES = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    const MAX_FILE_SIZE_KB = 2048; // 2MB

    /**
     * Affiche la liste des contenus
     */
    public function liste_content()
    {
        // Récupération des contenus paginés
        $contents = Content::query()
            ->orderBy('publish_date', 'desc')
            ->paginate(6);

        return view('content.liste', compact('contents'));
    }

    /**
     * Affiche le formulaire de création
     */
    public function ajouter_content()
    {
        return view('content.ajouter');
    }

    /**
     * Stocke un nouveau contenu
     */
    public function ajouter_content_traitement(StoreContentRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['file_path'] = $this->storeFile($request->file('image'));
            $data['file_type'] = 'image';
        }



        Content::create($data);

        return redirect()->route('content.liste')
            ->with('success', 'Contenu ajouté avec succès');
    }

    /**
     * Stocke un fichier uploadé de manière sécurisée
     */
    protected function storeFile($file): string
    {
        $this->validateFile($file);

        $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs(
            self::STORAGE_PATH,
            $fileName,
            ['disk' => self::STORAGE_DISK]
        );

        return $path;
    }

    /**
     * Valide le fichier uploadé
     */
    protected function validateFile($file): void
    {
        if (!$file->isValid()) {
            throw new \Exception('Le fichier est invalide ou corrompu');
        }

        if (!in_array($file->getMimeType(), self::ALLOWED_MIME_TYPES)) {
            throw new \Exception('Type de fichier non autorisé');
        }

        if ($file->getSize() > self::MAX_FILE_SIZE_KB * 1024) {
            throw new \Exception('La taille maximale est de ' . self::MAX_FILE_SIZE_KB . 'KB');
        }
    }

    /**
     * Supprime un fichier
     */
    protected function deleteFile(?string $filePath): bool
    {
        if (!$filePath) return false;

        if (Storage::disk(self::STORAGE_DISK)->exists($filePath)) {
            return Storage::disk(self::STORAGE_DISK)->delete($filePath);
        }

        return false;
    }

    /**
     * Affiche le formulaire d'édition
     */
    public function edit(Content $content)
    {
        return view('content.edit', compact('content'));
    }

    /**
     * Met à jour un contenu
     */
    public function update(UpdateContentRequest $request, Content $content)
    {
        $data = $request->validated();
        // @ver uploadfile|null $image

        if ($request->hasFile('image')) {
            $this->deleteFile($content->file_path);
            $data['file_path'] = $this->storeFile($request->file('image'));
            $data['file_type'] = 'image';
        };





        $content->update($data);
        if ($request->has('tag')) {
            $content->tags()->sync($request->validated('tag'));
        }

        return redirect()->route('content.liste')
            ->with('success', 'Contenu mis à jour avec succès');
    }

    /**
     * Supprime un contenu
     */
    public function destroy(Content $content)
    {
        $this->deleteFile($content->file_path);
        $content->delete();

        return redirect()->route('content.liste')
            ->with('success', 'Contenu supprimé avec succès');
    }
}
