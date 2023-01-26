<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'title','image','description','price','category_id'
    ];

// category 
     public function category(){
        return $this->belongsTo(Category::class);
     }
    
     //search
     public function scopeSearch($query,$search){
        return  $query->when($search ?? false, function ($q) use($search){
         $q->where('title','like',"%$search%")
         ->orWhere('description','like',"%$search%")
         ;
        });
     }

}
