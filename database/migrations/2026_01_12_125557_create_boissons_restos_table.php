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
        Schema::create('boissons_restos', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('type');
            $table->decimal('prix', 8, 2);
            $table->enum('categorie', ['alcoolisee', 'sucree']);
            $table->string('image');
            $table->string('thumbnail')->nullable()->after('image');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('boissons_restos');
    }
};
