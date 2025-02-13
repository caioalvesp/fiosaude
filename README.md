# CRUD em PHP
Este projeto é uma aplicação CRUD desenvolvida em PHP, utilizando MySQL como banco de dados. Ele permite gerenciar usuários e projetos de forma eficiente.

## Funcionalidades
* Criar, visualizar, editar e excluir usuários, departamentos e projetos
* Associar usuários a projetos e departamentos

## Tecnologias Utilizadas
* PHP
* MySQL
* HTML, CSS e JavaScript
* Bootstrap

### Página Inicial
Abaixo está um print da página inicial do projeto:
![image](https://github.com/user-attachments/assets/4c52d311-3119-4fb1-84a9-fffecd2a021c)

## Estrutura do Banco de Dados

### Modelo do Banco de Dados
O diagrama abaixo representa a estrutura do banco de dados utilizada no projeto:
![fiosaude drawio (2)](https://github.com/user-attachments/assets/8e2d42b4-b624-4bad-a403-5a24d1530832)



## Instalação
### Clone o repositório
```sh
git clone https://github.com/caioalvesp/fiosaude.git
cd fiosaude
```


### Configure o Banco de Dados
* O arquivo de dump do banco de dados está disponível em `db/dump.sql`
* Crie um banco de dados MySQL e importe o arquivo `db/dump.sql`
* Atualize as credenciais do banco no arquivo de configuração (`config.php`)

### Inicie o servidor
Se estiver utilizando o PHP embutido:
```sh
php -S localhost:8000
```

## Ping para Endpoint Específico
A API possui um webservice simples que retorna o conteúdo da requisição em formato JSON. O endpoint `http://servidor/provacaio/ping.php` só responderá requisições feitas pelo servidor da prova utilizando o token de autenticação correto que deverá ser passado ao final da URL. Esse mecanismo garante a segurança do acesso, restringindo as requisições a fontes autorizadas.

## Disponibilidade
O projeto está disponível no seguinte endereço:
http://servidor/provacaio/user/index.php

## Como Usar
1. Acesse `http://localhost:8000` no navegador se estiver rodando o projeto localmente
2. Utilize a interface para criar, visualizar, editar e excluir usuários e projetos
3. Associe usuários a projetos conforme necessário
