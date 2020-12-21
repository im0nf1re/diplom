<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKbksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kbks', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->decimal('price');
            $table->foreignId('payer_status_id')->constrained();
            $table->foreignId('payment_name_id')->constrained();
            $table->foreignId('payment_type_id')->constrained();
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
        Schema::dropIfExists('kbks');
    }
}
