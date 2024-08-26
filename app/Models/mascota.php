<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mascota extends Model
{
    protected $fillable = ['mascota','user_id','fecha_nacimiento','anos', 'meses', 'especie', 'raza',
                           'sexo', 'pelaje', 'color', 'peso','veterinario_remitente', 'alimento', 'vivienda_compartida', 'chip', 
                           'ultimo_celo', 'pedigree','fallecido', 'donante', 'transfuciones', 'reproductor', 'esterilizado', 
                           'factor_DEA', 'adopcion', 'agresividad', 'preexistecias'];


                           public function mascota(){
                            return $this->belongsTo(mascota::class);
                        }

}


