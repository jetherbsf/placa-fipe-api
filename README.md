# placa-fipe-api
<p align="center">
  <img width="100px" src="http://www.check-storage.com/Icon_v3.png"><br/>
  <h4 align="center">API Placa Fipe</h2>
</p>

---

**API Placa Fipe** é um componente que permite a consulta pela placa, da situação de um veículo. Devolve também o cadastro correspondente ao modelo do veículo da tabela Fipe.

API Modules:

---

### PHP
Dependência: cURL library --> http://php.net/curl

**Instalação**

Copiar o arquivo cs_api.php para o seu sistema.
Alterar a propriedade privada $authToken com o seu token de acesso. A classe de consumo da API já vem com um token de testes. Para obter um token particular, seguir os passos no final deste documento.

### Uso

Exemplo de consulta:


Exemplo de retorno:
```ruby
{
    "situacao": "Sem restrição",
    "modelo": "Q5",
    "marca": "Audi",
    "cor": "Preta",
    "ano": "2010",
    "anoModelo": "2010",
    "placa": "GAB2014",
    "uf": "SP",
    "municipio": "PIRACICABA",
    "chassi": "78964",
    "versao": "AUDI Q5 3.2 V6 FSI",
    "fipe": {
        "status": "OK",
        "versao_depara": "",
        "veiculos": [
            {
                "modelo": "Q5",
                "versao": "Q5 3.2 FSI V6 Quattro S Tronic",
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

Os exemplos podem ser encontados no arquivo testes.php. 

---

### Obter Token
Gerar novo usuário e obter o token de acesso

