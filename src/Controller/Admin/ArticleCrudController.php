<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\ArticleCategory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ArticleCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Article::class;
    }


    public function configureFields(string $pageName): iterable
    {

        return [
//            ChoiceField::new('category')
//                ->allowMultipleChoices()
//            ->setChoices(function (){
//
//                return ['symfony' => 1, 'laravel' => 2];
//            })
//            ,
            AssociationField::new('category', 'Категория статьи')
                ->setSortable(true)
//                ->autocomplete()
//                ->onlyWhenCreating()
                ->onlyOnForms(),
            TextField::new('title', 'Название'),
            AssociationField::new('tags', 'Тэги'),
            AssociationField::new('author', 'Автор')->onlyOnForms(),
            DateField::new('createDate', 'Дата создания'),
            TextField::new('link', 'Ссылка'),

//            ImageField::new('image')->setUploadDir('images/articles'),
            IntegerField::new('sort', 'Сортировка при выводе'),
            IntegerField::new('views', 'Просмотры')
                ->setHelp('Можно поставить просмотры чтобы отображалось в списке статей и в самой статье.'),
            TextEditorField::new('text', 'Содержание статьи')
                ->onlyOnForms(),
            TextEditorField::new('shortText', 'Краткое содержание статьи')
                ->onlyOnForms()
                ->setHelp('Выводится в списке статей под заголовком.'),
            IntegerField::new('sort', 'Сортировка')
                ->setHelp('чем больше значение, тем ниже будет показываться статья, 0 первая 1 000 000 в конце.'),
            BooleanField::new('isVisible', 'Видимость')
                ->setHelp('Если убрать галку, то никто не увидит статью.'),
        ];
    }

}
