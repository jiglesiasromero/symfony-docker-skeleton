DOCKER_PHP_SERVICE=php-fpm

start: erase cache-folders build composer-install up

erase:
		docker-compose down -v

cache-folders:
		mkdir -p ~/.composer && chown ${UID}:${GID} ~/.composer

build:
		docker-compose build --no-cache && \
		docker-compose pull

composer-install:
		docker-compose run --rm ${DOCKER_PHP_SERVICE} composer install

up:
		docker-compose up -d

bash:
		docker-compose run --rm ${DOCKER_PHP_SERVICE} sh
