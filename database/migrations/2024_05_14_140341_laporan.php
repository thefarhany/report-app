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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('no_tgl_sp');
            $table->string('no_tgl_spmk');
            $table->string('rekanan');
            $table->string('tgl_mulai');
            $table->string('tgl_selesai');
            $table->float('lapju_lalu', 5, 2);
            $table->float('lapju_rencana', 5, 2);
            $table->float('lapju_pelaksanaan', 5, 2);
            $table->float('daya_serap', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
