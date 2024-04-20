<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_cliente');
            $table->string('user_id');
            $table->string('mascota');
            $table->date('fecha_nacimiento');
            $table->string('anos');
            $table->string('meses');
            $table->string('especie');
            $table->string('raza');
            $table->string('sexo');
            $table->string('pelaje');
            $table->string('color');
            $table->string('peso');
            $table->string('alimento');
            $table->string('vivienda_compartida');
            $table->string('chip');
            $table->string('ultimo_celo');
            $table->string('pedigree');
            $table->string('fallecido');
            $table->string('donante');
            $table->string('transfusiones');
            $table->string('reproductor');
            $table->string('esterilizado');
            $table->string('factor_DEA');
            $table->string('adopcion');
            $table->string('agresividad');
            $table->string('preexistencia');
            $table->string('veterinario_remitente');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mascotas');
    }
}
