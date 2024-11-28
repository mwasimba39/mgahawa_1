<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Food; // Ensure you have the Food model included

class CustomerController extends Controller
{
    public function index()
    {
        // Fetch all food items or you can implement any specific logic you need
        $foods = Food::paginate(6); // Adjust the pagination as needed

        // Return the view with the food items
        return view('customer.home', compact('foods'));
    }
}
