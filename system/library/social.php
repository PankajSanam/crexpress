<?php if (!defined('CREXO')) exit('No Trespassing!');

class Social {

	public function icons($width = '', $height = ''){
		$Db = new Db;
		$social = '<ul>';
		$social_icons = $Db->select('social_icons');
		foreach($social_icons as $social_icon){
			$social .= '<li><a target="_blank" title="'.$social_icon['name'].'" href="'.$social_icon['url'].$social_icon['link'].'">
					<img title="'.$social_icon['name'].'" alt="'.$social_icon['name'].'" src="'.DATA_VISION.'/social/'.$social_icon['image'].'" width="'.$width.'" height="'.$height.'" /></a></li>';
		}
		$social .= '</ul>';

		return $social;
	}

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