<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        .event-table img {
            width: 100px;
            height: auto;
            border-radius: 5px;
        }
        .action-btns {
            display: flex;
            gap: 10px;
        }
        .star-btn {
            color: #f39c12;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Admin Dashboard</h1>
            <!-- Logout Button -->
            <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>

        <!-- Create Event Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Event List</h2>
            <a href="{{ route('events.create') }}" class="btn btn-dark">Create Event</a>
        </div>

        <!-- Event List Table -->
        <table class="table table-bordered event-table">
            <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                    <td>
                        @if($event->image)
                        <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->name }}">
                        @else
                        <span>No Image</span>
                        @endif
                    </td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->description }}</td>
                    <td>
                        <div class="action-btns">
                            <!-- Update Route -->
                            <a href="{{ route('events.updateForm', ['id' => $event->id]) }}" class="btn btn-warning btn-sm">Update</a>
                            <!-- Delete Route -->
                            <form action="{{ route('events.destroy', ['id' => $event->id]) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                            <!-- Prioritize Button -->
                            <span class="star-btn" onclick="prioritizeEvent({{ $event->id }})">&#9733;</span>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Participant List Section -->
        <h2 class="mt-5">Participants List</h2>
        @foreach($events as $event)
        <div class="mb-4">
            <h5>Participants for: {{ $event->name }}</h5>
            <table class="table table-bordered event-table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($event->participants as $index => $participant)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $participant->name }}</td>
                        <td>{{ $participant->email }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">No participants registered for this event</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @endforeach
    </div>

    <!-- JavaScript for Event Management -->
    <script>
        function prioritizeEvent(eventId) {
            fetch(`/events/${eventId}/prioritize`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                alert("Event prioritized successfully!");
                window.location.reload();
            })
            .catch(error => console.error("Error prioritizing event:", error));
        }
    </script>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
