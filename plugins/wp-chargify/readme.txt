=== Wp Chargify ===
Contributors: bronsonquick
Tags: chargify, membership, payments, ecommerce, protected content, paywall
Requires at least: 5.0
Tested up to: 5.4.1
Requires PHP: 5.6
Stable tag: 0.1.0
License: GNU GPLv3 or later
License URI: https://www.gnu.org/licenses/lgpl-3.0.en.html

A plugin to add Chargify payments to your WordPress site.

== Description ==

A plugin to add Chargify payments to your WordPress site.

== Installation ==

1. Extract `wp-chargify.zip` to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= Is this plugin official? =

This plugin is not endorsed by Chargify. It is built and maintained by [The Code Company](https://thecode.co/).

= What PHP constants can I use? =

We provide a number of optional PHP constants developers can use to override any of the Chargify options that are stored in the database.

`CHARGIFY_PRODUCTION_API_KEY` - Use this to set the Chargify Production API key.
`CHARGIFY_PRODUCTION_SUBDOMAIN` - Use this to set the Chargify Production subdomain.
`CHARGIFY_TEST_API_KEY` - Use this to set the Chargify Test API key.
`CHARGIFY_TEST_SUBDOMAIN` - Use this to set the Chargify Test subdomain.
`CHARGIFY_MODE` - Use this to set the mode. i.e. 'test' or 'live'.

= What filters can I use? =

We provide a number of optional filters you can use:

`chargify_hide_options` - Use this to hide the Chargify options page.
`chargify_show_accounts` - Set this to `false` to hide the Accounts custom post type.
`chargify_show_products` - Set this to `false` to hide the Products custom post type.
`chargify_show_api_logs` - Set this to `false` to hide the API logs custom post type.
`chargify_generate_password` - Alter the password generation.

= What developer functions can I use? =

We provide a number of functions that developers can use in their themes and plugins. You will need to import the appropriate namespaces to use them.

`Options\get_api_key` - This will return the appropriate API key based on your settings.
`Options\get_subdomain` - This will return the appropriate Chargify subdomain based on your settings.
`Customers\get_wordpress_user_id_from_email` - This function will return the WordPress User ID for the Chargify User if they exist.
`Customers\get_account_details_from_email` - This function will return a WP_Query object with the account details based on an email address.
`Customers\get_account_details` - This function will return a WP_Query object with the account details base on a WordPress user ID.

= What WP-CLI commands are there? =

We provide a number of WP-CLI commands that developers can use:

`wp chargify product-families list` - List out the Product Families stored in Chargify.
`wp chargify product list`          - List out the all the products in all the different Product Families.
`wp chargify product get <id>`      - Get the details of an individual product.
`wp chargify product empty`         - Delete the Chargify Products stored in WordPress.
`wp chargify log empty`             - Delete the Chargify API logs stored in WordPress.
`wp chargify log list`              - List the Chargify API logs stored in WordPress.
`wp chargify log get <id>`          - Get the details of an individual Chargify API log stored in WordPress.
`wp chargify account empty`         - Delete the Chargify account stored in WordPress.
`wp chargify account list`          - List the Chargify account stored in WordPress.
`wp chargify account get <id>`      - Get the details of an individual Chargify account stored in WordPress.

= What about revisions? =

We support revisions on the Product and Account custom post types. If you would like to enable support for meta field
revisions then we recommend you install [WP Post Meta Revisions](https://wordpress.org/plugins/wp-post-meta-revisions/)
and add a function to support revisions for the meta fields you would like to track.

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png`
(or jpg, jpeg, gif).

== Changelog ==

= 0.1 =
* Initial plugin release.

== Upgrade Notice ==

= 0.1 =
This is the initial plugin release.
