<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'login' => [
        'title' => 'Masuk',
        'subtitle' => 'Masuk dengan data yang Anda masukkan saat pendaftaran.',
        'form' => [
            'name' => 'Nama Pengguna',
            'password' => 'Kata Sandi',
            'submit' => 'Masuk',
            'loading' => 'Sedang memuat...',
        ],
        'remember_me' => 'Ingat saya',
        'dont_have_an_account' => 'Belum mempunyai akun?'
    ],

    'register' => [
        'title' => 'Daftar',
        'subtitle' => 'Masukkan data Anda untuk mendaftar di situs kami.',
        'form' => [
            'email' => 'Email',
            'username' => 'Nama Pengguna',
            'full_name' => 'Nama Lengkap',
            'password' => 'Kata Sandi',
            'password_confirmation' => 'Konfirmasi Kata Sandi',
            'submit' => 'Mendaftar',
            'loading' => 'Sedang memuat...',
        ],
        'already_have_account' => 'Sudah punya akun?',
    ],

    'forgot' => [
        'title' => 'Lupa kata sandi'
    ],

    'failed' => 'Kredensial ini tidak cocok dengan data kami.',
    'password' => 'Kata sandi yang diberikan salah.',
    'throttle' => 'Terlalu banyak percobaan login. Silakan coba lagi dalam :seconds detik.',
    'blocked' => 'Akun Anda terblokir karena terlalu banyak percobaan login gagal.',


];
