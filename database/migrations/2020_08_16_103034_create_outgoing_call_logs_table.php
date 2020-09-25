<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutgoingCallLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outgoing_call_logs', function (Blueprint $table) {
            $table->id();
            $table->enum('call_to',['Applicant','Enquiry'])->nullable();
            $table->integer('applicant_id')->nullable();
            $table->integer('enquiry_id')->nullable();
            $table->string('call_by');
            $table->string('phone');
            $table->date('date');
            $table->time('time');
            $table->string('length')->nullable();
            $table->longText('purpose')->nullable();
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
        Schema::dropIfExists('outgoing_call_logs');
    }
}
