<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  Spatie\Permission\Models\Role;
use  Spatie\Permission\Models\Permission;

class RolesyPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //roles para el area de abastecimineto :
        //Super Usuarios
        $role = Role::create(['name' => 'admin']);
        //roles por departamento
        $role1 = Role::create(['name' => 'Abastecimiento']);
        $role2 = Role::create(['name' => 'Compras']);
        $role3 = Role::create(['name' => 'Finanzas']);
        $role4 = Role::create(['name' => 'Ventas']);
        $role5 = Role::create(['name' => 'Adminstrar']);
        $role6 = Role::create(['name' => 'Seguridad']);

        //*roles actor
        $role7 = Role::create(['name' => 'Supervisor']);
        $role8 = Role::create(['name' => 'Jefe Comercial']);
        $role9 = Role::create(['name' => 'Jefe Finanzas']);
        $role10 = Role::create(['name' => 'Gerente General']);
        //roles actor de venta y finanzas
        $role11 = Role::create(['name' => 'Contador']);
        $role12 = Role::create(['name' => 'Vendedor']);
        $role13 = Role::create(['name' => 'Jefe de Personal']);
        //roles actor de seguridad
        $role14 = Role::create(['name' => 'Jefe Seguridad']);
        $role15 = Role::create(['name' => 'Brigadista']);
        $role16 = Role::create(['name' => 'Prevencionista']);

//---------------------------------------------------------------------------------------------------------------
        //permisos
        Permission::create(['name' => 'panel.Abastecimiento'])->syncRoles([$role1, $role7, $role8, $role9, $role10, $role]);
        Permission::create(['name' => 'panel.Compras'])->syncRoles([$role2, $role]);
        Permission::create(['name' => 'panel.Finanzas'])->syncRoles([$role3, $role]);
        Permission::create(['name' => 'panel.Ventas'])->syncRoles([$role4, $role]);
        Permission::create(['name' => 'panel.Adminstrar'])->syncRoles([$role5, $role]);
        Permission::create(['name' => 'panel.Seguridad'])->syncRoles([$role6, $role]);

        //Todo lo que puede hacer el supervisor en el area de abastecimiento OJO EL GERENTE TAMBIEN
        //* Productos:
        Permission::create(['name' => 'productos.index'])->syncRoles([$role7, $role, $role10]);
        Permission::create(['name' => 'productos.create'])->syncRoles([$role7, $role, $role10]);
        Permission::create(['name' => 'productos.show'])->syncRoles([$role7, $role, $role10]);
        Permission::create(['name' => 'productos.edit'])->syncRoles([$role7, $role, $role10]);
        Permission::create(['name' => 'productos.destroy'])->syncRoles([$role7, $role, $role10]);
        //*Solicitudes:
        Permission::create(['name' => 'solicituds.index'])->syncRoles([$role7, $role, $role10,$role9]);
        Permission::create(['name' => 'solicituds.create'])->syncRoles([$role7, $role, $role10,$role9]);
        Permission::create(['name' => 'solicituds.show'])->syncRoles([$role7, $role, $role10,$role9]);
        Permission::create(['name' => 'solicituds.edit'])->syncRoles([$role7, $role, $role10,$role9]);
        Permission::create(['name' => 'solicituds.destroy'])->syncRoles([$role7, $role, $role10,$role9]);
        //*Ventas:
        Permission::create(['name' => 'ventas.index'])->syncRoles([$role]);
        Permission::create(['name' => 'ventas.create'])->syncRoles([$role]);
        Permission::create(['name' => 'ventas.show'])->syncRoles([$role]);
        Permission::create(['name' => 'ventas.edit'])->syncRoles([$role]);
        Permission::create(['name' => 'ventas.destroy'])->syncRoles([$role]);
        //*Finanzas:
        Permission::create(['name' => 'documentos-contables.index'])->syncRoles([$role]);
        Permission::create(['name' => 'documentos-contables.create'])->syncRoles([$role]);
        Permission::create(['name' => 'documentos-contables.show'])->syncRoles([$role]);
        Permission::create(['name' => 'documentos-contables.edit'])->syncRoles([$role]);
        Permission::create(['name' => 'documentos-contables.destroy'])->syncRoles([$role]);
        Permission::create(['name' => 'tipo-pagos.index'])->syncRoles([$role]);
        Permission::create(['name' => 'tipo-pagos.create'])->syncRoles([$role]);
        Permission::create(['name' => 'tipo-pagos.show'])->syncRoles([$role]);
        Permission::create(['name' => 'tipo-pagos.edit'])->syncRoles([$role]);
        Permission::create(['name' => 'tipo-pagos.destroy'])->syncRoles([$role]);
        Permission::create(['name' => 'tipo-comprobante-ventas.index'])->syncRoles([$role]);
        Permission::create(['name' => 'tipo-comprobante-ventas.create'])->syncRoles([$role]);
        Permission::create(['name' => 'tipo-comprobante-ventas.show'])->syncRoles([$role]);
        Permission::create(['name' => 'tipo-comprobante-ventas.edit'])->syncRoles([$role]);
        Permission::create(['name' => 'tipo-comprobante-ventas.destroy'])->syncRoles([$role]);
        //*Seguridad:
        Permission::create(['name' => 'capacitacions.index'])->syncRoles([$role]);
        Permission::create(['name' => 'capacitacions.create'])->syncRoles([$role]);
        Permission::create(['name' => 'capacitacions.show'])->syncRoles([$role]);
        Permission::create(['name' => 'capacitacions.edit'])->syncRoles([$role]);
        Permission::create(['name' => 'capacitacions.destroy'])->syncRoles([$role]);
        Permission::create(['name' => 'departamentos.index'])->syncRoles([$role]);
        Permission::create(['name' => 'departamentos.create'])->syncRoles([$role]);
        Permission::create(['name' => 'departamentos.show'])->syncRoles([$role]);
        Permission::create(['name' => 'departamentos.edit'])->syncRoles([$role]);
        Permission::create(['name' => 'departamentos.destroy'])->syncRoles([$role]);
        Permission::create(['name' => 'empleados.index'])->syncRoles([$role]);
        Permission::create(['name' => 'empleados.create'])->syncRoles([$role]);
        Permission::create(['name' => 'empleados.show'])->syncRoles([$role]);
        Permission::create(['name' => 'empleados.edit'])->syncRoles([$role]);
        Permission::create(['name' => 'empleados.destroy'])->syncRoles([$role]);

        Permission::create(['name' => 'roles.index'])->syncRoles([$role]);
        Permission::create(['name' => 'roles.create'])->syncRoles([$role]);
        Permission::create(['name' => 'roles.show'])->syncRoles([$role]);
        Permission::create(['name' => 'roles.edit'])->syncRoles([$role]);
        Permission::create(['name' => 'roles.destroy'])->syncRoles([$role]);

        Permission::create(['name' => 'permisos.index'])->syncRoles([$role]);
        Permission::create(['name' => 'permisos.create'])->syncRoles([$role]);
        Permission::create(['name' => 'permisos.show'])->syncRoles([$role]);
        Permission::create(['name' => 'permisos.edit'])->syncRoles([$role]);
        Permission::create(['name' => 'permisos.destroy'])->syncRoles([$role]);
        //*Compras:
        Permission::create(['name' => 'orden-compras.index'])->syncRoles([$role]);
        Permission::create(['name' => 'orden-compras.create'])->syncRoles([$role]);
        Permission::create(['name' => 'orden-compras.show'])->syncRoles([$role]);
        Permission::create(['name' => 'orden-compras.edit'])->syncRoles([$role]);
        Permission::create(['name' => 'orden-compras.destroy'])->syncRoles([$role]);
        Permission::create(['name' => 'proveedores.index'])->syncRoles([$role]);
        Permission::create(['name' => 'proveedores.create'])->syncRoles([$role]);
        Permission::create(['name' => 'proveedores.show'])->syncRoles([$role]);
        Permission::create(['name' => 'proveedores.edit'])->syncRoles([$role]);
        Permission::create(['name' => 'proveedores.destroy'])->syncRoles([$role]);
    }
}
