<?php

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
    	//Add Super Admin as setup user
        DB::table('users')->insert([
            'firstname' => 'Super',
            'lastname' => 'Admin',
            'email' => 'superadmin@property.com',
            'password' => bcrypt('p@ssw0rd'),
            'address' => 'No 3',
            'postalcode' => '31100',
            'city' => 'Puchong',
            'phonenumber' => '05',
            'mobile' => '5988',
            'gender' => 1,
            'marital' => 2,
        ]);
    }
}
