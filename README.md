# loja

![image](https://user-images.githubusercontent.com/12960457/35892309-01b0d246-0b90-11e8-927d-f5da2b762dc6.png)

## Descrição
Projeto CRUD de produto e categoria com Upload de imagens.

## Tecnologias utilizadas
* PHP
* Framework Laravel
* Template Engine Blade
* ORM Eloquente
* Autentição JWT
* Docker
* Bootstrap

## Executando o projeto

### Via Docker Compose
Clonando o repositório helciodasilva/loja

``` bash
git clone https://github.com/helciodasilva/loja.git
```
Criando os containers

``` bash
cd loja
docker-compose up -d
```

### Via Docker hub
Criando o container db

``` bash
docker run --name db -e MYSQL_ROOT_PASSWORD=root -e MYSQL_DATABASE=loja -p 3306:3306 -d mysql:5.7
```

Criando o container loja
``` bash
docker run --name loja --link db:db -p 8181:8181 helciodasilva/loja
```
### Acessando o projeto
http://localhost:8181/products

### Usuário
E-mail: admin@mail.com

Senha: admin

## TODO
* Internacionalização
* Permitir cadastrar produtos com mais de uma foto
* Criar documentação das APIs REST 

