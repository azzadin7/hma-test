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
        Schema::create('theme', function (Blueprint $table) {
            $table->bigInteger('theme_id')->primary;
            $table->string('theme_name', 100);
            $table->string('theme_code', 32);
            $table->string('theme_direction', 5);
            $table->string('theme_from', 32);
            $table->string('theme_via', 32);
            $table->string('theme_to', 32);
            $table->tinyInteger('theme_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theme');
    }
};
