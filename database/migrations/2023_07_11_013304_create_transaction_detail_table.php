<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaction_detail', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_barang')->required();
            $table->foreign('id_barang')->references('id')->on('barang');
            $table->uuid('id_transaksi')->required();
            $table->foreign('id_transaksi')->references('id')->on('transaction');
            $table->integer('qty'); 
            $table->float('harga'); 
            $table->float('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_detail');
    }
};
