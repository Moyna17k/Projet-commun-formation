<?php

namespace App\Controller;

use App\Services\HotelServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HebergementController extends AbstractController
{
    public function __construct(
        Private HotelServices $hotel
    ){}

    #[Route('/hebergement', name: 'app_hebergement')]
    public function index(): Response
    {
        return $this->render('hebergement/index.html.twig', [
            'hotel' => $this->hotel->hotel()
        ]); 
    }
}
