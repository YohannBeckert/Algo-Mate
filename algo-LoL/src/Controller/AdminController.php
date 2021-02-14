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
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="admin")
     */
    public function index(ChampionRepository $championRepository): Response
    {
        return $this->render('admin/index.html.twig',[
            'champion' => $championRepository->findAll()
        ]);
    }

    /**
     * @Route("/add/champion", name="admin_add_champ", methods={"GET","POST"})
     */
    public function addChampion(Request $request): Response
    {
        $champion = new Champion();
        $form = $this->createForm(ChampionType::class, $champion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $champion = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($champion);
            $entityManager->flush();

            $this->addFlash('success', 'champion ajouté');

            return $this->redirectToRoute('admin');
        }

        return $this->render('champion/admin/add_champ.html.twig', [
            'champion' => $champion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/edit/champion", name="admin_edit_champ")
     */
    public function editChampion(ChampionRepository $championRepository): Response
    {
        return $this->render('champion/admin/edit_champ.html.twig',[
            'champion' => $championRepository->findAll()
        ]);
    }

    /**
     * @Route("/delete/champion", name="admin_delete_champ")
     */
    public function deleteChampion(ChampionRepository $championRepository): Response
    {
        return $this->render('champion/admin/delete_champ.html.twig',[
            'champion' => $championRepository->findAll()
        ]);
    }
}
