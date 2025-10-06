<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'weight',
        'dimension',   
        'material',
        'price',
        'stock',
        'category_id',
        'is_active',
        'image',
        'created_at',
        'updated_at',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
