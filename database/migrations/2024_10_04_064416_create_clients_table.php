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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name')->required();
            $table->string('phone')->required();
            $table->string('email')->required();
            $table->string('gender')->required();
            $table->string('address')->nullable();
            $table->string('facebook_review')->nullable();
            $table->string('google_review')->nullable();
            $table->string('page_number')->nullable();
            $table->string('client_photo')->nullable();
            $table->string('services')->nullable();
            $table->string('status')->nullable();
            $table->string('facebook_profile_link')->nullable();
            $table->string('date_of_birth')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
