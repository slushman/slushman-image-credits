<?php

/**
 * Defines functionality related to adding meta fields to images.
 *
 * @package    ImageCredits
 * @subpackage ImageCredits/admin
 * @author     slushman <chris@slushman.com>
 */

namespace ImageCredits\Admin;

class Image_Meta {

	/**
	 * Registers all the WordPress hooks and filters related to this class.
	 *
	 * @hooked 		init
	 * @since 		1.0.0
	 */
	public function hooks() {

		add_filter( 'attachment_fields_to_edit', array( $this, 'add_fields' ), 10, 2 );
		add_filter( 'attachment_fields_to_save', array( $this, 'save_fields' ), 10 , 2 );

	} // hooks()

	/**
	 * Adds meta fields to the media attachment forms.
	 * 
	 * @hooked 		attachment_fields_to_edit
	 * @since 		1.0.0
	 * @param 		array 		$form_fields 		The current form fields.
	 * @param 		obj 		$attachment 		The attachment post object.
	 * @return 		array 							The modified form fields.
	 */
	public function add_fields( $form_fields, $attachment ) {

		$attachmentMeta = get_post_meta( $attachment->ID );

		$form_fields['image_credit']['label'] = __( 'Credit', 'slushman-image-credits' );
		$form_fields['image_credit']['input'] = 'text';
		$form_fields['image_credit']['value'] = $attachmentMeta['image_credit'][0];
		$form_fields['image_credit']['helps'] = __( 'The name of the image author/photographer.', 'slushman-image-credits' );

		$form_fields['image_credit_url']['label'] = __( 'URL', 'slushman-image-credits' );
		$form_fields['image_credit_url']['input'] = 'text';
		$form_fields['image_credit_url']['value'] = $attachmentMeta['image_credit_url'][0];
		$form_fields['image_credit_url']['helps'] = __( 'The URL for the image author.', 'slushman-image-credits' );

		return $form_fields;

	} // add_fields()

	/**
	 * Saves meta fields for attachments.
	 * 
	 * @hooked 		attachment_fields_to_save
	 * @since 		1.0.0
	 * @param 		array 		$postData 				Post data.
	 * @param 		array 		$attachmentData 		Attachment data.
	 * @return 		obj 								The modified post object.
	 */
	public function save_fields( $postData, $attachmentData ) {

		if ( isset( $attachmentData['image_credit'] ) ) {

			$image_credit = get_post_meta( $postData['ID'], 'image_credit', true );

			if ( $image_credit != esc_attr( $attachmentData['image_credit'] ) ) {

				if ( empty( $attachmentData['image_credit'] ) ) {
				
					delete_post_meta( $postData['ID'], 'image_credit' );
				
				} else {
				
					update_post_meta( $postData['ID'], 'image_credit', esc_attr( $attachmentData['image_credit'] ) );
				
				}
			
			}
		
		}

		if ( isset( $attachmentData['image_credit_url'] ) ) {

			$image_credit_url = get_post_meta( $postData['ID'], 'image_credit_url', true );

			if ( $image_credit_url != esc_url( $attachmentData['image_credit_url'] ) ) {

				if ( empty( $attachmentData['image_credit_url'] ) ) {
				
					delete_post_meta( $postData['ID'], 'image_credit_url' );
				
				} else {
				
					update_post_meta( $postData['ID'], 'image_credit_url', esc_url( $attachmentData['image_credit_url'] ) );
				
				}
			
			}
		
		}

		return $postData;

	} // save_fields()

} // class
