<?php include 'view/header.php'; ?>
<div id="modal-user" class="modal hide">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="user-infos">Jane Doe</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span2"><img src="img/demo/user-1.jpg" alt=""></div>
			<div class="span10">
				<dl class="dl-horizontal" style="margin-top:0;">
					<dt>Full name:</dt>
					<dd>Jane Doe</dd>
					<dt>Email:</dt>
					<dd>jane.doe@janedoesemail.com</dd>
					<dt>Address:</dt>
					<dd>
						<address> 
							<strong>John Doe, Inc.</strong><br/>
							7195 JohnsonDoes Ave, Suite 320<br/>
							San Francisco, CA 881234<br/> 
							<abbr title="Phone">P:</abbr>(123) 456-7890
						</address>
					</dd>
					<dt>Social:</dt>
					<dd>
						<a href="#" class='btn'><i class="icon-facebook"></i></a>
						<a href="#" class='btn'><i class="icon-twitter"></i></a>
						<a href="#" class='btn'><i class="icon-linkedin"></i></a>
						<a href="#" class='btn'><i class="icon-envelope"></i></a>
						<a href="#" class='btn'><i class="icon-rss"></i></a>
						<a href="#" class='btn'><i class="icon-github"></i></a>
					</dd>
				</dl>
			</div>
		</div>
	</div>
	<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
</div>
<?php top_navigation(); ?>
<div class="container-fluid" id="content">
	<?php left_sidebar(); ?>
	<div id="main">
		<div class="container-fluid">
			<div class="page-header"><div class="pull-left"><h1>Dashboard</h1></div><?php sub_header(); ?></div>
			<div class="breadcrumbs">
				<ul>
					<li><a href="more-login.html">Home</a><i class="icon-angle-right"></i></li>
					<li><a href="index.html">Dashboard</a></li>
				</ul>
				<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
			</div>
			<div class="row-fluid margin-top">
				<div class="span12"><div class="alert alert-info"><h4>Welcome</h4><p>Welcome to GIT Infosys Admin Panel</p></div></div>
			</div>
			<?php /*
			<div class="row-fluid">
				<?php audience_overview(); ?>
				<?php hdd_usage(); ?>
			</div>
			<div class="row-fluid">
				<?php task_panel(); ?>
			</div>
			<div class="row-fluid">
				<?php server_load(); ?>
				<?php chat_box(); ?>
			</div>
			<div class="row-fluid">
				<?php user_regions(); ?>
				<?php address_book(); ?>
			</div>
			<div class="row-fluid">
				<?php my_calender(); ?>
				<?php my_feeds(); ?>
			</div>
			*/ ?>
		</div>
	</div>
</div>
<?php include 'view/footer.php'; ?>