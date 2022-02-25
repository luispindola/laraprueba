<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>{{$titulo?? 'Laraprueba'}}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/navbar-fixed/">

    <!-- Bootstrap core CSS -->
    <link href="{{url('/')}}/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="/">Laraprueba</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{url('/')}}">Inicio <span class="sr-only">(current)</span></a>
          </li>
          
        </ul>
        
        <a class="nav-link" href="{{ url('/usuarios') }}">usuario <span class="sr-only">(current)</span></a>
        
      </div>
    </nav>

    <main role="main" class="container">
      <div class="jumbotron">
        @if(Session::has('mensaje'))
          <div class="alert alert-{{ Session::get('tipo') }} alert-dismissable" id="alerts">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{ Session::get('mensaje') }}</strong>
          </div>
        @endif
        @yield('contenido')
      </div>
    </main>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="{{url('/')}}/assets/js/vendor/popper.min.js"></script>
    <script src="{{url('/')}}/js/bootstrap.min.js"></script>
    @if(Session::get('mensaje'))      
      <script type="text/javascript">
      {{-- script para desaparecer alerta --}}
      $(document).ready(function() {        
        setTimeout(function() {
          $("#alerts").hide(6000);
          }, 3000);
        });
      </script> 
    @endif
  </body>
</html>