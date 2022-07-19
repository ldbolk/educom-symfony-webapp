<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Artiest;

class ArtiestController extends AbstractController
{
    #[Route('/artiest', name: 'artiest')]
    public function index(): Response
    {
        $artiest = [
            "naam" => "Romulus",
            "genre" => "Jazz",
            "omschrijving" => "A popular upcoming legend",
            "afbeelding_url" => "google2.com",
            "website" => "facebook.com"
        ];

        $rep = $this->getDoctrine()->getRepository(Artiest::class);
        $result = $rep->saveArtiest($artiest);

        dd($result);
    }
}
