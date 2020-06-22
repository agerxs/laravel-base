<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'id'=>1,
            'slug'=>'role_user',
            'label'=>'Utilisateur'
        ]);
        Role::create([
            'id'=>2,
            'slug'=>'role_admin',
            'label'=>'Administrateur'
        ]);
    }
}
