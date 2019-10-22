<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['name', 'active', 'short_code', 'created_by', 'updated_by'];

}
