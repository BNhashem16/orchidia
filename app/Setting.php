<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
  protected $fillable=['title','link', 'logo', 'created_by','updated_by'];
  protected $casts=['title'=>'array' , 'link'=>'array'];
}
