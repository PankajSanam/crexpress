<?php function chat_box() { ?>
<div class="span6">
	<div class="box">
		<div class="box-title">
			<h3><i class="icon-comment"></i>Chat</h3>
			<div class="actions">
				<a href="#" class="btn btn-mini content-refresh"><i class="icon-refresh"></i></a>
				<a href="#" class="btn btn-mini content-remove"><i class="icon-remove"></i></a>
				<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
			</div>
		</div>
		<div class="box-content nopadding scrollable" data-height="350" data-visible="true" data-start="bottom">
			<ul class="messages">
				<li class="left">
					<div class="image">
						<img src="img/demo/user-1.jpg" alt="">
					</div>
					<div class="message">
						<span class="caret"></span>
						<span class="name">Jane Doe</span>
						<p>Lorem ipsum aute ut ullamco et nisi ad. </p>
						<span class="time">
							12 minutes ago
						</span>
					</div>
				</li>
				<li class="right">
					<div class="image">
						<img src="img/demo/user-2.jpg" alt="">
					</div>
					<div class="message">
						<span class="caret"></span>
						<span class="name">John Doe</span>
						<p>Lorem ipsum aute ut ullamco et nisi ad. Lorem ipsum adipisicing nisi Excepteur eiusmod ex culpa laboris. Lorem ipsum est ut...</p>
						<span class="time">
							12 minutes ago
						</span>
					</div>
				</li>
				<li class="left">
					<div class="image">
						<img src="img/demo/user-1.jpg" alt="">
					</div>
					<div class="message">
						<span class="caret"></span>
						<span class="name">Jane Doe</span>
						<p>Lorem ipsum aute ut ullamco et nisi ad. Lorem ipsum adipisicing nisi!</p>
						<span class="time">
							12 minutes ago
						</span>
					</div>
				</li>
				<li class="typing">
					<span class="name">John Doe</span> is typing <img src="img/loading.gif" alt="">
				</li>
				<li class="insert">
					<form id="message-form" method="POST" action="#">
						<div class="text">
							<input type="text" name="text" placeholder="Write here..." class="input-block-level">
						</div>
						<div class="submit">
							<button type="submit"><i class="icon-share-alt"></i></button>
						</div>
					</form>
				</li>
			</ul>
		</div>
	</div>
</div>
<?php } ?>