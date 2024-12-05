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

        <!-- Event Creation Form -->
        <h2>Create Event</h2>
        <form id="eventForm" method="POST" action="{{ route('create-event') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="eventName">Event Name</label>
                <input type="text" class="form-control" id="eventName" name="name" required>
            </div>
            <div class="form-group">
                <label for="eventDescription">Description</label>
                <textarea class="form-control" id="eventDescription" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="eventImage">Upload Image</label>
                <input type="file" class="form-control" id="eventImage" name="event_image" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-dark btn-block">Create Event</button>
        </form>

        <hr>

       <!-- Event List Section -->
<h2>Event List</h2>
<div id="eventList" class="mt-4">
    <form id="manageEventForm" class="form-inline">
        <div class="form-group">
            <label for="event_id" class="mr-2">Select Event</label>
            <select name="event_id" id="event_id" class="form-control mr-3" required>
                <!-- Events dynamically fetched from the database -->
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="button" class="btn btn-warning mr-2" onclick="editSelectedEvent()">Edit</button>
        <button type="button" class="btn btn-danger" onclick="deleteSelectedEvent()">Delete</button>
    </form>
</div>


<!-- JavaScript for event management -->
<script>
// Function to handle event editing
// Edit the selected event
function editSelectedEvent() {
    const eventId = document.getElementById('event_id').value;
    const eventName = document.getElementById('event_id').selectedOptions[0].text;

    const newName = prompt(`Edit the name for event: ${eventName}`);
    const newDescription = prompt(`Edit the description for event: ${eventName}`);

    if (newName && newDescription) {
        fetch(`/events/${eventId}`, {
            method: "PUT",
            body: JSON.stringify({
                name: newName,
                description: newDescription
            }),
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            alert("Event updated successfully!");
            window.location.reload(); // Reload to update the event list
        })
        .catch(error => {
            console.error("Error updating event:", error);
        });
    } else {
        alert("Please fill in all fields!");
    }
}

// Delete the selected event
function deleteSelectedEvent() {
    const eventId = document.getElementById('event_id').value;
    const eventName = document.getElementById('event_id').selectedOptions[0].text;

    const confirmDelete = confirm(`Are you sure you want to delete the event: ${eventName}?`);

    if (confirmDelete) {
        fetch(`/events/${eventId}`, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            alert("Event deleted successfully!");
            window.location.reload(); // Reload to update the event list
        })
        .catch(error => {
            console.error("Error deleting event:", error);
        });
    }
}

    </script>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
