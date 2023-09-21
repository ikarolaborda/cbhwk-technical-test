.DEFAULT_GOAL := help

help:
	@echo "Please choose what you want to do: \n" \
	" make dup: start docker containers \n" \
	" make ddw: stop docker containers \n" \
	" make drs: restart docker containers \n" \
	" make dci: install dependencies at app container \n" \
	" make dcu: update dependencies at app container \n" \
	" make mysql: Run interactive shell at mysql container \n" \
	" make php: run interactive shell at php container \n" \
	" make mig: manually run migrations at container \n"

build:
	cp .env.example .env; touch database/database.sqlite; export COMPOSE_FILE=docker-compose-dev.yml; docker-compose --env-file .env up -d --build

dup:
	export COMPOSE_FILE=docker-compose-dev.yml; docker-compose up -d

ddw:
	export COMPOSE_FILE=docker-compose-dev.yml; docker-compose down --volumes

drs:
	export COMPOSE_FILE=docker-compose-dev.yml; docker-compose down --volumes && docker-compose up -d

dci:
	docker exec -it php composer install && sudo chown -R $(USER):$(shell id -g) vendor/

dcu:
	docker exec -it php composer update && sudo chown -R $(USER):$(shell id -g) vendor/

mysql:
	docker exec -it database bash

php:
	docker exec -it php bash

mig:
	docker exec -it php php artisan migrate:fresh --seed

test:
	docker exec -it php php artisan test

jwt:
	docker exec -it php php artisan jwt:secret
