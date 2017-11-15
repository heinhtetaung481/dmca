<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $guarded = ['id'];

    public function provider(){

    	return $this->belongsTo(Provider::class);
    }

    public function user(){

    	return $this->belongsTo(User::class);
    }

    public static function open(array $attributes){

    	return new static($attributes);
    }

    public function useTemplate($template){

    	$this->template = $template;

    	return $this;
    }
}
