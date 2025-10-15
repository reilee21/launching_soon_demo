<?php

namespace App\Models;

class Location
{
    protected $country;
    protected $region;
    protected $city;

    public function __construct($country = null, $region = null, $city = null)
    {
        $this->country = $country;
        $this->region = $region;
        $this->city = $city;
    }

    public function toArray(): array
    {
        return [
            'country' => $this->country,
            'region'  => $this->region,
            'city'    => $this->city
        ];
    }
}