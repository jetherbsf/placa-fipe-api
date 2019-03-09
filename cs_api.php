<?php

class CSAPI
{
    // Your access token
    private $authToken = '$2a$08$Cf1f11ePArKlBJomM0F6a.O59Lisk1cCL65r3qpLC00UitBgabtVm'; // Tests only
    private $apiResponse = [];
    private $ApiErro = "";

    public function Pesquisar($placa){
        // The data to send to the API
        $postData = array(
            'plate' => 'GAB2014',
            'token' => $authToken
        );

        // Setup cURL
        $ch = curl_init('http://codpass.com/app/api/');

        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($postData)
        ));

        // Send the request
        $response = curl_exec($ch);

        // Check for errors
        if($response === FALSE){
            $this->ApiErro = curl_error($ch);
            return false;
        }

        $this->apiResponse = json_decode($response, TRUE);

        return true;
    }

    public function existe()
    {
        return array_key_exists('codigoRetorno', $this->apiResponse);
    }

    public function Retorno()
    {
        return $this->apiResponse;
    }

    public function ObterErro()
    {
        return $this->ApiErro;
    }
}