<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
               @foreach(Auth::user()->imagenes as $imagen)
                <img src="/imagen/{{$imagen->original_img}}" class="img-circle" alt="User Image" />
                @endforeach
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) 
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
         /.search form -->

        <!-- Sidebar Menu -->
        @if(Auth::user()->is('prf'))
        <ul class="sidebar-menu">
            <li class="header">Maestro</li>
            <!-- Optionally, you can add icons to the links -->
                @foreach($materias as $materia)
                 <li class="treeview">
                <a href="{{$materia->id}}" id="matId" style="display:none;"></a>
                <a href="{{ route('idUnidad')}}" id="idUnidad" style="display:none;"></a>
                <a href="{{ route('idSubtemas')}}" id="idSubtemas" style="display:none;"></a>

                <a href="#"><i class='fa fa-link'></i> <span>{{$materia->name}}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu" Style="display:none" data-id="{{ $materia->id}}">
                   
                    <li><a href="{{ route('planeacion', $materia)}}" id="planeacion">Crear Unidad</a></li>
                    <li><a href="{{ route('plc.show', $materia)}}" id="plcMaestro">Subir Planeacion</a></li>
                    <li><a href="{{ route('examen', $materia)}}" id="createExa">Crear Examen</a></li>
                    <li><a href="{{ route('listplan', $materia)}}" id="listUni">Herramientas</a></li>
                    <li><a href="{{ route('almSem', $materia->id)}}" id="menuListUser">Lista de Alumnos</a></li>
                    <li><a href="{{ route('listPlaneacion', $materia) }}" id="mtaPlan">Lista de Planeaciones</a></li>
                    <li><a href="{{route('listExamen', $materia )}}" id="LexamenMaestro">Lista de examenes</a></li>
                    <li><a href="{{route('recursoIndex')}}" id="recursosMaestro">Lista Recursos</a></li>
                    <li><a href="{{ route('allTutorial')}}" id="prfTutorial">Tutoriales</a></li>
                <li><a href="{{ route('listplan', $materia)}}" id="ListUniSub"><i class='fa fa-plus fa-fw'></i>Base Teórica</a>
                    <ul class="treeview-menu" id="nameUni"></ul>  
                <li><a href="{{ route('forosMateria', $materia)}}" id="foroMateria"><i class='fa fa-plus fa-fw'></i>Foros</a>
                         <ul class="treeview-menu" id="foroList"></ul>  
                </ul>
                 @endforeach
        </ul><!-- /.sidebar-menu -->
        @endif
         @if(Auth::user()->is('alm'))
        <ul class="sidebar-menu">
            <li class="header">Alumno</li>
            <!-- Optionally, you can add icons to the links -->
            
                @foreach(Auth::user()->semestres as $semestre)
                <li class="treeview">
                <a href="{{ route('idUnidad')}}" id="idUnidad" style="display:none;"></a>
                <a href="{{ route('idSubtemas')}}" id="idSubtemas" style="display:none;"></a>

                <a href="#"><i class='fa fa-link'></i> <span>{{$semestre->carrera->name}}</span><i class="fa fa-angle-left pull-right"></i></a>
                @foreach($semestre->materias as $materia)
                <ul class="treeview-menu">
                    
                 <li><a href="#"><i class='fa fa-plus fa-fw'></i> {{$materia->name}}</a>
                    <ul class="treeview-menu" data-id="{{ $materia->id}}">
                         <a href="{{$materia->id}}" id="almId" Style="display:none"></a>
                         <a href="{{ route('idUnidad')}}" id="idUnidadAlm" Style="display:none"></a>
                         <a href="{{ route('idSubtemas')}}" id="idSubtemasAlm" Style="display:none"></a>
                        <li><a href="{{ route('act', $materia)}}" id="almUni">Herramientas</a></li>
                        <li><a href="{{route('listExamen', $materia )}}" id="Lexamen">Lista de examenes</a></li>
                        <li><a href="{{route('quizDocente.show', $materia )}}" id="Rexamen">Evalua tu Docente</a></li>
                        <li><a href="{{ route('allTutorial')}}" id="almTutorial">Tutoriales</a></li>
                        <li><a href="{{ route('listplan', $materia)}}" id="almUnidadList"><i class='fa fa-plus fa-fw'></i>Base Teórica</a>
                        <ul class="treeview-menu" id="AlmuniList"></ul> 
                        <li><a href="{{ route('forosMateria', $materia)}}" id="foroMateria"><i class='fa fa-plus fa-fw'></i>Foros</a>
                         <ul class="treeview-menu" id="foroList"></ul>  
                 
                    </li>
                    </ul>
                    </li> 
                    
                </ul>
                     @endforeach 
                 @endforeach
            </li>
        </ul><!-- /.sidebar-menu -->
        @endif
         @if(Auth::user()->is('adm'))
        <ul class="sidebar-menu">
            <li class="header">Administrador</li>
            <!-- Optionally, you can add icons to the links -->
                <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Reportes</span><i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                     <li><a href="{{ route('plc.index') }}" id="planeacionAdm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Planeaciones</a></li>
                     <li><a href="{{ route('reporteGeneralDoc') }}" id="rptGenDoc"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Reporte General</a></li>
                     <li><a href="{{ route('listMateriasDocente') }}" id="listaEPD"><i class="fa fa-database" aria-hidden="true"></i>Reporte Examen Docente</a></li>
                  </ul>
                </li>
                <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Herramientas</span><i class="fa fa-angle-left pull-right"></i></a>
                
                <ul class="treeview-menu">
                    <li><a href="{{ route('tutorial')}}" id="admin"><i class="fa fa-film"></i> Subir tutoriales</a></li>
                    <li><a href="{{ route('allTutorial')}}" id="listTutorial"><i class="fa fa-file-video-o"></i> Lista de tutoriales</a></li>
                    <li><a href="{{ route('examenDocente.create') }}" id="evaDocente"><i class="fa fa-laptop" aria-hidden="true"></i> Evaluacion Docente</a></li>
                    <li><a href="{{ route('recursoStore') }}" id="recursos"><i class="fa fa-file-archive-o" aria-hidden="true"></i> Recursos</a></li>
                
                <li><a href="#"><i class='fa fa-plus fa-fw'></i> Administracion</a>
                                      
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin.create')}}" id="Cusuario">Crear usuario</a></li>
                        <li><a href="{{route('role.create')}}" id="Croles">Crear role</a></li>
                         <li><a href="{{route('foro')}}" id="foroAdm">Crear foro</a></li>
                        <li><a href="{{route('carrera.create')}}" id="planAdm">Crear Plan</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class='fa fa-plus fa-fw'></i> Informes</a>
                                      
                                      <ul class="treeview-menu">
                                       <li><a href="{{route('admin.index')}}" id="listaP">Lista de Personal</a></li>
                                       <li><a href="{{route('listForo')}}" id="listForoadm">Lista de Foros</a></li>
                                       <li><a href="{{route('carrera.index')}}" id ="lstCrra">Lista de carreras</a></li>
                                       <li><a href="{{ route('listexaDocente') }}" id ="docenteListexa">Lista de examen</a></li>
                                       <li><a href="{{ route('recursoIndex') }}" id ="listRecurso">Lista de recurso</a></li>
                                      </ul>
                                </li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
        @endif
    </section>
    <!-- /.sidebar -->
</aside>


