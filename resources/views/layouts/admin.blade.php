<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrar - @yield('titulo')</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="/css/simple-sidebar.css" rel="stylesheet">


</head>

<body>

  <!-- Navigation -->
  <ul style="list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: black;">
  <li style="float:left"><a class="active" href="#menu-toggle" id="menu-toggle" style="display: block; color: #999999;text-align: center;padding: 14px 16px;"><i class="fa fa-bars"></i> Administración</a></li>
  <li style="float:right"><a href="/" style="display: block; color: #999999;text-align: center;padding: 14px 16px;"><i class="fa fa-angle-double-left"></i> Volver</a></li>
  </ul>

  <div style="position:fixed; right:15px; bottom:15px;"><a class ="ingreso" href="{{url('/logout')}}" data-toggle="tooltip" title="Salir"><i class="fa fa-sign-out fa-2x"></i><a></div>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="/admin">
                        Panel de Administración
                    </a>
                </li>
                <li>
                    <a href="/admin/inicio">Inicio</a>
                </li>
                <li>
                    <a href="/admin/servicios">Servicios</a>
                </li>
                <li>
                    <a href="/admin/equipo">Equipo</a>
                </li>
                <li>
                    <a href="/admin/experiencia">Experiencia</a>
                </li>
                <li>
                    <a href="/admin/mensajes">Mensajes</a>
                </li>
                <li>
                    <a href="#">Correo</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">


                @yield('content')

            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

    <!-- Custom scripts for this template -->
    <script src="{{ URL::asset('js/valuamos.js') }}"></script>

</body>

</html>
