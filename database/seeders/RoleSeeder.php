<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'Admin']);

        Permission::create(['name' => 'admin.home','description' => 'Ver panel de administración'])->syncRoles($admin);

        Permission::create(['name' => 'admin.documentos.index','description' => 'Ver lista de documentos'])->syncRoles($admin);
        Permission::create(['name' => 'admin.documentos.create','description' => 'Registrar documentos'])->syncRoles($admin);
        Permission::create(['name' => 'admin.documentos.edit','description' => 'Editar documentos'])->syncRoles($admin);
        Permission::create(['name' => 'admin.documentos.show','description' => 'Ver detalle del documento'])->syncRoles($admin);

        Permission::create(['name' => 'admin.organismos.index','description' => 'Ver lista de organismos'])->syncRoles($admin);
        Permission::create(['name' => 'admin.organismos.create','description' => 'Registrar organismos'])->syncRoles($admin);
        Permission::create(['name' => 'admin.organismos.edit','description' => 'Editar organismos'])->syncRoles($admin);
        Permission::create(['name' => 'admin.organismos.delete','description' => 'Eliminar organismos'])->syncRoles($admin);

        Permission::create(['name' => 'admin.instituciones.index','description' => 'Ver lista de instituciones'])->syncRoles($admin);
        Permission::create(['name' => 'admin.instituciones.create','description' => 'Registrar instituciones'])->syncRoles($admin);
        Permission::create(['name' => 'admin.instituciones.edit','description' => 'Editar instituciones'])->syncRoles($admin);
        Permission::create(['name' => 'admin.instituciones.delete','description' => 'Eliminar instituciones'])->syncRoles($admin);

        Permission::create(['name' => 'admin.temas.index','description' => 'Ver lista de temas'])->syncRoles($admin);
        Permission::create(['name' => 'admin.temas.create','description' => 'Registrar temas'])->syncRoles($admin);
        Permission::create(['name' => 'admin.temas.edit','description' => 'Editar temas'])->syncRoles($admin);
        Permission::create(['name' => 'admin.temas.delete','description' => 'Eliminar temas'])->syncRoles($admin);

        Permission::create(['name' => 'admin.tiposdocumentos.index','description' => 'Ver lista de tipos documento'])->syncRoles($admin);
        Permission::create(['name' => 'admin.tiposdocumentos.create','description' => 'Registrar tipos documento'])->syncRoles($admin);
        Permission::create(['name' => 'admin.tiposdocumentos.edit','description' => 'Editar tipos documento'])->syncRoles($admin);
        Permission::create(['name' => 'admin.tiposdocumentos.delete','description' => 'Eliminar tipos documento'])->syncRoles($admin);

        Permission::create(['name' => 'admin.users.index','description' => 'Ver lista de usuarios'])->syncRoles($admin);
        Permission::create(['name' => 'admin.users.edit','description' => 'Editar usuarios'])->syncRoles($admin);
        Permission::create(['name' => 'admin.users.delete','description' => 'Eliminar usuarios'])->syncRoles($admin);

        Permission::create(['name' => 'admin.roles.index','description' => 'Ver lista de roles'])->syncRoles($admin);
        Permission::create(['name' => 'admin.roles.create','description' => 'Registrar roles'])->syncRoles($admin);
        Permission::create(['name' => 'admin.roles.edit','description' => 'Editar roles'])->syncRoles($admin);
        Permission::create(['name' => 'admin.roles.delete','description' => 'Eliminar roles'])->syncRoles($admin);
    }
}
