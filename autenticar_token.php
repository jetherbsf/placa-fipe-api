<?php

require "cs_api.php";

$CsApi = new CSAPI();

$success = $CsApi->Autenticar("email@teste.com", "senha123"); 

if(!$success){
    echo $CsApi->Erro();
    return;
}

echo $CsApi->Token();

?>