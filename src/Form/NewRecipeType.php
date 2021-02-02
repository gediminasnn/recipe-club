<?php

namespace App\Form;

use App\Entity\Recipe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\LessThan;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\PositiveOrZero;

class NewRecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class, [
                'label' => 'Title',
                'constraints' => [
                    new NotBlank(['message' => 'Please enter a valid title']),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Message must be more than 6 characters long',
                        'max' => 254,
                        'maxMessage' => 'Message must be less than 254 characters long'])
                ],
                'attr' => [
                    'placeholder' => 'Enter title of the recipe' ,
                ],
            ])
            ->add('difficulty', TextType::class, [
                'label' => 'Difficulty',
                'attr' => [
                    'placeholder' => 'Difficulty out of 10' ,
                ],
                'constraints' => [
                    new LessThanOrEqual(['value' => '10', 'message' => 'Difficulty score must be less or equal to 10']),
                    new PositiveOrZero(['message' => 'Difficulty score must be positive or equal to 0']),
                ]
            ])
            ->add('notes', TextareaType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'The main recipe steps'], 'label' => 'Notes'
            ])
            ->add('prepareTime', IntegerType::class ,[
                'attr' => ['placeholder' => 'minutes to spend making this recipe'],
                'constraints' => [
                    new Positive(['message' => 'Prepare time must be more than 0']),
                    new LessThan(['value' => '180', 'message' => 'Prepare time mus be less than 180 minutes']),
                ]
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}
