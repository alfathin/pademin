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
        Schema::create('monitorings', function (Blueprint $table) {
            $table->id();  // ID unik untuk monitoring
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade');  // Foreign key dari tabel rooms
            $table->foreignId('device_id')->nullable()->constrained('devices')->onDelete('cascade');  // Foreign key dari tabel devices
            $table->float('temperature')->nullable();  // Suhu ruangan
            $table->integer('smoke_level')->nullable();  // Level asap
            $table->float('water_pressure')->nullable();  // Tekanan air
            $table->integer('battery_percentage')->nullable();  // Persentase baterai
            $table->integer('servo_sensitivity')->nullable();  // Sensitivitas servo
            $table->timestamps();  // Menambahkan created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitorings');
    }
};
