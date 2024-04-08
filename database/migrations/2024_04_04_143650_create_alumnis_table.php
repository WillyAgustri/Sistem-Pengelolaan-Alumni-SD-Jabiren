<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateAlumnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->string('nisn');
			$table->integer('id_tahun');
			$table->string('j_kelamin');
			$table->string('tmpt_lahir');
			$table->date('tgl_lahir');
			$table->string('phone_num');
			$table->string('alamat');
			$table->text('foto');
			$table->string('password');
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
        Schema::dropIfExists('alumnis');
    }
}
