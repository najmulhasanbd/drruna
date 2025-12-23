{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500" name="remember">
                <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #f4f7f6;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Entrance Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-card {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            position: relative;
            animation: fadeInUp 0.8s ease-out;
        }

        .close-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #888;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 2px 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .close-btn:hover {
            background: #555;
        }

        .welcome-text {
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 5px;
        }

        .sub-text {
            color: #555;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 500;
            color: #444;
        }

        .form-control {
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ddd;
            transition: 0.3s;
        }

        .form-control:focus {
            box-shadow: 0 0 8px rgba(0, 86, 179, 0.2);
            border-color: #0056b3;
        }

        .password-field {
            position: relative;
        }

        .eye-icon {
            position: absolute;
            right: 15px;
            top: 40px;
            color: #888;
            cursor: pointer;
        }

        .forgot-pass {
            text-align: right;
            display: block;
            margin-top: 8px;
            color: #000;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .login-btn {
            background: linear-gradient(90deg, #004d80 0%, #0056b3 80%, #2b78c5 100%);
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1.1rem;
            margin-top: 30px;
            transition: transform 0.2s;
        }

        .login-btn:hover {
            transform: scale(1.02);
            opacity: 0.95;
        }

        .signup-text {
            text-align: center;
            margin-top: 20px;
            font-size: 0.95rem;
        }

        .signup-text a {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="login-card">

        <h1 class="welcome-text">Welcome!</h1>
        <p class="sub-text">Please Login to continue</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="form-label">Phone Number</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-2 password-field">
                <label class="form-label">Create Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password">

            </div>

            <button type="submit" class="btn btn-primary w-100 login-btn">Log In</button>
        </form>
    </div>

</body>

</html>
