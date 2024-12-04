<x-guest-layout>
    <h1 class="auth-title">{{ __('auth.register.title') }}</h1>
    <p class="auth-subtitle mb-5">{{ __('auth.register.subtitle') }}</p>

    <form action="{{ route('register')}}" method="post">
        @csrf
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="email" name="email" class="form-control form-control-xl  @error('email') is-invalid @enderror" placeholder="{{ __('auth.register.form.email') }}">
            <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
            </div>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" name="name" class="form-control form-control-xl @error('name') is-invalid @enderror" placeholder="{{ __('auth.register.form.username') }}">
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" name="full_name" class="form-control form-control-xl @error('full_name') is-invalid @enderror" placeholder="{{ __('auth.register.form.full_name') }}">
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
            @error('full_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" name="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="{{ __('auth.register.form.password') }}">
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" name="password_confirmation" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="{{ __('auth.register.form.password_confirmation') }}">
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
            @error('password_confirmation')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5" data-loading-text="{{ __('auth.register.form.loading') }}" onclick="this.innerHTML = `<div class='spinner'></div> ${this.getAttribute('data-loading-text')}`;">
            {{ __('auth.register.form.submit') }}
        </button>
    </form>

    <div class="text-center mt-5 text-lg fs-4">
        <p class='text-gray-600'>{{ __('auth.register.already_have_account') }} <a href="{{ route('login')}}" class="font-bold">{{ __('auth.login.title') }}</a>.</p>
    </div>
</x-guest-layout>
