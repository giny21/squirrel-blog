<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use App\Entity\Page\Article\Article;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article/{id}", name="article")
     */
    public function getSingle(Article $article)
    {
        if(!$article->isPublic())
            throw new \Exception("Article not found");

        return $this->render('article/single-full.html.twig', [
            'controller_name' => 'ArticleController',
            'article' => $article
        ]);
    }
}
