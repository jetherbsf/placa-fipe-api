<?php

require "cs_api.php";

$CsApi = new CSAPI();


$success = $CsApi->Registrar("email@teste.com", "senha123"); 

if(!$success){
    echo $CsApi->Erro();
    return;
}

echo $CsApi->Token();

?>