<?php

use Illuminate\Database\Seeder;

class PublishersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('publishers')->delete();
        
        \DB::table('publishers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Image',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Avatar',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Vertigo',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'DC Comics',
                'created_at' => '2019-05-21 15:36:45',
                'updated_at' => '2019-05-21 15:36:45',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}