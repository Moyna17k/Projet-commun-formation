<?php

// src/Controller/ContactController.php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
            $email = (new TemplatedEmail())
                ->from($formData['email'])
                ->to('votre@email.com')
                ->text($formData['message'])
                ->priority(Email::PRIORITY_HIGH)
                ->htmlTemplate('mail/contact.html.twig')
                ->context([
                    'nom' => $formData['nom'],
                    'prenom' => $formData['prenom'],
                    'message' => $formData['message'],
                ]);
                
            $mailer->send($email);

            // Redirigez ou affichez un message de confirmation
            
        }
        

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
