@extends('layouts.app')

@section('content')
<!-- Admin Login Page Content -->
<div class="container mt-5">
    <h1 class="text-center mb-4">Admin Login</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
        <form onsubmit="return validateForm()" action="admin_dashboard" method="POST">
    @csrf
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-dark btn-block">Login</button>
</form>

            <p id="error-message" class="text-danger text-center mt-3"></p>
        </div>
    </div>
</div>

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
