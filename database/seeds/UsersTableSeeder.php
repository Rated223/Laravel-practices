<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Role::truncate();
        DB::table('assigned_roles')->truncate();

        $user1 = User::create([
        	'name' => 'admin',
        	'email' => 'admin@email.com',
        	'password' => '123123' // Clase User tiene un conmutador setPasswordAttribute, no se encripta esta contraseña
        ]);

        $user2 = User::create([
        	'name' => 'moderador',
        	'email' => 'mod@email.com',
        	'password' => '123123'
        ]);

         $role1 = Role::create([
        	'name' => 'admin',
        	'display_name' => 'Administrador del sitio',
        	'description' => 'Este usuario cuenta con todos los permisos'
        ]);

        $role2 = Role::create([
        	'name' => 'mod',
        	'display_name' => 'Moderador de mensajes',
        	'description' => 'Este usuario revisa los mensajes enviados'
        ]);

        $role3 = Role::create([
        	'name' => 'estudiante',
        	'display_name' => 'Estudiante',
        	'description' => 'Este usuario ha registrado una cuenta'
        ]);

    	$user1->roles()->save($role1);
    	$user2->roles()->save($role2);

    	for ($i = 1; $i <= 20; $i++) {
    		User::create([
	        	'name' => "user{$i}",
	        	'email' => "user{$i}@email.com",
	        	'password' => '123123'
	        ])->roles()->save($role3);
    	}
    }
}
