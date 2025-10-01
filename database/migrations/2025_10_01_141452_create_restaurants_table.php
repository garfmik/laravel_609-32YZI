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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('city', 100);
            $table->text('address');
            $table->string('phone', 20)->nullable();
            $table->string('cuisine', 100)->nullable();
            $table->integer('avg_price')->nullable();
            $table->string('work_hours', 100)->nullable();
            $table->binary('img')->nullable();
            $table->float('rating')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
