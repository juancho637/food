<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Company extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branches(){
        return $this->hasMany(Branch::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(){
        return $this->hasMany(User::class);
    }

    public function scopeAllowed($query)
    {
        if (Auth::user()->isRole('admin')){
            return $query->where('id', Auth::user()->company_id);
        }

        /*if (Auth::user()->isRole('su')){
            return $query;
        }*/

        return $query;
    }
}
