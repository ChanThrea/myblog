<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function __construct(EntityManagerInterface $manager){
        $this->manager = $manager;
    }
    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        $articles = $this->manager->getRepository(Article::class)->findAll();
        // logique stockée dans une variable avec tous les articles

        return $this->render('home/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
