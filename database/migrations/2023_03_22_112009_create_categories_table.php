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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("icon")->nullable();
            $table->string("color")->nullable();
            $table->longText("description");
            $table->longText("summary")->nullable();
            $table->timestamps();
        });

        Schema::table("categories", function (Blueprint $table) {
            $table->foreignId("category_id")->constrained("categories")->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
