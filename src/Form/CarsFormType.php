<?php

namespace App\Form;

use App\Entity\Cars;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('model', EntityType::class, [
                'class' => Cars::class,
                'choice_label' => 'name',
            ])
            ->add('name', ChoiceType::class, [
                'choices' => [
                    'Elegy RC' => 'Elegy RC',
                    'Elegy RH8' => 'Elegy RH8',
                    'Sultan RS' => 'Sultan RS',
                    'Kamacho' => 'Kamacho',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
