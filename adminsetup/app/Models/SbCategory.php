<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SbCategory extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function catetory()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }


}
