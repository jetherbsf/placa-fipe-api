<?php

class CSAPI
{
    // Your access token
    private $authToken = '$2a$08$Cf1f11ePArKlBJomM0F6a.O59Lisk1cCL65r3qpLC00UitBgabtVm'; // Tests only
    private $apiResponse = [];

    public function Pesquisar($placa){

        try
        {
            // The data to send to the API
            $postData = array(
                'plate' => 'GAB2014',
                'token' => "" //$this->authToken
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

            //Send the request
            $response = curl_exec($ch);
            curl_close($ch);

            // Check for unknow errors
            if($response === FALSE){
                $this->apiResponse = curl_error($ch);
                return false;
            }

            $this->apiResponse = $response;
            
            return true;

        }
        catch (\Exception $e) {
            $this->apiResponse = $e->getMessage();
            return false;
        }
    }

    public function Retorno()
    {
        return $this->apiResponse;
    }

    public function Erro()
    {
        return $this->apiResponse;
    }
}