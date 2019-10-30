<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable=['message','page_id','created_by','updated_by'];
    protected $casts=['message'=>'array'];
}
