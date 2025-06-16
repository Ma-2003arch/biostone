@extends('layout.main')
@section('content')

    <style>
        .card-hover-effect {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
            border: none;
        }
        .card-hover-effect:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .img-container {
            height: 220px;
            overflow: hidden;
            position: relative;
        }
        .img-container img {
            object-fit: cover;
            width: 100%;
            height: 100%;
            transition: transform 0.5s ease;
        }
        .card-hover-effect:hover .img-container img {
            transform: scale(1.05);
        }
        .badge-custom {
            background: rgba(0,0,0,0.7);
            backdrop-filter: blur(10px);
            position: absolute;
            top: 15px;
            right: 15px;
            z-index: 2;
        }
        .content-date {
            font-size: 0.85rem;
            color: #6c757d;
        }
        .content-title {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 3em;
        }
        .content-excerpt {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            color: #6c757d;
            min-height: 4.5em;
        }
        .btn-floating {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            z-index: 1000;
        }
    </style>
</head>
<body class="main-layout">
    <header class="bg-white shadow-sm">
        <!-- Votre header existant -->
    </header>

    <main class="flex-grow-1">
        <div class="container py-5">
            <section class="hero-section hero-bg-green text-white rounded-4 p-4 p-md-5 mb-5">
                <!-- Hero section existante -->
            </section>

            <!-- Nouveau bouton flottant pour mobile + bouton desktop -->
            <a href="{{ route('content.ajouter') }}" class="btn btn-success d-none d-md-inline-flex align-items-center">
                <i class="bi bi-plus-circle me-2"></i> Ajouter une actualité
            </a>
            <a href="{{ route('content.ajouter') }}" class="btn-floating btn-success d-md-none">
                <i class="bi bi-plus"></i>
            </a>

            <section aria-labelledby="articles-heading" class="mt-4">
                <div class="row g-4">
                    @foreach($contents as $content)
                    <article class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card card-hover-effect h-100">
                            <div class="img-container">
                                @if($content->image)
                                    <img src="{{ asset('storage/' . $content->file_path) }}" class="img-fluid mb-2" alt="Image du contenu"> 
                                         class="img-fluid" 
                                         alt="{{ $content->title }}"
                                         loading="lazy">
                                @else
                                    <div class="h-100 w-100 bg-light d-flex align-items-center justify-content-center">
                                        <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                    </div>
                                @endif
                                <span class="badge badge-custom text-white px-3 py-2">
                                    <i class="bi bi-tag me-1"></i> {{ $content->category ?? 'Général' }}
                                </span>
                            </div>
                            
                            <div class="card-body">
                                <div class="content-date mb-2">
                                    <i class="bi bi-calendar me-1"></i> 
                                    {{ $content->created_at->format('d/m/Y') }}
                                </div>
                                <h3 class="h5 content-title mb-3">{{ $content->title }}</h3>
                                <p class="content-excerpt mb-4">{{ Str::limit($content->excerpt ?? $content->content, 150) }}</p>
                                
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </section>

            <!-- Pagination améliorée -->
            @if($contents->hasPages())
            <nav aria-label="Pagination" class="mt-5">
                <ul class="pagination justify-content-center">
                    {{ $contents->links() }}
                </ul>
            </nav>
            @endif
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animation au scroll
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card-hover-effect');
            
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
@endsection