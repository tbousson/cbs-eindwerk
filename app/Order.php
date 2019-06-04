<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
    protected $primaryKey = 'id';
	protected $table = 'orders';
    protected $fillable = ["quantity"];
    public function user(){
       return $this->belongsTo('App\User');
    }
    public function comic(){
       return $this->belongsTo('App\Comic');
    }
}