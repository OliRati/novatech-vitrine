<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(): Response
    {
        $contact = [
            'email' => 'contact@novatech.fr',
            'phone' => '+33 1 23 45 67 89',
            'address' => '12 rue de l’Innovation, 75000 Paris'
        ];

        return $this->render('contact/index.html.twig', [
            'contact' => $contact,
        ]);
    }
}
