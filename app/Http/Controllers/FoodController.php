<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;


class FoodController extends Controller
{
    public function addfood()
    {
        return view ('owner.addfood');
    }

    public function storefood(Request $request)
    {
          // Validisha data kutoka kwenye ombi
    $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
    ]);

    // Hifadhi picha
    $imageName = time().'.'.$request->image->extension();  
    $request->image->move(public_path('images'), $imageName);

    // Hifadhi data kwenye database
    Food::create([
        'name' => $request->name,
        'image' => $imageName,
        'description' => $request->description,
        'price' => $request->price,
    ]);

    // Rudisha ujumbe wa mafanikio na baki kwenye ukurasa huo
    return back()->with('success', 'Chakula kimeongezwa.');
    }


    public function foodavailable(Request $request)
    {
        $search = $request->input('search');
        
        if ($search) {
            $foods = Food::where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')
                ->paginate(10);
        } else {
            $foods = Food::paginate(6);
        }

        return view('owner.availablefood', ['foods' => $foods]);
    }

    public function editfood($id)
    {
        $food = Food::findOrFail($id);
    return view('owner.editfood', compact('food'));
    }

    public function updatefood(Request $request, $id)
{
    
    $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
    ]);

    // Pata chakula kutoka database
    $food = Food::findOrFail($id);

    // Cheki kama kuna picha mpya iliyopakiwa
    if ($request->hasFile('image')) {
        // Hifadhi picha mpya na upate jina la faili
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        // Sasisha jina la picha kwenye database
        $food->image = $imageName;
    }

    // Sasisha data nyingine
    $food->name = $request->name;
    $food->description = $request->description;
    $food->price = $request->price;

    // Hifadhi mabadiliko kwenye database
    $food->save();

    // Rudisha ujumbe wa mafanikio
    return redirect()->route('owner.foodavailable')->with('success', 'Chakula kimesasishwa.');
}

public function deletefood($id)
{
    $food = Food::findOrFail($id);

    // If there's an image associated, you might want to delete it from storage
    if (file_exists(public_path('images/' . $food->image))) {
        unlink(public_path('images/' . $food->image));
    }

    // Delete the food item
    $food->delete();

    // Redirect back with a success message
    return redirect()->route('owner.foodavailable')->with('success', 'Chakula kimefutwa.');
}


public function showMenu()
    {
        // Pata chakula vyote kutoka kwenye database
        $foods = Food::paginate(6);

        // Peleka data ya chakula kwenye view ya customer homepage
        return view('customer.home', compact('foods'));
    }

}
