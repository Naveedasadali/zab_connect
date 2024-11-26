@extends('layouts.app')

@section('content')
<!-- Admin Dashboard Content -->
<div class="container mt-5">
    <h1 class="text-center mb-4">Admin Dashboard</h1>
    <div class="dashboard">
        <!-- Event Creation Form -->
        <h2>Create Event</h2>
        <form id="eventForm" method="POST" action="{{ route('create-event') }}" enctype="multipart/form-data">
            @csrf  <!-- Add CSRF token for security -->
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

        <!-- Event List (Display Existing Events) -->
        <h2>Event List</h2>
        <div id="eventList">
            <!-- Example Event Item -->
            <div class="event-item" id="event-1">
                <h5>Sample Event</h5>
                <p>Description of the event goes here.</p>
                <img src="event-image.jpg" alt="Event Image">
                <button class="btn btn-warning" onclick="editEvent(1)">Edit</button>
                <button class="btn btn-danger" onclick="deleteEvent(1)">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for event management -->
<script>
// Function to handle event editing
function editEvent(eventId) {
    const eventTitle = prompt("Enter new event title:");
    const eventDescription = prompt("Enter new event description:");
    const eventImage = prompt("Enter new event image URL:");

    if (eventTitle && eventDescription && eventImage) {
        fetch("/update-event", {
            method: "POST",
            body: JSON.stringify({
                id: eventId,
                title: eventTitle,
                description: eventDescription,
                image: eventImage
            }),
            headers: {
                "Content-Type": "application/json"
            }
        })
        .then(response => response.json())
        .then(data => {
            alert("Event updated successfully!");
            window.location.href = "events.html";
        })
        .catch(error => {
            console.error("Error updating event:", error);
        });
    } else {
        alert("Please fill in all fields!");
    }
}

// Function to handle event deletion
function deleteEvent(eventId) {
    const confirmDelete = confirm("Are you sure you want to delete this event?");
    
    if (confirmDelete) {
        fetch("/delete-event", {
            method: "DELETE",
            body: JSON.stringify({ id: eventId }),
            headers: {
                "Content-Type": "application/json"
            }
        })
        .then(response => response.json())
        .then(data => {
            alert("Event deleted successfully!");
            const eventElement = document.getElementById(`event-${eventId}`);
            eventElement.remove();
            window.location.href = "events.html";
        })
        .catch(error => {
            console.error("Error deleting event:", error);
        });
    }
}
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
