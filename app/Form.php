<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
	protected $table="forms";
    protected $fillable=['title','field','component_category_id','created_by','updated_by'];
    protected $casts=['field'=>'array','title'=>'array'];

}
