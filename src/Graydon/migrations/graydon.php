<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGraydonMigrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // table for monitoring events related to companies
        Schema::create('graydon_company_monitoring_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('graydonEnterpriseId');
            $table->bigInteger('registrationId');
            $table->bigInteger('eventId');
            $table->date('eventDate');
            $table->string('eventCode');
            $table->string('oldValue');
            $table->string('newValue');
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
        Schema::dropIfExists('graydon_company_monitoring_events');
    }
}
