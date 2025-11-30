<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Http;

class PharmacyController extends Controller
{
    //


public function getPharmaciesDetails1()
{
    $googleApiKey = env('GOOGLE_MAPS_API_KEY');

    $serpApiKey = env('SERPAPI_KEY');
    $query = 'pharmacies à Yaoundé';

    $googleBaseUrl = "https://maps.googleapis.com/maps/api/place/textsearch/json";
    $serpApiBaseUrl = "https://serpapi.com/search.json";

    $allPlaces = [];
    $url = $googleBaseUrl . "?query=" . urlencode($query) . "&key=" . $googleApiKey;

    do {
        // 🔹 1. Appel Google Places Text Search
        $response = Http::get($url)->json();

        // Vérifier si on a des résultats
        if (isset($response['results']) && count($response['results']) > 0) {
            foreach ($response['results'] as $place) {
                if (isset($place['place_id'])) {
                    $placeId = $place['place_id'];

                    // 🔹 2. Appel SerpAPI pour les détails
                    $details = Http::get($serpApiBaseUrl, [
                        'engine' => 'google_maps',
                        'place_id' => $placeId,
                        'api_key' => $serpApiKey
                    ])->json();

                    $allPlaces[] = $details;
                }
            }
        }

        // 🔹 3. Gérer le next_page_token
        if (isset($response['next_page_token'])) {
            sleep(2); // Obligatoire pour que le token soit actif
            $url = $googleBaseUrl . "?pagetoken=" . $response['next_page_token'] . "&key=" . $googleApiKey;
        } else {
            $url = null; // plus de page
        }

    } while ($url);

    return $allPlaces;
}
public function getPharmaciesDetails()
{
    $googleApiKey = env('GOOGLE_MAPS_API_KEY');
    $serpApiKey = env('SERPAPI_KEY');
    $query = 'pharmacies à Yaoundé';

    $googleBaseUrl = "https://maps.googleapis.com/maps/api/place/textsearch/json";
    $serpApiBaseUrl = "https://serpapi.com/search.json";

    $allPlaces = [];
    $placeIds = [];
    $url = $googleBaseUrl . "?query=" . urlencode($query) . "&key=" . $googleApiKey;

    do {
        // 🔹 1. Appel Google Places
        $response = Http::get($url)->json();

        if (isset($response['results']) && count($response['results']) > 0) {
            foreach ($response['results'] as $place) {
                if (isset($place['place_id']) && count($placeIds) < 20) {
                    $placeIds[] = $place['place_id'];
                }
            }
        }

        // Si on a atteint 20, on arrête
        if (count($placeIds) >= 20) {
            break;
        }

        // 🔹 2. Gérer le next_page_token
        if (isset($response['next_page_token'])) {
            sleep(2);
            $url = $googleBaseUrl . "?pagetoken=" . $response['next_page_token'] . "&key=" . $googleApiKey;
        } else {
            $url = null;
        }

    } while ($url);

    // 🔹 3. Requêtes SerpAPI pour chaque place_id
    foreach ($placeIds as $placeId) {
        $details = Http::get($serpApiBaseUrl, [
            'engine' => 'google_maps',
            'place_id' => $placeId,
            'api_key' => $serpApiKey
        ])->json();

        $allPlaces[] = $details;
    }


}
}
