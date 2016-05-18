<?php if (!defined('CREXO')) exit('No Trespassing!');

class Sanitize {

	public function strip_html($string, $length = 300, $arg = ''){
		$search = array(
			'@<script[^>]*?>.*?</script>@si',  	// Strip out javascript
            '@<[\/\!]*?[^<>]*?>@si',           	// Strip out HTML tags
            '@<style[^>]*?>.*?</style>@siU',  	// Strip style tags properly
            '@<![\s\S]*?--[ \t\n\r]*>@'       	// Strip multi-line comments including CDATA
		);
		$text = preg_replace($search, '', $string);
		$text = substr($text,0,$length);
		return $text . $arg;
	}

	public function clean($string){

		$string = preg_replace("/[^a-zA-Z0-9 -.]/", '', $string);
		$string = preg_replace('/[\n\r\t]+/', '', $string);
		$string = preg_replace('/\s{2,}/u', ' ', $string);
		$string = strtolower(trim($string));
		$string = str_replace(' ', '-', $string);

		return $string;
	}

	/**
	 * Removes any non-alphanumeric characters.
	 *
	 * string $string String to sanitize
	 * array $allowed An array of additional characters that are not to be removed.
	 */

	public function remove_special_chars($string, $allowed = array()) {
		$allow = null;
		if (!empty($allowed)) {
			foreach ($allowed as $value) {
				$allow .= "\\$value";
			}
		}

		if (is_array($string)) {
			$cleaned = array();
			foreach ($string as $key => $clean) {
				$cleaned[$key] = preg_replace("/[^{$allow}a-zA-Z0-9]/", '', $clean);
			}
		} else {
			$cleaned = preg_replace("/[^{$allow}a-zA-Z0-9]/", '', $string);
		}
		return $cleaned;
	}

	/** Strips image tags from output **/
	public function strip_images($str) {
		$str = preg_replace('/(<a[^>]*>)(<img[^>]+alt=")([^"]*)("[^>]*>)(<\/a>)/i', '$1$3$5<br />', $str);
		$str = preg_replace('/(<img[^>]+alt=")([^"]*)("[^>]*>)/i', '$2<br />', $str);
		$str = preg_replace('/<img[^>]*>/i', '', $str);
		return $str;
	}

	/** Strips scripts and stylesheets from output **/
	public function strip_scripts($str) {
		return preg_replace('/(<link[^>]+rel="[^"]*stylesheet"[^>]*>|<img[^>]*>|style="[^"]*")|<script[^>]*>.*?<\/script>|<style[^>]*>.*?<\/style>|<!--.*?-->/is', '', $str);
	}

	/** Strips extra whitespace from output **/
	public function strip_whitespaces($str) {
		$r = preg_replace('/[\n\r\t]+/', '', $str);
		return preg_replace('/\s{2,}/u', ' ', $r);
	}

	/*
	 * Strips the specified tags from output. First parameter is string from
	 * where to remove tags. All subsequent parameters are tags.
	 *
	 * Ex.`$clean = Sanitize::stripTags($dirty, 'b', 'p', 'div');`
	 *
	 * Will remove all `<b>`, `<p>`, and `<div>` tags from the $dirty string.
	 *
	 * string $str String to sanitize
	 * string $tag Tag to remove (add more parameters as needed)
	 */
	public function strip_tags() {
		$params = func_get_args();
		$str = $params[0];

		for ($i = 1, $count = count($params); $i < $count; $i++) {
			$str = preg_replace('/<' . $params[$i] . '\b[^>]*>/i', '', $str);
			$str = preg_replace('/<\/' . $params[$i] . '[^>]*>/i', '', $str);
		}
		return $str;
	}

	function strip_image_tags($str)
	{
		$str = preg_replace("#<img\s+.*?src\s*=\s*[\"'](.+?)[\"'].*?\>#", "\\1", $str);
		$str = preg_replace("#<img\s+.*?src\s*=\s*(.+?).*?\>#", "\\1", $str);

		return $str;
	}
	
	function encode_php_tags($str)
	{
		return str_replace(array('<?php', '<?PHP', '<?', '?>'),  array('&lt;?php', '&lt;?PHP', '&lt;?', '?&gt;'), $str);
	}
	
}