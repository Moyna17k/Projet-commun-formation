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

        // je veux récupéré que les nom des entreprise
        $r = $response['results'];

        foreach($r as $value ) {

            dd($value['nom_complet']);
        }
        
        // Close the cURL session
        curl_close($ch);
 
        
        

    }
}