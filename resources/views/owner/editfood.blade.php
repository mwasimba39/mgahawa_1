<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Food - Admin Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

    <style>
        body {
            /* background-image: url('/images/mgahawa2.webp'); Adjust the background image path */
            background-size: cover;
            background-position: center;
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.5); /* Dark overlay with 50% opacity */
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="overlay"></div>

    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md relative z-10">
        <h2 class="text-2xl font-bold mb-6">Edit Food Item</h2>

        <div>
            <a href="{{ route('owner.foodavailable') }}" class="text-white hover:underline mx-4">Vyakula Vilivyopo</a>

        </div>
        
        <form action="{{route('owner.update', $food->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Food Name:</label>
                <input type="text" id="name" name="name" value="{{ $food->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                <input type="file" id="image" name="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @if ($food->image)
                    <img src="{{ asset('images/' . $food->image) }}" alt="{{ $food->name }}" class="w-full h-32 object-cover rounded-md mt-2">
                @endif
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                <textarea id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ $food->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
                <input type="number" id="price" name="price" value="{{ $food->price }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Food</button>
        </form>
        
        
    </div>
</body>
</html>
