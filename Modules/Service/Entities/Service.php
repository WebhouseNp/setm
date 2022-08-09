<?php

namespace Modules\Service\Entities;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id','created_at','updated_at'];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    // protected $fillable = [];

    // protected static function newFactory()
    // {
    //     return \Modules\Service\Database\factories\ServiceFactory::new();
    // }
}
