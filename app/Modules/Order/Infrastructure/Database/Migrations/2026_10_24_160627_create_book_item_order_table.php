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
        Schema::create('book_item_order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_item_id');
            $table->integer('count');
            $table->integer('total_discount'); // the total discount of that item, eg: if I have ordered 2 items so the total doscount of these two data
            $table->foreignId('order_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_item_order');
    }
};
