# WP Chargify

A plugin to add a paywall for WordPress content that uses [Chargify](https://www.chargify.com/) as the payment gateway.

## Branching Workflow

1. Branches should be made from the `master` branched and named with the issue number followed be a description of the feature you are adding. e.g. `3-add-branching-workflow`.
1. Pull Requests should be made early, and they should include `WIP`, `work in progress` or 🚧 in the title.
1. Once a Pull Request is ready for code review then `WIP`, `work in progress` or 🚧 should be removed from the title then assigned to someone for code review.
1. The description of the issue should reference the issue it is closing. e.g. `Fixes #3`.
1. The person will code review and leave inline comments were applicable. Once completed the Pull Request will either be submitted back to the author of the PR or merged if there are no changes required.

## Setup

1. Clone Chassis into a new folder: `git clone https://github.com/Chassis/Chassis.git chargify-plugin`.
1. Change into the newly cloned folder: `cd chargify-plugin`.
1. Clone this repo into a content folder: `git clone https://github.com/TheCodeCompany/wp-chargify.git content`.
1. Copy `local-config-sample.php` and rename it to `local-config.php`. Use this file to define and PHP constants you need for the project.
1. Run Vagrant `vagrant up`.
1. Visit [http://chargify.local](http://chargify.local) to see the frontend of the site.
1. Login to the [admin](http://chargify.local/wp/wp-admin) using username: `admin` and password: `password`.
1. Profit!

## Git Hooks

Because we're good developers and we like automation we do the following:

1. Create a `.git/hooks/pre-commit` file.
1. Make that file executable `chmod +x .git/hooks/pre-commit`
1. Copy and paste the following into that file:
    ```
    #!/bin/sh
    
    # Run PHP Codesniffs
    echo 'Checking PHP code style...'
    plugins/wp-chargify/vendor/bin/phpcs plugins/wp-chargify --standard=plugins/wp-chargify/.phpcs.xml.dist
    PHPCS_EC=$?
    
    # Run PHPUnit tests
    echo 'Running tests...'
    plugins/wp-chargify/vendor/bin/phpunit -c plugins/wp-chargify/phpunit.xml.dist
    PHPUNIT_EC=$?
    
    # Exit if any error codes
    let "ERROR = $PHPCS_EC + $PHPUNIT_EC"
    if [ "${ERROR}" -ne "0" ]
    then
      echo "Aborting commit..."
      exit ${ERROR}
    fi
    echo "All tests were passed!"
    
    ```

## Xdebug

Xdebug will be automatically setup for [PHPStorm](https://github.com/Chassis/Xdebug#in-phpstorm). You can follow these [instructions](https://github.com/Chassis/Xdebug#browser-setup) to config everything.

## MailHog

Mailhog has been automatically setup for you to capture all your WordPress email. Visit [http://chargify.local:8025](http://chargify.local:8025) to view any email sent via WordPress.

## SequelPro

We have installed the [SequelPro](https://sequelpro.com/) extension for Chassis. We recommend you download and install the [SequelPro test build](https://sequelpro.com/test-builds).

To connect to the WordPress database simply run `vagrant sequel`.

## phpMyAdmin

We've automatically installed and setup phpMyAdmin for you. You can visit it [here](http://chargify.local/phpmyadmin).
