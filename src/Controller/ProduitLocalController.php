<?php

namespace App\Controller;

use App\Repository\ProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProduitLocalController extends AbstractController
{
    #[Route('/produitlocal', name: 'app_produit_local')]
    public function index(
        ProduitsRepository $produit,
    ): Response
    {
        $produits = $produit->findAll();
        return $this->render('produit_local/index.html.twig', [
            'produits' => $produits,
        ]);
    }
}
