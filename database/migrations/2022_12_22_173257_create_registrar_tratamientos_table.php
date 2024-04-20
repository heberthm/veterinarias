<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrarTratamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrar_tratamientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_cliente')->required();
            $table->string('user_id')->required();
            $table->string('nombre',60)->nullable();
            $table->string('celular',30)->nullable();
            $table->string('tratamientos',800)->nullable();
            $table->string('valor_tratamiento',12)->nullable();
            $table->string('saldo',12)->nullable();
            $table->string('responsable',40)->nullable();
            $table->string('estado',20)->nullable();
       

            $table->timestamps();

           // $table->index(['id']);

        //   $table->foreign('id')->references('id')->on('abonos_clientes')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrar_tratamientos');
    }
}
