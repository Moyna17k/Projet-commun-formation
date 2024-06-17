<?php

namespace App\Services;

class ActiviteServices
{
    public function activite()
    {

        // URL to send the request to
        $url = 'https://recherche-entreprises.api.gouv.fr/search?activite_principale=91.02Z&code_postal=17000';

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
        $count = 0; // Variable de comptage
        
        foreach ($r as $value) {
        
            $nomCompletArray[] = [
                'nom_complet' => $value['nom_complet'],
            ];
        
            $count++; // Incrémenter la variable de comptage
        
            if ($count == 3) {
                break; // Arrêter la boucle après avoir ajouté 15 éléments
            }
        }

        // Close the cURL session
        curl_close($ch);

        // Mélanger le tableau des entreprises de manière aléatoire
        shuffle($nomCompletArray);

        // Retourner le tableau des entreprises mélangé
        return $nomCompletArray;
    }
}