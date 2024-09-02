<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vyakula Vilivyopo - Dashibodi ya Mmiliki</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-size: cover;
            background-position: center;
        }
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('owner.home') }}" class="text-white text-lg font-semibold hover:underline">Dashibodi ya Mmiliki</a>
            <div>
                <a href="{{ route('addfood') }}" class="text-white hover:underline mx-4">Ongeza Chakula Kipya</a>
                <a href="{{ route('owner.foodavailable') }}" class="text-white hover:underline mx-4">Vyakula Vilivyopo</a>
                <a href="{{ route('owner.home') }}" class="text-white hover:underline mx-4">Nyumbani</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="bg-gray-100 min-h-screen pt-6">
        <div class="container mx-auto bg-white p-6 rounded-lg shadow-lg w-full max-w-4xl">
            <h2 class="text-2xl font-bold mb-6">Vyakula Vilivyopo</h2>

            <!-- Flash Messages -->
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-500 text-white p-4 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Search Form -->
            <div class="flex justify-end mb-6">
                <form method="GET" action="{{ route('owner.foodavailable') }}" class="flex">
                    <input type="text" name="search" placeholder="Tafuta vyakula" class="p-2 border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ request()->input('search') }}">
                    <button type="submit" class="p-2 bg-blue-500 text-white rounded-r-lg hover:bg-blue-600">Tafuta</button>
                    @if(request()->input('search'))
                        <a href="{{ route('owner.foodavailable') }}" class="p-2 bg-gray-500 text-white rounded ml-2 hover:bg-gray-600">Ondoa Tafuta</a>
                    @endif
                </form>
            </div>

            <!-- Food Items Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($foods as $food)
                    <div class="card bg-gray-100 p-4 rounded-lg shadow-lg">
                        <img src="{{ asset('images/' . $food->image) }}" alt="{{ $food->name }}" class="w-full h-48 object-cover rounded-md mb-4">
                        <h3 class="text-xl font-semibold mb-2 text-center">{{ $food->name }}</h3>
                        <p class="text-gray-700 mb-2 text-center">{{ $food->description }}</p>
                        <p class="text-gray-900 font-bold text-center">{{ $food->price }} TZS</p>
                        <p class="text-gray-700 text-center mb-4">Msimbo wa Chakula: {{ $food->id }}</p>

                        <div class="flex justify-center mb-4">
                            <a href="{{ route('owner.edit', $food->id) }}" class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-700">Hariri</a>
                        </div>

                        <form action="{{ route('owner.delete', $food->id) }}" method="POST" onsubmit="return confirm('Una uhakika unataka kufuta chakula hiki?');" class="text-center">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">
                                Futa
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $foods->appends(['search' => request()->input('search')])->links() }}
            </div>
        </div>
    </div>

    <!-- Footer -->
    {{-- <footer class="bg-blue-600 text-white p-4">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} Mgahawa - Haki zote zimehifadhiwa.</p>
            <p>Barua pepe: info@mgahawa.com | Simu: +255 123 456 789</p>
            <p>Follow us: 
                <a href="#" class="hover:underline">Facebook</a> |
                <a href="#" class="hover:underline">Twitter</a> |
                <a href="#" class="hover:underline">Instagram</a>
            </p>
        </div>
    </footer> --}}
</body>
</html>
