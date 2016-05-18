<?php if (!defined('CREXO')) exit('No Trespassing!');

class Html {

	public static function styles($styles, $type = 0) {
		if($type == 0) {
			$path = FRONT_VIEW;
		} else {
			$path = BACK_VIEW;
		}
		$s = '';
		foreach($styles as $style => $media) {
			$s .= '<link rel="stylesheet" type="text/css" href="' . $path . '/css/' . $style . '" media="' . $media . '" />';
			$s .= "\n";
		}
		return $s;
	}

	public static function scripts($scripts, $type = 0) {
		if($type == 0) {
			$path = FRONT_VIEW;
		} else {
			$path = BACK_VIEW;
		}
		$s = '';
		foreach($scripts as $script) {
			$s .= '<script type="text/javascript" src="' . $path . '/js/' . $script . '"></script>';
			$s .= "\n";
		}
		return $s;
	}

	public static function ul($list, $attributes = '') {
		return Html::_list('ul', $list, $attributes);
	}

	public static function ol($list, $attributes = '') {
		return _list('ol', $list, $attributes);
	}

	public static function _list($type = 'ul', $list, $attributes = '', $depth = 0) {
		// If an array wasn't submitted there's nothing to do...
		if(!is_array($list)) {
			return $list;
		}

		// Set the indentation based on the depth
		$out = str_repeat(" ", $depth);

		// Were any attributes submitted?  If so generate a string
		if(is_array($attributes)) {
			$atts = '';
			foreach($attributes as $key => $val) {
				$atts .= ' ' . $key . '="' . $val . '"';
			}
			$attributes = $atts;
		} elseif(is_string($attributes) AND strlen($attributes) > 0) {
			$attributes = ' ' . $attributes;
		}

		// Write the opening list tag
		$out .= "<" . $type . $attributes . ">\n";

		// Cycle through the list elements.  If an array is
		// encountered we will recursively call _list()

		static $_last_list_item = '';
		foreach($list as $key => $val) {
			$_last_list_item = $key;

			$out .= str_repeat(" ", $depth + 2);
			$out .= "<li>";

			if(!is_array($val)) {
				$out .= $val;
			} else {
				$out .= $_last_list_item . "\n";
				$out .= _list($type, $val, '', $depth + 4);
				$out .= str_repeat(" ", $depth + 2);
			}

			$out .= "</li>\n";
		}

		// Set the indentation for the closing tag
		$out .= str_repeat(" ", $depth);

		// Write the closing list tag
		$out .= "</" . $type . ">\n";

		return $out;
	}

	// Generates <img> tag
	public static function img($src = '', $type = 0) {

		if($type == 0) {
			$path = FRONT_VIEW . '/images/';
		} elseif($type == 1) {
			$path = BACK_VIEW . '/img/';
		} else {
			$path = DATA_VIEW . '/';
		}

		if(!is_array($src)) {
			$src = array('src' => $src);
		}

		// If there is no alt attribute defined, set it to an empty string
		if(!isset($src['alt'])) {
			$src['alt'] = '';
		}

		$img = '<img';

		foreach($src as $k => $v) {
			if($k == 'src' AND strpos($v, '://') === FALSE) {
				$img .= ' src="' . $path . $v . '"';
			} else {
				$img .= " $k=\"$v\"";
			}
		}
		$img .= '/>';
		return $img;
	}

	//Creates the opening portion of the form.
	public static function form_open($action = '', $attributes = '', $hidden = array()) {
		$CI = & get_instance();

		if($attributes == '') {
			$attributes = 'method="post"';
		}

		// If an action is not a full URL then turn it into one
		if($action && strpos($action, '://') === FALSE) {
			$action = $CI->config->site_url($action);
		}

		// If no action is provided then set to the current url
		$action OR $action = $CI->config->site_url($CI->uri->uri_string());

		$form = '<form action="' . $action . '"';

		$form .= _attributes_to_string($attributes, TRUE);

		$form .= '>';

		// Add CSRF field if enabled, but leave it out for GET requests and requests to external websites
		if($CI->config->item('csrf_protection') === TRUE AND !(strpos($action, $CI->config->base_url()) === FALSE OR strpos($form, 'method="get"'))) {
			$hidden[$CI->security->get_csrf_token_name()] = $CI->security->get_csrf_hash();
		}

		if(is_array($hidden) AND count($hidden) > 0) {
			$form .= sprintf("<div style=\"display:none\">%s</div>", form_hidden($hidden));
		}

		return $form;
	}

	//Generates HTML BR tags based on number supplied
	public static function br($num = 1) {
		return str_repeat("<br />", $num);
	}

	// Creates the opening portion of the form, but with "multipart/form-data".
	public static function form_open_multipart($action = '', $attributes = array(), $hidden = array()) {
		if(is_string($attributes)) {
			$attributes .= ' enctype="multipart/form-data"';
		} else {
			$attributes['enctype'] = 'multipart/form-data';
		}

		return form_open($action, $attributes, $hidden);
	}

	//Form close tag
	public static function form_close($extra = '') {
		return "</form>" . $extra;
	}

	//Text Input Field
	function form_input($data = '', $value = '', $extra = '') {
		$defaults = array('type' => 'text', 'name' => ((!is_array($data)) ? $data : ''), 'value' => $value);

		return "<input " . _parse_form_attributes($data, $defaults) . $extra . " />";
	}

	//Password Field
	function form_password($data = '', $value = '', $extra = '') {
		if(!is_array($data)) {
			$data = array('name' => $data);
		}

		$data['type'] = 'password';
		return form_input($data, $value, $extra);
	}

	// Input file type
	function form_upload($data = '', $value = '', $extra = '') {
		if(!is_array($data)) {
			$data = array('name' => $data);
		}

		$data['type'] = 'file';
		return form_input($data, $value, $extra);
	}

	//Textarea field
	function form_textarea($data = '', $value = '', $extra = '') {
		$defaults = array('name' => ((!is_array($data)) ? $data : ''), 'cols' => '40', 'rows' => '10');

		if(!is_array($data) OR !isset($data['value'])) {
			$val = $value;
		} else {
			$val = $data['value'];
			unset($data['value']); // textareas don't use the value attribute
		}

		$name = (is_array($data)) ? $data['name'] : $data;
		return "<textarea " . _parse_form_attributes($data, $defaults) . $extra . ">" . form_prep($val, $name) . "</textarea>";
	}

	//Multi select menu
	function form_multiselect($name = '', $options = array(), $selected = array(), $extra = '') {
		if(!strpos($extra, 'multiple')) {
			$extra .= ' multiple="multiple"';
		}

		return form_dropdown($name, $options, $selected, $extra);
	}

	//drop down menu
	function form_dropdown($name = '', $options = array(), $selected = array(), $extra = '') {
		if(!is_array($selected)) {
			$selected = array($selected);
		}

		// If no selected state was submitted we will attempt to set it automatically
		if(count($selected) === 0) {
			// If the form name appears in the $_POST array we have a winner!
			if(isset($_POST[$name])) {
				$selected = array($_POST[$name]);
			}
		}

		if($extra != '')
			$extra = ' ' . $extra;

		$multiple = (count($selected) > 1 && strpos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';

		$form = '<select name="' . $name . '"' . $extra . $multiple . ">\n";

		foreach($options as $key => $val) {
			$key = (string) $key;

			if(is_array($val) && !empty($val)) {
				$form .= '<optgroup label="' . $key . '">' . "\n";

				foreach($val as $optgroup_key => $optgroup_val) {
					$sel = (in_array($optgroup_key, $selected)) ? ' selected="selected"' : '';

					$form .= '<option value="' . $optgroup_key . '"' . $sel . '>' . (string) $optgroup_val . "</option>\n";
				}

				$form .= '</optgroup>' . "\n";
			} else {
				$sel = (in_array($key, $selected)) ? ' selected="selected"' : '';

				$form .= '<option value="' . $key . '"' . $sel . '>' . (string) $val . "</option>\n";
			}
		}

		$form .= '</select>';

		return $form;
	}

	//checkbox field
	function form_checkbox($data = '', $value = '', $checked = FALSE, $extra = '') {
		$defaults = array('type' => 'checkbox', 'name' => ((!is_array($data)) ? $data : ''), 'value' => $value);

		if(is_array($data) AND array_key_exists('checked', $data)) {
			$checked = $data['checked'];

			if($checked == FALSE) {
				unset($data['checked']);
			} else {
				$data['checked'] = 'checked';
			}
		}

		if($checked == TRUE) {
			$defaults['checked'] = 'checked';
		} else {
			unset($defaults['checked']);
		}

		return "<input " . _parse_form_attributes($data, $defaults) . $extra . " />";
	}

	//Radio button
	function form_radio($data = '', $value = '', $checked = FALSE, $extra = '') {
		if(!is_array($data)) {
			$data = array('name' => $data);
		}

		$data['type'] = 'radio';
		return form_checkbox($data, $value, $checked, $extra);
	}

	//Submit button
	function form_submit($data = '', $value = '', $extra = '') {
		$defaults = array('type' => 'submit', 'name' => ((!is_array($data)) ? $data : ''), 'value' => $value);

		return "<input " . _parse_form_attributes($data, $defaults) . $extra . " />";
	}

	//Reset Button
	function form_reset($data = '', $value = '', $extra = '') {
		$defaults = array('type' => 'reset', 'name' => ((!is_array($data)) ? $data : ''), 'value' => $value);

		return "<input " . _parse_form_attributes($data, $defaults) . $extra . " />";
	}

	//Form Button
	function form_button($data = '', $content = '', $extra = '') {
		$defaults = array('name' => ((!is_array($data)) ? $data : ''), 'type' => 'button');

		if(is_array($data) AND isset($data['content'])) {
			$content = $data['content'];
			unset($data['content']); // content is not an attribute
		}

		return "<button " . _parse_form_attributes($data, $defaults) . $extra . ">" . $content . "</button>";
	}

	//Form label tag
	function form_label($label_text = '', $id = '', $attributes = array()) {

		$label = '<label';

		if($id != '') {
			$label .= " for=\"$id\"";
		}

		if(is_array($attributes) AND count($attributes) > 0) {
			foreach($attributes as $key => $val) {
				$label .= ' ' . $key . '="' . $val . '"';
			}
		}

		$label .= ">$label_text</label>";

		return $label;
	}

	//Fieldset tag
	function form_fieldset($legend_text = '', $attributes = array()) {
		$fieldset = "<fieldset";

		$fieldset .= _attributes_to_string($attributes, FALSE);

		$fieldset .= ">\n";

		if($legend_text != '') {
			$fieldset .= "<legend>$legend_text</legend>\n";
		}

		return $fieldset;
	}

	//fieldset close tag
	function form_fieldset_close($extra = '') {
		return "</fieldset>" . $extra;
	}

	function heading($data = '', $h = '1', $attributes = '') {
		$attributes = ($attributes != '') ? ' ' . $attributes : $attributes;
		return "<h" . $h . $attributes . ">" . $data . "</h" . $h . ">";
	}

	function doctype($type = 'xhtml1-strict') {
		global $_doctypes;

		if(!is_array($_doctypes)) {
			if(defined('ENVIRONMENT') AND is_file(APPPATH . 'config/' . ENVIRONMENT . '/doctypes.php')) {
				include(APPPATH . 'config/' . ENVIRONMENT . '/doctypes.php');
			} elseif(is_file(APPPATH . 'config/doctypes.php')) {
				include(APPPATH . 'config/doctypes.php');
			}

			if(!is_array($_doctypes)) {
				return FALSE;
			}
		}

		if(isset($_doctypes[$type])) {
			return $_doctypes[$type];
		} else {
			return FALSE;
		}
	}

	function nbs($num = 1) {
		return str_repeat("&nbsp;", $num);
	}

}