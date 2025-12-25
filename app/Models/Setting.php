<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CacheClearTrait;

class Setting extends Model
{
    use CacheClearTrait;


    protected $guarded = [];
}
