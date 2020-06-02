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

= What developer functions can I use? =

We provide a number of functions that developers can use in their themes and plugins. You will need to import the appropriate namespaces to use them.

`Options\get_api_key` - This will return the appropriate API key based on your settings.
`Options\get_subdomain` - This will return the appropriate Chargify subdomain based on your settings.

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
