<?php

namespace App\Controller;

use App\Entity\Champion;
use App\Form\ChampionType;
use App\Repository\ChampionRepository;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChampionController extends AbstractController
{
    /**
     * @Route("/", name="champion")
     */
    public function homepage(ChampionRepository $champRepo): Response
    {
        return $this->render('champion/browse.html.twig', [
            'champion_list' => $champRepo->findAll(),
        ]);
    }

        /**
     * @Route("/add", name="champion_add")
     */
    public function index(Request $request, FileUploader $fileUploader): Response
    {
        $champion = new Champion();
        $form = $this->createForm(ChampionType::class, $champion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $champion = $form->getData();

            // On associe le user connecté à la champion
            // $champion->setUser($this->getUser());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($champion);
            $entityManager->flush();

            // on gère l'image après un 1er flush car on a besoin de l'id pour générer le nom
            $image = $form->get('image')->getData();
            $fileUploader->movechampionImage($image, $champion);

            // il faut penser à flush à nouveau pour prendre en compte le nom de l'image
            $entityManager->flush();

            $this->addFlash('success', 'champion ajoutée');

            return $this->redirectToRoute('champion');
        }

        return $this->render('champion/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
