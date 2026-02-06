<?php

namespace App\Controller;

use DateTimeImmutable;
use App\Entity\Service;
use App\Form\ServiceType;
use App\Repository\ServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class CrudServicesController extends AbstractController
{
    #[Route('/crud_services/order/{order}', name: 'crud_services')]
    public function index(ServiceRepository $serviceRepository, string $order): Response
    {
        $services = $order === "dsc" ? $serviceRepository->findAllOrderByDateDesc()
        : $serviceRepository->findAllOrderByDateAsc();

        /* $services = $serviceRepository->findAll(); */

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

        return $this->render('crud_services/index.html.twig', [
            'services' => $services,
        ]);
    }

    #[Route('/crud_services/new', 'new_services')]
    public function new(Request $req, EntityManagerInterface $em)
    {
        $service = new Service();

        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($req);
        if ($form->isSubmitted() && $form->isValid()) {
            $service->setCreatedAt(new DateTimeImmutable());
            $em->persist($service);
            $em->flush();
            return $this->redirectToRoute('crud_services', ['order' => 'asc']);
        }

        return $this->render('crud_services/new.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/crud_services/edit/{id}', 'edit_services')]
    public function edit(Request $req, EntityManagerInterface $em, Service $service)
    {
        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($req);
        if ($form->isSubmitted() && $form->isValid()) {
            $service->setCreatedAt(new DateTimeImmutable());
            $em->persist($service);
            $em->flush();
            return $this->redirectToRoute('crud_services', ['order' => 'asc']);
        }

        return $this->render('crud_services/edit.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/crud_services/del/{id}', 'del_services')]
    public function del(EntityManagerInterface $em, Service $service)
    {
        $em->remove($service);
        $em->flush();
        return $this->redirectToRoute('crud_services', ['order' => 'asc']);
    }
}
