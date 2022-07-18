<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Psr\Log\LoggerInterface;


#[Route('/blog')]
class BlogController extends AbstractController
{
    #[Route('/', name: 'blog_list')]
    #[Template()]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/show/{id}', name: 'blog_show')]
    public function show($id = 1, LoggerInterface $logger) {

        $logger->info("info Message");
        $logger->Warning("Warning Message");
        $logger->error("De waarde van id is: $id");
        dd($id);
    }
    
}
