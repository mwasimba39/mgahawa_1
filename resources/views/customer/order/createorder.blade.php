<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h2 class="text-2xl font-bold mb-6">Weka Oda Yako</h2>

        <form action="{{ route('order.create', ['food_id' => $food->id]) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <div class="mb-4">
                <label for="customer_name" class="block text-gray-700">Jina Lako</label>
                <input type="text" name="customer_name" id="customer_name" class="w-full border p-2 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="customer_phone" class="block text-gray-700">Namba ya Simu</label>
                <input type="tel" name="customer_phone" id="customer_phone" class="w-full border p-2 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="customer_email" class="block text-gray-700">Barua Pepe Yako</label>
                <input type="email" name="customer_email" id="customer_email" class="w-full border p-2 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="arrival_time" class="block text-gray-700">Muda wa Kufika</label>
                <input type="datetime-local" name="arrival_time" id="arrival_time" class="w-full border p-2 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="amount" class="block text-gray-700">Kiasi</label>
                <input type="number" name="amount" id="amount" class="w-full border p-2 rounded-lg" min="1" required>
            </div>

            <div class="mb-4">
                <label for="payment_method" class="block text-gray-700">Njia ya Malipo</label>
                <select name="payment_method" id="payment_method" class="w-full border p-2 rounded-lg">
                    <option value="m-pesa">M-Pesa</option>
                    <option value="tigo-pesa">Tigo Pesa</option>
                    <option value="halo-pesa">Halo Pesa</option>
                    <option value="airtel-money">Airtel Money</option>
                </select>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-green-600 text-white p-3 rounded-lg hover:bg-green-700 transition-colors">Weka Oda</button>
                <a href="{{ route('customer.home') }}" class="ml-4 text-gray-700 hover:underline">Rudi kwenye Menyu</a>
            </div>
        </form>
    </div>
</body>
</html>
