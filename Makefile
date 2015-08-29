# this file aims to easy access to some comamnds
test:
	php vendor/bin/phpunit tests

run-server:
	php -S 0.0.0.0:8000 -t public public/index.php
