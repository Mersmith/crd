<?php

use App\Models\Venta;
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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('administrador_id');
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('odontologo_id')->nullable();
            $table->unsignedBigInteger('clinica_id')->nullable();

            $table->enum('estado', [Venta::PENDIENTE, Venta::PAGADO, Venta::ANULADO])->default(Venta::PENDIENTE);
            $table->float('total');
            $table->json('contenido')->nullable();
            $table->string('puntos_usados')->nullable();
            $table->string('puntos_ganados')->nullable();
            $table->string('puntos_dinero')->nullable();
            $table->string('link')->unique();
            $table->text('observacion')->nullable();
            $table->integer('descargas')->default(0);

            $table->foreign('administrador_id')->references('id')->on('administradors');
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('odontologo_id')->references('id')->on('odontologos')->onDelete('cascade');
            $table->foreign('clinica_id')->references('id')->on('clinicas')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
