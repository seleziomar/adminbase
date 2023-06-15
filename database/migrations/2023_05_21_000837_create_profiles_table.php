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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(1);
            $table->foreignId('user_id')->constrained()->unique();
            $table->string('register_code')->unique();
            $table->string('name', 100);
            $table->string('cpf', 11)->nullable();
            $table->string('phone', 11)->nullable();
            $table->date('birthdate')->nullable();
            $table->string('zip_code', 8);
            $table->string('street');
            $table->integer('number');
            $table->string('neighborhood', 100);
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('complement', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
