<!-- 
  
  este es el include menuLogin que se inserta en la vista welcome.

    este menu tiene un el con 2 li

    *Inscripción Online
    * Reinscripción

-->

<div class="menuLogin">
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Universidad Ceprog</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{ url('/inscripcion') }}"><i class="fa fa-user "></i> Inscripción Online</a></li>
            <li><a href="{{ url('/solicitud')}}"><i class="fa fa-user "></i>  Reinscripción</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    </div>