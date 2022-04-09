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

    public function setNameAttribute($value){
        $this->attributes['name'] = ucfirst($value);
    }

    public function setObservationsAttribute($value){
        $this->attributes['observations'] = ucfirst($value);
    }

    public function brands(){
        return $this->belongsTo(Brand::class);
    }

    public function sizes(){
        return $this->belongsTo(Size::class);
    }
}
