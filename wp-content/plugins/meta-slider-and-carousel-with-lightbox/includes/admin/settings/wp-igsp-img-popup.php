<?php
/**
 * Image Data Popup
 *
 * @package Meta slider and carousel with lightbox
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
?>

<div class="wp-igsp-img-data-wrp wp-igsp-hide">
	<div class="wp-igsp-img-data-cnt">

		<div class="wp-igsp-img-cnt-block">
			<div class="wp-igsp-popup-close wp-igsp-popup-close-wrp"><img src="<?php echo WP_IGSP_URL; ?>assets/images/close.png" alt="<?php _e('Close (Esc)', 'meta-slider-and-carousel-with-lightbox'); ?>" title="<?php _e('Close (Esc)', 'meta-slider-and-carousel-with-lightbox'); ?>" /></div>

			<div class="wp-igsp-popup-body-wrp">
			</div><!-- end .wp-igsp-popup-body-wrp -->
			
			<div class="wp-igsp-img-loader"><?php _e('Please Wait', 'meta-slider-and-carousel-with-lightbox'); ?> <span class="spinner"></span></div>

		</div><!-- end .wp-igsp-img-cnt-block -->

	</div><!-- end .wp-igsp-img-data-cnt -->
</div><!-- end .wp-igsp-img-data-wrp -->
<div class="wp-igsp-popup-overlay"></div>