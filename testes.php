<?php

require "cs_api.php";

$CsApi = new CSAPI();

$status = $veiculo->Pesquisar("GAB-2014"); // pode ser com ou sem hífem

if($status){
    echo $CsApi->Retorno();
}else{
    echo $CsApi->ObterErro();
}

?>