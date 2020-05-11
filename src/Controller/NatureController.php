<?php

namespace App\Controller;

use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NatureController extends AbstractController
{
    /**
     * @Route("/nature", name="nature")
     */
    public function index(ImageRepository $repository)
    {
        $images = $repository->findNatureImages();
        return $this->render('gallery/nature.html.twig', [
            'images' => $images
        ]);
    }
}
