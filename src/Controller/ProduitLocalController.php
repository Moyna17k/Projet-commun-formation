<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProduitLocalController extends AbstractController
{
    #[Route('/produitlocal', name: 'app_produit_local')]
    public function index(): Response
    {
        return $this->render('produit_local/index.html.twig', [
            'controller_name' => 'ProduitLocalController',
        ]);
    }
}
