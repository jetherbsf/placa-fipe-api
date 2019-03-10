<?php

require "cs_api.php";

$CsApi = new CSAPI();

$email = "email@teste.com";
$senha = "senha123";

$success = $CsApi->Autenticar($email, $senha); 

if(!$success){
    echo $CsApi->Erro();
    return;
}

echo $CsApi->Token();

?>