<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    const STORAGE_PATH = 'public/images';
    const ALLOWED_FILE_TYPES = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    const MAX_FILE_SIZE = 2048; // 2MB in KB

    public function liste_content()
    {
        $contents = Content::latest()->paginate(10);
        return view('content.liste', compact('contents'));
    }

    public function ajouter_content()
    {
        return view('content.ajouter');
    }

    public function ajouter_content_traitement(StoreContentRequest $request)
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $data['file_path'] = $this->storeFile($request->file('image'));
            }

            Content::create($data);

            return redirect()->route('content.liste')
                ->with('success', 'Contenu ajouté avec succès');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Erreur: ' . $e->getMessage());
        }
    }

    public function edit(Content $content)
    {
        return view('content.edit', compact('content'));
    }

    public function update(UpdateContentRequest $request, Content $content)
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $this->deleteFile($content->file_path);
                $data['file_path'] = $this->storeFile($request->file('image'));
            }

            $content->update($data);

            return redirect()->route('content.liste')
                ->with('success', 'Contenu mis à jour');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Erreur: ' . $e->getMessage());
        }
    }

    public function destroy(Content $content)
    {
        try {
            $this->deleteFile($content->file_path);
            $content->delete();

            return redirect()->route('content.liste')
                ->with('success', 'Contenu supprimé');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur: ' . $e->getMessage());
        }
    }

    protected function storeFile($file): string
    {
        $extension = strtolower($file->getClientOriginalExtension());

        if (!in_array($extension, self::ALLOWED_FILE_TYPES)) {
            throw new \Exception('Type de fichier non autorisé');
        }

        if ($file->getSize() > self::MAX_FILE_SIZE * 1024) {
            throw new \Exception('Fichier trop volumineux (>2MB)');
        }

        // Stocke dans storage/app/public/images
        $fileName = Str::uuid() . '.' . $extension;
        $file->storeAs(self::STORAGE_PATH, $fileName); // STORAGE_PATH = 'public/images'

        // Retourne juste 'images/uuid.jpg' (sans 'public/')
        return 'images/' . $fileName;
    }
}
