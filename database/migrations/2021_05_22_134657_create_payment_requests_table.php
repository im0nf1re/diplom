<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_requests', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->date('date_from');
            $table->string('company_name');
            $table->string('company_inn');
            $table->foreignId('nds_id')->constrained();
            $table->string('company_bank_bik');
            $table->string('company_bank_name');
            $table->string('company_corr_account');
            $table->string('company_rass_account');
            $table->string('payer_name');
            $table->string('payer_inn');
            $table->string('payer_bank_bik');
            $table->string('payer_bank_name');
            $table->string('payer_corr_account');
            $table->string('payer_rass_account');
            $table->decimal('sum', 12, 2);
            $table->foreignId('request_payment_kind_id')->constrained();
            $table->date('documents_send_date');
            $table->boolean('accept');
            $table->string('accept_period')->nullable();
            $table->string('payment_condition')->nullable();
            $table->text('description')->nullable();
            $table->text('nds_string')->nullable();
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
        Schema::dropIfExists('payment_requests');
    }
}
