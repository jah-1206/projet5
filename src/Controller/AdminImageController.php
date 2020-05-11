<?php

namespace App\Controller;

use App\Entity\Image;
use App\Form\ImageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ImageRepository;
use Doctrine\ORM\EntityManagerInterface;

class AdminImageController extends AbstractController {

    /**
     * @var PropertyRepository
     */
    private $repository;
    
    /**
     * @var EntityInterfaceManager
     */
    private $em;

    public function __construct(ImageRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * 
     * @Route("admin/images", name="images")
     */
    public function index() 
    {
        $images = $this->repository->findAllImages();
        return $this->render('admin/images.html.twig', [
            'images' => $images
        ]);
    }

    /**
     * 
     * @Route("admin/images/new", name="new")
     */
    public function new(Request $request) 
    {
        $image = new Image();
        $form = $this->createForm(ImageType::class, $image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->em->persist($image);
            $this->em->flush();
            $this->addFlash('success', 'photo ajoutée avec succès');
            return $this->redirectToRoute('images');
        }

        return $this->render('admin/new.html.twig', [
            'image' => $image,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="image_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Image $image): Response
    {
        if ($this->isCsrfTokenValid('delete'.$image->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($image);
            $entityManager->flush();
        }

        return $this->redirectToRoute('images');
    }
}
