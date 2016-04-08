<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVideo extends Model
{
    protected $table = 'product_videos';

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
