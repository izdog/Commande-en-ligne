<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Paypal extends Model
{
    private $endpoint = "https://api-3t.sandbox.paypal.com/nvp";
    private $config = [
        'USER' => 'godzi23-facilitator_api1.hotmail.fr',
        'PWD' => 'TA43THY7ENSTXYAA',
        'SIGNATURE' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31Adx0.roQa7FQFkI2GpuvcXRbuMHO',
        'VERSION' => '74.0',
        'METHOD' => ''
    ];
    public $errors    = array();

    public function __construct($endpoint = false, $config){
        if($endpoint):
            $this->endpoint = str_replace('sandbox.', '', $this->endpoint);
        endif;
        if($config == 'GetExpressCheckoutDetails' || $config == 'DoExpressCheckoutPayment' || $config == 'SetExpressCheckout'):
            $this->config['METHOD'] = $config;
        endif;
    }
    public function request($params){
        $params = array_merge($params, $this->config);
//        dd($params);
        $params = http_build_query($params);
        
//        dd($params);

        $curl = curl_init();
//        dd($curl);
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->endpoint,
            CURLOPT_POST=> 1,
            CURLOPT_POSTFIELDS => $params,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_VERBOSE => 1
        ));
        $attempt = curl_exec($curl);
//        var_dump($attempt);
        $response = array();
        parse_str($attempt, $response);
        
        
//        dd($response);
        if(curl_errno($curl)):
            $this->errors = curl_error($curl);
            curl_close($curl);
            return false;
        else:
            curl_close($curl);
            return $response;
        endif;
    }
}
