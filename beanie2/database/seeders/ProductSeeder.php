<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ProductSeeder extends Seeder
{
    public function run()
    {
        // Add coffee products with quantity set to 20
        Product::create([
            'name' => 'Americano',
            'desc' => 'Our classic, smooth, black coffee.',
            'price' => 6.00,
            'quantity' => 20,  // Initialize quantity to 20
            'img' => 'images/americano.jpg',  // You can update this with your image path or URL
        ]);

        Product::create([
            'name' => 'Espresso',
            'desc' => 'Strong, rich, and bold espresso shot.',
            'price' => 6.00,
            'quantity' => 20,  // Initialize quantity to 20
            'img' => 'images/espresso.jpg',  // You can update this with your image path or URL
        ]);

        Product::create([
            'name' => 'Latte',
            'desc' => 'Smooth espresso with steamed milk and foam.',
            'price' => 8.50,
            'quantity' => 20,  // Initialize quantity to 20
            'img' => 'images/latte.jpg',  // You can update this with your image path or URL
        ]);

        Product::create([
            'name' => 'Cappuccino',
            'desc' => 'Espresso with steamed milk and thick foam.',
            'price' => 8.50,
            'quantity' => 20,  // Initialize quantity to 20
            'img' => 'images/cappuccino.jpg',  // You can update this with your image path or URL
        ]);

        Product::create([
            'name' => 'Mocha',
            'desc' => 'Chocolate-flavored variant of a latte.',
            'price' => 9.50,
            'quantity' => 20,  // Initialize quantity to 20
            'img' => 'images/mocha.jpg',  // You can update this with your image path or URL
        ]);

        Product::create([
            'name' => 'Flat White',
            'desc' => 'Espresso with steamed milk but no foam.',
            'price' => 6.50,
            'quantity' => 20,  // Initialize quantity to 20
            'img' => 'images/flat_white.jpg',  // You can update this with your image path or URL
        ]);

        Product::create([
            'name' => 'Macchiato',
            'desc' => 'Espresso with a small amount of foam.',
            'price' => 9.50,
            'quantity' => 20,  // Initialize quantity to 20
            'img' => 'images/macchiato.jpg',  // You can update this with your image path or URL
        ]);

        Product::create([
            'name' => 'Iced Coffee',
            'desc' => 'Cold brewed coffee with ice.',
            'price' => 6.50,
            'quantity' => 20,  // Initialize quantity to 20
            'img' => 'images/iced_coffee.jpg',  // You can update this with your image path or URL
        ]);

        Product::create([
            'name' => 'Cold Brew',
            'desc' => 'Slow-steeped cold brewed coffee.',
            'price' => 6.00,
            'quantity' => 20,  // Initialize quantity to 20
            'img' => 'images/cold_brew.jpg',  // You can update this with your image path or URL
        ]);

        Product::create([
            'name' => 'Affogato',
            'desc' => 'Espresso poured over vanilla ice cream.',
            'price' => 10.90,
            'quantity' => 20,  // Initialize quantity to 20
            'img' => 'images/affogato.jpg',  // You can update this with your image path or URL
        ]);

        Product::create([
            'name' => 'Chai Latte',
            'desc' => 'Spiced tea latte with steamed milk.',
            'price' => 9.50,
            'quantity' => 20,  // Initialize quantity to 20
            'img' => 'images/chai_latte.jpg',  // You can update this with your image path or URL
        ]);

        Product::create([
            'name' => 'Matcha Latte',
            'desc' => 'Green tea latte made from matcha powder.',
            'price' => 9.50,
            'quantity' => 20,  // Initialize quantity to 20
            'img' => 'images/matcha_latte.jpg',  // You can update this with your image path or URL
        ]);

        Product::create([
            'name' => 'Hot Chocolate',
            'desc' => 'Rich and creamy hot chocolate.',
            'price' => 12.90,
            'quantity' => 20,  // Initialize quantity to 20
            'img' => 'images/hot_chocolate.jpg',  // You can update this with your image path or URL
        ]);

        Product::create([
            'name' => 'Caramel Macchiato',
            'desc' => 'Espresso with caramel and milk.',
            'price' => 9.50,
            'quantity' => 20,  // Initialize quantity to 20
            'img' => 'images/caramel_macchiato.jpg',  // You can update this with your image path or URL
        ]);

        Product::create([
            'name' => 'Vanilla Latte',
            'desc' => 'Latte with vanilla syrup.',
            'price' => 10.50,
            'quantity' => 20,  // Initialize quantity to 20
            'img' => 'images/vanilla_latte.jpg',  // You can update this with your image path or URL
        ]);
    }
}
