<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ProgressFlow extends Model
{
    protected $fillable=['applicant_id', 'profession', 'email', 'contact_number', 'date_of_birth', 'passport_number',
            'signed_by_applicant', 'signed_docs', 'service_charge', 'service_paid_date', 'service_mode_of_payment',
        'service_charge_received_by', 'dhamcq_fee', 'dhamcq_mode_of_payment','dhamcq_fee_received_by', 'dhamcq_subject', 'dhamcq_username',
        'dhamcq_password', 'dhamcq_email_sent', 'books_provided', 'bls_training_completed_date', 'good_standing_certificate_issue_date',
        'equivalent_certificate', 'dha_email_account', 'dha_unique_id', 'dha_username', 'dha_password', 'dha_application_ref_number',
        'dha_fees_first_installment', 'first_installment_paid_date', 'first_installment_mode_of_payment', 'first_installment_received_by',
        'dha_fees_second_installment', 'second_installment_paid_date', 'second_installment_mode_of_payment', 'second_installment_received_by',
        'dataflow_email', 'dataflow_username', 'dataflow_password', 'dataflow_ref_no', 'dha_exam_eligibility_id', 'eligibility_date',
        'exam_date_confirmed', 'send_confirmation_to_candidate', 'exam_result', 'data_flow_report', 'remarks',];

    public function Applicant_ProgressFlow(){
        return $this->belongsTO('App\Admin\Applicant','applicant_id');
    }
}

