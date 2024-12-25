<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
    <style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Set background color and font family */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container style */
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        /* Header style */
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Form styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Label styling */
        label {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        /* Input field styling */
        input[type="text"], 
        textarea, 
        input[type="file"] {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
            margin-top: 5px;
        }

        /* Textarea specific styling */
        textarea {
            height: 150px;
            resize: vertical;
        }

        /* Button styling */
        button {
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Optional: Styling for the file input */
        input[type="file"] {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Create New Event</h1>

        <!-- Event Creation Form -->
        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Event Name -->
            <div>
                <label for="name">Event Name</label>
                <input type="text" name="name" id="name" required placeholder="Enter event name">
            </div>

            <!-- Event Description -->
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" required placeholder="Enter event description"></textarea>
            </div>

            <!-- Event Image -->
            <div>
                <label for="event_image">Event Image</label>
                <input type="file" name="event_image" id="event_image" required>
            </div>

            <!-- Submit Button -->
            <button type="submit">Create Event</button>
        </form>
    </div>

</body>
</html>
