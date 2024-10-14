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
        Schema::create('avaliacao_questao', function (Blueprint $table) {
            $table->foreignId('questao_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('avaliacao_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('opcao_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['questao_id', 'avaliacao_id', 'opcao_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacao_questao');
    }
};
