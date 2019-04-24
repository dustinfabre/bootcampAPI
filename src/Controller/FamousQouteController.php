<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FamousQouteController extends AbstractController
{
    /**
     * @Route("/famous/qoute", name="famous_qoute")
     */
    public function index()
    {
        return $this->render('famous_qoute/index.html.twig', [
            'controller_name' => 'FamousQouteController',
        ]);
    }
}
