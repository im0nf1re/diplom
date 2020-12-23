<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaymentDocumentAddUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_documents', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
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
            $table->dropForeign(['user_id']);
            $table->dropIndex('payment_documents_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}
