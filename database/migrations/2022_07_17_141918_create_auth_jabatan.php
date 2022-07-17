<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthJabatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth.jabatan', function (Blueprint $table) {
            $table->bigInteger('level_id')->autoIncrement();
            $table->string('level_cd', 200)->nullable();
            $table->string('level_name', 20)->nullable();
            $table->string('level_hierarchy', 20)->nullable();
            $table->string('created_by', 200)->nullable();
            $table->string('updated_by', 200)->nullable();
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
        Schema::dropIfExists('auth.jabatan');
    }
}
