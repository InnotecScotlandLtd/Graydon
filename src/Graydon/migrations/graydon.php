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
        Schema::dropIfExists('graydon_events');
        Schema::create('graydon_company_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('graydonEnterpriseId')->nullable();
            $table->bigInteger('registrationId')->nullable();
            $table->bigInteger('eventId')->nullable();
            $table->date('eventDate')->nullable();
            $table->string('eventCode')->nullable();
            $table->string('oldValue')->nullable();
            $table->string('newValue')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('graydon_company_credit_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('graydonEnterpriseId')->nullable();
            $table->bigInteger('registrationId')->nullable();
            $table->longText('events')->nullable();
            $table->longText('companyProfile')->nullable();
            $table->longText('branches')->nullable();
            $table->longText('creditScores')->nullable();
            $table->longText('opportunityScores')->nullable();
            $table->longText('financialSummary')->nullable();
            $table->longText('managers')->nullable();
            $table->longText('shareholders')->nullable();
            $table->longText('participation')->nullable();
            $table->longText('groupStructure')->nullable();
            $table->longText('declarationOfLiability')->nullable();
            $table->longText('other')->nullable();
            $table->longText('xseptions')->nullable();
            $table->longText('events')->nullable();
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
        Schema::dropIfExists('graydon_company_events');
        Schema::dropIfExists('graydon_company_credit_reports');
    }
}
