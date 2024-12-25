@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center my-5">Szabist Student Council Events</h1>
        <div class="event-cards">
        @foreach($events as $event)  <!-- Loop through each event -->
                <div class="card mb-4">
                <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top" alt="{{ $event->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>  <!-- Display the event name -->
                        <p class="card-text">
                            {{ $event->description }}  <!-- Display the event description -->
                            <br> 🗓️ : {{ $event->event_date }}  <!-- Display the event date -->
                            <br> ⏰ : {{ $event->event_time }}  <!-- Display the event time -->
                            <br> 📍 : {{ $event->location }}  <!-- Display the event location -->
                            <br> 🎟️ : Students: {{ $event->student_price }} || Alumni: {{ $event->alumni_price }}  <!-- Display the prices -->
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
@endsection
