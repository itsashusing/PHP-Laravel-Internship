<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Area extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    public function states()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
    public function countries()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

}
