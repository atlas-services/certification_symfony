<?php

namespace App\Certification\HeaderFields;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpFoundation\Response;

class Tests
{
    public function __construct(
        private HttpClientInterface $client,
        private ParameterBagInterface $params,
    ) {
    }
    public function test1($api_request){

        $method = $api_request['method'];
        $header_field = $api_request['header_field'];
        $header_value = $api_request['header_value'];

        $api_formation = $this->params->get('APP_API_FORMATION');

        $response = $this->client->request(
            $method,
            $api_formation,
            [
                'headers' => [
                    $header_field => $header_value,
                ]
            ],
        );

        if(!empty($response->getInfo()['response_headers'])){
            $response_status_line = $response->getInfo()['response_headers'][0];
        }else{
            try{
                $response_status_code = $response->getStatusCode();
                $response_status_text = Response::$statusTexts[$response_status_code];   
                $response_status_line = sprintf('%s %s ' ,  $response_status_code, $response_status_text);   
            }catch(\Exception $e){
                $response_status_line = "503 Service Unavailable";
            }

        }

        $array = [
            'input' => sprintf('Method : "%s", Request Header : "%s: %s" ' ,  $method, $header_field, $header_value),
            'output' => $response_status_line
        ];
        return $array;

    }
}
