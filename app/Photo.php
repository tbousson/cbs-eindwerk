<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    
    protected $primaryKey = 'id';
	protected $table = 'photos';
    protected $fillable=['url','thumbnail'];
    
}
