@extends('layouts.app')

@section('content')
<!-- Contact Page Content -->
<div class="container">
    <h1 class="text-center my-5">Contact Us</h1>
    <!-- Contact Form -->
    <form>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" required>
        </div>
        <div class="form-group">
            <label for="number">Contact Number</label>
            <input type="tel" class="form-control" id="number" required>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-dark btn-lg">Send Message</button>
    </form>
</div>
@endsection
