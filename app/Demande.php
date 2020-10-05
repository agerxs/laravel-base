<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    protected $fillable = [
        'type', 'status', 'domain_id'
    ];


    /**
     * Get the package that owns the Domain.
     */
    public function domain()
    {
        return $this->belongsTo('App\Domain');
    }

}
