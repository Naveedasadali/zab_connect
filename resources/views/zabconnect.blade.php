@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">

<body>

 <!-- Your Search Bar -->
<div class="d-flex flex-row-reverse p-2">
    <input type="text" class="form-control" id="event-search" placeholder="Search events">
</div>

<div id="event-results" class="row mt-0">
    <!-- Results will be displayed here dynamically -->
</div>

    <!-- Main Content for Home Page -->
    <div class="jumbotron text-center">
        <h1 class="display-5">Welcome to SZABIST Connect</h1>
        <p class="lead">Find all the latest SZABIST events here!</p>
        <a href="{{ route('events') }}" class="btn btn-dark btn-lg" role="button">View Events</a>
    </div>

    <div class="container">
        <h1 class="text-center my-5">Latest Events</h1>
        <div class="event-cards">
        @foreach($events as $event)  <!-- Loop through each event -->
                <div class="card mb-4">
                <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top" alt="{{ $event->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>  <!-- Display the event name -->
                        <p class="card-text">
                            {{ $event->description }}  <!-- Display the event description -->
                             <!-- Display the prices -->
                        </p>
                    </div>
                </div>
            @endforeach
            <!-- Event 1 -->
            <div class="card mb-4">
                <img src="https://docs.szabist.edu.pk/websites/images/Photo%20Gallery/2023/September/Comedy%20night/02.jpg" class="card-img-top" alt="Event 1">
                <div class="card-body">
                    <h5 class="card-title">COMEDY NIGHT</h5>
                    <p class="card-text">You can run, but you can’t escape the laughs! The wait is finally over, 2 days to Comedy Night. 😸<br>
                        🗓️ : 19th October, Saturday<br>
                        ⏰ : 6:00 PM - Onwards<br>
                        📍 : 100 Courtyard, SZABIST<br>
                        🎟️ : Students: 600/- || Alumni: 1000/-.</p>
                </div>
            </div>

            <!-- Event 2 -->
            <div class="card mb-4">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsyAWTfRAXbthGSnyLFP9eRcdX6UVyIfsw-Q&s.jpg" class="card-img-top" alt="Event 2">
                <div class="card-body">
                    <h5 class="card-title">FUNKAR FEST</h5>
                    <p class="card-text">A celebration of the arts, and Shugal Mela, an ode to community spirit, lit up Welcome Week with creativity, care, and lasting moments! Huge shoutout to the Arts & Culture and Community Service pillars for pulling off their incredible events ✨.</p>
                </div>
            </div>

            <!-- Event 3 -->
            <div class="card mb-4">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0HTE4fFcSsImtc3MhkDAIYQRfrmPfzVeGlQ&s.jpg" class="card-img-top" alt="Event 3">
                <div class="card-body">
                    <h5 class="card-title">POWER PLAY</h5>
                    <p class="card-text">Power Play had the field on fire while Cyber Clash lit up the screens! <br> ⚽🎮 Whether you were scoring goals online or offline, freshers brought nothing but energy and skills.</p>
                </div>
            </div>

            <!-- Event 4 -->
            <div class="card mb-4">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSPS_gceyYOqYHq_SQr7MOfIDvkCwZCbc74Rw&s.jpg" class="card-img-top" alt="Event 4">
                <div class="card-body">
                    <h5 class="card-title">FallFrenzyWeek</h5>
                    <p class="card-text">Announcing our diverse vendors’ lineup for Fall Frenzy Week! 📣 We’ve got art, dessert, jewellery and more! Be sure to stop by, explore, and grab something special. See you all there! ✨.</p>
                </div>
            </div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!-- Custom Script to search events -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- jQuery AJAX -->
<!-- Use the full version of jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    $(document).ready(function() {
        $('#event-search').on('keyup', function() {
            let query = $(this).val();
            if (query.length > 0) {
                // Perform the AJAX request
                $.ajax({
                    url: '{{ route('events.search') }}',
                    method: 'GET',
                    data: { query: query },
                    success: function(response) {
                        // Update the results section with the response
                        if(response.events.length > 0) {
                            let eventHtml = '';
                            response.events.forEach(function(event) {
                                eventHtml += `
                                    <div class="event-item">
                                        <h5>${event.name}</h5>
                                        <p>${event.description}</p>
                                    </div>
                                `;
                            });
                            $('#event-results').html(eventHtml);
                        } else {
                            $('#event-results').html('<p>No events found.</p>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            } else {
                $('#event-results').empty();
            }
        });
    });
</script>



</body>
</html>

@endsection
