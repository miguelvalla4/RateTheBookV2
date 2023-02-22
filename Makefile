build: build-container composer-install ## Construye las dependencias del proyecto

build-container: ## Construye el contenedor de la aplicación
	docker build --no-cache --target development -t $(IMAGE_NAME):$(IMAGE_TAG_DEV) ./docker

composer-install: ## Instala las dependencias via composer
	docker run --rm -v ${PWD}/app:/app -w /app $(IMAGE_NAME):$(IMAGE_TAG_DEV) composer install --verbose

composer-update: ## Actualiza las dependencias via composer
	docker run --rm -v ${PWD}/app:/app -w /app $(IMAGE_NAME):$(IMAGE_TAG_DEV) composer update --verbose

composer-require: ## Añade nuevas dependencias de producción
	docker run --rm -ti -v ${PWD}/app:/app -w /app $(IMAGE_NAME):$(IMAGE_TAG_DEV) composer require --verbose

composer-require-dev: ## Añade nuevas dependencias de desarrollo
	docker run --rm -ti -v ${PWD}/app:/app -w /app $(IMAGE_NAME):$(IMAGE_TAG_DEV) composer require --dev --verbose

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

# OTHER COMMANDS & UTILS -----------------------------------------------------------------------------------------------
up: ## Levanta los servicios
	docker-compose up -d

down: ## Tira los servicios
	docker-compose down