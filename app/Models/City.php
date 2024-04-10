<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class City extends Model
{
    use HasFactory;

    protected $fillable = [

    ];

    /**
     * @return HasOne
     */
    public function city()
    {
        return $this->hasOne(City::class);
    }
}
