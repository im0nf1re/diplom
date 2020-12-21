<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePaymentDocumentsAddOktmoIdAddIfnsId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_documents', function (Blueprint $table) {
            $table->foreignId('oktmo_id')->constrained();

            $table->foreignId('ifns_id')->constrained();

            $table->dropForeign(['subject_id']);
            $table->dropIndex('payment_documents_subject_id_foreign');
            $table->dropColumn('subject_id');

            $table->dropForeign(['payer_id']);
            $table->dropIndex('payment_documents_payer_id_foreign');
            $table->dropColumn('payer_id');

            $table->string('firstname');
            $table->string('surname');
            $table->string('patronymic');
            $table->string('inn');
            $table->text('address');
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
            $table->foreignId('subject_id')->constrained();

            $table->foreignId('payer_id')->constrained();

            $table->dropForeign(['oktmo_id']);
            $table->dropIndex('payment_documents_oktmo_id_foreign');
            $table->dropColumn('oktmo_id');

            $table->dropForeign(['ifns_id']);
            $table->dropIndex('payment_documents_ifns_id_foreign');
            $table->dropColumn('ifns_id');

            $table->dropColumn('firstname');
            $table->dropColumn('surname');
            $table->dropColumn('patronymic');
            $table->dropColumn('inn');
            $table->dropColumn('address');
        });
    }
}
