<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\OptredenService;

#[Route('/optreden')]
class OptredenController extends AbstractController
{

    private $os;

    private function __construct(OptredenService $os) {
        $this->os = $os;
    }

    #[Route('/save', name: 'optreden_save')]
    public function saveOptreden()
    {
        $optreden = [
            "poppodium_id" => 1,
            "artiest_id" => 1, 
            "voorprogramma_id" => 2,
            "omschrijving" => "Een avondje blues uit het boekje...",
            "datum" => "2022-07-14",
            
            "prijs" => 3800,
            
            "ticket_url" => "https://melkweg.nl/ticket/",
            "afbeelding_url" => "https://melkweg.nl/optreden/plaatje.jpg"
        ];

        $result = $this->os->saveOptreden($optreden);
        dd($result);
    }

    #[Route('/delete', name: "optreden_delete")]
    public function deleteOptreden() {
        $optreden=2;
        $rep = $this->getDoctrine()->getRepository(Optreden::class);
        $result = $rep->deleteOptreden($optreden);
        dd($result);
    }
}
