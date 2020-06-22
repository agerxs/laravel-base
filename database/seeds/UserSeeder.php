<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email'             => "ager16@gmail.com",
            'password'          => Hash::make('azerty'),
            'is_admin'      => true,
            'name'        => 'Amani',
            'surname'         => 'Elvis',
            'is_active'         => true,
            'phone'         => '08527154',
            'country' => "Côte d'Ivoire",
            'city' => "Abidjan",
            'town' => "Cocody",
            'role_id'=>2,
            'profession' => "Informaticien",
            'account_type' => "perso",
            'account_owner' => "own",
        ]);
    }
}
