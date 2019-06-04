<?php

use Illuminate\Database\Seeder;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert(['name' =>'Rick Remender']);
        DB::table('authors')->insert(['name' =>'Garth Ennis']);
        DB::table('authors')->insert(['name' =>'Warren Ellis']);
    }
}
