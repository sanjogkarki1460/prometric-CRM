<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('applicant_id');
            $table->enum('password_citizenship_certificate',['Yes','No'])->default('No');
            $table->enum('slc_certificate',['Yes','No'])->default('No');
            $table->enum('plus_two_isc_pcl_certificate',['Yes','No'])->default('No');
            $table->enum('diploma_degree_certificate',['Yes','No'])->default('No');
            $table->enum('mark_sheet_of_each_year_final_transcript',['Yes','No'])->default('No');
            $table->enum('equivalent_certificate',['Yes','No'])->default('No');
            $table->enum('council_registration_certificate',['Yes','No'])->default('No');
            $table->enum('council_registration_certificate_renew',['Yes','No'])->default('No');
            $table->enum('good_standing_letter_from_council',['Yes','No'])->default('No');
            $table->enum('work_experience_letter_till_date',['Yes','No'])->default('No');
            $table->enum('basic_life_support_for_nurses',['Yes','No'])->default('No');
            $table->enum('mrp_size_photo_in_white_background',['Yes','No'])->default('No');
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
        Schema::dropIfExists('check_lists');
    }
}
