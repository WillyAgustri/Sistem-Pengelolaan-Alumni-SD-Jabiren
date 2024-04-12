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
            $table->id('id_alumni');
            $table->string('name')->nullable();
            $table->string('nisn')->nullable();
            $table->integer('id_tahun')->nullable();
            $table->enum('j_kelamin', ['L', 'P'])->nullable();
            $table->string('tmpt_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('phone_num')->nullable();
            $table->string('alamat')->nullable();
            $table->text('foto')->nullable();
            $table->string('password')->nullable();
            $table->string('lnjt_sklh')->nullable();
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
