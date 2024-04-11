<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class OpenStreetService
{
    /**
     * @var string
     */
    protected string $url;

    /**
     * @var string
     */
    protected string $token;

    /**
     * @var Client
     */
    protected Client $client;

    /**
     * @var
     */
    private $result;

    /**
     *
     */
    public function __construct($url)
    {
        $this->url    = $url;
        $this->client = new Client();
    }

    /**
     * @param $search
     *
     * @return void
     * @throws GuzzleException
     */
    public function queryByParams($search)
    {
        $response = $this->client->request('GET', $this->url, [
            'query' => [
                'q'      => $search,
                'format' => 'json',
            ],
        ]);

        $this->result = json_decode($response->getBody(), true);
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        if (isset($this->result[0])) {
            return $this->result[0]['lat'];
        }

        return null;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        if (isset($this->result[0])) {
            return $this->result[0]['lon'];
        }

        return null;
    }
}
