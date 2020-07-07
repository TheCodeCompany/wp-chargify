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

= What shortcodes can I use? =

`[chargify-signup-form]` - Will render a sign up form.

= What PHP constants can I use? =

We provide a number of optional PHP constants developers can use to override any of the Chargify options that are stored in the database.

`CHARGIFY_PRODUCTION_API_KEY` - Use this to set the Chargify Production API key.
`CHARGIFY_PRODUCTION_SUBDOMAIN` - Use this to set the Chargify Production subdomain.
`CHARGIFY_TEST_API_KEY` - Use this to set the Chargify Test API key.
`CHARGIFY_TEST_SUBDOMAIN` - Use this to set the Chargify Test subdomain.
`CHARGIFY_MODE` - Use this to set the mode. i.e. 'test' or 'live'.
`CHARGIFY_WEBHOOK_URL` - Set this constant if you are developing locally and want to use ngrok. e.g. `define( 'CHARGIFY_WEBHOOK_URL', 'http://70b296211bca.ngrok.io' );`

= What filters can I use? =

We provide a number of optional filters you can use:

`chargify_hide_options` - Use this to hide the Chargify options page.
`chargify_show_accounts` - Set this to `false` to hide the Accounts custom post type.
`chargify_show_products` - Set this to `false` to hide the Products custom post type.
`chargify_show_api_logs` - Set this to `false` to hide the API logs custom post type.
`chargify_generate_password` - Alter the password generation.

== Chargify signup form filters. ==

`chargify_message_details_fields` - Filter the Message Details form field. Use `$signup_form->add_field` and `$signup_form->remove_field` to add and/or remove fields.
`chargify_form_message_html` - Filter the message html. $html and array of $form_messages that can manipulate the html, with html required as the return value.

`chargify_customer_details_fields` - Filter the Customer Details form field. Use `$signup_form->add_field` and `$signup_form->remove_field` to add and/or remove fields.
	Available fields by id;
    - 'chargify_customer_details_title'
    - 'chargify_first_name'
    - 'chargify_last_name'
    - 'chargify_email_address'
    - 'chargify_cc_emails'
    - 'chargify_organisation'
    - 'chargify_billing_reference'
    - 'chargify_address_1'
    - 'chargify_address_2'
    - 'chargify_city'
    - 'chargify_zip'
    - 'chargify_state'
    - 'chargify_country'

`chargify_account_details_fields` - Filter the Account Details form field. Use `$signup_form->add_field` and `$signup_form->remove_field` to add and/or remove fields.
	Available fields by id;
    - 'chargify_account_details_title'
    - 'wordpress_username'
    - 'wordpress_password'

`chargify_customer_billing_fields` - Filter the Customer Billing Details form field. Use `$signup_form->add_field` and `$signup_form->remove_field` to add and/or remove fields.
	Available fields by id;
    - 'chargify_billing_title'
    - 'chargify_billing_first_name'
    - 'chargify_billing_last_name'
    - 'chargify_billing_address_1'
    - 'chargify_billing_address_2'
    - 'chargify_billing_city'
    - 'chargify_billing_zip'
    - 'chargify_billing_state'
    - 'chargify_billing_country'

`chargify_coupon_fields` - Filter the Coupon Details form field. Use `$signup_form->add_field` and `$signup_form->remove_field` to add and/or remove fields.
	Available fields by id;
    - 'chargify_coupon_title'
    - 'chargify_coupon_code'

`chargify_payment_fields` - Filter the Payment Details form field. Use `$signup_form->add_field` and `$signup_form->remove_field` to add and/or remove fields.
	Available fields by id;
    - 'chargify_payment_title'
    - 'chargify_payment_first_name'
    - 'chargify_payment_last_name'
    - 'chargify_payment_card_number'
    - 'chargify_payment_expiry_month'
    - 'chargify_payment_expiry_year'
    - 'chargify_payment_cvv'

`chargify_signup_metafields` - A place to filter in any metafields you need to send to Chargify.
`chargify_default_product` - A filter to specify a default product in Chargify. You can pass `product_handle` to the signup form to set this. e.g. `www.yoursite.com/signup?product_handle=database-standard`.
`chargify_signup_form_args` - A filter to alter additional form fields such as the text on on the signup button and turn off CSS styles.
`chargify_signup_form_attributes` - A filter to alter attributes on the signup 'from' element.

= What actions can I use? +

We provide a number of options actions you can use:

`chargify\webhook` - Provides you with an action to handle additional [webhooks](https://help.chargify.com/webhooks/webhooks-reference.html) that aren't supported inside the plugin. You can also handle additional business logic for webhooks here.

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
`wp chargify settings empty`        - Delete all the Chargify related settings stored in WordPress.
`wp chargify webhook list`          - List the last webhooks that were sent from Chargify.

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
