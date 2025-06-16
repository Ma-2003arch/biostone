<!-- resources/views/admin/dashboard.blade.php -->
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion de Contenu | Tableau de Bord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
        }
        
        body {
            background-color: #f8fafc;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 0.5rem;
            padding: 2rem;
            margin-bottom: 2rem;
        }
        
        .content-card {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border-radius: 0.75rem;
            transition: transform 0.3s ease;
            background: white;
        }
        
        .content-card:hover {
            transform: translateY(-5px);
        }
        
        .card-img-container {
            height: 200px;
            overflow: hidden;
            position: relative;
            background-color: #f1f5f9;
        }
        
        .card-img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
        
        .default-file-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            color: var(--primary-color);
            font-size: 3rem;
        }
        
        .category-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background-color: rgba(255, 255, 255, 0.9);
            color: var(--primary-color);
            font-weight: 600;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
        }
        
        .content-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }
        
        .btn-action {
            border-radius: 0.5rem;
            padding: 0.375rem 0.75rem;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <!-- Section Hero -->
        <div class="hero-section">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold mb-3">Tableau de Bord</h1>
                    <p class="lead mb-4">
                        Gérez vos contenus de manière efficace
                    </p>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-light text-primary me-2">
                            <i class="bi bi-stack"></i> {{ $contents->total() }} contenus
                        </span>
                    </div>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="{{ route('content.ajouter') }}" class="btn btn-light">
                        <i class="bi bi-plus-lg me-2"></i> Nouveau contenu
                    </a>
                </div>
            </div>
        </div>

        <!-- Grille de contenu -->
        <div class="content-grid">
            @foreach ($contents as $content)
            <div class="content-card">
                <div class="card-img-container">
                    @if($content->file_path)
                        @if(in_array(pathinfo($content->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'webp']))
                            <img src="{{ asset('storage/'.$content->file_path) }}" alt="{{ $content->title }}" class="card-img">
                        @else
                            <div class="default-file-icon">
                                <i class="bi bi-file-earmark-text"></i>
                            </div>
                        @endif
                    @else
                        <div class="default-file-icon">
                            <i class="bi bi-file-earmark"></i>
                        </div>
                    @endif
                    <span class="category-badge">{{ ucfirst($content->category) }}</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ Str::limit($content->title, 50) }}</h5>
                    <div class="text-muted small mb-2">
                        <i class="bi bi-calendar me-1"></i>
                        {{ \Carbon\Carbon::parse($content->publish_date)->isoFormat('D MMMM YYYY') }}
                    </div>
                    <p class="card-text text-secondary">{{ Str::limit($content->description, 100) }}</p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('content.edit', $content->id) }}" class="btn btn-outline-primary btn-action">
                            <i class="bi bi-pencil"></i> Éditer
                        </a>
                        <form action="{{ route('content.destroy', $content->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-action" onclick="return confirm('Confirmer la suppression ?')">
                                <i class="bi bi-trash"></i> Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($contents->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $contents->links() }}
        </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>