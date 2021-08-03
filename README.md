![Imagem](https://github.com/lfboaventura/bemolprospect/site/src/assets/bemol.png)


## Bemol Prospect

### Sobre

Aplicação desenvolvida para desafio técnico processo seletivo Bemol, sistema para cadastro, alteração e login de usuário de captação para serem novos clientes.

Projeto utiliza duas aplicações:

1. Frontend em VueJS localizada na pasta **site**, sendo necessário ter instalados [Node.js](https://nodejs.org/en/) e o [Vue-cli](https://cli.vuejs.org/);
2. Backend em [PHP](https://www.php.net/manual/pt_BR/index.php) localizada na pasta **webservice**, sendo necessário ter instalados [Composer](https://getcomposer.org/) e framework [Laravel](https://laravel.com/docs/8.x/readme).

**Tecnologias, Dependências e Versões:**
* [Laravel 8.0](https://laravel.com/docs/8.x/readme).
* [VueJS 2.5.2](https://br.vuejs.org/v2/guide/index.html)
* [Vue-router 3.0.1](https://router.vuejs.org/)
* [Vuex 3.6.2](https://vuex.vuejs.org/ptbr/)
* [Materialize](https://materializecss.com/)

Projeto segue [licença MIT](https://opensource.org/licenses/MIT) em disponibilização pública.


### Instalação e utilização

**1. Instalação - Backend**


_Na pasta "webservice":_

* Instalar dependências:
> composer install

* Arquivo .env e parametrizar para conexão com o [banco de dados](https://www.oracle.com/br/database/what-is-database/#:~:text=Um%20banco%20de%20dados%20%C3%A9,banco%20de%20dados%20(DBMS).)
> php -r \"file_exists('.env') || copy('.env.example', '.env');\"

* Rodar comando [artisan](https://laravel.com/docs/8.x/artisan#introduction)para geração de uma nova key.
> php artisan key:generate --ansi

* Rodar [migrations](https://laravel.com/docs/8.x/migrations#introduction) e criação de tabelas no banco de dados.
> php artisan migrate

* Rodar o server.
> php artisan serve


**2. Instalação - Frontend**

_Na pasta "site":_

* Instalar dependências:
> npm install

* Instalar dependências:
> npm start

* Acessar
> http://localhost:8080


### Telas
![Imagem](https://github.com/lfboaventura/bemolprospect/anexos/bemol.gif)

### Observações
* **Diagramas c4** em /anexos/c4 diagrama da visão arquitetural da infraestrutura.png e /anexos/c4 diagrama design da solução.png
 
### Melhorias
* não foram adicionados alguns mascaras e validações de campos como CPF e RG;
* para fins de estudos, optei pelo framework materealize para o front, poderia ter desenvolvido com bootstrap-vue;
* melhorias de floxos das telas e o design;


**Status:** Finalizado.