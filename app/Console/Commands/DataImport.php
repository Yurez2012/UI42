<?php

namespace App\Console\Commands;

use App\Models\District;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use KubAT\PhpSimple\HtmlDomParser;

class DataImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $html = HtmlDomParser::file_get_html('https://www.e-obce.sk/okres/komarno.html');

        foreach ($this->getDistrictByHtml($html) as $district) {
            $districtModel = $this->createDistrict($district);

            foreach ($this->getCityByDistrict($district) as $city) {
                $data = $this->prepareDataCityByCity($city);
                $this->createCity($districtModel, $data);
            }
        }
    }

    /**
     * @param $html
     *
     * @return mixed
     */
    public function getDistrictByHtml($html)
    {
        return $html->find('#telo table td[colspan=2] a');
    }

    /**
     * @param $district
     *
     * @return mixed
     */
    public function getCityByDistrict($district)
    {
        $html = HtmlDomParser::file_get_html($district->href);

        return $html->find('#telo table td[align=left] a');
    }

    /**
     * @param $city
     *
     * @return array
     * @throws GuzzleException
     */
    public function prepareDataCityByCity($city)
    {
        $data         = [];
        $data['name'] = trim($city->innertext);

        $html = HtmlDomParser::file_get_html($city->href)->find('#telo table tr[valign=top]');

        //first part data
        foreach ($html as $tr) {
            foreach ($tr->children as $key => $ch) {
                if (trim($ch->plaintext) == 'IČO:') {
                    $data['fax'] = trim($tr->children[$key + 1]->plaintext);
                }

                if (trim($ch->plaintext) == 'Starosta:') {
                    $data['mayor_name'] = trim($tr->children[$key + 1]->plaintext);
                }

                if (trim($ch->plaintext) == 'Primátor:') {
                    $data['mayor_name'] = trim($tr->children[$key + 1]->plaintext);
                }

                if (trim($ch->plaintext) == 'Región:') {
                    $data['city_hall_address'] = trim($tr->children[$key + 1]->plaintext);
                }
            }
        }

        //second part data
        $htmlSecond = HtmlDomParser::file_get_html($city->href)
            ->find('#telo table[cellspacing=3]')[0]
            ->find('tr');

        foreach ($htmlSecond as $trSecond) {
            foreach ($trSecond->children as $key => $chSecond) {
                if (trim($chSecond->plaintext) == 'Email:') {
                    $data['email'] = trim($trSecond->children[$key + 1]->plaintext);
                }

                if (trim($chSecond->plaintext) == 'Web:') {
                    $data['city_hall_address'] = trim($trSecond->children[$key - 1]->plaintext);
                    $data['web_address'] = trim($trSecond->children[$key + 1]->plaintext);
                }

                if (trim($chSecond->plaintext) == 'Tel:') {
                    $data['phone'] = trim($trSecond->children[$key + 1]->plaintext);
                }
            }
        }

        //Emblem img
        $htmlImg = HtmlDomParser::file_get_html($city->href)->find('#telo table td[width=84] img')[0]->src;
        $data['file_path'] = $this->saveFileFromUrl($htmlImg);

        return $data;
    }

    /**
     * @param $district
     *
     * @return mixed
     */
    public function createDistrict($district)
    {
        return District::firstOrCreate([
            'name' => $district->innertext,
        ]);
    }

    /**
     * @param District $district
     * @param          $data
     *
     * @return Model
     */
    public function createCity(District $district, $data)
    {
        return $district->cities()->updateOrCreate($data, $data);
    }

    /**
     * @param $url
     *
     * @return string
     * @throws GuzzleException
     */
    public function saveFileFromUrl($url)
    {
        // Завантаження файлу за URL з використанням GuzzleHttp
        $client = new Client();
        $response = $client->get($url);

        // Отримання вмісту файлу
        $fileContents = $response->getBody()->getContents();

        // Генерування унікального імені файлу
        $fileName = uniqid() . '.' . pathinfo($url, PATHINFO_EXTENSION);

        // Збереження файлу в системі сховища Laravel
        Storage::disk('public')->put('emblems/' . $fileName, $fileContents);

        // Прикріплення шляху до збереженого файлу до моделі
        return 'storage/emblems/' . $fileName;
    }
}
