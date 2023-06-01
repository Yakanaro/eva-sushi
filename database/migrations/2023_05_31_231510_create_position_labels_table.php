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
        Schema::create('position_labels', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('label_id');

            $table->index('position_id', 'position_label_position_idx');
            $table->index('label_id', 'position_label_label_idx');

            $table->foreign('position_id', 'position_label_position_fk')->on('positions')->references('id');
            $table->foreign('label_id', 'position_label_label_fk')->on('labels')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('position_labels');
    }
};
