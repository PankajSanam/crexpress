<?php /* Smarty version Smarty-3.1.20, created on 2015-01-04 19:06:19
         compiled from "core\view\back\footer.tpl.php" */ ?>
<?php /*%%SmartyHeaderCode:1965854a93255debf59-85180636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e15a306a88f28466a57045d248c1be9166d98ef' => 
    array (
      0 => 'core\\view\\back\\footer.tpl.php',
      1 => 1420376613,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1965854a93255debf59-85180636',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.20',
  'unifunc' => 'content_54a93255e38ac6_80855971',
  'variables' => 
  array (
    'back_view' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a93255e38ac6_80855971')) {function content_54a93255e38ac6_80855971($_smarty_tpl) {?>
<script type="text/javascript">
function confirmDelete()
{
	var confm = window.confirm("Are you sure you want to delete this?");
	if(confm == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>


<!-- Footer -->
<footer>
	<div class="pull-right">
		Powered by <strong><a href="http://www.crexo.com/" target="_blank">crexo.com</a></strong>
	</div>
	<div class="pull-left">
		<span id="year-copy"></span> &copy; <strong><a href="http://goo.gl/mssAH" target="_blank">Crexpress 0.1.6 (Alpha)</a></strong>
	</div>
</footer>
<!-- END Footer -->
</div>
<!-- END Page Container -->

<!-- Scroll to top link, check main.js - scrollToTop() -->
<a href="#" id="to-top"><i class="icon-chevron-up"></i></a>

<!-- User Modal Account, appears when clicking on 'User Settings' link found on user dropdown menu (header, top right) -->
<div id="modal-user-account" class="modal hide fade">
	<!-- Modal Body -->
	<div class="modal-body remove-padding">
		<!-- Modal Tabs -->
		<div class="block-tabs">
			<div class="block-options">
				<a href="javascript:void(0)" class="btn btn-danger" data-dismiss="modal"><i class="icon-remove"></i></a>
			</div>
			<ul class="nav nav-tabs" data-toggle="tabs">
				<li class="active"><a href="#modal-user-account-account"><i class="icon-cog"></i> Account</a></li>
				<li><a href="#modal-user-account-profile"><i class="icon-user"></i> Profile</a></li>
			</ul>
			<div class="tab-content">
				<!-- Account Tab Content -->
				<div class="tab-pane active" id="modal-user-account-account">
					<form action="index.html" method="post" class="form-horizontal" onsubmit="return false;">
						<div class="control-group">
							<label class="control-label" for="modal-account-username">Username</label>
							<div class="controls">
								<input type="text" id="modal-account-username" name="modal-account-username" value="admin" class="disabled" disabled>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="modal-account-email">Email</label>
							<div class="controls">
								<input type="text" id="modal-account-email" name="modal-account-email" value="admin@exampleapp.com">
							</div>
						</div>
						<h4 class="sub-header">Change Password</h4>
						<div class="control-group">
							<label class="control-label" for="modal-account-pass">Current Password</label>
							<div class="controls">
								<input type="password" id="modal-account-pass" name="modal-account-pass">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="modal-account-newpass">New Password</label>
							<div class="controls">
								<input type="password" id="modal-account-newpass" name="modal-account-newpass">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="modal-account-newrepass">Retype New Password</label>
							<div class="controls">
								<input type="password" id="modal-account-newrepass" name="modal-account-newrepass">
							</div>
						</div>
					</form>
				</div>
				<!-- END Account Tab Content -->

				<!-- Profile Tab Content -->
				<div class="tab-pane" id="modal-user-account-profile">
					<form action="index.html" method="post" class="form-horizontal" onsubmit="return false;">
						<div class="control-group">
							<label class="control-label" for="modal-profile-name">Name</label>
							<div class="controls">
								<input type="text" id="modal-profile-name" name="modal-profile-name" value="John Doe">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="modal-profile-gender">Gender</label>
							<div class="controls">
								<select id="modal-profile-gender" name="modal-profile-name">
									<option value="m">Male</option>
									<option value="f">Female</option>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="modal-profile-birthdate">Birthdate</label>
							<div class="controls">
								<div class="input-append">
									<input type="text" id="modal-profile-birthdate" name="modal-profile-birthdate" class="input-small input-datepicker">
									<span class="add-on"><i class="icon-calendar"></i></span>
								</div>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="modal-profile-skills">Skills</label>
							<div class="controls">
								<select id="modal-profile-skills" name="modal-profile-skills" class="select-chosen" multiple>
									<option value="html" selected>html</option>
									<option value="css" selected>css</option>
									<option value="javascript">javascript</option>
									<option value="php">php</option>
									<option value="mysql">mysql</option>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="modal-profile-bio">Bio</label>
							<div class="controls">
								<textarea id="modal-profile-bio" name="modal-profile-bio" class="textarea-elastic" rows="3">Bio Information..</textarea>
							</div>
						</div>
					</form>
				</div>
				<!-- END Profile Tab Content -->
			</div>
		</div>
		<!-- END Modal Tabs -->
	</div>
	<!-- END Modal Body -->

	<!-- Modal footer -->
	<div class="modal-footer">
		<button class="btn btn-success" data-dismiss="modal"><i class="icon-save"></i> Save</button>
	</div>
	<!-- END Modal footer -->
</div>
<!-- END User Modal Settings -->

<!-- Excanvas for Flot (Charts plugin) support on IE8 -->
<!--[if lte IE 8]><script src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
js/helpers/excanvas.min.js"></script><![endif]-->

<!-- Get Jquery library from Google ... -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- ... but if something goes wrong get Jquery from local file -->
<script>!window.jQuery && document.write(unescape('%3Cscript src="js/vendor/jquery-1.9.1.min.js"%3E%3C/script%3E'));</script>

<!-- Bootstrap.js -->
<script src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
js/vendor/bootstrap.min.js"></script>

<!--
Include Google Maps API for global use.
If you don't want to use  Google Maps API globally, just remove this line and the gmaps.js plugin from js/plugins.js (you can put it in a seperate file)
Then iclude them both in the pages you would like to use the google maps functionality
-->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

<!-- Jquery plugins and custom javascript code -->
<script src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
js/plugins.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
js/main.js"></script>
<!-- Javascript code only for this page -->

<script>
	$(function() {
		var dashChart = $('#dashboard-chart');
		var dashMap = $('#dashboard-map');
		var componentHeight = '300px';

		// Initialize Slimscroll
		$('.scrollable').slimScroll({
			height: componentHeight,
			color: '#333',
			size: '10px',
			alwaysVisible: true,
			railVisible: true,
			railColor: '#333',
			railOpacity: 0.1
		});

		// Initialize Timeline Slimscroll
		$('.timeline-scrollable').slimScroll({
			height: '500px',
			color: '#333',
			size: '10px',
			alwaysVisible: true,
			railVisible: true,
			railColor: '#333',
			railOpacity: 0.1
		});

		/* Dashboard Timeline - Adding content demostration */
		var timelineSpeed = 300;

		setTimeout(function() {
			$('<li>' +
			'<i class="timeline-meta-cat glyphicon-circle_plus themed-background-ocean"></i>' +
			'<span class="timeline-meta-time">just now</span>' +
			'<span class="timeline-title">Twitter</span>' +
			'<span class="timeline-text">+1 Follower</span>' +
			'</li>').prependTo('.timeline').hide().slideDown(timelineSpeed);
		}, 2000);

		setTimeout(function() {
			$('<li class="clearfix">' +
			'<i class="timeline-meta-cat icon-comments themed-background-leaf"></i>' +
			'<span class="timeline-meta-time">just now</span>' +
			'<img src="img/template/avatar2.jpg" alt="Avatar" class="timeline-avatar">' +
			'<span class="timeline-title"><a href="page_ready_user_profile.html">Estelle</a> just commented on an <a href="page_ready_product.html">Product</a></span>' +
			'<span class="timeline-text">Yes, I like this product too!</span>' +
			'</li>').prependTo('.timeline').hide().slideDown(timelineSpeed);
		}, 6000);

		setTimeout(function() {
			$('<li class="clearfix">' +
			'<i class="timeline-meta-cat glyphicon-picture themed-background-wood"></i>' +
			'<span class="timeline-meta-time">just now</span>' +
			'<img src="img/template/avatar.jpg" alt="Avatar" class="timeline-avatar">' +
			'<span class="timeline-title"><a href="page_ready_user_profile.html">John Doe</a> just added 2 new photos</span>' +
			'<a href="img/placeholders/image_720x450_light.png" data-toggle="lightbox-image"><img src="img/placeholders/image_160x120_light.png" alt="image"></a> ' +
			'<a href="img/placeholders/image_720x450_light.png" data-toggle="lightbox-image"><img src="img/placeholders/image_160x120_light.png" alt="image"></a>' +
			'</li>').prependTo('.timeline').hide().slideDown(timelineSpeed);

			// Re Initialize Image Popup for new image content
			$('[data-toggle="lightbox-image"]').magnificPopup({type: 'image'});
		}, 10000);

		setTimeout(function() {
			$('<li>' +
			'<i class="timeline-meta-cat glyphicon-circle_plus themed-background-default"></i>' +
			'<span class="timeline-meta-time">just now</span>' +
			'<span class="timeline-title">Facebook page</span>' +
			'<span class="timeline-text">+1 Like</span>' +
			'</li>').prependTo('.timeline').hide().slideDown(timelineSpeed);
		}, 14000);

		setTimeout(function() {
			$('<li class="clearfix">' +
			'<i class="timeline-meta-cat glyphicon-brush themed-background-dawn"></i>' +
			'<span class="timeline-meta-time">just now</span>' +
			'<img src="img/template/pixelcave.png" alt="pixelcave" class="timeline-avatar">' +
			'<span class="timeline-title">Thank you!</span>' +
			'<span class="timeline-text">This was just a demonstration of how loading updates could happen! You can use all the available color themes as well as any icon for your category!</span>' +
			'</li>').prependTo('.timeline').hide().slideDown(timelineSpeed);

			// Remove loading spinner
			$('#dash-timeline-icon').removeClass('icon-spin').removeClass('icon-spinner').addClass('icon-ok');
		}, 16000);

		/* Dashboard Chart */
		var dashData1 = [[0, 620], [1, 500], [2, 900], [3, 650], [4, 1250], [5, 850], [6, 1700]];
		var dashData2 = [[0, 110], [1, 80], [2, 320], [3, 250], [4, 550], [5, 520], [6, 600]];

		dashChart.css('height', componentHeight);

		// Initialize Classic Chart
		$.plot(dashChart, [
					{data: dashData1, lines: {show: true, fill: true, fillColor: {colors: [{opacity: 0.25}, {opacity: 0.25}]}}, points: {show: true}, label: 'New Users'},
					{data: dashData2, lines: {show: true, fill: true, fillColor: {colors: [{opacity: 0.1}, {opacity: 0.1}]}}, points: {show: true}, label: 'New Projects'}],
				{
					legend: {
						position: 'nw',
						backgroundColor: null
					},
					colors: ['#a8db39', '#333'],
					grid: {
						borderWidth: 0,
						color: '#999999',
						labelMargin: 10,
						hoverable: true,
						clickable: true
					},
					yaxis: {
						ticks: 0,
						tickColor: '#fff'
					},
					xaxis: {
						tickSize: 1,
						tickColor: '#fff',
						ticks: [[0, 'MON'], [1, 'TUE'], [2, 'WED'], [3, 'THU'], [4, 'FRI'], [5, 'SAT'], [6, 'SUN']]
					}
				}
		);

		// Creating and attaching a tooltip
		var previousPoint = null;
		dashChart.bind("plothover", function(event, pos, item) {

			$("#x").text(pos.x.toFixed(2));
			$("#y").text(pos.y.toFixed(2));

			if (item) {
				if (previousPoint !== item.dataIndex) {
					previousPoint = item.dataIndex;

					$("#tooltip").remove();
					var x = item.datapoint[0],
							y = item.datapoint[1];

					$('<div id="tooltip" class="chart-tooltip"><strong>' + y + '</strong></div>')
							.css({top: item.pageY - 30, left: item.pageX - 20})
							.appendTo("body")
							.show();
				}
			}
			else {
				$("#tooltip").remove();
				previousPoint = null;
			}
		});

		// Initialize general map when tab is shown
		$('a[href="#dashboard-maps"]').on('shown', function() {
			dashMap.css('height', componentHeight).css('width', '100%');

			new GMaps({
				div: '#dashboard-map',
				lat: 0,
				lng: 0,
				zoom: 1
			});
		});
	});
</script>

</body>
</html><?php }} ?>
