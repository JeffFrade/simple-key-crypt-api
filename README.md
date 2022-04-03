# API de Criptografia Simples
---

Nesse repositório contém uma API que faz criptografia e descriptografia utilizando chave simples.
O projeto foi desenvolvido em cima de `Containers` (`Docker`), foi utilizado `PHP 8`, `Laravel 8` e `NGINX`.

### Como Inicializar a Aplicação
---

Basta executar o comando `sh config.sh` na raiz da aplicação que esse script fará toda a configuração necessária.r

### Como Consumir a API
---

- Endpoint: `/api/alphabet` - `POST`

Corpo da requisição:
```json
{
	"key": numero_da_chave_desejada
}
```

- Endpoint: `/api/crypt` - `POST`

Corpo da requisição:
```json
{
	"key": numero_da_chave_desejada,
	"text": "Texto a ser criptografado",
	"remove_spaces": false,
	"remove_punctation": false
}
```

** Obs: Os campos `remove_spaces` e `remove_punctation` podem ser omitidos caso não queria remover acentos ou espaços em branco, caso queira os remover, basta trocar para `true`.

- Endpoint: `/api/decrypt` - `POST`

Corpo da requisição:
```json
{
	"key": numero_da_chave_desejada,
	"text": "Texto a ser descriptografado"
}
```

Caso queira testar online, pode utilizar esse host: `https://simple-key-crypt-api.herokuapp.com`.
