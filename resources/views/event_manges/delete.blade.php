<button class="btn btn-danger" onclick="deleteEvent({{ $event->id }})">Delete</button>

<script>
    function deleteEvent(eventId) {
        if (confirm('Are you sure you want to delete this event?')) {
            fetch('/events/' + eventId + '/delete', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',  // CSRF token for security
                },
                body: JSON.stringify({})  // Empty body, just for the POST request
            })
            .then(response => {
                if (response.ok) {
                    alert('Event deleted successfully!');
                    location.reload();  // Reload the page after deletion
                } else {
                    alert('Error deleting event.');
                }
            });
        }
    }
</script>
