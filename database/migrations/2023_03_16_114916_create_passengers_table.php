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
        Schema::create('passengers', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_id');
            $table->string('first_name',20);
            $table->string('last_name',20);
            $table->string('age',20);
            $table->string('document_type',20)->nullable();
            $table->string('document_number',20)->nullable();
            $table->string('citizenship',20)->nullable();
            $table->string('additional_baggage',20)->nullable();
            $table->string('animal_type',20)->nullable();
            $table->string('equipment',20)->nullable();
            $table->string('user_mobility',20)->nullable();
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
        Schema::dropIfExists('passengers');
    }
};
