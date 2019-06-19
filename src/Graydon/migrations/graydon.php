<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGraydonEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graydon_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('graydonEnterpriseId')->nullable();
            $table->string('registrationId')->nullable();
            $table->integer('eventId')->nullable();
            $table->date('eventDate')->nullable();
            $table->string('eventCode')->nullable();
            $table->string('old_value')->nullable();
            $table->string('new_value')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('graydon_events');
    }
}
