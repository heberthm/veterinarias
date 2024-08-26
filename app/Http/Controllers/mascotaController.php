<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidarFormularioRequest;

use Yajra\DataTables\Facades\DataTables;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


use Redirect,Response;


use App\Models\mascota;

use App\Models\Cliente;





class mascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      
    
      $user = auth()->user();
                
        if(request()->ajax()) {

          //  $id = $request->id_cliente;

       //   $id = mascota::select("id", "user_id", "id_cliente", "mascota", "especie", "raza", "anos","sexo")


       $id_clientes = cliente::join('mascotas', 'mascotas.id_cliente', '=', 'clientes.id_cliente')
       ->select('clientes.id_cliente', 'clientes.user_id', 'clientes.cedula', 'clientes.nombre',  'clientes.celular', 'clientes.estado',
       'clientes.direccion', 'clientes.barrio', 'clientes.email', 'clientes.edad', 'clientes.fecha_nacimiento', 'clientes.municipio',
       'mascotas.mascota', 'mascotas.id', 'mascotas.id_cliente', 'mascotas.especie', 'mascotas.raza', 'mascotas.anos', 'mascotas.sexo', 'mascotas.created_at')
 
            
          ->where('clientes.id_cliente', '=', $id_clientes)

          ->where('clientes.user_id', Auth::user()->id);

           return datatables()->of($id)

      
               
                                                                      
            ->addColumn('action', 'atencion')
            ->rawColumns(['action'])
            ->addColumn('action', function($data)  {
 
            
        

              $actionBtn = '<a href="/mascotas/'.$data->id.'"    title="Ver datos de mascota" class="fa fa-list "></a>
           
             
              <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-target="#modalMostrarMascota"  title="Ver datos de mascota" class="fa fa-eye mostrar_mascota"></a> 

              <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-target="#modalEditarMascota"  title="Editar datos de mascota" class="fa fa-edit editarMascota"></a>


              <a href="javascript:void(0)" data-toggle="modal"  data-id="'.$data->id.'" title="Eliminar abono" class="fa fa-trash eliminarHistoria"></a>';
          
              
                        
                 
              return $actionBtn;

            
               
            })
           
           
            ->make(true);
        } 

       
        return view('mascotas', compact('id_clientes'));
       // dd($id_cliente);
      
    }

    


    public function buscarMascota(Request $request)
    {
     
        try{
            $data = mascota::where("id_cliente",$request->id_cliente)->get(["id", "id_cliente", "nombre", "especie"]);
       
        } catch (\Exception  $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

          return response()->json($data);
     

    }


  //evets


    public function mostrarMascotas($id)
    {

       
      try{ 
        // $id_clientes = Mascota::where('id_cliente',$id_clientes)->get('id', 'id_cliente','nombre','raza', 'especie', 'edad', 'color', 'sexo');
 
        $mascotas = mascota::select('id', 'id_cliente','nombre','raza', 'especie', 'edad', 'peso', 'color', 'sexo')->where('id', $id)->get(); 

        } catch (\Exception  $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return view('inicio', compact('mascotas'));

     /*
        if($request->ajax()){
            $id_clientes = Mascota::all();
              return response()->json([
                 'success' => true,
                  'id_clientes' => $id_clientes
              ]);
           
        }
        return view('cliente' );
      */  
   }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
      try{  

        
         $data = new mascota;
 
  
          $data -> user_id = $request->userId;
          $data -> id_cliente = $request->id_cliente;
          $data->mascota = $request->mascota;                
          $data->fecha_nacimiento = $request->fecha_nacimiento;
          $data->anos = $request->anos;
          $data->meses = $request->meses;
          $data->especie = $request->especie;
          $data->raza = $request->raza;
          $data->sexo = $request->sexo;
          $data->peso = $request->peso;
          $data->pelaje = $request->pelaje;
          $data->alimento = $request->alimentacion;
          $data->vivienda_compartida = $request->vivienda;
          $data->factor_DEA = $request->factor_DEA;
          $data->chip = $request->chip;
          $data->preexistencia = $request->preexistencia;
       
          $data->color = $request->color;

          $data->veterinario_remitente = $request->veterinario_remitente;
          $data->ultimo_celo = $request->ultimo_celo;
          $data->pedigree =($request->pedigree) ? '1' : '0';
          $data->esterilizado = ($request->esterilizado) ? '1' : '0';
          $data->fallecido = ($request->fallecido) ? '1' : '0';
          $data->donante = ($request->donante) ? '1' : '0';
          $data->reproductor = ($request->reproductor) ? '1' : '0';
          $data->transfusiones = ($request->transfusiones) ? '1' : '0';
          $data->adopcion = ($request->adopcion) ? '1' : '0';
          $data->agresividad = $request->agresividad;
        
  
          
       $data->save();

        } catch (\Exception  $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

          return response()->json(['success'=>'Successfully']);
           
          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
     public function show($id)
     {
       $id_mascota  = mascota::find($id);
       return response()->json($id_mascota);
     
     }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
     public function update(Request $request, $id_cliente)
     { 
       
       try{
         $id = array('id' => $request->id);
         $updateArray = [
                         'mascota' => $request->mascota,
                         'fecha_nacimiento' => $request->fecha_nacimiento,
                         'años' => $request->años,
                         'meses' => $request->meses,
                         'especie' => $request->especie,
                         'raza' => $request->raza,
                         'sexo' => $request->sexo,
                         'pelaje' => $request->pelaje,
 
                         'peso' => $request->peso,
                         'esterilizado' => $request->esterilizado,
                         'alimento' => $request->alimento,
                         'vivienda_compartida' => $request->vivienda_compartida,
                         'veterinario_remitente' => $request->veterinario_remitente,
 
                         'chip' => $request->chip,
                         'ultimo_celo' => $request->ultimo_celo,
                         'pedigree' => $request->pedigree,
                         'fallecido' => $request->fallecido,
                         'donante' => $request->donante,
                         'fallecido' => $request->fallecido,
                         'transfuciones' => $request->transfuciones,
                         'reproductor' => $request->reproductor,
                         'factor_DEA' => $request->factor_DEA,
                         'adopcion' => $request->adopcion,
                         'agresividad' => $request->agresividad,
                         'preexistencia' => $request->preexistencia,
                         'foto' => $request->foto,
                         

                        
                        ];
           
           $id_cliente  = mascota::where($id)->update($updateArray);
  
         } catch (\Exception  $exception) {
             return back()->withError($exception->getMessage())->withInput();
         }
 
           return response()->json(['success'=>'Successfully']);
      
         
     } 
 


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mascota::find($id)->delete();
     
        return response()->json(['success'=>'Mascota eliminado correctamente.']);
    }
  


}