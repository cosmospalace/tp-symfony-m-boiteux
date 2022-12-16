<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormulaireQualificationController extends AbstractController
{
    #[Route('/formulaire/qualification', name: 'app_formulaire_qualification')]
    public function index(): Response
    {
        return $this->render('formulaire_qualification/index.html.twig', [
            'controller_name' => 'FormulaireQualificationController',
        ]);
    }
}
