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
        Schema::create('daftar_magangs', function (Blueprint $table) {
            $table->id();
            $table->string('siswa_id', 10)->nullable();
            $table->foreign('siswa_id')->references('nisn')->on('siswas')->restrictOnDelete()->cascadeOnUpdate();
            $table->string('dudi_id', 13)->nullable();
            $table->foreign('dudi_id')->references('nib')->on('dudis')->restrictOnDelete()->cascadeOnUpdate();
            $table->string('guru_id', 18)->nullable();
            $table->foreign('guru_id')->references('nip')->on('gurus')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('keahlian_id')->constrained('keahlians')->restrictOnDelete()->cascadeOnUpdate();
            $table->enum('status', ['Editing', 'Pending', 'Pengajuan', 'Diterima', 'Ditolak'])->default('Editing');
            $table->tinyInteger('rekomendasi');
            $table->text('alasan');
            $table->string('keterangan')->nullable(); /// di isi jika Ditolak
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
        Schema::dropIfExists('daftar_magangs');
    }
};
