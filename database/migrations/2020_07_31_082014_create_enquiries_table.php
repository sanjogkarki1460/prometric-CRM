<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('address')->nullable();
            $table->string('subject')->nullable();
            $table->string('qualification_level')->nullable();
            $table->string('experience')->nullable();
            $table->string('country_interested')->nullable();
            $table->string('service_interested')->nullable();
            $table->string('enquiry_from')->nullable();
            $table->string('source')->nullable();
            $table->string('remarks')->nullable();
            $table->string('responded_through')->nullable();
            $table->string('eligibility')->nullable();
            $table->string('Category_id');
            $table->date('Enquired_date');
            $table->enum('Office_visited',['Yes','No'])->default('No');
            $table->Date('Visited_date')->nullable();
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
        Schema::dropIfExists('enquiries');
    }
}
