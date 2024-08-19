@echo off

docker-compose "up" "-d"
docker-compose "exec" "php" "cat .env.example > .env"
docker-compose "exec" "php" "composer" "install"
docker-compose "exec" "php" "composer" "dump-autoload"
docker-compose "exec" "php" "php" "artisan" "config:clear"
docker-compose "exec" "php" "php" "artisan" "cache:clear"
docker-compose "exec" "php" "php" "artisan" "key:generate" "--force"
docker-compose "exec" "php" "php" "artisan" "migrate:fresh" "--force"
docker-compose "exec" "php" "php" "artisan" "db:seed" "--force"