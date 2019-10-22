<?php
/**
 * Popup Image Data HTML
 *
 * @package Meta slider and carousel with lightbox
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

$prefix = WP_IGSP_META_PREFIX;

// Taking some values
$alt_text 			= get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );

?>

<div class="wp-igsp-popup-title"><?php _e('Edit Image', 'meta-slider-and-carousel-with-lightbox'); ?></div>
	
<div class="wp-igsp-popup-body">

	<form method="post" class="wp-igsp-attachment-form">
		
		<?php if( !empty($attachment_post->guid) ) { ?>
		<div class="wp-igsp-popup-img-preview">
			<img src="<?php echo $attachment_post->guid; ?>" alt="" />
		</div>
		<?php } ?>
		<a href="<?php echo get_edit_post_link( $attachment_id ); ?>" target="_blank" class="button right"><i class="dashicons dashicons-edit"></i> <?php _e('Edit Image From Attachment Page', 'meta-slider-and-carousel-with-lightbox'); ?></a>

		<table class="form-table">
			<tr>
				<th><label for="wp-igsp-attachment-title"><?php _e('Title', 'meta-slider-and-carousel-with-lightbox'); ?>:</label></th>
				<td>
					<input type="text" name="wp_igsp_attachment_title" value="<?php echo wp_igsp_esc_attr($attachment_post->post_title); ?>" class="large-text wp-igsp-attachment-title" id="wp-igsp-attachment-title" />
					<span class="description"><?php _e('Enter image title.', 'meta-slider-and-carousel-with-lightbox'); ?></span>
				</td>
			</tr>

			<tr>
				<th><label for="wp-igsp-attachment-alt-text"><?php _e('Alternative Text', 'meta-slider-and-carousel-with-lightbox'); ?>:</label></th>
				<td>
					<input type="text" name="wp_igsp_attachment_alt" value="<?php echo wp_igsp_esc_attr($alt_text); ?>" class="large-text wp-igsp-attachment-alt-text" id="wp-igsp-attachment-alt-text" />
					<span class="description"><?php _e('Enter image alternative text.', 'meta-slider-and-carousel-with-lightbox'); ?></span>
				</td>
			</tr>

			<tr>
				<th><label for="wp-igsp-attachment-caption"><?php _e('Caption', 'meta-slider-and-carousel-with-lightbox'); ?>:</label></th>
				<td>
					<textarea name="wp_igsp_attachment_caption" class="large-text wp-igsp-attachment-caption" id="wp-igsp-attachment-caption"><?php echo wp_igsp_esc_attr($attachment_post->post_excerpt); ?></textarea>
					<span class="description"><?php _e('Enter image caption.', 'meta-slider-and-carousel-with-lightbox'); ?></span>
				</td>
			</tr>			

			<tr>
				<td colspan="2" align="right">
					<div class="wp-igsp-success wp-igsp-hide"></div>
					<div class="wp-igsp-error wp-igsp-hide"></div>
					<span class="spinner wp-igsp-spinner"></span>
					<button type="button" class="button button-primary wp-igsp-save-attachment-data" data-id="<?php echo $attachment_id; ?>"><i class="dashicons dashicons-yes"></i> <?php _e('Save Changes', 'meta-slider-and-carousel-with-lightbox'); ?></button>
					<button type="button" class="button wp-igsp-popup-close"><?php _e('Close', 'meta-slider-and-carousel-with-lightbox'); ?></button>
				</td>
			</tr>
		</table>
	</form><!-- end .wp-igsp-attachment-form -->

</div><!-- end .wp-igsp-popup-body -->