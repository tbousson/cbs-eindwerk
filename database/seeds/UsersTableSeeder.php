<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'thomas bousson',
                'email' => 'thomas.bousson86@gmail.com',
                'role_id' => 1,
                'address' => 'prins Albertstraat, 3',
                'postcode' => 8310,
                'city' => 'sint kruis',
                'country' => 'Belgium',
                'phone' => '484051731',
                'email_verified_at' => NULL,
                'password' => '$2y$10$ltU4lS2Nqgd5Ec3x1el2cexq97c4lhhtFAh3jQArbZBZgY0pEyfCu',
                'remember_token' => NULL,
                'created_at' => '2019-06-04 08:59:12',
                'updated_at' => '2019-06-04 11:38:30',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}