<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->delete();
	    User::create(array(
	        'first_name'     	=> 'John',
	        'last_name' 		=> 'Doe',
	        'email'    			=> 'astellenboom9@gmail.com',
	        'password' 			=> Hash::make('test@123'),
	    ));
    }
}
