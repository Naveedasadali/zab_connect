<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General Container */
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f7fc; /* Light background color */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        /* Form Container */
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px; /* Controls the form width */
        }

        .form-container h2 {
            font-size: 1.75rem;
            font-weight: 600;
            color: #333;
            text-align: center;
        }

        /* Input Styling */
        .form-input {
            width: 100%;
            padding: 14px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-top: 8px;
            box-sizing: border-box;
            transition: border 0.3s ease;
        }

        .form-input:focus {
            border-color: #4c51bf;
            outline: none;
        }

        /* Error Message Styling */
        .x-input-error {
            color: red;
            font-size: 0.875rem;
            margin-top: 8px;
        }

        /* Button Styling */
        .x-primary-button {
            width: 100%;
            padding: 14px;
            font-size: 1rem;
            font-weight: 600;
            background-color: #4c51bf;
            color: white;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .x-primary-button:hover {
            background-color: #3b4ca0;
        }

        /* Link Styling */
        a {
            color: #4c51bf;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #3b4ca0;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }

            .form-input,
            .x-primary-button {
                padding: 12px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-container">
                <h2>{{ __('Register') }}</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="form-group mb-4">
                        <label for="name">{{ __('Name') }}</label>
                        <input id="name" class="form-input" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                        @error('name')
                            <div class="x-input-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="form-group mb-4">
                        <label for="email">{{ __('Email') }}</label>
                        <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
                        @error('email')
                            <div class="x-input-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group mb-4">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" />
                        @error('password')
                            <div class="x-input-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group mb-4">
                        <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                        <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" />
                        @error('password_confirmation')
                            <div class="x-input-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex justify-between mt-4">
                        <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <button type="submit" class="x-primary-button">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
