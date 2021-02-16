<!DOCTYPE html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Crud-Livewire</title>

    <!-- Fonts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"/>
    <!-- Styles -->


    @livewireStyles
</head>

<body>
   <!-- Header llamando blade-->
   
 
    <div class="conteiner">
        @yield('content')
    </div>

    <div class="container p-4 bg-light">
        <div class="row">
          <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
            <h5 class="text-uppercase">Aplcativo Web</h5>
            <p>
                La aplicación Web está desarrollada en LiveWire y laravel, con el fin de no sobrecargar la página,
                todo los proceso de CRUD y paginación esta realizado sin recarga el navegador.
            </p>
          </div>
        </div>
      </div>

      <!-- Footer 
       <00ivewire:fecha-footer > llamar componente phps
      -->
      @livewire('fecha-footer')

    @livewireScripts

 <!-- mensaje de alerta se desea -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
 <!-- para insertar mensajes de alerta -->

<script>
    window.addEventListener('alert', event => { 
                 toastr[event.detail.type](event.detail.message, 
                 event.detail.title ?? ''), toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                    }
                });
  </script>

<script src="{{ asset('js/jquery-3.5.1.min.js') }}" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" ></script>
</body>

</html>
