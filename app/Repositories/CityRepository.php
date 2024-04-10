<?php

namespace App\Repositories;

use App\Models\City;

class CityRepository extends Repository
{
    /**
     * @param City $city
     */
    public function __construct(City $city)
    {
        parent::__construct($city);
    }
}
