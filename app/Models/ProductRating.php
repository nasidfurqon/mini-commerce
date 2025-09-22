<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    use HasFactory;

    protected $fillable = ['reviewer_id', 'product_id', 'rating', 'review'];

    public function user()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
