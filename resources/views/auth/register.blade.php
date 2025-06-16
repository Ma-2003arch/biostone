<x-guest-layout>
    <!-- Logo BIO STONE -->
    <div class="flex justify-center mt-10">
        <img src="{{ asset('images/logo1.jpg') }}" alt="Logo Bio Stone"
             class="h-24 w-24 rounded-full shadow-xl ring-2 ring-green-600">
    </div>

    <!-- Titre -->
    <h2 class="text-center text-3xl font-extrabold text-green-600 mt-6">Créer un compte</h2>
    <p class="text-center text-sm text-gray-500 mb-6">Inscrivez-vous pour rejoindre Bio Stone</p>

    <!-- Formulaire d'inscription -->
    <form method="POST" action="{{ route('register') }}"
          class="max-w-md mx-auto bg-white p-8 rounded-2xl shadow-lg mt-4 border border-green-600">
        @csrf

        <!-- Nom -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Nom complet')" />
            <x-text-input id="name" type="text" name="name"
                          class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Adresse e-mail')" />
            <x-text-input id="email" type="email" name="email"
                          class="mt-1 block w-full" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Mot de passe -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Mot de passe')" />
            <x-text-input id="password" type="password" name="password"
                          class="mt-1 block w-full" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmation mot de passe -->
        <div class="mb-6">
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />
            <x-text-input id="password_confirmation" type="password" name="password_confirmation"
                          class="mt-1 block w-full" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <a href="{{ route('login') }}" class="text-sm text-green-600 hover:underline">
                Vous avez déjà un compte ?
            </a>

            <x-primary-button class="bg-green-600 hover:bg-green-700 w-full sm:w-auto justify-center">
                {{ __('Créer un compte') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
