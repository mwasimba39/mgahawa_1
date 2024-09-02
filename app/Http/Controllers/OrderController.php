<?php

namespace App\Http\Controllers;
use App\Models\Food;
use App\Models\Order;


use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder($food_id)
{
    // Pata chakula kwa ID
    $food = Food::findOrFail($food_id);
    
    // Rudi kwenye view ya kuunda oda na upitishe chakula kilichochaguliwa
    return view('customer.order.createorder', compact('food'));
}

public function store(Request $request)
{
    // Validisha data
    $validatedData = $request->validate([
        'customer_name' => 'required|string|max:255',
        'customer_email' => 'required|email|max:255',
        'arrival_time' => 'required|date',
        'amount' => 'required|integer|min:1',
        'payment_method' => 'required|string|max:255',
        'food_id' => 'required|exists:foods,id', // Hakikisha chakula kipo
    ]);

    // Hifadhi oda kwenye database
    $order = new Order();
    $order->customer_name = $validatedData['customer_name'];
    $order->customer_email = $validatedData['customer_email'];
    $order->arrival_time = $validatedData['arrival_time'];
    $order->amount = $validatedData['amount'];
    $order->payment_method = $validatedData['payment_method'];
    $order->food_id = $validatedData['food_id']; // ID ya chakula kilichochaguliwa

    if(auth()->check()) {
        $order->user_id = auth()->id(); // Chukua ID ya mtumiaji aliyesajiliwa
    } else {
        return redirect()->route('login')->with('error', 'You must be logged in to place an order.');
    }

    $order->save();

    // Rudisha ujumbe wa mafanikio
    return redirect()->route('customer.menu')->with('success', 'Oda yako imewekwa kwa mafanikio!');
}


}
