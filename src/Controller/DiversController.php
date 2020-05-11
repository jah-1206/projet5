<?php

namespace App\Controller;

use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DiversController extends AbstractController
{
    /**
     * @Route("/automobile/divers", name="divers")
     */
    public function index(ImageRepository $repository)
    {
        $images = $repository->findDiversImages();
        return $this->render('gallery/divers.html.twig', [
            'images' => $images
        ]);
    }
}
