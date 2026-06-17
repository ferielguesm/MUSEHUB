<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'Nom affiché',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Votre nom complet ou nom de scène',
                    'class' => 'form-control form-control-lg',
                ],
            ])
            ->add('bio', TextareaType::class, [
                'label' => 'Bio',
                'required' => false,
                'attr' => [
                    'rows' => 5,
                    'placeholder' => 'Présentez-vous, partagez votre univers artistique...',
                    'class' => 'form-control form-control-lg',
                ],
            ])
            ->add('avatar', FileType::class, [
                'label' => 'Photo de profil',
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'class' => 'form-control form-control-lg',
                ],
                'constraints' => [
                    new File([
                        'maxSize' => '5M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/webp',
                            'image/gif',
                        ],
                        'mimeTypesMessage' => 'Veuillez sélectionner une image (JPEG, PNG, WEBP ou GIF) de moins de 5 Mo.',
                    ]),
                ],
            ])
            ->add('currentPassword', PasswordType::class, [
                'label' => 'Mot de passe actuel',
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Requis pour changer de mot de passe',
                    'class' => 'form-control form-control-lg',
                    'autocomplete' => 'current-password',
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'label' => 'Nouveau mot de passe',
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Laissez vide si inchangé',
                    'class' => 'form-control form-control-lg',
                    'autocomplete' => 'new-password',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

