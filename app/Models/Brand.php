<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'reference'
    ];

    public function setReferenceAttribute($reference){
        $this->attributes['reference'] = strtoupper($reference);
    }

    public function setNameAttribute($name){
        $this->attributes['name'] = ucwords($name);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
