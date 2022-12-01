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
use App\Entity\Type;
use App\Repository\AppellationRepository;
use App\Repository\EntityRepository;
use App\Repository\RegionRepository;
use App\Repository\CountryRepository;
use App\Repository\GrapeVarietyRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class WineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('wineFile', VichFileType::class, [
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_uri' => true, // not mandatory, default is true
                'label' => false,
            ])
            ->add('color', EntityType::class, [
                'class' => Color::class,
                'choice_label'  => 'labelColor',
                'label' => false,
                'expanded' => true,
                'required' => true
            ])
            ->add('domaine', TextType::class, ['label' => false])
            ->add('type', EntityType::class, [
                'class' => Type::class,
                'choice_label'  => 'labelType',
                'label' => false
            ])
            ->add('vintage', IntegerType::class, [
                'label' => false
            ])
            ->add('appellation', EntityType::class, [
                'mapped' => true,
                'class' => Appellation::class,
                'choice_label' => 'labelAppellation',
                'label' => false,
                'query_builder' => function (AppellationRepository $er) {
                    return $er->createQueryBuilder('a')
                        ->orderBy('a.label', 'ASC');
                }
            ])
            ->add('region', EntityType::class, [
                'mapped' => true,
                'class' => Region::class,
                'choice_label' => 'labelRegion',
                // 'multiple' => true,
                // 'expanded' => true,
                'query_builder' => function (RegionRepository $er) {
                    return $er->createQueryBuilder('r')
                        ->orderBy('r.label', 'ASC');
                },
                'label' => false
            ])
            ->add('country', EntityType::class, [
                'mapped' => true,
                'class' => Country::class,
                'choice_label' => 'labelCountry',
                // 'multiple' => true,
                // 'expanded' => true,
                'label' => false,
                'query_builder' => function (CountryRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.label', 'ASC');
                }
            ])
            ->add('description', TextareaType::class, ['label' => false])
            ->add('winePairing', EntityType::class, [
                'class' => WinePairing::class,
                'choice_label' => 'labelWinePairing',
                'multiple' => true,
                'expanded' => true,
                'mapped' => false,
                'label' => false,

            ])
            ->add('purchaseDate', DateType::class, ['label' => false])
            ->add('price', MoneyType::class, ['currency' => 'EUR', 'label' => false])
            ->add('drinkBefore', IntegerType::class, ['label' => false])
            ->add('value', MoneyType::class, ['currency' => 'EUR', 'label' => false])
            ->add('ranking', ChoiceType::class, [
                'label' => false,
                'expanded' => true,
                'choices' => [
                    '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'
                ],
            ])
            ->add('comment', TextareaType::class, ['label' => false])
            ->add('stock', IntegerType::class, ['label' => false])
            ->add('cellarLocation', TextType::class, ['label' => false])
            ->add('grapeVariety', EntityType::class, [
                'class' => GrapeVariety::class,
                'choice_label' => 'labelGrapeVariety',
                'multiple' => true,
                'expanded' => false,
                'by_reference' => false,
                'label' => false,
                'query_builder' => function (GrapeVarietyRepository $er) {
                    return $er->createQueryBuilder('g')
                        ->orderBy('g.label', 'ASC');
                }
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Wine::class,
        ]);
    }
}
