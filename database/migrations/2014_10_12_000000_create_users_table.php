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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedSmallInteger('admin')->default(0);

            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('city')->nullable();
            $table->string('fb')->nullable();
            $table->string('ig')->nullable();
            $table->string('about')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
