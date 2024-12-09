<x-guest-layout title="{{ $title }}">
    <h1 class="auth-title">{{ __('auth.login.title') }}</h1>
    <p class="auth-subtitle mb-5">{{ __('auth.login.subtitle') }}</p>

    <!-- Session Status -->
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible show fade">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <form action="{{ route('login')}}" method="post">
        @csrf
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" class="form-control form-control-xl" name="name" value="{{old('name')}}" placeholder="{{ __('auth.login.form.name')}}" autofocus>
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" class="form-control form-control-xl" name="password" placeholder="{{ __('auth.login.form.password')}}">
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
        </div>
        <div class="form-check form-check-lg d-flex align-items-end">
            <input class="form-check-input me-2" type="checkbox" value="" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label text-gray-600" for="remember">
                {{ __('auth.login.remember_me')}}
            </label>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5" data-loading-text="{{ __('auth.login.form.loading') }}" onclick="this.innerHTML = `<div class='spinner'></div> ${this.getAttribute('data-loading-text')}`;">{{ __('auth.login.form.submit')}}</button>
    </form>
    <div class="text-center mt-5 text-lg fs-4">
        <p class="text-gray-600">{{ __('auth.login.dont_have_an_account')}} <a href="{{ route('register')}}" class="font-bold">{{ __('auth.register.title')}} </a>.</p>
        <p><a class="font-bold" href="{{ route('password.request')}}">{{ __('auth.forgot.title')}}?</a>.</p>
    </div>
</x-guest-layout>



{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
@csrf

<!-- Email Address -->
<div>
    <x-input-label for="email" :value="__('Email')" />
    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

<!-- Password -->
<div class="mt-4">
    <x-input-label for="password" :value="__('Password')" />

    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>

<!-- Remember Me -->
<div class="block mt-4">
    <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
    </label>
</div>

<div class="flex items-center justify-end mt-4">
    @if (Route::has('password.request'))
    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
        {{ __('Forgot your password?') }}
    </a>
    @endif

    <x-primary-button class="ml-3">
        {{ __('Log in') }}
    </x-primary-button>
</div>
</form>
</x-guest-layout> --}}
