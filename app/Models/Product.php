<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'content',
        'active',
        'menu_id',
        'price',
        'price_sale',
        'thumb'
    ];

    public function menu(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }
}
