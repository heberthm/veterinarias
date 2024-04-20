
<aside class="main-sidebar sidebar-light-gray elevation-4">
   <!-- Brand Logo -->
   <a href="{{ asset('inicio') }}" class="brand-link">

     <img src="{{ asset('img/logo-pet.png') }}" alt="veterinaria" class="brand-image img-circle elevation-3" style="opacity: .8">

     <span class="brand-text font-weight-light"><b>Veterinaria</b></span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->




         <li class="nav-item">


           @can('inicio')


           <a href="{{ url('inicio') }}" class="nav-link {{ request()->is('inicio') ? 'active' : '' }}">


             <i class="nav-icon fas fa-users green"></i>

             <p>

               Clientes

             </p>

           </a>

           @endcan

         </li>




         @can('registrar_tratamiento')

         <li class="nav-item">

           <a href="{{ url('registrar_tratamientos') }}" class="nav-link {{ request()->is('registrar_tratamientos') ? 'active' : '' }}">

             <!-- <i class="nav-icon fas fa-list green"></i> -->
             <i class="nav-icon fas  fa-medkit"></i>

             <p>

               Registrar tratamientos

             </p>

           </a>

         </li>

         @endcan




         @can('abonos')

         <li class="nav-item">

           <a href="{{ url('abonos') }}" class="nav-link {{ request()->is('abonos') ? 'active' : '' }}">
             <!-- <i class="nav-icon fas fa-list green"></i> -->

             <i class="nav-icon fas  fa-list"></i>

             <p>

               Abonos

             </p>

           </a>

         </li>

         @endcan



         @can('deudores')

         <li class="nav-item">

           <a href="{{ url('deudores') }}" class="nav-link {{ request()->is('deudores') ? 'active' : '' }}">

             <!-- <i class="nav-icon fas fa-list green"></i> -->
             <i class="nav-icon fas  fa-tags"></i>

             <p>

               Deudores

             </p>

           </a>

         </li>

        
        @endcan



         @can('pago_honorarios')

         <li class="nav-item">

           <a href="{{ url('pago_honorarios') }}" class="nav-link {{ request()->is('pago_honorarios') ? 'active' : '' }}">


             <!-- <i class="nav-icon fas fa-list green"></i> -->
             <i class="nav-icon fas  fa-usd"></i>

             <p>

               Pagos a profesionales

             </p>

           </a>

         </li>

         @endcan



         @can('inicio')

         <li class="nav-item">

           <a href="{{ url('inicio') }}" class="nav-link {{ request()->is('inicio') ? '' : '' }}">

             <i class="nav-icon fas fa-comment green"></i>

             <p>

               Recordatorios

             </p>

           </a>

         </li>

      
         @endcan




         @can('register')

         <li class="nav-item has-treeview">

           <a href="#" class="nav-link">

             <i class="nav-icon fas fa-building green"></i>

             <p>

               Administración

               <i class="right fas fa-angle-left"></i>

             </p>

           </a>

          
        @endcan



          @can('registros_contables')

           <ul class="nav nav-treeview">



          
             <li class="nav-item">


               <a href="{{ url('registros_contables') }}" class="nav-link {{ request()->is('registros_contables') ? 'active' : '' }}">

                 <i class="nav-icon fas fa-book green"></i>

                 <p>

                   Registros contables

                 </p>

               </a>

             </li>


          @endcan




             @can('profesionales')

             <li class="nav-item">

               <a href="{{ url('profesionales') }}" class="nav-link {{ request()->is('profesionales') ? 'active' : '' }}">

                 <i class="nav-icon fas fa-user-md green"></i>

                 <p>

                   Profesionales

                 </p>

               </a>

             </li>


             @endcan



             @can('terapias')

             <li class="nav-item">

               <a href="{{ url('terapias') }}" class="nav-link {{ request()->is('terapias') ? 'active' : '' }}">

                 <i class="nav-icon fas fa-list-ol green"></i>

                 <p>

                   Terapias

                 </p>

               </a>

             </li>


             @endcan





             @can('terapias_adicionales')

             <li class="nav-item">

               <a href="{{ url('terapias_adicionales') }}" class="nav-link {{ request()->is('terapias_adicionales') ? 'active' : '' }}">

                 <i class="nav-icon fas fa-tags green"></i>

                 <p>

                   Terapias adicionales

                 </p>

               </a>

             </li>


             @endcan


          @can('lavados')

             <li class="nav-item">

               <a href="{{ url('lavados') }}" class="nav-link {{ request()->is('lavados') ? 'active' : '' }}">

                 <i class="nav-icon fas fa-cogs white"></i>

                 <p>

                   lavados

                 </p>
               </a>

             </li>

           </ul>

         </li>

         @endcan




         @can('estadisticas')


         <li class="nav-item">

           <a href="{{ url('estadisticas') }}" class="nav-link {{ request()->is('estadisticas') ? 'active' : '' }}">


             <i class="nav-icon fas fa-bar-chart green"></i>

             <p>

               Estadísticas

             </p>

           </a>

         </li>


         @endcan



         @can('register')

         <li class="nav-item">

           <a href="{{ url('register') }}" class="nav-link {{ request()->is('register') ? 'active' : '' }}">

             <i class="nav-icon fas fa-user green"></i>

             <p>

               Crear usuario

             </p>

           </a>

         </li>

         @endcan





         <li class="nav-item">

           <a class="nav-link" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

             <i class="nav-icon fa fa-power-off" style="color:#C81010"></i>
             <p>
               Salir
             </p>
           </a>

           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

             @csrf

           </form>

         </li>


     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>
 