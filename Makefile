IMAGE_NAME=ratethebookv2_php
IMAGE_TAG_BASE=base
IMAGE_TAG_DEV=development
DOCKER_PHP=docker exec -it php_container
DOCKER_PHP_USER=docker exec -it -u $(UID):$(GID) php_container

help: ## Listar comandos disponibles en este Makefile
	@echo "╔══════════════════════════════════════════════════════════════════════════════╗"
	@echo "║                           ${CYAN}.:${RESET} AVAILABLE COMMANDS ${CYAN}:.${RESET}                           ║"
	@echo "╚══════════════════════════════════════════════════════════════════════════════╝"
	@echo ""
	@grep -E '^[a-zA-Z_0-9%-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "${COMMAND_COLOR}%-40s${RESET} ${HELP_COLOR}%s${RESET}\n", $$1, $$2}'
	@echo ""
	
build: build-container composer-install ## Construye las dependencias del proyecto

composer-install: ## composer install
	$(DOCKER_PHP) composer install -vvv docker-compose

composer-dump: ## composer dump-autoload
	$(DOCKER_PHP) composer dump-autoload
	
composer-update: ## composer update 
	$(DOCKER_PHP) composer update

# TESTING COMMANDS ----------------------------------------------------------------------------------------------------
test: ## PHPUnit test
	docker-compose exec slim php ./vendor/bin/phpunit --no-coverage --color=always

test-coverage: ## PHPUnit test and coverage
	rm -rf test/report || echo "No existe la carpeta de reportes previamente"
	docker-compose exec -e XDEBUG_MODE=coverage slim php ./vendor/bin/phpunit --color=always

test-mutant: ## Infection Mutant Testing
	docker run --rm -v ${PWD}/app:/app -w /app $(IMAGE_NAME):$(IMAGE_TAG_DEV) php ./vendor/bin/infection

test-group-%:
	docker-compose exec slim php ./vendor/bin/phpunit --no-coverage --color=always --group ${*}

# ANALYZERS COMMANDS ----------------------------------------------------------------------------------------------------
phpstan: ## phpstan
	$(DOCKER_PHP) ./vendor/bin/phpstan analyse --xdebug --level 6 ./src ./tests

# OTHER COMMANDS & UTILS -----------------------------------------------------------------------------------------------
up: ## Levanta los servicios
	docker-compose up -d

down: ## Tira los servicios
	docker-compose down