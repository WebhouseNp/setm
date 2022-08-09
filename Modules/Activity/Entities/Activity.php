<?php

namespace Modules\Activity\Entities;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected static function newFactory()
    {
        return \Modules\Activity\Database\factories\ActivityFactory::new();
    }
}
