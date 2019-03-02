<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\Page\Header\HeaderRepository;
use App\Repository\Page\Article\ArticleRepository;
use App\Repository\User\UserRepository;

class HomepageController extends AbstractController
{
    /**
     * @var HeaderRepository
     */
    private $headerRepository;

    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(
        HeaderRepository $headerRepository, 
        ArticleRepository $articleRepository,
        UserRepository $userRepository)
    {
        $this->headerRepository = $headerRepository;
        $this->articleRepository = $articleRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $header = $this->headerRepository->findEnabled();
        $articles = $this->articleRepository->findPublished();
        $user = $this->userRepository->findBlogOwner();

        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            'header' => $header,
            'articles' => $articles,
            'user' => $user
        ]);
    }
}
