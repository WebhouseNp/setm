<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscribe extends Model
{
    use HasFactory;

    // protected $fillable = [];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    
    protected static function newFactory()
    {
        return \Modules\Frontend\Database\factories\SubscribeFactory::new();
    }
}
