<?php

namespace App\Controller\Admin;

use App\Entity\RoleAdmin;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RoleAdminCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RoleAdmin::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
