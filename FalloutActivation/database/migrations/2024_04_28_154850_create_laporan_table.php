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
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->char('id_user')->nullable();
            $table->string('unit');
            $table->enum('layanan', ['Indihome', 'Indibiz']);
            $table->string('order');
            $table->enum('permint', ['config', 'fallout', 'hapus_onu', 'cek_datek', 'datek_onu']);
            $table->varchar('sc', 20);
            $table->varchar('detail', 255);
            $table->enum('status', ['request open','on going progress','closed'])->default('request open');
            $table->integer('id_helpdesk')->unsigned()->nullable();
            $table->string('oleh')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
