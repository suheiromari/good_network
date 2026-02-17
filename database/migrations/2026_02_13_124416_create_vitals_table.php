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
        Schema::create('vitals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('visit_id')->constrained()->onDelete('cascade');;
            $table->decimal('respiratory_rate', 8, 2); // correct spelling
            $table->decimal('oxygen_saturation', 5, 2);
            $table->decimal('weight', 8, 2);
            $table->decimal('temperature', 4, 1);
            $table->unsignedSmallInteger('heart_rate');
            $table->unsignedSmallInteger('bp_systolic');
            $table->unsignedSmallInteger('bp_diastolic');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vitals');
    }
};
