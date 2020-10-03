<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [ 
        'id',
        'user_id',
        'title',
    	'email',
    	'address',
    	'zipcode',
    	'city',
    	'phone',

    ];

    // public function user(){ // dit kan je alles noemen
    //     return $this->belongsTo('App\User');
    // }
    public function restaurant(){
        return $this->belongsTo('App\Restaurant');
    }
    public function users(){
        return $this->belongsToMany('App\User');
    }
    public function consumables(){
    	return $this->hasMany('App\Consumable');
    }
}
