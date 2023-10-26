<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MenuItem; // Import your model

class MenuItemController extends Controller {
    public function store(Request $request) {
        // Validate the incoming request data here
        $image = file_get_contents($request->file('image'));
        $validatedData = $request->validate([
            'image' => $image,
            'title' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category' => 'required|string',
        ]);

        // Create a new menu item using the validated data
        $menuItem = MenuItem::create($validatedData);

        // Return a response, e.g., success message or the created menu item
        return response()->json(['message' => 'Menu item added', 'menuItem' => $menuItem], 200);
    }
}
