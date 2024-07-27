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
        Schema::create('bus_destinations', function (Blueprint $table) {
            $table->id();
            $table->integer('bus_details_id');
            $table->string('starting_point',30);
            $table->string('arrival_point',30);
            $table->integer('ticket_price');
            $table->string('departure_time',30);
            $table->string('arrival_time',30);
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
        Schema::dropIfExists('bus_destinations');
    }
};
