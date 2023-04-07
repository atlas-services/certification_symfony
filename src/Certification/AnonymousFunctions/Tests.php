<?php

namespace App\Certification\AnonymousFunctions;

class Tests 
{
    public function test1($data){

        $value = $data['header_value'];

        $output =  preg_replace_callback('~-([a-z])~', function ($match) {
            return str_replace('-', ' ', strtoupper($match[0]));
        }, $value);    
        
        
        $array = [
            'input' => $value,
            'output' => $output,
        ];
        return $array;
    }
}
