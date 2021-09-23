<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Cashier']);
        $role1 = Role::create(['name' => 'Client']);
        /* $role2 = ContractsRole::create(['name' => 'Admin2',
                                'name'=>'admin',
                                'special'=>'all-access']); */
        //Users
        Permission::create([
            'name'          => 'users.index',
            'description'   => 'Lista y navega todos los usuarios del sistema',
        ])->assignRole($role1);

        Permission::create([
            'name'          => 'users.create',
            'description'   => 'Podría crear nuevos usuarios en el sistema',
        ])->assignRole($role1);

        Permission::create([
            'name'          => 'users.show',
            'description'   => 'Ve en detalle cada usuario del sistema',            
        ])->assignRole($role1);
        
        Permission::create([
            'name'          => 'users.edit',
            'description'   => 'Podría editar cualquier dato de un usuario del sistema',
        ])->assignRole($role1);
        
        Permission::create([
            'name'          => 'users.destroy',
            'description'   => 'Podría eliminar cualquier usuario del sistema',      
        ])->assignRole($role1);

        //Roles
        Permission::create([
            'name'          => 'roles.index',
            'description'   => 'Lista y navega todos los roles del sistema',
        ])->assignRole($role1);

        Permission::create([
            'name'          => 'roles.show',
            'description'   => 'Ve en detalle cada rol del sistema',            
        ])->assignRole($role1);
        
        Permission::create([
            'name'          => 'roles.create',
            'description'   => 'Podría crear nuevos roles en el sistema',
        ])->assignRole($role1);
        
        Permission::create([
            'name'          => 'roles.edit',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ])->assignRole($role1);
        
        Permission::create([
            'name'          => 'roles.destroy',
            'description'   => 'Podría eliminar cualquier rol del sistema',      
        ])->assignRole($role1);



        Permission::create([
            'name'=>'categories.index',
            'description'=>'Lista y navega por todos los categorías del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'categories.show',
            'description'=>'Ver en detalle cada categoría del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'categories.edit',
            'description'=>'Editar cualquier dato de un categoría del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'categories.create',
            'description'=>'Crea cualquier dato de una categoría del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'categories.destroy',
            'description'=>'Eliminar cualquier dato de una categoría del sistema.',
        ])->assignRole($role1);

        Permission::create([
            'name' => 'subcategories.index',
            'description' => 'Lista y navega por todos los subcategorías del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name' => 'subcategories.show',
            'description' => 'Ver en detalle cada subcategoría del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name' => 'subcategories.edit',
            'description' => 'Editar cualquier dato de un subcategoría del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name' => 'subcategories.create',
            'description' => 'Crea cualquier dato de una subcategoría del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name' => 'subcategories.destroy',
            'description' => 'Eliminar cualquier dato de una subcategoría del sistema.',
        ])->assignRole($role1);

        
        Permission::create([
            'name'=>'clients.index',
            'description'=>'Lista y navega por todos los clientes del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'clients.show',
            'description'=>'Ver en detalle cada cliente del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'clients.edit',
            'description'=>'Editar cualquier dato de un cliente del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'clients.create',
            'description'=>'Crea cualquier dato de un cliente del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'clients.destroy',
            'description'=>'Eliminar cualquier dato de un cliente del sistema.',
        ])->assignRole($role1);

          

        Permission::create([
            'name'=>'products.index',
            'description'=>'Lista y navega por todos los productos del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'products.show',
            'description'=>'Ver en detalle cada producto del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'products.edit',
            'description'=>'Editar cualquier dato de un producto del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'products.create',
            'description'=>'Crea cualquier dato de un producto del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'products.destroy',
            'description'=>'Eliminar cualquier dato de un producto del sistema.',
        ])->assignRole($role1);


           
        Permission::create([
            'name'=>'providers.index',
            'description'=>'Lista y navega por todos los proveedores del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'providers.show',
            'description'=>'Ver en detalle cada proveedor del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'providers.edit',
            'description'=>'Editar cualquier dato de un proveedor del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'providers.create',
            'description'=>'Crea cualquier dato de un proveedor del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'providers.destroy',
            'description'=>'Eliminar cualquier dato de un proveedor del sistema.',
        ])->assignRole($role1);

        
        Permission::create([
            'name'=>'purchases.index',
            'description'=>'Lista y navega por todos los compras del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'purchases.show',
            'description'=>'Ver en detalle cada compra del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'purchases.create',
            'description'=>'Crea cualquier dato de un compra del sistema.',
        ])->assignRole($role1);

         
        Permission::create([
            'name'=>'sales.index',
            'description'=>'Lista y navega por todos los ventas del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'sales.show',
            'description'=>'Ver en detalle cada venta del sistema.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'sales.create',
            'description'=>'Crea cualquier dato de un venta del sistema.',
        ])->assignRole($role1);


        Permission::create([
            'name'=>'purchases.pdf',
            'description'=>'Puede descargar todos los reportes de las compras en PDF.',
        ])->assignRole($role1);


        Permission::create([
            'name'=>'sales.pdf',
            'description'=>'Puede descargar todos los reportes de las ventas en PDF.',
        ])->assignRole($role1);

        Permission::create([
            'name'=>'sales.print',
            'description'=>'Puede imprimir boletas de todas las ventas.',
        ])->assignRole($role1);



        Permission::create([
            'name'=>'business.index',
            'description'=>'Navega por los datos de la empresa.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'business.edit',
            'description'=>'Editar cualquier dato de la empresa.',
        ])->assignRole($role1);

        Permission::create([
            'name'=>'printers.index',
            'description'=>'Navega por los datos de la impresora.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'printers.edit',
            'description'=>'Editar cualquier dato de la impresora.',
        ])->assignRole($role1);

        Permission::create([
            'name'=>'upload.purchases',
            'description'=>'Puede subir comprobantes de una compra.',
        ])->assignRole($role1);

        Permission::create([
            'name'=>'change.status.products',
            'description'=>'Permite cambiar el estado de un producto.',
        ])->assignRole($role1);

        Permission::create([
            'name'=>'change.status.purchases',
            'description'=>'Permite cambiar el estado de un compra.',
        ])->assignRole($role1);

        Permission::create([
            'name'=>'change.status.sales',
            'description'=>'Permite cambiar el estado de un venta.',
        ])->assignRole($role1);


        Permission::create([
            'name'=>'reports.day',
            'description'=>'Permite ver los reportes de ventas por día.',
        ])->assignRole($role1);
        Permission::create([
            'name'=>'reports.date',
            'description'=>'Permite ver los reportes por un rango de fechas de las ventas.',
        ])->assignRole($role1);

    }
}
