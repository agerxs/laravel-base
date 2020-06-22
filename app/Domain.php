<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{

    protected $fillable = [
        'name', 'status', 'package_id', 'user_id','expires_at'
    ];
    /**
     * Get the payments for the blog Domain.
     */
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

    /**
     * Get the package that owns the Domain.
     */
    public function package()
    {
        return $this->belongsTo('App\Package');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
