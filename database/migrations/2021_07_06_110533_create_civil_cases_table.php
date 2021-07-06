<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCivilCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('civil_cases', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_case_id');
            $table->string('plaintiff_name');
            $table->string('plaintiff_email');
            $table->string('plaintiff_phone');
            $table->string('plaintiff_designation');
            $table->string('subsequent_plaintiff_name');
            $table->boolean('plaintiff_to_next_hearing');
            $table->string('defendent_name');
            $table->string('defendent_phone');
            $table->string('defendent_address');
            $table->string('nature_of_the_suit');
            $table->string('property_type');
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
        Schema::dropIfExists('civil_cases');
    }
}
