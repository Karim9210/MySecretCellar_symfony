<?php

namespace App\Form;

use App\Entity\Wine;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('domaine')
            ->add('description')
            ->add('comment')
            ->add('ranking')
            ->add('price')
            ->add('stock')
            ->add('value')
            ->add('cellarLocation')
            ->add('picture')
            ->add('drinkBefore')
            ->add('vintage')
            ->add('purchaseDate')
            ->add('color')
            ->add('country')
            ->add('region')
            ->add('appellation')
            ->add('type')
            ->add('grapeVariety')
            ->add('winePairing')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Wine::class,
        ]);
    }
}
