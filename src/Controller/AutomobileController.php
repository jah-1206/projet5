<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AutomobileController extends AbstractController
{
    /**
     * @Route("/Automobile", name="automobile")
     */
    public function index()
    {
        return $this->render('gallery/automobile.html.twig', [
            'controller_name' => 'AutomobileController',
        ]);
    }
}
