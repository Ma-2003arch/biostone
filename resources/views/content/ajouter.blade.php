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
            border: none;
        }
        .required-field::after {
            content: " *";
            color: red;
        }
        .image-preview-container {
            max-height: 250px;
            overflow: hidden;
            border-radius: 8px;
            margin-top: 10px;
            display: none;
        }
        .image-preview {
            width: 100%;
            height: auto;
            object-fit: contain;
            border: 1px solid #dee2e6;
            border-radius: 4px;
        }
        .file-info {
            background-color: #f8f9fa;
            padding: 8px;
            border-radius: 4px;
            margin-top: 5px;
            font-size: 0.85rem;
        }
        .form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
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
            @if(session('success'))
                <div class="col-lg-8">
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="col-lg-8">
                    <div class="alert alert-danger alert-dismissible fade show">
                        <i class="bi bi-exclamation-triangle me-2"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="col-lg-8">
                    <div class="alert alert-danger alert-dismissible fade show">
                        <h5 class="d-flex align-items-center">
                            <i class="bi bi-exclamation-octagon me-2"></i> Erreur de validation
                        </h5>
                        <ul class="mb-0 ps-3">
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
                            <h2 class="h4 mb-0"><i class="bi bi-plus-circle me-2"></i> Ajouter un contenu</h2>
                            <a href="{{ route('content.liste') }}" class="btn btn-light btn-sm">
                                <i class="bi bi-arrow-left me-1"></i> Retour
                            </a>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('content.ajouter.traitement') }}" enctype="multipart/form-data" novalidate>
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label required-field">Titre</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" name="title" required 
                                       value="{{ old('title') }}">
                                @error('title')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label required-field">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="publish_date" class="form-label required-field">Date de publication</label>
                                <input type="date" class="form-control @error('publish_date') is-invalid @enderror" 
                                       id="publish_date" name="publish_date" required
                                       value="{{ old('publish_date', date('Y-m-d')) }}">
                                @error('publish_date')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                       id="image" name="image" accept="image/jpeg,image/png,image/gif,image/webp" 
                                       aria-describedby="imageHelp">
                                <small id="imageHelp" class="form-text text-muted">
                                    Formats acceptés: JPEG, PNG, GIF, WEBP (max 2MB)
                                </small>
                                @error('image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <div id="image-preview-container" class="image-preview-container mt-2">
                                    <img id="image-preview" class="image-preview" src="#" alt="Aperçu de l'image">
                                    <div id="file-info" class="file-info"></div>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Aperçu de l'image sélectionnée
        const imageInput = document.getElementById('image');
        const previewContainer = document.getElementById('image-preview-container');
        const preview = document.getElementById('image-preview');
        const fileInfo = document.getElementById('file-info');
        
        previewContainer.style.display = 'none';
        preview.src = '#';
        fileInfo.textContent = '';

        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            
            previewContainer.style.display = 'none';
            preview.src = '#';
            fileInfo.textContent = '';

            if (file) {
                if (file.size > 2 * 1024 * 1024) {
                    alert('Le fichier est trop volumineux (max 2MB)');
                    e.target.value = '';
                    return;
                }

                if (!file.type.match('image.*')) {
                    alert('Seules les images sont acceptées');
                    e.target.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.style.display = 'block';
                    fileInfo.textContent = `${file.name} (${(file.size / 1024).toFixed(1)} KB)`;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
