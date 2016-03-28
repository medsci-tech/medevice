<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCollection extends Model
{
    protected $table = 'product_collections';

    protected $fillable = ['product_id', 'customer_id'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }
}
