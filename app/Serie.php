<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
class Serie extends Model
{
    use SoftDeletes, SoftCascadeTrait;
    protected $primaryKey = 'id';
	protected $table = 'series';
    protected $fillable=['name'];
    protected $softCascade = ["comics"];
    public function comics(){
        return $this->hasMany('App\Comic');
    }
}