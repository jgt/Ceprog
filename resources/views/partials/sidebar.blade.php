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
                  
                    <li><a href="{{ route('plc.show', $materia)}}" id="plcMaestro"><i class="fa fa-file-word-o" aria-hidden="true"></i> Subir Planeación </a></li>
                   
                    <li><a href="#"><i class="fa fa-book" aria-hidden="true"></i>Semanas</a>
                      <ul class="treeview-menu">
                        @foreach($materia->unidades as $unidad)
                          <li><a href="#"><i class='fa fa-plus fa-fw'></i> {{$unidad->unidad}}</a>
                          <ul class="treeview-menu">

                            <li><a href="{{ route('uploadsVideo', $unidad) }}" id="upldVideo" unidad="{{$unidad->id}}" name="{{$unidad->unidad}}"><i class="fa fa-file-video-o" aria-hidden="true"></i> Subir video</a></li>

                            <li><a href="{{ route('pdfUndprf', $unidad) }}" id="pdfPrf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Pdf</a></li>

                            <li><a href="{{ route('verPaquete', $unidad) }}" id="verPaquete"><i class="fa fa-eye" aria-hidden="true"></i> Ver semana</a></li>

                            <li><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Actividades</a>
                              <ul class="treeview-menu">
                                @foreach($unidad->actividades as $actividad)
                                    <li><a href="#"><i class='fa fa-plus fa-fw'></i> {{$actividad->actividad}}</a>
                                      <ul class="treeview-menu">

                                        <li><a href="{{ route('verAct', $actividad) }}" id="verAct"><i class="fa fa-eye" aria-hidden="true"></i> Ver actividad</a></li>

                                        <li><a href="{{ route('pdfActMaestro', $actividad) }}" id="actMaestro"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Pdf</a></li>

                                        <li><a href="{{ route('calificarAlm', $actividad) }}" id="pqtCal"><i class="fa fa-users" aria-hidden="true"></i> Alumnos</a></li>

                                        <li><a href="{{ route('uploadsApoyo', $actividad) }}" id="udpApoyo" name="{{Auth::user()->name}}" user="{{Auth::user()->id}}" actividad="{{$actividad->id}}"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Subir archivo</a></li>

                                    </ul>

                                    </li>
                                @endforeach
                              </ul>
                            </li>
                          </ul>
                          </li>
                        @endforeach
                      </ul>
                    </li>
                    <li><a href="{{ route('listPlaneacion', $materia) }}" id="mtaPlan"><i class="fa fa-search-plus" aria-hidden="true"></i> Lista de Planeaciones</a></li>

                    <li><a href="{{ route('mtaExmlist', $materia) }}" id="exmList"><<i class="fa fa-tasks" aria-hidden="true"></i> Lista de Examenes</a></li>
                    
                    <li><a href="{{route('recursoIndex')}}" id="recursosMaestro"><i class="fa fa-wrench" aria-hidden="true"></i> Lista Recursos</a></li>

                    <li><a href="{{ route('allTutorial')}}" id="prfTutorial"><i class="fa fa-video-camera" aria-hidden="true"></i> Tutoriales</a></li>

                <li><a href="{{ route('forosMateria', $materia)}}" id="foroMateria"><i class='fa fa-plus fa-fw'></i>Chat</a>
                         <ul class="treeview-menu" id="foroList"></ul>  
                </li>
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
                
                <ul class="treeview-menu">
                  <li><a href="{{ route('diagAlm', $semestre->carrera->id) }}" id="almEva"><i class="fa fa-circle" aria-hidden="true"></i> Examen diagnostico</a></li>
                </ul>

                @foreach($semestre->materias as $materia)
                <ul class="treeview-menu">

                 <li><a href="#"><i class='fa fa-plus fa-fw'></i> {{$materia->name}}</a>
                    <ul class="treeview-menu" data-id="{{ $materia->id}}">
                  
                        <li><a href="#"><i class="fa fa-book" aria-hidden="true"></i> Semanas</a>
                         <ul class="treeview-menu">
                            @foreach($materia->unidades as $unidad)
                             
                              <li><a href=""><i class='fa fa-plus fa-fw'></i> {{$unidad->unidad}}</a>
                                  <ul class="treeview-menu">
                                    
                                    <li><a href="{{ route('verPaquete', $unidad) }}" id="verSemana"><i class="fa fa-eye" aria-hidden="true"></i> Ver semana</a></li>

                                    <li><a href="{{ route('promedio', $unidad) }}" id="ntoPdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Notas</a></li>

                                    <li><a href="{{ route('pdfUndprf', $unidad) }}" id="semPdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Semana</a></li>

                                    <li><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Actividades</a>
                                      <ul class="treeview-menu">
                                        @foreach($unidad->actividades as $actividad)
                                        <li><a href="#"><i class='fa fa-plus fa-fw'></i> {{$actividad->actividad}}</a>
                                            <ul class="treeview-menu">

                                              <li><a href="{{ route('activarAct', $actividad) }}" id="activarAct" name="{{Auth::user()->name}}" idUser="{{Auth::user()->id}}" actividadId="{{$actividad->id}}"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Responder</a></li>

                                              <li><a href="{{ route('verAct', $actividad) }}" id="seeAct"><i class="fa fa-eye" aria-hidden="true"></i> Ver actividad</a></li>

                                              <li><a href="{{ route('verNotaAlm', $actividad) }}" id="verNtoAlm"><i class="fa fa-file-text" aria-hidden="true"></i> Ver notas</a></li>

                                              <li><a href="{{ route('fileSend', $actividad) }}" id="fileSend"><i class="fa fa-folder-o" aria-hidden="true"></i> Documentos</a></li>

                                              <li><a href="{{ route('activarAct', $actividad) }}" id="actPdfAlm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Pdf</a></li>
                                            </ul>   
                                        </li>
                                        @endforeach
                                      </ul>
                                    </li>

                                  </ul>
                              </li>
                            @endforeach
                          </ul>
                        </li>

                        <li><a href="{{route('listExamen', $materia )}}" id="Lexamen">Lista de examenes</a></li>

                        <li><a href="{{ route('listPlaneacion', $materia) }}" id="listplcAlm">Planeacion</a></li>

                        <li><a href="{{route('quizDocente.show', $materia )}}" id="Rexamen">Evalua tu Docente</a></li>

                        <li><a href="{{ route('allTutorial')}}" id="almTutorial">Tutoriales</a></li>

                        <li><a href="{{ route('forosMateria', $materia)}}" id="foroMateria"><i class='fa fa-plus fa-fw'></i> Chat</a>
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
                <a href="#"><i class='fa fa-link'></i> <span>Herramientas</span><i class="fa fa-angle-left pull-right"></i></a>
                
                <ul class="treeview-menu">
                    <li><a href="{{ route('tutorial')}}" id="admin"><i class="fa fa-film"></i> Subir tutoriales</a></li>
                    <li><a href="{{ route('allTutorial')}}" id="listTutorial"><i class="fa fa-file-video-o"></i> Lista de tutoriales</a></li>
                    <li><a href="{{ route('examenDocente.create') }}" id="evaDocente"><i class="fa fa-laptop" aria-hidden="true"></i> Evaluacion Docente</a></li>
                    <li><a href="{{ route('recursoStore') }}" id="recursos"><i class="fa fa-file-archive-o" aria-hidden="true"></i> Recursos</a></li>
                
                <li><a href="#"><i class='fa fa-plus fa-fw'></i> Administracion</a>
                                      
                    <ul class="treeview-menu">
                        <li><a href="{{ route('siga') }}">SigaEdu</a></li>
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
        @if(Auth::user()->is('cdo'))
        <ul class="sidebar-menu">
            <li class="header">Cordinador</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Evaluacion Diagnostico</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                      <li><a href="{{ route('exaDiag') }}" id="exaDiag"><i class='fa fa-plus fa-fw'></i> Crear Evaluacion</a></li> 
                      <li><a href="{{ route('evdList') }}" id="listEvadig"><i class='fa fa-plus fa-fw'></i> Examenes Creados</a></li>      
                </ul>
             <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Reportes</span><i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                  <li><a href="#"><i class='fa fa-plus fa-fw'></i> Evaluacion Diagnostico</a>
                    
                    <ul class="treeview-menu">
                      <li><a href="{{ route('userDiag') }}" id="rptDiag"><i class="fa fa-folder" aria-hidden="true"></i>
                      Reporte por alumnos</a></li>
                      <li><a href=""><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                      Reporte por carreras</a></li>
                      
                    </ul>

                  </li>
                      <li><a href="#"><i class='fa fa-plus fa-fw'></i> Reporte Campus</a>
                          <ul class="treeview-menu">
                            @foreach($campus as $campu)
                              <li><a href="#"><i class="fa fa-university" aria-hidden="true"></i> {{$campu->nombre}}</a>
                              <ul class="treeview-menu">
                                <li><a href="{{ route('campusReporte', $campu) }}" id="campusReporte"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Opinión Estudiantil</a></li>
                                <li><a href="{{ route('almEncuesta', $campu) }}" id="almEncuesta"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Opiniones realizadas</a></li>
                              </ul>

                              </li>
                            @endforeach
                          </ul>

                      </li>
                     <li><a href="{{ route('plc.index') }}" id="planeacionAdm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Planeaciones</a></li>
                     <li><a href="{{ route('reporteGeneralDoc') }}" id="rptGenDoc"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Reporte General</a></li>
                     <li><a href="{{ route('listMateriasDocente') }}" id="listaEPD"><i class="fa fa-database" aria-hidden="true"></i>Reporte Examen Docente</a></li>
                  </ul>
                </li>
            <li class="treeview">
               <a href="#"><i class='fa fa-link'></i> <span>Herramientas</span><i class="fa fa-angle-left pull-right"></i></a>  
                  <ul class="treeview-menu">
                     <li><a href="#" id="crtDocente">Crear docente</a></li>
                     <li><a href="{{ route('cdoDocentes') }}" id="cdoListdocente">Lista de docentes</a></li>
                     <li><a href="#" id="rptSemestral">Reporte semestral</a></li>
                  </ul>
                </li>
                <li class="header">Materias del cordinador</li>
                @foreach($materias as $materia)
                 <li class="treeview">
                <a href="{{$materia->id}}" id="matId" style="display:none;"></a>
                <a href="{{ route('idUnidad')}}" id="idUnidad" style="display:none;"></a>
                <a href="{{ route('idSubtemas')}}" id="idSubtemas" style="display:none;"></a>

                <a href="#"><i class='fa fa-link'></i> <span>{{$materia->name}}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu" Style="display:none" data-id="{{ $materia->id}}">
                  
                <li><a href="{{ route('planeacion', $materia)}}" id="planeacion"><i class="fa fa-book" aria-hidden="true"></i> Crear paquete</a></li>

                <li><a href="{{ route('examen', $materia)}}" id="createExa">Crear Examen</a></li>

                <li><a href="{{route('listExamen', $materia )}}" id="LexamenMaestro">Lista de exámenes </a></li>

                 <li><a href="{{ route('almSem', $materia->id)}}" id="menuListUser">Lista de Alumnos</a></li>

                <li><a href="{{ route('listplan', $materia)}}" id="herramientas"><i class='fa fa-plus fa-fw'></i>Paquetes</a>
                      <ul class="treeview-menu" id="listUni"></ul>
                    </li>
                <li><a href="{{ route('listplan', $materia)}}" id="ListUniSub"><i class='fa fa-plus fa-fw'></i>Base Teórica</a>
                    <ul class="treeview-menu" id="nameUni"></ul> 
                </li>
                </ul>
                 @endforeach
        </ul><!-- /.sidebar-menu -->
        @endif
    </section>
    <!-- /.sidebar -->
</aside>


