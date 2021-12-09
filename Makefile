SYMFONY_BIN		= symfony
CONSOLE		 	= $(SYMFONY_BIN) console

## —— Tests ✅ —————————————————————————————————————————————————————————————————
test-fixtures: phpunit.xml* ## Launch main functionnal and unit tests
	APP_ENV=test $(CONSOLE) doctrine:schema:drop --force -q
	APP_ENV=test $(CONSOLE) doctrine:schema:create -q
	APP_ENV=test $(CONSOLE) doctrine:fixtures:load --purge-with-truncate -n --group=main --group=test -q

test: phpunit.xml* ## Launch main functionnal and unit tests
	APP_ENV=test ./bin/phpunit --stop-on-failure

test-all: phpunit.xml* test-fixtures test ## Launch main functionnal and unit tests

## —— Coding standards ✨ ——————————————————————————————————————————————————————

stan: ## Run PHPStan only
	./vendor/bin/phpstan analyse -l 9 src


cs-fix: ## Run php-cs-fixer and fix the code.
	./vendor/bin/php-cs-fixer fix src/ --allow-risky=yes


cs-dry: ## Run php-cs-fixer and fix the code.
	./vendor/bin/php-cs-fixer fix --dry-run --allow-risky=yes