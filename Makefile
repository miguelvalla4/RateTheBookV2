# Define variables
DOCKER_COMPOSE = docker-compose
DOCKER_COMPOSE_FILE = docker-compose.yml

# Build and start the Docker containers
.PHONY: start
up:
	$(DOCKER_COMPOSE) -f $(DOCKER_COMPOSE_FILE) up --build -d

# Stop and remove the Docker containers
.PHONY: stop
down:
	$(DOCKER_COMPOSE) -f $(DOCKER_COMPOSE_FILE) down

# Install dependencies with Composer
.PHONY: install
composer-install:
	$(DOCKER_COMPOSE) -f $(DOCKER_COMPOSE_FILE) run --rm php composer install