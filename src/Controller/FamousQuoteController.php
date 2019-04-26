<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\FamousQuote;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Famous Quote controller.
 * @Route("/api", name="api_")
 */
class FamousQuoteController extends FOSRestController
{

    /**
     * Get Random Quotes
     * @Rest\Get("/quote")
     * 
     * @return Response
     */
    public function getQuotes()
    {
        $repository = $this->getDoctrine()->getRepository(FamousQuote::class);
        $famous_quote = $repository->findall();
        return $this->handleView($this->view($famous_quote));
    }

    /**
     * Add Quotations
     * @Rest\Post("/quote")
     * 
     * @return Response
     */
    public function store(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Author::class);
        $author = $repository->findOneBy(['name' => $request->request->get('name')]);
        if(empty($author)){
            $author = new Author;
            $author->setName($request->request->get('name'));
        }

        $famous_quote = new FamousQuote;
        $famous_quote->setQuote($request->request->get('quote'));
        $famous_quote->setAuthor($author);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($author);
        $entityManager->persist($famous_quote);
        $entityManager->flush();
        return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));
    }

    /**
     * Update Quotations
     * @Rest\Put("/quote")
     * 
     * @return Response
     */
    public function update(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $famous_quote = $entityManager->getRepository(FamousQuote::class)->find($request->request->get('id'));

        if (!$famous_quote) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
    
        $famous_quote->setName($request->request->get('id'));
        $entityManager->flush();
        return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));
    }

}
