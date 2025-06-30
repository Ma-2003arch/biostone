@extends('layout.main')

@section('content')
<div class="container py-5">
    <h1>Modifier l'actualité</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('content.update', $content) }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" id="title" class="form-control" 
                   value="{{ old('title', $content->title) }}" required>
            @error('title')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" rows="5" class="form-control" required>{{ old('description', $content->description) }}</textarea>
            @error('description')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="publish_date" class="form-label">Date de publication</label>
            <input type="date" name="publish_date" id="publish_date" class="form-control"
                   value="{{ old('publish_date', $content->publish_date->format('Y-m-d')) }}" required>
            @error('publish_date')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image (optionnel)</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($content->file_path)
                <p class="mt-2">Image actuelle :</p>
                <img src="{{ asset('storage/' . $content->file_path) }}" alt="Image actuelle" style="max-width: 300px; border-radius: 8px;">
            @endif
            @error('image')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('content.liste') }}" class="btn btn-secondary ms-2">Annuler</a>
    </form>
</div>
@endsection
