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
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->string('weight');
            $table->string('height');
            $table->string('blood');
            $table->string('temp');
            for ($i = 1; $i <= 10; $i++) {
                $table->string("test{$i}")-> constrained()->nullable();
                $table->string("medi{$i}")-> constrained()->nullable();
                $table->integer("days{$i}")->nullable();
                $table->integer("frequency{$i}")->nullable();
                $table->string("time{$i}")->nullable();
                
            }
            $table->string('note')->nullable();
            $table->string('dateReExam')->nullable();
            $table->foreignId('patient_id')-> constrained()->nullable();
            $table->string('status')->default('wait');
            $table->string('image')->nullable();
            $table->string('result')->nullable();
            //$table->foreignId("medicine_id")-> constrained()->nullable();
            //$table->foreignId("service_id")->constrained()->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatments');
    }
};
