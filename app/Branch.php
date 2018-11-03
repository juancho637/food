<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @property mixed company_id
 */
class Branch extends Model
{
    protected $fillable = [
        'company_id',
        'name',
        'address',
        'longitude',
        'latitude',
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
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function scopeAllowed($query)
    {
        if (Auth::user()->isRole('admin')){
            return $query->whereHas('company', function ($query){
                $query->where('id', Auth::user()->company_id);
            });
        }

        /*if (Auth::user()->isRole('su')){
            return $query;
        }*/

        return $query;
    }
}
