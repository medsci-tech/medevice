<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupplierAttention extends Model
{
    protected $table = 'supplier_attentions';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

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
