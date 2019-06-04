<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('genres')->delete();
        
        \DB::table('genres')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Fantasy',
                'created_at' => '2019-06-04 15:39:46',
                'updated_at' => '2019-06-04 15:39:46',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Sci-Fi',
                'created_at' => '2019-06-04 15:39:54',
                'updated_at' => '2019-06-04 15:39:54',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}