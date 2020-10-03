<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [ 
    	'name',


    ];

    public function users(){ // dit kan je alles noemen
        return $this->hasMany('App\User');
    }
}
