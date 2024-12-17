@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">

<body>

    <!-- Search Bar Section -->
 <!-- Search Bar Section -->
<div class="container mt-4">
    <div class="input-group">
        <input type="text" id="searchInput" class="form-control" placeholder="Search events..." onkeyup="searchEvents()">
        <div class="input-group-append">
            <button class="btn btn-dark" type="button" onclick="searchEvents()">Search</button>
        </div>
    </div>
</div>

    <!-- Main Content for Home Page -->
    <div class="jumbotron text-center">
        <h1 class="display-5">Welcome to SZABIST Connect</h1>
        <p class="lead">Find all the latest SZABIST events here!</p>
        <a href="{{ route('events') }}" class="btn btn-dark btn-lg" role="button">View Events</a>
    </div>

    <!-- Latest Event Details Section -->
    <div class="container mt-4">
        <h3 class="text-center">Latest Events</h3>
        <div class="row" id="event-list">
            @foreach($events as $event)
                <div class="col-md-3 event-card" data-title="{{ $event->title }}">
                    <div class="card">
                        <img src="{{ $event->image_url }}" class="card-img-top" alt="{{ $event->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ strtoupper($event->title) }}</h5>
                            <p class="card-text">{{ $event->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Ticket and Location Section -->
    <div class="container mt-5">
        <hr>
        <div class="cta text-center">
            <h1>Get Your Ticket Today!</h1>
            <p>Szabist 100 Campus</p>
            <a class="btn btn-dark btn-lg" href="{{ route('participant.create') }}" role="button">Buy Tickets</a>
        </div>
        <hr>
        <div class="venue row">
            <div class="col-md-6 venue-section">
                <h3>The Venue</h3>
                <p>Our event will be held at <strong>SZABIST 100 Campus, Karachi</strong></p>
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe width="100%" height="300" src="https://maps.google.com/maps?q=SZABIST%20100%20Campus,%20Karachi&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-6 venue-section">
                <img class="venue-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTREcHmYJQ1zxqOiokaDcknEQ8e8Ovbt33HUg&s.jpg" alt="SZABIST Campus Image" style="width: 100%; height: auto;">
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/497162a0b5.js" crossorigin="anonymous"></script>

    <!-- Full Version of jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Optional JavaScript and Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- AJAX Search Events -->
    <!-- Full Version of jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Optional JavaScript and Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!-- Your Custom Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Load jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Your custom script -->
<script>
    function searchEvents() {
        const searchQuery = document.getElementById('searchInput').value;

        // Ensure jQuery is loaded
        if (typeof $.ajax === "function") {
            $.ajax({
                url: "{{ route('search.events') }}", // Laravel route for the search
                type: "GET",
                data: {
                    query: searchQuery
                },
                success: function(data) {
                    let eventsHtml = '';
                    data.events.forEach(function(event) {
                        eventsHtml += `
                            <div class="col-md-3 event-card" data-title="${event.title}">
                                <div class="card">
                                    <img src="${event.image_url}" class="card-img-top" alt="${event.title}">
                                    <div class="card-body">
                                        <h5 class="card-title">${event.title.toUpperCase()}</h5>
                                        <p class="card-text">${event.description}</p>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                    $('#event-list').html(eventsHtml);
                },
                error: function() {
                    alert('Error retrieving events');
                }
            });
        } else {
            console.error('jQuery is not loaded or $ is not available.');
        }
    }
</script>

</body>
</html>

@endsection
