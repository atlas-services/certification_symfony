<?php

namespace App\Certification\TemplatingTwig;

class Tests 
{
    public function test1($data){

        $filter = $data['myfilter'];
        $header_value = $data['header_value'];
        $arguments = isset($data['arguments']) ? $data['arguments']: null;
        if(!is_null($arguments)){
            $filter = $filter.'('.$arguments.')';
        }
        
        $array = [
            'input' => sprintf('Twig Filter :  "%s|%s" ' ,  $header_value, $filter),
            'output' => $header_value,
            'myfilter' => $filter,
        ];

        return $array;

    }
}
