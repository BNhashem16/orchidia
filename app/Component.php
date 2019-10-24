<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $casts = ['title' => 'array', 'sub_title' => 'array', 'description' => 'array'];
}
