<?php

namespace App\Controller;

use App\Repository\ModeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ModeController extends AbstractController
{
    #[Route('/mode', name: 'app_mode')]
    public function index(
        ModeRepository $mode,
    ): Response
    {
        $modes = $mode->findAll();
        return $this->render('mode/index.html.twig', [
            'modes' => $modes,
        ]);
    }

    #[Route('/mode/{slug}', name: 'app_mode_{slug}')]
    public function modeCategory(
        string $slug,
        ModeRepository $mode
    ): Response
    {
        $items = $mode->findBy(['slug' => $slug]);
        return $this->render('mode/category.html.twig', [
            'items' => $items,
        ]);
    }
}
