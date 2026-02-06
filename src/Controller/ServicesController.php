<?php

namespace App\Controller;

use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ServicesController extends AbstractController
{
    #[Route('/services', name: 'app_services')]
    public function index(ServiceRepository $serviceRepository): Response
    {
        $services = $serviceRepository->findAll();
        /*
        $services = [
            [
                'name' => 'Développement web',
                'description' => 'Création de sites et applications web modernes et performants.'
            ],
            [
                'name' => 'Conseil technique',
                'description' => 'Accompagnement dans vos choix technologiques et architectures.'
            ],
            [
                'name' => 'Audit de code',
                'description' => 'Analyse de la qualité, sécurité et maintenabilité de vos projets.'
            ],
            [
                'name' => 'Maintenance applicative',
                'description' => 'Suivi, corrections et évolutions de vos applications existantes.'
            ]
        ];
        */

        return $this->render('services/index.html.twig', [
            'services' => $services,
        ]);
    }
}
