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

    #[Route('/produitlocal/{slug}', name: 'app_produit_local_{slug}')]
    public function produitCategory(
        string $slug,
        ProduitsRepository $produit
    ): Response
    {
        $items = $produit->findBy(['slug' => $slug]);
        return $this->render('produit_local/category.html.twig', [
            'items' => $items,
        ]);
    }
}
