<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrxSp3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trx_sp3', function (Blueprint $table) {
            $table->bigInteger('sp3_id')->autoIncrement();
            $table->integer('timeline_id');
            $table->string('directorate_cd', 20)->nullable();
            $table->string('division_cd', 20)->nullable();
            $table->string('department_cd', 20)->nullable();
            $table->string('judul_pengadaan', 200)->nullable();
            $table->string('no_sp3', 20)->nullable();
            $table->string('no_pr', 20)->nullable();
            $table->timestamp('tanggal_pr');
            $table->string('pr_sign_by', 20)->nullable();
            $table->integer('nilai_pr');
            $table->integer('type_tax');
            $table->integer('nilai_tax');
            $table->string('no_mi', 20)->nullable();
            $table->timestamp('tanggal_justifikasi');
            $table->string('no_rab', 20)->nullable();
            $table->timestamp('tanggal_rab');
            $table->string('no_kak', 20)->nullable();
            $table->timestamp('tanggal_kak');
            $table->string('proses_st', 50)->nullable();
            $table->integer('type_metode');
            $table->string('nama_vendor');
            $table->text('keterangan');
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
        Schema::dropIfExists('trx_sp3');
    }
}
