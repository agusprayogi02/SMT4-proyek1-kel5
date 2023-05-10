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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->string('siswa_id', 10)->nullable();
            $table->foreign('siswa_id')->references('nisn')->on('siswas')->restrictOnDelete()->cascadeOnUpdate();
            $table->string('dudi_id', 13)->nullable();
            $table->foreign('dudi_id')->references('nib')->on('dudis')->restrictOnDelete()->cascadeOnUpdate();
            $table->integer('avg');
            $table->integer('total');
            $table->boolean('applied_job')->default(false);
            $table->string('sertifikat')->nullable();
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
        Schema::dropIfExists('nilais');
    }
};
