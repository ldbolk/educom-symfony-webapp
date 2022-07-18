<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Psr\Log\LoggerInterface;


#[Route('/blog')]
class BlogController extends BaseController
{
    /**
     * @Route("/{page}", name="blog_list", requirements={"page"="\d+"})
     */
    public function list($page) {
        // ...
    }

    #[Route('/show/{id}', name: 'blog_show')]
    public function show($id = 1) {
        $this->log("info Message from extended BaseController", "warning");
        dd($id);
        // ...
    }
    
}

// #[Route('/show/{id}', name: 'blog_show')]
// public function show($id = 1, LoggerInterface $logger) {

//     $logger->info("info Message");
//     $logger->Warning("Warning Message");
//     $logger->error("De waarde van id is: $id");
//     dd($id);
// }