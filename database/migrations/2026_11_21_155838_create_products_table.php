<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('code', 50)->unique();
            $table->string('slug', 255)->unique();
            $table->string('type', 100);
            $table->string('description', 255)->nullable();
            $table->unsignedInteger('price_cents');
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });

        /* Add check constraint for product type (same as ProductType Enum) */
        DB::statement("ALTER TABLE products ADD CONSTRAINT products_type_check CHECK (type IN ('bookmark', 'extra'))");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
