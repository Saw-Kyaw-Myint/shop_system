<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderProduct extends Model
{
    use HasFactory;
    protected $fillable=['quantity','product_id','user_id','created_at'];

    public function product(){
        return $this->belongsTo(Product::class);
      }

      public function user(){
        return $this->belongsTo(User::class);
      }

      public function category(){
        return $this->belongsTo(Category::class);
      }

      public function scopeFilter($query,$month){
       return    $query->whereMonth('created_at',$month);
      }

      public function scopeYearFilter($query,$year){
        return    $query->whereYear('created_at',$year);
       }

       public function scopeToday($query,$today){
        return    $query->whereDate('created_at', '=', $today);
       }


       
}
