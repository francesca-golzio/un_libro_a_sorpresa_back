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
        Schema::create('digital_expansions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained()->onDelete('cascade');
            $table->string('title', 255);
            $table->string('type', 50);
            $table->string('url', 2048)->nullable();
            $table->string('file_path', 2048)->nullable();
            $table->longText('body')->nullable();
            $table->timestamps();
        });

        /* Add check constraint for digital expansions type */
        DB::statement("ALTER TABLE digital_expansions ADD CONSTRAINT digital_expansions_type_check CHECK (type IN ('text', 'pdf', 'link', 'audio'))");

        /* Add check constraint for digital expansions: url, path or body */
        DB::statement("ALTER TABLE digital_expansions ADD CONSTRAINT digital_expansions_url_or_path_or_body_check CHECK ((url IS NOT NULL AND file_path IS NULL AND body IS NULL) OR (url IS NULL AND file_path IS NOT NULL AND body IS NULL) OR (url IS NULL AND file_path IS NULL AND body IS NOT NULL))");

        /* Add check constraint for the correspondence between type and columns (url/path/body)*/
        DB::statement("ALTER TABLE digital_expansions ADD CONSTRAINT digital_expansions_type_column_correspondence_check CHECK (
        (type = 'text' AND body IS NOT NULL) OR (type IN ('pdf', 'audio') AND file_path IS NOT NULL) OR (type = 'link' AND url IS NOT NULL))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('digital_expansions');
    }
};
