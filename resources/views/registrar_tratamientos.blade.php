@extends('layouts.app')


@section('content')

<style>
  .calendar {

    max-width: auto;
    margin: 0, 0;
    padding: 0, 0;
    cursor: pointer;

  }

  .calendar {
    cursor: pointer;
  }

  .has-error {
    border-color: #cc0000;
    background-color: #ffff99;
  }


  .alert-message {
    color: red;
  }

  #loading {
    display: none;
    position: absolute;
    top: 50%;
    left: 40%;
    z-index: 1000;
  }


  .mostrar_inputs {
    display: none;
  }

  #loading2 {
    display: none;
    position: absolute;
    top: 50%;
    left: 40%;
    z-index: 1100;
  }

  .listado_citas {
    height: 300px;
    overflow-y: scroll;
    overflow-x: hidden;
  }


  .popover {
    pointer-events: none;
  }

  .negative {
    color: rgba(255, 0, 0, 1.00);
  }

  .positive {
    color: rgba(0, 255, 0, 1.00);
  }

  #total {
    font-size: 20px;
    color: black;
  }
</style>


<br>




<!-- =============================

REGISTRO DE INGRESOS O EGRSOS 

================================== -->


<div class="container-fluid">


  <!-- ====================================

FORMULARIO CREAR TRATAMIENTO

=========================================  -->


  <div class="card card-light">

    <div class="card-header">

      <h3 class="card-title"><span style="color: #28a745;" class="fas fa-list mr-3"></span>Listado de registro de tratamientos de clientes</h3>

      <div class="pull-right">

        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalACrearTratamiento">

          <span class="fa fa-list fa-fw"></span>

          Crear tratamiento de cliente

        </button> &nbsp;

      </div>


    </div>


    <div class="card-body">



      <!-- ===================================

DATAPICKER BOOTSTRAP

========================================  -->



      <div class="row input-daterange">

        <div class="col-md-3">

          <input type="date" name="fecha_inicial" id="fecha_final" class="form-control" placeholder="Fecha inicial" />

        </div>

        <div class="col-md-3">

          <input type="date" name="fecha_final" id="fecha_final" class="form-control" placeholder="Fecha final" />

        </div>

        <div class="col-md-3">

          <button type="button" name="filter" id="filter" class="btn btn-primary">Filtrar</button>

          <button type="button" name="refresh" id="refresh" class="btn btn-default">Refrescar</button>

        </div>

      </div>

      <br />





      <!-- ==================================

DATATABLE REGISTRO DE TRATAMIENTOS

====================================== -->


      <div class="row">

        <div class="col-lg-12">


          <table id="table_registros_contables" class="table dt-responsive table-hover" style="width:100%;font-size:12.5px;">

            <thead>

              <tr>

                <th>Paciente</th>

                <th> Vr. Tratamiento</th>

                <th>Fecha</th>

                <th>Estado</th>

                <th>Saldo actual</th>

                <th></th>

              </tr>

            </thead>

            <tbody>

            </tbody>


          </table>


        </div>

      </div>

      <!-- /.box -->

      <!-- /.col -->

      <!-- /.card -->
      </section>
      <!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-5 connectedSortable">








        <!--=====================================

    MODAL AGREGAR TRATAMIENTO

======================================-->

        <div class="modal fade" id="modalACrearTratamiento" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



          <div class="modal-dialog modal-lg">

            <div class="modal-content">

              <div class="modal-header">

                <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-cubes mr-3"></span>Agregar tratamiento</h5>

                <div class="col-md-6 text-right">

                  <!--


        <h6><a class=" mx-1 Recibo" style="color:coral">Recibo No: </a></h5>
-->


                </div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                  <span aria-hidden="true">&times;</span>

                </button>

              </div>

              <div class="modal-body">

                @if (session('error'))

                <div class="alert alert-danger">{{ session('error') }}</div>

                @endif

                <form method="POST" id="form_agregar_tratamiento" enctype="multipart/form-data" action="{{ url('crear_tratamiento') }}">

                  <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


                  <div class="row">

                    <div class="col-md-6">

                      <div class="form-group">

                        <label for="cliente" class="control-label">Cliente</label>


                        <div class="form-group">

                          <select class="livesearch form-control" id="livesearch" name="livesearch" style="width: 100%;"></select>

                        </div>


                        <input type="hidden" name="nombreCliente" class="form-control " id="nombreCliente" required autocomplete="off">

                        <div class="alert-message" id="livesearchError"></div>



                      </div>

                    </div>


                    <div class="col-md-5">

                      <div class="form-group">

                        <label for="Celular" class="control-label">Tel/Cel</label>

                        <input type="text" name="celular" class="form-control " id="celular" required autocomplete="off">

                        <div class="alert-message" id="celularError"></div>

                      </div>

                    </div>


                    <div class="col-md-6">

                      <div class="form-group">

                        <select name="tratamientos" class="form-control tratamientos" id="tratamientos" required placeholder="Seleccione tratamiento">

                          <option disabled selected value="-1" selected="selected" style='color: #cccccc'>Seleccionar tratamiento</option>

                          @foreach($terapias as $terap)

                          <option value="{{$terap->valor_terapia}}">{{$terap->terapia}}</option>

                          @endforeach

                        </select>


                      </div>

                    </div>

                    <div class="col-md-3">

                      <div class="form-group">


                        <input type="number" id="valor_tratamiento" name="valor" class="form-control vr_tratamiento">

                      </div>

                    </div>

                    <div class="col-md-3">

                      <div class="form-group">

                        <button type="button" id="Btn_agregar_tratamiento" class="btn btn-success btn-xs add-row" disabled  ><i class="fa fa-plus"></i> Agregar</button>


                      </div>
                    </div>



                  </div>

                  <div class="row">
                    <div class="col-lg-12">

                      <table id="table_registros_tratamientos" class="table dt-responsive" style="width:100%">

                        <thead>

                          <tr>


                            <th>Id</th>

                            <th>Tratamiento</th>

                            <th>Valor</th>

                            <th></th>

                          </tr>

                        </thead>

                        <tbody>

                        </tbody>

                        <tfoot>

                          <tr id="total">

                            <td>&nbsp;</td>

                            <td align="right">Total :</td>

                            <td align="left"><input type='text' class='form-control  border-0' name='sum1' id='sum1' disabled="disabled" style="font:bold; background-color:khaki; color:black;"></td>

                          </tr>

                        </tfoot>


                      </table>

                      <!--    <button type="button" class="btn btn-danger btn-xs delete-row"><i class="fa fa-minus"></i> Eliminar</button>   -->


                    </div>
                  </div>

              </div>




              <input type="hidden" name="responsable" class="form-control" id="responsable" value="{{ Auth::user()->name }}">

              <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>

              <input type="hidden" name="id_tratamiento" class="form-control" id="id_tratamiento" readonly>

              <input type="hidden" name="tratamiento" class="form-control" id="tratamiento" readonly>

              <input type="text" name="conteo" class="form-control" id="conteo" readonly>

              <input type="text" name="conteo2" class="form-control" id="conteo2" readonly>

              <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" readonly>

              <input type="hidden" name="saldo" class="form-control" id="saldo">

              <input type="text" id="tratamientos1" name="tratamientos1" class="form-control">


              <div class="modal-footer">

                <button type="submit" id="agregar_tratamiento" name="agregar_tratamiento" class="btn btn-primary loader">Guardar</button>

                <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

              </div>

              </form>

            </div>

          </div>

        </div>

    </div>






    <!--=====================================

    MODAL EDITAR DATOS DE TRATAMIENTO

======================================-->



    <div class="modal fade" id="modalEditarTratamiento" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


      <div class="modal-dialog modal-lg">

        <div class="modal-content">

          <div class="modal-header">

            <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-cubes mr-3"></span>Editar tratamiento</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

              <span aria-hidden="true">&times;</span>

            </button>

          </div>

          <div class="modal-body">

            @if (session('error'))

            <div class="alert alert-danger">{{ session('error') }}</div>

            @endif

            <form method="POST" id="form_editar_tratamiento" action="{{ url('registrar_tratamiento') }}">

              <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


              <div class="row">

                <div class="col-md-6">

                  <div class="form-group">

                    <label for="cliente" class="control-label">Cliente</label>

                    <input type="text" name="nombreCliente" class="form-control " id="nombreCliente" required autocomplete="off">

                    <div class="alert-message" id="livesearchError"></div>



                  </div>
                </div>


                <div class="col-md-5">

                  <div class="form-group">

                    <label for="Celular" class="control-label">Tel/Cel</label>

                    <input type="text" name="celular" class="form-control " id="celular" required autocomplete="off">

                    <div class="alert-message" id="celularError"></div>

                  </div>
                </div>


                <div class="col-md-6">

                  <div class="form-group">

                    <label for="tratamiento" class="control-label">Tratamiento</label>


                    <!--    <input type="text" name="tratamiento" class="form-control" id="tratamiento" required autocomplete="off"> -->


                
                    <select name="tratamientos2" class="form-control" id="tratamientos2" required placeholder="Seleccione profesional">

                      <option value="" selected="selected" style='color: #cccccc'>Seleccionar tratamiento</option>

                      @foreach($terapias as $terap)

                      <option value="{{$terap->valor_terapia}}">{{$terap->terapia}}</option>

                      @endforeach

                    </select>

                    <div class="alert-message" id="terapiasError"></div>

                  </div>

                </div>




                <div class="col-md-3">

                  <div class="form-group">

                    <label for="valor_abono" class="control-label">Valor</label>

                    <input type="number" name="valor_tratamiento2" class="form-control" id="valor_tratamiento2" required autocomplete="off">

                    <div class="alert-message" id="valorTratamientoError"></div>

                  </div>

                </div>



                <div class="col-md-12">

                  <table class="table table-striped">

                    <tr class="bg-white">

                      <th>Tratamientos</th>

                      <th>Valor. tratamiento</th>

                      <th></th>

                    </tr>

                    <tbody id="myTable2">

                    </tbody>

                  </table>



                </div>



                <input type="hidden" name="responsable" class="form-control" id="responsable" value="{{ Auth::user()->name }}">

                <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>

                <input type="hidden" name="id_tratamiento" class="form-control" id="id_tratamiento" readonly>

                <input type="hidden" name="id_cliente" class="form-control" id="id_cliente" readonly>

                <input type="hidden" name="saldo2" class="form-control" id="saldo2">

                <input type="hidden" name="tratamiento2" class="form-control" id="tratamiento2">


              </div>


              <div class="modal-footer">

                <button type="submit" id="editar_tratamiento" name="editar_tratamiento" class="btn btn-primary loader">Guardar</button>

                <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

              </div>

          </div>

          </form>

        </div>

      </div>

    </div>




    <!--=====================================

    MODAL VER DATOS DE TRATAMIENTO

======================================-->

    <div class="modal fade" id="modalVerTratamiento" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



      <div class="modal-dialog modal-lg">

        <div class="modal-content">

          <div class="modal-header">

            <h5 class="modal-title"><span style="color:#28a745;" class="fas fa-cubes mr-3"></span>Datos del tratamiento</h5>


            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

              <span aria-hidden="true">&times;</span>

            </button>

          </div>

          <div class="modal-body">

            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" id="form_ver_tratamiento" action="{{ url('registrar_tratamientos') }}">

              <!--  <input type="hidden" name="_token" value="{{csrf_token()}}">   -->


              <h6>Cliente</h6>

              <div>
                <input type="text" name="nombreCliente" class="form-control  border-0" readonly>

                <table class="table table-striped">

                  <tr class="bg-white">

                    <th>Tratamientos</th>

                    <th>Valor. tratamiento</th>

                  </tr>

                  <tbody id="myTable">

                  </tbody>

                </table>



              </div>







              <input type="hidden" name="responsable" class="form-control" id="responsable" value="{{ Auth::user()->name }}">

              <input type="hidden" name="userId" class="form-control" id="userId" value="{{ Auth::user()->id }}" readonly>

              <input type="hidden" name="id_abono" id="id_abono">



          </div>


          <div class="modal-footer">


            <button type="button" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

          </div>

        </div>

      </div>

    </div>

    </form>




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




    <script>

      $('.select2-multiple').select2({

        allowClear: true,

        placeholder: "Seleccione una opción",

      });

    </script>



    <script>

      $(document).ready(function() {

        $('.tratamientos').select2();

      });

    </script>






<script>

$('#modalACrearTratamiento').on('hidden.bs.modal', function (e) {
  
  $('#tratamientos1').val('');

 // $('#form_agregar_tratamiento').reset();

  $(this).find('#form_agregar_tratamiento')[0].reset();
  
})

</script>






    <!-- ==================================

AGRGAR FILA A TABLA HTML  AGREGAR TRATAMIENTO

======================================== -->


    <script type="text/javascript">
      
      $(document).ready(function() {



        /*=============================================

        LISTAR TODOS LOS PRODUCTOS

        =============================================*/

     

        let listaProductos = [];

        function listarProductos() {

          let conteo = $("#conteo");

          let valor_tratamiento = $(".tratamientos");

          let descripcion = $("#tratamiento");


          for (let i = 0; i < valor_tratamiento.length; i++) {


            listaProductos.push({

              "id": $(conteo[i]).val(),

              "tratamiento": $(descripcion[i]).val(),

              "valor_tratamiento": $(valor_tratamiento[i]).val()

            })

            $("#tratamientos1").val(JSON.stringify(listaProductos));

          }

          console.log(listarProductos);

        }

          
        let count = 0;

         $(".add-row").click(function() {

          let nombre = $('#nombreCliente').val();

          let user_id = $('#userId').val();

          let id_cliente = $('#id_cliente').val();

          let celular = $('#celular').val();

          let estado = 'Pendiente';

          let responsable = $('#responsable').val();

          let tratamiento = $("#tratamiento").val();

          let valor = $("#valor_tratamiento").val();

          let saldo = $('#sum1').val();


         count++;  

          let record = "<tr class='rowClass'><td>" + count + "</td><td><input type='text' class='form-control  border-0'  name='tratamientos[]' disabled='disabled' id='tratamientos3' value='" + tratamiento + "' style='background-color:white;'></td><td><input type='text' class='form-control  border-0 valores' name='valor_tratamiento[]' disabled='disabled'  id='valor_tratamientos3' value='" + valor + "' style='background-color:white;'></td><td style='display:none'><input type='text' class='form-control  border-0' name='nombre' disabled='disabled'  id='nombre' value='" + nombre + "' style='background-color:white;'></td><td style='display:none'><input type='text' class='form-control  border-0' name='celular' disabled='disabled'  id='celular' value='" + celular + "' style='background-color:white;'></td><td style='display:none'><input type='text' class='form-control  border-0' name='responsable' disabled='disabled'  id='responsable' value='" + responsable + "' style='background-color:white;'></td><td style='display:none'><input type='text' class='form-control  border-0' name='user_id' disabled='disabled'  id='user_id' value='" + user_id + "' style='background-color:white;'></td><td style='display:none'><input type='text' class='form-control  border-0' name='id_cliente' disabled='disabled'  id='id_cliente' value='" + id_cliente + "' style='background-color:white;'></td><td style='display:none'><input type='text' class='form-control  border-0' name='saldo' disabled='disabled'  id='saldo' value='" + saldo + "' style='background-color:white;'></td><td style='display:none'><input type='text' class='form-control  border-0' name='estado' disabled='disabled'  id='estado' value='" + estado + "' style='background-color:white;'></td><td class='text-center'><button class='btn btn-danger btn-xs remove'type='button'><i class='fa fa-minus'></i> Eliminar</td> </tr>";


       //   let record = "<tr class='rowClass'><td><input type='text' class='form-control border-0'    value='" + count + "'     disabled='disabled' style='background-color:white;'></div></td><td><input type='text' class='form-control  border-0'  name='tratamientos[]' disabled='disabled' id='tratamientos3' value='" + tratamiento + "' style='background-color:white;'></td><td><input type='text' class='form-control  border-0 valores' name='valor_tratamiento[]' disabled='disabled'  id='valor_tratamientos3' value='" + valor + "' style='background-color:white;'></td><td style='display:none'><input type='text' class='form-control  border-0' name='nombre' disabled='disabled'  id='nombre' value='" + nombre + "' style='background-color:white;'></td><td style='display:none'><input type='text' class='form-control  border-0' name='celular' disabled='disabled'  id='celular' value='" + celular + "' style='background-color:white;'></td><td style='display:none'><input type='text' class='form-control  border-0' name='responsable' disabled='disabled'  id='responsable' value='" + responsable + "' style='background-color:white;'></td><td style='display:none'><input type='text' class='form-control  border-0' name='user_id' disabled='disabled'  id='user_id' value='" + user_id + "' style='background-color:white;'></td><td style='display:none'><input type='text' class='form-control  border-0' name='id_cliente' disabled='disabled'  id='id_cliente' value='" + id_cliente + "' style='background-color:white;'></td><td style='display:none'><input type='text' class='form-control  border-0' name='saldo' disabled='disabled'  id='saldo' value='" + saldo + "' style='background-color:white;'></td><td style='display:none'><input type='text' class='form-control  border-0' name='estado' disabled='disabled'  id='estado' value='" + estado + "' style='background-color:white;'></td><td class='text-center'><button class='btn btn-danger btn-xs remove'type='button'><i class='fa fa-minus'></i> Eliminar</td> </tr>";

      
          $("#table_registros_tratamientos tbody").append(record);

          calculateTotal();

          listarProductos();




          /* ==================================

          TOTALIZAR VALORES DE COLUMNA

          ======================================== */



          function calculateTotal() {

            var sum = 0;

            $('.valores').each(function() {

              sum += Number($(this).val() * 1);

            });

            $('#sum1').val(sum);

            $('#valor_tratamiento').val(sum);

            console.log(sum);
          }


     /* ============================================================

           FUNCIÔN PARA RESTAR EL NÚMERO DE ID FILA DE TABLA

           ============================================================= */


          function reset() {

        
            $(this).closest('tr').remove();

            $('#table_registros_tratamientos tbody tr').each(function(i) {

              $($(this).find('td')[0]).html(i + 1);

                $(this).find('tr').each(function (index) {

                  let conteo =  $(this).closest("tr").find('td:eq(0)').html();

                  let $row1 = conteo;
                 
                 $row1.text(index + 1);

                 

              });

              count = 1;


               
             
            });


          }





          /* ==================================

ELIMNAR FILA Y RECALCULAR VALOR TOTAL

======================================== */



          $('#table_registros_tratamientos').on('click', '.remove', function() {

            $(this).parent('td.text-center').parent('tr.rowClass').remove();

            count = 0;
         

              $("#Btn_agregar_tratamiento").prop('disabled', true);

       
         /*

              // Suppose you have a JSON array
            
              // Specify the index of the element you want to remove
              let indexToRemove = conteo;

              // Use the splice() method to remove the element at the specified index
              listaProductos.splice(indexToRemove, 1);

              // Now, jsonArray will be [1, 2, 4, 5] with the element at index 2 removed
              console.log(listaProductos);   


     
              
           $("#tratamientos1").val(JSON.stringify(listaProductos));

          */

          let conteo =  $(this).closest("tr").find('td:eq(0)').html();
                  

               listaProductos.splice(conteo, 1);

                //   $("#tratamientos1").val(JSON.stringify(listaProductos));
             

              console.log(listaProductos); 

            
             
             

                
       // listarProductos();

          //   var jsonArrayString = '[{"id": 1, "name": "Item 1"}, {"id": 2, "name": "Item 2"}, {"id": 3, "name": "Item 3"}]';

                  // Parse the JSON string to get a JavaScript array
           //       var jsonArray = JSON.parse(jsonArrayString);



           

        


            /*

         //  let conteo_eliminacion = $(this).closest("tr").find('td:eq(0) input').val();

            let  elemento = $(this).closest("tr").find('td:eq(0)').html();

            let itemIdToRemove = elemento;

            // Find the index of the item with the specified ID
                let indexToRemove = -1;

                for (let i = 0; i < listaProductos.length; i++) {

                  if (listaProductos[i].id == itemIdToRemove) {

                    indexToRemove = i;

                    break;

                  }
                }


              if (indexToRemove !== -1) {

              listaProductos.splice(indexToRemove);

               listaProductos = [];

                                    
             

           // $('#tratamientos1') = resultado;


                console.log("Item removed:", itemIdToRemove);

                console.log("Updated JSON:", listaProductos);

              } else {

                console.log("Item not found:", itemIdToRemove);

              }


              */
                       
                
            calculateTotal();

           
           
            reset();

          //  listarProductos();


          });

          /*
          // Find and remove selected table rows
          $(".delete-row").click(function() {
            $("table tbody").find('input[name="record"]').each(function() {
              if ($(this).is(":checked")) {
                $(this).parent().parent().remove();
                calculateTotal();
                listarProductos()
              }
            });
          });

 */

        });

      });

    </script>



    <!-- ========================================

ESCRIBIR EN DOS INPUTS AL MISMO TIEMPO

============================================== -->


    <script>

      $(document).ready(function() {

        let count = 0;

        $("#tratamientos").change(function() {


          let select = document.getElementById('tratamientos');

          let option = select.options[select.selectedIndex];

          document.getElementById('valor_tratamiento').value = option.value;

          document.getElementById('saldo').value = option.value;

          document.getElementById('tratamiento').value = option.text;

          count++;

          document.getElementById('conteo').value = count;


        

        if ($("#valor_tratamiento").val() !== 0 ) {

           $("#Btn_agregar_tratamiento").removeAttr("disabled");

        }

       else  { 

           $("#Btn_agregar_tratamiento").prop('disabled', true);

        }



        });

      });
    </script>





    <!-- ========================================

ESCRIBIR EN DOS INPUTS AL MISMO TIEMPO 2

============================================== -->

    <script>
      $(document).ready(function() {


        count = 0;

        $("#tratamientos2").change(function() {


          let select = document.getElementById('tratamientos2');

          let option = select.options[select.selectedIndex];

          document.getElementById('valor_tratamiento2').value = option.value;

          document.getElementById('saldo2').value = option.value;

          document.getElementById('tratamiento2').value = option.text;



          count++;

        });

      });
    </script>



    <script>
      // ============================

      // VERIICAR SI EXISTE CLIENTE

      // ===========================

      $(document).ready(function() {

        $('#cedula').blur(function() {

          var error_cedula = '';

          var cedula = $('#cedula').val();

          var _token = $('input[name="_token"]').val();

          var filter = /([0-9])/;

          if (!filter.test(cedula)) {

            $('#error_cedula').html('<label class="text-danger">Debe escribir número de cédula.</label>');

            $('#cedula').addClass('has-error');

            $('#agregar_cliente').attr('disabled', 'disabled');

          } else {

            $.ajax({

              url: 'verificar_cliente',

              method: "POST",

              data: {

                cedula: cedula

              },

              success: function(result) {

                if (result == 'unique') {

                  $('#error_cedula').html('<label class="text-danger">El cliente ya existe.</label>');

                  $('#cedula').addClass('has-error');

                  $('#agregar_cliente').attr('disabled', 'disabled');

                } else {

                  $('#error_cedula').html('<label class="text-success">Disponible.</label>');

                  $('#cedula').removeClass('has-error');

                  $('#agregar_cliente').attr('disabled', false);


                }
              }
            })
          }
        });

      });
    </script>




    <script type="text/javascript">
      // ===========================================

      // SELECT2 - BUSQUEDAD DE CLIENTES

      // ============================================ 

      $('.livesearch').select2({

        placeholder: 'Buscar cliente por nombre...',

        language: "es",

        allowClear: true,

        minimumInputLength: 3,

        ajax: {
          // url: '/ajax-autocomplete-search',

          url: '{{ url("/ajax-autocomplete-search") }}',

          dataType: 'json',

          delay: 250,

          processResults: function(data) {


            return {

              results: $.map(data, function(item) {

                return {

                  text: item.nombre,

                  id: item.id_cliente,

                  celular: item.celular,

                }

                // location.href = '/clientes/' + id
                // window.location.href =('clientes/id');      

                //  window.location.href =('/clientes'+ item['id']);  
              })

            };

          },


          cache: true,

        }

      });


      // ================================================

      // SELECT2 - PASAR VALORES A VIEW BLADE - CLIENTE

      // ================================================

      $('#livesearch').off('change').on('change', function() {

        $.ajaxSetup({

          headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        let id = $(this).val();

        $.ajax({


          url: '/cliente/' + id,

          method: "GET",

          data: $(this).serialize(),

          dataType: "json",

          success: function(data) {



          }

        });

        // window.location.href = 'cliente/' +id;


        $('#nombreCliente').val('');

        let cliente = '';

        cliente = $(".livesearch").text();

        $('#nombreCliente').val(cliente);

      


      });
    </script>




    <script>
      // ===============================================

      // BORRAR CONTENIDO ESCRITO EN SELECT2: livesearch

      // =================================================== 



      $('.livesearch').on('select2:opening', function(e) {

        $('.livesearch').html('');

        $('#celular').val('');

        $('#tratamientos').val('');

        $('#tratamientos1').val('');

        $('#valor_tratamiento').val('');

        $('#sum1').val('');

        $("#table_registros_tratamientos tbody").html('');


        

        

      });
    </script>




    <script>
      // =======================================================

      // PASAR DATOS DE CAMPOS A INPUT TEXT CON SELECT2: livesearch2

      // ============================================================ 



      $('#livesearch').on('select2:select', function(evt) {


        let celular = evt.params.data.celular;

        var opt = "<option value='" + celular + "' selected ='selected'> </option>";

        $("#celular").html(opt);

        $("#celular").val(celular).trigger("change");


        let id_cliente = evt.params.data.id;

        var opt = "<option value='" + id_cliente + "' selected ='selected'> </option>";

        $("#id_cliente").html(opt);

        $("#id_cliente").val(id_cliente).trigger("change");

      });
    </script>




    <script type="text/javascript">
      // ===================================================

      // DATATABLE TRATAMIENTO CLIENTES

      // ======================================================== 


      $(document).ready(function() {


        $.ajaxSetup({

          headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }

        });


        let table = $('#table_registros_contables').DataTable({


          processing: true,

          serverSide: true,

          rendering: true,

          retrive: true,

          paging: true,

          info: true,

          filter: true,

          responsive: true,

          type: "GET",

          dataType: "JSON",

          ajax: 'registrar_tratamientos',




          dom: '<"row"<"col-sm-12 col-md-4"l><"col-sm-12 col-md-4"<"dt-buttons btn-group flex-wrap"B>><"col-sm-12 col-md-4"f>>t<"row"<"col-sm-12 col-md-6"i>r<"col-sm-12 col-md-6"p>>',


          buttons: [

            {
              extend: 'excelHtml5',

              text: 'Excel',

              title: 'Listado tratamientos de clientes',

              exportOptions: {

                columns: [0, 1, 2, 3, 4]

              }

            },

            {
              extend: 'pdfHtml5',

              text: 'PDF',

              title: 'Listado tratamientos de clientes',

              exportOptions: {

                columns: [0, 1, 2, 3, 4],

                alignment: 'center',

              }
            },

          ],



          columns: [



            {
              data: 'nombre',

              name: 'nombre'
            },



            {
              data: 'valor_tratamiento',

              name: 'valor_tratamiento'
            },
            {
              data: 'created_at',

              name: 'created_at'
            },
            {
              data: 'estado',

              name: 'estado'
            },
            {
              data: 'saldo',

              name: 'saldo'
            },
            {
              data: 'action',

              name: 'action',

              orderable: false,

              searchable: false
            },



          ],

          "createdRow": function(row, data, index) {

            if (data.saldo == 0) {

              $('td', row).eq(3).addClass('text-primary').text('Pagado');

            } else {

              $('td', row).eq(3).addClass('text-second').text('Pendiente');
            }
          },


          order: [2, 'desc'],

          "columnDefs": [{

              "orderable": false,

              "render": $.fn.dataTable.render.number('.'),

              "targets": [1],

              className: 'dt-body-left',
            },

            {
              "orderable": false,

              "render": $.fn.dataTable.render.number('.'),

              "targets": [4],

              className: 'dt-body-left',
            },



          ],


          "language": {


            "emptyTable": "No hay tratamientos registrados.",

            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",

            "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",

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







        // ==================================================

        /// GUARDAR REGISTROS DE TRATAMIENTOS DEL CLIENTE

        // ===================================================


        $('#form_agregar_tratamiento').off('submit').on('submit', function(e) {

          $.ajaxSetup({

            headers: {

              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

          });


          e.preventDefault();

          /*      
           let datos = [];

           // Collect data from each row
           $('#table_registros_tratamientos tbody tr').each(function() {

               let row = {};

               row.user_id = $(this).find('input[name="user_id"]').val();

               row.id_cliente = $(this).find('input[name="id_cliente"]').val();

               row.nombre = $(this).find('input[name="nombre"]').val();

               row.celular = $(this).find('input[name="celular"]').val();

               row.responsable = $(this).find('input[name="responsable"]').val();

               row.tratamiento = $(this).find('input[name="tratamiento[]"]').val();

               row.valor_tratamiento = $(this).find('input[name="valor_tratamiento[]"]').val();

               row.estado = $(this).find('input[name="estado"]').val();

               row.saldo = $(this).find('input[name="saldo"]').val();

               datos.push(row);
           });

           */

          // let formData = $('form_agregar_tratamiento').serializeArray();
          //  let jsonStr = JSON.stringify(formData);

          //  alert(convertedIntoArray);


          /* Configurar botón submit con spinner */
          let btn = $('#agregar_tratamiento')

          let existingHTML = btn.html() //store exiting button HTML

          //Add loading message and spinner
          $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

          setTimeout(function() {

            $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable

          }, 5000) //5 seconds

          $('#agregar_tratamiento').attr('disabled', true);


          event.preventDefault();

          //  let formData = new FormData(this);

          try {

            $.ajax({

              url: "crear_tratamiento",

              method: "POST",

              dataType: "json",

              data: $(this).serialize(),


              success: function(data) {

                table.ajax.reload();

                $('#agregar_tratamiento').prop("required", true);
                // $('#selectBuscarCliente').html("");

                $('#form_agregar_tratamiento')[0].reset();

                $('#modalACrearTratamiento').modal('hide');

            
                //   table.ajax.reload();
                //   location.reload(true);
                toastr["success"]("Tratamiento registrado correctamente.");

                listarProductos()

                $('.livesearch').html('');

                $('#celular').val('');

                $('#tratamientos').val('');

                $('#valor_tratamiento').val('');

                $('#tratamientos1').val('');

                $('#sum1').val('');

                $("#table_registros_tratamientos tbody").html('');

                console.log(data);

              }
            });
          } catch (e) {

            toastr["danger"]("Se ha presentado un error.", "Información");

          }

        });


        /*=============================================

        LISTAR TODOS LOS PRODUCTOS

        =============================================*/

        function listarProductos() {

          let listaProductos = [];


          let descripcion = $("#tratamiento");

          let valor_tratamiento = $("#valores");


          for (let i = 0; i < descripcion.length; i++) {

            listaProductos.push({

              "tratamientos": $(descripcion[i]).val(),

              "valor_tratamiento": $(descripcion[i]).val()
            })
          }

          $("#tratamientos1").val(JSON.stringify(listaProductos));

          console.log(listarProductos, listaProductos);

        }





        // =========================================

        /// VER REGISTROS DE TRATAMIENTO DE CLIENTES

        // =========================================

        $('body').on('click', '.verTratamiento', function(e) {

          $.ajaxSetup({

            headers: {

              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });


          let id = $(this).data('id');

          $('#form_ver_tratamiento')[0].reset();

          $.ajax({

            url: 'ver_tratamiento/' + id,

            method: 'get',

            dataType: 'json',

            data: {

              id: id,

            },

            success: function(response) {

              let json = JSON.parse(response.tratamientos);



              $("#myTable").empty();

              try {

                $('#modalVerTratamiento').modal('show');


                let table = document.getElementById('myTable')

                for (var i = 0; i < json.length; i++) {

                  let row = `<tr>

                        <td>${json[i].tratamiento}</td>
                        
                        <td>${json[i].valor_tratamiento}</td>
                       
                      </tr>`
                  table.innerHTML += row


                }




              } catch (err) {
                // ⛔️ SyntaxError: "[object Object]" is not valid JSON
                //  console.log(err.message);
              }






              // console.log(data[i].tratamiento)
              //  } 

              //   $('#modalVerTratamiento input[name="valor_tratamiento"]').val(data.id_cliente);

              $('#modalVerTratamiento input[name="nombreCliente"]').val(response.nombre);

              //  $('#modalVerTratamiento input[name="celular"]').val(data.celular);

              //   $('#modalVerTratamiento input[name="tratamiento"]').val(data.tratamiento);

              //   $('#modalVerTratamiento input[name="valor_tratamiento"]').val(data.valor_tratamiento);

              //   $('#modalVerTratamiento input[name="responsable"]').val(data.responsable);

              //  $('#modalVerTratamiento input[name="fecha"]').val(date('d-m-Y  h:i A', strtotime(data.created_at)));


            }

          });


        });




        // =========================================

        /// EDITAR REGISTROS DE TRATAMIENTO DE CLIENTES

        // =========================================

        $('body').on('click', '.editarTratamiento', function(e) {

          e.preventDefault();

          $('#form_editar_tratamiento')[0].reset();

          let id = $(this).data('id');

          $.ajax({
            url: '/editar_tratamientos/' + id,

            method: 'GET',

            data: {

              id: id

            },


            success: function(data) {


              let json = JSON.parse(data.tratamientos);


              $("#myTable2").empty();


              let table = document.getElementById('myTable2')

              for (var i = 0; i < json.length; i++) {

                let row = `<tr>

                        <td>${json[i].tratamiento}</td>

                        <td>${json[i].valor_tratamiento}</td>
                             
                       
                      </tr>`

                //   $('#select').html(option);

                table.innerHTML += row

              }


              $('#modalEditarTratamiento').modal('show');

              $('#modalEditarTratamiento input[name="id_tratamiento"]').val(data.id);

              $('#modalEditarTratamiento input[name="id_cliente"]').val(data.id_cliente);

              $('#modalEditarTratamiento input[name="nombreCliente"]').val(data.nombre);

              $('#modalEditarTratamiento input[name="celular"]').val(data.celular);

              $('#modalEditarTratamiento input[name="tratamiento2"]').val(data.tratamiento);

              $('#modalEditarTratamiento input[name="saldo2"]').val(data.valor_tratamiento);

              $('#modalEditarTratamiento input[name="valor_tratamiento2"]').val(data.valor_tratamiento);

              $('#modalEditarTratamiento input[name="responsable"]').val(data.responsable);

            }

          });

        });




        // =========================================

        // ACTUALIZAR DATOS DE ABONO

        // =========================================


        $('#form_editar_tratamiento').off('submit').on('submit', function(event) {

          $.ajaxSetup({

            headers: {

              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          /* Configurar botón submit con spinner */
          let btn = $('#editar_tratamiento')

          let existingHTML = btn.html() //store exiting button HTML

          //Add loading message and spinner
          $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

          setTimeout(function() {

            $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable

          }, 5000) //5 seconds

          $('#editar_tratamiento').attr('disabled', true);

          event.preventDefault();
          try {

            let id = $(this).data('id');

            $.ajax({

              url: 'actualizar_tratamiento/' + id,

              method: "POST",

              data: $(this).serialize(),

              dataType: "json",

              success: function(data) {

                $('#editar_tratamiento').prop("required", true);
                // $('#selectBuscarCliente').html("");

                $('#form_editar_tratamiento')[0].reset();

                $('#modalEditarTratamiento').modal('hide');

                table.ajax.reload();
                //   location.reload(true);
                toastr["success"]("datos actualizados correctamente.");

              }
            });
          } catch (e) {

            toastr["danger"]("Se ha presentado un error.", "Información");
          }
        });





        // =========================================

        /// ELIMINAR REGISTROS DE ABONOS DE CLIENTES

        // =========================================   



        $(document).on('click', '.eliminarTratamiento', function(event) {

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

                url: '/eliminar_tratamiento/' + id,

                data: {

                  id: id
                },

                dataType: 'JSON',

                success: function(data) {

                  //   if (data.success === true) {

                  swal("Tratamiento eliminado correctamente!", data.message, "success");

                  table.ajax.reload();
                  //  $('#table_mascotas').html(data);


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



      });
    </script>







    @endsection