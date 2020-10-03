<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumable extends Model
{
    protected $fillable = [ 
        'restaurant_id',
        'user_id',
        'category',
    	'name',
    	'price',
    	'description',

    ];

    public function users(){ // dit kan je alles noemen
        return $this->belongsToMany('App\User');
    }

    public function restaurant(){ // dit kan je alles noemen
        return $this->belongsTo('App\Restaurant');
    }

}