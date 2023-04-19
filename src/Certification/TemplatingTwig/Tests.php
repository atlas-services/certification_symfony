<?php

namespace App\Certification\TemplatingTwig;

class Tests 
{
    public function test1($data){

        $filter = $data['myfilter'];
        $header_value = $data['header_value'];
        $arguments = $data['arguments'];
        if(!is_null($arguments)){
            $filter = $filter.'('.$arguments.')';
        }

        
        $array = [
            'input' => sprintf('Filter : "%s", value : %s" ' ,  $filter, $header_value),
            'output' => $header_value,
            'myfilter' => $filter,
        ];

        return $array;

    }
}
