# BuddyPress Developer Resource

These installation instructions are meant for if you want to have your own local copy of the BuddyPress Developer resources or if you wish to help contribute to developer.buddypress.org.

## Installation instructions

Please make sure you have [WP-CLI](http://wp-cli.org/) installed and working. You will use it for the actual import process.

1. Create a new WordPress installation. Remove the default wp-config-sample.php file and wp-content directory. We'll provide them for you.
2. Clone the repo down into the root directory of the new install.
3. Fill in the wp-config-sample file like usual. The repo copy has some needed defined constants used in the theme.
4. Activate the bporg-developer child theme.
5. Install the following plugins:
	1. [BuddyPress](https://www.wordpress.org/plugins/buddypress) by BuddyPress Community
	2. [SyntaxHighlighter Evolved](https://wordpress.org/plugins/syntaxhighlighter/) by Viper007Bond
6. Log in to the install and activate the WP-Parser, BuddyPress, and SyntaxHighlighter Evolved plugins.
7. Open a terminal prompt and change your present working directory to the BuddyPress folder in your plugins folder.
8. Run the command `wp parser create . --user=1`. This will take awhile as it works through the entire BuddyPress core code.
	1. The single period indicates it should parse from the current directory. In this case, the `buddypress` folder.
	2. The `--user=1` parameter assigns the newly created posts to user ID 1.
	3. See wp help parser for all available options.
	
At this point, the parser will do its work and you can start looking around the site.

