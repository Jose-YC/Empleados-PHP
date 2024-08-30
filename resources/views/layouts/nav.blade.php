<div class="sidebar-menu">

    @can('panel.Abastecimiento')
        <ul class="menu">
            <li class="sidebar-title">Abastecimiento</li>
            <li class="sidebar-item active">
                <x-headernav :headerlinks="'Dashboard'" :icons="'bi-grid-fill'" :links="'/'" />
            </li>
            <li class="sidebar-item has-sub">
                <x-headernav :headerlinks="'Almacen'" :icons="'bi-building'" />

                <x-list :links="[
                    [
                        'link' => 'productos.index',
                        'nombre' => 'Todos',
                        'active' => true,
                        'active1' => true,
                        'clave' => 'id',
                        'valor' => '0',
                        'permiso' => 'productos.index',
                    ],
                    [
                        'link' => 'productos.index',
                        'nombre' => 'Combustibles',
                        'active' => true,
                        'active1' => true,
                        'clave' => 'id',
                        'valor' => '1',
                        'permiso' => 'productos.index',
                    ],
                    [
                        'link' => 'productos.index',
                        'nombre' => 'Repuestos',
                        'active' => true,
                        'active1' => true,
                        'clave' => 'id',
                        'valor' => '2',
                        'permiso' => 'productos.index',
                    ],
                    [
                        'link' => 'productos.index',
                        'nombre' => 'Lubricantes',
                        'active' => true,
                        'active1' => true,
                        'clave' => 'id',
                        'valor' => '3',
                        'permiso' => 'productos.index',
                    ],
                    [
                        'link' => 'productos.index',
                        'nombre' => 'Accesorios',
                        'active' => true,
                        'active1' => true,
                        'clave' => 'id',
                        'valor' => '4',
                        'permiso' => 'productos.index',
                    ],
                ]" />
            </li>

            <li class="sidebar-item has-sub">
                <x-headernav :headerlinks="'Solicitudes de abastecimiento'" :icons="'bi-building'" />
                <x-list :links="[
                    [
                        'link' => 'solicituds.index',
                        'nombre' => 'Solicitudes',
                        'active' => true,
                        'permiso' => 'solicituds.index',
                    ],
                ]" />
            </li>
        </ul>
    @endcan

    @can('panel.Compras')
        <ul class="menu">
            <li class="sidebar-title">Compras</li>
            <li class="sidebar-item active">
                <x-headernav :headerlinks="'Dashboard'" :icons="'bi-grid-fill'" :links="'/'" />
            </li>
            <li class="sidebar-item has-sub">
                <x-headernav :headerlinks="'Pedidos'" :icons="'bi-building'" />
                <x-list :links="[
                    [
                        'link' => 'orden-compras.index',
                        'nombre' => 'Pedidos',
                        'active' => true,
                        'permiso' => 'orden-compras.index',
                    ],
                ]" />
            </li>
            <li class="sidebar-item has-sub">


                <x-headernav :headerlinks="'Proveedores'" :icons="'bi-building'" />
                <x-list :links="[
                    [
                        'link' => 'proveedores.index',
                        'nombre' => 'Proveedores',
                        'active' => true,
                        'permiso' => 'proveedores.index',
                    ],
                ]" />
            </li>
            <li class="sidebar-item has-sub">
                <x-headernav :headerlinks="'Solicitudes'" :icons="'bi-building'" />
                <x-list :links="[
                    [
                        'link' => 'solicituds.index',
                        'nombre' => 'Solicitudes',
                        'active' => true,
                        'permiso' => 'solicituds.index',
                    ],
                ]" />
            </li>


        </ul>
    @endcan
    @can('panel.Finanzas')
        <ul class="menu">
            <li class="sidebar-title">Finanzas</li>
            <li class="sidebar-item active">
                <x-headernav :headerlinks="'Dashboard'" :icons="'bi-grid-fill'" :links="'/'" />
            </li>
            <li class="sidebar-item has-sub">
                <x-headernav :headerlinks="'Reportes'" :icons="'bi-building'" />
                <x-list :links="[
                    [
                        'link' => 'documentos-contables.index',
                        'nombre' => 'Reportes',
                        'active' => true,
                        'permiso' => 'solicituds.index',
                    ],
                ]" />
            </li>
            <li class="sidebar-item has-sub">
                <x-headernav :headerlinks="'Comprobantes'" :icons="'bi-building'" />
                <x-list :links="[
                    [
                        'link' => 'tipo-pagos.index',
                        'nombre' => 'Tipo de  pago',
                        'active' => true,
                        'permiso' => 'solicituds.index',
                    ],
                    [
                        'link' => 'tipo-comprobante-ventas.index',
                        'nombre' => 'tipo de comprobante',
                        'active' => true,
                        'permiso' => 'solicituds.index',
                    ],
                ]" />
            </li>
            <li class="sidebar-item has-sub">
                <x-headernav :headerlinks="'Solicitudes'" :icons="'bi-building'" />
                <x-list :links="[
                    [
                        'link' => 'solicituds.index',
                        'nombre' => 'Solicitudes',
                        'active' => true,
                        'permiso' => 'solicituds.index',
                    ],
                ]" />
            </li>


        </ul>
    @endcan
    @can('panel.Ventas')
        <ul class="menu">
            <li class="sidebar-title">Ventas</li>
            <li class="sidebar-item active">
                <x-headernav :headerlinks="'Dashboard'" :icons="'bi-grid-fill'" :links="'/'" />
            </li>
            <li class="sidebar-item has-sub">
                <x-headernav :headerlinks="'Ventas'" :icons="'bi-building'" />
                <x-list :links="[
                    ['link' => 'ventas.index', 'nombre' => 'Ventas', 'active' => true, 'permiso' => 'solicituds.index'],
                ]" />
            </li>


        </ul>
    @endcan
    @can('panel.Adminstrar')
        <ul class="menu">
            <li class="sidebar-title">Administrar</li>
            <li class="sidebar-item active">
                <x-headernav :headerlinks="'Dashboard'" :icons="'bi-grid-fill'" :links="'/'" />
            </li>
            <li class="sidebar-item has-sub">
                <x-headernav :headerlinks="'Empleados'" :icons="'bi-building'" />
                <x-list :links="[
                    [
                        'link' => 'empleados.index',
                        'nombre' => 'Usuarios',
                        'active' => true,
                        'permiso' => 'solicituds.index',
                    ],
                    [
                        'link' => 'roles.index',
                        'nombre' => 'Roles',
                        'active' => true,
                        'active1' => true,
                        'clave' => 'id',
                        'valor' => '0',
                        'permiso' => 'roles.index',
                    ],
                    [ 'link' => 'permisos.index',
                        'nombre' => 'Permisos',
                        'active' => true,
                        'active1' => true,
                        'clave' => 'id',
                        'valor' => '0'
                        , 'permiso' => 'permisos.index'],
                ]" />
            </li>


        </ul>
    @endcan
    @can('panel.Seguridad')
        <ul class="menu">
            <li class="sidebar-title">Seguridad</li>
            <li class="sidebar-item active">
                <x-headernav :headerlinks="'Dashboard'" :icons="'bi-grid-fill'" :links="'/'" />
            </li>
            <li class="sidebar-item has-sub">
                <x-headernav :headerlinks="'Capacitacion '" :icons="'bi-building'" />
                <x-list :links="[
                    [
                        'link' => 'capacitacions.index',
                        'nombre' => 'Nueva capacitacion',
                        'active' => true,
                        'permiso' => 'solicituds.index',
                    ],
                ]" />
            </li>
            <li class="sidebar-item has-sub">
                <x-headernav :headerlinks="'Departamento '" :icons="'bi-building'" />
                <x-list :links="[
                    [
                        'link' => 'departamentos.index',
                        'nombre' => 'Departamento',
                        'active' => true,
                        'permiso' => 'solicituds.index',
                    ],
                ]" />
            </li>
            {{-- <li class="sidebar-item has-sub">
            <x-headernav :headerlinks="'Asistecia'" :icons="'bi-building'" />
            <x-list :links="[['link' => 'asistencias.index', 'nombre' => 'Registrar Asistencia', 'active' => true]]" />
        </li> --}}



        </ul>
    @endcan

</div>
