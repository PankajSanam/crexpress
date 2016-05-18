<?php if ( ! defined('RETINA_VERSION')) exit('No direct access allowed');

class Social {
	
	/**
	 * Creates a Facebook like box for page
	 * https://developers.facebook.com/docs/plugins/like-box-for-pages/
	 */

	public function fb_like_box($fb_page="facebook", $width="230", $height="200"){
		$output = '
			<div id="fb-root"></div>
			<script>
			(function(d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) return;
					js = d.createElement(s); 
					js.id = id;
					js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
					fjs.parentNode.insertBefore(js, fjs);
				}
				(document, "script", "facebook-jssdk")
			);
			</script>
			<div
				class="fb-like-box" 
				data-href="http://www.facebook.com/'.$fb_page.'"
				data-width="'.$width.'" 
				data-height="'.$height.'" 
				data-colorscheme="light" 
				data-show-faces="true" 
				data-header="false" 
				data-stream="false" 
				data-show-border="true">
			</div>';
		return $output;
	}

}
?>