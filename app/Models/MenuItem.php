<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $table = 'menu_items'; // Name of your menu items table

    protected $fillable = [
        'image',
        'title',
        'price',
        'description',
        'category',
    ];
}
