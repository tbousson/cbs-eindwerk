<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serie extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id';
	protected $table = 'series';
    protected $fillable=['name'];
    
    public function comics(){
        return $this->hasMany('App\Comic');
    }
}