<?php

namespace App\Controller;

use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EventsController extends AbstractController
{
    /**
     * @Route("/automobile/events", name="events")
     */
    public function index(ImageRepository $repository)
    {
        $images = $repository->findEventsImages();
        return $this->render('gallery/events.html.twig', [
            'images' => $images,
        ]);
    }
}
