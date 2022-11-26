<?php

namespace App\Form;

use App\Entity\Wine;
use App\Entity\GrapeVariety;
use App\Entity\WinePairing;
use App\Entity\Color;
use App\Entity\Country;
use App\Entity\Region;
use App\Entity\Appellation;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class WineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('user', HiddenType::class,[
                'data' => '1',
            ])
            ->add('picture')
            ->add('color', ChoiceType::class,[
                'choices'  => array(
                    'rouge' => 'rouge',
                    'rosé' => 'rose',
                    'blanc' => 'blanc',
                ),
                'label'=>'Couleur',
                // 'multiple' => false,
                'expanded' => true,
                'required' => true
            ])
            ->add('domaine', TextType::class,[
                'label'=> false
            ])
            ->add('type', TextType::class,[
                'label'=> false
            ])
            ->add('vintage', IntegerType::class,[
                'label'=> false
            ])
            ->add('appellation', EntityType::class, [
                'class' => Appellation::class,
                'choice_label' => 'labelAppellation',
                'label'=> false,
                // 'multiple' => true,
                // 'expanded' => true,
                'by_reference' => false
                ])
            ->add('region', EntityType::class, [
                'class' => Region::class,
                'choice_label' => 'labelRegion',
                // 'multiple' => true,
                // 'expanded' => true,
                'by_reference' => false,
                'label'=> false])
            ->add('country', EntityType::class, [
                'class' => Country::class,
                'choice_label' => 'labelCountry',
                // 'multiple' => true,
                // 'expanded' => true,
                'by_reference' => false,
                'label'=> false])
            ->add('description', TextType::class,[
                'label'=> false
            ])
            ->add('winePairing', EntityType::class, [
                'class' => WinePairing::class,
                'choice_label' => 'labelWinePairing',
                'multiple' => true,
                'expanded' => true,
                'mapped' => false,
                'label'=> false
                ])
            ->add('purchaseDate',DateType::class,[
                'label' => false,
            ])
            ->add('price', MoneyType::class,[
                'currency' => 'EUR',
                'label'=> false])
            ->add('drinkBefore', IntegerType::class,[
                'label'=> false
            ])
            ->add('value', MoneyType::class,[
                'currency' => 'EUR',
                'label'=> false
                ])
                ->add('ranking', IntegerType::class,[
                    'label'=> false
                ])
                ->add('comment', TextType::class,[
                    'label'=> false
                ])
            ->add('stock', IntegerType::class,[
                'label'=> false
            ])
            ->add('cellarLocation', TextType::class,[
                'label'=> false
            ])
            ->add('grapeVariety', EntityType::class, [
                'class' => GrapeVariety::class,
                'choice_label' => 'labelGrapeVariety',
                'multiple' => true,
                'expanded' => true,
                'by_reference' => false])
           
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Wine::class,
        ]);
    }
}
