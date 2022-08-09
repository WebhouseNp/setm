<?php

namespace Modules\Career\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Entities\Category;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault(['name' => 'Deleted']);
    }

    protected static function newFactory()
    {
        return \Modules\Career\Database\factories\CareerFactory::new();
    }
}
