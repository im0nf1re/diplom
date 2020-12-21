<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePaymentBasisPaymentNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_basis_payment_name', function (Blueprint $table) {
            $table->dropForeign(['payment_name_id']);
            $table->dropIndex('payment_basis_payment_name_payment_name_id_foreign');
            $table->dropColumn('payment_name_id');
        });

        Schema::rename('payment_basis_payment_name', 'payer_type_payment_basis');

        Schema::table('payer_type_payment_basis', function (Blueprint $table) {
            $table->foreignId('payer_type_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payer_type_payment_basis', function (Blueprint $table) {
            $table->dropForeign(['payer_type_id']);
            $table->dropIndex('payer_type_payment_basis_payer_type_id_foreign');
            $table->dropColumn('payer_type_id');
        });

        Schema::rename('payer_type_payment_basis', 'payment_basis_payment_name');

        Schema::table('payment_basis_payment_name', function (Blueprint $table) {
            $table->foreignId('payment_name_id')->constrained();
        });
    }
}
