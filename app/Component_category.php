<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component_category extends Model
{
    protected $casts = ['title' => 'array', 'sub_title' => 'array', 'description' => 'array'];
}
