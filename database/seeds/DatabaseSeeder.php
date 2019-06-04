<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AuthorTableSeeder::class);
        $this->call(PublishersTableSeeder::class);
        $this->call(SeriesTableSeeder::class);
        $this->call(ComicsTableSeeder::class);
        
        
        // $this->call(PublishersTableSeeder::class);
        // $this->call(TodosTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(GenresTableSeeder::class);
    }
}
