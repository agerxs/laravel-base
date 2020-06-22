<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('status'); //status du paiement
            $table->integer('amount'); //montant
            $table->string('payment_type')->default('cinetpay'); //type de paiement (cinetpay, visa, paypal,...)
            $table->string('transaction_id'); //ID récupéré via le type de paiement
            $table->string('domain_id')->nullable()->constrained()->onDelete('set null');
            $table->string('domain')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->string("cpm_site_id")->nullable();
            $table->string("signature")->nullable();
            $table->string("cpm_custom")->nullable();
            $table->string("cpm_currency")->nullable();
            $table->string("cpm_payid")->nullable();
            $table->string("cpm_payment_date")->nullable();
            $table->string("cpm_payment_time")->nullable();
            $table->string("cpm_error_message")->nullable();
            $table->string("payment_method")->nullable();
            $table->string("cpm_phone_prefixe")->nullable();
            $table->string("cel_phone_num")->nullable();
            $table->string("cpm_ipn_ack")->nullable();
            $table->string("cpm_result")->nullable();
            $table->string("cpm_trans_status")->nullable();
            $table->string("cpm_designation")->nullable();
            $table->string("buyer_name")->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamp('updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
