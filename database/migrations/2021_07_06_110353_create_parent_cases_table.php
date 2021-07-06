<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_cases', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('program_id');
            $table->string('district_name');
            $table->integer('case_status_id');
            $table->integer('case_category_id');
            $table->integer('court_id');
            $table->integer('nature_id');
            $table->integer('panel_lawyer_id');
            $table->integer('case_no');
            $table->integer('ref_case_no');
            $table->date('case_year');
            $table->string('amount_of_money');
            $table->text('area');
            $table->text('loaction');
            $table->string('branch');
            $table->string('region');
            $table->string('issue_no');
            $table->date('filing_date');
            $table->date('next_date');
            $table->integer('next_date_for');
            $table->date('date_of_incident');
            $table->string('identify_first');
            $table->date('identification_date');
            $table->text('laws_section');
            $table->integer('brac_pin');
            $table->date('disbursement_date');
            $table->date('last_date_of_cash_reciept');
            $table->integer('last_court_order');
            $table->integer('additional_order');
            $table->text('case_notes');
            $table->date('disposed_date');
            $table->integer('billing_id');
            $table->text('relavent_law_section');
            $table->string('files')->nullable();
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
        Schema::dropIfExists('parent_cases');
    }
}
