<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Foods</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/images/mgahawa2.webp'); /* Adjust the background image path */
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
<body>
    <div class="overlay"></div>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center relative z-10">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6">Weka chakula</h2>

            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{route('owner.foodavailable')}}" class="text-blue-500 hover:underline mb-4 inline-block">Vyakula vilivyopo</a>

            <form action="{{ route('storefood') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Jina la chakula:</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Picha:</label>
                    <input type="file" id="image" name="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Maelezo:</label>
                    <textarea id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('description') }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Bei:</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Weka chakula</button>
            </form>
        </div>
    </div>
</body>
</html>
