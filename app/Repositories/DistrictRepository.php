<?php

namespace App\Repositories;

use App\Models\District;

class DistrictRepository extends Repository
{
    /**
     * @param District $district
     */
    public function __construct(District $district)
    {
        parent::__construct($district);
    }
}
