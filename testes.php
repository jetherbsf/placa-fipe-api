<?php

require "cs_api.php";

$CsApi = new CSAPI();

$success = $CsApi->Pesquisar("AAA-9999"); 

if($success == false){
    echo $CsApi->Erro();
    return;
}

echo $CsApi->Retorno();

?>