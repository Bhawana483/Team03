<?php

namespace App\Controller\Admin;

use App\Entity\Review;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;


class ReviewCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Review::class;
    }
    public function configureActions(Actions $actions): Actions
    {

        return $actions
             ->setPermission(Action::DELETE, 'ROLE_ADMIN')
             ->setPermission(Action::EDIT, 'ROLE_ADMIN');
            // ->setPermission(Action::NEW, 'ROLE_ADMIN');
             
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            AssociationField::new('review_by'),
            TextField::new('review'),
            DateTimeField::new('createdAt')->hideOnIndex(),
        ];
    }
    
}
