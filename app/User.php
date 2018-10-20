<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;

/**
 * @property mixed id
 * @property mixed company_id
 * @property mixed is_client
 */
class User extends Authenticatable
{
    use Notifiable, ShinobiTrait, HasApiTokens;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'name',
        'is_client',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(){
        return $this->belongsTo(Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    public function scopeAllowed($query)
    {

        if (Auth::user()->isRole('admin')){
            return $query->where('company_id', Auth::user()->company_id);
        }

        /*if (Auth::user()->isRole('su')){
            return $query;
        }*/

        return $query;
    }
}
