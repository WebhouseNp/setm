<?php

namespace Modules\Site\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Site extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    protected static function newFactory()
    {
        return \Modules\Site\Database\factories\SiteFactory::new();
    }
}
