<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'transaction_id',
        'amount',
        'status',
        'domain_id',
        'user_id',
        'domain',
        'cpm_site_id',
        'signature',
        'cpm_custom',
        'cpm_currency',
        'cpm_payid',
        'cpm_payment_time',
        'cpm_payment_date',
        'cpm_error_message',
        'payment_method',
        'cpm_phone_prefixe',
        'cpm_phone_num',
        'cpm_ipn_ack',
        'cpm_result',
        'cpm_trans_status',
        'cpm_designation',
        'buyer_name',

    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
