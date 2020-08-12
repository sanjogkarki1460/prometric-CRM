<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployment2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment2s', function (Blueprint $table) {
            $table->id();
            $table->integer('applicant_id');
            $table->string('issuing_authority_name')->nullable();
            $table->string('issuing_authority_address')->nullable();
            $table->string('issuing_authority_country')->nullable();
            $table->string('issuing_authority_state')->nullable();
            $table->string('issuing_authority_city')->nullable();
            $table->string('issuing_authority_country_code')->nullable();
            $table->string('issuing_authority_phone')->nullable();
            $table->string('reason_for_leaving')->nullable();
            $table->string('issuing_authority_email')->nullable();
            $table->string('issuing_authority_website')->nullable();
            $table->string('nature_of_employment')->nullable();
            $table->date('employment_from')->nullable();
            $table->date('employment_to')->nullable();
            $table->string('designation')->nullable();
            $table->string('employee_code')->nullable();
            $table->string('department')->nullable();
            $table->string('experience_letter')->nullable();
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
        Schema::dropIfExists('employment2s');
    }
}
