<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnValue;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'image', 'description', 'price', 'category_id'
    ];

    // category 
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //search
    public function scopeSearch($query, $search)
    {
        return  $query->when($search ?? false, function ($q) use ($search) {
            $q->where('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
        });
    }

    public function scopeFilter($query, $category)
    {
        return $query->when($category ?? false, function ($q) use ($category) {
            $q->whereHas('category', function ($p) use ($category) {
                $p->where('id', '=', $category);
            });
        });
    }

    public function scopeMonth($query, $month)
    {
        return    $query->whereMonth('created_at', $month);
    }

    public function scopeTitle($query, $title)
    {
        return $query->where('title', '=', $title);
    }
}
