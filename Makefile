.PHONY: up down update-db create-db drop-db migration entity fixtures logs install cmd

PHP_CONTAINER_NAME := php
NODE_CONTAINER_NAME := node

-include .env
-include .env.local

up: install
	docker compose up -d --remove-orphans

down:
	docker compose down

cache-clear:
	docker compose exec ${PHP_CONTAINER_NAME} bin/console cache:clear

update-db: create-db
	docker compose exec ${PHP_CONTAINER_NAME} bin/console doctrine:migrations:migrate --no-interaction

create-db:
	docker compose exec ${PHP_CONTAINER_NAME} bin/console doctrine:database:create --if-not-exists

drop-db:
	docker compose exec ${PHP_CONTAINER_NAME} bin/console doctrine:database:drop --force --if-exists

migration: create-db
	docker compose exec ${PHP_CONTAINER_NAME} bin/console make:migration

entity:
	docker compose exec -it ${PHP_CONTAINER_NAME} bin/console make:entity

fixtures: create-db
	docker compose exec ${PHP_CONTAINER_NAME} bin/console hautelook:fixtures:load --no-interaction -vv

logs:
	docker compose logs -f

install:
	@if [ -z "$$(docker compose ps -q ${PHP_CONTAINER_NAME})" ]; then \
		docker compose run --rm ${PHP_CONTAINER_NAME} composer install; \
	else \
		docker compose exec ${PHP_CONTAINER_NAME} composer install; \
	fi

cmd:
	docker compose exec -it ${PHP_CONTAINER_NAME} bash

assets-install:
	docker compose run --rm ${NODE_CONTAINER_NAME} npm install

assets-watch: assets-install
	docker compose run --rm ${NODE_CONTAINER_NAME} npm run watch

assets-logs:
	docker compose logs ${NODE_CONTAINER_NAME} -f

assets-cmd:
	docker compose exec ${NODE_CONTAINER_NAME} bash
