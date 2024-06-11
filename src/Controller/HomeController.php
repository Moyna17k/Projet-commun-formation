<?php

namespace App\Controller;

use App\Services\HotelServices;
use App\Services\RestaurantServices;
use App\Services\SpectacleServices;
use App\Services\ActiviteServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    public function __construct(
        Private SpectacleServices $spectacle,
        Private RestaurantServices $restaurant,
        Private HotelServices $hotel,
        Private ActiviteServices $activite
    ){}
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'restaurant' => $this->restaurant->restaurant(),
            'hotel' => $this->hotel->hotel(),
            'events' => $this->spectacle->full(),
            'activite' => $this->activite->activite(),
        ]);
    }
}