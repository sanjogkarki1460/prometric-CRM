<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->integer('applicant_id');
            $table->string('authority_name')->nullable();
            $table->string('authority_address')->nullable();
            $table->string('authority_city')->nullable();
            $table->string('authority_state')->nullable();
            $table->string('authority_country')->nullable();
            $table->string('authority_phone_type')->nullable();
            $table->string('authority_country_code')->nullable();
            $table->string('authority_phone')->nullable();
            $table->string('authority_email')->nullable();
            $table->string('authority_website')->nullable();
            $table->string('qualification')->nullable();
            $table->string('institution')->nullable();
            $table->string('type')->nullable();
            $table->string('mode')->nullable();
            $table->string('major_subject')->nullable();
            $table->string('minor_subject')->nullable();
            $table->string('roll')->nullable();
            $table->date('study_from')->nullable();
            $table->date('study_to')->nullable();
            $table->date('conferred_date')->nullable();
            $table->date('degree_issue_date')->nullable();
            $table->date('expected_degree_issue_date')->nullable();
            $table->string('qualification_certificate')->nullable();
            $table->string('marksheet')->nullable();
            $table->string('character_certificate')->nullable();
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
        Schema::dropIfExists('education');
    }
}
