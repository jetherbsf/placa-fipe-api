<p align="center">
  <img width="100px" src="http://www.check-storage.com/Icon_v3.png"><br/>
  <h4 align="center">Placa Fipe API</h2>
</p>

---

**Placa Fipe API** é um componente que permite a consulta da situação de um veículo pela placa. Devolve também o cadastro correspondente ao modelo do veículo na tabela Fipe.

## API Modules (PHP):

- [Instalação](#Instalação)
- [Pesquisar()](#Pesquisar)
- [Registrar()](#registrar)
- [Autenticar()](#registrar)

### Instalação
Dependência: cURL library --> http://php.net/curl

Copiar o arquivo [cs_api.php](./cs_api.php) para o seu sistema.
Alterar a propriedade privada $authToken com o seu token de acesso. Para gerar um token gratuito de testes, seguir os passos no final deste documento.

### Pesquisar

```php
require "cs_api.php";

$CsApi = new CSAPI();

$success = $CsApi->Pesquisar("AAA-9999"); 

if($success == false){
    echo $CsApi->Erro();
    return;
}

echo $CsApi->Retorno();
```

#### Layout:

```json
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

Caso o veículo não seja localizado na tabela Fipe, o retorno da propriedade "Fipe" será vazio indicando NOK

``` ...,
    "fipe": {
            "status": "NOK"
            ...
    }
 }
```

#### Erros:
1. `{"erro":"Acesso negado"}`
    O Token não é válido
2. `{"erro":"Atingiu o limite de [quantiade limite] consultas"}`
    Excedeu o limite de consultas permitidas no mês para o plano gratuito

Os exemplos podem ser encontados no arquivo [consumo_api.php](./consumo_api.php).

## Token

#### Registrar()
Para gerar token, é necessário criar uma conta informando usuário e senha de sua ecolha. A API irá devolver um token para autenticação na consulta de placa

```php
require "cs_api.php";
$CsApi = new CSAPI();

$success = $CsApi->Registrar("email@teste.com", "senha123"); 

if(!$success){
    echo $CsApi->Erro();
    return;
}

echo $CsApi->Token();
```

#### Retorno:
`$2a$08$Cf1f11ePArKlBJomM0F6a.u0Tq9FigSP8n7rwbbLgmW.R6ekqmgWe`
Colocar a chave gerada na variável $authToken em cs_api.php

`Usuário já existente` - Dados não foram suficientes para autenticar, mas o usuário (email) já existe

#### Autenticar()
No método Registrar(),  Caso o usuário já exista e a autenticação for positiva, a API irá devolver o token.

Utilizar o método Autenticar() para obter o token de um usuário já existente;

```
$CsApi->Autenticar("email@teste.com", "senha123"); 
echo $CsApi->Token();
```
