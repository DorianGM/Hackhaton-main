<?php

namespace App\Controller;

use App\Entity\Favoris;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FavorisController extends AbstractController
{
    /**
     * @Route("/participants/{idP}/favoris", name="favoris")
     */
    public function index($idP): Response
    {
        $repository = $this->getDoctrine()->getRepository(Favoris::class);
        $lesFavs = $repository->findBy(array('idparti' => $idP));

        return $this->render('favoris/index.html.twig', [
            'favs' => $lesFavs,
        ]);
    }
}
