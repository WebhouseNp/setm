<?php

namespace Modules\Contactus\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contactus extends Model
{
    use HasFactory;

    // protected $fillable = [];
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    protected static function newFactory()
    {
        return \Modules\Contactus\Database\factories\ContactusFactory::new();
    }

    public function product()
    {
       return $this->belongsTo('Modules\Product\Entities\Product', 'product_id');
    }

    public function service()
    {
       return $this->belongsTo('Modules\Service\Entities\Service', 'service_id');
    }
}
