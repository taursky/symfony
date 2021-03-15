<?php

namespace App\Controller\Admin;

use App\Entity\ArticleCategory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ArticleCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ArticleCategory::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
//            IdField::new('id'),
            AssociationField::new('parent')->onlyOnForms(),
            TextField::new('name'),
            TextField::new('link'),
            TextField::new('tag'),
            TextEditorField::new('description'),
            BooleanField::new('isVisible'),
        ];
    }

}
