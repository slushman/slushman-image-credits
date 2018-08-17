=== Slushman Image Credits ===
Contributors: slushman
Donate link: https://www.slushman.com
Tags: images
Requires at least: 4.7
Tested up to: 4.9.8
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds image credit fields to photos and adds those fields to the REST API.

== Description ==

Adds image credit fields to photos and adds those fields to the REST API.

This plugins adds a credit field for the Author's name and a Credit URL field for the author's URL.



== Installation ==

1. Upload the slushman-image-credits folder to your plugins directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.



== Frequently Asked Questions ==

= How do I display things in my theme using this plugin? =

This plugin is intended to be used with a headless front-end, so it only provides the data in the REST API. You can use a get_post_meta() call using the two field names: image_credit and image_credit_url to fetch the data itself. You'll need to use the attachment ID instead of the post ID for the ID argument.



== Changelog ==

= 1.0.0 =
* Plugin published.



== Upgrade Notice ==

= 1.0.0 =
* Plugin published.