<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $casts = ['title' => 'array', 'big_header' => 'array', 'small_header' => 'array', 'paragraph' => 'array'];
}
