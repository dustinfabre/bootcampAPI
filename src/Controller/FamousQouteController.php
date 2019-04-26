<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\FamousQoute;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Famous Qoute controller.
 * @Route("/api", name="api_")
 */
class FamousQouteController extends FOSRestController
{

    /**
     * Get Random Qoutes
     * @Rest\Get("/qoute")
     * 
     * @return Response
     */
    public function getQoute()
    {
        $repository = $this->getDoctrine()->getRepository(FamousQoute::class);
        $famous_qoute = $repository->findall();
        return $this->handleView($this->view($famous_qoute));
    }

    /**
     * Add Qoutations
     * @Rest\Post("/qoute")
     * 
     * @return Response
     */
    public function store(Request $request)
    {
        $author = new Author;
        $author->setName($request->query->get('name'));

        $famous_qoute = new FamousQoute;
        $famous_qoute->setQuote($request->query->get('qoute'));
        $famous_qoute->setAuthor($author);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($author);
        $entityManager->persist($famous_qoute);
        $entityManager->flush();
        return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));
        
    }
}
