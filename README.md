# WP Chargify

A plugin to add a paywall for WordPress content that uses [Chargify](https://www.chargify.com/) as the payment gateway.

## Branching Workflow

1. Branches should be made from the `master` branched and named with the issue number followed be a description of the feature you are adding. e.g. `3-add-branching-workflow`.
1. Pull Requests should be made early, and they should include `WIP`, `work in progress` or 🚧 in the title.
1. Once a Pull Request is ready for code review then `WIP`, `work in progress` or 🚧 should be removed from the title then assigned to someone for code review.
1. The description of the issue should reference the issue it is closing. e.g. `Fixes #3`.
1. The person will code review and leave inline comments were applicable. Once completed the Pull Request will either be submitted back to the author of the PR or merged if there are no changes required.

## Setup

### Chassis
1. Clone Chassis into a new folder: `git clone https://github.com/Chassis/Chassis.git chargify-plugin`.
1. Change into the newly cloned folder: `cd chargify-plugin`.
1. Clone this repo into a content folder: `git clone https://github.com/TheCodeCompany/wp-chargify.git content`.
1. Copy `local-config-sample.php` and rename it to `local-config.php`. Use this file to define and PHP constants you need for the project.
1. Run `vagrant plugin install vagrant-hostsupdater` to install the Vagrant Hostsupdater plugin.
1. Run Vagrant `vagrant up`.
1. Visit [http://chargify.local](http://chargify.local) to see the frontend of the site.
1. Login to the [admin](http://chargify.local/wp/wp-admin) using username: `admin` and password: `password`.
1. Profit!

#### Linux Users

If you're a Linux user you will need to do the following extra step:
1. Run `sudo apt-get install avahi-dnsconfd` in your terminal to install Avahi.

### Devilbox
1. Setup Devilbox and run it as per their [guide](https://devilbox.readthedocs.io/en/latest/getting-started/install-the-devilbox.html).
1. Devilbox should now be running with a WordPress install.
1. At this stage of the plugins life, the plugin is yet to have a stand alone install method.
Copy the plugin directory `wp-chargify` from the `/plugins/wp-chargify` into your WordPress plugins dir.
1. Install the dependency plugin classic-editor.
1. Setup Classic Editor plugin to work for the Products post type.

#### Build tools.
At this stage the built files will not be committed.
In this case navigate to the wp-chargify plugin dir and run the following;

```bash
composer install
npm install
```

Depending on versions of php it may be required to run a alternative command for composer.

```bash
composer install --ignore-platform-reqs
```

Note;
A symlink to the wp-chargify directory allows your local environment to stay up to date.
However, this is not feasible to commit for your primary project.

## Git Hooks

Because we're good developers, and we like automation we do the following:

1. Create a `.git/hooks/pre-commit` file.
1. Make that file executable `chmod +x .git/hooks/pre-commit`
1. Copy and paste the following into that file:
    ```
    #!/bin/sh
    
    vagrant ssh -c /vagrant/content/plugins/wp-chargify/bin/tests.sh
    ```
1. Php CodeSniffer and PHPUnit will be run when you commit using Git.

## Xdebug

Xdebug will be automatically setup for [PHPStorm](https://github.com/Chassis/Xdebug#in-phpstorm). You can follow these [instructions](https://github.com/Chassis/Xdebug#browser-setup) to config everything.

## MailHog

Mailhog has been automatically setup for you to capture all your WordPress email. Visit [http://chargify.local:8025](http://chargify.local:8025) to view any email sent via WordPress.

## SequelPro

We have installed the [SequelPro](https://sequelpro.com/) extension for Chassis. We recommend you download and install the [SequelPro test build](https://sequelpro.com/test-builds).

To connect to the WordPress database simply run `vagrant sequel`.

## phpMyAdmin

We've automatically installed and setup phpMyAdmin for you. You can visit it [here](http://chargify.local/phpmyadmin).

## Webhook Development

We have one webhook for Chargify that listens for `POST` requests and routes them to their respective PHP functions for processing.
For local development the webhook URL is [http://chargify.local/wp-json/chargify/v1/webhook](http://chargify.local/wp-json/chargify/v1/webhook).
There are two ways we can develop for Chargify's [webhooks](https://help.chargify.com/webhooks/webhooks-reference.html).

### Using Postman

We can use [Postman](https://www.postman.com/) to `POST` requests to our development server.

### Using Vagrant Share

If you're using [Chassis](https://chassis.io) for local development then you can use [Vagrant Share](https://docs.chassis.io/en/latest/guides/?highlight=share#vagrant-share)
to generate a URL that publicly accessible and add that URL in the Chargify settings under Config -> Settings -> Webhooks.
e.g. `http://9158347d1ca3.ngrok.io/wp-json/chargify/v1/webhook`

### Using Ngrok on Devilbox

If you're using Devilbox for local development then you can use Ngrok. First setup Ngrok according to this [Devilbox guide](https://devilbox.readthedocs.io/en/latest/custom-container/enable-ngrok.html)
then using the Ngrok link found at http://localhost:4040 add that URL in the Chargify settings under Config -> Settings -> Webhooks.
e.g. `http://9158347d1ca3.ngrok.io/wp-json/chargify/v1/webhook`

## Assets
The assets source code and build tools directories lay outside of the plugin directory to ensure they remain separate.

IMPORTANT: ALL SCRIPTS SHOULD BE RUN FROM REPO ROOT.

This plugin uses two script files to ease the process.
The first is for the build before committing and deployment to production
The second and a second for local development.

### Production Build
Open your terminal and go to the project folder.

```bash
$ cd ~/path/to/repo
$ ./scripts/build.sh
```

### Local Development
Remember to run the build after pulling the latest version of your branch.
Browser sync has not been included due to the nature of this being a plugin.

Navigate to the repo root and run the script with none or any combination of these following parameters, order is not important.

- composer, will rebuild the composer assets before dev start.
- install, will rebuild the package.json assets before dev start.
- yarn, will use yarn instead of npm.
- dashboard, will use the webpack dashboard.

Example 1;
The following will start watching for development changes using npm.

```bash
$ cd ~/path/to/repo
$ ./scripts/dev.sh
```

Example 2;
The following will rebuild the composer files, using yarn,
install all dependencies from the package.json,
and then start dev dashboard to watch for development changes.

```bash
$ cd ~/path/to/repo
$ ./scripts/dev.sh composer install yarn dashboard
```

Example 3;
The following will no rebuild any dependencies and starts webpack dashboard to watch for development changes.

```bash
$ cd ~/path/to/repo
$ ./scripts/dev.sh composer install yarn dashboard
```