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
        Schema::create('bites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('slice_id')->constrained(table: 'slices', column: 'id')->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->text('content');
            $table->integer('position');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bites');
    }
};
