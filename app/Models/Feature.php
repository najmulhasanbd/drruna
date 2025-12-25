<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CacheClearTrait;

class Feature extends Model
{
    use CacheClearTrait;

   protected $fillable = ['title', 'number', 'icon'];
}
