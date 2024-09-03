COMPOSE_COMMAND = docker compose
FULL_COMMAND = $(COMPOSE_COMMAND) -p habit-reminder -f ./docker/compose.yaml

start:
	$(FULL_COMMAND) up -d

stop:
	$(FULL_COMMAND) down

rebuild:
	$(COMPOSE_COMMAND) -f ./docker/compose.yaml build --no-cache