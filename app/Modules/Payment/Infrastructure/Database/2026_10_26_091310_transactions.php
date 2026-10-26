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
        Schema::create('transactions', function(Blueprint $table){
            $table->id();
            $table->foreignId('order_id')->constrained();
            $table->integer('amount');
            $table->string('status')->default('pending');
            $table->string('callback');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('description')->nullable();
            $table->string('authority')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
