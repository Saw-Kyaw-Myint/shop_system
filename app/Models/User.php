<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone',
        'region',
    ];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function  shooppingCart()
    {
        return $this->hasMany(Shoppingcart::class, 'user_id', 'id');
    }

    public function  scopeSearch($query, $search)
    {
        return $query->when($search ?? false, function ($q) use ($search) {
            $q->where('title', 'like', "%$search%");
        });
    }

    public function scopeEmail($query,$email){
        return    $query->where('email', '=', $email);
       }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
