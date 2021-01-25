<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;



class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityPermission('ROLE_ADMIN')
            // ...
        ;
    }
    public function configureActions(Actions $actions): Actions
   
    {
        return $actions
            ->setPermission(Action::NEW,'ROLE_ADMIN')
            // ...
        ;
    }

    


    
    public function configureFields(string $pageName): iterable
    {
        return [
            EmailField::new('email'),
           // PasswordType::new('password'),
            ArrayField::new('roles'),
            BooleanField::new ('is_verified')
        ];
    }
    
}