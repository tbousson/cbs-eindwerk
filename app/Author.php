<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
class Author extends Model
{
    use SoftDeletes, SoftCascadeTrait;
    protected $primaryKey = 'id';
	protected $table = 'authors';
    protected $fillable=['name'];
    protected $softCascade = ["comics"];
    public function comics(){
        return $this->hasMany('App\Comic');
    }
}