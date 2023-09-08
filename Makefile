.PHONY: install lint lint-fix tests

install:
	@composer install --no-interaction --prefer-dist --optimize-autoloader

run:
	@php index.php

lint:
	@./vendor/bin/phpcs

lint-fix:
	@./vendor/bin/phpcbf

tests:
	@./vendor/bin/phpunit tests/ --stop-on-failure