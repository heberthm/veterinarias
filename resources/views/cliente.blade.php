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
                        <h3 class="card-title"><span style="color:#28a745;" class="fas fa-list-alt mr-3"></span>História
                            clínica</h3>




                        <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                            data-target="#modalAgregarHistoriaClinica">
                            <span class="fa fa-plus fa-fw" tabindex="3"></span> Crear história clínica
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


                                <table id="Table_historia_clinica" class="table dt-responsive table-hover"
                                    style="width:100%;font-size:12.5px;">
                                    <thead>
                                        <tr>


                                            <th class="desktop">Estatura</th>
                                            <th class="desktop">Peso</th>
                                            <th class="desktop">IMC</th>
                                            <th class="desktop">ABD inicial</th>
                                            <th class="desktop">Fecha</th>
                                            <th class="desktop"></th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                    </tbody>


                                </table>




                            </div>
                        </div>



                        <input type="text" id="id_cliente" name="id_cliente" value="{{ $id_cliente->id_cliente }}">
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
                            <span style="color:#28a745;" class="fas fa-user mr-3"></span>Datos del paciente
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

                                            <a href="#" id="nombre" data-type="text"
                                                data-pk="{{ $id_cliente->id_cliente }}" class="text-capitalize"
                                                data-name="nombre">{{ $id_cliente->nombre }}</a>


                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                            <div class="control-label">Edad</div>

                                            <a href="#" id="edad" data-type="text"
                                                data-pk="{{ $id_cliente->id_cliente }}"
                                                data-name="edad">{{ $id_cliente->edad() }} años</a>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                            <div class="control-label">Celular</div>


                                            <a href="#" id="celular" data-type="text"
                                                data-pk="{{ $id_cliente->id_cliente }}"
                                                data-name="celular">{{ $id_cliente->celular }}</a>


                                    </tr>

                                    <tr>

                                        <td>

                                            <div class="control-label">Email</div>

                                            <a href="#" id="email" data-type="text"
                                                data-pk="{{ $id_cliente->id_cliente }}"
                                                data-name="email">{{ $id_cliente->email }}</a>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                            <div class="control-label">Dirección</div>

                                            <a href="#" id="direccion" data-type="text"
                                                data-pk="{{ $id_cliente->id_cliente }}"
                                                data-name="direccion">{{ $id_cliente->direccion }}</a>

                                    </tr>

                                    <tr>

                                        <td>

                                            <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#modalEditarCliente" style="text-align:left"><span
                                                    class="fa fa-edit fa-fw" tabindex="3"></span> Editar datos del
                                                cliente</button>
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
        <div class="modal fade" id="modalAgregarHistoriaClinica" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static" aria-hidden="true">


            <div class="modal-dialog modal-lg">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list-alt mr-3"></span>Agregar
                            mascota </h5>

                        <div class="col-6 align-items-center" style="font-size: small;">

                            <div id="datos_historia_clinica">

                                <h5> <a class=" mx-1 nombre" style="color:coral">Cliente: {{ $id_cliente->nombre }}</a>
                                </h5>

                                <a class="mx-1 telefono" style="color:black">Teléfono: {{ $id_cliente->celular }}</a>

                            </div>

                        </div>



                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                                aria-hidden="true">&times;</span></button>


                    </div>

                    <div class="modal-body">


                        <form method="POST" id="form_crear_mascota" enctype="multipart/form-data"
                            action="{{ url('/clientes') }}">

                            <!-- @csrf -->

                            <!--   <input type="hidden" name="_token" value="{{ csrf_token() }}">  -->



                            <div class="row" style="font-size:90%;">

                                <div class="col-md-5">

                                    <div class="form-group">

                                        <label for="mascota" class="control-label font-weight-normal">Nombre
                                            mascota</label>

                                        <input type="text" name="mascota" class="form-control" id="mascota"
                                            autofocus="true" required autocomplete="off">

                                        <div class="alert-message" id="mascotaError"></div>

                                    </div>
                                </div>




                                <div class="col-md-3">

                                    <div class="form-group">

                                        <label for="fecha nacimiento" class="control-label font-weight-normal">fecha
                                            nacimiento</label>

                                        <input type="date" class="form-control" id="fecha_nacimiento1"
                                            name="fecha_nacimiento1" required>

                                        <div class="alert-message" id="fechaNacimientoError"></div>

                                    </div>

                                    <input type="hidden" class="form-control" name="fecha_nacimiento"
                                        id="fecha_nacimiento" required />

                                </div>




                                <div class="col-md-2">

                                    <div class="form-group">

                                        <label for="año" class="control-label font-weight-normal">Años</label>

                                        <input type="text" id="anos" name="anos" class="form-control"
                                            required autocomplete="off">

                                        <div class="alert-message" id="anoError"></div>

                                    </div>

                                </div>


                                <div class="col-md-2">

                                    <div class="form-group">

                                        <label for="meses" class="control-label font-weight-normal">meses</label>

                                        <input type="text" id="meses" name="meses"
                                            class="form-control text-capitalize" autocomplete="off">

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

                                    <input type="hidden" maxlength="15" id="especie" name="especie" />


                                </div>



                                <div class="col-md-3">

                                    <div class="form-group">

                                        <label for="raza" class="control-label font-weight-normal">Raza</label>

                                        <input type="text" name="raza" class="form-control" id="raza"
                                            autocomplete="off">

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

                                    <input type="hidden" maxlength="10" id="sexo" name="sexo" />

                                </div>



                                <div class="col-md-2">

                                    <div class="form-group">

                                        <label for="pelaje" class="control-label font-weight-normal">Pelaje</label>

                                        <input type="text" name="pelaje" class="form-control" id="pelaje"
                                            autocomplete="off">

                                        <div class="alert-message" id="pelajeError"></div>

                                    </div>

                                </div>



                                <div class="col-md-2">

                                    <div class="form-group">

                                        <label for="color" class="control-label font-weight-normal">Color</label>

                                        <input type="text" name="color" class="form-control" id="color"
                                            autocomplete="off">

                                        <div class="alert-message" id="colorError"></div>

                                    </div>

                                </div>




                                <div class="col-md-2">

                                    <div class="form-group">

                                        <label for="peso" class="control-label font-weight-normal">Peso (Kg)</label>

                                        <input type="text" name="peso" class="form-control" id="peso"
                                            autocomplete="off">

                                        <div class="alert-message" id="pesoError"></div>

                                    </div>

                                </div>


                                <div class="col-md-5">

                                    <div class="form-group">

                                        <label for="alimentacion" class="control-label font-weight-normal">Comida que
                                            consume</label>


                                        <textarea class="form-control" rows="1" name="alimentacion" id="alimentacion"></textarea>

                                        <div class="alert-message" id="alimentacionError"></div>

                                    </div>

                                </div>


                                <div class="col-md-5">

                                    <div class="form-group">

                                        <label for="vivienda" class="control-label font-weight-normal">Vivienda/convive
                                            con otros animales?</label>


                                        <textarea class="form-control" rows="1" name="vivienda" id="vivienda"></textarea>


                                        <div class="alert-message" id="viviendaError"></div>

                                    </div>

                                </div>




                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="ultimo celo" class="control-label font-weight-normal">Último
                                            celo</label>

                                        <input type="date" name="ultimo_celo1" class="form-control" id="ultimo_celo1"
                                            require>

                                        <div class="alert-message" id="ultimoCeloError"></div>

                                    </div>

                                    <input type="hidden" class="form-control" name="ultimo_celo" id="ultimo_celo"
                                        required />


                                </div>




                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="factor DEA" class="control-label font-weight-normal">Factor
                                            DEA</label>

                                        <select id="factor_DEA1" name="factor_DEA1" class="form-control">
                                            <option value=""></option>
                                            <option value="indefinido">Indefinido</option>
                                            <option value="positivo">Positivo</option>
                                            <option value="negativo">Negativo</option>
                                        </select>


                                        <div class="alert-message" id="factorDEAError"></div>

                                    </div>

                                    <input type="hidden" maxlength="8" id="factor_DEA" name="factor_DEA" />

                                </div>







                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="patología preexistente"
                                            class="control-label font-weight-normal">Patología preexitente</label>

                                        <input type="text" name="preexistencia" class="form-control"
                                            id="preexistencia" require>

                                        <div class="alert-message" id="preexistenciaError"></div>

                                    </div>

                                </div>




                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="chip" class="control-label font-weight-normal">chip</label>


                                        <input type="text" name="chip" class="form-control" id="chip"
                                            require>


                                        <div class="alert-message" id="chipError"></div>

                                    </div>
                                </div>



                                <div class="col-md-12">

                                    <div class="form-group">

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="checkbox" name="pedigree"
                                                id="pedigree">

                                            <label class="form-check-label" for="inlineCheckbox1">Pedigree</label>

                                        </div>

                                        <div class="form-check form-check-inline">


                                            <input class="form-check-input" type="checkbox" name="donante"
                                                id="donante">

                                            <label class="form-check-label" for="donante">Donante</label>

                                        </div>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="checkbox" name="fallecido"
                                                id="fallecido">

                                            <label class="form-check-label" for="fallecido">Fallecido</label>

                                        </div>



                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="checkbox" name="transfusiones"
                                                id="transfusiones">

                                            <label class="form-check-label" for="transfuciones">Tiene
                                                transfuciones?</label>

                                        </div>


                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="checkbox" name="reproductor"
                                                id="reproductor">

                                            <label class="form-check-label" for="reproductor">Reproductor</label>

                                        </div>



                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="checkbox" name="esterilizado"
                                                id="esterilizado">

                                            <label class="form-check-label" for="esterilizado">Esterilizado</label>


                                        </div>




                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="checkbox" name="adopcion"
                                                id="adopcion" value="1">

                                            <label class="form-check-label" for="adopcion">Adopción</label>


                                        </div>


                                    </div>

                                </div>

                                <div class="col-lg-5">

                                    <div class="form-group">

                                        <label for="veterinario remitente"
                                            class="control-label font-weight-normal">Veterinario remitente</label>

                                        <input type="text" name="veterinario_remitente"
                                            class="form-control text-capitalize" id="veterinario_remitente"
                                            autocomplete="off">

                                        <div class="alert-message" id="veterinarioRemitenteError"></div>

                                    </div>

                                </div>




                                <div class="col-lg-5">

                                    <div class="form-group">

                                        <label for="agresividad"
                                            class="control-label font-weight-normal">Agresividad</label>


                                        <input type="range" name="agresividad" class="form-control" id="agresividad"
                                            min="0" max="5" step="1" value="0"
                                            oninput="num.value = this.value">

                                        <output id="num">0</output>




                                        <div class="alert-message" id="agresividadError"></div>

                                    </div>

                                </div>

                            </div>


                            <!--
                                              <div class="form-group">
                                              <label for="end" class="col-sm-2 control-label">Fecha final</label>
                                              
                                              -->


                            <input type="hidden" name="userId" class="form-control" id="userId"
                                value="{{ Auth::user()->id }}" readonly>

                            <input type="hidden" name="id_cliente" class="form-control" id="id_cliente"
                                value="{{ $id_cliente->id_cliente }}" readonly>


                            <input type="hidden" name="nombre" class="form-control" id="nombre"
                                value="{{ $id_cliente->nombre }}" readonly>

                            <input type="hidden" name="edad" class="form-control" id="edad"
                                value="{{ $id_cliente->edad }}" readonly>




                            <!--
                                              
                                              <div id="enlace_listado">
                                                        
                                              <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p>
                                                        
                                              </div>
                                              
                                              -->

                            <div class="modal-footer">

                                <button type="submit" id="agregar_mascota" name="agregar_mascota"
                                    class="btn btn-primary">Guardar</button>
                                <button type="button" id="salir" class="btn btn-secondary"
                                    data-dismiss="modal">Cerrar</button>

                            </div>

                    </div>
                </div>
            </div>

            </form>
        </div>

    </div>






    <!--=====================================

                                MODAL EDITAR DATOS DE  HISTÓRIA CLÍNICA

                            =========================================-->



    <div class="modal fade" id="modalEditarHistoriaClinica" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static" aria-hidden="true">


        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list-alt mr-3"></span>Editar
                        História </h5>

                    <div class="col-6 align-items-center" style="font-size: small;">
                        <div id="datos_historia_clinica">
                            <h5> <a class=" mx-1 nombre" style="color:coral">{{ $id_cliente->nombre }}</a></h5>
                            <a class="mx-1 especie" style="color:black">{{ $id_cliente->edad() }} años</a>
                            <!--  <a class="mx-1 raza" style="color:black">{{ $id_cliente->peso }}</a> -->
                            <!--  <a class="mx-1 edad" style="color:black">{{ $id_cliente->estatura }}</a> -->
                        </div>
                    </div>



                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                            aria-hidden="true">&times;</span></button>


                </div>

                <div class="modal-body">


                    <form method="POST" id="form_editar_historia_clinica" action="{{ url('/editar_historia/id') }}">

                        <!-- @csrf -->

                        <!--   <input type="hidden" name="_token" value="{{ csrf_token() }}">  -->



                        <div class="row" style="font-size:90%;">

                            <div class="col-md-2">

                                <div class="form-group">

                                    <label for="Estatura" class="control-label font-weight-normal">Estatura</label>

                                    <input type="number" name="estatura" class="form-control" id="estatura"
                                        autofocus="true" autocomplete="off">

                                    <div class="alert-message" id="estaturaError"></div>

                                </div>
                            </div>




                            <div class="col-md-2">

                                <div class="form-group">

                                    <label for="peso inicial" class="control-label font-weight-normal">Peso
                                        inicial</label>

                                    <input type="number" name="peso_inicial" class="form-control" id="peso_inicial">

                                    <div class="alert-message" id="pesoInicialError"></div>

                                </div>

                            </div>




                            <div class="col-md-2">

                                <div class="form-group">

                                    <label for="abd inicial" class="control-label font-weight-normal">ABD inicial</label>

                                    <input type="number" id="abd_inicial" name="abd_inicial" class="form-control"
                                        autocomplete="off">

                                    <div class="alert-message" id="abdInicialError"></div>

                                </div>
                            </div>


                            <div class="col-md-2">

                                <div class="form-group">

                                    <label for="grasa inicial" class="control-label font-weight-normal">Grasa
                                        inicial</label>

                                    <input type="number" id="grasa_inicial" name="grasa_inicial" class="form-control"
                                        autocomplete="off">

                                    <div class="alert-message" id="grasaInicialError"></div>

                                </div>

                            </div>



                            <div class="col-md-2">

                                <div class="form-group">

                                    <label for="agua inicial" class="control-label font-weight-normal">Agua
                                        inicial</label>

                                    <input type="number" name="agua_inicial" class="form-control" id="agua_inicial"
                                        autocomplete="off">

                                    <div class="alert-message" id="aguaInicialError"></div>

                                </div>
                            </div>



                            <div class="col-md-2">

                                <div class="form-group">

                                    <label for="IMC" class="control-label font-weight-normal">IMC</label>

                                    <input type="number" name="imc" class="form-control" id="imc"
                                        autocomplete="off">

                                    <div class="alert-message" id="imcError"></div>

                                </div>

                            </div>




                            <div class="col-md-2">

                                <div class="form-group">

                                    <label for="grasa viseral" class="control-label font-weight-normal">Grasa
                                        viseral</label>

                                    <input type="number" name="grasa_viseral" class="form-control" id="grasa_viseral"
                                        autocomplete="off">

                                    <div class="alert-message" id="grasaViseralError"></div>

                                </div>

                            </div>



                            <div class="col-md-2">
                                <div class="form-group">

                                    <label for="edad metabolica" class="control-label font-weight-normal">Edad
                                        metabolica</label>

                                    <input type="number" name="edad_metabolica" class="form-control"
                                        id="edad_metabolica" autocomplete="off">

                                    <div class="alert-message" id="edadMetabolicaError"></div>

                                </div>

                            </div>


                            <div class="col-md-5">

                                <div class="form-group">

                                    <label for="paquete desintoxicacion" class="control-label font-weight-normal">Paquete
                                        desintoxicacion</label>

                                    <input type="text" name="paquete_desintoxicacion" class="form-control"
                                        id="paquete_desintoxicacion" autocomplete="off">

                                    <div class="alert-message" id="paqueteDesentoxicacionError"></div>

                                </div>

                            </div>



                            <div class="col-md-3">

                                <div class="form-group">

                                    <label for="lavado" class="control-label font-weight-normal">Lavado</label>

                                    <input type="text" name="tipo_lavado" class="form-control" id="tipo_lavado"
                                        autocomplete="off">

                                    <div class="alert-message" id="tipoLavadoError"></div>

                                </div>

                            </div>




                            <div class="col-md-6">

                                <div class="form-group">

                                    <label for="terapia" class="control-label font-weight-normal">Terapia</label>

                                    <input type="text" name="terapias" class="form-control" id="terapias"
                                        autocomplete="off">

                                    <div class="alert-message" id="terapiasError"></div>

                                </div>

                            </div>





                            <div class="col-md-6">

                                <div class="form-group">

                                    <label for="terapias adicionales" class="control-label font-weight-normal">Terapias
                                        adicionales</label>

                                    <input type="text" name="terapias_adicionales" class="form-control"
                                        id="terapias_adicionales" autocomplete="off">

                                    <div class="alert-message" id="terapiasAdicionalesError"></div>

                                </div>

                            </div>




                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="medico_tratante" class="control-label font-weight-normal">Atendido
                                        por</label>

                                    <input type="text" name="profesional" class="form-control" id="profesional"
                                        autocomplete="off">

                                    <div class="alert-message" id="diasLavadosError"></div>



                                </div>
                            </div>

                            <div class="col-md-8">

                                <div class="form-group">

                                    <label for="Observaciones"
                                        class="control-label font-weight-normal">Observaciones</label>

                                    <input type="text" name="observaciones" class="form-control" id="observaciones"
                                        autocomplete="off">

                                    <div class="alert-message" id="observacionesError"></div>

                                </div>

                            </div>

                        </div>



                </div>




                <!--
                                          <div class="form-group">
                                          <label for="end" class="col-sm-2 control-label">Fecha final</label>
                                          
                                          -->


                <input type="hidden" name="userId" class="form-control" id="userId"
                    value="{{ Auth::user()->id }}" readonly>

                <input type="hidden" name="id_cliente" class="form-control" id="id_cliente"
                    value="{{ $id_cliente->id_cliente }}" readonly>

                <input type="hidden" name="id_historia" class="form-control" id="id_historia" readonly>



                <!--
                                          
                                          <div id="enlace_listado">
                                                    
                                          <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p>
                                                    
                                          </div>
                                          
                                          -->

                <div class="modal-footer">

                    <button type="submit" id="editar_historia" name="editar_historia"
                        class="btn btn-primary">Guardar</button>
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



    <div class="modal fade" id="modalMostrarMascota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        data-keyboard="false" data-backdrop="static" aria-hidden="true">


        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list-alt mr-3"></span>História
                        clínica </h5>

                    <div class="col-6 align-items-center" style="font-size: small;">
                        <div id="datos_historia_clinica">
                            <h5> <a class=" mx-1 nombre" style="color:coral">{{ $id_cliente->nombre }}</a></h5>
                            <a class="mx-1 especie" style="color:black">
                                {{ $id_cliente->celular }} </a>
                            <!--  <a class="mx-1 raza" style="color:black">{{ $id_cliente->peso }}</a> -->
                            <!--  <a class="mx-1 edad" style="color:black">{{ $id_cliente->estatura }}</a> -->
                        </div>
                    </div>



                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                            aria-hidden="true">&times;</span></button>


                </div>

                <div class="modal-body">


                    <form method="POST" id="form_mostrar_mascota" action="{{ url('clientes') }}">

                        <!-- @csrf -->

                        <!--   <input type="hidden" name="_token" value="{{ csrf_token() }}">  -->



                        <div class="row" style="font-size:90%;">

                            <div class="col-md-2">

                                <div class="form-group">

                                    <label for="mascota" class="control-label font-weight-normal"><b>mascota</b></label>


                                    <input type="text" name="mascota" class="form-control  border-0" id="mascota">

                                </div>
                            </div>




                            <div class="col-md-2">

                                <div class="form-group">

                                    <label for="fecha nacimiento" class="control-label font-weight-normal"><b>fecha
                                            nacimiento</b></label>

                                    <input type="text" name="fecha_nacimiento"
                                        class="form-control text-muted  border-0" id="fecha_nacimiento">

                                </div>

                            </div>




                            <div class="col-md-2">

                                <div class="form-group">

                                    <label for="anos" class="control-label font-weight-normal"><b>Años</b></label>

                                    <input type="text" name="anos" class="form-control text-muted  border-0"
                                        id="anos">

                                </div>

                            </div>


                            <div class="col-md-2">

                                <div class="form-group">

                                    <label for="especie" class="control-label font-weight-normal"><b>Especie</b></label>

                                    <input type="text" name="especie" class="form-control text-muted  border-0"
                                        id="especie">


                                </div>

                            </div>



                            <div class="col-md-2">

                                <div class="form-group">

                                    <label for="raza" class="control-label font-weight-normal"><b>raza</b></label>

                                    <input type="text" name="raza" class="form-control text-muted  border-0"
                                        id="raza">


                                </div>
                            </div>



                            <div class="col-md-2">

                                <div class="form-group">

                                    <label for="sexo" class="control-label font-weight-normal"><b>sexo</b></label>

                                    <input type="text" name="sexo" class="form-control text-muted   border-0"
                                        id="sexo">


                                </div>

                            </div>




                            <div class="col-md-2">

                                <div class="form-group">

                                    <label for="pelaje" class="control-label font-weight-normal"><b>pelaje</b></label>

                                    <input type="text" name="pelaje" class="form-control text-muted   border-0"
                                        id="pelaje">


                                </div>

                            </div>



                            <div class="col-md-2">
                                <div class="form-group">

                                    <label for="color" class="control-label font-weight-normal"><b>Color</b></label>

                                    <input type="text" name="color" class="form-control text-muted  border-0"
                                        id="color">


                                </div>

                            </div>


                            <div class="col-md-3">

                                <div class="form-group">

                                    <label for="peso" class="control-label font-weight-normal "><b>Peso</b></label>

                                    <input type="text" name="peso" class="form-control text-muted border-0"
                                        id="peso">


                                </div>

                            </div>



                            <div class="col-md-4">

                                <div class="form-group">

                                    <label for="alimento" class="control-label font-weight-normal"><b>Comida que
                                            consume</b></label>

                                    <input type="text" name="alimento" class="form-control text-muted border-0"
                                        id="alimiento">


                                </div>

                            </div>


                            <div class="col-md-4">

                                <div class="form-group">

                                    <label for="vivienda" class="control-label font-weight-normal"><b>Vivienda
                                            compartida</b></label>

                                    <input type="text" name="vivienda" class="form-control  text-muted  border-0"
                                        id="vivienda">


                                </div>

                            </div>

                            <div class="col-md-3">

                                <div class="form-group">

                                    <label for="ultimo celo" class="control-label font-weight-normal"><b>Último
                                            celo</b></label>

                                    <input type="text" name="ultimo_celo" class="form-control text-muted  border-0"
                                        id="ultimo_celo">


                                </div>

                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="medico_tratante" class="control-label font-weight-normal"><b>Patología
                                            preexistente</b></label>

                                    <input type="text" name="preexistencia" class="form-control  border-0"
                                        id="preexistencia">


                                </div>

                            </div>



                            <div class="col-md-2">

                                <div class="form-group">

                                    <label for="factor DEA" class="control-label font-weight-normal"><b>Factor
                                            DEA</b></label>

                                    <input type="text" name="factor_DEA" class="form-control text-muted  border-0"
                                        id="factor_DEA">


                                </div>

                            </div>


                            <div class="col-md-2">

                                <div class="form-group">

                                    <label for="pedigree" class="control-label font-weight-normal"><b>Pedigree</b></label>

                                    <input type="text" name="pedigree" class="form-control text-muted  border-0"
                                        id="pedigree">


                                </div>

                            </div>



                            <div class="col-md-2">

                                <div class="form-group">

                                    <label for="donante" class="control-label font-weight-normal"><b>Donante</b></label>

                                    <input type="text" name="donante" class="form-control text-muted  border-0"
                                        id="donante">


                                </div>

                            </div>


                            <div class="col-md-2">

                                <div class="form-group">

                                    <label for="fallecido"
                                        class="control-label font-weight-normal"><b>Fallecido</b></label>

                                    <input type="text" name="fallecido" class="form-control text-muted   border-0"
                                        id="fallecido">


                                </div>

                            </div>


                            <div class="col-md-2">

                                <div class="form-group">

                                    <label for="transfusiones"
                                        class="control-label font-weight-normal"><b>Transfuciones</b></label>

                                    <input type="text" name="transfusiones" class="form-control text-muted  border-0"
                                        id="transfusiones">


                                </div>

                            </div>



                            <div class="col-md-2">

                                <div class="form-group">

                                    <label for="reproductor"
                                        class="control-label font-weight-normal"><b>Reproductor</b></label>

                                    <input type="text" name="reproductor" class="form-control text-muted  border-0"
                                        id="reproductor">


                                </div>

                            </div>


                            <div class="col-md-2">

                                <div class="form-group">

                                    <label for="esterilizado"
                                        class="control-label font-weight-normal"><b>Esterilizado</b></label>

                                    <input type="text" name="esterilizado" class="form-control text-muted  border-0"
                                        id="esterilizado">


                                </div>

                            </div>



                            <div class="col-md-2">

                                <div class="form-group">

                                    <label for="adopcion" class="control-label font-weight-normal"><b>Adopción</b></label>

                                    <input type="text" name="adopcion" class="form-control text-muted  border-0"
                                        id="adopcion">


                                </div>

                            </div>


                            <div class="col-md-4">

                                <div class="form-group">

                                    <label for="veterinario" class="control-label font-weight-normal"><b>Veterinario
                                            remitente</b></label>

                                    <input type="text" name="veterinario_remitente"
                                        class="form-control text-muted   border-0" id="veterinario_remitente">


                                </div>

                            </div>



                            <div class="col-md-4">

                                <div class="form-group">

                                    <label for="agresividad"
                                        class="control-label font-weight-normal"><b>Agresividad</b></label>

                                    <input type="range" name="agresividad" class="form-control   border-0"
                                        id="agresividad" min="0" max="5" step="1" value="0"
                                        oninput="num.value = this.value">
                                    <output id="num">0</output>

                                </div>

                            </div>



                            <div class="col-md-8">

                                <div class="form-group">

                                    <label for="fecha de creacion" class="control-label font-weight-normal"><b>Fecha de
                                            creación</b></label>


                                    <!--  <input type="text" name="fecha" class="form-control  border-0" id="fecha" >   -->


                                    <p>{{ date('d-m-Y  h:i A', strtotime($id_cliente->created_at)) }}
                                        &nbsp;
                                        {{ \Carbon\Carbon::parse($id_cliente->created_at)->diffForHumans() }}
                                    </p>



                                </div>

                            </div>

                        </div>



                </div>




                <!--
                                              <div class="form-group">
                                              <label for="end" class="col-sm-2 control-label">Fecha final</label>
                                              
                                              -->


                <input type="hidden" name="userId" class="form-control" id="userId"
                    value="{{ Auth::user()->id }}" readonly>

                <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" readonly>

                <input type="hidden" name="id_historia" class="form-control" id="id_cliente" readonly>



                <!--
                                              
                                              <div id="enlace_listado">
                                                        
                                              <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p>
                                                        
                                              </div>
                                              
                                              -->

                <div class="modal-footer">




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

    <div class="modal fade" id="modalEditarCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">


        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-edit mr-3"></span>Cambiar datos
                        del cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">


                    <form method="POST" id="form_editar_cliente" action="{{ url('actualizar/id') }}">

                        <!--  <input type="hidden" name="_token" value="{{ csrf_token() }}">   -->

                        <input type="hidden" name="id_cliente" class="form-control" id="id_cliente"
                            value="{{ $id_cliente->id_cliente }}" autofocus required autocomplete="off">


                        <div class="row">

                            <div class="col-md-3">

                                <div class="form-group">

                                    <label for="Cedula" class="control-label">Cédula</label>


                                    <input type="number" name="cedula" class="form-control" id="cedula"
                                        value="{{ $id_cliente->cedula }}" autofocus required autocomplete="off">


                                    <div class="alert-message" id="cedulaError"></div>

                                </div>

                            </div>



                            <div class="col-md-9">

                                <div class="form-group">

                                    <label for="Nombre" class="control-label">Nombre</label>

                                    <input type="text" name="nombre" class="typeahead form-control text-capitalize"
                                        id="nombre" value="{{ $id_cliente->nombre }}" required autocomplete="off">

                                    <div class="alert-message" id="nombreError"></div>

                                </div>

                            </div>


                            <div class="col-md-3">

                                <div class="form-group">

                                    <label for="fecha_nacimiento" class="control-label">Fecha nacimiento</label>


                                    <input type="date" class="form-control" id="fecha_nacimiento1"
                                        name="fecha_nacimiento1" required
                                        value="{{ date_format(date_create($id_cliente->fecha_nacimiento), 'Y-m-d') }}">

                                    <div class="alert-message" id="fechaNacimientoError"></div>

                                </div>

                                <input type="hidden" class="form-control" name="fecha_nacimiento"
                                    id="fecha_nacimiento"
                                    value="{{ date_format(date_create($id_cliente->fecha_nacimiento), 'Y-m-d') }}"
                                    required />

                            </div>


                            <div class="col-md-3">

                                <div class="form-group">

                                    <label for="edad" class="control-label">Edad</label>


                                    <input type="text" name="edad1" class="form-control" id="edad1"
                                        value="{{ $id_cliente->edad }}" readonly autocomplete="off">


                                    <div class="alert-message" id="EdadError"></div>

                                </div>

                            </div>


                            <div class="col-md-6">
                                <div class="form-group">

                                    <label for="telefono" class="control-label">Tel/Cel.</label>

                                    <input type="text" name="celular" class="form-control" id="celular"
                                        value="{{ $id_cliente->celular }}" required autocomplete="off">

                                    <div class="alert-message" id="celularError"></div>

                                </div>
                            </div>


                            <div class="col-md-5">

                                <div class="form-group">

                                    <label for="direccion" class="control-label">Dirección</label>

                                    <input type="text" name="direccion" class="form-control text-capitalize"
                                        id="direccion" value="{{ $id_cliente->direccion }}" required
                                        onkeypress="return isNumber(event)">

                                    <div class="alert-message" id="direccionError"></div>

                                </div>

                            </div>



                            <div class="col-md-3">

                                <div class="form-group">

                                    <label for="municipio" class="control-label">Municipio</label>

                                    <input type="text" name="municipio" class="form-control text-capitalize"
                                        id="municipio" value="{{ $id_cliente->municipio }}" required
                                        onkeypress="return isNumber(event)">

                                    <div class="alert-message" id="municipioError"></div>

                                </div>

                            </div>



                            <div class="col-md-4">

                                <div class="form-group">

                                    <label for="barrio" class="control-label">Barrio</label>

                                    <input type="text" id="barrio" name="barrio"
                                        class="form-control text-capitalize" value="{{ $id_cliente->barrio }}" required
                                        autocomplete="off">

                                    <div class="alert-message" id="barrioError"></div>

                                </div>
                            </div>



                            <div class="col-md-12">

                                <div class="form-group">

                                    <label for="email" class="control-label">Email</label>

                                    <input type="email" name="email" class="form-control" id="email"
                                        value="{{ $id_cliente->email }}" autocomplete="off">

                                    <div class="alert-message" id="emailError"></div>

                                </div>
                            </div>

                        </div>




                        <!--
                                        <div class="form-group">
                                        <label for="end" class="col-sm-2 control-label">Fecha final</label>
                                        
                                        -->


                        <input type="hidden" name="userId" class="form-control" id="userId"
                            value="{{ Auth::user()->id }}" readonly>

                        <input type="hidden" name="id_cliente" class="form-control" id="id_cliente"
                            value="{{ $id_cliente->id_cliente }}" readonly>


                        <!--
                                        
                                        <div id="enlace_listado">
                                                  
                                        <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p>
                                                  
                                        </div>
                                        
                                        -->

                        <div class="modal-footer">

                            <button type="submit" id="editar_cliente" name="editar_cliente"
                                class="btn btn-primary">Guardar</button>

                            <button type="button" id="salir" class="btn btn-secondary"
                                data-dismiss="modal">Cerrar</button>

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

    <div class="modal fade" id="modalControlMedico" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">



        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list-alt mr-3"></span>Crear
                        control médico </h5>

                    <div class="col-6 align-items-center" style="font-size: small;">

                        <div id="datos_historia_clinica">

                            <h5> <a class=" mx-1 nombre" style="color:coral">{{ $id_cliente->nombre }}</a></h5>
                            <a class="mx-1 especie" style="color:black">{{ $id_cliente->edad() }} años </a>
                            <!--  <a class="mx-1 raza" style="color:black">{{ $id_cliente->peso }}</a> -->
                            <!--  <a class="mx-1 edad" style="color:black">{{ $id_cliente->estatura }}</a> -->
                        </div>

                    </div>


                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                            aria-hidden="true">&times;</span></button>


                    </button>

                </div>

                <div class="modal-body">


                    <form method="POST" id="form_control_medico" action="{{ url('/crear_control') }}">

                        <!--  <input type="hidden" name="_token" value="{{ csrf_token() }}">   -->


                        <div class="row">

                            <div class="col-md-3">

                                <div class="form-group">

                                    <label for="num control" class="control-label">Núm. control</label>


                                    <input type="number" name="num_control" class="form-control" id="num_control"
                                        autofocus required autocomplete="off">


                                    <div class="alert-message" id="numControlError"></div>

                                </div>

                            </div>



                            <div class="col-md-3">

                                <div class="form-group">

                                    <label for="peso" class="control-label">Peso</label>

                                    <input type="number" name="peso" class="form-control" id="peso"
                                        required autocomplete="off">

                                    <div class="alert-message" id="pesoError"></div>

                                </div>

                            </div>


                            <div class="col-md-3">

                                <div class="form-group">

                                    <label for="abd" class="control-label">ABD</label>

                                    <input type="number" class="form-control" id="abd" name="abd"
                                        required>

                                    <div class="alert-message" id="ABDError"></div>

                                </div>

                            </div>




                            <div class="col-md-3">

                                <div class="form-group">

                                    <label for="grasa" class="control-label">Grasa</label>


                                    <input type="number" name="grasa" class="form-control" id="grasa"
                                        autocomplete="off">


                                    <div class="alert-message" id="grasaError"></div>

                                </div>

                            </div>



                            <div class="col-md-3">

                                <div class="form-group">

                                    <label for="agua" class="control-label">Agua</label>

                                    <input type="number" name="agua" class="form-control" id="agua"
                                        required autocomplete="off">

                                    <div class="alert-message" id="aguaError"></div>

                                </div>

                            </div>

                        </div>




                        <!--
                                        <div class="form-group">
                                        <label for="end" class="col-sm-2 control-label">Fecha final</label>
                                        
                                        -->


                        <input type="hidden" name="userId" class="form-control" id="userId"
                            value="{{ Auth::user()->id }}" readonly>

                        <input type="hidden" name="id_cliente" class="form-control" id="id_cliente"
                            value="{{ $id_cliente->id_cliente }}" readonly>

                        <input type="hidden" name="id_historia" class="form-control" id="id_historia" readonly>



                        <!--
                                        
                                        <div id="enlace_listado">
                                                  
                                        <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p>
                                                  
                                        </div>
                                        
                                        -->

                        <div class="modal-footer">

                            <button type="submit" id="crear_control_clinico" name="crear_control_clinico"
                                class="btn btn-primary">Guardar</button>

                            <button type="button" id="salir" class="btn btn-secondary"
                                data-dismiss="modal">Cerrar</button>

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

    <div class="modal fade" id="modalEditarControl" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">



        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list-alt mr-3"></span>Editar
                        control médico </h5>

                    <div class="col-6 align-items-center" style="font-size: small;">
                        <div id="datos_historia_clinica">
                            <h5> <a class=" mx-1 nombre" style="color:coral">{{ $id_cliente->nombre }}</a></h5>
                            <a class="mx-1 especie" style="color:black">{{ $id_cliente->edad }}</a>
                            <!--  <a class="mx-1 raza" style="color:black">{{ $id_cliente->peso }}</a> -->
                            <!--  <a class="mx-1 edad" style="color:black">{{ $id_cliente->estatura }}</a> -->
                        </div>
                    </div>


                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                            aria-hidden="true">&times;</span></button>


                    </button>

                </div>

                <div class="modal-body">


                    <form method="POST" id="form_editar_control" action="{{ url('/actualizar_control') }}">



                        <!--  <input type="hidden" name="_token" value="{{ csrf_token() }}">   -->


                        <div class="row">

                            <div class="col-md-3">

                                <div class="form-group">

                                    <label for="num control" class="control-label">Núm. control</label>


                                    <input type="number" name="num_control" class="form-control" id="num_control"
                                        autofocus required autocomplete="off">


                                    <div class="alert-message" id="numControlError"></div>

                                </div>

                            </div>



                            <div class="col-md-3">

                                <div class="form-group">

                                    <label for="peso" class="control-label">Peso</label>

                                    <input type="number" name="peso" class="form-control" id="peso"
                                        required autocomplete="off">

                                    <div class="alert-message" id="pesoError"></div>

                                </div>
                            </div>


                            <div class="col-md-3">

                                <div class="form-group">

                                    <label for="abd" class="control-label">ABD</label>


                                    <input type="number" class="form-control" id="abd" name="abd"
                                        required>

                                    <div class="alert-message" id="ABDError"></div>

                                </div>
                            </div>




                            <div class="col-md-3">

                                <div class="form-group">

                                    <label for="grasa" class="control-label">Grasa</label>


                                    <input type="number" name="grasa" class="form-control" id="grasa"
                                        autocomplete="off">


                                    <div class="alert-message" id="grasaError"></div>

                                </div>
                            </div>



                            <div class="col-md-3">
                                <div class="form-group">

                                    <label for="agua" class="control-label">Agua</label>

                                    <input type="number" name="agua" class="form-control" id="agua"
                                        required autocomplete="off">

                                    <div class="alert-message" id="aguaError"></div>

                                </div>
                            </div>



                        </div>

                </div>



                <!--
                                        <div class="form-group">
                                        <label for="end" class="col-sm-2 control-label">Fecha final</label>
                                        
                                        -->


                <input type="hidden" name="userId" class="form-control" id="userId"
                    value="{{ Auth::user()->id }}" readonly>

                <input type="hidden" name="id_cliente" class="form-control" id="id_cliente"
                    value="{{ $id_cliente->id_cliente }}" readonly>


                <input type="hidden" name="id_historia" class="form-control" id="id_historia" readonly>

                <input type="hidden" name="id_control" class="form-control" id="id_control" readonly>


                <!--
                                        
                                        <div id="enlace_listado">
                                                  
                                        <p><a href="crearClientes.php"><i class="fa fa-user fa-2x"></i>&nbsp; Crear cliente nuevo</a>   </p>
                                                  
                                        </div>
                                        
                                        -->

                <div class="modal-footer">

                    <button type="submit" id="editar_control" name="editar_control"
                        class="btn btn-primary">Guardar</button>
                    <button type="button" id="salir" class="btn btn-secondary"
                        data-dismiss="modal">Cerrar</button>

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


    <div class="modal fade" id="modalVerControlesMedicos" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">


        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-list mr-3"></span>Listado de
                        controles realizados</h5>
                    <div class="col-6 align-items-center" style="font-size: small;">
                        <div id="datos_historia_clinica">
                            <h5> <a class=" mx-1 nombre" style="color:coral">{{ $id_cliente->nombre }}</a></h5>
                            <a class="mx-1 especie" style="color:black">{{ $id_cliente->edad }}</a>
                            <!--  <a class="mx-1 raza" style="color:black">{{ $id_cliente->peso }}</a> -->
                            <!--  <a class="mx-1 edad" style="color:black">{{ $id_cliente->estatura }}</a> -->
                        </div>
                    </div>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="row">
                        <div class="col-lg-12">


                            <table id="Table_control_medico" class="table dt-responsive  table-hover"
                                style="width:100%;font-size:12.5px;">
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

            CALCULO DE LA EDAD DEL CLIENTE

            =========================================== -->


        <script>
            $('#fecha_nacimiento1').blur(function() {
                document.getElementById('anos').value = 0;

                var birthDay = new Date(document.getElementById('fecha_nacimiento1').value);

                var DOB = new Date(birthDay);
                var today = new Date();
                var age = today.getTime() - DOB.getTime();
                var elapsed = new Date(age);
                var year = elapsed.getYear() - 70;
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

                var suffix = 'Kg';
                var val = $(this).val().replace(suffix, '');
                var final = val + suffix;
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


                let table = $('#Table_historia_clinica').DataTable({

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

                    ajax: '/mascotas/' + id,



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




                        "emptyTable": "El paciente no tiene história clínica registrada.",
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

                // AGREGAR HISTORIA CLINCIA

                // ==================================================

                $('#form_crear_historia_clinica').off('submit').on('submit', function(event) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });


                    /* Configurar botón submit con spinner */

                    let btn = $('#agregar_historia')
                    let existingHTML = btn.html() //store exiting button HTML
                    //Add loading message and spinner
                    $(btn).html(
                        '<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...'
                    ).prop('disabled', true)

                    setTimeout(function() {
                        $(btn).html(existingHTML).prop('disabled',
                            false) //show original HTML and enable
                    }, 5000) //5 seconds

                    $('#agregar_historia').attr('disabled', true);

                    event.preventDefault();

                    try {

                        $.ajax({
                            url: "/crear_historia",
                            method: "POST",
                            data: $(this).serialize(),
                            dataType: "json",
                            success: function(data) {

                                table.ajax.reload();

                                // location.reload(true);


                                $('#form_crear_historia_clinica')[0].reset();
                                $('#modalAgregarHistoriaClinica').modal('hide');


                                toastr["success"]("História clinica creada correctamente.");



                            }

                        });

                    } catch (e) {
                        toastr["danger"]("Se ha presentado un error.");
                    }

                });





                // =========================================

                /// VER REGISTROS DE HISTÓRIA CLÍNICA

                // =========================================


                $('body').on('click', '.mostrar_mascota', function(e) {


                    let id = $(this).data('id');

                    //  $('#modalMostrarMascota input[name="id_historia"]').val(id_cliente);

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
                            $('#modalMostrarMascota input[name="fecha_nacimiento"]').val(data
                                .fecha_nacimiento);
                            $('#modalMostrarMascota input[name="anos"]').val(data.anos);
                            $('#modalMostrarMascota input[name="meses"]').val(data.meses);
                            $('#modalMostrarMascota input[name="especie"]').val(data.especie);
                            $('#modalMostrarMascota input[name="raza"]').val(data.raza);
                            $('#modalMostrarMascota input[name="sexo"]').val(data.sexo);
                            $('#modalMostrarMascota input[name="pelaje"]').val(data.pelaje);
                            $('#modalMostrarMascota input[name="color"]').val(data.color);
                            $('#modalMostrarMascota input[name="peso"]').val(data.peso);
                            $('#modalMostrarMascota input[name="alimento"]').val(data.alimento);
                            $('#modalMostrarMascota input[name="vivienda"]').val(data
                                .vivienda_compartida);
                            $('#modalMostrarMascota input[name="ultimo_celo"]').val(data
                                .ultimo_celo);
                            $('#modalMostrarMascota input[name="preexistencia"]').val(data
                                .preexistencia);
                            $('#modalMostrarMascota input[name="factor_DEA"]').val(data.factor_DEA);
                            $('#modalMostrarMascota input[name="chip"]').val(data.chip);
                            $('#modalMostrarMascota input[name="pedigree"]').val(data.pedigree);
                            $('#modalMostrarMascota input[name="donante"]').val(data.donante);
                            $('#modalMostrarMascota input[name="fallecido"]').val(data.fallecido);
                            $('#modalMostrarMascota input[name="transfusiones"]').val(data
                                .transfusiones);
                            $('#modalMostrarMascota input[name="reproductor"]').val(data
                                .reproductor);
                            $('#modalMostrarMascota input[name="esterilizado"]').val(data
                                .esterilizado);
                            $('#modalMostrarMascota input[name="adopcion"]').val(data.adopcion);
                            $('#modalMostrarMascota input[name="veterinario_remitende"]').val(data
                                .veterinario_remitende);
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
                        url: '/editar_mascota/' + id,
                        method: 'GET',
                        data: {
                            id: id
                        },


                        success: function(data) {



                            $('#modalGestionMascota').modal('show');
                            $('#modalGestionMascota input[name="id_mascota"]').val(data.id)
                            $('#modalGestionMascota input[name="mascota"]').val(data.mascota);
                            $('#modalGestionMascota input[name="fecha_nacimiento"]').val(data
                                .fecha_nacimiento);
                            $('#modalGestionMascota input[name="anos"]').val(data.anos);
                            $('#modalGestionMascota input[name="meses"]').val(data.meses);
                            $('#modalGestionMascota input[name="especie"]').val(data.especie);
                            $('#modalGestionMascota input[name="raza"]').val(data.raza);
                            $('#modalGestionMascota input[name="sexo"]').val(data.sexo);
                            $('#modalGestionMascota input[name="pelaje"]').val(data.pelaje);
                            $('#modalGestionMascota input[name="color"]').val(data.color);
                            $('#modalGestionMascota input[name="peso"]').val(data.peso);
                            $('#modalGestionMascota input[name="alimento"]').val(data.alimento);
                            $('#modalGestionMascota input[name="vivienda"]').val(data
                                .vivienda_compartida);
                            $('#modalGestionMascota input[name="ultimo_celo"]').val(data
                                .ultimo_celo);
                            $('#modalGestionMascota input[name="preexistencia"]').val(data
                                .preexistencia);
                            $('#modalGestionMascota input[name="factor_DEA"]').val(data.factor_DEA);
                            $('#modalGestionMascota input[name="chip"]').val(data.chip);
                            $('#modalGestionMascota input[name="pedigree"]').val(data.pedigree);
                            $('#modalGestionMascota input[name="donante"]').val(data.donante);
                            $('#modalGestionMascota input[name="fallecido"]').val(data.fallecido);
                            $('#modalGestionMascota input[name="transfusiones"]').val(data
                                .transfusiones);
                            $('#modalGestionMascota input[name="reproductor"]').val(data
                                .reproductor);
                            $('#modalGestionMascota input[name="esterilizado"]').val(data
                                .esterilizado);
                            $('#modalGestionMascota input[name="adopcion"]').val(data.adopcion);
                            $('#modalGestionMascota input[name="veterinario_remitende"]').val(data
                                .veterinario_remitende);
                            $('#modalGestionMascota input[name="fecha"]').val(data.created_at);





                        }
                    });
                });





                // =======================================

                // ACTUALIZAR HISTORIA CLINICA

                // ======================================

                $('#form_editar_historia_clinica').off('submit').on('submit', function(e) {

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
                    $(btn).html(
                        '<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...'
                    ).prop('disabled', true)

                    setTimeout(function() {
                        $(btn).html(existingHTML).prop('disabled',
                            false) //show original HTML and enable
                    }, 5000) //5 seconds



                    $.ajax({

                        url: '/actualizar_historia/' + id,
                        type: "POST",
                        data: $(this).serialize(),
                        dataType: "json",

                        success: function(data) {

                            table.ajax.reload();

                            // $('#form_editar_cliente')[0].reset();
                            $('#modalEditarHistoriaClinica').modal('hide');
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
                                        swal("Registro eliminado correctamente!", data
                                            .message, "success");
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
                    $(btn).html(
                        '<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...'
                    ).prop('disabled', true)

                    setTimeout(function() {
                        $(btn).html(existingHTML).prop('disabled',
                            false) //show original HTML and enable
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
                                $('#navbar_estado').html('Quedan ' + (30 + dias_restantes) +
                                    ' para desactivación. Haga click para renovar.');
                                $('#navbar_estado').addClass('text-danger');
                                $('#navbar_estado').show();
                            } else if (dias_restantes <= -7) {
                                $('#navbar_estado').html(
                                    'El pago de su plan se encuentra atrasado. Haga click aquí para para renovar.');
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
