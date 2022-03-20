<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
    ];

    public function subSubCategory(){
        
        return $this->hasMany(SubSubCategory::class, 'sub_category_id', 'id');
    }
}
