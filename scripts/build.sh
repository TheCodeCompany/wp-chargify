#!/bin/bash
# build.sh - Run production app build. Will run Composer, NPM, Webpack etc.

set -e

echo "==== BUILD COMPOSER FILES  ============================="
cd ./plugins/wp-chargify
composer install --ignore-platform-reqs

## Return to prev dir being repo root dir, ready for next command.
cd -

echo "==== BUILD ASSET FILES  ================================"
cd ./build-tools
npm install
npm run prod

## Return to prev dir being repo root dir, ready for next command..
cd -
