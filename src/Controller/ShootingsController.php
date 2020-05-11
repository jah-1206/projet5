<?php

namespace App\Controller;

use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShootingsController extends AbstractController
{
    /**
     * @Route("/automobile/shootings", name="shootings")
     */
    public function index(ImageRepository $repository)
    {
        $images = $repository->findShootingsImages();
        return $this->render('gallery/shootings.html.twig', [
            'images' => $images,
        ]);
    }
}
