<?php if (!defined('CREXO')) exit('No Trespassing!');

$mimes = array(	
	'hqx'	=>	'application/mac-binhex40',
	'cpt'	=>	'application/mac-compactpro',
	'csv'	=>	array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel'),
	'bin'	=>	'application/macbinary',
	'dms'	=>	'application/octet-stream',
	'lha'	=>	'application/octet-stream',
	'lzh'	=>	'application/octet-stream',
	'exe'	=>	array('application/octet-stream', 'application/x-msdownload'),
	'class'	=>	'application/octet-stream',
	'psd'	=>	'application/x-photoshop',
	'so'	=>	'application/octet-stream',
	'sea'	=>	'application/octet-stream',
	'dll'	=>	'application/octet-stream',
	'oda'	=>	'application/oda',
	'pdf'	=>	array('application/pdf', 'application/x-download'),
	'ai'	=>	'application/postscript',
	'eps'	=>	'application/postscript',
	'ps'	=>	'application/postscript',
	'smi'	=>	'application/smil',
	'smil'	=>	'application/smil',
	'mif'	=>	'application/vnd.mif',
	'xls'	=>	array('application/excel', 'application/vnd.ms-excel', 'application/msexcel'),
	'ppt'	=>	array('application/powerpoint', 'application/vnd.ms-powerpoint'),
	'wbxml'	=>	'application/wbxml',
	'wmlc'	=>	'application/wmlc',
	'dcr'	=>	'application/x-director',
	'dir'	=>	'application/x-director',
	'dxr'	=>	'application/x-director',
	'dvi'	=>	'application/x-dvi',
	'gtar'	=>	'application/x-gtar',
	'gz'	=>	'application/x-gzip',
	'php'	=>	'application/x-httpd-php',
	'php4'	=>	'application/x-httpd-php',
	'php3'	=>	'application/x-httpd-php',
	'phtml'	=>	'application/x-httpd-php',
	'phps'	=>	'application/x-httpd-php-source',
	'js'	=>	'application/x-javascript',
	'swf'	=>	'application/x-shockwave-flash',
	'sit'	=>	'application/x-stuffit',
	'tar'	=>	'application/x-tar',
	'tgz'	=>	array('application/x-tar', 'application/x-gzip-compressed'),
	'xhtml'	=>	'application/xhtml+xml',
	'xht'	=>	'application/xhtml+xml',
	'zip'	=>  array('application/x-zip', 'application/zip', 'application/x-zip-compressed'),
	'mid'	=>	'audio/midi',
	'midi'	=>	'audio/midi',
	'mpga'	=>	'audio/mpeg',
	'mp2'	=>	'audio/mpeg',
	'mp3'	=>	array('audio/mpeg', 'audio/mpg', 'audio/mpeg3', 'audio/mp3'),
	'aif'	=>	'audio/x-aiff',
	'aiff'	=>	'audio/x-aiff',
	'aifc'	=>	'audio/x-aiff',
	'ram'	=>	'audio/x-pn-realaudio',
	'rm'	=>	'audio/x-pn-realaudio',
	'rpm'	=>	'audio/x-pn-realaudio-plugin',
	'ra'	=>	'audio/x-realaudio',
	'rv'	=>	'video/vnd.rn-realvideo',
	'wav'	=>	array('audio/x-wav', 'audio/wave', 'audio/wav'),
	'bmp'	=>	array('image/bmp', 'image/x-windows-bmp'),
	'gif'	=>	'image/gif',
	'jpeg'	=>	array('image/jpeg', 'image/pjpeg'),
	'jpg'	=>	array('image/jpeg', 'image/pjpeg'),
	'jpe'	=>	array('image/jpeg', 'image/pjpeg'),
	'png'	=>	array('image/png',  'image/x-png'),
	'tiff'	=>	'image/tiff',
	'tif'	=>	'image/tiff',
	'css'	=>	'text/css',
	'html'	=>	'text/html',
	'htm'	=>	'text/html',
	'shtml'	=>	'text/html',
	'txt'	=>	'text/plain',
	'text'	=>	'text/plain',
	'log'	=>	array('text/plain', 'text/x-log'),
	'rtx'	=>	'text/richtext',
	'rtf'	=>	'text/rtf',
	'xml'	=>	'text/xml',
	'xsl'	=>	'text/xml',
	'mpeg'	=>	'video/mpeg',
	'mpg'	=>	'video/mpeg',
	'mpe'	=>	'video/mpeg',
	'qt'	=>	'video/quicktime',
	'mov'	=>	'video/quicktime',
	'avi'	=>	'video/x-msvideo',
	'movie'	=>	'video/x-sgi-movie',
	'doc'	=>	'application/msword',
	'docx'	=>	array('application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/zip'),
	'xlsx'	=>	array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/zip'),
	'word'	=>	array('application/msword', 'application/octet-stream'),
	'xl'	=>	'application/excel',
	'eml'	=>	'message/rfc822',
	'json' => array('application/json', 'text/json')
);

class Upload {

	private $sanitize;

	public function __construct(){
		$this->sanitize = new Sanitize;
	}
	public function image($image,$destination) {
		$valid_mime_types = array(
			'image/gif',
			'image/png',
			'image/jpeg',
		);
		$valid_file_extensions = array(
			'.jpg',
			'.jpeg',
			'.gif',
			'.png'
		);

		$filename = $image['name'];
		$rand = rand(0000,9999);
		$file_ext = strrchr($filename, ".");
		$file_basename = substr($filename, 0, strripos($filename, '.')); // strip extension
		$new_name = $this->sanitize->clean($file_basename);
		$newfilename = $new_name.$rand.$file_ext;

		if(in_array($file_ext, $valid_file_extensions)) {
			if(in_array($image['type'], $valid_mime_types)){
				if (@getimagesize($image['tmp_name']) !== false) {
					// 524288 = 0.5 MB
					// 1048576 = 1 MB
					// 2097152 = 2 MB
					// 4194304 = 4 MB
					// 8388608 = 8 MB
					// 16777216 = 16 MB
					// 33554432 = 32 MB
					// 67108864 = 64 MB
					if ($image['size'] < 1048576) {
	 					if(file_exists($destination . $newfilename)) {
							$error = "You have already submitted this file.";
							echo $error;
						} else {
							move_uploaded_file($image['tmp_name'], $destination . $newfilename);
							//echo "File uploaded successfully.";
							return $newfilename;
						}
					}
				} else {
					echo 'Invalid file type.';
					unlink($image['tmp_name']);
				}
			}
		} elseif (empty($file_basename)) {
			$error = "Please select a file to upload.";
			//echo $error;
		} else {
			echo 'Only Image files can be submitted.';
			//unlink($image['tmp_name']);
		}
	}

	protected function _file_mime_type($file)
	{
		// We'll need this to validate the MIME info string (e.g. text/plain; charset=us-ascii)
		$regexp = '/^([a-z\-]+\/[a-z0-9\-\.\+]+)(;\s.+)?$/';

		/* Fileinfo extension - most reliable method
		 *
		 * Unfortunately, prior to PHP 5.3 - it's only available as a PECL extension and the
		 * more convenient FILEINFO_MIME_TYPE flag doesn't exist.
		 */
		if (function_exists('finfo_file'))
		{
			$finfo = finfo_open(FILEINFO_MIME);
			if (is_resource($finfo)) // It is possible that a FALSE value is returned, if there is no magic MIME database file found on the system
			{
				$mime = @finfo_file($finfo, $file['tmp_name']);
				finfo_close($finfo);

				/* According to the comments section of the PHP manual page,
				 * it is possible that this function returns an empty string
				 * for some files (e.g. if they don't exist in the magic MIME database)
				 */
				if (is_string($mime) && preg_match($regexp, $mime, $matches))
				{
					$this->file_type = $matches[1];
					return;
				}
			}
		}

		/* This is an ugly hack, but UNIX-type systems provide a "native" way to detect the file type,
		 * which is still more secure than depending on the value of $_FILES[$field]['type'], and as it
		 * was reported in issue #750 (https://github.com/EllisLab/CodeIgniter/issues/750) - it's better
		 * than mime_content_type() as well, hence the attempts to try calling the command line with
		 * three different functions.
		 *
		 * Notes:
		 *	- the DIRECTORY_SEPARATOR comparison ensures that we're not on a Windows system
		 *	- many system admins would disable the exec(), shell_exec(), popen() and similar functions
		 *	  due to security concerns, hence the function_exists() checks
		 */
		if (DIRECTORY_SEPARATOR !== '\\')
		{
			$cmd = 'file --brief --mime ' . escapeshellarg($file['tmp_name']) . ' 2>&1';

			if (function_exists('exec'))
			{
				/* This might look confusing, as $mime is being populated with all of the output when set in the second parameter.
				 * However, we only neeed the last line, which is the actual return value of exec(), and as such - it overwrites
				 * anything that could already be set for $mime previously. This effectively makes the second parameter a dummy
				 * value, which is only put to allow us to get the return status code.
				 */
				$mime = @exec($cmd, $mime, $return_status);
				if ($return_status === 0 && is_string($mime) && preg_match($regexp, $mime, $matches))
				{
					$this->file_type = $matches[1];
					return;
				}
			}

			if ( (bool) @ini_get('safe_mode') === FALSE && function_exists('shell_exec'))
			{
				$mime = @shell_exec($cmd);
				if (strlen($mime) > 0)
				{
					$mime = explode("\n", trim($mime));
					if (preg_match($regexp, $mime[(count($mime) - 1)], $matches))
					{
						$this->file_type = $matches[1];
						return;
					}
				}
			}

			if (function_exists('popen'))
			{
				$proc = @popen($cmd, 'r');
				if (is_resource($proc))
				{
					$mime = @fread($proc, 512);
					@pclose($proc);
					if ($mime !== FALSE)
					{
						$mime = explode("\n", trim($mime));
						if (preg_match($regexp, $mime[(count($mime) - 1)], $matches))
						{
							$this->file_type = $matches[1];
							return;
						}
					}
				}
			}
		}

		// Fall back to the deprecated mime_content_type(), if available (still better than $_FILES[$field]['type'])
		if (function_exists('mime_content_type'))
		{
			$this->file_type = @mime_content_type($file['tmp_name']);
			if (strlen($this->file_type) > 0) // It's possible that mime_content_type() returns FALSE or an empty string
			{
				return;
			}
		}

		$this->file_type = $file['type'];
	}

} //End of upload class