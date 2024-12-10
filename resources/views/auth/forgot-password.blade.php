<x-guest-layout title="{{ $title }}">
    <div class="mb-4 text-sm text-gray-600">
        {{ __('auth.forgot.description') }}
    </div>

    <!-- Session Status -->
    @if(session('status'))
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="form-control form-control-xl" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('auth.forgot.reset_link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
