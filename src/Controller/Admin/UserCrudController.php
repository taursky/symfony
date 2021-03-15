<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
//            IdField::new('id'),
            EmailField::new('email'),
            ArrayField::new('roles', 'Роли пользователя'),
            TextField::new('password', 'Пароль пользователя'),
            BooleanField::new('isVerified', 'Проверенный пользователь'),

//            TextEditorField::new('description'),
        ];
    }

}
