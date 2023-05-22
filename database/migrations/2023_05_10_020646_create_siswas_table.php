<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->string('nisn', 10)->primary();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('kelas_id')->constrained('kelas')->restrictOnDelete()->cascadeOnUpdate();
            $table->string('smk_id', 8)->nullable();
            $table->foreign('smk_id')->references('npsn')->on('smks')->restrictOnDelete()->cascadeOnUpdate();
            $table->string('nama', 60);
            $table->string('alamat', 200);
            $table->string('no_telp', 15);
            $table->enum('gender', ['L', 'P']);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('agama', 50);
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
        Schema::dropIfExists('siswas');
    }
};
