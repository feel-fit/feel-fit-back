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
        $user_super_admin = User::create(['name'     => 'Mauricio Suarez vega',
                                          'email'    => 'mauroziux@gmail.com',
                                          'password' => 'caremico', ]);

        $user_super_admin->syncRoles('superadmin');

        $user_admin = factory(User::class)->create();

        $user_admin->syncRoles('admin');

        $user_client = factory(User::class)->create();

        $user_client->syncRoles('client');
    }
}
