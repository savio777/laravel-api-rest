# laravel-api-rest

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## passos configuração ambiente:

-   instalação php: `/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.3)"`
-   instalação pacote laravel ao composer: `composer global require laravel/installer`
-   configuração ambiente global linux: `export PATH="$HOME/.config/composer/vendor/bin:$PATH"`
-   criar projeto laravel: `laravel new laravel-api-rest`
-   instalar sqlite plugin: `sudo apt install php8.2-sqlite3`
-   instalar pacote laravel específico configuração api: `php artisan install:api`

## escolhas configurações projeto:

-   banco de dados: `sqlite`
-   testes: `phpunit`
-   front específico: `nenhum`
-   autenticação: `sanctum` (sem tabela tokens usuários)

## extensões vscode recomendadas:

-   [SQLite](https://marketplace.visualstudio.com/items?itemName=alexcvzz.vscode-sqlite)
-   [Laravel](https://marketplace.visualstudio.com/items?itemName=laravel.vscode-laravel)
-   [PHP Intelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client)

## comandos úteis:

-   resetar migration: `php artisan migrate:reset`
-   criar controller crud: `php artisan make:controller --api NomeControllerExample`
-   ver todas as rotas api: `php artisan route:list --path=api`
-   criar request customizado: `php artisan make:request EntityExampleValidationRequest`
-   criar recurso para padronização de respostas: `php artisan make:resource UserResourceExample`
-   criar coleção de recursos: `php artisan make:resource UserCollection`

## headers para requisições api:

-   **Content-Type**: application/json
-   **Accept**: application/json

## rodar projeto:

-   instalar depêndencias: `composer install`
-   copiar arquivo de ambiente: `cp .env.example .env`
-   gerar chave aplicação: `php artisan key:generate`
-   rodar migrações banco dados: `php artisan migrate`
-   rodar seeders banco dados: `php artisan db:seed`
-   comando para inciar servidor: `php artisan serve`
-   acessar no navegador: `http://localhost:8000` ou `http://localhost:8000/api/test`

[video aula eduteka](https://www.youtube.com/watch?v=jLGKI_zMftU)
