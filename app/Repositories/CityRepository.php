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

    /**
     * @param $search
     *
     * @return mixed
     */
    public function getCitiesForAutoCompleteByParams($search = null)
    {
        $query = $this->model->select(['id', 'name']);

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        return $query->get();
    }
}
