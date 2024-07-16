<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


use App\Models\mascota;


class atencion_mascotaController extends Controller
{
    
  public function atencion_mascota($id)
  {
    
                
      if(request()->ajax()) {

        //  $id = $request->id_cliente;

        $id = mascota::select("id", "user_id", "id_cliente", "mascota", "especie", "raza", "anos","sexo")
            
          
        ->where('id', '=', $id)

        ->where('user_id', Auth::user()->id);

         return datatables()->of($id)
     
         
         
                                                                    
          ->addColumn('action', 'atencion')
          ->rawColumns(['action'])
          ->addColumn('action', function($data)    {

         
            
           if (Auth::user()) {
          
            $actionBtn = '<a href="/atencion_mascota/'.$data->id.'"  "title="consulta médica" class="fa  fa-stethoscope consultaMedica" ">'.$data->id.'</a>
                    
            <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-target="#modalMostrarMascota"  title="Ver datos de mascota" class="fa fa-eye mostrar_mascota"></a> 

            <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-target="#modalEditarMascota"  title="Editar datos de mascota" class="fa fa-edit editarMascota"></a>

            <a href="javascript:void(0)" data-toggle="modal"  data-id="'.$data->id.'" title="Eliminar abono" class="fa fa-trash eliminarHistoria"></a>';
                     
          
               
           return $actionBtn;

           }
             
          })
         
          
         
          ->make(true);
      } 

      $id = collect($id); // Ensure it is a collection
     
      return view('atencion_mascota', compact('id'));
    
    //  dd($id);
    
  }








}
