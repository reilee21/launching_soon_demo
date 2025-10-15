<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('launching_soon');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
// Route::get('/test-geoip', function () {
//     $ip = '42.115.192.24';
    
//     \Log::info('Testing GeoIP');
//     \Log::info('IP: ' . $ip);
    
//     try {
//         $location = geoip()->getLocation($ip);
//         \Log::info('Location data:', ['data' => $location->toArray()]);
        
//         return response()->json([
//             'ip' => $ip,
//             'location' => $location->toArray(),
//             'driver' => config('geoip.driver'),
//             'service' => config('geoip.service')
//         ]);
//     } catch (\Exception $e) {
//         \Log::error('GeoIP Error: ' . $e->getMessage());
//         return response()->json([
//             'error' => $e->getMessage(),
//             'trace' => $e->getTraceAsString()
//         ], 500);
//     }
// });