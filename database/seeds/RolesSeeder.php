<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createUsersPermission = Permission::create(['name' => 'crear_usuarios']);
        $seeUsersPermission = Permission::create(['name' => 'ver_usuarios']);
        $editUsersPermission = Permission::create(['name' => 'editar_usuarios']);
        $deleteUsersPermission = Permission::create(['name' => 'eliminar_usuarios']);

        $createPostsPermission = Permission::create(['name' => 'crear_posts']);
        $seePostsPermission = Permission::create(['name' => 'ver_posts']);
        $editPostsPermission = Permission::create(['name' => 'editar_posts']);
        $deletePostsPermission = Permission::create(['name' => 'eliminar_posts']);
        $publishPostsPermission = Permission::create(['name' => 'publicar_posts']);

        $adminRole = Role::create(['name' => 'Administrador']);
        $adminRole->givePermissionTo('crear_usuarios');
        $adminRole->givePermissionTo('ver_usuarios');
        $adminRole->givePermissionTo('editar_usuarios');
        $adminRole->givePermissionTo('eliminar_usuarios');
        $adminRole->givePermissionTo('crear_posts');
        $adminRole->givePermissionTo('ver_posts');
        $adminRole->givePermissionTo('editar_posts');
        $adminRole->givePermissionTo('eliminar_posts');
        $adminRole->givePermissionTo('publicar_posts');

        $analistRole = Role::create(['name' => 'Analista']);
        $analistRole->givePermissionTo('crear_posts');
        $analistRole->givePermissionTo('ver_posts');
        $analistRole->givePermissionTo('editar_posts');
        $analistRole->givePermissionTo('eliminar_posts');
        $analistRole->givePermissionTo('publicar_posts');

        $writerRole = Role::create(['name' => 'Escritor']);
        $writerRole->givePermissionTo('crear_posts');
        $writerRole->givePermissionTo('ver_posts');

        $readerRole = Role::create(['name' => 'Lector']);
        $readerRole->givePermissionTo('ver_posts');
    }
}
