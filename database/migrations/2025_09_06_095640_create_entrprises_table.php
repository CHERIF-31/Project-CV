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
        Schema::create('entrprises', function (Blueprint $table) {
            $table->id();
            $table->string('domaine');
            $table->string('description');
            $table->integer('nombre');
            $table->integer('dollar');
            $table->string('photo')->nullable();
            $table->enum('status',['success','loss','No-show'])->default('No-show');
            $table->string('pays');
            $table->string('ville');
            $table->string('adresse');
            $table->enum('temps_jop',['Part time','Full time']);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrprises');
    }
};
