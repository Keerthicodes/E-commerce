<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category_id',
        'image',
        'seller_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function seller()
    {
        require $this->belongsTo(User::class);
    }
}
