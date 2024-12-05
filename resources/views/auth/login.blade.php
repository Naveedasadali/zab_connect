@extends('layouts.app')

@section('content')
<!-- Admin Login Page Content -->
<div class="container mt-5">
    <h1 class="text-center mb-4">Admin Login</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="{{ route('login') }}" onsubmit="return validateForm()">
                @csrf
                
                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-control" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-control" 
                        required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="form-check mt-3">
                    <input 
                        type="checkbox" 
                        id="remember_me" 
                        name="remember" 
                        class="form-check-input">
                    <label for="remember_me" class="form-check-label">Remember Me</label>
                </div>

                <!-- Forgot Password Link -->
                @if (Route::has('password.request'))
                    <div class="mt-3">
                        <a 
                            href="{{ route('password.request') }}" 
                            class="text-sm text-dark">
                            Forgot your password?
                        </a>
                    </div>
                @endif

                <!-- Submit Button -->
                <button type="submit" class="btn btn-dark btn-block mt-4">Login</button>
            </form>

            <!-- Error Message -->
            <p id="error-message" class="text-danger text-center mt-3"></p>
        </div>
    </div>
</div>

<!-- JavaScript Validation -->
<script>
    function validateForm() {
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const errorMessage = document.getElementById("error-message");

        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailPattern.test(email)) {
            errorMessage.textContent = "Please enter a valid email address.";
            return false;
        }

        if (password.length < 6) {
            errorMessage.textContent = "Password must be at least 6 characters long.";
            return false;
        }

        // If validation passes
        errorMessage.textContent = "";
        return true;
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
