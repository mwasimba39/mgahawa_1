<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oda Zako</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-green-600 text-white shadow-lg">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold">LAM_Mgahawa</a>
            <div class="hidden md:flex space-x-6">
                <a href="#" class="hover:text-gray-300">Nyumbani</a>
                <a href="#menu" class="hover:text-gray-300">Menyu</a>
                <a href="{{ route('customer.orders') }}" class="hover:text-gray-300">Oda zako</a>
                <a href="#services" class="hover:text-gray-300">Huduma</a>
                <a href="#contact" class="hover:text-gray-300">Mawasiliano</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="hover:text-red-700">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-8">
        <h2 class="text-2xl font-bold mb-6">Oda Zako</h2>

        <div class="bg-white p-6 rounded-lg shadow-md">
            @if($orders->isEmpty())
                <p class="text-gray-700">Huna oda yoyote kwa sasa.</p>
            @else
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Jina la Mteja</th>
                            <th class="py-2 px-4 border-b">Chakula</th>
                            <th class="py-2 px-4 border-b">Idadi</th>
                            <th class="py-2 px-4 border-b">Malipo</th>
                            <th class="py-2 px-4 border-b">Tarehe</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $order->customer_name }}</td>
                                <td class="py-2 px-4 border-b">{{ $order->food->name }}</td>
                                <td class="py-2 px-4 border-b">{{ $order->amount }}</td>
                                <td class="py-2 px-4 border-b">{{ ucfirst($order->payment_method) }}</td>
                                <td class="py-2 px-4 border-b">{{ $order->created_at->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</body>
</html>
