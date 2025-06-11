<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // If your table is 'products' (default Laravel plural), you don't need to specify the table name

    // If you want to allow mass assignment (like Product::create([...]))
    // define which columns are fillable:
    protected $fillable = ['name', 'desc', 'price', 'img'];
}
