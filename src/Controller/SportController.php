<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SportController extends AbstractController
{
    #[Route('/sport', name: 'app_sport')]
    public function index(): Response
    {
        return $this->render('sport/index.html.twig', [
            'controller_name' => 'SportController',
        ]);
    }

    #[Route('/sport/dev', name: 'app_dev_sport')]
    public function list(): Response
    {
        return $this->render('sport/list.html.twig', [
            'controller_name' => 'SportController',
        ]);
    }
}
