<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @property mixed branch
 * @property mixed branch_id
 */
class Product extends Model
{
    protected $fillable = [
        'branch_id',
        'name',
        'price',
        'stock',
        'type',
        'day',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch(){
        return $this->belongsTo(Branch::class);
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
            return $query->whereHas('branch', function ($query){
                $query->whereHas('company', function ($query){
                    $query->where('id', Auth::user()->company_id);
                });
            });
        }

        /*if (Auth::user()->isRole('su')){
            return $query;
        }*/

        return $query;
    }
}
