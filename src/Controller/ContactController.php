<?php

// src/Controller/ContactController.php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Security\Core\Authorization\Strategy\PriorityStrategy;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérez les données du formulaire
            $formData = $form->getData();

            // Envoyez l'e-mail
            $email = (new Email())
                ->from($formData['email'])
                ->to('votre@email.com')
                ->subject($formData['sujet'])
                ->text($formData['message'])
                ->priority(Email::PRIORITY_HIGH);

            $mailer->send($email);

            // Redirigez ou affichez un message de confirmation
            
        }
        

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
