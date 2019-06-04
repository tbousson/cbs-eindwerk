<?php

use Illuminate\Database\Seeder;

class SeriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('series')->delete();
        
        \DB::table('series')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Seven to Eternity',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Black Gas',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Preacher',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'The Walking Dead',
                'created_at' => '2019-05-21 15:36:35',
                'updated_at' => '2019-05-21 15:36:35',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}