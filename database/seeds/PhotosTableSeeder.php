<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('photos')->delete();
        
        \DB::table('photos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'url' => '/storage/photos/1559662200Preacher_Book_Three.jpg',
                'thumbnail' => '/storage/thumbnails/thumbnail_1559662200Preacher_Book_Three.jpg',
                'created_at' => '2019-06-04 15:30:00',
                'updated_at' => '2019-06-04 15:30:00',
            ),
        ));
        
        
    }
}