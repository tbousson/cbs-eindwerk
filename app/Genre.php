<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Genre extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id';
	protected $table = 'genres';
    protected $fillable=['name'];
    public function comic(){
        return $this->belongsToMany('App\Comic');
    }
}