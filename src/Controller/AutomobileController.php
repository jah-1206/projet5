<?php

namespace App\Controller;

use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AutomobileController extends AbstractController
{
    /**
     * @Route("/automobile", name="automobile")
     */
    public function index(ImageRepository $repository)
    {
        $images = $repository->findAllImages();
        return $this->render('gallery/automobile.html.twig', [
            'images' => $images
        ]);
    }
}
