<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RequestHeaderChoiceType extends AbstractType
{

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => [
                'Accept' => 'Accept',
                'Accept-Encoding' => 'Accept-Encoding',
                'Accept-Charset' => 'Accept-Charset',
                'Accept-Language' => 'Accept-Language',
                'Authorization' => 'Authorization',
                'Expect' => 'Expect',
                'From' => 'From',
                'Host' => 'Host',
                'If-Match' => 'If-Match',
                'If-Modified-Since' => 'If-Modified-Since',
                'If-None-Match' => 'If-None-Match',
                'If-Range' => 'If-Range',
                'If-Unmodified-Since' => 'If-Unmodified-Since',
                'Max-Forwards' => 'Max-Forwards',
                'Proxy-Authorization' => 'Proxy-Authorization',
                'Range' => 'Range',
                'Referer' => 'Referer',
                'TE' => 'TE',
                'User-Agent' => 'User-Agent',
            ],
        ]);
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }
}