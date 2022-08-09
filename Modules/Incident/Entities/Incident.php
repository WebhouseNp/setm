<?php

namespace Modules\Incident\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Incident extends Model
{
    use HasFactory;

    // protected $fillable = [];
    protected $guarded = ['id', 'created_at', 'updated_at'];


    protected static function newFactory()
    {
        return \Modules\Incident\Database\factories\IncidentFactory::new();
    }
}
