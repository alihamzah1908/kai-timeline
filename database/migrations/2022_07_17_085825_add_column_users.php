<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->string('level_cd', 20)->nullable();
            $table->string('users_cd', 20)->nullable();
            $table->string('department_cd', 20)->nullable();
            $table->string('division_cd', 20)->nullable();
            $table->string('directorate_cd', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
