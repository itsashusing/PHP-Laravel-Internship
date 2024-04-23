<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function usercountry()
    {

        return $this->belongsTo(Country::class, 'country','id');
    }
    public function userstate()
    {

        return $this->belongsTo(State::class, 'state','id');
    }
    public function userdistrict()
    {

        return $this->belongsTo(District::class, 'district','id');
    }
}
