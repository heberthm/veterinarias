@extends('layouts.app')


@section('content')

<style>
  .select2-multpie {
    background-color: #f5f5f5 !important;
  }


  a.editable-click {
    color: #007bff;
    border-color: #007bff;
    text-decoration: none;
  }

  a.editable-click.editable-disabled {
    color: black;
    border-bottom: none;
    text-decoration: none;
  }

  a.editable-empty {
    color: gray;
    font-style: italic;
  }



  /*

thead {
  display:none;
}

*/
</style>

<!-- Content Header (Page header) -->
<br>


<div class="container-fluid">

  <div class="row">

    <!--
          <div class="col-sm-6">
            <h1 class="m-0">Clientes</h1>
          </div><!-- /.col -->

    <!--

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Clientes</li>
            </ol>
          </div><!-- /.col -->





  </div>





  <div class="row">
    <div class="col-lg-8">
      <div class="card card-light">
        <div class="card-header">
          <h3 class="card-title"><span style="color:#28a745;" class="fas fa-paw mr-3"></span>Listado de mascotas</h3>




          <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalAgregarHistoriaClinica">
            <span class="fa fa-plus fa-fw" tabindex="3"></span> Agregar mascota
          </button>




        </div>



        <div class="card-body">

          <!-- ==========================

DATATABLE HISTÓRIAS ClÍNICAS

============================== -->

          @forelse($id_clientes as $id_cliente)


          @empty

          @endforelse



          <div class="row">
            <div class="col-lg-12">


              <table id="Table_mascotas" class="table dt-responsive table-hover" style="width:100%;font-size:12.5px;">
                <thead>
                  <tr>


                    <th class="desktop">Nombre</th>
                    <th class="desktop">Especie</th>
                    <th class="desktop">sexo</th>
                    <th class="desktop">Raza</th>
                    <th class="desktop">Edad</th>
                    <th class="desktop"></th>
                  </tr>

                </thead>

                <tbody>

                </tbody>


              </table>




            </div>
          </div>



          <input type="hidden" id="id_cliente" name="id_cliente" value="{{ $id_cliente->id_cliente }}">
          <br>
          <br>


        </div>
      </div>

      <!-- /.card-body -->
    </div>
    <!-- /.card -->


    <!-- /.col (left) -->
    <div class="col-md-4">
      <div class="card card-light">
        <div class="card-header">
          <h3 class="card-title">
            <span style="color:#28a745;" class="fas fa-user mr-3"></span>Datos del propietario
          </h3>

          <!--
                    <h4  style="text-align: center;">
                           
                    <div class="dropdown ml-auto">
                                  <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                          id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true"
                                          aria-expanded="false">
                                    ☰
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                                    
                                      <button class="dropdown-item" type="button"
                                              id="btn_eliminarCliente">Eliminar paciente
                                      </button>
                                    
                                 </div>
                         </div>
                  </h4>
  
                 -->

        </div>

        <div class="card-body">
          <!-- Date -->
          <div class="form-group">

            <table class="table" id="table_clientes" style="width:100%;font-size:12.5 px;">

              <tbody style="font-size:95%;">


                <tr style="display:none;">

                  <td>

                    <div class="control-label">Id_cliente</div>

                    <a href="#" id="id_cliente">{{ $id_cliente->id_cliente }}</a>

                  </td>

                </tr>

                <tr style="display:none;">

                  <td>

                    <div class="control-label">Cédula</div>

                    <a href="#" id="cedula">{{ $id_cliente->cedula }}</a>

                  </td>

                </tr>

                <span id=" navbar_estado"></span>

                <tr>

                  <td>

                    <div class="control-label">Nombre</div>

                    <a href="#" id="nombre" data-type="text" data-pk="{{$id_cliente->id_cliente}}" class="text-capitalize" data-name="nombre">{{ $id_cliente->nombre }}</a>


                  </td>

                </tr>

                <tr>

                  <td>

                    <div class="control-label">Edad</div>

                    <a href="#" id="edad" data-type="text" data-pk="{{$id_cliente->id_cliente}}" data-name="edad">{{ $id_cliente->edad() }} años</a>

                  </td>

                </tr>

                <tr>

                  <td>

                    <div class="control-label">Celular</div>


                    <a href="#" id="celular" data-type="text" data-pk="{{$id_cliente->id_cliente}}" data-name="celular">{{ $id_cliente->celular }}</a>


                </tr>

                <tr>

                  <td>

                    <div class="control-label">Email</div>

                    <a href="#" id="email" data-type="text" data-pk="{{$id_cliente->id_cliente}}" data-name="email">{{ $id_cliente->email }}</a>

                  </td>

                </tr>

                <tr>

                  <td>

                    <div class="control-label">Dirección</div>

                    <a href="#" id="direccion" data-type="text" data-pk="{{$id_cliente->id_cliente}}" data-name="direccion">{{ $id_cliente->direccion }}</a>

                </tr>

                <tr>

                  <td>

                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalEditarCliente" style="text-align:left"><span class="fa fa-edit fa-fw" tabindex="3"></span> Editar datos del cliente</button>
                    <!--   <button class="btn btn-primary" data-toggle="modal" data-target="#modalEditarCliente" onclick="editarCliente();" >
                         <span class="fa fa-edit fa-fw" ></span> Editar datos </button>  -->
                  </td>

                <tr>

              </tbody>

            </table>






            <!-- /.form group -->
          </div>

          <!-- /.card-body -->
        </div>

      </div>

    </div>
    <!-- /.card -->
  </div><!-- /.container-fluid -->




  <!--=====================================

    MODAL AGREGAR HISTÓRIA CLÍNICA

======================================-->

  <div class="modal fade" id="modalAgregarHistoriaClinica" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static" aria-hidden="true">


    <div class="modal-dialog modal-lg">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list-alt mr-3"></span>Agregar mascota </h5>

          <div class="col-6 align-items-center" style="font-size: small;">

            <div id="datos_historia_clinica">

              <h5> <a class=" mx-1 nombre" style="color:coral">Cliente: {{$id_cliente->nombre}}</a></h5>

              <a class="mx-1 telefono" style="color:black">Teléfono: {{$id_cliente->celular }}</a>

            </div>

          </div>



          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>


        </div>

        <div class="modal-body">


          <form method="POST" id="form_crear_mascota" enctype="multipart/form-data" action="{{ url('/clientes') }}">

            <!-- @csrf -->

            <!--   <input type="hidden" name="_token" value="{{csrf_token()}}">  -->
     
   

            <div class="row" style="font-size:90%;">

              <div class="col-md-5">

                <div class="form-group">

                  <label for="mascota" class="control-label font-weight-normal">Nombre mascota</label>

                  <input type="text" name="mascota" class="form-control" id="mascota" autofocus="true" required autocomplete="off">

                  <div class="alert-message" id="mascotaError"></div>

                </div>
              </div>




              <div class="col-md-3">

                <div class="form-group">

                  <label for="fecha nacimiento" class="control-label font-weight-normal">fecha nacimiento</label>

                  <input type="date" class="form-control" id="fecha_nacimiento1" name="fecha_nacimiento1" required >

                  <div class="alert-message" id="fechaNacimientoError"></div>

                </div>

                <input type="hidden" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" required />

              </div>




              <div class="col-md-2">

                <div class="form-group">

                  <label for="año" class="control-label font-weight-normal">Años</label>

                  <input type="text" id="anos" name="anos" class="form-control" required autocomplete="off">

                  <div class="alert-message" id="anoError"></div>

                </div>

              </div>


              <div class="col-md-2">

                <div class="form-group">

                  <label for="meses" class="control-label font-weight-normal">meses</label>

                  <input type="text" id="meses" name="meses" class="form-control text-capitalize" autocomplete="off">

                  <div class="alert-message" id="mesesError"></div>

                </div>

              </div>



              <div class="col-md-3">

                <div class="form-group">

                  <label for="especie" class="control-label font-weight-normal">Especie</label>

                  <select id="especie1" name="especie1" class="form-control">
                    
                    <option value=""></option>
                    <option value="canino">canino</option>
                    <option value="felino">Felino</option>
                    <option value="Aves">Aves</option>
                    <option value="Conejos">Conejos</option>
                    <option value="equinos">Equinos</option>
                    <option value="peces">Peces</option>
                    <option value="reptiles">Reptiles</option>
                    <option value="otros">Otros</option>
                  </select>


                  <div class="alert-message" id="especieError"></div>

                </div>

                <input type="hidden"  maxlength="15" id="especie" name="especie"  />
                

              </div>



              <div class="col-md-3">

                <div class="form-group">

                  <label for="raza" class="control-label font-weight-normal">Raza</label>

                  <input type="text" name="raza" class="form-control" id="raza" autocomplete="off">

                  <div class="alert-message" id="razaError"></div>

                </div>

              </div>




              <div class="col-md-2">

                <div class="form-group">

                  <label for="sexo" class="control-label font-weight-normal">sexo</label>

                  <select id="sexo1" name="sexo1" class="form-control">
                    <option value=""></option>
                    <option value="macho">Macho</option>
                    <option value="hembra">Hembra</option>
                    <option value="indefinido">Indefinido</option>
                  </select>


                  <div class="alert-message" id="sexoError"></div>

                </div>

                <input type="hidden"  maxlength="10" id="sexo" name="sexo"  />

              </div>



              <div class="col-md-2">

                <div class="form-group">

                  <label for="pelaje" class="control-label font-weight-normal">Pelaje</label>

                  <input type="text" name="pelaje" class="form-control" id="pelaje" autocomplete="off">

                  <div class="alert-message" id="pelajeError"></div>

                </div>

              </div>



              <div class="col-md-2">

                  <div class="form-group">

                    <label for="color" class="control-label font-weight-normal">Color</label>

                    <input type="text" name="color" class="form-control" id="color" autocomplete="off">

                    <div class="alert-message" id="colorError"></div>

                  </div>

               </div>




              <div class="col-md-2">

                <div class="form-group">

                  <label for="peso" class="control-label font-weight-normal">Peso (Kg)</label>

                  <input type="text" name="peso" class="form-control" id="peso" autocomplete="off">

                  <div class="alert-message" id="pesoError"></div>

                </div>

             </div>


              <div class="col-md-5">

                <div class="form-group">

                  <label for="alimentacion" class="control-label font-weight-normal">Comida que consume</label>


                  <textarea class="form-control" rows="1" name="alimentacion" id="alimentacion"></textarea>

                  <div class="alert-message" id="alimentacionError"></div>

                </div>

              </div>


              <div class="col-md-5">

                <div class="form-group">

                  <label for="vivienda" class="control-label font-weight-normal">Vivienda/convive con otros animales?</label>


                  <textarea class="form-control" rows="1" name="vivienda" id="vivienda"></textarea>


                  <div class="alert-message" id="viviendaError"></div>

                </div>

              </div>
        


                    
         <div class="col-md-6">

          <div class="form-group">

            <label for="ultimo celo" class="control-label font-weight-normal">Último celo</label>

            <input type="date" name="ultimo_celo1" class="form-control" id="ultimo_celo1" require>

            <div class="alert-message" id="ultimoCeloError"></div>

          </div>

          <input type="hidden" class="form-control" name="ultimo_celo" id="ultimo_celo" required />


         </div>




          <div class="col-md-6">

          <div class="form-group">

            <label for="factor DEA" class="control-label font-weight-normal">Factor DEA</label>

                 <select id="factor_DEA1" name="factor_DEA1" class="form-control">
                    <option value=""></option>
                    <option value="indefinido">Indefinido</option>
                    <option value="positivo">Positivo</option>
                    <option value="negativo">Negativo</option>
                  </select>


            <div class="alert-message" id="factorDEAError"></div>

          </div>
          
          <input type="hidden"  maxlength="8" id="factor_DEA" name="factor_DEA"  />

         </div>






                      
         <div class="col-md-6">

          <div class="form-group">

            <label for="patología preexistente" class="control-label font-weight-normal">Patología preexitente</label>

            <input type="text" name="preexistencia" class="form-control" id="preexistencia" require>

            <div class="alert-message" id="preexistenciaError"></div>

          </div>

         </div>




          <div class="col-md-6">

          <div class="form-group">

            <label for="chip" class="control-label font-weight-normal">chip</label>

                
            <input type="text" name="chip" class="form-control" id="chip" require>


            <div class="alert-message" id="chipError"></div>

          </div>
         </div>



   <div class="col-md-12">

    <div class="form-group">

      <div class="form-check form-check-inline">

        <input class="form-check-input" type="checkbox" name="pedigree" id="pedigree" >

        <label class="form-check-label" for="inlineCheckbox1">Pedigree</label>

      </div>

      <div class="form-check form-check-inline">

        
        <input class="form-check-input" type="checkbox" name="donante" id="donante" >

        <label class="form-check-label" for="donante">Donante</label>

      </div>

      <div class="form-check form-check-inline">

        <input class="form-check-input" type="checkbox" name="fallecido"  id="fallecido" >

        <label class="form-check-label" for="fallecido">Fallecido</label>

      </div>
 


      <div class="form-check form-check-inline">

        <input class="form-check-input" type="checkbox" name="transfusiones" id="transfusiones"  >

        <label class="form-check-label" for="transfuciones">Tiene transfuciones?</label>

      </div>


      <div class="form-check form-check-inline">

        <input class="form-check-input" type="checkbox" name="reproductor" id="reproductor"  >

        <label class="form-check-label" for="reproductor">Reproductor</label>

      </div>
 


      <div class="form-check form-check-inline">

        <input class="form-check-input" type="checkbox" name="esterilizado" id="esterilizado"  >

        <label class="form-check-label" for="esterilizado">Esterilizado</label>
       

      </div>



      
      <div class="form-check form-check-inline">

        <input class="form-check-input" type="checkbox" name="adopcion" id="adopcion"  value="1">

        <label class="form-check-label" for="adopcion">Adopción</label>
       

      </div>
     

  </div>

  </div>

    <div class="col-lg-5">

      <div class="form-group">

        <label for="veterinario remitente" class="control-label font-weight-normal">Veterinario remitente</label>

        <input type="text" name="veterinario_remitente" class="form-control text-capitalize" id="veterinario_remitente" autocomplete="off">

        <div class="alert-message" id="veterinarioRemitenteError"></div>

      </div>

    </div>



  
      <div class="col-lg-5">

        <div class="form-group">

          <label for="agresividad" class="control-label font-weight-normal">Agresividad</label>


          <input type="range" name="agresividad" class="form-control" id="agresividad"  min="0" max="5" step="1" value="0"  oninput="num.value = this.value"> 
          
          <output id="num">0</output>

          
          

          <div class="alert-message" id="agresividadError"></div>

        </div>

      </div>        
 
 </div>


        <!-- 
              <div class="form-group">
              <label for="end" class="col-sm-2 control-label">Fecha final</label>
              
              -->


        <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>

        <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{ $id_cliente->id_cliente }}" readonly>


        <input type="hidden" name="nombre" class="form-control" id="nombre" value="{{ $id_cliente->nombre }}" readonly>

        <input type="hidden" name="edad" class="form-control" id="edad" value="{{ $id_cliente->edad }}" readonly>




        <!--     
              
              <div id="enlace_listado">  
                        
              <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p> 
                        
              </div>
              
              -->

        <div class="modal-footer">

          <button type="submit" id="agregar_mascota" name="agregar_mascota" class="btn btn-primary">Guardar</button>
          <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

        </div>

      </div>
    </div>
  </div>

  </form>
</div>

</div>




<!--=====================================

    MODAL EDITAR DATOS DE  MASCOTA

=========================================-->



<div class="modal fade" id="modalEditarMascota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static" aria-hidden="true">


  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list-alt mr-3"></span>Editar datos de mascota </h5>

        <div class="col-6 align-items-center" style="font-size: small;">
          <div id="datos_historia_clinica">
            <h5> <a class=" mx-1 nombre" style="color:coral">{{$id_cliente->nombre}}</a></h5>
            <a class="mx-1 especie" style="color:black"> Tel: {{$id_cliente->celular }} </a>
            <!--  <a class="mx-1 raza" style="color:black">{{$id_cliente->peso}}</a> -->
            <!--  <a class="mx-1 edad" style="color:black">{{$id_cliente->estatura}}</a> -->
          </div>
        </div>



        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>


      </div>

      <div class="modal-body">


        <form method="POST" id="form_editar_mascota" action="{{ url('/editar_mascota/id') }}">

          <!-- @csrf -->

          <!--   <input type="hidden" name="_token" value="{{csrf_token()}}">  -->



          <div class="row" style="font-size:90%;">

            <div class="col-md-2">

              <div class="form-group">

                <label for="mascota" class="control-label font-weight-normal">mascota</label>

                <input type="text" name="mascota" class="form-control" id="mascota" autofocus="true" autocomplete="off">

                <div class="alert-message" id="mascotaError"></div>

              </div>
            </div>




            <div class="col-md-3">

              <div class="form-group">

                <label for="fecha nacimiento" class="control-label font-weight-normal">Fecha nacimiento</label>

                <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento">

                <div class="alert-message" id="fechaNacimientoError"></div>

              </div>

            </div>




            <div class="col-md-2">

              <div class="form-group">

                <label for="años" class="control-label font-weight-normal">Años</label>

                <input type="text" id="anos" name="anos" class="form-control" autocomplete="off">

                <div class="alert-message" id="anosEror"></div>

              </div>
            </div>


            <div class="col-md-2">

              <div class="form-group">

                <label for="meses" class="control-label font-weight-normal">Meses</label>

                <input type="text" id="meses" name="meses" class="form-control" autocomplete="off">

                <div class="alert-message" id="mesesError"></div>

              </div>

            </div>



            <div class="col-md-3">

              <div class="form-group">

                <label for="especie" class="control-label font-weight-normal">Especie</label>

                  <select id="especie1" name="especie1" class="form-control">

                  <option value=""></option>
                  <option value="canino">canino</option>
                  <option value="felino">Felino</option>
                  <option value="Aves">Aves</option>
                  <option value="Conejos">Conejos</option>
                  <option value="equinos">Equinos</option>
                  <option value="peces">Peces</option>
                  <option value="reptiles">Reptiles</option>
                  <option value="otros">Otros</option>
                  </select>


              <div class="alert-message" id="especieError"></div>

            </div>

                <input type="hidden"  maxlength="15" id="especie" name="especie"  />


                </div>


           

            <div class="col-md-3">

              <div class="form-group">

                <label for="raza" class="control-label font-weight-normal">Raza</label>

                <input type="text" name="raza" class="form-control" id="raza" autocomplete="off">

                <div class="alert-message" id="razaError"></div>

              </div>

            </div>




            <div class="col-md-3">

              <div class="form-group">

                <label for="sexo" class="control-label font-weight-normal">sexo</label>

                <select id="sexo1" name="sexo1" class="form-control">
                  <option value=""></option>
                  <option value="macho">Macho</option>
                  <option value="hembra">Hembra</option>
                  <option value="indefinido">Indefinido</option>
                </select>


                <div class="alert-message" id="sexoError"></div>

              </div>

              <input type="hidden"  maxlength="10" id="sexo" name="sexo"  />

           </div>

    

            <div class="col-md-2">

              <div class="form-group">

                <label for="pelaje" class="control-label font-weight-normal">Pelaje</label>

                <input type="text" name="pelaje" class="form-control" id="pelaje" autocomplete="off">

                <div class="alert-message" id="pelajeError"></div>

              </div>

            </div>



            <div class="col-md-2">

              <div class="form-group">

                <label for="color" class="control-label font-weight-normal">Color</label>

                <input type="text" name="color" class="form-control" id="color" autocomplete="off">

                <div class="alert-message" id="colorError"></div>

              </div>

            </div>




            <div class="col-md-2">

              <div class="form-group">

                <label for="peso" class="control-label font-weight-normal">Peso</label>

                <input type="text" name="peso" class="form-control" id="peso" autocomplete="off">

                <div class="alert-message" id="pesoError"></div>

              </div>

            </div>





            <div class="col-md-6">

              <div class="form-group">

                <label for="alimentacion" class="control-label font-weight-normal">Comida que consume</label>

                <input type="text" name="alimentacion" class="form-control" id="alimentacio" autocomplete="off">

                <div class="alert-message" id="alimentacionError"></div>

              </div>

            </div>




            <div class="col-md-6">

              <div class="form-group">

                <label for="vivienda" class="control-label font-weight-normal">Vivienda/conviviencia con otros animales</label>

                <input type="text" name="vivienda" class="form-control" id="vivienda" autocomplete="off">

                <div class="alert-message" id="viviendaError"></div>



              </div>
            </div>

            <div class="col-md-3">

              <div class="form-group">

                <label for="ultimo celo" class="control-label font-weight-normal">último celo</label>

                <input type="date" name="ultimo_celo" class="form-control" id="ultimo_celo" autocomplete="off">

                <div class="alert-message" id="ultimoCeloError"></div>

              </div>

            </div>

       


            <div class="col-md-9">

              <div class="form-group">

                <label for="patología preexistente" class="control-label font-weight-normal">Patología preexitente</label>

                <input type="text" name="preexistencia" class="form-control" id="preexistencia" require>

                <div class="alert-message" id="preexistenciaError"></div>

              </div>

            </div>




      <div class="col-md-6">

            <div class="form-group">

              <label for="factor DEA" class="control-label font-weight-normal">Factor DEA</label>

                  <select id="factor_DEA1" name="factor_DEA1" class="form-control">
                      <option value=""></option>
                      <option value="indefinido">Indefinido</option>
                      <option value="positivo">Positivo</option>
                      <option value="negativo">Negativo</option>
                    </select>


               <div class="alert-message" id="factorDEAError"></div>

            </div>

            <input type="hidden"  maxlength="8" id="factor_DEA" name="factor_DEA"  />

       </div>




       <div class="col-md-6">

          <div class="form-group">

            <label for="chip" class="control-label font-weight-normal">chip</label>

                
            <input type="text" name="chip" class="form-control" id="chip" require>


            <div class="alert-message" id="chipError"></div>

          </div>

        </div>



 
        <div class="col-md-12">

<div class="form-group">

  <div class="form-check form-check-inline">

    <input class="form-check-input" type="checkbox" name="pedigree" id="pedigree" >

    <label class="form-check-label" for="inlineCheckbox1">Pedigree</label>

  </div>

  <div class="form-check form-check-inline">

    
    <input class="form-check-input" type="checkbox" name="donante" id="donante" >

    <label class="form-check-label" for="donante">Donante</label>

  </div>

  <div class="form-check form-check-inline">

    <input class="form-check-input" type="checkbox" name="fallecido"  id="fallecido" >

    <label class="form-check-label" for="fallecido">Fallecido</label>

  </div>



  <div class="form-check form-check-inline">

    <input class="form-check-input" type="checkbox" name="transfusiones" id="transfusiones"  >

    <label class="form-check-label" for="transfuciones">Tiene transfuciones?</label>

  </div>


  <div class="form-check form-check-inline">

    <input class="form-check-input" type="checkbox" name="reproductor" id="reproductor"  >

    <label class="form-check-label" for="reproductor">Reproductor</label>

  </div>



  <div class="form-check form-check-inline">

    <input class="form-check-input" type="checkbox" name="esterilizado" id="esterilizado"  >

    <label class="form-check-label" for="esterilizado">Esterilizado</label>
   

  </div>



  
  <div class="form-check form-check-inline">

    <input class="form-check-input" type="checkbox" name="adopcion" id="adopcion"  value="1">

    <label class="form-check-label" for="adopcion">Adopción</label>
   

  </div>
 

</div>

</div>

<div class="col-lg-5">

  <div class="form-group">

    <label for="veterinario remitente" class="control-label font-weight-normal">Veterinario remitente</label>

    <input type="text" name="veterinario_remitente" class="form-control text-capitalize" id="veterinario_remitente" autocomplete="off">

    <div class="alert-message" id="veterinarioRemitenteError"></div>

  </div>

</div>




  <div class="col-lg-5">

    <div class="form-group">

      <label for="agresividad" class="control-label font-weight-normal">Agresividad</label>


      <input type="range" name="agresividad" class="form-control" id="agresividad"  min="0" max="5" step="1" value="0"  oninput="num.value = this.value"> 
      
      <output id="num">0</output>
       

      <div class="alert-message" id="agresividadError"></div>

    </div>

  </div>        

   

 </div>
            
       


      <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>

      <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{ $id_cliente->id_cliente }}" readonly>

      <input type="hidden" name="id_historia" class="form-control" id="id" readonly>



      <!--     
              
              <div id="enlace_listado">  
                        
              <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p> 
                        
              </div>
              
              -->

      <div class="modal-footer">

        <button type="submit" id="editar_historia" name="editar_historia" class="btn btn-primary">Guardar</button>
        <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>

    </div>
  </div>
</div>

</form>
</div>

</div>






<!--=====================================

    MODAL EDITAR DATOS DE  MASCOTA

=========================================-->



<div class="modal fade" id="modalEditarMascota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static" aria-hidden="true">


  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list-alt mr-3"></span>Editar datos de mascota </h5>

        <div class="col-6 align-items-center" style="font-size: small;">
          <div id="datos_historia_clinica">
            <h5> <a class=" mx-1 nombre" style="color:coral">{{$id_cliente->nombre}}</a></h5>
            <a class="mx-1 especie" style="color:black"> Tel: {{$id_cliente->celular }} </a>
            <!--  <a class="mx-1 raza" style="color:black">{{$id_cliente->peso}}</a> -->
            <!--  <a class="mx-1 edad" style="color:black">{{$id_cliente->estatura}}</a> -->
          </div>
        </div>



        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>


      </div>

      <div class="modal-body">


        <form method="POST" id="form_editar_mascota" action="{{ url('/editar_mascota/id') }}">

          <!-- @csrf -->

          <!--   <input type="hidden" name="_token" value="{{csrf_token()}}">  -->



          <div class="row" style="font-size:90%;">

            <div class="col-md-2">

              <div class="form-group">

                <label for="mascota" class="control-label font-weight-normal">mascota</label>

                <input type="text" name="mascota" class="form-control" id="mascota" autofocus="true" autocomplete="off">

                <div class="alert-message" id="mascotaError"></div>

              </div>
            </div>




            <div class="col-md-3">

              <div class="form-group">

                <label for="fecha nacimiento" class="control-label font-weight-normal">Fecha nacimiento</label>

                <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento">

                <div class="alert-message" id="fechaNacimientoError"></div>

              </div>

            </div>




            <div class="col-md-2">

              <div class="form-group">

                <label for="años" class="control-label font-weight-normal">Años</label>

                <input type="text" id="anos" name="anos" class="form-control" autocomplete="off">

                <div class="alert-message" id="anosEror"></div>

              </div>
            </div>


            <div class="col-md-2">

              <div class="form-group">

                <label for="meses" class="control-label font-weight-normal">Meses</label>

                <input type="text" id="meses" name="meses" class="form-control" autocomplete="off">

                <div class="alert-message" id="mesesError"></div>

              </div>

            </div>



            <div class="col-md-3">

              <div class="form-group">

                <label for="especie" class="control-label font-weight-normal">Especie</label>

                  <select id="especie1" name="especie1" class="form-control">

                  <option value=""></option>
                  <option value="canino">canino</option>
                  <option value="felino">Felino</option>
                  <option value="Aves">Aves</option>
                  <option value="Conejos">Conejos</option>
                  <option value="equinos">Equinos</option>
                  <option value="peces">Peces</option>
                  <option value="reptiles">Reptiles</option>
                  <option value="otros">Otros</option>
                  </select>


              <div class="alert-message" id="especieError"></div>

            </div>

                <input type="hidden"  maxlength="15" id="especie" name="especie"  />


                </div>


           

            <div class="col-md-3">

              <div class="form-group">

                <label for="raza" class="control-label font-weight-normal">Raza</label>

                <input type="text" name="raza" class="form-control" id="raza" autocomplete="off">

                <div class="alert-message" id="razaError"></div>

              </div>

            </div>




            <div class="col-md-3">

              <div class="form-group">

                <label for="sexo" class="control-label font-weight-normal">sexo</label>

                <select id="sexo1" name="sexo1" class="form-control">
                  <option value=""></option>
                  <option value="macho">Macho</option>
                  <option value="hembra">Hembra</option>
                  <option value="indefinido">Indefinido</option>
                </select>


                <div class="alert-message" id="sexoError"></div>

              </div>

              <input type="hidden"  maxlength="10" id="sexo" name="sexo"  />

           </div>

    

            <div class="col-md-2">

              <div class="form-group">

                <label for="pelaje" class="control-label font-weight-normal">Pelaje</label>

                <input type="text" name="pelaje" class="form-control" id="pelaje" autocomplete="off">

                <div class="alert-message" id="pelajeError"></div>

              </div>

            </div>



            <div class="col-md-2">

              <div class="form-group">

                <label for="color" class="control-label font-weight-normal">Color</label>

                <input type="text" name="color" class="form-control" id="color" autocomplete="off">

                <div class="alert-message" id="colorError"></div>

              </div>

            </div>




            <div class="col-md-2">

              <div class="form-group">

                <label for="peso" class="control-label font-weight-normal">Peso</label>

                <input type="text" name="peso" class="form-control" id="peso" autocomplete="off">

                <div class="alert-message" id="pesoError"></div>

              </div>

            </div>





            <div class="col-md-6">

              <div class="form-group">

                <label for="alimentacion" class="control-label font-weight-normal">Comida que consume</label>

                <input type="text" name="alimentacion" class="form-control" id="alimentacio" autocomplete="off">

                <div class="alert-message" id="alimentacionError"></div>

              </div>

            </div>




            <div class="col-md-6">

              <div class="form-group">

                <label for="vivienda" class="control-label font-weight-normal">Vivienda/conviviencia con otros animales</label>

                <input type="text" name="vivienda" class="form-control" id="vivienda" autocomplete="off">

                <div class="alert-message" id="viviendaError"></div>



              </div>
            </div>

            <div class="col-md-3">

              <div class="form-group">

                <label for="ultimo celo" class="control-label font-weight-normal">último celo</label>

                <input type="date" name="ultimo_celo" class="form-control" id="ultimo_celo" autocomplete="off">

                <div class="alert-message" id="ultimoCeloError"></div>

              </div>

            </div>

       


            <div class="col-md-9">

              <div class="form-group">

                <label for="patología preexistente" class="control-label font-weight-normal">Patología preexitente</label>

                <input type="text" name="preexistencia" class="form-control" id="preexistencia" require>

                <div class="alert-message" id="preexistenciaError"></div>

              </div>

            </div>




      <div class="col-md-6">

            <div class="form-group">

              <label for="factor DEA" class="control-label font-weight-normal">Factor DEA</label>

                  <select id="factor_DEA1" name="factor_DEA1" class="form-control">
                      <option value=""></option>
                      <option value="indefinido">Indefinido</option>
                      <option value="positivo">Positivo</option>
                      <option value="negativo">Negativo</option>
                    </select>


               <div class="alert-message" id="factorDEAError"></div>

            </div>

            <input type="hidden"  maxlength="8" id="factor_DEA" name="factor_DEA"  />

       </div>




       <div class="col-md-6">

          <div class="form-group">

            <label for="chip" class="control-label font-weight-normal">chip</label>

                
            <input type="text" name="chip" class="form-control" id="chip" require>


            <div class="alert-message" id="chipError"></div>

          </div>

        </div>



 
        <div class="col-md-12">

<div class="form-group">

  <div class="form-check form-check-inline">

    <input class="form-check-input" type="checkbox" name="pedigree" id="pedigree" >

    <label class="form-check-label" for="inlineCheckbox1">Pedigree</label>

  </div>

  <div class="form-check form-check-inline">

    
    <input class="form-check-input" type="checkbox" name="donante" id="donante" >

    <label class="form-check-label" for="donante">Donante</label>

  </div>

  <div class="form-check form-check-inline">

    <input class="form-check-input" type="checkbox" name="fallecido"  id="fallecido" >

    <label class="form-check-label" for="fallecido">Fallecido</label>

  </div>



  <div class="form-check form-check-inline">

    <input class="form-check-input" type="checkbox" name="transfusiones" id="transfusiones"  >

    <label class="form-check-label" for="transfuciones">Tiene transfuciones?</label>

  </div>


  <div class="form-check form-check-inline">

    <input class="form-check-input" type="checkbox" name="reproductor" id="reproductor"  >

    <label class="form-check-label" for="reproductor">Reproductor</label>

  </div>



  <div class="form-check form-check-inline">

    <input class="form-check-input" type="checkbox" name="esterilizado" id="esterilizado"  >

    <label class="form-check-label" for="esterilizado">Esterilizado</label>
   

  </div>



  
  <div class="form-check form-check-inline">

    <input class="form-check-input" type="checkbox" name="adopcion" id="adopcion"  value="1">

    <label class="form-check-label" for="adopcion">Adopción</label>
   

  </div>
 

</div>

</div>

<div class="col-lg-5">

  <div class="form-group">

    <label for="veterinario remitente" class="control-label font-weight-normal">Veterinario remitente</label>

    <input type="text" name="veterinario_remitente" class="form-control text-capitalize" id="veterinario_remitente" autocomplete="off">

    <div class="alert-message" id="veterinarioRemitenteError"></div>

  </div>

</div>




  <div class="col-lg-5">

    <div class="form-group">

      <label for="agresividad" class="control-label font-weight-normal">Agresividad</label>


      <input type="range" name="agresividad" class="form-control" id="agresividad"  min="0" max="5" step="1" value="0"  oninput="num.value = this.value"> 
      
      <output id="num">0</output>
       

      <div class="alert-message" id="agresividadError"></div>

    </div>

  </div>        

   

 </div>
            
       


      <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>

      <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{ $id_cliente->id_cliente }}" readonly>

      <input type="hidden" name="id_historia" class="form-control" id="id" readonly>



      <!--     
              
              <div id="enlace_listado">  
                        
              <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p> 
                        
              </div>
              
              -->

      <div class="modal-footer">

        <button type="submit" id="editar_historia" name="editar_historia" class="btn btn-primary">Guardar</button>
        <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>

    </div>
  </div>
</div>

</form>
</div>

</div>




<!--=====================================

    MODAL MOSTRAR DATOS DE  HISTÓRIA CLÍNICA

=========================================-->





<div class="modal fade" id="modalMostrarMascota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static" aria-hidden="true">


  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list-alt mr-3"></span>História clínica </h5>

        <div class="col-6 align-items-center" style="font-size: small;">
          <div id="datos_historia_clinica">
            <h5> <a class=" mx-1 nombre" style="color:coral">{{$id_cliente->nombre}}</a></h5>
            <a class="mx-1 especie" style="color:black"> {{$id_cliente->edad() }} años </a>
            <!--  <a class="mx-1 raza" style="color:black">{{$id_cliente->peso}}</a> -->
            <!--  <a class="mx-1 edad" style="color:black">{{$id_cliente->estatura}}</a> -->
          </div>
        </div>



        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>


      </div>

      <div class="modal-body">


        <form method="POST" id="form_mostrar_mascota" action="{{ url('clientes') }}">

          <!-- @csrf -->

          <!--   <input type="hidden" name="_token" value="{{csrf_token()}}">  -->



          <div class="row" style="font-size:90%;">

            <div class="col-md-2">

              <div class="form-group">

                <label for="mascota" class="control-label font-weight-normal"><b>mascota</b></label>


                <input type="text" name="mascota" class="form-control  border-0" id="mascota">

              </div>
            </div>




            <div class="col-md-2">

              <div class="form-group">

                <label for="fecha nacimiento" class="control-label font-weight-normal"><b>fecha nacimiento</b></label>

                <input type="text" name="fecha_nacimiento" class="form-control text-muted  border-0" id="fecha_nacimiento">

              </div>

            </div>




            <div class="col-md-2">

              <div class="form-group">

                <label for="anos" class="control-label font-weight-normal"><b>Años</b></label>

                <input type="text" name="anos" class="form-control text-muted  border-0" id="anos">

              </div>

            </div>


            <div class="col-md-2">

              <div class="form-group">

                <label for="especie" class="control-label font-weight-normal"><b>Especie</b></label>

                <input type="text" name="especie" class="form-control text-muted  border-0" id="especie">


              </div>

            </div>



            <div class="col-md-2">

              <div class="form-group">

                <label for="raza" class="control-label font-weight-normal"><b>raza</b></label>

                <input type="text" name="raza" class="form-control text-muted  border-0" id="raza">


              </div>
            </div>



            <div class="col-md-2">

              <div class="form-group">

                <label for="sexo" class="control-label font-weight-normal"><b>sexo</b></label>

                <input type="text" name="sexo" class="form-control text-muted   border-0" id="sexo">


              </div>

            </div>




            <div class="col-md-2">

              <div class="form-group">

                <label for="pelaje" class="control-label font-weight-normal"><b>pelaje</b></label>

                <input type="text" name="pelaje" class="form-control text-muted   border-0" id="pelaje">


              </div>

            </div>



            <div class="col-md-2">
              <div class="form-group">

                <label for="color" class="control-label font-weight-normal"><b>Color</b></label>

                <input type="text" name="color" class="form-control text-muted  border-0" id="color">


              </div>

            </div>


            <div class="col-md-3">

              <div class="form-group">

                <label for="peso" class="control-label font-weight-normal "><b>Peso</b></label>

                <input type="text" name="peso" class="form-control text-muted border-0" id="peso">


              </div>

            </div>



            <div class="col-md-4">

              <div class="form-group">

                <label for="alimento" class="control-label font-weight-normal"><b>Comida que consume</b></label>

                <input type="text" name="alimento" class="form-control text-muted border-0" id="alimiento">


              </div>

            </div>


            <div class="col-md-4">

              <div class="form-group">

                <label for="vivienda" class="control-label font-weight-normal"><b>Vivienda compartida</b></label>

                <input type="text" name="vivienda" class="form-control  text-muted  border-0" id="vivienda">


              </div>

            </div>

            <div class="col-md-3">

              <div class="form-group">

                <label for="ultimo celo" class="control-label font-weight-normal"><b>Último celo</b></label>

                <input type="text" name="ultimo_celo" class="form-control text-muted  border-0" id="ultimo_celo">


              </div>

            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="medico_tratante" class="control-label font-weight-normal"><b>Patología preexistente</b></label>

                <input type="text" name="preexistencia" class="form-control  border-0" id="preexistencia">


              </div>

            </div>



            <div class="col-md-2">

              <div class="form-group">

                <label for="factor DEA" class="control-label font-weight-normal"><b>Factor DEA</b></label>

                <input type="text" name="factor_DEA" class="form-control text-muted  border-0" id="factor_DEA">


              </div>

            </div> 


            <div class="col-md-2">

              <div class="form-group">

                <label for="pedigree" class="control-label font-weight-normal"><b>Pedigree</b></label>

                <input type="text" name="pedigree" class="form-control text-muted  border-0" id="pedigree">


              </div>

            </div>



            <div class="col-md-2">

                <div class="form-group">

                  <label for="donante" class="control-label font-weight-normal"><b>Donante</b></label>

                  <input type="text" name="donante" class="form-control text-muted  border-0" id="donante">


                </div>

             </div>


             <div class="col-md-2">

                  <div class="form-group">

                    <label for="fallecido" class="control-label font-weight-normal"><b>Fallecido</b></label>

                    <input type="text" name="fallecido" class="form-control text-muted   border-0" id="fallecido">


                  </div>

              </div>


              <div class="col-md-2">

                  <div class="form-group">

                    <label for="transfusiones" class="control-label font-weight-normal"><b>Transfuciones</b></label>

                    <input type="text" name="transfusiones" class="form-control text-muted  border-0" id="transfusiones">


                  </div>

              </div>



              <div class="col-md-2">

                  <div class="form-group">

                    <label for="reproductor" class="control-label font-weight-normal"><b>Reproductor</b></label>

                    <input type="text" name="reproductor" class="form-control text-muted  border-0" id="reproductor">


                  </div>

               </div>


               <div class="col-md-2">

                  <div class="form-group">

                    <label for="esterilizado" class="control-label font-weight-normal"><b>Esterilizado</b></label>

                    <input type="text" name="esterilizado" class="form-control text-muted  border-0" id="esterilizado">


                  </div>

              </div>



              <div class="col-md-2">

                  <div class="form-group">

                    <label for="adopcion" class="control-label font-weight-normal"><b>Adopción</b></label>

                    <input type="text" name="adopcion" class="form-control text-muted  border-0" id="adopcion">


                  </div>

              </div>


              <div class="col-md-4">

                <div class="form-group">

                  <label for="veterinario" class="control-label font-weight-normal"><b>Veterinario remitente</b></label>

                  <input type="text" name="veterinario_remitente" class="form-control text-muted   border-0" id="veterinario_remitente">


                </div>

              </div>



              <div class="col-md-4">

                  <div class="form-group">

                    <label for="agresividad" class="control-label font-weight-normal"><b>Agresividad</b></label>

                    <input type="range" name="agresividad" class="form-control   border-0" id="agresividad" min="0" max="5" step="1" value="0"  oninput="num.value = this.value">
                    <output id="num">0</output>

                  </div>

               </div>



            <div class="col-md-8">

              <div class="form-group">

                <label for="fecha de creacion" class="control-label font-weight-normal"><b>Fecha de creación</b></label>


                <!--  <input type="text" name="fecha" class="form-control  border-0" id="fecha" >   -->


                <p>{{ date('d-m-Y  h:i A', strtotime($id_cliente->created_at)) }} &nbsp; {{ \Carbon\Carbon::parse($id_cliente->created_at)->diffForHumans() }}</p>



              </div>

            </div>

          </div>



      </div>




      <!-- 
              <div class="form-group">
              <label for="end" class="col-sm-2 control-label">Fecha final</label>
              
              -->


      <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>

      <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{ $id_cliente->id }}" readonly>

      <input type="hidden" name="id_historia" class="form-control" id="id_historia" readonly>



      <!--     
              
              <div id="enlace_listado">  
                        
              <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p> 
                        
              </div>
              
              -->

      <div class="modal-footer">

        <button type="button" class="btn btn-primary float-left mt-5" data-toggle="modal" data-target="#modalControlMedico" style="position: absolute; top: 0; left: 420px">
          <span class="fa fa-street-view fa-fw"></span>
          Crear control clínico
        </button>


        <button type="button" class="btn btn-primary float-left mt-5" data-toggle="modal" data-target="#modalVerControlesMedicos" style="position: absolute; top: 0; left: 620px">
          <span class="fa fa-eye fa-fw"></span>
          Ver controles
        </button>



        <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>

    </div>
  </div>
</div>

</form>
</div>

</div>



<!--=====================================

    MODAL EDITAR CLIENTE

======================================-->

<div class="modal fade" id="modalEditarCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-edit mr-3"></span>Cambiar datos del cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">


        <form method="POST" id="form_editar_cliente" action="{{ url('actualizar/id') }}">

          <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->

          <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{$id_cliente->id_cliente}}" autofocus required autocomplete="off">


          <div class="row">

            <div class="col-md-3">

              <div class="form-group">

                <label for="Cedula" class="control-label">Cédula</label>


                <input type="number" name="cedula" class="form-control" id="cedula" value="{{$id_cliente->cedula}}" autofocus required autocomplete="off">


                <div class="alert-message" id="cedulaError"></div>

              </div>

            </div>



            <div class="col-md-9">

              <div class="form-group">

                <label for="mascota" class="control-label">Mascota</label>

                <input type="text" name="mascota" class="typeahead form-control text-capitalize" id="mascota" value="{{$id_cliente->nombre}}" required autocomplete="off">

                <div class="alert-message" id="nombreError"></div>

              </div>
            </div>


            <div class="col-md-3">

              <div class="form-group">

                <label for="fecha_nacimiento" class="control-label">Fecha nacimiento</label>


                <input type="date" class="form-control" id="fecha_nacimiento2" name="fecha_nacimiento2" required value="{{ date_format(date_create($id_cliente->fecha_nacimiento), 'Y-m-d') }}">

                <div class="alert-message" id="fechaNacimientoError"></div>

              </div>

              <input type="hidden" class="form-control" name="fecha_nacimiento_a" id="fecha_nacimiento_a"  required />

            </div>


            <div class="col-md-3">

              <div class="form-group">

                <label for="edad" class="control-label">Edad</label>


                <input type="text" name="edad1" class="form-control" id="edad1" readonly autocomplete="off">


                <div class="alert-message" id="EdadError"></div>

              </div>

            </div>


            <div class="col-md-6">
              <div class="form-group">

                <label for="telefono" class="control-label">Tel/Cel.</label>

                <input type="text" name="celular" class="form-control" id="celular" value="{{$id_cliente->celular}}" required autocomplete="off">

                <div class="alert-message" id="celularError"></div>

              </div>
            </div>


            <div class="col-md-5">

              <div class="form-group">

                <label for="direccion" class="control-label">Dirección</label>

                <input type="text" name="direccion" class="form-control text-capitalize" id="direccion" value="{{$id_cliente->direccion}}" required onkeypress="return isNumber(event)">

                <div class="alert-message" id="direccionError"></div>

              </div>

            </div>



            <div class="col-md-3">

              <div class="form-group">

                <label for="municipio" class="control-label">Municipio</label>

                <input type="text" name="municipio" class="form-control text-capitalize" id="municipio" value="{{$id_cliente->municipio}}" required onkeypress="return isNumber(event)">

                <div class="alert-message" id="municipioError"></div>

              </div>

            </div>



            <div class="col-md-4">

              <div class="form-group">

                <label for="barrio" class="control-label">Barrio</label>

                <input type="text" id="barrio" name="barrio" class="form-control text-capitalize" value="{{$id_cliente->barrio}}" required autocomplete="off">

                <div class="alert-message" id="barrioError"></div>

              </div>
            </div>



            <div class="col-md-12">

              <div class="form-group">

                <label for="email" class="control-label">Email</label>

                <input type="email" name="email" class="form-control" id="email" value="{{$id_cliente->email}}" autocomplete="off">

                <div class="alert-message" id="emailError"></div>

              </div>
            </div>

          </div>




          <!-- 
            <div class="form-group">
            <label for="end" class="col-sm-2 control-label">Fecha final</label>
            
            -->


          <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>

          <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{ $id_cliente->id_cliente}}" readonly>


          <!--     
            
            <div id="enlace_listado">  
                      
            <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p> 
                      
            </div>
            
            -->

          <div class="modal-footer">

            <button type="submit" id="editar_cliente" name="editar_cliente" class="btn btn-primary">Guardar</button>
            <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

          </div>

      </div>
    </div>
  </div>

  </form>
</div>


</div>





<!--=====================================

 CREAR CONTROL MÉDICO

======================================-->

<div class="modal fade" id="modalControlMedico" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list-alt mr-3"></span>Crear control médico </h5>

        <div class="col-6 align-items-center" style="font-size: small;">
          <div id="datos_historia_clinica">
            <h5> <a class=" mx-1 nombre" style="color:coral">{{$id_cliente->nombre}}</a></h5>
            <a class="mx-1 especie" style="color:black">{{$id_cliente->edad() }} años </a>
            <!--  <a class="mx-1 raza" style="color:black">{{$id_cliente->peso}}</a> -->
            <!--  <a class="mx-1 edad" style="color:black">{{$id_cliente->estatura}}</a> -->
          </div>
        </div>


        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>


        </button>

      </div>

      <div class="modal-body">


        <form method="POST" id="form_control_medico" action="{{ url('/crear_control') }}">

          <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            <div class="col-md-3">

              <div class="form-group">

                <label for="num control" class="control-label">Núm. control</label>


                <input type="number" name="num_control" class="form-control" id="num_control" autofocus required autocomplete="off">


                <div class="alert-message" id="numControlError"></div>

              </div>

            </div>



            <div class="col-md-3">

              <div class="form-group">

                <label for="peso" class="control-label">Peso</label>

                <input type="number" name="peso" class="form-control" id="peso" required autocomplete="off">

                <div class="alert-message" id="pesoError"></div>

              </div>
            </div>


            <div class="col-md-3">

              <div class="form-group">

                <label for="abd" class="control-label">ABD</label>


                <input type="number" class="form-control" id="abd" name="abd" required>

                <div class="alert-message" id="ABDError"></div>

              </div>
            </div>




            <div class="col-md-3">

              <div class="form-group">

                <label for="grasa" class="control-label">Grasa</label>


                <input type="number" name="grasa" class="form-control" id="grasa" autocomplete="off">


                <div class="alert-message" id="grasaError"></div>

              </div>
            </div>



            <div class="col-md-3">
              <div class="form-group">

                <label for="agua" class="control-label">Agua</label>

                <input type="number" name="agua" class="form-control" id="agua" required autocomplete="off">

                <div class="alert-message" id="aguaError"></div>

              </div>
            </div>

          </div>




          <!-- 
            <div class="form-group">
            <label for="end" class="col-sm-2 control-label">Fecha final</label>
            
            -->


          <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>

          <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{ $id_cliente->id_cliente}}" readonly>

          <input type="hidden" name="id_historia" class="form-control" id="id_historia" readonly>



          <!--     
            
            <div id="enlace_listado">  
                      
            <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p> 
                      
            </div>
            
            -->

          <div class="modal-footer">

            <button type="submit" id="crear_control_clinico" name="crear_control_clinico" class="btn btn-primary">Guardar</button>
            <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

          </div>

      </div>
    </div>
  </div>

  </form>
</div>


</div>






<!--=====================================

   EDITAR CONTROL GESTIÓN MASCOTA

======================================-->

<div class="modal fade" id="modalGestionMascota" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list-alt mr-3"></span>Editar control médico </h5>

        <div class="col-6 align-items-center" style="font-size: small;">
          <div id="datos_historia_clinica">
            <h5> <a class=" mx-1 nombre" style="color:coral">{{$id_cliente->nombre}}</a></h5>
            <a class="mx-1 especie" style="color:black">{{$id_cliente->edad}}</a>
            <!--  <a class="mx-1 raza" style="color:black">{{$id_cliente->peso}}</a> -->
            <!--  <a class="mx-1 edad" style="color:black">{{$id_cliente->estatura}}</a> -->
          </div>
        </div>


        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>


        </button>

      </div>

      <div class="modal-body">


        <form method="POST" id="form_editar_control" action="{{ url('/actualizar_control') }}">


        <div class="container-fluid">

<div class="row">

  <!--
        <div class="col-sm-6">
          <h1 class="m-0">Clientes</h1>
        </div><!-- /.col -->

  <!--

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Clientes</li>
          </ol>
        </div><!-- /.col -->





</div>




<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-5">

<div class="card card-primary card-outline">
<div class="card-body box-profile">
<div class="text-center">
<img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
</div>
<h3 class="profile-username text-center">Nina Mcintire</h3>
<p class="text-muted text-center">Software Engineer</p>
<ul class="list-group list-group-unbordered mb-3">
<li class="list-group-item">
 <a class="float-left"><i class="fa fa-address-book-o" aria-hidden="true"></i>  {{$id_cliente->nombre}}</a>
</li>
<li class="list-group-item">
 <a class="float-left"><i class="fa fa-phone" aria-hidden="true"></i>  {{$id_cliente->celular}}</a>
</li>
<li class="list-group-item">
<a class="float-left"><i class="fa fa-envelope-o" aria-hidden="true"></i>  {{$id_cliente->email}}</a>
</li>
</ul>



<div class="card-body">



<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
<a class="nav-link active" id="v-pills-datosPaciente-tab" data-toggle="pill" href="#v-pills-datosPaciente" role="tab" aria-controls="v-pills-datosPaciente" aria-selected="true"><i class="fa fa-user" aria-hidden="true"></i> Datos del paciente</a>
<a class="nav-link" id="v-pills-historiaClinica-tab" data-toggle="pill" href="#v-pills-historiaClinica" role="tab" aria-controls="v-pills-historiaClinica" aria-selected="false"><i class="fa fa-list" aria-hidden="true"></i>   História clínica</a>
<a class="nav-link" id="v-pills-recetas-tab" data-toggle="pill" href="#v-pills-recetas" role="tab" aria-controls="v-pills-recetas" aria-selected="false"><i class="fa-solid fa-file-prescription" aria-hidden="true"></i>  Recetas</a>
<a class="nav-link" id="v-pills-vacunas" data-toggle="pill" href="#v-pills-vacunas" role="tab" aria-controls="v-pills-vacunas" aria-selected="false"><i class="fa-solid fa-eye-dropper"></i>  Vacunas</a>
<a class="nav-link" id="v-pills-antiparasitarios" data-toggle="pill" href="#v-pills-antiparasitarios" role="tab" aria-controls="v-pills-antiparasitarios" aria-selected="false"> <i class="fa fa-stop-circle"></i>  Antiparasitaros</a>
<a class="nav-link" id="v-pills-trasnfunciones" data-toggle="pill" href="#v-pills-transfuciones" role="tab" aria-controls="v-pills-trasnfuciones" aria-selected="false"> <i class="fa-solid fa-syringe"></i>  Transfuciones</a>
<a class="nav-link" id="v-pills-archivos" data-toggle="pill" href="#v-pills-archivos" role="tab" aria-controls="v-pills-archivos" aria-selected="false"><i class="fa-solid fa-archive"></i>  Archivos</a>
<a class="nav-link" id="v-pills-hospitalizacion" data-toggle="pill" href="#v-pills-hospitalizacion" role="tab" aria-controls="v-pills-hospitalizacion" aria-selected="false"><i class="fa-solid fa-briefcase-medical"></i>  Hospitalización</a>
<a class="nav-link" id="v-pills-procedimientos" data-toggle="pill" href="#v-pills-procedimientos" role="tab" aria-controls="v-pills-procedimmientos" aria-selected="false"><i class="fa-solid fa-vial-circle-check"></i>  Procedimientos</a>
<a class="nav-link" id="v-pills-certificados" data-toggle="pill" href="#v-pills-certificados" role="tab" aria-controls="v-pills-certificados" aria-selected="false"><i class="fa-solid fa-receipt"></i>  Certificados</a>
<a class="nav-link" id="v-pills-recordatorios" data-toggle="pill" href="#v-pills-recordatorios" role="tab" aria-controls="v-pills-recordatorios" aria-selected="false"><i class="fa-solid fa-bell"></i>  recordatorios</a>
<a class="nav-link" id="v-pills-comunicaciones" data-toggle="pill" href="#v-pills-comunicaciones" role="tab" aria-controls="v-pills-comunicaciones" aria-selected="false"><i class="fa fa-comment-sms"></i>  Comunicaciones</a>
<a class="nav-link" id="v-pills-estetica" data-toggle="pill" href="#v-pills-estetica" role="tab" aria-controls="v-pills-estetica" aria-selected="false"><i class="fa-solid fa-bath"></i>  Estética y baño</a>







</div>
<div class="tab-content" id="v-pills-tabContent">
<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
</div>


</div>
</div>
</div>
</div>

<div class="col-md-7">
<div class="card">
<div class="card-header p-2">
<ul class="nav nav-pills">
<li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
<li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
</ul>
</div>
<div class="card-body">
<div class="tab-content">
<div class="active tab-pane" id="activity">

<div class="post">
<div class="user-block">
<img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
<span class="username">
<a href="#">Jonathan Burke Jr.</a>
<a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
</span>
<span class="description">Shared publicly - 7:30 PM today</span>
</div>

<p>
Lorem ipsum represents a long-held tradition for designers,
typographers and the like. Some people hate it and argue for
its demise, but others ignore the hate as they create awesome
tools to help create filler text for everyone from bacon lovers
to Charlie Sheen fans.
</p>
<p>
<a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
<a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
<span class="float-right">
<a href="#" class="link-black text-sm">
<i class="far fa-comments mr-1"></i> Comments (5)
</a>
</span>
</p>
<input class="form-control form-control-sm" type="text" placeholder="Type a comment">
</div>


<div class="post clearfix">
<div class="user-block">
<img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
<span class="username">
<a href="#">Sarah Ross</a>
<a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
</span>
<span class="description">Sent you a message - 3 days ago</span>
</div>

<p>
Lorem ipsum represents a long-held tradition for designers,
typographers and the like. Some people hate it and argue for
its demise, but others ignore the hate as they create awesome
tools to help create filler text for everyone from bacon lovers
to Charlie Sheen fans.
</p>
<form class="form-horizontal">
<div class="input-group input-group-sm mb-0">
<input class="form-control form-control-sm" placeholder="Response">
<div class="input-group-append">
<button type="submit" class="btn btn-danger">Send</button>
</div>
</div>
</form>
</div>


<div class="post">
<div class="user-block">
<img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
<span class="username">
<a href="#">Adam Jones</a>
<a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
</span>
<span class="description">Posted 5 photos - 5 days ago</span>
</div>

<div class="row mb-3">
<div class="col-sm-6">


<table id="Table_mascotas" class="table table-hover" width="100%" style="width:100%;font-size:12.5px;">

<thead>
<tr>
  <th>Mascota</th>
  <th>Especie</th>
  <th>Raza</th>
  <th>Sexo</th>
  <th>Edad</th>
 
</tr>
          </thead>

          <tbody>



         
          
              </thead>

            

              </tbody>


              </table>
             
              </tr>



              @foreach ($id_clientes as $mascota)

                <input type="text" id="id_mascota" name="id_mascota" value="{{ $mascota->id  ?? ''}}">


            @endforeach

            





             

           



<img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
</div>

<div class="col-sm-6">
<div class="row">
<div class="col-sm-6">
<img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
<img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
</div>

<div class="col-sm-6">
<img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
<img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
</div>

</div>

</div>

</div>

<p>
<a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
<a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
<span class="float-right">
<a href="#" class="link-black text-sm">
<i class="far fa-comments mr-1"></i> Comments (5)
</a>
</span>
</p>
<input class="form-control form-control-sm" type="text" placeholder="Type a comment">
</div>

</div>

<div class="tab-pane" id="timeline">

<div class="timeline timeline-inverse">

<div class="time-label">
<span class="bg-danger">
10 Feb. 2014
</span>
</div>


<div>
<i class="fas fa-envelope bg-primary"></i>
<div class="timeline-item">
<span class="time"><i class="far fa-clock"></i> 12:05</span>
<h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
<div class="timeline-body">
Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
weebly ning heekya handango imeem plugg dopplr jibjab, movity
jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
quora plaxo ideeli hulu weebly balihoo...
</div>
<div class="timeline-footer">
<a href="#" class="btn btn-primary btn-sm">Read more</a>
<a href="#" class="btn btn-danger btn-sm">Delete</a>
</div>
</div>
</div>


<div>
<i class="fas fa-user bg-info"></i>
<div class="timeline-item">
<span class="time"><i class="far fa-clock"></i> 5 mins ago</span>
<h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
</h3>
</div>
</div>


<div>
<i class="fas fa-comments bg-warning"></i>
<div class="timeline-item">
<span class="time"><i class="far fa-clock"></i> 27 mins ago</span>
<h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
<div class="timeline-body">
Take me to your leader!
Switzerland is small and neutral!
We are more like Germany, ambitious and misunderstood!
</div>
<div class="timeline-footer">
<a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
</div>
</div>
</div>


<div class="time-label">
<span class="bg-success">
3 Jan. 2014
</span>
</div>


<div>
<i class="fas fa-camera bg-purple"></i>
<div class="timeline-item">
<span class="time"><i class="far fa-clock"></i> 2 days ago</span>
<h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
<div class="timeline-body">
<img src="https://placehold.it/150x100" alt="...">
<img src="https://placehold.it/150x100" alt="...">
<img src="https://placehold.it/150x100" alt="...">
<img src="https://placehold.it/150x100" alt="...">
</div>
</div>
</div>

<div>
<i class="far fa-clock bg-gray"></i>
</div>
</div>
</div>

<div class="tab-pane" id="settings">
<form class="form-horizontal">
<div class="form-group row">
<label for="inputName" class="col-sm-2 col-form-label">Name</label>
<div class="col-sm-10">
<input type="email" class="form-control" id="inputName" placeholder="Name">
</div>
</div>
<div class="form-group row">
<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
<div class="col-sm-10">
<input type="email" class="form-control" id="inputEmail" placeholder="Email">
</div>
</div>
<div class="form-group row">
<label for="inputName2" class="col-sm-2 col-form-label">Name</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="inputName2" placeholder="Name">
</div>
</div>
<div class="form-group row">
<label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
<div class="col-sm-10">
<textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
</div>
</div>
<div class="form-group row">
<label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="inputSkills" placeholder="Skills">
</div>
</div>
<div class="form-group row">
<div class="offset-sm-2 col-sm-10">
<div class="checkbox">
<label>
<input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
</label>
</div>
</div>
</div>
<div class="form-group row">
<div class="offset-sm-2 col-sm-10">
<button type="submit" class="btn btn-danger">Submit</button>
</div>
</div>
</form>
</div>

</div>

</div>
</div>

</div>

</div>

</div>
</section>





<!--  =======================================

MODAL DATATABLE CONTROLES MEDICOS

============================================-->


<div class="modal fade" id="modalVerControlesMedicos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


  <div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list mr-3"></span>Listado de controles realizados</h5>
        <div class="col-6 align-items-center" style="font-size: small;">
          <div id="datos_historia_clinica">
            <h5> <a class=" mx-1 nombre" style="color:coral">{{$id_cliente->nombre}}</a></h5>
            <a class="mx-1 especie" style="color:black">{{$id_cliente->edad}}</a>
            <!--  <a class="mx-1 raza" style="color:black">{{$id_cliente->peso}}</a> -->
            <!--  <a class="mx-1 edad" style="color:black">{{$id_cliente->estatura}}</a> -->
          </div>
        </div>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <div class="row">
          <div class="col-lg-12">


            <table id="Table_control_medico" class="table dt-responsive  table-hover" style="width:100%;font-size:12.5px;">
              <thead>
                <tr>

                  <th>Número</th>
                  <th>Fecha</th>
                  <th>Peso</th>
                  <th>ABD</th>
                  <th>grasa</th>
                  <th>Agua</th>
                  <th></th>
                </tr>

              </thead>

              <tbody>

              </tbody>


            </table>




          </div>
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>








<!--=====================================

    MODAL MOSTRAR DATOS DE  HISTÓRIA CLÍNICA

=========================================-->





<div class="modal fade" id="modalMostrarMascota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static" aria-hidden="true">


  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list-alt mr-3"></span>História clínica </h5>

        <div class="col-6 align-items-center" style="font-size: small;">
          <div id="datos_historia_clinica">
            <h5> <a class=" mx-1 nombre" style="color:coral">{{$id_cliente->nombre}}</a></h5>
            <a class="mx-1 especie" style="color:black"> {{$id_cliente->edad() }} años </a>
            <!--  <a class="mx-1 raza" style="color:black">{{$id_cliente->peso}}</a> -->
            <!--  <a class="mx-1 edad" style="color:black">{{$id_cliente->estatura}}</a> -->
          </div>
        </div>



        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>


      </div>

      <div class="modal-body">


        <form method="POST" id="form_mostrar_mascota" action="{{ url('clientes') }}">

          <!-- @csrf -->

          <!--   <input type="hidden" name="_token" value="{{csrf_token()}}">  -->



          <div class="row" style="font-size:90%;">

            <div class="col-md-2">

              <div class="form-group">

                <label for="mascota" class="control-label font-weight-normal"><b>mascota</b></label>


                <input type="text" name="mascota" class="form-control  border-0" id="mascota">

              </div>
            </div>




            <div class="col-md-2">

              <div class="form-group">

                <label for="fecha nacimiento" class="control-label font-weight-normal"><b>fecha nacimiento</b></label>

                <input type="text" name="fecha_nacimiento" class="form-control text-muted  border-0" id="fecha_nacimiento">

              </div>

            </div>




            <div class="col-md-2">

              <div class="form-group">

                <label for="anos" class="control-label font-weight-normal"><b>Años</b></label>

                <input type="text" name="anos" class="form-control text-muted  border-0" id="anos">

              </div>

            </div>


            <div class="col-md-2">

              <div class="form-group">

                <label for="especie" class="control-label font-weight-normal"><b>Especie</b></label>

                <input type="text" name="especie" class="form-control text-muted  border-0" id="especie">


              </div>

            </div>



            <div class="col-md-2">

              <div class="form-group">

                <label for="raza" class="control-label font-weight-normal"><b>raza</b></label>

                <input type="text" name="raza" class="form-control text-muted  border-0" id="raza">


              </div>
            </div>



            <div class="col-md-2">

              <div class="form-group">

                <label for="sexo" class="control-label font-weight-normal"><b>sexo</b></label>

                <input type="text" name="sexo" class="form-control text-muted   border-0" id="sexo">


              </div>

            </div>




            <div class="col-md-2">

              <div class="form-group">

                <label for="pelaje" class="control-label font-weight-normal"><b>pelaje</b></label>

                <input type="text" name="pelaje" class="form-control text-muted   border-0" id="pelaje">


              </div>

            </div>



            <div class="col-md-2">
              <div class="form-group">

                <label for="color" class="control-label font-weight-normal"><b>Color</b></label>

                <input type="text" name="color" class="form-control text-muted  border-0" id="color">


              </div>

            </div>


            <div class="col-md-3">

              <div class="form-group">

                <label for="peso" class="control-label font-weight-normal "><b>Peso</b></label>

                <input type="text" name="peso" class="form-control text-muted border-0" id="peso">


              </div>

            </div>



            <div class="col-md-4">

              <div class="form-group">

                <label for="alimento" class="control-label font-weight-normal"><b>Comida que consume</b></label>

                <input type="text" name="alimento" class="form-control text-muted border-0" id="alimiento">


              </div>

            </div>


            <div class="col-md-4">

              <div class="form-group">

                <label for="vivienda" class="control-label font-weight-normal"><b>Vivienda compartida</b></label>

                <input type="text" name="vivienda" class="form-control  text-muted  border-0" id="vivienda">


              </div>

            </div>

            <div class="col-md-3">

              <div class="form-group">

                <label for="ultimo celo" class="control-label font-weight-normal"><b>Último celo</b></label>

                <input type="text" name="ultimo_celo" class="form-control text-muted  border-0" id="ultimo_celo">


              </div>

            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="medico_tratante" class="control-label font-weight-normal"><b>Patología preexistente</b></label>

                <input type="text" name="preexistencia" class="form-control  border-0" id="preexistencia">


              </div>

            </div>



            <div class="col-md-2">

              <div class="form-group">

                <label for="factor DEA" class="control-label font-weight-normal"><b>Factor DEA</b></label>

                <input type="text" name="factor_DEA" class="form-control text-muted  border-0" id="factor_DEA">


              </div>

            </div> 


            <div class="col-md-2">

              <div class="form-group">

                <label for="pedigree" class="control-label font-weight-normal"><b>Pedigree</b></label>

                <input type="text" name="pedigree" class="form-control text-muted  border-0" id="pedigree">


              </div>

            </div>



            <div class="col-md-2">

                <div class="form-group">

                  <label for="donante" class="control-label font-weight-normal"><b>Donante</b></label>

                  <input type="text" name="donante" class="form-control text-muted  border-0" id="donante">


                </div>

             </div>


             <div class="col-md-2">

                  <div class="form-group">

                    <label for="fallecido" class="control-label font-weight-normal"><b>Fallecido</b></label>

                    <input type="text" name="fallecido" class="form-control text-muted   border-0" id="fallecido">


                  </div>

              </div>


              <div class="col-md-2">

                  <div class="form-group">

                    <label for="transfusiones" class="control-label font-weight-normal"><b>Transfuciones</b></label>

                    <input type="text" name="transfusiones" class="form-control text-muted  border-0" id="transfusiones">


                  </div>

              </div>



              <div class="col-md-2">

                  <div class="form-group">

                    <label for="reproductor" class="control-label font-weight-normal"><b>Reproductor</b></label>

                    <input type="text" name="reproductor" class="form-control text-muted  border-0" id="reproductor">


                  </div>

               </div>


               <div class="col-md-2">

                  <div class="form-group">

                    <label for="esterilizado" class="control-label font-weight-normal"><b>Esterilizado</b></label>

                    <input type="text" name="esterilizado" class="form-control text-muted  border-0" id="esterilizado">


                  </div>

              </div>



              <div class="col-md-2">

                  <div class="form-group">

                    <label for="adopcion" class="control-label font-weight-normal"><b>Adopción</b></label>

                    <input type="text" name="adopcion" class="form-control text-muted  border-0" id="adopcion">


                  </div>

              </div>


              <div class="col-md-4">

                <div class="form-group">

                  <label for="veterinario" class="control-label font-weight-normal"><b>Veterinario remitente</b></label>

                  <input type="text" name="veterinario_remitente" class="form-control text-muted   border-0" id="veterinario_remitente">


                </div>

              </div>



              <div class="col-md-4">

                  <div class="form-group">

                    <label for="agresividad" class="control-label font-weight-normal"><b>Agresividad</b></label>

                    <input type="range" name="agresividad" class="form-control   border-0" id="agresividad" min="0" max="5" step="1" value="0"  oninput="num.value = this.value">
                    <output id="num">0</output>

                  </div>

               </div>



            <div class="col-md-8">

              <div class="form-group">

                <label for="fecha de creacion" class="control-label font-weight-normal"><b>Fecha de creación</b></label>


                <!--  <input type="text" name="fecha" class="form-control  border-0" id="fecha" >   -->


                <p>{{ date('d-m-Y  h:i A', strtotime($id_cliente->created_at)) }} &nbsp; {{ \Carbon\Carbon::parse($id_cliente->created_at)->diffForHumans() }}</p>



              </div>

            </div>

          </div>



      </div>




      <!-- 
              <div class="form-group">
              <label for="end" class="col-sm-2 control-label">Fecha final</label>
              
              -->


      <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>

      <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{ $id_cliente->id }}" readonly>

      <input type="hidden" name="id_historia" class="form-control" id="id_historia" readonly>



      <!--     
              
              <div id="enlace_listado">  
                        
              <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p> 
                        
              </div>
              
              -->

      <div class="modal-footer">

        <button type="button" class="btn btn-primary float-left mt-5" data-toggle="modal" data-target="#modalControlMedico" style="position: absolute; top: 0; left: 420px">
          <span class="fa fa-street-view fa-fw"></span>
          Crear control clínico
        </button>


        <button type="button" class="btn btn-primary float-left mt-5" data-toggle="modal" data-target="#modalVerControlesMedicos" style="position: absolute; top: 0; left: 620px">
          <span class="fa fa-eye fa-fw"></span>
          Ver controles
        </button>



        <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>

    </div>
  </div>
</div>

</form>
</div>

</div>



<!--=====================================

    MODAL EDITAR CLIENTE

======================================-->

<div class="modal fade" id="modalEditarCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-edit mr-3"></span>Cambiar datos del cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">


        <form method="POST" id="form_editar_cliente" action="{{ url('actualizar/id') }}">

          <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->

          <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{$id_cliente->id_cliente}}" autofocus required autocomplete="off">


          <div class="row">

            <div class="col-md-3">

              <div class="form-group">

                <label for="Cedula" class="control-label">Cédula</label>


                <input type="number" name="cedula" class="form-control" id="cedula" value="{{$id_cliente->cedula}}" autofocus required autocomplete="off">


                <div class="alert-message" id="cedulaError"></div>

              </div>

            </div>



            <div class="col-md-9">

              <div class="form-group">

                <label for="mascota" class="control-label">Mascota</label>

                <input type="text" name="mascota" class="typeahead form-control text-capitalize" id="mascota" value="{{$id_cliente->nombre}}" required autocomplete="off">

                <div class="alert-message" id="nombreError"></div>

              </div>
            </div>


            <div class="col-md-3">

              <div class="form-group">

                <label for="fecha_nacimiento" class="control-label">Fecha nacimiento</label>


                <input type="date" class="form-control" id="fecha_nacimiento2" name="fecha_nacimiento2" required value="{{ date_format(date_create($id_cliente->fecha_nacimiento), 'Y-m-d') }}">

                <div class="alert-message" id="fechaNacimientoError"></div>

              </div>

              <input type="hidden" class="form-control" name="fecha_nacimiento_a" id="fecha_nacimiento_a"  required />

            </div>


            <div class="col-md-3">

              <div class="form-group">

                <label for="edad" class="control-label">Edad</label>


                <input type="text" name="edad1" class="form-control" id="edad1" readonly autocomplete="off">


                <div class="alert-message" id="EdadError"></div>

              </div>

            </div>


            <div class="col-md-6">
              <div class="form-group">

                <label for="telefono" class="control-label">Tel/Cel.</label>

                <input type="text" name="celular" class="form-control" id="celular" value="{{$id_cliente->celular}}" required autocomplete="off">

                <div class="alert-message" id="celularError"></div>

              </div>
            </div>


            <div class="col-md-5">

              <div class="form-group">

                <label for="direccion" class="control-label">Dirección</label>

                <input type="text" name="direccion" class="form-control text-capitalize" id="direccion" value="{{$id_cliente->direccion}}" required onkeypress="return isNumber(event)">

                <div class="alert-message" id="direccionError"></div>

              </div>

            </div>



            <div class="col-md-3">

              <div class="form-group">

                <label for="municipio" class="control-label">Municipio</label>

                <input type="text" name="municipio" class="form-control text-capitalize" id="municipio" value="{{$id_cliente->municipio}}" required onkeypress="return isNumber(event)">

                <div class="alert-message" id="municipioError"></div>

              </div>

            </div>



            <div class="col-md-4">

              <div class="form-group">

                <label for="barrio" class="control-label">Barrio</label>

                <input type="text" id="barrio" name="barrio" class="form-control text-capitalize" value="{{$id_cliente->barrio}}" required autocomplete="off">

                <div class="alert-message" id="barrioError"></div>

              </div>
            </div>



            <div class="col-md-12">

              <div class="form-group">

                <label for="email" class="control-label">Email</label>

                <input type="email" name="email" class="form-control" id="email" value="{{$id_cliente->email}}" autocomplete="off">

                <div class="alert-message" id="emailError"></div>

              </div>
            </div>

          </div>




          <!-- 
            <div class="form-group">
            <label for="end" class="col-sm-2 control-label">Fecha final</label>
            
            -->


          <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>

          <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{ $id_cliente->id_cliente}}" readonly>


          <!--     
            
            <div id="enlace_listado">  
                      
            <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p> 
                      
            </div>
            
            -->

          <div class="modal-footer">

            <button type="submit" id="editar_cliente" name="editar_cliente" class="btn btn-primary">Guardar</button>
            <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

          </div>

      </div>
    </div>
  </div>

  </form>
</div>


</div>





<!--=====================================

 CREAR CONTROL MÉDICO

======================================-->

<div class="modal fade" id="modalControlMedico" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list-alt mr-3"></span>Crear control médico </h5>

        <div class="col-6 align-items-center" style="font-size: small;">
          <div id="datos_historia_clinica">
            <h5> <a class=" mx-1 nombre" style="color:coral">{{$id_cliente->nombre}}</a></h5>
            <a class="mx-1 especie" style="color:black">{{$id_cliente->edad() }} años </a>
            <!--  <a class="mx-1 raza" style="color:black">{{$id_cliente->peso}}</a> -->
            <!--  <a class="mx-1 edad" style="color:black">{{$id_cliente->estatura}}</a> -->
          </div>
        </div>


        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>


        </button>

      </div>

      <div class="modal-body">


        <form method="POST" id="form_control_medico" action="{{ url('/crear_control') }}">

          <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            <div class="col-md-3">

              <div class="form-group">

                <label for="num control" class="control-label">Núm. control</label>


                <input type="number" name="num_control" class="form-control" id="num_control" autofocus required autocomplete="off">


                <div class="alert-message" id="numControlError"></div>

              </div>

            </div>



            <div class="col-md-3">

              <div class="form-group">

                <label for="peso" class="control-label">Peso</label>

                <input type="number" name="peso" class="form-control" id="peso" required autocomplete="off">

                <div class="alert-message" id="pesoError"></div>

              </div>
            </div>


            <div class="col-md-3">

              <div class="form-group">

                <label for="abd" class="control-label">ABD</label>


                <input type="number" class="form-control" id="abd" name="abd" required>

                <div class="alert-message" id="ABDError"></div>

              </div>
            </div>




            <div class="col-md-3">

              <div class="form-group">

                <label for="grasa" class="control-label">Grasa</label>


                <input type="number" name="grasa" class="form-control" id="grasa" autocomplete="off">


                <div class="alert-message" id="grasaError"></div>

              </div>
            </div>



            <div class="col-md-3">
              <div class="form-group">

                <label for="agua" class="control-label">Agua</label>

                <input type="number" name="agua" class="form-control" id="agua" required autocomplete="off">

                <div class="alert-message" id="aguaError"></div>

              </div>
            </div>

          </div>




          <!-- 
            <div class="form-group">
            <label for="end" class="col-sm-2 control-label">Fecha final</label>
            
            -->


          <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>

          <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{ $id_cliente->id_cliente}}" readonly>

          <input type="hidden" name="id_historia" class="form-control" id="id_historia" readonly>



          <!--     
            
            <div id="enlace_listado">  
                      
            <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p> 
                      
            </div>
            
            -->

          <div class="modal-footer">

            <button type="submit" id="crear_control_clinico" name="crear_control_clinico" class="btn btn-primary">Guardar</button>
            <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

          </div>

      </div>
    </div>
  </div>

  </form>
</div>


</div>






<!--=====================================

   EDITAR CONTROL MÉDICO

======================================-->

<div class="modal fade" id="modalEditarControl" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list-alt mr-3"></span>Editar control médico </h5>

        <div class="col-6 align-items-center" style="font-size: small;">
          <div id="datos_historia_clinica">
            <h5> <a class=" mx-1 nombre" style="color:coral">{{$id_cliente->nombre}}</a></h5>
            <a class="mx-1 especie" style="color:black">{{$id_cliente->edad}}</a>
            <!--  <a class="mx-1 raza" style="color:black">{{$id_cliente->peso}}</a> -->
            <!--  <a class="mx-1 edad" style="color:black">{{$id_cliente->estatura}}</a> -->
          </div>
        </div>


        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>


        </button>

      </div>

      <div class="modal-body">


        <form method="POST" id="form_editar_control" action="{{ url('/actualizar_control') }}">



          <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


          <div class="row">

            <div class="col-md-3">

              <div class="form-group">

                <label for="num control" class="control-label">Núm. control</label>


                <input type="number" name="num_control" class="form-control" id="num_control" autofocus required autocomplete="off">


                <div class="alert-message" id="numControlError"></div>

              </div>

            </div>



            <div class="col-md-3">

              <div class="form-group">

                <label for="peso" class="control-label">Peso</label>

                <input type="number" name="peso" class="form-control" id="peso" required autocomplete="off">

                <div class="alert-message" id="pesoError"></div>

              </div>
            </div>


            <div class="col-md-3">

              <div class="form-group">

                <label for="abd" class="control-label">ABD</label>


                <input type="number" class="form-control" id="abd" name="abd" required>

                <div class="alert-message" id="ABDError"></div>

              </div>
            </div>




            <div class="col-md-3">

              <div class="form-group">

                <label for="grasa" class="control-label">Grasa</label>


                <input type="number" name="grasa" class="form-control" id="grasa" autocomplete="off">


                <div class="alert-message" id="grasaError"></div>

              </div>
            </div>



            <div class="col-md-3">
              <div class="form-group">

                <label for="agua" class="control-label">Agua</label>

                <input type="number" name="agua" class="form-control" id="agua" required autocomplete="off">

                <div class="alert-message" id="aguaError"></div>

              </div>
            </div>



          </div>

      </div>



      <!-- 
            <div class="form-group">
            <label for="end" class="col-sm-2 control-label">Fecha final</label>
            
            -->


      <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>

      <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" value="{{ $id_cliente->id_cliente}}" readonly>


      <input type="hidden" name="id_historia" class="form-control" id="id_historia" readonly>

      <input type="hidden" name="id_control" class="form-control" id="id_control" readonly>


      <!--     
            
            <div id="enlace_listado">  
                      
            <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p> 
                      
            </div>
            
            -->

      <div class="modal-footer">

        <button type="submit" id="editar_control" name="editar_control" class="btn btn-primary">Guardar</button>
        <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>

    </div>
  </div>
</div>

</form>
</div>


</div>





<!--  =======================================

MODAL DATATABLE CONTROLES MEDICOS

============================================-->


<div class="modal fade" id="modalVerControlesMedicos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


  <div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list mr-3"></span>Listado de controles realizados</h5>
        <div class="col-6 align-items-center" style="font-size: small;">
          <div id="datos_historia_clinica">
            <h5> <a class=" mx-1 nombre" style="color:coral">{{$id_cliente->nombre}}</a></h5>
            <a class="mx-1 especie" style="color:black">{{$id_cliente->edad}}</a>
            <!--  <a class="mx-1 raza" style="color:black">{{$id_cliente->peso}}</a> -->
            <!--  <a class="mx-1 edad" style="color:black">{{$id_cliente->estatura}}</a> -->
          </div>
        </div>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <div class="row">
          <div class="col-lg-12">


            <table id="Table_control_medico" class="table dt-responsive  table-hover" style="width:100%;font-size:12.5px;">
              <thead>
                <tr>

                  <th>Número</th>
                  <th>Fecha</th>
                  <th>Peso</th>
                  <th>ABD</th>
                  <th>grasa</th>
                  <th>Agua</th>
                  <th></th>
                </tr>

              </thead>

              <tbody>

              </tbody>


            </table>




          </div>
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>







  <!-- ========================================

MOSTRAR SPINNER AL CARGAR PAGINA

========================================== -->

<!--

  <script type="text/javascript">
    $(window).on('load', function() {
      setTimeout(function() {
        $(".loader-page").css({
          visibility: "hidden",
          opacity: "0"
        })
      }, 1000);

    });
  </script>


  -->


 <!-- ========================================

PASAR DATOS DE SELECT SEXO A INPUT TEXT SEXO

========================================== -->


<script>

$('#sexo1').on('change', function() {

  var strlabel1 =$('#sexo1 option:selected').text();

  $('#sexo').val(strlabel1);

})

</script>



 <!-- ========================================

PASAR DATOS DE SELECT ESPECIE A INPUT TEXT ESPECIE

========================================== -->


<script>

$('#especie1').on('change', function() {

  var strlabel1 =$('#especie1 option:selected').text();

  $('#especie').val(strlabel1);

})

</script>





 <!-- ========================================

PASAR DATOS DE SELECT FACTOR_DEA A INPUT TEXT FACTOR_DEA

========================================== -->


<script>

$('#factor_DEA1').on('change', function() {

  var strlabel1 =$('#factor_DEA1 option:selected').text();

  $('#factor_DEA').val(strlabel1);

})

</script>




<script>

/*

$('input[type="checkbox"]').click(function () {
    $(this).prop("checked") ? $(this).val("1") : $(this).val("0")
});

*/
  
</script>





  <!-- ========================================

LIMPIAR SELECT 2

========================================== -->


  <script>
    $('.select2-multiple').select2({

      allowClear: true,
      placeholder: "Seleccione una opción",

    });
  </script>


 <!-- =======================================

CALCULO DE LA EDAD DEL CLIENTE FORM EDICIÓN

=========================================== -->


<script>
    $('#fecha_nacimiento2').blur(function() {
      document.getElementById('edad1').value = 0;

      var fecha = new Date(document.getElementById('fecha_nacimiento2').value);
      var hoy = new Date();
      var edad = Math.floor((hoy - fecha) / (365.25 * 24 * 60 * 60 * 1000));
      document.getElementById('edad1').value = edad + ' ' + 'Años';
      document.getElementById('fecha_nacimiento_a').value = document.getElementById('fecha_nacimiento2').value;
    });
  </script>






  <!-- =======================================

CALCULO DE LA EDAD DEL CLIENTE 

=========================================== -->


  <script>
    $('#fecha_nacimiento1').blur(function() {
      document.getElementById('anos').value = 0;

      var birthDay  = new Date(document.getElementById('fecha_nacimiento1').value);
    
      var DOB = new Date(birthDay);
      var today = new Date();
      var age = today.getTime() - DOB.getTime();
      var elapsed = new Date(age);
      var year = elapsed.getYear()-70;
      var month = elapsed.getMonth();
      var day = elapsed.getDay();



      document.getElementById('anos').value = year;
      document.getElementById('fecha_nacimiento').value = document.getElementById('fecha_nacimiento1').value;
      document.getElementById('meses').value = month;
     
    });
  </script>



  <!-- =======================================

ASIGNAR FECHA DEL ULTIMO CELO

=========================================== -->



  <script>
    $('#ultimo_celo1').blur(function() {
    
      document.getElementById('ultimo_celo').value = document.getElementById('ultimo_celo1').value;
    });
  </script>




  <!-- =======================================

 ASIGNAR PESO DE MASCOTA

=========================================== -->



<script>
    $('#peso').blur(function() {
    
  var suffix = ' Kg';
  var val = $(this).val().replace(suffix, '');
  var final =  val + suffix;
  $(this).val(final);

    });
  </script>




  <!-- =======================================

DESHABILITAR CLICK DERECHO

============================================ -->

  <script>
    $(document).ready(function() {
      $("body").on("contextmenu", function(e) {
        return false;
      });
    });
  </script>



  <!-- ==========================================

DESHABILITAR TECLAS CRTL, U, F12

===============================================  -->

  <script type="text/javascript">
    $(document).keydown(function(event) {
      if (event.keyCode == 123) {
        return false;
      }
    });
  </script>






  <!-- =========================================

DATATABLE MOSTRAR DATOS HISTÓRIA CLINICA

==============================================  -->



  <script type="text/javascript">
    $(document).ready(function() {

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });


      let id = $('#id_cliente').val();


      let table = $('#Table_mascotas').DataTable({

        processing: true,
        serverSide: true,
        rendering: true,
        retrive: true,
        paging: true,
        info: true,
        filter: true,
        responsive: true,
        autoWidth: false,


        type: "GET",

        ajax: '/mascota/' + id,



        columns: [


          {
            data: 'mascota',
            name: 'mascota'
          },
          {
            data: 'especie',
            name: 'especie'
          },
          {
            data: 'sexo',
            name: 'sexo'
          },
          {
            data: 'raza',
            name: 'raza'
          },
          {
            data: 'anos',
            name: 'anos'
          },
         
          {
            data: 'action',
            name: 'action',

            orderable: false,
            searchable: false
          },
        ],

        order: [
          [4, 'asc']
        ],

        "language": {

          /*  "processing": '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..n.</span> ',  */




          "emptyTable": "El cliente no tiene mascotas registradas.",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
          "infoEmpty": "Mostrando 0 to 0 de 0 Entradas",
          "infoFiltered": "(Filtrado de _MAX_ total entradas)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Entradas",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar:",
          "zeroRecords": "Sin resultados encontrados",
          "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
          }

        },




        //===============================================

        // MOSTRAR / OCULTAR BOTÓN CREAR HISTORIA CLINICA               

        //================================================


        /*

            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {

            if (aiDisplay.length > 0) {
              $('#ocultar-boton').css({"display" : "none"});
            }
            else {
              $('#ocultar-boton').css({"display" : "block"});
            }
        }


        */


      });



      //==================================================

      // AGREGAR MASCOTA

      // ==================================================

      $('#form_crear_mascota').off('submit').on('submit', function(event) {

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });


        /* Configurar botón submit con spinner */

        let btn = $('#agregar_mascota')
        let existingHTML = btn.html() //store exiting button HTML
        //Add loading message and spinner
        $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

        setTimeout(function() {
          $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
        }, 5000) //5 seconds

        $('#agregar_mascota').attr('disabled', true);

        event.preventDefault();

        try {

          $.ajax({
            url: "/crear_mascota",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {

           //   table.ajax.reload();

              // location.reload(true);


       
            
             $('#form_crear_mascota')[0].reset();
             $('#modalAgregarHistoriaClinica').modal('hide');


             toastr["success"]("Mascota creada correctamente.");


            }

          });

        } catch (e) {
          toastr["danger"]("Se ha presentado un error.");
        }

      });


   
      
   // =========================================

      /// GESTIONAR MASCOTA

      // =========================================

      $('body').on('click', '.gestionMascota', function(e) {

e.preventDefault();

//$('#form_editar_abono')[0].reset();
let id = $(this).data('id');

$.ajax({
  url: '/editar_historia/' + id,
  method: 'GET',
  data: {
    id: id
  },


  success: function(data) {



    $('#modalGestionMascota').modal('show');
    $('#modalGestionMascota input[name="id_mascota"]').val(data.id)
    $('#modalGestionMascota input[name="mascota"]').val(data.mascota);
    $('#modalGestionMascota input[name="fecha_nacimiento"]').val(data.fecha_nacimiento);
    $('#modalGestionMascota input[name="anos"]').val(data.anos);
    $('#modalGestionMascota input[name="meses"]').val(data.meses);
    $('#modalGestionMascota input[name="especie"]').val(data.especie);
    $('#modalGestionMascota input[name="raza"]').val(data.raza);
    $('#modalGestionMascota input[name="sexo"]').val(data.sexo);
    $('#modalGestionMascota input[name="pelaje"]').val(data.pelaje);
    $('#modalGestionMascota input[name="color"]').val(data.color);
    $('#modalGestionMascota input[name="peso"]').val(data.peso);
    $('#modalGestionMascota input[name="alimento"]').val(data.alimento);
    $('#modalGestionMascota input[name="vivienda"]').val(data.vivienda_compartida);
    $('#modalGestionMascota input[name="ultimo_celo"]').val(data.ultimo_celo);
    $('#modalGestionMascota input[name="preexistencia"]').val(data.preexistencia);
    $('#modalGestionMascota input[name="factor_DEA"]').val(data.factor_DEA);
    $('#modalGestionMascota input[name="chip"]').val(data.chip);
    $('#modalGestionMascota input[name="pedigree"]').val(data.pedigree);
    $('#modalGestionMascota input[name="donante"]').val(data.donante);
    $('#modalGestionMascota input[name="fallecido"]').val(data.fallecido);
    $('#modalGestionMascota input[name="transfusiones"]').val(data.transfusiones);
    $('#modalGestionMascota input[name="reproductor"]').val(data.reproductor);
    $('#modalGestionMascota input[name="esterilizado"]').val(data.esterilizado);
    $('#modalGestionMascota input[name="adopcion"]').val(data.adopcion);
    $('#modalGestionMascota input[name="veterinario_remitende"]').val(data.veterinario_remitende);
    $('#modalGestionMascota input[name="fecha"]').val(data.created_at);




  }
});
});



   
      // =========================================

      /// VER REGISTROS DE HISTÓRIA CLÍNICA

      // =========================================


      $('body').on('click', '.mostrar_mascota', function(e) {

        let id = $(this).data('id');

        let id_historia = $(this).data('id');

        $('#modalMostrarMascota input[name="id_historia"]').val(id_historia);

        //   $('#form_mostrar_historia_clinica')[0].reset();

        $.ajax({
          url: '/ver_mascota/' + id,
          method: 'GET',
          data: {
            id: id
          },

          success: function(data) {


            $('#modalMostrarMascota').modal('show');
            $('#modalMostrarMascota input[name="id_mascota"]').val(data.id)
            $('#modalMostrarMascota input[name="mascota"]').val(data.mascota);
            $('#modalMostrarMascota input[name="fecha_nacimiento"]').val(data.fecha_nacimiento);
            $('#modalMostrarMascota input[name="anos"]').val(data.anos);
            $('#modalMostrarMascota input[name="meses"]').val(data.meses);
            $('#modalMostrarMascota input[name="especie"]').val(data.especie);
            $('#modalMostrarMascota input[name="raza"]').val(data.raza);
            $('#modalMostrarMascota input[name="sexo"]').val(data.sexo);
            $('#modalMostrarMascota input[name="pelaje"]').val(data.pelaje);
            $('#modalMostrarMascota input[name="color"]').val(data.color);
            $('#modalMostrarMascota input[name="peso"]').val(data.peso);
            $('#modalMostrarMascota input[name="alimento"]').val(data.alimento);
            $('#modalMostrarMascota input[name="vivienda"]').val(data.vivienda_compartida);
            $('#modalMostrarMascota input[name="ultimo_celo"]').val(data.ultimo_celo);
            $('#modalMostrarMascota input[name="preexistencia"]').val(data.preexistencia);
            $('#modalMostrarMascota input[name="factor_DEA"]').val(data.factor_DEA);
            $('#modalMostrarMascota input[name="chip"]').val(data.chip);
            $('#modalMostrarMascota input[name="pedigree"]').val(data.pedigree);
            $('#modalMostrarMascota input[name="donante"]').val(data.donante);
            $('#modalMostrarMascota input[name="fallecido"]').val(data.fallecido);
            $('#modalMostrarMascota input[name="transfusiones"]').val(data.transfusiones);
            $('#modalMostrarMascota input[name="reproductor"]').val(data.reproductor);
            $('#modalMostrarMascota input[name="esterilizado"]').val(data.esterilizado);
            $('#modalMostrarMascota input[name="adopcion"]').val(data.adopcion);
            $('#modalMostrarMascota input[name="veterinario_remitende"]').val(data.veterinario_remitende);
            $('#modalMostrarMascota input[name="fecha"]').val(data.created_at);


          }

        });


      });




      // =========================================

      /// EDITAR REGISTROS DE TRATAMIENTO DE CLIENTES

      // =========================================

      $('body').on('click', '.editarMascota', function(e) {

        e.preventDefault();

        //$('#form_editar_abono')[0].reset();
        let id = $(this).data('id');

        $.ajax({
          url: '/editar_historia/' + id,
          method: 'GET',
          data: {
            id: id
          },


          success: function(data) {



            $('#modalEditarMascota').modal('show');
            $('#modalEditarMascota input[name="id_mascota"]').val(data.id)
            $('#modalEditarMascota input[name="mascota"]').val(data.mascota);
            $('#modalEditarMascota input[name="fecha_nacimiento"]').val(data.fecha_nacimiento);
            $('#modalEditarMascota input[name="anos"]').val(data.anos);
            $('#modalEditarMascota input[name="meses"]').val(data.meses);
            $('#modalEditarMascota input[name="especie"]').val(data.especie);
            $('#modalEditarMascota input[name="raza"]').val(data.raza);
            $('#modalEditarMascota input[name="sexo"]').val(data.sexo);
            $('#modalEditarMascota input[name="pelaje"]').val(data.pelaje);
            $('#modalEditarMascota input[name="color"]').val(data.color);
            $('#modalEditarMascota input[name="peso"]').val(data.peso);
            $('#modalEditarMascota input[name="alimento"]').val(data.alimento);
            $('#modalEditarMascota input[name="vivienda"]').val(data.vivienda_compartida);
            $('#modalEditarMascota input[name="ultimo_celo"]').val(data.ultimo_celo);
            $('#modalEditarMascota input[name="preexistencia"]').val(data.preexistencia);
            $('#modalEditarMascota input[name="factor_DEA"]').val(data.factor_DEA);
            $('#modalEditarMascota input[name="chip"]').val(data.chip);
            $('#modalEditarMascota input[name="pedigree"]').val(data.pedigree);
            $('#modalEditarMascota input[name="donante"]').val(data.donante);
            $('#modalEditarMascota input[name="fallecido"]').val(data.fallecido);
            $('#modalEditarMascota input[name="transfusiones"]').val(data.transfusiones);
            $('#modalEditarMascota input[name="reproductor"]').val(data.reproductor);
            $('#modalEditarMascota input[name="esterilizado"]').val(data.esterilizado);
            $('#modalEditarMascota input[name="adopcion"]').val(data.adopcion);
            $('#modalEditarMascota input[name="veterinario_remitende"]').val(data.veterinario_remitende);
            $('#modalEditarMascota input[name="fecha"]').val(data.created_at);




          }
        });
      });





      // =======================================

      // ACTUALIZAR HISTORIA CLINICA

      // ======================================

      $('#form_editar_mascota').off('submit').on('submit', function(e) {

        e.preventDefault();

        let id = $('#id_cliente').val();

        // Update Data

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });


        /* Configurar botón submit con spinner */

        let btn = $('#editar_historia')
        let existingHTML = btn.html() //store exiting button HTML
        //Add loading message and spinner
        $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

        setTimeout(function() {
          $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
        }, 5000) //5 seconds



        $.ajax({

          url: '/actualizar_historia/' + id,
          type: "POST",
          data: $(this).serialize(),
          dataType: "json",

          success: function(data) {

            table.ajax.reload();

            // $('#form_editar_cliente')[0].reset();
            $('#modalEditarMascota').modal('hide');
            $("#editar_historia").attr("disabled", true);
            //   $('#agregar_cliente').attr('disabled', true);
            toastr["success"]("los datos se han editado correctamente");


          },
          error: function(error) {
            console.log(error);
          }
        });
      });




      // ======================================= 

      //  ELIMINAR HISTÓRIA CLÍNICA 

      // ========================================= 


      $('body').on('click', '.eliminarHistoria', function(event) {


        let id = $(this).data("id");

        event.preventDefault();

        swal({
          title: "Esta seguro de eliminar?",
          text: "La acción es permanente!",
          type: "warning",
          showCancelButton: !0,
          confirmButtonText: "Si, Eliminar",
          cancelButtonText: "No, cancelar",
          reverseButtons: !0

        }).then(function(e) {

          if (e.value === true) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
              type: 'post',
              url: '/eliminar_historia/' + id,


              success: function(data) {

                if (data) {
                  swal("Registro eliminado correctamente!", data.message, "success");
                  table.ajax.reload();
                  //  $('#table_mascotas').html(data);


                } else {
                  swal("Error!", data.message, "error");
                }
              }
            });

          } else {
            e.dismiss;
          }

        }, function(dismiss) {
          return false;
        })

      });

    });
  </script>



  <!-- =========================================

EDITAR DATOS DEL CLIENTE

==============================================  -->

  <script>
    $(document).ready(function() {

      $('#form_editar_cliente').off('submit').on('submit', function(e) {

        e.preventDefault();

        let id = $('#id_cliente').val();

        // Update Data

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });


        /* Configurar botón submit con spinner */

        let btn = $('#editar_cliente')
        let existingHTML = btn.html() //store exiting button HTML
        //Add loading message and spinner
        $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

        setTimeout(function() {
          $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
        }, 5000) //5 seconds



        $.ajax({

          url: '/actualizar/' + id,
          type: "POST",
          data: $(this).serialize(),
          dataType: "json",

          success: function(data) {
            // $('#form_editar_cliente')[0].reset();
            $('#modalEditarCliente').modal('hide');
            $("#editar_cliente").attr("disabled", true);
            //   $('#agregar_cliente').attr('disabled', true);
            toastr["success"]("los datos se han editado correctamente");

            location.reload(true);
            // table_clientes.draw(true);
            // table.append(tbody);

            //  $('#datos_clientes').load('#datos_clientes');
          },
          error: function(error) {
            console.log(error);
          }
        });
      });

    });
  </script>






  <!-- =========================================

DATATABLE CONTROL MÉDICO

==============================================  -->



  <script type="text/javascript">
    $(document).ready(function() {

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });


      let id = $('#id_cliente').val();


      let table2 = $('#Table_control_medico').DataTable({

        processing: true,
        serverSide: true,
        paging: false,
        info: false,
        filter: false,
        responsive: true,
        autoWidth: false,

        type: "GET",

        ajax: '/listado_controles/' + id,

        columns: [

          {
            data: 'num_control',
            name: 'num_control'
          },
          {
            data: 'created_at',
            name: 'created_at'
          },
          {
            data: 'peso',
            name: 'peso'
          },
          {
            data: 'abd',
            name: 'abd'
          },
          {
            data: 'grasa',
            name: 'grasa'
          },
          {
            data: 'agua',
            name: 'agua'
          },

          {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
          },
        ],

        order: [
          [0, 'desc']
        ],

        "language": {

          /*  "processing": '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..n.</span> ',  */




          "emptyTable": "El paciente no tiene controles registrados.",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
          "infoEmpty": "Mostrando 0 to 0 de 0 Entradas",
          "infoFiltered": "(Filtrado de _MAX_ total entradas)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Entradas",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar:",
          "zeroRecords": "Sin resultados encontrados",
          "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
          }

        },



      });

      /*
          $(document).on('hidden.bs.modal', function (event) {
          if ($('.modalVerControlMedico:visible').length) {
             $('body').addClass('modal-open');
          }
      });
      */


      //==================================================

      // CREAR CONTROL MÉDICO

      // ==================================================




      $('#form_control_medico').off('submit').on('submit', function(event) {

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });


        /* Configurar botón submit con spinner */

        let btn = $('#crear_control_clinico')
        let existingHTML = btn.html() //store exiting button HTML
        //Add loading message and spinner
        $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

        setTimeout(function() {
          $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
        }, 5000) //5 seconds

        $('#crear_control_clinico').attr('disabled', true);

        event.preventDefault();

        try {

          $.ajax({
            url: "/crear_control",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {




              $('#form_control_medico')[0].reset();
              $('#modalControlMedico').modal('hide');

              table2.ajax.reload();



              // location.reload(true);
              toastr["success"]("Control médico creado correctamente.");



            }

          });

        } catch (e) {
          toastr["danger"]("Se ha presentado un error.");
        }

      });

    });




    // =========================================

    /// EDITAR CONTROL MÉDICO

    // =========================================

    $('body').on('click', '.editarControl', function(e) {

      e.preventDefault();

      $('#form_editar_control')[0].reset();
      $('#modalVerControlesMedicos').modal('hide');

      let id = $(this).data('id');

      $.ajax({
        url: '/editar_control/' + id,
        method: 'GET',
        data: {
          id: id
        },


        success: function(data) {


          $('#modalEditarControl').modal('show');
          $('#modalEditarControl input[name="id_control"]').val(data.id);
          $('#modalEditarControl input[name="user_id"]').val(data.userId);
          $('#modalEditarControl input[name="id_historia"]').val(data.id_historia);
          $('#modalEditarControl input[name="id_cliente"]').val(data.id_cliente);
          $('#modalEditarControl input[name="num_control"]').val(data.num_control);
          $('#modalEditarControl input[name="peso"]').val(data.peso);
          $('#modalEditarControl input[name="abd"]').val(data.abd);
          $('#modalEditarControl input[name="grasa"]').val(data.grasa);
          $('#modalEditarControl input[name="agua"]').val(data.agua);
          $('#modalEditarControl input[name="fecha"]').val(data.created_at);


        }
      });
    });



    // =========================================

    // ACTUALIZAR DATOS DE CONTROL

    // =========================================


    $('#form_editar_control').off('submit').on('submit', function(event) {

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      /* Configurar botón submit con spinner */
      let btn = $('#editar_control')
      let existingHTML = btn.html() //store exiting button HTML
      //Add loading message and spinner
      $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)
      setTimeout(function() {
        $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable
      }, 5000) //5 seconds
      $('#editar_control').attr('disabled', true);

      event.preventDefault();

      try {

        let id = $(this).data('id');

        $.ajax({

          url: '/actualizar_control/' + id,
          method: "POST",
          data: $(this).serialize(),
          dataType: "json",
          success: function(data) {

            $('#editar_control').prop("required", true);
            // $('#selectBuscarCliente').html("");

            $('#modalEditarControl').modal('hide');



            // table2.ajax.reload();
            location.reload(true);
            toastr["success"]("datos actualizados correctamente.");

          }
        });
      } catch (e) {
        toastr["danger"]("Se ha presentado un error.", "Información");
      }
    });




    // =========================================

    // ELIMINAR DATOS DE CONTROL MEDICO

    // ==============================================  -->


    $(document).on('click', '.eliminarControl', function(event) {

      event.preventDefault();

      let id = $(this).data('id');

      swal({
        title: "Esta seguro de eliminar?",
        text: "La acción es permanente!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Si, Eliminar",
        cancelButtonText: "No, cancelar",
        reverseButtons: !0

      }).then(function(e) {

        if (e.value === true) {
          let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

          $.ajax({
            type: 'delete',
            url: "/eliminar_control/" + id,
            data: {
              id: id
            },
            dataType: 'JSON',
            success: function(data) {

              //   if (data.success === true) {

              swal("Control eliminado correctamente!", data.message, "success");

              // table.ajax.reload();
              location.reload(true);


              //  } else {
              //       swal("Error!", data.message, "error");
              //   }
            }
          });

        } else {
          e.dismiss;
        }

      }, function(dismiss) {
        return false;
      })
    });
  </script>






  <!-- ================================================

 FUNCIÓN FOCUS PARA PRIMER INPUT modalEditarCliente

 ================================================= -->


  <script>
    $(document).ready(function() {
      $('#modalAgregarHistoriaClinica').on('shown.bs.modal', function() {
        $('#estatura').focus();
        // $('#agregar_cliente').attr('enabled','enabled');

      });
    });
  </script>




  <!-- ============================================

 FUNCIÓN LISTADO DE MASCOTAS 

 ================================================ -->

  <script>
    /*

function getlist_mascotas() {
      let $card = $('#card_mascotas');
      let $table = $card.find('#Table_mascotas');
      $card.find('.loader_icon').addClass('loader');
      $.getJSON("/listado_mascotas", {id_cliente:id_cliente}, function (data) {
        let list = [];
        $.each(data, function (key, val) {
          list.push(val);
       
        });

      });
    }   

        $table.find('tbody').html(list);
*/
  </script>



  <!-- ============================================

 FUNCIÓN ESTADO DE TIEMPO DE PRUEBA DE SOFTWARE

 ================================================ -->


  <script>
    $(document).ready(function() {


      function estado_prueba() {
        let fecha_termino = '2022-05-19';
        let prueba = '0';
        let estado = '1';

        let dias_restantes = diff_days(fecha_termino);
        if (estado == 1) {
          $('#navbar_estado').addClass('text-warning');
          if (prueba == 1) {
            $('#navbar_estado').html('Quedan ' + (30 + dias_restantes) + ' días de prueba');
            $('#navbar_estado').show();
          } else {
            if (dias_restantes <= -25) {
              $('#navbar_estado').html('Quedan ' + (30 + dias_restantes) + ' para desactivación. Haga click para renovar.');
              $('#navbar_estado').addClass('text-danger');
              $('#navbar_estado').show();
            } else if (dias_restantes <= -7) {
              $('#navbar_estado').html('El pago de su plan se encuentra atrasado. Haga click aquí para para renovar.');
              $('#navbar_estado').show();
            }
          }
        } else {
          $('#navbar_estado').html('Su plan se encuentra desactivado, haga click para activar');
          $('#navbar_estado').show();
        }
      }

    });
  </script>




  <!-- ================================= 

RESET SELECT2: selectBuscarCliente

================================= -->


  <script>
    $('.selectBuscarCliente').select2({
      //  allowClear: true,
      placeholder: 'Buscar cliente...',
      language: "es",
      minimumInputLength: 3,



      ajax: {

        url: '/ajax-autocomplete-search',

        dataType: 'json',
        delay: 250,


        processResults: function(data) {



          return {
            results: $.map(data, function(item) {
              return {
                text: item.nombre,
                id: item.id_cliente



              }



              // location.href = '/clientes/' + id
              // window.location.href =('clientes/id');      

              //  window.location.href =('/clientes'+ item['id']);  
            })



          };




          // $('.selectBuscarCliente').find(':selected').text();

          // $('#selectBuscarCliente :selected').text();


        },


        cache: true,

      }



    });
  </script>





  <!-- ============================================

 FUNCIÓN FOCUS PARA PRIMER INPUT ModalCrearMascotas

 ================================================ -->


  <script>
    $(document).ready(function() {
      $('#modalAgregarHistoriaClinica').on('shown.bs.modal', function() {
        $('#nombreMascota').focus()
      });
    });
  </script>




  <!-- ============================================

 FUNCIÓN X-EDITABLE BOOTSTRAP

 ================================================ -->


  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });


    $.fn.editableform.buttons =
      '<button type="submit" class="btn btn-primary btn-sm editable-submit">' +
      '<i class="fa fa-fw fa-check"></i>' +
      '</button>' +
      '<button type="button" class="btn btn-secondary btn-sm editable-cancel">' +
      '<i class="fa fa-fw fa-times"></i>' +
      '</button>';


    $('#nombre').editable({

      mode: 'inline',
      container: 'body',
      // selector: '.nombre',
      url: '/editarCliente',
      pk: 1,
      title: 'Nombre',
      type: 'POST',

      validate: function(value) {
        if ($.trim(value) == '') {
          return 'El campo no debe estar vacio'
        }
      }
    });


    $('#celular').editable({

      mode: 'inline',
      container: 'body',
      // selector: '.celular',
      url: '/editarCliente',
      pk: 1,
      title: 'Celular',
      type: 'POST',

      validate: function(value) {
        if ($.trim(value) == '') {
          return 'El campo no debe estar vacio'
        }
      }
    });



  
    $('#email').editable({

      mode: 'inline',
      container: 'body',
      // selector: '.email',
      url: '/editarCliente',
      pk: 1,
      title: 'Email',
      type: 'POST',

      validate: function(value) {
        if ($.trim(value) == '') {
          return 'El campo no debe estar vacio'
        }
      }
    });



    $('#direccion').editable({

      mode: 'inline',
      container: 'body',
      // selector: '.direccion',
      url: '/editarCliente',
      pk: 1,
      title: 'Dirección',
      type: 'POST',

      validate: function(value) {
        if ($.trim(value) == '') {
          return 'El campo no debe estar vacio'
        }
      }
    });
  </script>





  @endsection