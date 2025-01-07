<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId("store_id")->constrained();
            $table->foreignId("category_id")->constrained();
            $table->foreignId("brand_id")->constrained();
            $table->foreignId("unit_id")->constrained();
            $table->string("name");
            $table->string("slug")->unique();
            $table->text("description")->nullable();
            $table->string('barcode')->unique()->nullable();
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
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
