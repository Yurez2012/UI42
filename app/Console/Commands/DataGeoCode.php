<?php

namespace App\Console\Commands;

use App\Repositories\CityRepository;
use App\Services\OpenStreetService;
use Illuminate\Console\Command;

class DataGeoCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:geocode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get geo by city';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cities     = app(CityRepository::class)->all();
        $geoService = new OpenStreetService('https://nominatim.openstreetmap.org/search');

        foreach ($cities as $city) {
            $geoService->queryByParams($city->city_hall_address);

            $city->update([
                'latitude'  => $geoService->getLatitude(),
                'longitude' => $geoService->getLongitude(),
            ]);
        }

        dump('Geo data saved!');
    }
}
