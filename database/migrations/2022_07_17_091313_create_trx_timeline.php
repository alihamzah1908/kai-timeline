<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrxTimeline extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trx_timeline', function (Blueprint $table) {
            $table->bigInteger('timeline_id')->autoIncrement();
            $table->string('directorate_cd', 20)->nullable();
            $table->string('division_cd', 20)->nullable();
            $table->string('department_cd', 20)->nullable();
            $table->string('judul_pengadaan');
            $table->string('no_pengadaan', 20)->nullable();
            $table->string('sumber_dana', 20)->nullable();
            $table->string('jenis_kontrak', 20)->nullable();
            $table->string('beban_biaya', 20)->nullable();
            $table->string('pbj', 20)->nullable();
            $table->integer('nilai_pr');
            $table->integer('type_tax');
            $table->integer('nilai_tax');
            $table->datetime('start_date_pengadaan')->nullable();
            $table->datetime('end_date_pengadaan')->nullable();
            $table->string('proses_st', 50)->nullable();
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('trx_timeline');
    }
}
