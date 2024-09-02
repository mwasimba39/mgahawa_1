<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAM_Mgahawa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        body {
            font-family: 'Roboto', sans-serif;
        }
        .hero {
            background-image: url('/images/hero_gahawa2.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .hero h1 {
            animation: fadeInDown 1s ease-out;
        }
        .hero p {
            animation: fadeInUp 1s ease-out;
        }
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .menu-item:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
        }
        .menu-item img {
            transition: transform 0.3s ease-in-out;
        }
        .menu-item:hover img {
            transform: scale(1.1);
        }
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">
    <nav class="bg-green-600 text-white shadow-lg">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold">LAM_Mgahawa</a>
            <div class="hidden md:flex space-x-6">
                <a href="#" class="hover:text-gray-300">Nyumbani</a>
                <a href="#menu" class="hover:text-gray-300">Menyu</a>
                <a href="#services" class="hover:text-gray-300">Huduma</a>
                <a href="#contact" class="hover:text-gray-300">Mawasiliano</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="hover:text-red-700">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <section class="hero h-screen flex items-center justify-center text-center" style="background-image: url('/images/mgahawa2.webp'); background-size: cover; background-position: center;">
        <div class="bg-black bg-opacity-50 p-8 rounded-lg">
            <h1 class="text-white text-5xl font-bold">Karibu LAM_Mgahawa</h1>
            <p class="text-white text-lg mt-4">Chakula cha nyumbani kilichoandaliwa kwa upendo.</p>
            <a href="#menu" class="mt-6 inline-block bg-white text-green-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-200 transition-colors">Tazama Menyu Yetu</a>
        </div>
    </section>
    

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
                        <a href="{{ route('order.create', ['food_id' => $food->id]) }}" class="mt-6 inline-block bg-green-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-500 transition-colors">Weka Order</a>
                    </div>
                @endforeach
            </div>
    
            <!-- Pagination Links -->
            <div class="mt-10">
                {{ $foods->links() }}
            </div>
        </div>
    </section>
    

    <!-- Services and Contact Sections remain unchanged -->

    <footer class="bg-gray-900 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 LAM_Mgahawa. Haki zote zimehifadhiwa.</p>
        </div>
    </footer>
</body>
</html>
