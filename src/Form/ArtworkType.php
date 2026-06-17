<?php

namespace App\Form;

use App\Entity\Artwork;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;

class ArtworkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $isNew = $options['is_new'] ?? true;
        
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre de l\'œuvre',
                'required' => true,
                'attr' => [
                    'placeholder' => 'Ex: La Nuit étoilée, Portrait de femme...',
                    'maxlength' => 255
                ],
                'help' => 'Donnez un titre accrocheur à votre œuvre (max 255 caractères)'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => true,
                'attr' => [
                    'rows' => 6,
                    'placeholder' => 'Décrivez votre œuvre : technique utilisée, inspiration, histoire...',
                    'maxlength' => 2000
                ],
                'help' => 'Une description détaillée aide les visiteurs à mieux apprécier votre œuvre (max 2000 caractères)',
                'constraints' => [
                    new NotBlank(['message' => 'La description est obligatoire']),
                    new \Symfony\Component\Validator\Constraints\Length([
                        'min' => 10,
                        'max' => 2000,
                        'minMessage' => 'La description doit contenir au moins {{ limit }} caractères',
                        'maxMessage' => 'La description ne peut pas dépasser {{ limit }} caractères'
                    ])
                ]
            ])
            ->add('price', MoneyType::class, [
                'label' => 'Prix de vente',
                'currency' => 'EUR',
                'required' => true,
                'attr' => [
                    'placeholder' => '0.00',
                    'min' => '0.01',
                    'step' => '0.01'
                ],
                'help' => 'Prix en euros (minimum 0.01€, maximum 1 000 000€)',
                'constraints' => [
                    new NotBlank(['message' => 'Le prix est obligatoire']),
                    new \Symfony\Component\Validator\Constraints\Positive(['message' => 'Le prix doit être positif']),
                    new \Symfony\Component\Validator\Constraints\LessThanOrEqual([
                        'value' => 1000000,
                        'message' => 'Le prix ne peut pas dépasser 1 000 000€'
                    ])
                ]
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'label' => 'Catégorie',
                'placeholder' => '-- Sélectionnez une catégorie --',
                'required' => true,
                'help' => 'Choisissez la catégorie qui correspond le mieux à votre œuvre',
                'constraints' => [
                    new NotBlank(['message' => 'La catégorie est obligatoire'])
                ]
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'Statut de publication',
                'choices' => [
                    'Visible (publié)' => 'visible',
                    'Masqué (brouillon)' => 'hidden',
                ],
                'expanded' => true,
                'multiple' => false,
                'help' => 'Choisissez "Visible" pour publier immédiatement, ou "Masqué" pour garder en brouillon',
                'data' => 'visible' // Default value
            ])
            ->add('imageFile', FileType::class, [
                'label' => 'Télécharger une image',
                'mapped' => false,
                'required' => $isNew, // Required for new artworks, optional for edits
                'attr' => [
                    'accept' => 'image/jpeg,image/png,image/webp,image/gif'
                ],
                'help' => $isNew 
                    ? 'Image obligatoire • Formats: JPG, PNG, GIF, WEBP • Taille max: 5 MB'
                    : 'Formats acceptés: JPG, PNG, GIF, WEBP • Taille max: 5 MB',
                'constraints' => [
                    new File([
                        'maxSize' => '5M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/webp',
                            'image/gif',
                        ],
                        'mimeTypesMessage' => 'Veuillez uploader une image valide (JPG, PNG, GIF, WEBP)',
                        'maxSizeMessage' => 'L\'image ne doit pas dépasser {{ limit }} {{ suffix }}'
                    ])
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Artwork::class,
            'is_new' => true, // Default to new artwork
        ]);
    }
}
