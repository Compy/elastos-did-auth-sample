<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DIDAuthRequest extends Model
{
    protected $table = 'did_auth_requests';
    protected $fillable = ['state', 'data'];
    protected $casts = [
        'data' => 'array'
    ];
}
