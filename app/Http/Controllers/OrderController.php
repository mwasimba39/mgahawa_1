<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder($food_id)
    {
        $food = Food::findOrFail($food_id);
        return view('customer.order.createorder', compact('food'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'amount' => 'required|integer|min:1',
            'payment_method' => 'required|string|max:255',
            'food_id' => 'required|exists:foods,id',
        ]);

        Order::create($validatedData);

        return redirect()->route('customer.home')->with('success', 'Oda yako imewekwa kwa mafanikio!');
    }

    public function showOrders()
{
    $orders = Order::where('customer_email', auth()->user()->email)->get();
    return view('customer.orders.index', compact('orders'));
}

}
