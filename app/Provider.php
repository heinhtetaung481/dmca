<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    public function notices(){

    	return $this->hasMany(Notice::class);
    }
}
