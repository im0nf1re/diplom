<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateKbksTablePayerStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kbks', function (Blueprint $table) {
            $table->foreignId('payer_status_id')->nullable()->change();
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
            $table->foreignId('payer_status_id')->nullable(false)->change();
        });
    }
}
