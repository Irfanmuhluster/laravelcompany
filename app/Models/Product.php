<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
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
                    return $query
                        ->where('product_name', 'like', "%{$keyword}%");
                });
            });
    }

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id');
    }
}
