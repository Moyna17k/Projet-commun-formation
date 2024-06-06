<?php

namespace App\Controller;

use App\Services\ActiviteServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ActiviteController extends AbstractController
{
    public function __construct(
        Private ActiviteServices $activite
    ){}
    #[Route('/activite', name: 'app_activite')]
    public function index(): Response
    {
        return $this->render('activite/index.html.twig', [
            'activite' => $this->activite->activite(),
        ]);
    }
}
