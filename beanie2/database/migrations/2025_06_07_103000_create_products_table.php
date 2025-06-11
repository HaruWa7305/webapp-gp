<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('desc');
        $table->decimal('price', 8, 2);
        $table->integer('quantity')->default(20); // Set default quantity to 20  // Add this line for stock quantity
        $table->string('img')->nullable();
        $table->timestamps();
    });
}

};
