<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained();
            $table->string('name')->references('name')->on('users');
            $table->string('email')->references('email')->on('users');
            $table->foreignId('kamars_id')->constrained();
            $table->string('kelas')->references('kelas')->on('kamar');
            $table->integer('jumlahkamar');
            $table->integer('jumlahorang');
            $table->date('datein');
            $table->string('dateout');
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
        Schema::dropIfExists('reservasis');
    }
}
