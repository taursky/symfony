<?php

namespace App\Twig;

use App\Entity\ArticleCategory;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;
use function Doctrine\ORM\QueryBuilder;

class MainMenuExtension extends AbstractExtension
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('filter_name', [$this, 'doSomething']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('main_menu_top', [$this, 'generateMainMenu']),
        ];
    }

    public function generateMainMenu()
    {
        $qb = $this->em->getRepository(ArticleCategory::class)->createQueryBuilder('c');
        $qb->andWhere('c.isVisible = :true')
            ->andWhere($qb->expr()->isNull('c.parent'))
//            ->orderBy('')
            ->setParameters([
                'true' => true,
            ])
        ;

        return $qb->getQuery()->getResult();;
    }

    public function doSomething($value)
    {
        // ...
    }
}
