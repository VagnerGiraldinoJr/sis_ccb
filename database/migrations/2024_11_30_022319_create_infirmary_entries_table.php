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
    { Schema::create('infirmary_entries', function (Blueprint $table) {
        $table->id();
        $table->foreignId('person_id')->constrained()->onDelete('cascade');
        $table->float('temperature');
        $table->float('height');
        $table->boolean('takes_medication');
        $table->string('medication')->nullable();
        $table->boolean('has_allergies');
        $table->string('allergies')->nullable();
        $table->string('observations', 300);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infirmary_entries');
    }
};
