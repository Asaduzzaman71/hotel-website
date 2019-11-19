<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    $this->middleware('auth');

    protected $guarded=[];

    protected $attributes=[ 'status'=>1 ];

    public function getStatusAttribute($attribute){
        return $this->statusOptions()[$attribute];
    }

    public function scopeActive($query){
    	return $query->where('status',1);
    }
    public function scopeInactive($query){
        return $query->where('status',0);
    }

     public function statusOptions(){
        return [ 
            0=>'Inactive',
            1=>'Active',
            ];
    }
}
