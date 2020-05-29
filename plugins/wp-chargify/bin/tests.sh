#!/bin/sh

# Run PHP Codesniffs
echo 'Checking PHP code style...'
/vagrant/content/plugins/wp-chargify/vendor/bin/phpcs /vagrant/content/plugins/wp-chargify --standard=/vagrant/content/plugins/wp-chargify/.phpcs.xml.dist

## Run PHPUnit tests
echo 'Running tests...'
cd /vagrant/content/plugins/wp-chargify/
phpunit

