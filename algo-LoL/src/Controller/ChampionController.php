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
     * @Route("/", name="champion_index", methods={"GET"})
     */
    public function index(ChampionRepository $championRepository): Response
    {
        return $this->render('champion/list.html.twig', [
            'champions' => $championRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="champion_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $champion = new Champion();
        $form = $this->createForm(ChampionType::class, $champion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($champion);
            $entityManager->flush();

            return $this->redirectToRoute('champion_index');
        }

        return $this->render('champion/new.html.twig', [
            'champion' => $champion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="champion_show", methods={"GET"})
     */
    public function show(Champion $champion): Response
    {
        return $this->render('champion/show.html.twig', [
            'champion' => $champion,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="champion_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Champion $champion): Response
    {
        $form = $this->createForm(ChampionType::class, $champion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('champion_index');
        }

        return $this->render('champion/edit.html.twig', [
            'champion' => $champion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="champion_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Champion $champion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$champion->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($champion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('champion_index');
    }
}
