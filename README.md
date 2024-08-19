
![Laravel](https://github.com/Progete-Dev/psi-bot/workflows/Laravel/badge.svg)

<h1 align="center">PSI-BOT</h1>

## Para executar use os comandos abaixo no terminal (CLI)
- *Necessário docker e docker compose

- git clone https://github.com/Progete-Dev/psi-bot.git
- cd psi-bot
- docker-compose up -d

## Setup após primeira execução use os comandos abaixo no terminal (CLI):
- *pode excutar o ./setup-env.bat (Windows) ou ./setup-env.sh (Linux) e ignorar os passos abaixo
- docker-compose exec php cat .env.example > .env
- docker-compose exec php composer install
- docker-compose exec php composer dump-autoload
- docker-compose exec php php artisan config:clear
- docker-compose exec php php artisan cache:clear
- docker-compose exec php php artisan key:generate --force
- docker-compose exec php php artisan migrate:fresh --force
- docker-compose exec php php artisan db:seed --force
