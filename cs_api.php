<?php

class CSAPI
{
    // Your access token
    private $authToken = ''; // Para criar um token gratuito de testes, executar --> https://github.com/jetherbsf/placa-fipe-api
    
    private $apiResponse = [];
    private $erro = '';

    public function Pesquisar($placa){

        try
        {
            // The data to send to the API
            $postData = array(
                'plate' => 'GAB2014',
                'token' => $this->authToken
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
                $this->erro = curl_error($ch);
                return false;
            }

            $this->apiResponse = $response;
            
            return true;

        }
        catch (\Exception $e) {
            $this->erro = $e->getMessage();
            return false;
        }
    }

    public function Retorno()
    {
        return $this->apiResponse;
    }

    public function Erro()
    {
        return $this->erro;
    }

    public function Registrar($email, $senha, $nome = ""){
        try
        {
            // The data to send to the API
            $postData = array(
                'nome' => $nome,
                'email' => $email,
                'senha' => $senha
            );

            // Setup cURL
            $ch = curl_init('http://codpass.com/app/api/registrar/');

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

            $this->authToken = $response;
            
            return true;

        }
        catch (\Exception $e) {
            $this->apiResponse = $e->getMessage();
            return false;
        }
    }

    public function Autenticar($email, $senha){
        try
        {
            // The data to send to the API
            $postData = array(
                'email' => $email,
                'senha' => $senha
            );

            // Setup cURL
            $ch = curl_init('http://codpass.com/app/api/autenticar/');

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

            $this->authToken = $response;
            
            return true;

        }
        catch (\Exception $e) {
            $this->apiResponse = $e->getMessage();
            return false;
        }
    }

    public function Token()
    {
        return $this->authToken;
    }
}