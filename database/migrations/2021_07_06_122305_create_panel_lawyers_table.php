<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanelLawyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panel_lawyers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mother_name');
            $table->string('father_name');
            $table->string('email');
            $table->string('phone');
            $table->string('date_of_birth');
            $table->string('nationality');
            $table->string('religion');
            $table->date('enrollment_date');
            $table->string('bar_name');
            $table->string('membership_number');
            $table->text('chamber_address');
            $table->text('residence_address');
            $table->string('district_name');
            $table->text('specialized_practice_area');
            $table->string('experience');
            $table->string('case_conducted');
            $table->text('reference');
            $table->text('remarks');
            $table->string('status');
            $table->string('lawyer_type');
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
        Schema::dropIfExists('panel_lawyers');
    }
}
