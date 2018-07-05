<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Valuamos</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top" style="text-color:white">Valuamos</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">@if(Request::session()->has('languaje')) Services @else Servicios @endif</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#team">@if(Request::session()->has('languaje')) Team @else Equipo @endif</a>
            </li>

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">@if(Request::session()->has('languaje')) Experience @else Experiencia @endif</a>
            </li>

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">@if(Request::session()->has('languaje')) Contact @else Contacto @endif</a>
            </li>

              @if(!Request::session()->has('languaje'))
                <li class="nav-item">
                <div class="dropdown">
                  <a class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                    <img src="{{ URL::asset('img/languajes/spain.png') }}" style="opacity:0.7"> Es
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{url('/es')}}"><img src="{{ URL::asset('img/languajes/spain.png') }}" style="opacity:0.7"> Es</a>
                    <a class="dropdown-item" href="{{url('/en')}}"><img src="{{ URL::asset('img/languajes/usa.png') }}" style="opacity:0.7"> En</a>
                  </div>
                </div>
                </li>
              @else
                <li class="nav-item">
                <div class="dropdown">
                  <a class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                    <img src="{{ URL::asset('img/languajes/usa.png') }}" style="opacity:0.7"> En
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{url('/es')}}"><img src="{{ URL::asset('img/languajes/spain.png') }}" style="opacity:0.7"> Es</a>
                    <a class="dropdown-item" href="{{url('/en')}}"><img src="{{ URL::asset('img/languajes/usa.png') }}" style="opacity:0.7"> En</a>
                  </div>
                </div>
                </li>
              @endif

              @if (!Auth::guest())
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="/admin">Administrar</a>
              </li>
              @endif

          </ul>
        </div>
      </div>
    </nav>

    <!-- login and Logout -->
    @if (Auth::guest())
      <div style="position:fixed; right:15px; bottom:15px;"><a class ="ingreso" href="{{url('/login')}}" data-toggle="tooltip" title="Ingresar"><i class="fa fa-sign-in fa-2x"></i><a></div>
    @else
      <div style="position:fixed; right:15px; bottom:15px;"><a class ="ingreso" href="{{url('/logout')}}" data-toggle="tooltip" title="Salir"><i class="fa fa-sign-out fa-2x"></i><a></div>
    @endif

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-heading text-uppercase">Valuamos</div>

          @if(Request::session()->has('languaje'))
            <h4 class="section-subheading">{{$textos[0]->inicioEn}}</h4><br>
            <a class="btn btn-info btn-lg js-scroll-trigger" href="#services">See More</a>
          @else
            <h4 class="section-subheading">{{$textos[0]->inicioEs}}</h4><br>
            <a class="btn btn-info btn-lg js-scroll-trigger" href="#services">Ver Más</a>
          @endif

        </div>
      </div>
    </header>





    <!-- Services -->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            @if(Request::session()->has('languaje'))
              <h2 class="section-heading text-uppercase">Services</h2>
              <h3 class="section-subheading text-muted">{{$textos[0]->serviciosEn}}</h3>
            @else
              <h2 class="section-heading text-uppercase">Servicios</h2>
              <h3 class="section-subheading text-muted">{{$textos[0]->serviciosEs}}</h3>
            @endif
          </div>
        </div>

        @for ($i = 0; $i < (count($servicios)-(count($servicios)%3)); $i++)
          @if($i%3==0)
            <div class="row text-center">
          @endif
            <div class="col-md-4">
              <span class="fa-stack fa-3x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa {{$servicios[$i]->icono}} fa-stack-1x fa-inverse"></i>
              </span>
              @if(!Request::session()->has('languaje'))
                <h5 class="service-heading">{{$servicios[$i]->nombreEs}}</h5>
                <p class="text-muted">{{$servicios[$i]->descripcionEs}}</p>
              @else
              <h5 class="service-heading">{{$servicios[$i]->nombreEn}}</h5>
              <p class="text-muted">{{$servicios[$i]->descripcionEn}}</p>
              @endif
            </div>
          @if($i%3==2)
            </div>
          @endif
        @endfor
        @if(count($servicios)%3==1)
          <div class="row text-center">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
              <span class="fa-stack fa-3x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa {{$servicios[count($servicios)-1]->icono}} fa-stack-1x fa-inverse"></i>
              </span>
              @if(!Request::session()->has('languaje'))
                <h5 class="service-heading">{{$servicios[count($servicios)-1]->nombreEs}}</h5>
                <p class="text-muted">{{$servicios[count($servicios)-1]->descripcionEs}}</p>
              @else
              <h5 class="service-heading">{{$servicios[count($servicios)-1]->nombreEn}}</h5>
              <p class="text-muted">{{$servicios[count($servicios)-1]->descripcionEn}}</p>
              @endif
            </div>
            <div class="col-md-4">
            </div>
          </div>
        @endif
        @if(count($servicios)%3==2)
          <div class="row text-center">
            <div class="col-md-6">
              <span class="fa-stack fa-3x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa {{$servicios[count($servicios)-2]->icono}} fa-stack-1x fa-inverse"></i>
              </span>
              @if(!Request::session()->has('languaje'))
                <h5 class="service-heading">{{$servicios[count($servicios)-2]->nombreEs}}</h5>
                <p class="text-muted">{{$servicios[count($servicios)-2]->descripcionEs}}</p>
              @else
              <h5 class="service-heading">{{$servicios[count($servicios)-2]->nombreEn}}</h5>
              <p class="text-muted">{{$servicios[count($servicios)-2]->descripcionEn}}</p>
              @endif
            </div>
            <div class="col-md-6">
              <span class="fa-stack fa-3x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa {{$servicios[count($servicios)-1]->icono}} fa-stack-1x fa-inverse"></i>
              </span>
              @if(!Request::session()->has('languaje'))
                <h5 class="service-heading">{{$servicios[count($servicios)-1]->nombreEs}}</h5>
                <p class="text-muted">{{$servicios[count($servicios)-1]->descripcionEs}}</p>
              @else
              <h5 class="service-heading">{{$servicios[count($servicios)-1]->nombreEn}}</h5>
              <p class="text-muted">{{$servicios[count($servicios)-1]->descripcionEn}}</p>
              @endif
            </div>
          </div>
        @endif
      </div>
    </section>

    <!-- Team -->
    <section class="bg-light" id="team">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">@if(Request::session()->has('languaje')) Our Team @else Nuestro Equipo @endif</h2><br>
          </div>
        </div>


        @for ($i = 0; $i < (count($empleados)-(count($empleados)%3)); $i++)
          @if($i%3==0)
            <div class="row text-center">
          @endif

            <div class="col-lg-4 " >
              <div class="team-member" >
                <center><table style="padding:40px">
                  <tr>
                    <th style="vertical-align: center;">
                        <i class="fa fa-user fa-4x text-primary" style="margin-right:10px"></i>
                    </th>
                    <th>
                      <h4 style="margin-top:0">{{$empleados[$i]->nombre}}</h4>
                      <p class="text-muted" style="margin:1px">@if(Request::session()->has('languaje')) {{$empleados[$i]->cargoEn}} @else {{$empleados[$i]->cargoEs}} @endif</p>
                      <a class="correo" style="margin:1px" href="mailto:{{$empleados[$i]->email}}">{{$empleados[$i]->email}}</a>
                    </th>
                  </tr>
                </table></center>
              </div>
            </div>

          @if($i%3==2)
            </div>
          @endif
        @endfor
        @if(count($empleados)%3==1)
          <div class="row text-center">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4 " >
              <div class="team-member" >
                <center><table style="padding:40px">
                  <tr>
                    <th style="vertical-align: center;">
                        <i class="fa fa-user fa-4x text-primary" style="margin-right:10px"></i>
                    </th>
                    <th>
                      <h4 style="margin-top:0">{{$empleados[count($empleados)-1]->nombre}}</h4>
                      <p class="text-muted" style="margin:1px">@if(Request::session()->has('languaje')) {{$empleados[count($empleados)-1]->cargoEn}} @else {{$empleados[count($empleados)-1]->cargoEs}} @endif</p>
                      <a class="correo" style="margin:1px" href="mailto:{{$empleados[$i]->email}}">{{$empleados[count($empleados)-1]->email}}</a>
                    </th>
                  </tr>
                </table></center>
              </div>
            </div>
            <div class="col-lg-4">
            </div>
          </div>
        @endif
        @if(count($empleados)%3==2)
          <div class="row text-center">
            <div class="col-lg-6 " >
              <div class="team-member" >
                <center><table style="padding:40px">
                  <tr>
                    <th style="vertical-align: center;">
                        <i class="fa fa-user fa-4x text-primary" style="margin-right:10px"></i>
                    </th>
                    <th>
                      <h4 style="margin-top:0">{{$empleados[count($empleados)-2]->nombre}}</h4>
                      <p class="text-muted" style="margin:1px">@if(Request::session()->has('languaje')) {{$empleados[count($empleados)-2]->cargoEn}} @else {{$empleados[count($empleados)-2]->cargoEs}} @endif</p>
                      <a class="correo" style="margin:1px" href="mailto:{{$empleados[$i]->email}}">{{$empleados[count($empleados)-2]->email}}</a>
                    </th>
                  </tr>
                </table></center>
              </div>
            </div>
            <div class="col-lg-6 " >
              <div class="team-member" >
                <center><table style="padding:40px">
                  <tr>
                    <th style="vertical-align: center;">
                        <i class="fa fa-user fa-4x text-primary" style="margin-right:10px"></i>
                    </th>
                    <th>
                      <h4 style="margin-top:0">{{$empleados[count($empleados)-1]->nombre}}</h4>
                      <p class="text-muted" style="margin:1px">@if(Request::session()->has('languaje')) {{$empleados[count($empleados)-1]->cargoEn}} @else {{$empleados[count($empleados)-1]->cargoEs}} @endif</p>
                      <a class="correo" style="margin:1px" href="mailto:{{$empleados[$i]->email}}">{{$empleados[count($empleados)-1]->email}}</a>
                    </th>
                  </tr>
                </table></center>
              </div>
            </div>
          </div>
        @endif

        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            @if(Request::session()->has('languaje'))
              <h3 class="large text-muted section-subheading">{{$textos[0]->equipoEn}}</h3>
            @else
              <h3 class="large text-muted section-subheading">{{$textos[0]->equipoEs}}</h3>
            @endif
          </div>
        </div>

      </div>
    </section>

    <!-- Experience -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            @if(Request::session()->has('languaje'))
              <h2 class="section-heading text-uppercase">Experience</h2>
              <h3 class="section-subheading text-muted">{{$textos[0]->expEn}}</h3>
            @else
              <h2 class="section-heading text-uppercase">Experiencia</h2>
              <h3 class="section-subheading text-muted">{{$textos[0]->expEs}}</h3>
            @endif
          </div>
        </div>

        @for ($i = 0; $i < (count($experiencias)); $i++)
          @if($i%2==0)
            <div class="row">
              <div class="col-md-6">
                  @if(Request::session()->has('languaje'))
                    <h3 style="margin-top:15px">{{$experiencias[$i]->tituloEn}}</h3>
                    <p class="text-muted" style="text-align:justify">{{$experiencias[$i]->textoEn}}</p>
                  @else
                    <h3 style="margin-top:15px">{{$experiencias[$i]->tituloEs}}</h3>
                    <p class="text-muted" style="text-align:justify">{{$experiencias[$i]->textoEs}}</p>
                  @endif
              </div>
              <div class="col-md-6" style="background-image:url('{{$experiencias[$i]->imagen}}');background-size:cover; min-height: 200px;">
              </div>
            </div>
          @else
            <div class="row">
              <div class="col-md-6" style="background-image:url('{{$experiencias[$i]->imagen}}');background-size:cover; min-height: 200px;">
              </div>
              <div class="col-md-6">
                  @if(Request::session()->has('languaje'))
                    <h3 style="margin-top:15px">{{$experiencias[$i]->tituloEn}}</h3>
                    <p class="text-muted" style="text-align:justify">{{$experiencias[$i]->textoEn}}</p>
                  @else
                    <h3 style="margin-top:15px">{{$experiencias[$i]->tituloEs}}</h3>
                    <p class="text-muted" style="text-align:justify">{{$experiencias[$i]->textoEs}}</p>
                  @endif
              </div>
            </div>
          @endif
        @endfor

      </div>
    </section>


    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            @if(Request::session()->has('languaje'))
              <h2 class="section-heading text-uppercase">Contact Us</h2>
              <h3 class="section-subheading"><b>{{$textos[0]->contactoEn}}</b></h3>
            @else
              <h2 class="section-heading text-uppercase">Contáctanos</h2>
              <h3 class="section-subheading"><b>{{$textos[0]->contactoEs}}</b></h3>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="contact" method="POST" action="/sendMessage" onsubmit="sendMessage.disabled=true">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    @if(Request::session()->has('languaje'))
                    <input class="form-control" id="name" name="name" type="text" placeholder="Your Name *" required="required" >
                    @else
                    <input class="form-control" id="name" name="name" type="text" placeholder="Su Nombre *" required="required" >
                    @endif
                  </div>
                  <div class="form-group">
                    @if(Request::session()->has('languaje'))
                    <input class="form-control" id="email" name="email" type="email" placeholder="Your Email *" required="required" >
                    @else
                    <input class="form-control" id="email" name="email" type="email" placeholder="Su Correo Electrónico *" required="required" >
                    @endif
                  </div>

                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    @if(Request::session()->has('languaje'))
                    <textarea class="form-control" id="message" name="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                    @else
                    <textarea class="form-control" id="message" name="message" placeholder="Su Mensaje *" required="required" data-validation-required-message="Por favor ingrese un mensaje."></textarea>
                    @endif
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  @if(Session::has('SuccesMessage'))
                      <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><i class="fa fa-check"></i></strong> {!! Session::get('SuccesMessage') !!}
                      </div>
                  @endif
                  @if(Session::has('ErrorMessage'))
                      <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><i class="fa fa-close"></i></strong> {!! Session::get('ErrorMessage') !!}
                      </div>
                  @endif
                  <button id="sendMessage" class="btn btn-info btn-lg " type="submit">@if(Request::session()->has('languaje')) Send Message @else Enviar Mensaje @endif</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer  style="background-color:#212529; padding-top:6px; padding-bottom:4px">
      <div class="container">
        <div class="row align-items-center">

          <div class="col-md-6">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <p style="color:white; margin-bottom:0px"><i class="fa fa-phone" style="margin-right:6px"></i>@if(count($datos)>0){{$datos[0]->telefono}}@endif</p>
              </li>
              &nbsp &nbsp
              <li class="list-inline-item">
                <p style="color:white; margin-bottom:0px"><i class="fa fa-map-marker" style="margin-right:6px"></i>@if(count($datos)>0){{$datos[0]->direccion}}@endif</p>
              </li>
            </ul>
          </div>

          <div class="col-md-6">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </footer>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>

  </body>

</html>
