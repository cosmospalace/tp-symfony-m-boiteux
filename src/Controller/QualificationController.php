<?php

namespace App\Controller;

use App\Entity\Qualification;
use App\Form\QualificationType;
use App\Repository\QualificationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QualificationController extends AbstractController
{
    /* APP_QUALIFICATION */
    #[Route('/qualification', name: 'app_qualification')]
    public function index(QualificationRepository $qualificationRepo): Response
    {
        $qualifs = $qualificationRepo->findAll();
        return $this->render('qualification/index.html.twig', [
            'controller_name' => 'QualificationController',
            'qualifications' => $qualifs,
        ]);
    }

    /* CREATE */
    #[Route('/qualification/create', name: 'create_qualification', methods:['GET', 'POST'])]
    public function create(Request $request, QualificationRepository $qualificationRepository)
    {
        $qualification = new Qualification();
        $form = $this->createForm(QualificationType::class, $qualification);
        $form->handleRequest($request);
        
        
        if ($form->isSubmitted() && $form->isValid()) {
            
                $qualificationRepository->save($qualification, true);
            
                return $this->redirectToRoute('app_qualification');
            }
            
        return $this->render('qualification/create.html.twig', [
                'formulaire' => $form->createView(),
                'titre' => 'Ajouter une qualification',
        ]);
    }


    /* SHOW */
    #[Route('/qualification/{id}', name: 'show_qualification', methods:['GET'])]
    public function show(Request $request, Qualification $qualification, int $id, QualificationRepository $qualificationRepository): Response
    {
        return $this->render('qualification/show.html.twig', [
            'qualification' => $qualification,
        ]);

    }

    /* EDIT */
    #[Route('/qualification/edit/{id}', name: 'edit_qualification', methods:['GET', 'POST'])]
    public function edit(Request $request, int $id, QualificationRepository $qualificationRepository, Qualification $qualification)
    {
        $form = $this->createForm(QualificationType::class, $qualification);
        $form->handleRequest($request);
        
        
        if ($form->isSubmitted() && $form->isValid()) {
            
                $qualificationRepository->save($qualification, true);
            
                return $this->redirectToRoute('app_qualification');
            }
            
        return $this->render('qualification/create.html.twig', [
                'formulaire' => $form->createView(),
                'titre' => 'Modifier une qualification',
        ]);
    }




    /* DELETE */
    #[Route('/qualification/delete/{id}', name: 'delete_qualification', methods:['GET'])]
    public function delete(Request $request, Qualification $qualification, int $id, QualificationRepository $qualificationRepository): Response
    {

        $qualificationRepository->remove($qualification, true);
        return $this->redirectToRoute('app_qualification');

    }
    
    
    
}
