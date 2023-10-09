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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->foreignId("tipe_id")->constrained();
            $table->foreignId("area_id")->constrained();
            $table->foreignId("pemilik_id")->constrained();
            $table->integer("per_jam")->nullable();
            $table->integer("harian")->nullable();
            $table->integer("mingguan")->nullable();
            $table->integer("bulanan")->nullable();
            $table->integer("tahunan")->nullable();
            $table->integer("luas_bangunan")->nullable();
            $table->integer("kamar")->nullable();
            $table->integer("kamar_mandi")->nullable();
            $table->integer("dapur")->nullable();
            $table->integer("akses_mobil")->nullable();
            $table->integer("carport")->nullable();
            $table->integer("pagar")->nullable();
            $table->integer("lemari")->nullable();
            $table->integer("kipas_angin")->nullable();
            $table->integer("AC")->nullable();
            $table->integer("TV")->nullable();
            $table->integer("karaoke")->nullable();
            $table->integer("BBQ")->nullable();
            $table->string("name")->unique();
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
};
