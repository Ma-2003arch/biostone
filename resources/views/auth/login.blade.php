<x-guest-layout>

    <!-- Titre -->
    <h2 class="text-center text-3xl font-extrabold text-gray-800 mt-6">Bienvenue chez Bio Stone</h2>
    <p class="text-center text-sm text-gray-500 mb-6">Veuillez vous connecter pour continuer</p>

    <!-- Formulaire -->
    <form method="POST" action="{{ route('login') }}"
          class="max-w-md mx-auto bg-white p-8 rounded-2xl shadow-lg mt-4 border border-gray-100">
       @csrf

        <!-- Statut de session -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Email -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Adresse e-mail')" />
            <x-text-input id="email" type="email" name="email"
                          class="mt-1 block w-full"
                          :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Mot de passe -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Mot de passe')" />
            <x-text-input id="password" type="password" name="password"
                          class="mt-1 block w-full"
                          required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Se souvenir de moi -->
        <div class="flex items-center justify-between mb-4">
            <label class="flex items-center">
                <input type="checkbox" name="remember" class="rounded text-green-600 border-gray-300 shadow-sm focus:ring-green-500">
                <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-green-600 hover:underline" href="{{ route('password.request') }}">
                    Mot de passe oublié ?
                </a>
            @endif
        </div>

        <!-- Bouton de connexion -->
        <div class="mb-6">
            <x-primary-button class="w-full justify-center bg-green-600 hover:bg-green-700">
                {{ __('Se connecter') }}
            </x-primary-button>
        </div>
        @auth
    <div class="fixed bottom-0 left-0 p-4 bg-yellow-100 text-xs">
        Debug: 
        User ID: {{ auth()->id() }}, 
        Is Admin: {{ auth()->user()->isAdmin() ? 'Yes' : 'No' }}
    </div>
@endauth

        <!-- Lien vers l'inscription -->
        <div class="text-center">
            <p class="text-sm text-gray-600">Pas encore de compte ?</p>
            <a href="{{ route('register') }}"
               class="mt-2 inline-flex items-center gap-2 px-5 py-2 bg-white text-green-600 border border-green-600 text-sm font-medium rounded-full shadow-sm hover:bg-green-50 transition duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                </svg>
                Créer un compte
            </a>
        </div>
    </form>
</x-guest-layout>
