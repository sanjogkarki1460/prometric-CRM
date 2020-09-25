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
            $table->string('profession')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_number')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('signed_by_applicant')->nullable();
            $table->string('signed_docs')->nullable();
            $table->double('service_charge')->nullable();
            $table->date('service_paid_date')->nullable();
            $table->string('service_mode_of_payment')->nullable();
            $table->string('service_charge_received_by')->nullable();
            $table->double('dhamcq_fee')->nullable();
            $table->string('dhamcq_mode_of_payment')->nullable();
            $table->string('dhamcq_fee_received_by')->nullable();
            $table->string('dhamcq_subject')->nullable();
            $table->string('dhamcq_username')->nullable();
            $table->string('dhamcq_password')->nullable();
            $table->string('dhamcq_email_sent')->nullable();
            $table->string('books_provided')->nullable();
            $table->date('bls_training_completed_date')->nullable();
            $table->date('good_standing_certificate_issue_date')->nullable();
            $table->string('equivalent_certificate')->nullable();
            $table->string('dha_email_account')->nullable();
            $table->string('dha_unique_id')->nullable();
            $table->string('dha_username')->nullable();
            $table->string('dha_password')->nullable();
            $table->string('dha_application_ref_number')->nullable();
            $table->double('dha_fees_first_installment')->nullable();
            $table->date('first_installment_paid_date')->nullable();
            $table->string('first_installment_mode_of_payment')->nullable();
            $table->string('first_installment_received_by')->nullable();
            $table->double('dha_fees_second_installment')->nullable();
            $table->date('second_installment_paid_date')->nullable();
            $table->string('second_installment_mode_of_payment')->nullable();
            $table->string('second_installment_received_by')->nullable();
            $table->string('dataflow_email')->nullable();
            $table->string('dataflow_username')->nullable();
            $table->string('dataflow_password')->nullable();
            $table->integer('dataflow_ref_no')->nullable();
            $table->string('dha_exam_eligibility_id')->nullable();
            $table->date('eligibility_date')->nullable();
            $table->date('exam_date_confirmed')->nullable();
            $table->string('send_confirmation_to_candidate')->nullable();
            $table->string('exam_result')->nullable();
            $table->string('data_flow_report')->nullable();
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
