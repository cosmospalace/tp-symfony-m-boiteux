<?php

namespace App\Form;

use App\Entity\Qualification;
use App\Entity\Pilote;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class QualificationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code', TextType::class, [

                'constraints'=>
                    [
                        new NotBlank(['message' => 'Champs obligatoire']),
                        new Length([
                            'max' => 3,
                            'maxMessage' => '{{ limit }} caractères maximum'
                        ]),
                    ]

            ])
            ->add('libelle', TextType::class, [

                'constraints'=>
                    [
                        new NotBlank(['message' => 'Champs obligatoire']),
                        new Length([
                            'min' => 4,
                            'minMessage' => '{{ limit }} caractères minimum'
                        ]),
                    ]

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Qualification::class,
        ]);
    }
}
