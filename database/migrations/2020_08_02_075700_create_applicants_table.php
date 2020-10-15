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
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('pp_photo')->nullable();
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('maiden_name')->nullable();
            $table->string('gender');
            $table->date('dob');
            $table->string('address');
            $table->string('subject')->nullable();
            $table->string('Category_id');
            $table->string('qualification_level')->nullable();
            $table->string('experience');
            $table->string('country_interested')->nullable();
            $table->string('service_interested')->nullable();
            $table->string('identity_type');
            $table->string('citizen_no')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('nationality' )->nullable();
            $table->string('passport_docs' )->nullable();
            $table->string('status')->nullable();
            $table->string('remarks')->nullable();
            $table->enum('color_code',['whitelist','redlist','blacklist','greenlist'])->nullable();
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
