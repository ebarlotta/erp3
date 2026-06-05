<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="flex d-flex col-12">
                <div class="col-8 pr-4" style="background-color: rgba(217, 218, 222, 0.343); border-radius: 10px 0 0 10px;">
                    <div style="margin-left: 10px; margin-bottom: 10px;">
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full h-10 pl-3" style="box-shadow: -5px -5px 9px rgba(255,255,255,0.45), 5px 5px 9px rgba(94,104,121,0.3) !important;" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div style="margin-left: 10px; margin-bottom: 10px;" class="mt-4">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full h-10 pl-3" style="box-shadow: -5px -5px 9px rgba(255,255,255,0.45), 5px 5px 9px rgba(94,104,121,0.3) !important;" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>

                    <div style="margin-left: 10px; margin-bottom: 10px;" class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full h-10 pl-3" style="box-shadow: -5px -5px 9px rgba(255,255,255,0.45), 5px 5px 9px rgba(94,104,121,0.3) !important;" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div style="margin-left: 10px; margin-bottom: 10px;" class="mt-4">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input id="password_confirmation" class="block mt-1 w-full h-10 pl-3" style="box-shadow: -5px -5px 9px rgba(255,255,255,0.45), 5px 5px 9px rgba(94,104,121,0.3) !important;" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required />

                                    <div class="ms-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                    @endif
                </div>
                <div class="col-4 d-none d-md-block">
                    <img src="{{ asset('images/register1.jpeg') }}" alt="Imagen" class="img-fluid h-100 w-100" style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;">
                </div>
            </div>

            <div class="flex items-center justify-beetwen mt-4">
                @if (Route::has('register'))
                    <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150 ms-4" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                @endif
                <a class="ml-4 underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>

            @push('scripts')
<style>
    #loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        backdrop-filter: blur(5px);
    }

    .loading-card {
        background: white;
        padding: 30px 40px;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 10px 40px rgba(0,0,0,0.3);
        animation: fadeInUp 0.3s ease;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .loader {
        width: 50px;
        height: 50px;
        border: 5px solid #f3f3f3;
        border-top: 5px solid #3498db;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: 0 auto 20px;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .loading-title {
        font-size: 18px;
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
    }

    .loading-subtitle {
        font-size: 14px;
        color: #666;
    }
</style>

<div id="loading-overlay">
    <div class="loading-card">
        <div class="loader"></div>
        <div class="loading-title">Creando tu cuenta</div>
        <div class="loading-subtitle">Esto puede tomar unos segundos...</div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const loadingOverlay = document.getElementById('loading-overlay');
        const submitButtons = form.querySelectorAll('button[type="submit"], .ms-4');

        form.addEventListener('submit', function(e) {
            // Mostrar overlay
            loadingOverlay.style.display = 'flex';

            // Deshabilitar todos los botones del formulario
            submitButtons.forEach(btn => {
                btn.disabled = true;
            });

            // Opcional: prevenir doble envío
            if (form.hasAttribute('data-submitting')) {
                e.preventDefault();
                return;
            }
            form.setAttribute('data-submitting', 'true');
        });
    });
</script>
@endpush
        </form>

    </x-authentication-card>
</x-guest-layout>
