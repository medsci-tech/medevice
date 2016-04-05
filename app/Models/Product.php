<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier', 'supplier_id');
    }

    public function detailImages()
    {
        return $this->hasMany('App\Models\ProductDetailImage', 'product_id');
    }

    public function videos()
    {
        return $this->hasMany('App\Models\ProductVideo', 'product_id');
    }
}
