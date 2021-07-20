<?php

namespace App\Controller\Admin;

use App\Entity\Gang;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GangCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Gang::class;
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
