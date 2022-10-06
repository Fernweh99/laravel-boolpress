<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        'name', 'surname', 'city', 'address'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
