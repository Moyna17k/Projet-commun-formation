<?php

namespace App\Services;

class HotelServices
{
    public function hotel(): string
    {
        $url = 'https://recherche-entreprises.api.gouv.fr/search?activite_principale=55.10Z&code_postal=17000';
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        
        if (curl_errno($ch)) {
            throw new \Exception('Erreur cURL : ' . curl_error($ch));
        }
        
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($httpCode !== 200) {
            throw new \Exception('Erreur lors de la requête API, code HTTP : ' . $httpCode);
        }
        
        curl_close($ch);

        return $response;
    }
}