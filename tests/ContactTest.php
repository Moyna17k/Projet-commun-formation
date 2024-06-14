<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Test\Transport\TestTransport;

class ContactControllerTest extends WebTestCase
{    public function test_form_submission_with_valid_data()
    {
        // Crée un client pour simuler les requêtes HTTP
        $client = static::createClient();
        
        // Envoie une requête GET à l'URL /contact
        $crawler = $client->request('GET', '/contact');

        // Sélectionne le formulaire et le remplit
        $form = $crawler->selectButton('Submit')->form([
            'contact[nom]' => 'John', 
            'contact[prenom]' => 'Doe',
            'contact[email]' => 'john.doe@example.com',
            'contact[sujet]' => 'Test Subject',
            'contact[message]' => 'Test Message',
        ]);

        // Soumet le formulaire
        $client->submit($form);

        // Vérifie que la réponse est réussie
        $this->assertResponseIsSuccessful();
        
        // Vérifie qu'un email a été envoyé
        $this->assertEmailCount(1);

        // Récupère le message email envoyé
        $email = $this->getMailerMessage();
        
        // Vérifie que l'email a été envoyé 
        $this->assertEmailHeaderSame($email, 'to', 'votre@email.com');
        
        // Vérifie que le corps du texte de l'email
        $this->assertEmailTextBodyContains($email, 'Test Message');
    }
}
