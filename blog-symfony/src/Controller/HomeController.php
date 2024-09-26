<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(ArticleRepository $articleRepository): Response
    {
        $latestArticles = $articleRepository->findBy([], ['createdAt' => 'DESC'], 6);

        return $this->render('home/home.html.twig', [
            'latest_articles' => $latestArticles,
        ]);
    }
}