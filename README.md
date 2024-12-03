## Sobre o sistema

O sistem **BemEstar Pro** possibilita o monitoramento e apoio adequado à saúde mental no ambiente de trabalho. Com isso, visa prevenir problemas graves, promover a melhoria da qualidade de vida dos colaboradores e, consequentemente, fomentar um ambiente de trabalho mais saudável e produtivo.

## Funcionalidades

- Check-ins regulares de bem-estar
- Avaliação de clima organizacional
- Acesso a conteúdos educativos, como vídeos, artigos e podcasts sobre bem-estar mental
- Monitoramento de bem-estar e análises (gestão)
- Notificações de alerta e recomendações preventivas (gestão)

## Requisitos

- Sistema desenvolvido com o framework PHP Laravel 11
- PHP 8.2 ou superior e Banco Mysql
- Xampp: https://www.apachefriends.org/pt_br/index.html
- Composer: https://getcomposer.org/Composer-Setup.exe

## Configuração

- Start os serviços do Xampp - Apache e MySQL
- Abra o projeto no VS Code e em seguida o terminal integrado (Use o terminal Git Bash)
- Instalar dependências - Comando: **composer install**
- Duplicar o arquivo ".env.example" - Comando: **cp .env.example .env**
- Gerar chave - Comando: **php artisan key:generate**
- Gerar o banco dados - Comando: **php artisan migrate** (será criado o banco "bem_estar_app" no Mysql)

## Rodar o projeto

- Comando: **php artisan serve**
- Será iniciado o servidor no IP: http://127.0.0.1:8000 (Para abrir no navegador, segure a tecla CTRL e clique no IP)

## Protótipos de telas no Figma

<p align="center"><a href="https://www.figma.com/design/99UrkDVcq8pHKaGzcCcH7F/Telas-BemEstar-PRO?node-id=2-40&t=U0jgYP70kBgBJY4h-1" target="_blank"><img src="https://i.ibb.co/SBQMX83/Tela-Gest-o-front.png" width="600"></a></p>