<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 600px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        textarea {
            height: 150px;
            resize: vertical;
        }

        button {
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .btn-back {
            text-align: center;
            margin-top: 20px;
        }

        .btn-back a {
            text-decoration: none;
            color: #007bff;
            font-size: 16px;
        }

        .btn-back a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Update Event</h1>
        
        <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="name">Event Name</label>
                <input type="text" name="name" value="{{ $event->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Event Description</label>
                <textarea name="description" required>{{ $event->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="event_image">Event Image</label>
                <input type="file" name="event_image">
            </div>

            <button type="submit">Update Event</button>
        </form>

        <div class="btn-back">
            <a href="{{ route('dashboard') }}">Back to Events List</a>
        </div>
    </div>

</body>
</html>
