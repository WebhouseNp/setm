<?php

namespace Modules\Quicklink\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quicklink extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Quicklink\Database\factories\QuicklinkFactory::new();
    }
}
