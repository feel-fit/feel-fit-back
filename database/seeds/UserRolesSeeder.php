<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user_super_admin = User::create([
            'name' => 'Mauricio Suarez vega',
            'email' => 'mauroziux@gmail.com',
            'password' => 'caremico',
        ]);

        $user_super_admin->syncRoles('admin');

        $user_admin = User::create([
            'name' => 'Estefania Cañon arenas',
            'email' => 'estefa_caar@hotmail.com',
            'password' => 'Vainilla1a',
        ]);

        $user_admin->syncRoles('admin');

        $user_admin = User::create([
            'name' => 'Mauricio Franco Rojas',
            'email' => 'maurof85@hotmail.com',
            'password' => 'Vainilla1a',
        ]);

        $user_admin->syncRoles('admin');
    }
}
