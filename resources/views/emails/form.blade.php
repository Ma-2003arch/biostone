<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Formulaire de contact vert</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Bootstrap Icons (optionnel) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
      body {
        background-color: #f8f9fa;
      }
      /* Formulaire tout vert */
      .main_form {
        max-width: 55%;
        background-color: #198754; /* vert bootstrap */
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 0 15px rgba(25, 135, 84, 0.5);
        color: white;
      }
      .main_form input,
      .main_form textarea {
        background-color: white; /* fond clair */
        border: 1px solid #198754;
        color: black;
      }
      .main_form input::placeholder,
      .main_form textarea::placeholder {
        color: #6c757d; /* gris bootstrap */
      }
      .main_form input:focus,
      .main_form textarea:focus {
        background-color: #d5dfd7; /* vert clair au focus */
        border-color: #155724;
        color: black;
        outline: none;
        box-shadow: none;
      }
      .main_form button {
        background-color: #145c32;
        border-color: #145c32;
        color: white;
        font-weight: 600;
        transition: background-color 0.3s ease;
      }
      .main_form button:hover {
        background-color: #0b4221;
        border-color: #0b4221;
      }
      h2 {
        color: white;
        text-align: center;
        margin-bottom: 1.5rem;
      }
    </style>
</head>
<body>

<div class="container mt-4">
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
</div>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <form class="main_form w-100" method="POST" action="{{ route('contact.store') }}">
    @csrf
    <h2>Contactez-nous</h2>
    <div class="mb-3">
      <input class="form-control" placeholder="Nom" type="text" name="Name" required>
    </div>
    <div class="mb-3">
      <input class="form-control" placeholder="Email" type="email" name="Email" required>
    </div>
    <div class="mb-3">
      <input class="form-control" placeholder="Téléphone" type="text" name="Phone">
    </div>
    <div class="mb-3">
      <textarea class="form-control" placeholder="Message" name="Message" rows="4" required></textarea>
    </div>
    <button class="btn w-100" type="submit">Envoyer</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
