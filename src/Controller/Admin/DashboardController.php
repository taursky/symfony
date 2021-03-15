<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\Article;
use App\Entity\ArticleCategory;
use App\Entity\Comment;
use App\Entity\Tag;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
//        return parent::index();

        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Админка Taursky');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Панель Админки', 'fa fa-home');
//        yield MenuItem::linkToLogout('Logout', 'fa fa-exit');
        yield MenuItem::linkToCrud('user', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Категории статей', 'fas fa-list-ol', ArticleCategory::class);
        yield MenuItem::linkToCrud('Статьи', 'fas fa-newspaper', Article::class);
        yield MenuItem::linkToCrud('Тэги', 'fa fa-pencil-square-o', Tag::class);
        yield MenuItem::linkToCrud('Коментарии', 'fas fa-comment', Comment::class);
    }
}
