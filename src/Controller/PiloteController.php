<?php

namespace App\Controller;

use App\Entity\Pilote;
use App\Form\FormulaireType;
use App\Repository\PiloteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PiloteController extends AbstractController
{
    /* APP_PILOTE */
    #[Route('/pilote', name: 'app_pilote')]
    public function index(PiloteRepository $piloteRepo): Response
    {
        $pilotes = $piloteRepo->findAll();
        return $this->render('pilote/index.html.twig', [
            'controller_name' => 'PiloteController',
            'pilotes' => $pilotes, 
        ]);
    }

    /* SHOW */
    #[Route('/pilote/{id}', name: 'show_pilote', requirements: ['id'=>'\d+'], methods: ['GET'])]
    public function show(Request $request, int $id, Pilote $pilote , PiloteRepository $piloteRepository): Response
    {
        return $this->render('pilote/show.html.twig', [
            'pilote' => $pilote,
        ]);
    }

    /* EDIT */
    #[Route('/pilote/edit/{id}', name: 'edit_pilote', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pilote $pilote, int $id, PiloteRepository $piloteRepository): Response
    {
        $form = $this->createForm(FormulaireType::class, $pilote);
        $form->handleRequest($request);
        
        
        if ($form->isSubmitted() && $form->isValid()) {
            
                $piloteRepository->save($pilote, true);
            
                return $this->redirectToRoute('app_pilote');
            }
            
        return $this->render('pilote/create.html.twig', [
                'formulaire' => $form->createView(),
                'titre' => 'Modifier un pilote',
        ]);
    }

    /* CREATE */
    #[Route('/pilote/create', name: 'create_pilote', methods: ['GET', 'POST'])]
    public function create(Request $request, PiloteRepository $piloteRepository ): Response
    {
        $pilote = new Pilote();
        $form = $this->createForm(FormulaireType::class, $pilote);
        $form->handleRequest($request);
        
        
        if ($form->isSubmitted() && $form->isValid()) {
            
                $piloteRepository->save($pilote, true);
            
                return $this->redirectToRoute('app_pilote');
            }
            
        return $this->render('pilote/create.html.twig', [
                'formulaire' => $form->createView(),
                'titre' => 'Ajouter un pilote',
        ]);
    }

    /* DELETE */
    #[Route('/pilote/delete/{id}', name: 'delete_pilote', methods: ['GET'])]
    public function delete(Request $request,Pilote $pilote, int $id, PiloteRepository $piloteRepository): Response
    {
        $piloteRepository->remove($pilote, true);
        return $this->redirectToRoute('app_pilote');
    }
}
