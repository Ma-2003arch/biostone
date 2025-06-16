<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un contenu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .content-card {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
        }
        .required-field::after {
            content: " *";
            color: red;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-4">
        <div class="row justify-content-center">
            <!-- Messages flash -->
            @if(session('success'))
                <div class="col-lg-8">
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
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

            @if($errors->any())
                <div class="col-lg-8">
                    <div class="alert alert-danger">
                        <h5><i class="bi bi-exclamation-octagon"></i> Erreur de validation</h5>
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
                            <h2 class="h4 mb-0"><i class="bi bi-plus-circle"></i> Ajouter un contenu</h2>
                            <a href="{{ route('content.liste') }}" class="btn btn-light btn-sm">
                                <i class="bi bi-arrow-left"></i> Retour
                            </a>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ route('content.ajouter.traitement') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <!-- Catégorie -->
                            <div class="mb-3">
                                <label for="category" class="form-label fw-bold required-field">Catégorie</label>
                                <select name="category" id="category" class="form-select @error('category') is-invalid @enderror" required>
                                    <option value="">-- Sélectionnez --</option>
                                    <option value="article" {{ old('category') == 'article' ? 'selected' : '' }}>Article</option>
                                    <option value="news" {{ old('category') == 'news' ? 'selected' : '' }}>Actualité</option>
                                    <option value="tutorial" {{ old('category') == 'tutorial' ? 'selected' : '' }}>Tutoriel</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Titre -->
                            <div class="mb-3">
                                <label for="title" class="form-label fw-bold required-field">Titre</label>
                                <input type="text" name="title" id="title" 
                                       class="form-control @error('title') is-invalid @enderror"
                                       value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold required-field">Description</label>
                                <textarea name="description" id="description" rows="5"
                                          class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Image -->
                            <div class="mb-3">
                                <label for="image" class="form-label fw-bold required-field">Image</label>
                                <input type="file" name="image" id="image" 
                                       class="form-control @error('image') is-invalid @enderror" required
                                       accept="image/jpeg, image/png">
                                <div class="form-text">Formats acceptés: JPEG, PNG (Max 2MB)</div>
                                <div id="image-preview" class="mt-2 text-center"></div>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Date de publication -->
                            <div class="mb-3">
                                <label for="publish_date" class="form-label fw-bold">Date de publication</label>
                                <input type="date" name="publish_date" id="publish_date"
                                       class="form-control @error('publish_date') is-invalid @enderror"
                                       value="{{ old('publish_date', now()->format('Y-m-d')) }}">
                                @error('publish_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Boutons -->
                            <div class="d-flex justify-content-between pt-3 border-top">
                                <button type="reset" class="btn btn-outline-secondary">
                                    <i class="bi bi-x-circle"></i> Annuler
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Enregistrer
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
        // Aperçu de l'image sélectionnée
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('image-preview');
            
            if (file) {
                if (file.size > 2 * 1024 * 1024) {
                    alert('Le fichier est trop volumineux (max 2MB)');
                    e.target.value = '';
                    preview.innerHTML = '';
                    return;
                }

                if (!file.type.match('image.*')) {
                    alert('Seules les images sont acceptées');
                    e.target.value = '';
                    preview.innerHTML = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `
                        <div class="border p-2 rounded">
                            <img src="${e.target.result}" class="img-fluid" style="max-height: 200px;">
                            <div class="mt-2 small text-muted">${file.name} (${(file.size/1024).toFixed(1)} KB)</div>
                        </div>
                    `;
                }
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = '';
            }
        });

        // Définir la date par défaut à aujourd'hui
        document.addEventListener('DOMContentLoaded', function() {
            if (!document.getElementById('publish_date').value) {
                document.getElementById('publish_date').valueAsDate = new Date();
            }
        });
    </script>
</body>
</html>