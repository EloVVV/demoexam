<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /**
         * id
         * name (varchar)
         * short_text (varchar)
         * text (text)
         * image_path (varchar)
         * price (int)
         * quantity (int)
         * is_published (bool)
         * collection_id (next migration)
         * created_at
         * updated_at
         */

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->string('short_text', 120);
            $table->text('text');
            $table->string('image_path')->default('public/images/default.png');
            $table->integer('price')->default(0);
            $table->integer('quantity')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
