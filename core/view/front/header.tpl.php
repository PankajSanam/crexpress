<!DOCTYPE HTML>
<!--[if IE 8]> <html class="ie8 no-js"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<!-- begin meta -->
	<meta charset="utf-8">
	{$meta_title}
	{$meta_description}
	{$meta_keywords}
	<meta name="author" content="Pankaj Sanam" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- end meta -->
	{$resources}
</head>
<body class="wide">
<!-- begin container -->
<div id="wrap">
<!-- begin header -->
<header id="header" class="container clearfix">
	<!-- begin logo -->
	<h1 id="logo"><a href="{$site_path}">{$logo}</a></h1>
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
				<li class="{$current}">
					<a href="{$site_path}">Home</a>
				</li>
				<li>
					<a href="{'our-products'|page_url}" rel="submenu2">Products</a>
					{$product_navigation}
				</li>
				{$pages_navigation}
			</ul>
		</nav>
		<!-- end navigation -->
	</div>
	<!-- end navigation wrapper -->
</header>
<!-- end header -->