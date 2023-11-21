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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('tipos_documento_id');
            $table->unsignedBigInteger('organismo_id');
            $table->unsignedBigInteger('institucione_id');
            $table->unsignedBigInteger('vigencia_id');
            $table->unsignedBigInteger('tema_id');
            $table->unsignedBigInteger('user_id')->nullable();

            
            $table->string('fecha_suscripcion',12);
            $table->string('archivo')->nullable();

            $table->boolean('activo')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
