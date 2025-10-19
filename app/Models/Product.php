<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

    // Accessor untuk URL gambar konsisten di semua tampilan
    public function getImageUrlAttribute(): string
    {
        $img = $this->image;
        if (!$img) {
            return asset('assets/images/product-image/placeholder.png');
        }

        if (Str::startsWith($img, ['http://', 'https://'])) {
            return $img;
        }

        if (Str::startsWith($img, ['/storage', 'storage/'])) {
            return url($img);
        }

        // Jika path relatif pada disk 'public' (mis. 'uploads/...'), gunakan Storage::url
        return Storage::url($img);
    }
}
