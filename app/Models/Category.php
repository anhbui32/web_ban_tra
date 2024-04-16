<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = ['id', 'type_name', 'created_at', 'updated_at'];
    // public $hidden = ['created_at', 'updated_at'];
    public function categoryOneToMany()
    {
        return $this->hasMany(Products::class, 'category_id', 'id');
    }
}
