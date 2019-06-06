<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publisher extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id';
	protected $table = 'publishers';
    protected $fillable=['name'];
    
    public function comics(){
        return $this->hasMany('App\Comic');
    }
    
}