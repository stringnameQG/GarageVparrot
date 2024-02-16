<?php

namespace App\Form;

use App\Entity\View;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ViewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'input__avis-nom',
                    'maxlength' => '255'
                ],
                'label' => 'Nom'
            ])
            ->add('firstName', TextType::class, [
                'attr' => [
                    'class' => 'input__avis-prenom',
                    'maxlength' => '255'
                ],
                'label' => 'Prénom'
            ])
            ->add('score', IntegerType::class, [
                'attr' => [
                    'class' => 'input__avis-note',
                    'min' => '0',
                    'max' => '5',
                ],
                'label' => 'Note'
            ])
            ->add('comment', TextareaType::class, [
                'attr' => [
                    'resize' => 'none',
                    'class' => 'input__avis-commentaire'
                ],
                'label' => 'Commentaire'
            ])
            ->add('active', CheckboxType::class, [
                'attr' => [
                    'class' => 'input__avis-active'
                ],
                'label'    => 'Valider',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => View::class,
        ]);
    }
}
