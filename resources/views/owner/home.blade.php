<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashibodi ya Mmiliki wa Mgahawa</title>
    <!-- Play CDN for Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
        }

        .hero {
            background-image: url('/images/admin_hero.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Sidebar -->
    <aside class="fixed top-0 left-0 w-64 h-screen bg-blue-800 text-white">
        <div class="p-4">
            <h2 class="text-2xl font-bold">Dashibodi ya Mmiliki</h2>
            <nav class="mt-6">
                <ul>
                    <li><a href="/admin/users" class="block py-2 px-4 hover:bg-blue-700">Watumiaji</a></li>
                    <li><a href="{{ route('addfood') }}" class="block py-2 px-4 hover:bg-blue-700">Ongeza Chakula</a></li>
                    <li><a href="{{ route('owner.foodavailable') }}" class="block py-2 px-4 hover:bg-blue-700">Tazama Chakula</a></li>
                    <li><a href="/admin/view-orders" class="block py-2 px-4 hover:bg-blue-700">Tazama Maagizo</a></li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left py-2 px-4 hover:bg-blue-700">Toka</button>
                    </form>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="ml-64 p-6">
        <!-- Hero Section -->
        <section class="hero h-64 flex items-center justify-center text-center bg-black bg-opacity-50 p-6 rounded-lg">
            <div>
                <h1 class="text-white text-3xl font-bold">Karibu kwenye Dashibodi ya Mmiliki</h1>
                <p class="text-white mt-4">Fuatilia chakula, maagizo, na usimamizi wa mgahawa kwa urahisi.</p>
            </div>
        </section>

        <!-- Dashboard Overview -->
        <section class="mt-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Total Foods -->
                <div class="bg-white p-6 rounded-lg shadow-md border border-blue-200">
                    <h3 class="text-xl font-semibold">Chakula Chote</h3>
                    <p class="text-2xl font-bold mt-2">{{ $totalFoodCount }}</p>
                </div>

                <!-- Total Orders -->
                <div class="bg-white p-6 rounded-lg shadow-md border border-blue-200">
                    <h3 class="text-xl font-semibold">Maagizo Yote</h3>
                    {{-- <p class="text-2xl font-bold mt-2">{{ $totalOrderCount }}</p> --}}
                </div>

                <!-- New Orders -->
                <div class="bg-white p-6 rounded-lg shadow-md border border-blue-200">
                    <h3 class="text-xl font-semibold">Maagizo Mapya</h3>
                    {{-- <p class="text-2xl font-bold mt-2">{{ $newOrderCount }}</p> --}}
                </div>
            </div>
        </section>

        <!-- Recent Orders -->
        <section class="mt-8">
            <h2 class="text-2xl font-bold mb-4">Maagizo Yaliyo Karibu</h2>
            <table class="w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="px-4 py-2 text-left">Nambari ya Agizo</th>
                        <th class="px-4 py-2 text-left">Mteja</th>
                        <th class="px-4 py-2 text-left">Tarehe</th>
                        <th class="px-4 py-2 text-left">Jumla</th>
                        <th class="px-4 py-2 text-left">Hali</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Order -->
                    <tr>
                        <td class="px-4 py-2">#001</td>
                        <td class="px-4 py-2">Juma M.</td>
                        <td class="px-4 py-2">2024-08-22</td>
                        <td class="px-4 py-2">Tsh 12,000</td>
                        <td class="px-4 py-2">Inasubiri</td>
                    </tr>
                    <!-- More rows as needed -->
                </tbody>
            </table>
        </section>
    </div>

</body>
</html>
