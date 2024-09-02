<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menyu ya Mgahawa</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">

    <!-- Navbar -->
    <nav class="bg-green-600 text-white shadow-lg">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <div>
                    <a href="/" class="text-2xl font-bold">LAM_Mgahawa</a>
                </div>
                <div class="hidden md:flex space-x-6">
                    <a href="/" class="hover:text-gray-300">Nyumbani</a>
                    <a href="#menu" class="hover:text-gray-300">Menyu</a>
                    <a href="#contact" class="hover:text-gray-300">Mawasiliano</a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:text-red-700">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Menu Section -->
    <section id="menu" class="py-20 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-10">Menyu Yetu</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                @foreach($foods as $food)
                    <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                        <img src="{{ asset('images/' . $food->image) }}" alt="{{ $food->name }}" class="w-full h-48 object-cover rounded-lg mb-6">
                        <h3 class="text-2xl font-semibold">{{ $food->name }}</h3>
                        <p class="text-gray-700 mt-4">{{ $food->description }}</p>
                        <p class="text-green-600 mt-4 font-bold">{{ $food->price }} TZS</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-green-600 text-white">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-10">Mawasiliano</h2>
            <p class="text-lg">Je, una maswali? Tuko hapa kusaidia! Wasiliana nasi kwa simu au barua pepe.</p>
            <p class="mt-6">Simu: (123) 456-7890</p>
            <p>Barua pepe: lam_mgahawa@gmail.com</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 LAM_Mgahawa. Haki zote zimehifadhiwa.</p>
        </div>
    </footer>

</body>
</html>
