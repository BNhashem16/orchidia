<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component_category extends Model
{
    public function components()
    {
	    return $this->hasMany('App\Component','id','component_category_id');
    }

    public function form() {
    return $this->belongsTo(Form::class);
  }
}
