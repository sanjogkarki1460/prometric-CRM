<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressFlowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress_flows', function (Blueprint $table) {
            $table->id();
            $table->integer('applicant_id');
            $table->string('profession');
            $table->string('email');
            $table->string('contact_number');
            $table->date('date_of_birth');
            $table->string('passport_number');
            $table->string('signed_by_applicant');
            $table->string('signed_docs')->nullable();
            $table->double('service_charge');
            $table->date('service_paid_date');
            $table->string('service_mode_of_payment');
            $table->string('service_charge_received_by');
            $table->double('dhamcq_fee');
            $table->string('dhamcq_mode_of_payment');
            $table->string('dhamcq_subject');
            $table->string('dhamcq_username');
            $table->string('dhamcq_password');
            $table->string('dhamcq_email_sent');
            $table->string('books_provided');
            $table->date('bls_training_completed_date');
            $table->date('good_standing_certificate_issue_date');
            $table->string('equivalent_certificate');
            $table->string('dha_email_account');
            $table->string('dha_unique_id');
            $table->string('dha_username');
            $table->string('dha_password');
            $table->string('dha_application_ref_number');
            $table->double('dha_fees_first_installment');
            $table->date('first_installment_paid_date');
            $table->string('first_installment_mode_of_payment');
            $table->string('first_installment_received_by');
            $table->double('dha_fees_second_installment');
            $table->date('second_installment_paid_date');
            $table->string('second_installment_mode_of_payment');
            $table->string('second_installment_received_by');
            $table->string('dataflow_email');
            $table->string('dataflow_username');
            $table->string('dataflow_password');
            $table->integer('dataflow_ref_no');
            $table->string('dha_exam_eligibility_id');
            $table->date('eligibility_date');
            $table->date('exam_date_confirmed');
            $table->string('send_confirmation_to_candidate');
            $table->string('exam_result');
            $table->string('data_flow_report');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('progress_flows');
    }
}
