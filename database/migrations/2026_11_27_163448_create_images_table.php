<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('box_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('packaging_option_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('card_model_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('path', 255)->unique();
            $table->string('alt_text', 255)->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });

        /* Check constraint to ensure that at least one and only one foreign key is set */
        DB::statement("ALTER TABLE images ADD CONSTRAINT images_one_fk_no_more_no_less_check CHECK (
            (book_id IS NOT NULL AND box_id IS NULL AND product_id IS NULL AND packaging_option_id IS NULL AND card_model_id IS NULL) OR
            (book_id IS NULL AND box_id IS NOT NULL AND product_id IS NULL AND packaging_option_id IS NULL AND card_model_id IS NULL) OR
            (book_id IS NULL AND box_id IS NULL AND product_id IS NOT NULL AND packaging_option_id IS NULL AND card_model_id IS NULL) OR
            (book_id IS NULL AND box_id IS NULL AND product_id IS NULL AND packaging_option_id IS NOT NULL AND card_model_id IS NULL) OR
            (book_id IS NULL AND box_id IS NULL AND product_id IS NULL AND packaging_option_id IS NULL AND card_model_id IS NOT NULL))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};