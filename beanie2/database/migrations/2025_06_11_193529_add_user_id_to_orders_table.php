<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Adds the user_id column and foreign key constraint
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);  // Removes the foreign key constraint
            $table->dropColumn('user_id');  // Drops the user_id column
        });
    }
}
