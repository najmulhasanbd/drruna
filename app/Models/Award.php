<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CacheClearTrait;

class Award extends Model
{
    use CacheClearTrait;

    protected $guarded = [];
}
