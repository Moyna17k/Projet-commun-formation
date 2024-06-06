<?php

namespace App\Controller;

use App\Services\RestaurantServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RestaurantController extends AbstractController
{
    public function __construct(
        Private RestaurantServices $restaurant
    ){}
    #[Route('/restaurant', name: 'app_restaurant')]
    public function index(): Response
    {
        return $this->render('restaurant/index.html.twig', [
            'restaurant' => $this->restaurant->restaurant(),
        ]);
    }
}
