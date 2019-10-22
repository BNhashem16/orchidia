<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'description', 'slug', 'active', 'image', 'page_id' , 'have_gallary' , 'have_form'];
    protected $casts = ['title' => 'array', 'description' => 'array'];
}
