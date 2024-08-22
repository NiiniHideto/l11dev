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
        Schema::create('pera_ones', function (Blueprint $table) {
            $table->id();
            $table->string('user_id', 100)->index('user_id');
            $table->string('str_a', 400)->nullable()->default(null);
            $table->string('str_b', 400)->nullable()->default(null);
            $table->string('str_c', 400)->nullable()->default(null);
            $table->string('pic_a', 100)->nullable()->default(null);
            $table->string('pic_b', 100)->nullable()->default(null);
            $table->string('pic_c', 100)->nullable()->default(null);
            $table->string('theme', 100)->nullable()->default('sample001');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pera_ones');
    }
};
