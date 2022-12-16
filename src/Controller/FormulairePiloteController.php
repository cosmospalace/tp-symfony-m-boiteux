<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormulairePiloteController extends AbstractController
{
    #[Route('/formulaire/pilote', name: 'app_formulaire_pilote')]
    public function index(): Response
    {
        return $this->render('formulaire_pilote/index.html.twig', [
            'controller_name' => 'FormulairePiloteController',
        ]);
    }
}
