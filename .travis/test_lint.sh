#!/usr/bin/env bash

set -ev

echo "Running php lint"

phpenv config-rm xdebug.ini

find . -name \*.php ! -path "./vendor/*" | parallel --gnu php -d display_errors=stderr -l {} > /dev/null
