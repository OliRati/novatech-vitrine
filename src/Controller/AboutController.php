<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AboutController extends AbstractController
{
    #[Route('/about', name: 'app_about')]
    public function index(): Response
    {
        $about = [
            'description' => 'NovaTech est une entreprise spécialisée dans le développement web et le conseil technique. Nous aidons les PME à réussir leur transformation digitale.',
            'year' => date('Y')
        ];

        return $this->render('about/index.html.twig', [
            'about' => $about,
        ]);
    }
}
