<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Requisitos

- PHP 8.2 ou superior e Banco Mysql
- Xampp: https://www.apachefriends.org/pt_br/index.html
- Composer: https://getcomposer.org/Composer-Setup.exe

## Fork do projeto

- Faça um fork do projeto e clone para sua máquina

## Configuração

- Start os serviços do Xampp - Apache e MySQL
- Abra o projeto no VS Code e em seguida o terminal integrado (Use o terminal Git Bash)
- Instalar dependências - Comando: **composer install**
- Duplicar o arquivo ".env.examplo" - Comando: **cp .env.examplo .env**
- Gerar chave - Comando: **php artisan key:generate**
- Gerar o banco dados - Comando: **php artisan migrate** (será criado o banco "bem_estar_app" no Mysql)

## Rodar o projeto

- Comando: **php artisan serve**
- Será iniciado o servidor no IP: http://127.0.0.1:8000 (Para abrir no navegador, segure a tecla CTRL e clique no IP)

## Protótipos de telas no Figma

<p align="center"><a href="https://www.figma.com/design/99UrkDVcq8pHKaGzcCcH7F/Telas-BemEstar-PRO?node-id=2-40&t=U0jgYP70kBgBJY4h-1" target="_blank"><img src="https://i.ibb.co/strQSLH/Tela-Gest-o.png" width="600"></a></p>