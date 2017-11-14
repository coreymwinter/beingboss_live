<?php
function artmag_fm_customjs() {
global $artmag_opt; 
?>
<script type="text/javascript">
	<?php if($artmag_opt['header-slider'] != false){ ?>
	jQuery(document).ready(function(){
		"use strict";
		jQuery('.mOver-slider').mOverSlider({
		    columns : <?php echo esc_attr($artmag_opt['header-slider-number']); ?>
		});
	});
	<?php } ?>
</script>

<?php }
add_action( 'wp_footer', 'artmag_fm_customjs', 20 );
?>