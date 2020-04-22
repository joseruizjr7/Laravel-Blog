<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
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
        $assignRolesPermission = Permission::create(['name' => 'asignar_roles']);

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
        $adminRole->givePermissionTo('asignar_roles');
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
        $writerRole->givePermissionTo('editar_posts');

        $readerRole = Role::create(['name' => 'Lector']);
        $readerRole->givePermissionTo('ver_posts');

        $admin = new User;
        $admin->name = 'Jose Ruiz';
        $admin->email = 'joseruiz@mail.com';
        $admin->password = Hash::make('1234qwerty');
        $admin->save();
        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = 'Alan Brito';
        $writer->email = 'alan@mail.com';
        $writer->password = bcrypt('1234qwerty');
        $writer->save();
        $writer->assignRole($analistRole);

        $writer = new User;
        $writer->name = 'John Doe';
        $writer->email = 'johndoe@mail.com';
        $writer->password = bcrypt('1234qwerty');
        $writer->save();
        $writer->assignRole($writerRole);

        $writer = new User;
        $writer->name = 'Elba Lazo';
        $writer->email = 'elbalazo@mail.com';
        $writer->password = bcrypt('1234qwerty');
        $writer->save();
        $writer->assignRole($readerRole);

    }
}
