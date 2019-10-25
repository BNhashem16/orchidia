<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $casts = ['title' => 'array',
    					'sub_title' => 'array',
    					'description' => 'array',
    					'extra' => 'array'];
    public function category_component()
    {
	    return $this->belongsTo('App\Component_category','component_category_id','id');
    }
}
