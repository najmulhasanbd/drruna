<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CacheClearTrait;

class Gallery extends Model
{
    protected $fillable = ['image'];

    use CacheClearTrait;

    protected $casts = [
        'image' => 'array',
    ];
}
