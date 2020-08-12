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
            $table->enum('mrp_size_photo',['Yes','No'])->default('No');
            $table->enum('passport',['Yes','No'])->default('No');
            $table->enum('citizen',['Yes','No'])->default('No');
            $table->enum('slc_marksheet',['Yes','No'])->default('No');
            $table->enum('slc_character_certificate',['Yes','No'])->default('No');
            $table->enum('slc_certificate',['Yes','No'])->default('No');
            $table->enum('plus2certificate',['Yes','No'])->default('No');
            $table->enum('plus2transcript',['Yes','No'])->default('No');
            $table->enum('plus2character_certificate',['Yes','No'])->default('No') ;
            $table->enum('diploma_certificate',['Yes','No'])->default('No') ;
            $table->enum('diploma_transcript',['Yes','No'])->default('No');
            $table->enum('diploma_character_certificate',['Yes','No'])->default('No');
            $table->enum('equivalent_certificate',['Yes','No'])->default('No');
            $table->enum('council_registration_certificate_front',['Yes','No'])->default('No');
            $table->enum('council_registration_certificate_back',['Yes','No'])->default('No');
            $table->enum('council_good_standing_letter',['Yes','No'])->default('No');
            $table->enum('work_experience_letter1',['Yes','No'])->default('No');
            $table->enum('work_experience_letter2',['Yes','No'])->default('No');
            $table->enum('work_experience_letter3',['Yes','No'])->default('No');
            $table->enum('basic_life_support_certificate',['Yes','No'])->default('No');
            $table->enum('signed_letter_authorization',['Yes','No'])->default('No');
            $table->enum('signed_service_agreement',['Yes','No'])->default('No');

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
