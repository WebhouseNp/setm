<?php

namespace Modules\Team\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function getImageSrcAttribute()
    {
        return Storage::url($this->image);
    }

    protected static function newFactory()
    {
        return \Modules\Team\Database\factories\TeamFactory::new();
    }
}
