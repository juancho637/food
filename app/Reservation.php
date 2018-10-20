<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reservation extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'date',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeAllowed($query)
    {
        if (Auth::user()->isRole('su')){
            return $query;
        }

        if (Auth::user()->isRole('admin')){
            return $query->whereHas('product', function ($query){
                $query->whereHas('branch', function ($query){
                    $query->whereHas('company', function ($query){
                        $query->where('id', Auth::user()->company_id);
                    });
                });
            });
        }

        return $query->where('user_id', Auth::user()->id);
    }
}
