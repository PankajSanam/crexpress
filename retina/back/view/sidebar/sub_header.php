<?php 
if ( ! function_exists('sub_header')) {
function sub_header($page_title) { ?>
<div class="page-header">
	<div class="pull-left"><h1><?php echo $page_title; ?></h1></div>
	<div class="pull-right">
		<ul class="minitiles">
			<li class='grey'><a href="settings.html"><i class="icon-cogs"></i></a></li>
			<li class='lightgrey'><a href="<?php echo SITE_ROOT; ?>" target="_blank"><i class="icon-globe"></i></a></li>
		</ul>
		<ul class="stats">
			<li class='satgreen'>
				<i class="icon-money"></i>
				<div class="details"><span class="big">$0</span><span>Balance</span></div>
			</li>
			<li class='lightred'>
				<i class="icon-calendar"></i>
				<div class="details"><span class="big"><?php echo date('F d, Y'); ?></span><span><?php echo date('l, g:i A'); ?></span></div>
			</li>
		</ul>
	</div>
</div>
<?php 
$content = ob_get_contents();
ob_end_clean();

return $content;
	} 
} ?>