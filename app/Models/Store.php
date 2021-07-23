<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'description',
        'product',
        'value',
        'contained_in',
        'user_id'
    ];

    public function container() {
        return $this->belongsTo('App\Models\Store', 'contained_in', 'id');
    }
}