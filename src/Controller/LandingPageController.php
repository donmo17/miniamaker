<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
final class LandingPageController extends AbstractController
{
    #[Route('/landing/add', name: 'lp_add', methods: ['GET', 'POST'])]
    public function add(): Response
    {   
        $user = $this->getUser()->getRoles()[0];

        if($user !== "ROLE_PRO" && $user !== "ROLE_AGENT") {
                return $this->redirectToRoute('app_detail');
        }
        // TODO : Formulaire d'ajout d'une lp
        return $this->render('landing_page/index.html.twig', [
            'controller_name' => 'LandingPageController',
        ]);
    }
}
