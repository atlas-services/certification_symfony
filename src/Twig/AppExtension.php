<?php
// src/Twig/AppExtension.php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\Extension\StringLoaderExtension;
use Twig\TwigFilter;
use Twig\Environment;

class AppExtension extends AbstractExtension
{
    public function __construct(protected Environment $twig)
    {
        $this->twig->addExtension(new StringLoaderExtension());
    }
    public function getFilters()
    {
        return [
            new TwigFilter('apply_filter', [$this, 'applyFilter']),
        ];
    }

    public function applyFilter( $value, $filter)
    {

        $name = 'nomfiltre';

         if(str_contains($value, '[')){
             $value = str_replace(["'"], '"', $value);
             $value = json_decode($value, true);
         }

         $string_twig = sprintf(" 
         {%% set items = %s %%}
         {%% set output = items|%s %%}
         {{ output|json_encode()|raw }}
         ", $name, $filter);
 
        $template = $this->twig->createTemplate($string_twig);

        $context = [$name => $value];

        return $template->render($context);

    }
}