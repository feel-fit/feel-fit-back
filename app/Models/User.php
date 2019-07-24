<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'identification', 'gender', 'phone', 'status',
    ];

    public $resource = UserResource::class;
    public $resourceCollection = UserCollection::class;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @param $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    /**
     * Si el usuario no diligencia la contraseña se le asiganara una automaticamente.
     *
     * @param Request $request
     */
    public static function fillPassword($request)
    {
        if (! $request->password) {
            $request->merge(['password' => bcrypt(str_random(10))]);
        } else {
            $request->merge(['password' => bcrypt($request->password)]);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Relations database
    |--------------------------------------------------------------------------
    |
    */

    /**
     * @return HasMany
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    /**
     * @return HasMany
     */
    public function shoppings()
    {
        return $this->hasMany(Shopping::class);
    }

    /**
     * @return BelongsToMany
     */
    public function discounts()
    {
        return $this->belongsToMany(Discount::class);
    }

    /**
     * @return HasMany
     */
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}
