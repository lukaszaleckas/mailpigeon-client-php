install:
	cp .env.example .env && docker-compose up -d

stop:
	docker-compose stop

rebuild:
	docker-compose up -d --build

exec-php:
	docker-compose exec php bash

test:
	./vendor/bin/phpunit --configuration phpunit.xml
