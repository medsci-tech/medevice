<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierAttention extends Model
{
    protected $table = 'supplier_attentions';

    protected $fillable = ['supplier_id', 'customer_id'];

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier', 'supplier_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }
}
