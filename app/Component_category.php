<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component_category extends Model
{
    public function components()
    {
	    return $this->hasMany('App\Component','id','component_category_id');
    }

    public function forms() {
    return $this->hasMany(Form::class ,'component_category_id', 'id');
  }
}
