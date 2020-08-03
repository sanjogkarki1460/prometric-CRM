<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middel_name')->nullable();
            $table->string('surname' );
            $table->string('maiden_name')->nullable();
            $table->string('gender');
            $table->date('dob');
            $table->string('identity_type');
            $table->string('identity_card_no')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('birth_country');
            $table->string('country_code')->nullable();
            $table->string('mobile_no' );
            $table->string('current_country')->nullable();
            $table->string('nationality' )->nullable();
            $table->string('email' );
            $table->string('passport_docs' )->nullable();
            $table->string('applicant_category' );
            $table->string('services_id' )->nullable();
            $table->string('enquired');
            $table->string('enquired_id')->nullable();
            $table->string('progress_sts')->nullable();
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
        Schema::dropIfExists('applicants');
    }
}
