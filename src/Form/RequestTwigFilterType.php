<?php

namespace App\Form;

use App\Form\RequestHeaderChoiceType;
use App\Form\RequestMethodChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class RequestTwigFilterType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('myfilter', TwigFilterChoiceType::class,
                [
                    'label' => 'form.twig_filter',
                ])
            ->add('arguments', TextType::class,
                [
                    'label' => 'form.arguments_value',
                    'required' => false,
                ])
            ->add('header_value', TextareaType::class,
                [
                    'label' => 'form.header_value',
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