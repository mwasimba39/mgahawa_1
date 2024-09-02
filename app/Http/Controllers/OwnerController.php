<?php

namespace App\Http\Controllers;
use App\Models\Food;    
// use App\Models\Order;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        return view('owner.home');
    }

    public function total()
    {
        // Hesabu idadi ya chakula kilichopo
        $totalFoodCount = Food::count();
        // $totalOrderCount = Order::count(); // Ikiwa unahitaji idadi ya maagizo yote
        // $newOrderCount = Order::whereDate('created_at', today())->count(); // Maagizo mapya leo

        // Rudisha mtazamo na data
        return view('owner.home', [
            'totalFoodCount' => $totalFoodCount,
            // 'totalOrderCount' => $totalOrderCount,
            // 'newOrderCount' => $newOrderCount,
        ]);
    }

}
