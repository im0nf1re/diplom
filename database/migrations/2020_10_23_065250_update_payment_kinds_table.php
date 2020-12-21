<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePaymentKindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_kinds', function (Blueprint $table) {
            $table->dropForeign(['payer_type_id']);
            $table->dropIndex('payment_kinds_payer_type_id_foreign');
            $table->dropColumn('payer_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_kinds', function (Blueprint $table) {
            $table->foreignId('payer_type_id')->constrained();
        });
    }
}
