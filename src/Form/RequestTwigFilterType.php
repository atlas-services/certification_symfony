<?php

namespace App\Form;

use App\Form\RequestHeaderChoiceType;
use App\Form\RequestMethodChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class RequestTwigFilterType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('header_value', TextareaType::class,
        [
            'label' => 'form.input',
        ])
            ->add('myfilter', TwigFilterChoiceType::class,
                [
                    'label' => 'form.twig_filter',
                    'attr' => [
                        'id' => 'myfilter',
                        'onclick' => 'handleArguments()',
                    ]
                ])
            ->add('arguments', TextType::class,
            [
                'label' => 'form.arguments_value',
                'label_attr' => [
                    'id' => 'label_arguments',
                    'class' => 'd-none',
                ],
                'required' => false,
                'attr' => [
                    'id' => 'arguments',
                    'class' => 'd-none',
                ]
            ])
            ->add('test', SubmitType::class, 
                [
                    'label' => 'form.test',
                    'attr' => [
                        'class' => 'btn btn-success',
                        'data-bs-toggle' => "modal",
                        'data-bs-target' => "#modal",
                    ]
                ])
        ;
    }

}