<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'observations',
        'stock',
        'boardingDate',
        'brand_id',
        'size_id'
    ];

    public function brands(){
        return $this->belongsTo(Brand::class);
    }

    public function sizes(){
        return $this->belongsTo(Size::class);
    }
}
