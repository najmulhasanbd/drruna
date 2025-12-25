<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CacheClearTrait;

class Review extends Model
{
    use CacheClearTrait;

   protected $fillable = ['name', 'workplace', 'message', 'status'];
}
