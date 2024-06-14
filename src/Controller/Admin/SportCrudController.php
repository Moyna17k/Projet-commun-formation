<?php

namespace App\Controller\Admin;

use App\Entity\Sport;
use Symfony\Bundle\SecurityBundle\Security;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SportCrudController extends AbstractCrudController
{

    public function __construct(
        private Security $security
        ) {
            $this->security = $security;
    }

    public static function getEntityFqcn(): string
    {
        return Sport::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        
        // Check if the user has the 'ROLE_BLOGUEUR'
        if ($this->security->isGranted('ROLE_BLOGUEUR')) {
            // Remove the NEW and EDIT actions for users with 'ROLE_BLOGUEUR'
            $actions
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->remove(Crud::PAGE_INDEX, Action::DELETE);
        }

        return $actions;
    }
    

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titre'),
            TextField::new('description'),
            TextField::new('adresse'),
            TextField::new('informations'),
            ImageField::new('image')
                ->setLabel("Image")
                ->setUploadDir('public/assets/images/')
                ->setBasePath('assets/images/'),
        ];
    }
}
