<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'img_url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'item_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'item_id');
    }

    public function sold_items()
    {
        return $this->hasMany(Sold_item::class, 'item_id');
    }

    public function category_items()
    {
        return $this->hasMany(Category_item::class, 'item_id');
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }
}