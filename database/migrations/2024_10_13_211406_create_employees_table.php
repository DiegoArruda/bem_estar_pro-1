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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date_birth');
            $table->enum('gender',['f','m']);
            $table->string('email')->unique();
            $table->char('cpf', 11)->unique();
            $table->string('photo')->nullable();
            $table->string('role');
            $table->enum('status',['on','off']);
            $table->foreignId('department_id')->constrained()->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('user_id')->constrained()->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
