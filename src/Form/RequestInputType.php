<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RequestInputType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('header_value', TextType::class, [
                    'label'=>"form.input",
                ])
            ->add('test', SubmitType::class, [
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