#!/usr/bin/env bash

set -ev

echo "Running unit tests";

composer install --prefer-dist


if [[ "${UPLOAD_CODE_COVERAGE}" == "yes" ]] && [[ "${TRAVIS_PULL_REQUEST}" = "false" ]]; then
    curl -L https://codeclimate.com/downloads/test-reporter/test-reporter-latest-linux-amd64 > ./cc-test-reporter
    chmod +x ./cc-test-reporter
    ./cc-test-reporter before-build
    ./vendor/bin/phpunit --coverage-clover clover.xml
    ./cc-test-reporter after-build --coverage-input-type clover || true
else
    phpenv config-rm xdebug.ini
    ./vendor/bin/phpunit
fi

