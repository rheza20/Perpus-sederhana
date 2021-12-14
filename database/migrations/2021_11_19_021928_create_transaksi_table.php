<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string("tag_id",12);
            $table->string("nama");
            $table->string("hp");
            $table->unsignedBigInteger("kode_buku");
            $table->string("jdl_buku");
            $table->date("pinjam");
            $table->date("kembali");
            $table->enum("status",["dipinjam","selesai"]);
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
        Schema::dropIfExists('transaksi');
    }
}
