<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaymentDocumentAddPaymentBasisId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_documents', function (Blueprint $table) {
            $table->foreignId('payment_basis_id')->constrained();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_documents', function (Blueprint $table) {
            $table->dropForeign(['payment_basis_id']);
            $table->dropIndex('payment_documents_payment_basis_id_foreign');
            $table->dropColumn('payment_basis_id');
        });
    }
}
