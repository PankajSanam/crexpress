<?php /* Smarty version Smarty-3.1.20, created on 2015-01-04 17:36:47
         compiled from "core\view\front\header.tpl.php" */ ?>
<?php /*%%SmartyHeaderCode:479354a92cd7312c57-48322836%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10238ca75cd9f057429bcfc4ebc1e8770d8f4ca6' => 
    array (
      0 => 'core\\view\\front\\header.tpl.php',
      1 => 1420205244,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '479354a92cd7312c57-48322836',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'meta_title' => 0,
    'meta_description' => 0,
    'meta_keywords' => 0,
    'resources' => 0,
    'site_path' => 0,
    'logo' => 0,
    'pages_navigation' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.20',
  'unifunc' => 'content_54a92cd738ab47_52956884',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a92cd738ab47_52956884')) {function content_54a92cd738ab47_52956884($_smarty_tpl) {?><!DOCTYPE HTML>
<!--[if IE 8]> <html class="ie8 no-js"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<!-- begin meta -->
	<meta charset="utf-8">
	<?php echo $_smarty_tpl->tpl_vars['meta_title']->value;?>

	<?php echo $_smarty_tpl->tpl_vars['meta_description']->value;?>

	<?php echo $_smarty_tpl->tpl_vars['meta_keywords']->value;?>

	<meta name="author" content="Pankaj Sanam" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- end meta -->
	<?php echo $_smarty_tpl->tpl_vars['resources']->value;?>

</head>
<body class="wide">
<!-- begin container -->
<div id="wrap">
<!-- begin header -->
<header id="header" class="container clearfix">
	<!-- begin logo -->
	<h1 id="logo"><a href="<?php echo $_smarty_tpl->tpl_vars['site_path']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
</a></h1>
	<!-- end logo -->

	<!-- begin navigation wrapper -->
	<div class="nav-wrap clearfix">

		<!-- begin search form -->
		<form id="search-form" action="#" method="get">
			<input id="s" type="text" name="s" placeholder="Search &hellip;" style="display: none;">
			<input id="search-submit" type="submit" name="search-submit" value="Search">
		</form>
		<!-- end search form -->

		<!-- begin navigation -->
		<nav id="nav">
			<ul id="navlist" class="clearfix">
				<?php echo $_smarty_tpl->tpl_vars['pages_navigation']->value;?>

			</ul>
		</nav>
		<!-- end navigation -->
	</div>
	<!-- end navigation wrapper -->
</header>
<!-- end header --><?php }} ?>
