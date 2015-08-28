#!/usr/bin/env sh

php vendor/bin/test-reporter --coverage-report logs/clover.xml --stdout > codeclimate.json
curl -X POST -d @codeclimate.json -H 'Content-Type: application/json' -H 'User-Agent: Code Climate (PHP Test Reporter v0.1.1)' https://codeclimate.com/test_reports
