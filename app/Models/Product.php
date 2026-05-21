<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'slug', 'title', 'price', 'abstract_html', 'full_html'
    ];
/*
    This makes:
    /checkout/paypal/dynamically-reconfigurable-webservices
    automatically load the correct product.
*/    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
