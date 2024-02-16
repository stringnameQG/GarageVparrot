<?php

namespace App\Form;

use App\Entity\Car;
use Doctrine\Common\Collections\Expr\Value;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'input__name'
                ],
                'label' => 'Titre'
            ])
            ->add('price', IntegerType::class, [
                'attr' => [
                    'class' => 'input__price'
                ],
                'label' => 'Prix'
            ])
            ->add('killometering', IntegerType::class, [
                'attr' => [
                    'class' => 'input__killometering'
                ],
                'label' => 'Kilométrage'
            ])
            ->add('circulation', IntegerType::class, [
                'attr' => [
                    'class' => 'input__circulation'
                ],
                'label' => 'Mise en circulation'
            ])
            ->add('brand', TextType::class, [
                'attr' => [
                    'class' => 'input__brand'
                ],
                'label' => 'Marque',
                'required' => false
            ])
            ->add('model', TextType::class, [
                'attr' => [
                    'class' => 'input__model'
                ],
                'label' => 'Modèle',
                'required' => false
            ])
            ->add('fuel', TextType::class, [
                'attr' => [
                    'class' => 'input__fuel'
                ],
                'label' => 'Carburant',
                'required' => false
            ])
            ->add('gearbox', TextType::class, [
                'attr' => [
                    'class' => 'input__gearbox'
                ],
                'label' => 'Boîte de vitesse',
                'required' => false
            ])
            ->add('color', TextType::class, [
                'attr' => [
                    'class' => 'input__color'
                ],
                'label' => 'Couleur',
                'required' => false
            ])
            ->add('numberofdoors', IntegerType::class, [
                'attr' => [
                    'class' => 'input__numberofdoors'
                ],
                'label' => 'Nombre de portes',
                'required' => false
            ])
            ->add('fiscalpower', IntegerType::class, [
                'attr' => [
                    'class' => 'input__fiscalpower'
                ],
                'label' => 'Puissance fiscale',
                'required' => false
            ])
            ->add('powerdin', IntegerType::class, [
                'attr' => [
                    'class' => 'input__powerdin'
                ],
                'label' => 'Puissance DIN',
                'required' => false
            ])
            ->add('otherinfo', TextareaType::class, [
                'attr' => [
                    'class' => 'input__otherinfo',
                    'resize' => 'none'
                ],
                'label' => 'Autre infos',
                'required' => false
            ])

        // On ajoute le champ "image" dans le formulaire
        // le champ n'est pas lié a la bdd (mapped false)
            ->add('pictures', FileType::class, [
                'attr' => [
                    'class' => 'input__pictures',
                    'accept' => 'image/*'
                ],
                'label' => 'Images',
                'multiple' => true,
                'mapped' => false,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
