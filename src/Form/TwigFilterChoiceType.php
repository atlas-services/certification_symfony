<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TwigFilterChoiceType extends AbstractType
{

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => [
                'abs' => 'abs',
                'batch' => 'batch',
                'capitalize' => 'capitalize',
                'column' => 'column',
                'convert_encoding' => 'convert_encoding',
                'country_name' => 'country_name',
                'currency_name' => 'currency_name',
                'currency_symbol' => 'currency_symbol',
                'data_uri' => 'data_uri',
                'date' => 'date',
                'date_modify' => 'date_modify',
                'default' => 'default',
                'escape' => 'escape',
                'filter' => 'filter',
                'first' => 'first',
                'format' => 'format',
                'format_currency' => 'format_currency',
                'format_date' => 'format_date',
                'format_datetime' => 'format_datetime',
                'format_number' => 'format_number',
                'format_time' => 'format_time',
                'html_to_markdown' => 'html_to_markdown',
                'inline_css' => 'inline_css',
                'inky_to_html' => 'inky_to_html',
                'join' => 'join',
                'json_encode' => 'json_encode',
                'keys' => 'keys',
                'language_name' => 'language_name',
                'last' => 'last',
                'length' => 'length',
                'locale_name' => 'locale_name',
                'lower' => 'lower',
                'map' => 'map',
                'markdown_to_html' => 'markdown_to_html',
                'merge' => 'merge',
                'nl2br' => 'nl2br',
                'number_format' => 'number_format',
                'raw' => 'raw',
                'reduce' => 'reduce',
                'replace' => 'replace',
                'reverse' => 'reverse',
                'round' => 'round',
                'slice' => 'slice',
                'slug' => 'slug',
                'sort' => 'sort',
                'spaceless' => 'spaceless',
                'split' => 'split',
                'striptags' => 'striptags',
                'timezone_name' => 'timezone_name',
                'title' => 'title',
                'trim' => 'trim',
                'u' => 'u',
                'upper' => 'upper',
                'url_encode' => 'url_encode',
            ],
        ]);
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }
}