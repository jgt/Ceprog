<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu ajustes2">
            <li class="header text-uppercase text-green"><h3>Menu</h3></li>

            <!-- Optionally, you can add icons to the links -->
            <li class="{{ Active::pattern('admin')}} prueba icono"><a href="/admin"><span class="icon-home"></span> Home</a></li>
            <li class="{{ Active::pattern('admin/users') }} prueba treeview">
                <a href="#">
                    <span class="icon-users"> Usuarios</span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li class="icono"><a href=""><span class="icon-chevron-thin-right"></span> Ir a Usuarios</a></li>
                    <li class="icono"><a href=""><span class="icon-add-user"></span> Crear Usuario</a></li>
                </ul>
            </li>
            <li class="{{ Active::pattern('admin/especialistas') }} prueba treeview">
                <a href="#">
                    <span class="icon-health"> Especialistas</span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li class="icono"><a href=""><span class="icon-chevron-thin-right"></span> Ir a Especialistas</a></li>
                </ul>
            </li>
            <li class="{{ Active::pattern('admin/insumos')}} prueba treeview">
                <a href="#">
                    <span class="icon-lab"> Insumos</span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li class="icono"><a href=""><span class="icon-chevron-thin-right"></span> Ir a Insumos</a></li>
                    <li class="icono {{ Active::pattern('admin/insumos/create') }}"><a href=""><span class="icon-circle-with-plus"></span> Crear Insumo</a></li>
                </ul>
            </li>
            <li class="{{ Active::pattern('admin/facturas') }} prueba treeview">
                <a href="#" class="icono">
                    <span class="icon-clipboard"> Facturas</span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li class="icono"><a href=""><span class="icon-chevron-thin-right"></span> Ir a Facturas</a></li>
                    <li class="icono"><a href=""><span class="icon-circle-with-plus"></span> Ingresar factura</a></li>
                </ul>
            </li>
            <li class="{{ Active::pattern('admin/proveedores') }} prueba treeview">
                <a href="#">
                    <span class="icon-user-tie"> Proveedores</span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li class="icono"><a href=""><span class="icon-chevron-thin-right"></span> Ir a Proveedores</a></li>
                    <li class="icono"><a href=""><span class="icon-circle-with-plus"></span> Crear Proveedor</a></li>
                </ul>
            </li>
            <li class="{{ Active::pattern('admin/especialidades') }} prueba treeview">
                <a href="#">
                    <span class="icon-briefcase"> Especialidades</span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li class="icono"><a href=""><span class="icon-chevron-thin-right"></span> Ir a Especialidades</a></li>
                    <li class="icono"><a href=""><span class="icon-circle-with-plus"></span> Crear Especialidad</a></li>
                </ul>
            </li>
            <li class="{{ Active::pattern('admin/agendar') }} prueba treeview">
                <a href="#">
                    <span class="icon-calendar"> Agendar</span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li class="icono"><a href="/admin/agendar/{{ Carbon\Carbon::now()->toDateString()}}"><span class="icon-chevron-thin-right"></span> Agendar Cita</a></li>
                </ul>
            </li>
            
            <li class="{{ Active::pattern('admin/pdf') }} prueba treeview">
                <a href="#">
                    <span class="icon-clipboard2"> Reportes</span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li class="">
                        <a href="#">
                            <span class="icon-user"> Usuarios</span>
                        </a>
                        <ul class="treeview-menu" style="display: none;">
                            <li class="icono"><a href=""><span class="icon-eye"></span> Ver Documento</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#">
                            <span class="icon-user-tie"> Proveedores</span>
                        </a>
                        <ul class="treeview-menu" style="display: none;">
                            <li class="icono"><a href=""><span class="icon-eye"></span> Ver Documento</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#">
                            <span class="icon-lab"> Insumos</span>
                        </a>
                        <ul class="treeview-menu" style="display: none;">
                            <li class="icono"><a href="" target="_blank"><span class="icon-eye"></span> Ver Documento</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>