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
        'title' => 'Login',
        'subtitle' => 'Log in with your data that you entered during registration.',
        'form' => [
            'name' => 'Username',
            'password' => 'Password',
            'submit' => 'Log in',
            'loading' => 'Loading...',
        ],
        'remember_me' => 'Remember me',
        'dont_have_an_account' => "Dont have an account?"
    ],

    'register' => [
        'title' => 'Register',
        'subtitle' => 'Input your data to register on our website.',
        'form' => [
            'email' => 'Email',
            'username' => 'Username',
            'full_name' => 'Full Name',
            'password' => 'Password',
            'password_confirmation' => 'Confirm Password',
            'submit' => 'Register',
            'loading' => 'Loading...',
        ],
        'already_have_account' => 'Already have an account?',
    ],

    'verify' => [
        'title' => 'Verification email',
        'description' => "Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.",
        'resend' => 'Resend Verification Email',
        'logout' => 'Log out'
    ],

    'forgot' => [
        'title' => 'Forgot password',
        'confirm' => 'Confirm password',
        'description' => 'Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.',
        'reset_link' => 'Email Password Reset Link'
    ],

    'failed' => 'These credentials do not match our records.',
    'password' => 'The provided password is incorrect.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    'blocked' => 'Your account has been blocked due to too many failed login attempts.',


];
