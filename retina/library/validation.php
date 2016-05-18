<?php
class Validation {
	public static function admin_auth(){
		@session_start();
		if(!isset($_SESSION['admin'])) header("location:index.html");
	}

	function admin_user_auth(){
		@session_start();
		if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])) header("location:index.html");
	}

	function check_auth(){
		session_start();
		if(!isset($_SESSION['admin'])) { echo 'You do not have enough privileges to perform this action.'; exit(); }
	}

	public static function strip_html($string, $length = 300, $arg = ''){ 
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
}


class Validator {

	protected $translator;
	protected $presenceVerifier;
	protected $failedRules = array();
	protected $messages;
	protected $data;
	protected $files = array();
	protected $rules;
	protected $customMessages = array();
	protected $customAttributes = array();
	protected $extensions = array();
	protected $sizeRules = array('Size', 'Between', 'Min', 'Max');
	protected $numericRules = array('Numeric', 'Integer');
	protected $implicitRules = array('Required', 'RequiredWith', 'RequiredWithout', 'RequiredIf', 'Accepted');

	/**
	 * Validate that an attribute is a valid IP.
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @return bool
	 */
	protected function validateIp($attribute, $value)
	{
		return filter_var($value, FILTER_VALIDATE_IP) !== false;
	}

	/**
	 * Validate that an attribute is a valid e-mail address.
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @return bool
	 */
	protected function validateEmail($attribute, $value)
	{
		return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
	}

	/**
	 * Validate that an attribute is a valid URL.
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @return bool
	 */
	protected function validateUrl($attribute, $value)
	{
		return filter_var($value, FILTER_VALIDATE_URL) !== false;
	}

	/**
	 * Validate that an attribute is an active URL.
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @return bool
	 */
	protected function validateActiveUrl($attribute, $value)
	{
		$url = str_replace(array('http://', 'https://', 'ftp://'), '', strtolower($value));

		return checkdnsrr($url);
	}

	/**
	 * Validate the MIME type of a file is an image MIME type.
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @return bool
	 */
	protected function validateImage($attribute, $value)
	{
		return $this->validateMimes($attribute, $value, array('jpeg', 'png', 'gif', 'bmp'));
	}

	/**
	 * Validate the MIME type of a file upload attribute is in a set of MIME types.
	 *
	 * @param  string  $attribute
	 * @param  array   $value
	 * @param  array   $parameters
	 * @return bool
	 */
	protected function validateMimes($attribute, $value, $parameters)
	{
		if ( ! $value instanceof File or $value->getPath() == '')
		{
			return true;
		}

		// The Symfony File class should do a decent job of guessing the extension
		// based on the true MIME type so we'll just loop through the array of
		// extensions and compare it to the guessed extension of the files.
		return in_array($value->guessExtension(), $parameters);
	}

	/**
	 * Validate that an attribute contains only alphabetic characters.
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @return bool
	 */
	protected function validateAlpha($attribute, $value)
	{
		return preg_match('/^([a-z])+$/i', $value);
	}

	/**
	 * Validate that an attribute contains only alpha-numeric characters.
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @return bool
	 */
	protected function validateAlphaNum($attribute, $value)
	{
		return preg_match('/^([a-z0-9])+$/i', $value);
	}

	/**
	 * Validate that an attribute contains only alpha-numeric characters, dashes, and underscores.
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @return bool
	 */
	protected function validateAlphaDash($attribute, $value)
	{
		return preg_match('/^([a-z0-9_-])+$/i', $value);
	}

	/**
	 * Validate that an attribute passes a regular expression check.
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @param  array   $parameters
	 * @return bool
	 */
	protected function validateRegex($attribute, $value, $parameters)
	{
		return preg_match($parameters[0], $value);
	}

	/**
	 * Validate that an attribute is a valid date.
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @return bool
	 */
	protected function validateDate($attribute, $value)
	{
		if ($value instanceof DateTime) return true;

		if (strtotime($value) === false) return false;

		$date = date_parse($value);

		return checkdate($date['month'], $date['day'], $date['year']);
	}

	/**
	 * Validate that an attribute matches a date format.
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @param  array   $parameters
	 * @return bool
	 */
	protected function validateDateFormat($attribute, $value, $parameters)
	{
		$parsed = date_parse_from_format($parameters[0], $value);

		return $parsed['error_count'] === 0;
	}

	/**
	 * Validate the date is before a given date.
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @param  array   $parameters
	 * @return bool
	 */
	protected function validateBefore($attribute, $value, $parameters)
	{
		return strtotime($value) < strtotime($parameters[0]);
	}

	/**
	 * Validate the date is after a given date.
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @param  array   $parameters
	 * @return bool
	 */
	protected function validateAfter($attribute, $value, $parameters)
	{
		return strtotime($value) > strtotime($parameters[0]);
	}

	/**
	 * Get the validation message for an attribute and rule.
	 *
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @return string
	 */
	protected function getMessage($attribute, $rule)
	{
		$lowerRule = strtolower(snake_case($rule));

		$inlineMessage = $this->getInlineMessage($attribute, $lowerRule);

		// First we will retrieve the custom message for the validation rule if one
		// exists. If a custom validation message is being used we'll return the
		// custom message, otherwise we'll keep searching for a valid message.
		if ( ! is_null($inlineMessage))
		{
			return $inlineMessage;
		}

		$customKey = "validation.custom.{$attribute}.{$lowerRule}";

		$customMessage = $this->translator->trans($customKey);

		// First we check for a custom defined validation message for the attribute
		// and rule. This allows the developer to specify specific messages for
		// only some attributes and rules that need to get specially formed.
		if ($customMessage !== $customKey)
		{
			return $customMessage;
		}

		// If the rule being validated is a "size" rule, we will need to gather the
		// specific error message for the type of attribute being validated such
		// as a number, file or string which all have different message types.
		elseif (in_array($rule, $this->sizeRules))
		{
			return $this->getSizeMessage($attribute, $rule);
		}

		// Finally, if on developer specified messages have been set, and no other
		// special messages apply for this rule, we will just pull the default
		// messages out of the translator service for this validation rule.
		else
		{
			$key = "validation.{$lowerRule}";

			return $this->translator->trans($key);
		}
	}

	/**
	 * Get the proper error message for an attribute and size rule.
	 *
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @return string
	 */
	protected function getSizeMessage($attribute, $rule)
	{
		$lowerRule = strtolower(snake_case($rule));

		// There are three different types of size validations. The attribute may be
		// either a number, file, or string so we will check a few things to know
		// which type of value it is and return the correct line for that type.
		$type = $this->getAttributeType($attribute);

		$key = "validation.{$lowerRule}.{$type}";

		return $this->translator->trans($key);
	}

	/**
	 * Get the data type of the given attribute.
	 *
	 * @param  string  $attribute
	 * @return string
	 */
	protected function getAttributeType($attribute)
	{
		// We assume that the attributes present in the file array are files so that
		// means that if the attribute does not have a numeric rule and the files
		// list doesn't have it we'll just consider it a string by elimination.
		if ($this->hasRule($attribute, $this->numericRules))
		{
			return 'numeric';
		}
		elseif ($this->hasRule($attribute, array('Array')))
		{
			return 'array';
		}
		elseif (array_key_exists($attribute, $this->files))
		{
			return 'file';
		}

		return 'string';
	}

	/**
	 * Replace all error message place-holders with actual values.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function doReplacements($message, $attribute, $rule, $parameters)
	{
		$message = str_replace(':attribute', $this->getAttribute($attribute), $message);

		if (method_exists($this, $replacer = "replace{$rule}"))
		{
			$message = $this->$replacer($message, $attribute, $rule, $parameters);
		}

		return $message;
	}

	/**
	 * Transform an array of attributes to their displayable form.
	 *
	 * @param  array  $values
	 * @return array
	 */
	protected function getAttributeList(array $values)
	{
		$attributes = array();

		// For each attribute in the list we will simply get its displayable form as
		// this is convenient when replacing lists of parameters like some of the
		// replacement functions do when formatting out the validation message.
		foreach ($values as $key => $value)
		{
			$attributes[$key] = $this->getAttribute($value);
		}

		return $attributes;
	}

	/**
	 * Get the displayable name of the attribute.
	 *
	 * @param  string  $attribute
	 * @return string
	 */
	protected function getAttribute($attribute)
	{
		// The developer may dynamically specify the array of custom attributes
		// on this Validator instance. If the attribute exists in this array
		// it takes precedence over all other ways we can pull attributes.
		if (isset($this->customAttributes[$attribute]))
		{
			return $this->customAttributes[$attribute];
		}

		$key = "validation.attributes.{$attribute}";

		// We allow for the developer to specify language lines for each of the
		// attributes allowing for more displayable counterparts of each of
		// the attributes. This provides the ability for simple formats.
		if (($line = $this->translator->trans($key)) !== $key)
		{
			return $line;
		}

		// If no language line has been specified for the attribute all of the
		// underscores are removed from the attribute name and that will be
		// used as default versions of the attribute's displayable names.
		else
		{
			return str_replace('_', ' ', $attribute);
		}
	}

	/**
	 * Replace all place-holders for the between rule.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function replaceBetween($message, $attribute, $rule, $parameters)
	{
		return str_replace(array(':min', ':max'), $parameters, $message);
	}

	/**
	 * Replace all place-holders for the digits rule.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function replaceDigits($message, $attribute, $rule, $parameters)
	{
		return str_replace(':digits', $parameters[0], $message);
	}

	/**
	 * Replace all place-holders for the digits (between) rule.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function replaceDigitsBetween($message, $attribute, $rule, $parameters)
	{
		return str_replace(array(':min', ':max'), $parameters, $message);
	}

	/**
	 * Replace all place-holders for the size rule.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function replaceSize($message, $attribute, $rule, $parameters)
	{
		return str_replace(':size', $parameters[0], $message);
	}

	/**
	 * Replace all place-holders for the min rule.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function replaceMin($message, $attribute, $rule, $parameters)
	{
		return str_replace(':min', $parameters[0], $message);
	}

	/**
	 * Replace all place-holders for the max rule.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function replaceMax($message, $attribute, $rule, $parameters)
	{
		return str_replace(':max', $parameters[0], $message);
	}

	/**
	 * Replace all place-holders for the in rule.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function replaceIn($message, $attribute, $rule, $parameters)
	{
		return str_replace(':values', implode(', ', $parameters), $message);
	}

	/**
	 * Replace all place-holders for the not_in rule.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function replaceNotIn($message, $attribute, $rule, $parameters)
	{
		return str_replace(':values', implode(', ', $parameters), $message);
	}

	/**
	 * Replace all place-holders for the mimes rule.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function replaceMimes($message, $attribute, $rule, $parameters)
	{
		return str_replace(':values', implode(', ', $parameters), $message);
	}

	/**
	 * Replace all place-holders for the required_with rule.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function replaceRequiredWith($message, $attribute, $rule, $parameters)
	{
		$parameters = $this->getAttributeList($parameters);

		return str_replace(':values', implode(' / ', $parameters), $message);
	}

	/**
	 * Replace all place-holders for the required_without rule.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function replaceRequiredWithout($message, $attribute, $rule, $parameters)
	{
		$parameters = $this->getAttributeList($parameters);

		return str_replace(':values', implode(' / ', $parameters), $message);
	}

	/**
	 * Replace all place-holders for the required_if rule.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function replaceRequiredIf($message, $attribute, $rule, $parameters)
	{
		$parameters[0] = $this->getAttribute($parameters[0]);

		return str_replace(array(':other', ':value'), $parameters, $message);
	}

	/**
	 * Replace all place-holders for the same rule.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function replaceSame($message, $attribute, $rule, $parameters)
	{
		return str_replace(':other', $this->getAttribute($parameters[0]), $message);
	}

	/**
	 * Replace all place-holders for the different rule.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function replaceDifferent($message, $attribute, $rule, $parameters)
	{
		return str_replace(':other', $this->getAttribute($parameters[0]), $message);
	}

	/**
	 * Replace all place-holders for the date_format rule.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function replaceDateFormat($message, $attribute, $rule, $parameters)
	{
		return str_replace(':format', $parameters[0], $message);
	}

	/**
	 * Replace all place-holders for the before rule.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function replaceBefore($message, $attribute, $rule, $parameters)
	{
		return str_replace(':date', $parameters[0], $message);
	}

	/**
	 * Replace all place-holders for the after rule.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function replaceAfter($message, $attribute, $rule, $parameters)
	{
		return str_replace(':date', $parameters[0], $message);
	}

	/**
	 * Determine if the given attribute has a rule in the given set.
	 *
	 * @param  string  $attribute
	 * @param  array   $rules
	 * @return bool
	 */
	protected function hasRule($attribute, $rules)
	{
		// To determine if the attribute has a rule in the ruleset, we will spin
		// through each of the rules assigned to the attribute and parse them
		// all, then check to see if the parsed rules exists in the arrays.
		foreach ($this->rules[$attribute] as $rule)
		{
			list($rule, $parameters) = $this->parseRule($rule);

			if (in_array($rule, $rules)) return true;
		}

		return false;
	}

	/**
	 * Extract the rule name and parameters from a rule.
	 *
	 * @param  string  $rule
	 * @return array
	 */
	protected function parseRule($rule)
	{
		$parameters = array();

		// The format for specifying validation rules and parameters follows an
		// easy {rule}:{parameters} formatting convention. For instance the
		// rule "Max:3" states that the value may only be three letters.
		if (strpos($rule, ':') !== false)
		{
			list($rule, $parameter) = explode(':', $rule, 2);

			$parameters = $this->parseParameters($rule, $parameter);
		}

		return array(studly_case($rule), $parameters);
	}

	/**
	 * Parse a parameter list.
	 *
	 * @param  string  $rule
	 * @param  string  $parameter
	 * @return array
	 */
	protected function parseParameters($rule, $parameter)
	{
		if (strtolower($rule) == 'regex') return array($parameter);

		return str_getcsv($parameter);
	}

	/**
	 * Get the array of custom validator extensions.
	 *
	 * @return array
	 */
	public function getExtensions()
	{
		return $this->extensions;
	}

	/**
	 * Register an array of custom validator extensions.
	 *
	 * @param  array  $extensions
	 * @return void
	 */
	public function addExtensions(array $extensions)
	{
		$this->extensions = array_merge($this->extensions, $extensions);
	}

	/**
	 * Register an array of custom implicit validator extensions.
	 *
	 * @param  array  $extensions
	 * @return void
	 */
	public function addImplicitExtensions(array $extensions)
	{
		$this->addExtensions($extensions);

		foreach ($extensions as $rule => $extension)
		{
			$this->implicitRules[] = studly_case($rule);
		}
	}

	/**
	 * Register a custom validator extension.
	 *
	 * @param  string   $rule
	 * @param  Closure|string  $extension
	 * @return void
	 */
	public function addExtension($rule, $extension)
	{
		$this->extensions[$rule] = $extension;
	}

	/**
	 * Register a custom implicit validator extension.
	 *
	 * @param  string   $rule
	 * @param  Closure  $extension
	 * @return void
	 */
	public function addImplicitExtension($rule, Closure $extension)
	{
		$this->addExtension($rule, $extension);

		$this->implicitRules[] = studly_case($rule);
	}

	/**
	 * Get the data under validation.
	 *
	 * @return array
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	 * Set the data under validation.
	 *
	 * @param  array  $data
	 * @return void
	 */
	public function setData(array $data)
	{
		$this->data = $this->parseData($data);
	}

	/**
	 * Get the validation rules.
	 *
	 * @return array
	 */
	public function getRules()
	{
		return $this->rules;
	}

	/**
	 * Set the custom attributes on the validator.
	 *
	 * @param  array  $attributes
	 * @return \Illuminate\Validation\Validator
	 */
	public function setAttributeNames(array $attributes)
	{
		$this->customAttributes = $attributes;

		return $this;
	}

	/**
	 * Get the files under validation.
	 *
	 * @return array
	 */
	public function getFiles()
	{
		return $this->files;
	}

	/**
	 * Set the files under validation.
	 *
	 * @param  array  $files
	 * @return \Illuminate\Validation\Validator
	 */
	public function setFiles(array $files)
	{
		$this->files = $files;

		return $this;
	}

	/**
	 * Set the Presence Verifier implementation.
	 *
	 * @param  \Illuminate\Validation\PresenceVerifierInterface  $presenceVerifier
	 * @return void
	 */
	public function setPresenceVerifier(PresenceVerifierInterface $presenceVerifier)
	{
		$this->presenceVerifier = $presenceVerifier;
	}

	/**
	 * Get the Translator implementation.
	 *
	 * @return \Symfony\Component\Translation\TranslatorInterface
	 */
	public function getTranslator()
	{
		return $this->translator;
	}

	/**
	 * Set the Translator implementation.
	 *
	 * @param \Symfony\Component\Translation\TranslatorInterface  $translator
	 * @return void
	 */
	public function setTranslator(TranslatorInterface $translator)
	{
		$this->translator = $translator;
	}

	/**
	 * Get the custom messages for the validator
	 *
	 * @return array
	 */
	public function getCustomMessages()
	{
		return $this->customMessages;
	}

	/**
	 * Set the custom messages for the validator
	 *
	 * @param array $messages
	 * @return void
	 */
	public function setCustomMessages(array $messages)
	{
		$this->customMessages = array_merge($this->customMessages, $messages);
	}

	/**
	 * Get the failed validation rules.
	 *
	 * @return array
	 */
	public function failed()
	{
		return $this->failedRules;
	}

	/**
	 * Get the message container for the validator.
	 *
	 * @return \Illuminate\Support\MessageBag
	 */
	public function messages()
	{
		return $this->messages;
	}

	/**
	 * An alternative more semantic shortcut to the message container.
	 *
	 * @return \Illuminate\Support\MessageBag
	 */
	public function errors()
	{
		return $this->messages;
	}

	/**
	 * Get the messages for the instance.
	 *
	 * @return \Illuminate\Support\MessageBag
	 */
	public function getMessageBag()
	{
		return $this->messages();
	}

	/**
	 * Set the IoC container instance.
	 *
	 * @param  \Illuminate\Container\Container  $container
	 * @return void
	 */
	public function setContainer(Container $container)
	{
		$this->container = $container;
	}

	/**
	 * Call a custom validator extension.
	 *
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return bool
	 */
	protected function callExtension($rule, $parameters)
	{
		$callback = $this->extensions[$rule];

		if ($callback instanceof Closure)
		{
			return call_user_func_array($callback, $parameters);
		}
		elseif (is_string($callback))
		{
			return $this->callClassBasedExtension($callback, $parameters);
		}
	}

	/**
	 * Call a class baesd validator extension.
	 *
	 * @param  string  $callback
	 * @param  array   $parameters
	 * @return bool
	 */
	protected function callClassBasedExtension($callback, $parameters)
	{
		list($class, $method) = explode('@', $callback);

		return call_user_func_array(array($this->container->make($class), $method), $parameters);
	}
}
