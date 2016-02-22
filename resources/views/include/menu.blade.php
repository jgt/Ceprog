@extends('template.Maestro')

@section('content')
  
  @include('ajax.modalArchivos')
  @include('ajax.modalMaterial')
  @include('ajax.modalRubricas')
  @include('ajax.modalRespuestas')
  @include('ajax.modalEditar')
  @include('ajax.modalPorcentajeRubricas')
  @include('ajax.modalNota')
  @include('ajax.modalUnidad')
  @include('ajax.modalEditUnidad')
  @include('ajax.modalEditsubtemas')
  @include('ajax.modalResponder')
  @include('ajax.modalFile')
  @include('ajax.modalVideos')
  @include('ajax.modalListVideos')
  @include('ajax.modalCalificacion')
  @include('ajax.modalMapoyo')
  @include('ajax.modalListVideoDocente')
  @include('ajax.modalCrearSubtema')
  @include('ajax.modalMapoyoAlm')
  @include('ajax.modalEditRubricas')
  @include('ajax.modalTutorial')
  @include('ajax.modalTutoprf')
  @include('ajax.modalTutorialAlm')

 <div id="wrapper">

        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">Sistema Online Universidad Ceprog</a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            
            </div>
           

            <ul class="nav navbar-top-links navbar-right">
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        {!!Auth::user()->name!!}<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ajustes</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/auth/logout') }}" onclick= "return confirm('Quieres salir de tu perfil?')"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                    @if(Auth::user()->is('prf'))
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Maestro<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                 
                                  @foreach($materias as $materia)
                                    <li> <a href="#"><i class='fa fa-plus fa-fw'></i> {{$materia->name}}</a>
                                      
                                    <ul class="nav nav-third-level" data-id="{{ $materia->id}}">
                                      <a href="{{$materia->id}}" id="matId" class="alert"></a>
                                       <a href="{{ route('idUnidad')}}" id="idUnidad" class="alert"></a>
                                        <a href="{{ route('idSubtemas')}}" id="idSubtemas" class="alert"></a>
                                      <li><a href="{{ route('planeacion', $materia)}}" id="planeacion">Crear Unidad</a></li>
                                      <li><a href="{{ route('examen', $materia)}}" id="createExa">Crear Examen</a></li>
                                      <li><a href="{{ route('listplan', $materia)}}" id="listUni">Herramientas</a></li>
                                       <li><a href="{{ route('allTutorial')}}" id="prfTutorial">Tutoriales</a></li>
                                      <li><a href="{{ route('listplan', $materia)}}" id="ListUniSub"><i class='fa fa-plus fa-fw'></i>Lista de unidades</a>
                                         <ul class="nav nav-fourth-level" id="nameUni"></ul> 
                                      </li> 
                                      <!--<li><a href="{{ route('totalCal', $materia )}}">Calificacion General</a></li>-->
                                       @foreach($materia->unidades as $unidad)
                                    <a href="{{$unidad->id}}" class="alert" id="prt"></a>
                                  @endforeach
                                      <li><a href="#"><i class='fa fa-plus fa-fw'></i> Foros</a>
                                        <ul class="nav nav-fourth-level">
                                           @foreach($materia->foros as $foro)
                                            <li><a href="{{ route('comentario', $foro )}}">{{$foro->title}}</a></li>
                                             @endforeach
                                        </ul>
                                      </li>
                                    </ul>
                                    </li>
                                    @endforeach
                                </li>
                                <!--
                                <li>
                                    <a href="#"><i class='fa fa-list-ol fa-fw'></i> Usuarios</a>
                                </li>
                                -->
                            </ul>
                        </li>
                    @endif
                    @if(Auth::user()->is('alm'))
                        <li>
                            <a href="#"><i class="fa fa-film fa-fw"></i> Alumno<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                              @foreach(Auth::user()->semestres as $semestre)
                                <li>
                                    <a href="#"><i class='fa fa-plus fa-fw'></i> {{$semestre->carrera->name}}</a>
                                      @foreach($semestre->materias as $materia)
                                           <ul class="nav nav-third-level">

                                            <li><a href="#"><i class='fa fa-plus fa-fw'></i> {{$materia->name}}</a>
                                              <ul  class="nav nav-fourth-level"  data-id="{{ $materia->id}}">
                                                <a href="{{$materia->id}}" id="almId" class="alert"></a>
                                                <li><a href="{{ route('act', $materia)}}" id="almUni">Herramientas</a></li>
                                                <li><a href="{{route('listExamen', $materia )}}" id="Lexamen">Lista de examenes</a></li>
                                                <li><a href="{{ route('allTutorial')}}" id="almTutorial">Tutoriales</a></li>
                                                <li><a href="{{ route('listplan', $materia)}}" id="almUnidadList"><i class='fa fa-plus fa-fw'></i>Lista de unidades</a>
                                                   <ul class="nav nav-fourth-level" id="AlmuniList"></ul> 
                                                </li> 
                                                <li><a href="#"><i class='fa fa-plus fa-fw'></i> Foros</a>
                                                   @foreach($materia->foros as $foro)
                                                    <ul class="nav nav-fifth-level">
                                                      <li><a href="{{route('comentario', $foro)}}">{{$foro->title}}</a></li>
                                                    </ul>
                                                  @endforeach
                                                </li>
                                              </ul>
                            
                                            </li>
                                            </ul>
                                      @endforeach
                                    
                                </li>
                                @endforeach
                                <!--
                                <li>
                                    <a href="#"><i class='fa fa-list-ol fa-fw'></i> Peliculas</a>
                                </li>
                              -->
                            </ul>
                        </li>
                        @endif
                        @if(Auth::user()->is('ctr'))
                        <li>
                            <a href="#"><i class="fa fa-child fa-fw"></i> Tutores<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ route('admcreate')}}">Crear alumno</a></li>
                                <li><a href="{{ route('ver')}}">Lista de Alumnos</a></li>
                                <li><a href="#"><i class='fa fa-plus fa-fw'></i> Carreras</a>
                                   @foreach(Auth::user()->semestres as $semestre)
                                      @foreach($semestre->materias as $materia)
                                      <ul class="nav nav-fifth-level">
                                        <li><a href="{{ route('portafolio', $materia)}}">{{$materia->name}}</a></li>
                                      </ul>
                                      @endforeach
                                   @endforeach
                                </li>
                            </ul>
                        </li>
                      @endif
                         @if(Auth::user()->is('cdo'))
                        <li>
                            <a href="#"><i class="fa fa-child fa-fw"></i> Cordinador<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{route('cordinador.index')}}">Lista maestros</a></li>
                                <li><a href="{{route('mtmCordinador')}}">Lista de materias</a></li>
                            </ul>
                        </li>
                      @endif
                      @if(Auth::user()->is('adm'))
                      <li>
                            <a href="#"><i class="fa fa-child fa-fw"></i> Administrador<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                              <li><a href="#"><i class='fa fa-plus fa-fw'></i> Tutoriales</a>
                                  
                                  <ul class="nav nav-sixth-level">
                                     <li><a href="{{ route('tutorial')}}" id="admin"><i class="fa fa-film"></i> Subir tutoriales</a></li>
                                      <li><a href="{{ route('allTutorial')}}" id="listTutorial"><i class="fa fa-file-video-o"></i> Lista de tutoriales</a></li>
                                  </ul>

                              </li>
                                <li><a href="#"><i class='fa fa-plus fa-fw'></i> Administracion</a>
                                      
                                      <ul class="nav nav-fifth-level">
                                        <li><a href="{{route('admin.create')}}" id="Cusuario">Crear usuario</a></li>
                                          <li><a href="{{route('role.create')}}" id="Croles">Crear role</a></li>
                                          <li><a href="{{route('foro')}}">Crear foro</a></li>
                                          <li><a href="{{route('carrera.create')}}">Crear Plan</a></li>
                                      </ul>
                                </li>
                                <li><a href="#"><i class='fa fa-plus fa-fw'></i> Informacion academica</a>
                                      
                                      <ul class="nav nav-fifth-level">
                                       <li><a href="{{route('admin.index')}}" id="listaP">Lista de Personal</a></li>
                                       <li><a href="{{route('role.index')}}">Lista de roles</a></li>
                                       <li><a href="{{route('listForo')}}">Lista de Foros</a></li>
                                       <li><a href="{{route('carrera.index')}}">Lista de carreras</a></li>
                                       <li><a href="{{route('materia.index')}}">Lista de materias</a></li>
                                      </ul>
                                </li>
                            </ul>
                        </li>
                        @endif
                        <li>
                            <a href="#"><i class='fa fa-plus fa-fw'></i> Consultas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               @if(Auth::user()->is('alm') || Auth::user()->is('prf'))
                                <li><a href="{{ route('allTutorial')}}"><i class="fa fa-file-video-o"></i> Lista de tutoriales</a></li>
                                @endif
                              @if(Auth::user()->is('prf'))
                                <li><a href="{{url('/listplan')}}"><i class="fa fa-circle-o"></i> Lista de Planeaciones</a></li>
                                <li><a href="{{ url('/listrubrica')}}"><i class="fa fa-archive"></i> Lista de rubricas</a></li>
                                @endif
                                @if(Auth::user()->is('alm'))
                                <li><a href="{{ route('archivos')}}"><i class="fa fa-archive"></i> Archivos adjuntos</a></li>
                                <li><a href="/documentos/presentacion.jpg"><i class="fa fa-exclamation-circle"></i> Secuencia de curso</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

     </nav>


@include('ajax.listTutorialAlm')

@include('ajax.listPrfTuto')

@include('ajax.subirTutorial')

@include('ajax.vizualizacionUnidad')

@include('ajax.VunidadEstudiante')

@include('ajax.alumnosListUnidad')

@include('ajax.almActividad')

@include('ajax.crearUsuario')

@include('ajax.planeacion')

@include('ajax.crearActividad')

@include('ajax.EditRubricas')

@include('ajax.listaUser')

@include('ajax.ListaActividades')

@include('ajax.listTutorial')

@include('ajax.listSubtemas')

@include('ajax.listUnidades')

@include('ajax.listaExamenes')

@include('ajax.crearExamen')

@include('ajax.crearPregunta')

@include('ajax.notasRubricas')

@include('ajax.archivosCalificaciones')

@section('scripts')

@include('script.select')

@include('script.menu')

@include('script.ajaxRoles')

@include('script.ajaxUsuario')

@include('script.ajaxExamen')

@include('script.ajaxListExamenes')

@include('script.ajaxPlaneacion')

@include('script.ajaxListUnidad')

@include('script.ajaxAlumnos')

@include('script.ajaxVisualizacion')

@include('script.uploadFile')

@include('script.VideosFile')

@include('script.ApoyoFile')

@include('script.tutorialFile')

@include('script.ajaxAdministrador')

@include('script.ajaxTutorial')


@stop



