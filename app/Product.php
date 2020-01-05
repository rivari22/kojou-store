<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['photo','name','slug','description','stock','weight','price','category_id','user_id'];

    function user(){
        return $this->belongsTo('App\User');
    }
    // function transaction(){
    //     return $this->belongsTo('App\Transaction');
    // }
}
