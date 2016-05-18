<?php 
if ( ! function_exists('left_sidebar')) {
	function left_sidebar() { 
?>
	<div id="left" class='force-full no-resize'>
		<div class='search-form'><div class="search-pane"><marquee>Please make sure to check your messages.</marquee></div></div>
		<div class="subnav">
			<div class="subnav-title">
				<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Quick stats</span></a>
			</div>
			<div class="subnav-content">
				<ul class="quickstats">
					<li><span class="value">412</span><span class="name">User</span></li>
					<li><span class="value">52</span><span class="name">Products</span></li>
					<li><span class="value">951</span><span class="name">Purchases</span></li>
					<li><span class="value">62</span><span class="name">Clicks</span></li>
				</ul>
			</div>
		</div>
		<div class="subnav">
			<div class="subnav-title"><a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Progress</span></a></div>
			<div class="subnav-content">
				<div class="pagestats bar">
					<span>Diskspace usage:</span><div class="progress small"><div class="bar" style="width:40%"></div></div>
				</div>
				<div class="pagestats bar">
					<span>Traffic bandwidth:</span><div class="progress small"><div class="bar bar-lightred" style="width:80%"></div></div>
				</div>
				<div class="pagestats bar">
					<span>Resources used:</span><div class="progress small"><div class="bar bar-green" style="width:20%"></div></div>
				</div>
			</div>
		</div>
		<div class="subnav">
			<div class="subnav-title">
				<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Calendar</span></a>
			</div>
			<div class="subnav-content less"><div class="jq-datepicker"></div></div>
		</div>
		<div class="subnav">
			<div class="subnav-title">
				<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Userlist</span></a>
			</div>
			<div class="subnav-content">
				<ul class="userlist">
					<li>
						<a href="#"><img src="img/demo/user-1.jpg" alt=""></a>
						<div class="user">
							<span class="name">Jane Doe</span>
							<span class="position">Team manager</span>
						</div>
						<div class="status active"><i class="icon-circle"></i></div>
					</li>
					<li>
						<a href="#"><img src="img/demo/user-2.jpg" alt=""></a>
						<div class="user">
							<span class="name">John Doe</span>
							<span class="position">Webdesign</span>
						</div>
						<div class="status"><i class="icon-circle"></i></div>
					</li>
					<li>
						<a href="#"><img src="img/demo/user-3.jpg" alt=""></a>
						<div class="user">
							<span class="name">John Doe</span>
							<span class="position">UI Design</span>
						</div>
						<div class="status afk"><i class="icon-circle"></i></div>
					</li>
				</ul>
			</div>
		</div>
	</div>
<?php
$content = ob_get_contents();
ob_end_clean();

return $content;
	} 
} 
?>