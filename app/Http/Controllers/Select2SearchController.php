<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\ModelNotFoundException;  

use App\Models\Cliente;
use App\Models\controles;
use App\models\profesionales;
use App\models\terapias;
use App\models\terapias_adicionales;




class Select2SearchController extends Controller
{

    public function index()
    {
    	return view('cliente');
    }

    public function selectSearch(Request $request)
    {
    	

        if($request->has('q')){
            $search = $request->q;
          
            $cliente =Cliente::select("user_id", "id_cliente", "cedula", "nombre", "celular", "estado")
                   
            		->where('nombre',  'LIKE', "%${search}%" )
              //  ->orwhere('cedula', 'LIKE', "%$search%")
                ->where('estado', 1)
                   // ->orWhere('cedula', 'LIKE', "%{$search}%") 
            		->get();
        }
        return response()->json($cliente);
        
    }

  
    public function mostrarCliente($id_clientes) 
   {

    $id_clientes = Cliente::join('mascotas', 'mascotas.id_cliente', '=', 'clientes.id_cliente')
    ->select('clientes.id_cliente', 'clientes.user_id', 'clientes.id_cliente', 'clientes.cedula', 'clientes.nombre',  'clientes.celular', 
    'clientes.direccion', 'clientes.barrio', 'clientes.email', 'clientes.edad', 'clientes.fecha_nacimiento', 'clientes.municipio','clientes.estado',
    'mascotas.id','mascotas.user_id', 'mascotas.id_cliente', 'mascotas.mascota',  'mascotas.fecha_nacimiento', 'mascotas.anos', 'mascotas.especie', 
    'mascotas.raza', 'mascotas.sexo', 'mascotas.pelaje', 'mascotas.color', 'mascotas.peso',  'mascotas.alimento', 'mascotas.vivienda_compartida',
     'mascotas.chip', 'mascotas.ultimo_celo',  'mascotas.ultimo_celo', 'mascotas.pedigree', 'mascotas.fallecido',  'mascotas.donante', 
     'mascotas.transfusiones', 'mascotas.reproductor', 'mascotas.esterilizado', 'mascotas.factor_DEA', 'mascotas.adopcion', 
     'mascotas.agresividad', 'mascotas.preexistencia', 'mascotas.veterinario_remitente', 'mascotas.created_at')

    ->where('clientes.id_cliente',  $id_clientes)
   
    ->get();


    if($id_clientes === null){
   // $id_cliente = cliente::where('id_cliente',  $id_cliente)->firstOrFail();

   
    return Redirect()->Route('inicio');

} else {


    $profesionales = profesionales::select('id','nombre')->get(); 
    $terapias = terapias::select('id','terapia')->get();
    $terapias_adicionales = terapias_adicionales::select('id','terapias_adicionales')->get();
    $controles = controles::select()->get(); 

    
    return view('cliente', compact('id_clientes', 'profesionales', 'terapias', 'terapias_adicionales', 'controles'));
   
 }

    
       
  } 
 
}