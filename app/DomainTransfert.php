<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DomainTransfert extends Model
{
    protected $table = 'domains_transferts';

    protected $fillable = [
        'status', 'domain_id', 'code'
    ];

    public function domain()
    {
        return $this->belongsTo('App\Domain');
    }
}
