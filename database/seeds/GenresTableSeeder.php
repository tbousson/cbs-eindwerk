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
            2 => 
            array (
                'id' => 3,
                'name' => 'Supernatural',
                'created_at' => '2019-06-05 00:47:47',
                'updated_at' => '2019-06-05 00:47:47',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Action Fiction',
                'created_at' => '2019-06-05 00:47:58',
                'updated_at' => '2019-06-05 00:47:58',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Satire',
                'created_at' => '2019-06-05 00:48:04',
                'updated_at' => '2019-06-05 00:48:04',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Horror',
                'created_at' => '2019-06-05 08:20:23',
                'updated_at' => '2019-06-05 08:20:23',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Zombies',
                'created_at' => '2019-06-05 08:20:28',
                'updated_at' => '2019-06-05 08:20:28',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Mystery',
                'created_at' => '2019-06-05 08:47:23',
                'updated_at' => '2019-06-05 08:47:23',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}