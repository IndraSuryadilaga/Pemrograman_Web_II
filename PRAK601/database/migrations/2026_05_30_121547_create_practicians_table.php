<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('practicians', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('nim', 20)->unique();
            $table->string('study_program');
            $table->string('hobby')->nullable();
            $table->json('skills')->nullable();
            $table->string('email')->nullable();
            $table->string('github_url')->nullable();
            $table->text('bio')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('practicians');
    }
};
