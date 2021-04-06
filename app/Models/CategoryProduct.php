<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;

    protected $fillable = [
    	'category_name', 'publish'
    ];

    public function scopeSearch($query)
    {
        $filter = request()->query();

        return $query
            ->when(@$filter['search'], function ($query, $keyword) {
                return $query->where(function ($query) use ($keyword) {
                    return $query->where('category_name', 'like', "%{$keyword}%");
                });
            });
    }

    public function product() 
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
