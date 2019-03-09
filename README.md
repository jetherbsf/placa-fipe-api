<p align="center">
  <img width="100px" src="http://www.check-storage.com/Icon_v3.png"><br/>
  <h4 align="center">Placa Fipe API</h2>
</p>

---

**Placa Fipe API** é um componente que permite a consulta da situação de um veículo pela placa. Devolve também o cadastro correspondente ao modelo do veículo na tabela Fipe.

## API Modules:

### PHP
Dependência: cURL library --> http://php.net/curl

**Instalação**

Copiar o arquivo cs_api.php para o seu sistema.
Alterar a propriedade privada $authToken com o seu token de acesso. A classe de consumo da API já vem com um token de testes. Para obter um token particular, seguir os passos no final deste documento.

### Uso

Exemplo de consulta:

```php
require "cs_api.php";

$CsApi = new CSAPI();

$sucesso = $CsApi->Pesquisar("AAA-9999"); 

if(!$sucesso){
    $err = $CsApi->Erro();
    echo json_encode($err);
    return;
}

$resp = $CsApi->Retorno();
echo json_encode($resp);
```

Exemplo de retorno:
```ruby
{
    "erro": "",
    "situacao": "Sem restrição",
    "modelo": "Modelo Teste",
    "marca": "Marca do Carro",
    "cor": "Preta",
    "ano": "2010",
    "anoModelo": "2010",
    "placa": "AAA9999",
    "uf": "SP",
    "municipio": "SAO PAULO",
    "chassi": "55555",
    "versao": "3.2 V6",
    "fipe": {
        "status": "OK",
        "versao_depara": "",
        "veiculos": [
            {
                "modelo": "Modelo fipe",
                "versao": "3.2 V6 V6 Tronic",
                "ano_modelo": "2010",
                "combustivel": "Gasolina",
                "combustivel_versao": "Gasolina",
                "valor": "83907.00",
                "portas": "",
                "cambio": "Automático"
            }
        ]
    }
}
```

Caso o veículo não seja localizado na tabela Fipe, o retorno será vazio indicando NOK

``` ...,
    "fipe": {
            "status": "NOK"
            ...
    }
 }
```

#### Retornos de erro:
1. `{"erro":"Acesso negado"}`
    O Token não é válido
2. `{"erro":"Franquia excedida"}`
    Excedeu o limite de consultas permitidas no mês 

Os exemplos podem ser encontados no arquivo testes.php. 

### Obter Token
Gerar novo usuário e obter o token de acesso

