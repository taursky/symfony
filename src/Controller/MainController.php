<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\ArticleCategory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
//            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     * @return Response
     */
    public function contact()
    {
        return $this->render('pages/contact.html.twig');
    }

    /**
     * @Route("/news", name="news")
     * @return Response
     */
    public function news()
    {
        return $this->render('pages/news.html.twig');
    }

    /**
     * @Route("articles/{category}", name="articles")
     */
    public function articles(ArticleCategory $category, Breadcrumbs $breadcrumbs)
    {

        $breadcrumbs->addItem("Главная ", $this->get("router")->generate("main"));

        // Without URL
        $breadcrumbs->addItem($category->getName());

        // With parameter injected into translation "user.profile"
//        $breadcrumbs->addItem($txt, $url, ["%user%" => $user->getName()]);


        return $this->render('pages/articles.html.twig', [
            'category' => $category,
        ]);
    }

    /**
     * @Route("products/{category}", name="products")
     */
    public function products(ArticleCategory $category)
    {


        return $this->render('pages/products.html.twig', [
            'category' => $category,
        ]);
    }

    /**
     * @Route("article/{article}", name="article_item")
     */
    public function articleItem(Article $article, Breadcrumbs $breadcrumbs)
    {
        $breadcrumbs->addItem("Главная ", $this->get("router")->generate("main"));

        $breadcrumbs->addItem($article->getCategory()->getName(), $this->get("router")->generate("articles", ['category' => $article->getCategory()->getId()]));
        // without URL
        $breadcrumbs->addItem($article->getTitle());

        return $this->render('pages/article_item.html.twig', [
            'article' => $article,
        ]);
    }
}
