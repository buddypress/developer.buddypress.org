# WP Parser

WP-Parser is the parser for creating the new code reference at [developer.wordpress.org](http://developer.wordpress.org/reference). It parses the inline documentation and produces custom post type entries in WordPress.

We are currently looking for contributors to help us complete the work on the parser.

There is a guide to developing for developer.wordpress.org in the [WordPress documentation handbook](http://make.wordpress.org/docs/handbook/projects/devhub/)

## Requirements
* PHP 5.4+
* [Composer](https://getcomposer.org/)
* [WP CLI](http://wp-cli.org/)

Install via Composer into your WordPress plugins directory:

    composer create-project rmccue/wp-parser:dev-master --no-dev

## Running
Note: ensure the plugin is enabled first.

In your site's directory:

	$ wp parser create /path/to/source/code --user=<id|login>
