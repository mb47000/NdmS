<?php

namespace App\Controller\Admin;

use App\Entity\DevisDetails;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DevisDetailsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DevisDetails::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('devis'),
            AssociationField::new('task'),
            IntegerField::new('amount'),
            NumberField::new('unitPrice'),
            NumberField::new('labor'),
            NumberField::new('materials')
        ];
    }
    
}
