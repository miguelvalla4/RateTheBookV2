# Build the Docker images for the application
build:
	docker compose build

# Start the application in the background
up:
	docker compose up -d

# Stop the application and remove the containers
down:
	docker compose down

# Show the logs for the application
logs:
	docker compose logs -f web
