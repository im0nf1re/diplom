<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateKbkTableDeletePayerStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kbks', function (Blueprint $table) {
            $table->dropForeign(['payer_status_id']);
            $table->dropIndex('kbks_payer_status_id_foreign');
            $table->dropColumn('payer_status_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kbks', function (Blueprint $table) {
            $table->foreignId('payer_status_id')->constrained();
        });
    }
}
