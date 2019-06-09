<?php

use Illuminate\Database\Seeder;

class ComicGenreTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('comic_genre')->delete();
        
        \DB::table('comic_genre')->insert(array (
            0 => 
            array (
                'comic_id' => 1,
                'genre_id' => 1,
            ),
            1 => 
            array (
                'comic_id' => 1,
                'genre_id' => 2,
            ),
            2 => 
            array (
                'comic_id' => 2,
                'genre_id' => 1,
            ),
            3 => 
            array (
                'comic_id' => 2,
                'genre_id' => 2,
            ),
            4 => 
            array (
                'comic_id' => 3,
                'genre_id' => 1,
            ),
            5 => 
            array (
                'comic_id' => 3,
                'genre_id' => 2,
            ),
            6 => 
            array (
                'comic_id' => 4,
                'genre_id' => 3,
            ),
            7 => 
            array (
                'comic_id' => 4,
                'genre_id' => 4,
            ),
            8 => 
            array (
                'comic_id' => 4,
                'genre_id' => 5,
            ),
            9 => 
            array (
                'comic_id' => 5,
                'genre_id' => 3,
            ),
            10 => 
            array (
                'comic_id' => 5,
                'genre_id' => 4,
            ),
            11 => 
            array (
                'comic_id' => 5,
                'genre_id' => 5,
            ),
            12 => 
            array (
                'comic_id' => 6,
                'genre_id' => 3,
            ),
            13 => 
            array (
                'comic_id' => 6,
                'genre_id' => 4,
            ),
            14 => 
            array (
                'comic_id' => 6,
                'genre_id' => 5,
            ),
            15 => 
            array (
                'comic_id' => 7,
                'genre_id' => 3,
            ),
            16 => 
            array (
                'comic_id' => 7,
                'genre_id' => 4,
            ),
            17 => 
            array (
                'comic_id' => 7,
                'genre_id' => 5,
            ),
            18 => 
            array (
                'comic_id' => 8,
                'genre_id' => 3,
            ),
            19 => 
            array (
                'comic_id' => 8,
                'genre_id' => 4,
            ),
            20 => 
            array (
                'comic_id' => 8,
                'genre_id' => 5,
            ),
            21 => 
            array (
                'comic_id' => 9,
                'genre_id' => 6,
            ),
            22 => 
            array (
                'comic_id' => 9,
                'genre_id' => 7,
            ),
            23 => 
            array (
                'comic_id' => 10,
                'genre_id' => 6,
            ),
            24 => 
            array (
                'comic_id' => 10,
                'genre_id' => 7,
            ),
            25 => 
            array (
                'comic_id' => 10,
                'genre_id' => 8,
            ),
            26 => 
            array (
                'comic_id' => 11,
                'genre_id' => 6,
            ),
            27 => 
            array (
                'comic_id' => 11,
                'genre_id' => 7,
            ),
            28 => 
            array (
                'comic_id' => 11,
                'genre_id' => 8,
            ),
            29 => 
            array (
                'comic_id' => 12,
                'genre_id' => 6,
            ),
            30 => 
            array (
                'comic_id' => 12,
                'genre_id' => 7,
            ),
            31 => 
            array (
                'comic_id' => 12,
                'genre_id' => 8,
            ),
            32 => 
            array (
                'comic_id' => 13,
                'genre_id' => 6,
            ),
            33 => 
            array (
                'comic_id' => 13,
                'genre_id' => 7,
            ),
            34 => 
            array (
                'comic_id' => 13,
                'genre_id' => 8,
            ),
            35 => 
            array (
                'comic_id' => 14,
                'genre_id' => 6,
            ),
            36 => 
            array (
                'comic_id' => 14,
                'genre_id' => 7,
            ),
            37 => 
            array (
                'comic_id' => 14,
                'genre_id' => 8,
            ),
        ));
        
        
    }
}