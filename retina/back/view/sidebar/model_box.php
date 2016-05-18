<?php 
if ( ! function_exists('model_box')) {
function model_box() { ?>
<div id="modal-user" class="modal hide">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="user-infos">Pankaj Sanam</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span2"><img src="<?php echo BACK_VISION; ?>/img/demo/user-1.jpg" alt=""></div>
			<div class="span10">
				<dl class="dl-horizontal" style="margin-top:0;">
					<dt>Full name:</dt>
					<dd>Pankaj Sanam</dd>
					<dt>Email:</dt>
					<dd>pankaj@gitinfosys.com</dd>
					<dt>Address:</dt>
					<dd>
						<address> 
							<strong>GIT Infosys</strong><br/>
							24-A, Shanti Nagar, DCM<br/>
							Ajmer Road, Jaipur, 302019<br/> 
							<abbr title="Phone">P:</abbr>(902) 455-1674
						</address>
					</dd>
					<dt>Social:</dt>
					<dd>
						<a href="http://www.facebook.com/" class='btn'><i class="icon-facebook"></i></a>
						<a href="http://www.twitter.com/" class='btn'><i class="icon-twitter"></i></a>
						<a href="http://www.linkedin.com" class='btn'><i class="icon-linkedin"></i></a>
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
<?php } } ?>