<?php

namespace App\Controller;

use App\Entity\Champion;
use App\Form\ChampionType;
use App\Repository\ChampionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/champion")
 */
class ChampionController extends AbstractController
{
    /**
     * @Route("/", name="champion_list", methods={"GET"})
     */
    public function index(ChampionRepository $championRepository): Response
    {
        return $this->render('champion/list.html.twig', [
            'champions' => $championRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{name}", name="champion_show", methods={"GET"})
     */
    public function show(Champion $champion): Response
    {
        return $this->render('champion/show.html.twig', [
            'champion' => $champion,
        ]);
    }

    /**
     * @Route("/{name}/edit", name="champion_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Champion $champion): Response
    {
        $form = $this->createForm(ChampionType::class, $champion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('champion_list');
        }

        return $this->render('champion/edit.html.twig', [
            'champion' => $champion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{name}", name="champion_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Champion $champion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$champion->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($champion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('champion_list');
    }
}
