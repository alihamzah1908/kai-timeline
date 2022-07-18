<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMappingType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth.mapping_type', function (Blueprint $table) {
            $table->bigInteger('mapping_id')->autoIncrement();
            $table->integer('mapping_cd');
            $table->string('type_column', 200)->nullable();
            $table->string('mapping_desc', 200)->nullable();
            $table->text('keterangan');
            $table->integer('created_by');
            $table->integer('updated_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mapping_type');
    }
}
