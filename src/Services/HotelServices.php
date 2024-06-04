<?php

namespace App\Services;

class HotelServices
{
    public function hotel()
    {

        // URL to send the request to
        $url = 'https://recherche-entreprises.api.gouv.fr/search?activite_principale=55.10Z&code_postal=17000';

        // Initialize a cURL session
        $ch = curl_init();

        // Set the URL
        curl_setopt($ch, CURLOPT_URL, $url);

        // Set the option to return the result as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the cURL session and store the result
        $response = curl_exec($ch);

        // json decode 
        $response = json_decode($response, true);

        // je veux récupérer tous les noms des entreprises
        $r = $response['results'];

        $nomCompletArray = [];

        foreach ($r as $value) {
            $nomCompletArray[] = $value['nom_complet'];
        }
 
        // Close the cURL session
        curl_close($ch);

        // Return the array of nom_complet values
        return $nomCompletArray;
    }
}
