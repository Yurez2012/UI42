<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexCityRequest;
use App\Models\City;
use App\Repositories\CityRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CityController extends Controller
{
    /**
     * @param IndexCityRequest $request
     * @param CityRepository   $cityRepository
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index(IndexCityRequest $request, CityRepository $cityRepository)
    {
        if(is_null($request->get('search'))) {
            abort(404);
        }

        $cities = $cityRepository->getCitiesForAutoCompleteByParams($request->get('search'));

        return view('city.index', [
            'cities' => $cities,
        ]);
    }

    /**
     * @param City $city
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function show(City $city)
    {
        return view('city.show', [
            'city' => $city,
        ]);
    }
}
