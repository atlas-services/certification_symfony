<?php

namespace App\Form;

use App\Form\RequestHeaderChoiceType;
use App\Form\RequestMethodChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RequestHeaderType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('method', RequestMethodChoiceType::class,
                [
                    'label' => 'form.method',
                ])
            ->add('header_field', RequestHeaderChoiceType::class,
                [
                    'label' => 'form.header_field',
                ])
            ->add('header_value', TextType::class,
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