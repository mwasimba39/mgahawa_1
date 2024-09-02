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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Muunganisho na user
            $table->foreignId('food_id')->constrained('foods')->onDelete('cascade'); // Muunganisho na chakula
            $table->string('customer_name'); // Jina la mteja
            $table->string('customer_email'); // Barua pepe ya mteja
            $table->dateTime('arrival_time'); // Muda wa kufika
            $table->integer('amount'); // Kiasi cha chakula
            $table->string('payment_method'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
