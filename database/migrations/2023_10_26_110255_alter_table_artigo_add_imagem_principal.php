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
        Schema::table('artigo', function (Blueprint $table) {
            $table->binary('imagem_principal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('artigo', function(Blueprint $table) {
            $table->dropColumn('imagem_principal');
        });
    }
};
