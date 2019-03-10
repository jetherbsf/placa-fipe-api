<?php

require "cs_api.php";

$CsApi = new CSAPI();

$nome = "" // Opcional
$email = "email@teste.com";
$senha = "senha123";

$success = $CsApi->Registrar($nome, $email, $senha); 

if(!$success){
    echo $CsApi->Erro();
    return;
}

echo $CsApi->Token();

?>