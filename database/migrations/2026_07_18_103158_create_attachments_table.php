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
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('disk');
            $table->string('path');
            $table->string('extension');
            $table->string('mime')->nullable();
            $table->string('size');
            $table->string('original_name')->nullable();
            $table->string('type')->comment('avatar|slide|icon|attachment|cover|thumbnail|video|sound');
            $table->morphs('attachable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachments');
    }
};
