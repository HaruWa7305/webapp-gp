<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    DB::table('products')->update(['quantity' => 20]);
}

public function down()
{
    DB::table('products')->update(['quantity' => 0]); // Optional: you can revert it to 0 or some default value
}

};
