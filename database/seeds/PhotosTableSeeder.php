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
                'name' => '1559681616seven-to-eternity-vol-1-tp_56026936c1.jpg',
                'url' => '/storage/photos/1559681616seven-to-eternity-vol-1-tp_56026936c1.jpg',
                'thumbnail' => '/storage/thumbnails/thumbnail_1559681616seven-to-eternity-vol-1-tp_56026936c1.jpg',
                'created_at' => '2019-06-04 20:53:36',
                'updated_at' => '2019-06-04 20:53:36',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '1559695653seven-to-eternity-vol-2-tp_62d5a88dae.jpg',
                'url' => '/storage/photos/1559695653seven-to-eternity-vol-2-tp_62d5a88dae.jpg',
                'thumbnail' => '/storage/thumbnails/thumbnail_1559695653seven-to-eternity-vol-2-tp_62d5a88dae.jpg',
                'created_at' => '2019-06-05 00:47:33',
                'updated_at' => '2019-06-05 00:47:33',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '1559695712seven-to-eternity-vol-3-rise-to-fall-tp_dead8af8f0.jpg',
                'url' => '/storage/photos/1559695712seven-to-eternity-vol-3-rise-to-fall-tp_dead8af8f0.jpg',
                'thumbnail' => '/storage/thumbnails/thumbnail_1559695712seven-to-eternity-vol-3-rise-to-fall-tp_dead8af8f0.jpg',
                'created_at' => '2019-06-05 00:48:32',
                'updated_at' => '2019-06-05 00:48:32',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '15596957279185Q49AogL.jpg',
                'url' => '/storage/photos/15596957279185Q49AogL.jpg',
                'thumbnail' => '/storage/thumbnails/thumbnail_15596957279185Q49AogL.jpg',
                'created_at' => '2019-06-05 00:48:47',
                'updated_at' => '2019-06-05 00:48:47',
            ),
            4 => 
            array (
                'id' => 5,
            'name' => '155969575295406 (1).jpg',
            'url' => '/storage/photos/155969575295406 (1).jpg',
            'thumbnail' => '/storage/thumbnails/thumbnail_155969575295406 (1).jpg',
                'created_at' => '2019-06-05 00:49:12',
                'updated_at' => '2019-06-05 00:49:12',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '1559695776102953.jpg',
                'url' => '/storage/photos/1559695776102953.jpg',
                'thumbnail' => '/storage/thumbnails/thumbnail_1559695776102953.jpg',
                'created_at' => '2019-06-05 00:49:36',
                'updated_at' => '2019-06-05 00:49:36',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => NULL,
                'url' => '/storage/photos/155972235495395.jpg',
                'thumbnail' => '/storage/thumbnails/thumbnail_155972235495395.jpg',
                'created_at' => '2019-06-05 08:12:34',
                'updated_at' => '2019-06-05 08:12:34',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => NULL,
                'url' => '/storage/photos/1559722605102956.jpg',
                'thumbnail' => '/storage/thumbnails/thumbnail_1559722605102956.jpg',
                'created_at' => '2019-06-05 08:16:45',
                'updated_at' => '2019-06-05 08:16:45',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => NULL,
                'url' => '/storage/photos/1559722782blackgas.jpg',
                'thumbnail' => '/storage/thumbnails/thumbnail_1559722782blackgas.jpg',
                'created_at' => '2019-06-05 08:19:42',
                'updated_at' => '2019-06-05 08:19:42',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => NULL,
                'url' => '/storage/photos/1559724409revival-vol-1-youre-among-friends-tp_98ee7de1af.jpg',
                'thumbnail' => '/storage/thumbnails/thumbnail_1559724409revival-vol-1-youre-among-friends-tp_98ee7de1af.jpg',
                'created_at' => '2019-06-05 08:46:49',
                'updated_at' => '2019-06-05 08:46:49',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => NULL,
                'url' => '/storage/photos/1559724576revival-vol-2-live-like-you-mean-it-tp_0cf2c746d0.jpg',
                'thumbnail' => '/storage/thumbnails/thumbnail_1559724576revival-vol-2-live-like-you-mean-it-tp_0cf2c746d0.jpg',
                'created_at' => '2019-06-05 08:49:36',
                'updated_at' => '2019-06-05 08:49:36',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => NULL,
                'url' => '/storage/photos/1559724651revival-vol-3-a-faraway-place-tp_e602072d64.jpg',
                'thumbnail' => '/storage/thumbnails/thumbnail_1559724651revival-vol-3-a-faraway-place-tp_e602072d64.jpg',
                'created_at' => '2019-06-05 08:50:51',
                'updated_at' => '2019-06-05 08:50:51',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => NULL,
                'url' => '/storage/photos/1559724723revival-vol-4-escape-to-wisconsin-tp_d5e3bf28c5.jpg',
                'thumbnail' => '/storage/thumbnails/thumbnail_1559724723revival-vol-4-escape-to-wisconsin-tp_d5e3bf28c5.jpg',
                'created_at' => '2019-06-05 08:52:03',
                'updated_at' => '2019-06-05 08:52:03',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => NULL,
                'url' => '/storage/photos/1559817403revival-vol-5-tp-gathering-of-waters_1bdd845385.jpg',
                'thumbnail' => '/storage/thumbnails/thumbnail_1559817403revival-vol-5-tp-gathering-of-waters_1bdd845385.jpg',
                'created_at' => '2019-06-06 10:36:43',
                'updated_at' => '2019-06-06 10:36:43',
            ),
        ));
        
        
    }
}