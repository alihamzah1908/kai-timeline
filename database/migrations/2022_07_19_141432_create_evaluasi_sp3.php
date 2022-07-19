<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluasiSp3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trx_eval_sp3', function (Blueprint $table) {
            $table->bigInteger('eval_sp3_id')->autoIncrement();
            $table->integer('sp3_id')->nullable();
            $table->integer('item_cd')->nullable();
            $table->string('item_value', 200)->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluasi_sp3');
    }
}
