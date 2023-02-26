help: ## Listar comandos disponibles en este Makefile
	@echo "╔══════════════════════════════════════════════════════════════════════════════╗"
	@echo "║                           ${CYAN}.:${RESET} AVAILABLE COMMANDS ${CYAN}:.${RESET}                           ║"
	@echo "╚══════════════════════════════════════════════════════════════════════════════╝"
	@echo ""
	@grep -E '^[a-zA-Z_0-9%-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "${COMMAND_COLOR}%-40s${RESET} ${HELP_COLOR}%s${RESET}\n", $$1, $$2}'
	@echo ""
	
build: build-container composer-install ## Construye las dependencias del proyecto

composer-install: ## composer install
	composer install

build-container: ## Construye los contenedores del proyecto
	docker-compose build

composer-dump: ## composer dump-autoload
	composer dump-autoload
	
composer-update: ## composer update 
	composer update

# TESTING COMMANDS ----------------------------------------------------------------------------------------------------
test: ## PHPUnit test
	docker-compose exec slim php ./vendor/bin/phpunit --no-coverage --color=always

# ANALYZERS COMMANDS ----------------------------------------------------------------------------------------------------
phpstan: ## phpstan
	docker exec -it php_container ./vendor/bin/phpstan analyse --xdebug --level 6 ./src ./tests

# OTHER COMMANDS & UTILS -----------------------------------------------------------------------------------------------
up: ## Levanta los servicios
	docker-compose up -d

down: ## Tira los servicios
	docker-compose down