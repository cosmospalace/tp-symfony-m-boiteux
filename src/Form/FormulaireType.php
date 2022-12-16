<?php


namespace App\Form;

use App\Entity\Pilote;
use App\Entity\Qualification;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class FormulaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [

                'constraints'=>
                    [
                        new NotBlank(['message' => 'Champs obligatoire']),
                        new Length([
                            'min' => 4,
                            'minMessage' => '{{ limit }} caractères minimum'
                        ]),
                    ]

            ])

            ->add('prenom', TextType::class, [

                'constraints'=>
                    [
                        new NotBlank(['message' => 'Champs obligatoire']),
                        new Length([
                            'min' => 4,
                            'minMessage' => '{{ limit }} caractères minimum'
                        ]),
                    ]

            ])

            ->add('email', EmailType::class, [

                'constraints'=>
                    [
                        new NotBlank(['message' => 'Champs obligatoire']),
                    ]

            ])

            ->add('pilote', EntityType::class, [
                'class' => Qualification::class,
                'choice_label' => function ($qualification) {
                    return $qualification->getLibelle();
                },
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pilote::class,
        ]);
    }
}
