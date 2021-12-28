<?php

use Illuminate\Database\Seeder;

//
use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         User::create([
        	'name' => 'Joni',
        	'email' => 'joni@gmail.com',
        	'password' => Hash::make('11223344'),
        	'roles' => 'ADMIN',
        ]);

    }
}