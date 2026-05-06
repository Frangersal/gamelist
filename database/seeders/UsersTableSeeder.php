<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use App\Role;	
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = DB::table('users')->insert([
            'nick' => 'Admin',
            'name' => 'Administrador',
            'email' => 'Admin@gamelist.com',
            'password' => Hash::make('tutortutor'),
            'picture' => 'nah',       
        ]);

        $tutor = DB::table('users')->insert([
            'nick' => 'UsuarioNormalxd',
            'name' => 'Gerardo Mendoza',
            'email' => 'Gerardo@user.com',
            'password' => Hash::make('tutortutor'),
            'picture' => 'nah',
        ]);

        #php artisan db:seed
        
        // INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES ('1', '1', '1', '2020-10-01 00:00:00', '2020-10-01 00:00:00'), ('2', '2', '2', '2020-10-01 00:00:00', '2020-10-01 00:00:00');

    }
}
