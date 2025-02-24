<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('rental_periods', function (Blueprint $table) {
            $table->id();
            $table->integer('months'); // e.g., 3, 6, 12
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('rental_periods');
    }
};
