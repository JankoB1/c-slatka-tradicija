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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('userEmail');
            $table->string('userName');
            $table->string('category'); // kategorija, mozda ne sme string
            $table->string('title');
            $table->string('difficulty');
            $table->string('preparationTime');
            $table->string('description');
            $table->string('ingredients');
            $table->string('preparationDescription');
            $table->string('additionalDescription');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
