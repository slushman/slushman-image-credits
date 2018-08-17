# Frequently Asked Questions

## How do I display things in my theme using this plugin?

This plugin is intended to be used with a headless front-end, so it only provides the data in the REST API. You can use a get_post_meta() call using the two field names: image_credit and image_credit_url to fetch the data itself. You'll need to use the attachment ID instead of the post ID for the ID argument.
