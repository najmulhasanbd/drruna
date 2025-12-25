<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CacheClearTrait;

class Faq extends Model
{
    use CacheClearTrait;

    protected $guarded = [];
}
