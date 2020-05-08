<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NatureController extends AbstractController
{
    /**
     * @Route("/nature", name="nature")
     */
    public function index()
    {
        return $this->render('gallery/nature.html.twig', [
            'controller_name' => 'NatureController',
        ]);
    }
}
