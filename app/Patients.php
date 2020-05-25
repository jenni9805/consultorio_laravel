<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $fillable = [
        'name', 'lastname' ,'email', 'confirmed', 'user_id'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
