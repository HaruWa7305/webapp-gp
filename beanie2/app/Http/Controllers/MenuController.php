<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MenuController extends Controller
{
    public function menus()
{
    $menuItems = Product::all();  // Fetch all products from the database, including quantity

    return view('menus', compact('menuItems'));
}

}
