<?php

namespace App\Controller;

use App\Repository\SportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SportController extends AbstractController
{
    #[Route('/sport', name: 'app_sport')]
    public function index(
        SportRepository $sport,
    ): Response
    {
        $sports = $sport->findAll();
        return $this->render('sport/index.html.twig', [
            'sports' => $sports,
        ]);
    }

    #[Route('/sport/{slug}', name: 'app_sport_{slug}')]
    public function sportCategory(
        // On récupère le slug de l'url
        string $slug,
        SportRepository $sport
    ): Response
    {
        // On trouve le slug correspondant a celui de l'url
        $items = $sport->findBy(['slug' => $slug]);

        // on affiche la page correspondante au slug
        return $this->render('sport/category.html.twig', [
            'items' => $items,
        ]);
    }
}
