<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->usigned();
            $table->integer('food_id')->usigned();
            $table->integer('qty');
            $table->integer('total');
            $table->date('order_date');
            $table->string('status')->default('on_load');
            $table->integer('livreur_id')->usigned()->nullable();
            $table->string('confirmation')->nullable();
            $table->string('is_returned')->nullable();
            $table->string('raison_return')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
