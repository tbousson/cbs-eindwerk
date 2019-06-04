<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComicGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comic_genre', function (Blueprint $table) {
            $table->unsignedInteger('comic_id');
            $table->unsignedInteger('genre_id');
            
            $table->primary(['comic_id',"genre_id"]);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comic_genre');
    }
}
