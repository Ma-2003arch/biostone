<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $content->exists ? 'Modifier' : 'Créer' }} le contenu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .content-card {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
        }
        .file-preview {
            max-width: 100%;
            margin-top: 10px;
        }
        .current-file {
            background-color: #f8f9fa;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
        }
        .form-container {
            max-width: 800px;
        }
        .invalid-feedback.d-block {
            display: block !important;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-4">
        <div class="row justify-content-center">
            <!-- Messages flash -->
            @if(session('status'))
                <div class="col-lg-8">
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="col-lg-8">
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif

            <!-- Erreurs de validation -->
            @if($errors->any()))
                <div class="col-lg-8">
                    <div class="alert alert-danger">
                        <h5><i class="bi bi-exclamation-octagon"></i> Erreurs de validation</h5>
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Carte principale -->
            <div class="col-lg-8">
                <div class="card content-card">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="h4 mb-0"><i class="bi bi-pencil-square"></i> 
                                {{ $content->exists ? 'Modifier le contenu' : 'Créer un nouveau contenu' }}
                            </h2>
                            <a href="{{ route('content.liste') }}" class="btn btn-light btn-sm">
                                <i class="bi bi-arrow-left"></i> Retour
                            </a>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ $content->exists ? route('content.update', $content->id) : route('content.store') }}" 
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            @if($content->exists)
                                @method('PUT')
                            @endif
                            
                            <!-- Catégorie -->
                            <div class="mb-3">
                                <label for="category" class="form-label fw-bold">Catégorie <span class="text-danger">*</span></label>
                                <select name="category" id="category" class="form-select @error('category') is-invalid @enderror" required>
                                    <option value="">-- Sélectionnez --</option>
                                    @foreach(['article' => 'Article', 'news' => 'Actualité', 'tutorial' => 'Tutoriel'] as $value => $label)
                                        <option value="{{ $value }}" 
                                            {{ old('category', $content->category) == $value ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Fichier -->
                            <div class="mb-3">
                                <label for="file" class="form-label fw-bold">Fichier {{ !$content->exists ? '<span class="text-danger">*</span>' : '' }}</label>
                                
                                @if($content->exists && $content->file_path)
                                    <div class="current-file">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-file-earmark-text fs-4 me-2"></i>
                                            <div>
                                                <p class="mb-1 fw-bold">Fichier actuel :</p>
                                                <a href="{{ Storage::url($content->file_path) }}" target="_blank" class="text-decoration-none">
                                                    {{ basename($content->file_path) }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" name="remove_file" id="remove_file" value="1">
                                            <label class="form-check-label text-danger" for="remove_file">
                                                <i class="bi bi-trash"></i> Supprimer ce fichier
                                            </label>
                                        </div>
                                    </div>
                                @endif
                                
                                <input type="file" name="file" id="file" 
                                       class="form-control @error('file') is-invalid @enderror"
                                       {{ !$content->exists ? 'required' : '' }}>
                                <div class="form-text">Formats acceptés : JPEG, PNG, PDF, DOC (Max 2MB)</div>
                                @error('file')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Titre -->
                            <div class="mb-3">
                                <label for="title" class="form-label fw-bold">Titre <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" 
                                       class="form-control @error('title') is-invalid @enderror"
                                       value="{{ old('title', $content->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold">Description <span class="text-danger">*</span></label>
                                <textarea name="description" id="description" rows="5"
                                          class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $content->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Date de publication -->
                            <div class="mb-3">
                                <label for="publish_date" class="form-label fw-bold">Date de publication</label>
                                <input type="date" name="publish_date" id="publish_date"
                                       class="form-control @error('publish_date') is-invalid @enderror"
                                       value="{{ old('publish_date', $content->publish_date ? \Carbon\Carbon::parse($content->publish_date)->format('Y-m-d') : '') }}">
                                @error('publish_date')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Statut de publication -->
                            <div class="mb-3 form-check form-switch">
                                <input type="checkbox" name="is_published" id="is_published" 
                                       class="form-check-input @error('is_published') is-invalid @enderror"
                                       {{ old('is_published', $content->is_published) ? 'checked' : '' }}>
                                <label class="form-check-label fw-bold" for="is_published">Publier ce contenu</label>
                                @error('is_published')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Boutons -->
                            <div class="d-flex justify-content-between pt-3 border-top">
                                <button type="reset" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-counterclockwise"></i> Réinitialiser
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle"></i> {{ $content->exists ? 'Mettre à jour' : 'Enregistrer' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Affichage du nom du fichier sélectionné
        document.getElementById('file').addEventListener('change', function(e) {
            if (this.files.length > 0) {
                const fileName = this.files[0].name;
                const filePreview = document.createElement('div');
                filePreview.className = 'file-preview alert alert-info mt-2';
                filePreview.innerHTML = `<i class="bi bi-file-earmark"></i> Fichier sélectionné : ${fileName}`;
                
                // Supprime l'ancien aperçu s'il existe
                const oldPreview = document.querySelector('.file-preview');
                if (oldPreview) oldPreview.remove();
                
                this.parentNode.appendChild(filePreview);
            }
        });

        // Gestion de la suppression de fichier
        document.getElementById('remove_file')?.addEventListener('change', function() {
            if (this.checked) {
                alert('Le fichier actuel sera supprimé après enregistrement');
            }
        });
    </script>
</body>
</html>