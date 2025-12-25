<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CacheClearTrait;

class Specialist extends Model
{
    use CacheClearTrait;

    protected $fillable = ['name', 'position'];
}
