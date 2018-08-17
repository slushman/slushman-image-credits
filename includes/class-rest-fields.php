<?php

/**
 * Defines the functionality for adding fields to REST API requests.
 *
 * @link 		https://www.slushman.com
 * @since 		1.0.0
 * @package 	ImageCredits\Includes
 * @author 		Slushman <chris@slushman.com>
 */

namespace ImageCredits\Includes;

class Rest_Fields {

	/**
	 * Registers all the WordPress hooks and filters related to this class.
	 *
	 * @hooked 		init
	 * @since 		1.0.0
	 */
	public function hooks() {

		add_action( 'rest_api_init', array( $this, 'register_fields' ) );

	} // hooks()

	/**
	 * Registers fields for the REST requests.
	 * 
	 * @hooked 		rest_api_init
	 * @since 		1.0.0
	 */
	public function register_fields() {

		register_rest_field( 'attachment', 'credits', array(
			'get_callback' 	=> array( $this, 'add_image_credits' ),
			'schema' 		=> null
		));

	} // register_fields()

	/**
	 * Adds Yoast SEO metadata to the JSON data returned via the REST API.
	 * 
	 * @since 		1.0.0
	 * @param 		obj 		$post 		The attachment post object
	 * @return 		array 							An array of metadata.
	 */
	public function add_image_credits( $post ) {

		$imageCredit['credit'] 		= get_post_meta( $post['id'], 'image_credit', true );
		$imageCredit['credit_url'] 	= get_post_meta( $post['id'], 'image_credit_url', true );

		return $imageCredit;
		
	} // add_image_credits()

} // class