<?php

namespace App\Controller\Admin;

use App\Entity\SetCategory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SetCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SetCategory::class;
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
