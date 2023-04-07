<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RequestMethodChoiceType extends AbstractType
{

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => [
                'OPTIONS' => 'OPTIONS',
                'GET' => 'GET',
                'HEAD' => 'HEAD',
                'POST' => 'POST',
                'PUT' => 'PUT',
                'DELETE' => 'DELETE',
                'TRACE' => 'TRACE',
                'CONNECT' => 'CONNECT',
            ],
        ]);
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }
}