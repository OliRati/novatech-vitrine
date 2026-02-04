<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $company = [
            'name' => 'NovaTech',
            'slogan' => 'Des solutions numériques innovantes pour votre entreprise',
            'welcomeMessage' => 'Bienvenue chez NovaTech, votre partenaire technologique de confiance.'
        ];

        return $this->render('home/index.html.twig', [
            'company' => $company,
        ]);
    }
}
