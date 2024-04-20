<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  
<!-- /.login-logo -->
<div class="login-logo">
  <img src="../img/log-med.png" height="50" >
  <span><h3>Centro holístico <b>Iyasu</b> </h3></span>
  </div>
    <!-- /.login-box-body -->
    <div class="card">
        <div class="card-body login-card-body">
           <!--   <p class="login-box-msg">Sign in to start your session</p> -->

           <p></p>

            <form method="post" action="{{ url('/login') }}" id="form-login">
                @csrf

                <div class="input-group mb-3">
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="Email"
                           class="form-control @error('email') is-invalid @enderror">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                    </div>
                    @error('email')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password"
                           name="password"
                           id="password"
                           placeholder="clave"
                           class="form-control @error('password') is-invalid @enderror">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span> 
                        </div>
                   </div>
                  
                    @error('password')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror

                   <!-- <i onclick="show('password')" class="fas fa-eye-slash" id="display"></i> -->
                </div>
                  
               
                <div class="row">
                   
                         <!--
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">Remember Me</label>
                        </div>
                    </div>
                    -->
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-md btn-block"> Entrar</button>
                    </div>

                </div>
            </form>

            <!--
            <p class="mb-1">
                <a href="{{ route('password.request') }}">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
            </p>
          </div>
          -->
       
        <!-- /.login-card-body -->
    </div>

</div>
<!-- /.login-box -->

<script src="{{ mix('js/app.js') }}" ></script>


<script>

function show(a) {
  var x=document.getElementById(a);
  var c=x.nextElementSibling
  if (x.getAttribute('type') == "password") {
  c.removeAttribute("class");
  c.setAttribute("class","fas fa-eye");
  x.removeAttribute("type");
    x.setAttribute("type","text");
  } else {
  x.removeAttribute("type");
    x.setAttribute('type','password');
 c.removeAttribute("class");
  c.setAttribute("class","fas fa-eye-slash");
  }
}


// =====================================

// CONFIGURAR BOTÓN SUBMIT CON SPINNER

// =====================================

$('#form-login').off('submit').on('submit', function(event) {

        let btn = $('.btn-block')

        let existingHTML = btn.html() //store exiting button HTML

        //Add loading message and spinner
        $(btn).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Procesando...').prop('disabled', true)

        setTimeout(function() {

        $(btn).html(existingHTML).prop('disabled', false) //show original HTML and enable

        }, 5000) //5 seconds

        $('.btn-block').attr('disabled', true);

});



  </script>

</body>
</html>
