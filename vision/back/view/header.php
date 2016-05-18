<?php echo $doc_type; ?>
<html>
<head>
	<?php echo $content_type; ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />

	<?php echo $meta_title; ?>

	<?php echo $styles; ?>
	<?php echo $scripts; ?>
	
	<!--[if lte IE 9]>
		<?php
		$html->scripts(array(
			'plugins/placeholder/jquery.placeholder.min',
		),1);
		?>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->

	<link rel="shortcut icon" href="<?php echo BACK_VISION; ?>/img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="<?php echo BACK_VISION; ?>/img/apple-touch-icon-precomposed.png" />
	<script type="text/javascript">
	function change_theme (code) {
		var dataString = 'code='+ code;
		$.ajax ({
			type: "POST",
			url: "<?php echo SITE_ROOT;?>/vision/ajax/ajax_back_theme_color.php",
			data: dataString,
			cache: false,
			
			success: function(html) {
				$("body").attr("class",html);
				//$("#body").html(html);
			}
		});
	}
	</script>
</head>
<?php
// $color_class = 'theme-red';
// $color_class = 'theme-orange';
// $color_class = 'theme-green';
// $color_class = 'theme-brown';
// $color_class = 'theme-blue';
$color_class = 'theme-darkblue';
// $color_class = 'theme-satblue';
// $color_class = 'theme-lime';
// $color_class = 'theme-teal';
// $color_class = 'theme-purple';
// $color_class = 'theme-pink';
// $color_class = 'theme-magenta';
// $color_class = 'theme-grey';
// $color_class = 'theme-lightred';
// $color_class = 'theme-lightgrey';
// $color_class = 'theme-satgreen';

$data_theme = '';
$Db = new Db;
if(isset($_SESSION['id'])) {
	$theme_colors = $Db->select('admin', array('id=' => $_SESSION['id']));
	foreach($theme_colors as $theme_color){}
	$color_class = $theme_color['color_theme'];
	$data_theme = $theme_color['color_theme'];
}
?>
<body class="<?php echo $body_class.' '.$color_class; ?>" data-theme="<?php echo $data_theme; ?>" id="body" data-layout-sidebar="fixed" data-layout-topbar="fixed">