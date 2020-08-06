<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthLisencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_lisences', function (Blueprint $table) {
            $table->id();
            $table->string('applicant_id');
            $table->string('professional_designation')->nullable();
            $table->string('issuing_authority_name')->nullable();
            $table->string('issuing_authority_country')->nullable();
            $table->string('issuing_authority_city')->nullable();
            $table->date('license_conferred_date')->nullable();
            $table->date('license_expiry_date')->nullable();
            $table->string('license_type')->nullable();
            $table->string('license_number')->nullable();
            $table->string('license_status')->nullable();
            $table->string('license_attained')->nullable();
            $table->string('license_copy')->nullable();
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
        Schema::dropIfExists('health_lisences');
    }
}
