<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncommingCallLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomming_call_logs', function (Blueprint $table) {
            $table->id();
            $table->enum('call_by',['Applicant','Enquiry']);
            $table->integer('applicant_id')->nullable();
            $table->integer('enquiry_id')->nullable();
            $table->string('phone');
            $table->date('date');
            $table->time('time');
            $table->string('length')->nullable();
            $table->longText('porpose')->nullable();
            $table->longText('remarks')->nullable();
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
        Schema::dropIfExists('incomming_call_logs');
    }
}
