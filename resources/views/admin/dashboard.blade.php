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
            --dark-color: #1e293b;
            --light-color: #f8fafc;
        }
        
        body {
            background-color: var(--light-color);
            font-family: 'Segoe UI', system-ui, sans-serif;
            color: var(--dark-color);
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 0.75rem;
            padding: 2.5rem;
            margin-bottom: 2.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .content-card {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            background: white;
            border: none;
            overflow: hidden;
        }
        
        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
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
            transition: transform 0.5s ease;
        }
        
        .content-card:hover .card-img {
            transform: scale(1.05);
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
            font-size: 0.75rem;
            text-transform: capitalize;
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
            transition: all 0.2s ease;
        }
        
        .btn-action i {
            margin-right: 0.25rem;
        }
        
        .stats-badge {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-size: 0.9rem;
        }
        
        .pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .pagination .page-link {
            color: var(--primary-color);
        }
        
        @media (max-width: 768px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
            
            .hero-section {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <!-- Section Hero -->
        <section class="hero-section">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold mb-3">Tableau de Bord</h1>
                    <p class="lead mb-4">
                        Gérez vos contenus de manière efficace et intuitive
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="stats-badge">
                            <i class="bi bi-stack"></i> {{ $contents->total() }} contenus
                        </span>
                    </div>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <a href="{{ route('content.ajouter') }}" class="btn btn-light btn-lg">
                        <i class="bi bi-plus-lg me-2"></i> Nouveau contenu
                    </a>
                </div>
            </div>
        </section>

        <!-- Grille de contenu -->
        <section class="content-grid mb-5">
            @forelse ($contents as $content)
            <article class="content-card">
                <div class="card-img-container">
                    @if($content->file_path)
                        @if(in_array(pathinfo($content->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'webp']))
                            <img src="{{ asset('storage/'.$content->file_path) }}" 
                                 alt="{{ $content->title }}" 
                                 class="card-img"
                                 loading="lazy">
                        @else
                            <div class="default-file-icon">
                                <i class="bi bi-file-earmark-text"></i>
                            </div>
                        @endif
                    @else
                        <div class="default-file-icon">
                            <i class="bi bi-image"></i>
                        </div>
                    @endif
                    <span class="category-badge">
                        <i class="bi bi-tag"></i> {{ $content->category }}
                    </span>
                </div>
                <div class="card-body">
                    <h3 class="card-title h5">{{ Str::limit($content->title, 50) }}</h3>
                    <div class="text-muted small mb-2 d-flex align-items-center">
                        <i class="bi bi-calendar me-1"></i>
                        <time datetime="{{ $content->publish_date }}">
                            {{ $content->publish_date ? \Carbon\Carbon::parse($content->publish_date)->isoFormat('D MMMM YYYY') : 'Non publié' }}
                        </time>
                    </div>
                    <p class="card-text text-muted">{{ Str::limit($content->description, 100) }}</p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('content.edit', $content->id) }}" 
                           class="btn btn-outline-primary btn-action"
                           title="Modifier">
                            <i class="bi bi-pencil"></i> Éditer
                        </a>
                        <form action="{{ route('content.destroy', $content->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-outline-danger btn-action"
                                    title="Supprimer">
                                <i class="bi bi-trash"></i> Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </article>
            @empty
            <div class="col-12">
                <div class="alert alert-info text-center py-4">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    Aucun contenu disponible. Commencez par 
                    <a href="{{ route('content.ajouter') }}" class="alert-link">ajouter un nouveau contenu</a>.
                </div>
            </div>
            @endforelse
        </section>

        <!-- Pagination -->
        @if($contents->hasPages())
        <nav aria-label="Pagination" class="mt-4">
            <ul class="pagination justify-content-center">
                {{ $contents->links() }}
            </ul>
        </nav>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Confirmation de suppression
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                if (confirm('Êtes-vous sûr de vouloir supprimer définitivement ce contenu ?')) {
                    this.submit();
                }
            });
        });

        // Animation au scroll
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.content-card');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });

            cards.forEach((card, index) => {
                card.style.opacity = 0;
                card.style.transform = 'translateY(20px)';
                card.style.transition = `opacity 0.5s ease ${index * 0.1}s, transform 0.5s ease ${index * 0.1}s`;
                observer.observe(card);
            });
        });
    </script>
</body>
</html>