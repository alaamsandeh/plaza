<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;
use App\Models\User;

class Category extends Model
{
    use HasFactory;

    protected $fillable =[
        'name', 'slug', 'description', 'image'
    ];

    public function subcategory() {
        return $this->hasMany(Subcategory::class);
    }

    public function product() { // مو مستخدم
        return $this->hasMany(Product::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }
}
