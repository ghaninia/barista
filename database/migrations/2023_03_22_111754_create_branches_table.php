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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->boolean("is_active")->default(true);
            $table->boolean("is_central")->default(true);
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
            $table->string("instagram")->nullable();
            $table->text("address")->nullable();
            $table->decimal("latitude")->nullable();
            $table->decimal("longitude")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
