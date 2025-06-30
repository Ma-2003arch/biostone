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
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
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
            background: rgba(0, 0, 0, 0.7);
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
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
            background: #f8f9fa;
            border-radius: 12px;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            justify-content: flex-end;
        }
    </style>

    <div class="main-layout">
        <header class="bg-white shadow-sm">
            <!-- Votre header existant -->
        </header>

        <main class="flex-grow-1">
            <div class="container py-5">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center bg-white shadow-sm rounded p-4 mb-5 border-start border-5 border-success" style="gap: 1rem;">
                    <h1 class="h3 fw-semibold text-success mb-3 mb-md-0" style="font-family: 'Georgia', serif; line-height: 1.3;">
                        Vos défis agricoles, nos solutions innovantes —<br>
                        Toute l'actualité BioStone, de la terre à la réussite.<br>
                        <small class="text-muted fst-italic">Le journal de notre aventure agricole</small>
                    </h1>
                    <a href="{{ route('emails.form') }}" class="btn btn-success btn-lg shadow-sm d-flex align-items-center gap-2">
                        <i class="bi bi-envelope-fill fs-4"></i> Contactez-nous
                    </a>
                </div>


                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif




                @if($contents->isEmpty())
                    <div class="empty-state">
                        <i class="bi bi-newspaper" style="font-size: 3rem; color: #6c757d;"></i>
                        <h3 class="h5 mt-3">Aucune actualité disponible</h3>
                        <p class="text-muted">Commencez par ajouter votre première actualité</p>
                        <a href="{{ route('content.ajouter') }}" class="btn btn-success mt-3">
                            <i class="bi bi-plus-circle me-2"></i> Ajouter une actualité
                        </a>
                    </div>
                @else
                    <section aria-labelledby="articles-heading" class="mt-4">
                        <div class="row g-4">
                            @foreach($contents as $content)
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        @if($content->file_path)
                                            <img src="{{ asset("storage/$content->file_path") }}" class="card-img-top"
                                                alt="{{ $content->title }}">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $content->title }}</h5>
                                            <p class="card-text">{{ Str::limit($content->description, 100) }}</p>
                                            <p class="text-muted small">
                                                Publié le {{ $content->publish_date->format('d/m/Y') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>

                    <!-- Pagination -->
                    @if($contents->hasPages())
                        <nav aria-label="Pagination" class="mt-5">
                            <ul class="pagination justify-content-center">
                                {{ $contents->links() }}
                            </ul>
                        </nav>
                    @endif
                @endif
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Animation des cartes
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

            // Gestion des messages flash
            setTimeout(() => {
                const alert = document.querySelector('.alert');
                if (alert) {
                    alert.style.transition = 'opacity 1s ease';
                    alert.style.opacity = 0;
                    setTimeout(() => alert.remove(), 1000);
                }
            }, 5000);
        });
    </script>
@endsection