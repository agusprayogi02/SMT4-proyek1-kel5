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
        Schema::create('dudi_keahlians', function (Blueprint $table) {
            $table->id();
            $table->string('dudi_id', 13)->nullable();
            $table->unsignedBigInteger('keahlian_id')->nullable();
            $table->foreign('dudi_id')->references('nib')->on('dudis')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreign('keahlian_id')->references('id')->on('keahlians');
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
        Schema::dropIfExists('dudi_keahlians');
    }
};
