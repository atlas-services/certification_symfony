<?php

namespace App\Certification\Exceptions;

class Tests 
{
    public function test1($data){

        $value = $data['header_value'];

        $try = $value;
        $catch = ' no exception';
        try {
            $try = $this->inverse($value) ;
        } catch (\Exception $e) {
            $catch ='Exception reçue : '.  $e->getMessage();
        } finally {
            $finaly = " tested value $value ";
        }  

        $output = sprintf( 'try : %s , catch : %s , finaly : %s', $try , $catch, $finaly );

        $array = [
            'input' => $value,
            'output' => $output
        ];
        return $array;
        
    }

    function inverse($x) {
        if (!$x) {
            throw new \Exception('Division par zéro.');
        }
        if (!is_int($x)) {
            throw new \Exception('Entier attendu pour une division.');
        }
        return 1/$x;
    }
}
