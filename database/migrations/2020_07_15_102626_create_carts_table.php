<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateselectedbookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selectedbookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parking_id');
            $table->unsignedBigInteger('parking_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->float('price');
            $table->enum('status',['new','progress','delivered','cancel'])->default('new');
            $table->integer('hours');
            $table->float('amount');
            $table->foreign('parking_id')->references('id')->on('parkings')->onDelete('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('parking_id')->references('id')->on('bookings')->onDelete('SET NULL');
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
        Schema::dropIfExists('selectedbookings');
    }
}
