# laravel-api-rest

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## passos configuração ambiente:

-   instalação php: `/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.3)"`
-   instalação pacote laravel ao composer: `composer global require laravel/installer`
-   configuração ambiente global linux: `export PATH="$HOME/.config/composer/vendor/bin:$PATH"`
-   criar projeto laravel: `laravel new laravel-api-rest`
-   instalar sqlite plugin: `sudo apt install php8.2-sqlite3`

## escolhas configurações projeto:

-   banco de dados: `sqlite`
-   testes: `phpunit`
-   front específico: `nenhum`

## rodar projeto:

-   instalar depêndencias: `composer install`
-   copiar arquivo de ambiente: `cp .env.example .env`
-   comando para inciar servidor: `php artisan serve`
-   acessar no navegador: `http://localhost:8000`

[video aula eduteka](https://www.youtube.com/watch?v=jLGKI_zMftU)
