<?php

namespace App\Services;

use App\Models\Location;
use Torann\GeoIP\Facades\GeoIP;
use Illuminate\Support\Facades\Log;

class LocationService
{
    public function getLocationFromIp(string $ip): Location
    {
        try {
            $geoIpLocation = GeoIP::getLocation($ip);
            
            Log::info('GeoIP Response', ['data' => $geoIpLocation->toArray()]);

            return new Location(
                $geoIpLocation['country'],
                $geoIpLocation['state'],
                $geoIpLocation['city']
            );
        } catch (\Exception $e) {
            Log::error('Failed to get location data', [
                'ip' => $ip,
                'error' => $e->getMessage()
            ]);
            
            return new Location();
        }
    }
}