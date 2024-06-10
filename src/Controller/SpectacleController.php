<?php

namespace App\Controller;

use App\Services\SpectacleServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SpectacleController extends AbstractController
{
    public function __construct(
        Private SpectacleServices $spectacle
    ){}
    #[Route('/spectacle', name: 'app_spectacle')]
    public function index(): Response
    {
        return $this->render('spectacle/index.html.twig', [
            'spectacle' => $this->spectacle->full(),
        ]);
    }
}
