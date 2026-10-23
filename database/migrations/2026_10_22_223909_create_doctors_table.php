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
        Schema::create('doctors', function (Blueprint $table) {
           
            $table->foreignId('specialities_id')->constrained('specialities')
                ->cascadeonDelete;
        
            $table->id();
            $table->string('name');
            $table->string('crm')->unique();
            $table->string('phone');
            $table->time('work_start_time');
            $table->time('work_end_time');
            $table->integer('slot_duration');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
