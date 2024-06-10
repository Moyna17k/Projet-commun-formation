<?php

namespace App\Services;

class SpectacleServices
{
    public function spectacle()
    {
        // URL to send the request to
        $url = 'https://data.culture.gouv.fr/api/explore/v2.1/catalog/datasets/festivals-global-festivals-_-pl/records?limit=100&refine=commune_principale_de_deroulement%3ALa%20Rochelle';
        
        // Initialize a cURL session
        $ch = curl_init();

        // Set the URL
        curl_setopt($ch, CURLOPT_URL, $url);

        // Set the option to return the result as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the cURL session and store the result
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
            return [];
        }

        // json decode 
        $response = json_decode($response, true);

        // je veux récupérer tous les noms des entreprises
        $r = $response['results'] ?? [];
        $nomCompletArray = [];
        $count = 0; // Variable de comptage
        
        foreach ($r as $value) {
            
                $nomCompletArray[] = [
                    'nom_spectacle' => $value['nom_du_festival'] ?? null,
                ];
        
                $count++; // Incrémenter la variable de comptage
        
                if ($count == 2) {
                    break; // Arrêter la boucle après avoir ajouté 8 éléments
                }
            
        }

        // Close the cURL session
        curl_close($ch);

        // Mélanger le tableau des entreprises de manière aléatoire
        shuffle($nomCompletArray);

        // Retourner le tableau des entreprises mélangé
        return $nomCompletArray;
    }

    public function musee()
    {
        // URL to send the request to
        $url = 'https://data.culture.gouv.fr/api/explore/v2.1/catalog/datasets/liste-et-localisation-des-musees-de-france/records?limit=100&refine=region_administrative%3A"Nouvelle-Aquitaine"&refine=departement%3A"Charente-Maritime"';
        
        // Initialize a cURL session
        $ch = curl_init();

        // Set the URL
        curl_setopt($ch, CURLOPT_URL, $url);

        // Set the option to return the result as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the cURL session and store the result
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
            return [];
        }

        // json decode 
        $response = json_decode($response, true);

        // je veux récupérer tous les noms des entreprises
        $r = $response['results'] ?? [];
        $nomCompletMusee = [];
        $count = 0; // Variable de comptage
        
        foreach ($r as $value) {
            
                $nomCompletMusee[] = [
                    'nom_spectacle' => $value['nom_officiel_du_musee'] ?? null,
                ];
        
                $count++; // Incrémenter la variable de comptage
        
                if ($count == 2) {
                    break; // Arrêter la boucle après avoir ajouté 8 éléments
                }
            
        }

        // Close the cURL session
        curl_close($ch);

        // Mélanger le tableau des entreprises de manière aléatoire
        shuffle($nomCompletMusee);

        // Retourner le tableau des entreprises mélangé
        return $nomCompletMusee;
    }

    public function full()
    {
        // Récupérer les objets
        $nomCompletArray = $this->spectacle();
        $nomCompletMusee = $this->musee();
        
        // Fusionner les deux tableaux
        $full = array_merge($nomCompletArray, $nomCompletMusee);

        return $full;
    }
}
