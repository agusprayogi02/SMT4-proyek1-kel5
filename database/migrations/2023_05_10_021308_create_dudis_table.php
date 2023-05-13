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
        Schema::create('dudis', function (Blueprint $table) {
            $table->string('nib', 13)->primary();
            $table->foreignId('user_id')->constrained('users')->restrictOnDelete()->cascadeOnUpdate();
            $table->string('nama_pemilik', 50);
            $table->string('alamat', 200);
            $table->string('no_telp', 15);
            $table->integer('kuota');
            $table->timestamp('verified_at')->nullable();
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
        Schema::dropIfExists('dudis');
    }
};
