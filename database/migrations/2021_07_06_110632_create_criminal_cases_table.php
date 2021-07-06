<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriminalCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminal_cases', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_case_id');
            $table->integer('police_station_id');
            $table->string('complaint_name');
            $table->string('subsequent_complaint_name');
            $table->string('complaint_email');
            $table->string('complaint_phone');
            $table->string('complaint_designation');
            $table->string('accused_name');
            $table->string('accused_phone');
            $table->string('accused_address');
            $table->text('allegation');
            $table->boolean('complaint_to_next_hearing');
            $table->boolean('panel_lawyer_to_next_hearing');
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
        Schema::dropIfExists('criminal_cases');
    }
}
