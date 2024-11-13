<x-guest-layout>
    <div class="logo" style="text-align: center; margin-top:20px; margin-bottom:20px;">
        <img src="https://dorothygaynor.vtexassets.com/assets/vtex.file-manager-graphql/images/6845a0a7-4565-4154-9ecc-4c2c16434d78___4e4f9aec16b88809eba9c6c84f6a2645.png" alt="" style="display: block; margin: auto;">
    </div>
    <x-authentication-card>
        <h1 style="text-align: center; font-size: x-large; font-weight: bolder; margin-bottom:20px">Portal de reportes POS</h1>

        
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="user" style="margin-bottom: 50px; text-align:center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-circle icons" viewBox="0 0 16 16"  style="display: block; margin: auto;">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                  </svg>
                  <p>Iniciar Sesión</p>
            </div>

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Olvidé mi contraseña') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Iniciar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
