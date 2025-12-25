<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CacheClearTrait;

class Service extends Model
{
    use CacheClearTrait;

    protected $guarded = [];
}
