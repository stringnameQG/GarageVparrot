<?php

namespace App\Form;

use App\Entity\Contactform;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ContactformType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('subject', TextType::class, [
                'attr' => [
                    'class' => 'input__formulairecontacte-subject',
                    'maxlength' => '255'
                ],
                'label' => 'Sujet'
            ])
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'input__formulairecontacte-name',
                    'maxlength' => '255'
                ],
                'label' => 'Nom'
            ])
            ->add('firstname', TextType::class, [
                'attr' => [
                    'class' => 'input__formulairecontacte-firstname',
                    'maxlength' => '255'
                ],
                'label' => 'Prénom'
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'input__formulairecontacte-email',
                    'maxlength' => '255'
                ],
                'label' => 'e-mail'
            ])
            ->add('phone', TelType::class, [
                'attr' => [
                    'class' => 'input__formulairecontacte-phone',
                    'min' => '10',
                    'max' => '10',
                ],
                'label' => 'Téléphone'
            ])
            ->add('missive', TextareaType::class, [
                'attr' => [
                    'resize' => 'none',
                    'class' => 'input__formulairecontacte-missive'
                ],
                'label' => 'Message'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contactform::class,
        ]);
    }
}
