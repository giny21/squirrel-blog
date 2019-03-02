<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\Page\Article\ArticleRepository;

class HomepageController extends AbstractController
{

    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $articles = $this->articleRepository->findPublished();

        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            'articles' => $articles
        ]);
    }
}
