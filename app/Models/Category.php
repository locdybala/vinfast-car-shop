<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function latestProduct(): HasOne
    {
        return $this->hasOne(Product::class)->latestOfMany();
    }
}
