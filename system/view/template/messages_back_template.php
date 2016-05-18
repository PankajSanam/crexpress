<div class="row-fluid">
	<div class="span12">
		<div class="box box-bordered box-color">
			<div class="box-title"><h3><i class="icon-envelope"></i>Message Box</h3></div>
			<div class="box-content nopadding">
				<ul class="tabs tabs-inline tabs-left">
					<li class='write hidden-480'><a href="#">Write message</a></li>
					<li class='active'>
						<a href="#inbox" data-toggle="tab">
							<i class="icon-inbox"></i>Inbox <strong>(<?php echo $total_enquiries; ?>)</strong>
						</a>
					</li>
					<li><a href="#sent" data-toggle="tab"><i class="icon-share-alt"></i> Sent items</a></li>
					<li><a href="#trash" data-toggle="tab"><i class="icon-trash"></i> Trash</a></li>
				</ul>
				<div class="tab-content tab-content-inline">
					<div class="tab-pane active" id="inbox">
						<div class="highlight-toolbar">
							<div class="pull-left">
								<div class="btn-toolbar">
									<div class="btn-group visible-480"><a href="" class="btn btn-danger">New</a></div>
									<div class="btn-group"><a href="#" class="btn" rel="tooltip" data-placement="bottom" title="Refresh results"><i class="icon-refresh"></i></a></div>
									<div class="btn-group hidden-768">
										<div class="dropdown">
											<a href="#" class="btn" data-toggle="dropdown" rel="tooltip" data-placement="bottom" title="Mark elements"><i class="icon-check-empty"></i><span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="#" class='sel-all'>All</a></li>
												<li><a href="#" class='sel-unread'>Unread</a></li>
											</ul>
										</div>
									</div>
									<div class="btn-group">
										<a href="#" class='btn' rel="tooltip" data-placement="bottom" title="Archive"><i class="icon-inbox"></i></a>
										<a href="#" class='btn' rel="tooltip" data-placement="bottom" title="Mark as spam"><i class="icon-exclamation-sign"></i></a>
										<a href="#" class='btn' rel="tooltip" data-placement="bottom" title="Delete"><i class="icon-trash"></i></a>
									</div>
									<div class="btn-group hidden-768">
										<div class="dropdown">
											<a href="#" class="btn" data-toggle="dropdown" rel="tooltip" data-placement="bottom" title="Move to folder"><i class="icon-folder-close"></i><span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="#">Some folder</a></li>
												<li><a href="#">Another folder</a></li>
											</ul>
										</div>
									</div>
								</div></div>
								<div class="pull-right">
									<div class="btn-toolbar">
										<div class="btn-group text hidden-768">
											<span><strong>1-25</strong> of <strong>348</strong></span>
										</div>
										<div class="btn-group">
											<a href="#" class="btn"><i class="icon-angle-left"></i></a>
											<a href="#" class="btn"><i class="icon-angle-right"></i></a>
										</div>
										<div class="btn-group hidden-768">
											<div class="dropdown">
												<a href="#" class="btn" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></a>
												<ul class="dropdown-menu pull-right">
													<li><a href="#">Settings</a></li>
													<li><a href="#">Account settings</a></li>
													<li><a href="#">Email settings</a></li>
													<li><a href="#">Themes</a></li>
													<li><a href="#">Help &amp; FAQ</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<table class="table table-striped table-nomargin table-mail">
								<thead>
									<tr>
										<th class='table-checkbox hidden-480'>
											<input type="checkbox" class='sel-all'>
										</th>
										<th class='table-icon hidden-480'></th>
										<th>Name</th>
										<th>Message</th>
										<th class='table-icon hidden-480'></th>
										<th class='table-date hidden-480'>Date</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($enquiries as $message) { ?>
									<tr class='unread'>
										<td class='table-checkbox hidden-480'><input type="checkbox" class='selectable'></td>
										<td class='table-icon hidden-480'>
											<a href="#" class="sel-star active"><i class="icon-star"></i></a>
										</td>
										<td class='table-fixed-medium'><?php echo $message['name']; ?></td>
										<td><?php echo $message['message']; ?></td>
										<td class='table-icon hidden-480'><i class="icon-paper-clip"></i></td>
										<td class='table-date hidden-480'>11. Feb</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="tab-pane" id="sent">
							<div class="highlight-toolbar">
								<div class="pull-left"><div class="btn-toolbar">
									<div class="btn-group">
										<div class="dropdown hidden-768">
											<a href="#" class="btn" data-toggle="dropdown" rel="tooltip" data-placement="bottom" title="Mark elements"><i class="icon-check-empty"></i><span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="#" class='sel-all'>All</a></li>
												<li><a href="#" class='sel-unread'>Unread</a></li>
											</ul>
										</div>
									</div>
									<div class="btn-group">
										<a href="#" class='btn' rel="tooltip" data-placement="bottom" title="Archive"><i class="icon-inbox"></i></a>
										<a href="#" class='btn' rel="tooltip" data-placement="bottom" title="Mark as spam"><i class="icon-exclamation-sign"></i></a>
										<a href="#" class='btn' rel="tooltip" data-placement="bottom" title="Delete"><i class="icon-trash"></i></a>
									</div>
									<div class="btn-group hidden-768">
										<div class="dropdown">
											<a href="#" class="btn" data-toggle="dropdown" rel="tooltip" data-placement="bottom" title="Move to folder"><i class="icon-folder-close"></i><span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="#">Some folder</a></li>
												<li><a href="#">Another folder</a></li>
											</ul>
										</div>
									</div>
								</div></div>
								<div class="pull-right">
									<div class="btn-toolbar">
										<div class="btn-group text hidden-768">
											<span><strong>1-25</strong> of <strong>348</strong></span>
										</div>
										<div class="btn-group">
											<a href="#" class="btn" data-toggle="dropdown"><i class="icon-angle-left"></i></a>
											<a href="#" class="btn" data-toggle="dropdown"><i class="icon-angle-right"></i></a>
										</div>
										<div class="btn-group hidden-768">
											<div class="dropdown">
												<a href="#" class="btn" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></a>
												<ul class="dropdown-menu pull-right">
													<li><a href="#">Settings</a></li>
													<li><a href="#">Account settings</a></li>
													<li><a href="#">Email settings</a></li>
													<li><a href="#">Themes</a></li>
													<li><a href="#">Help &amp; FAQ</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<table class="table table-striped table-nomargin table-mail">
								<thead>
									<tr>
										<th class='table-checkbox hidden-480'>
											<input type="checkbox" class='sel-all'>
										</th>
										<th class='table-icon hidden-480'></th>
										<th>Sender</th>
										<th>Subject</th>
										<th class='table-icon hidden-480'></th>
										<th class='table-date hidden-480'>Date</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class='table-checkbox hidden-480'>
											<input type="checkbox" class='selectable'>
										</td>
										<td class='table-icon hidden-480'>
											<a href="#" class="sel-star active"><i class="icon-star"></i></a>
										</td>
										<td class='table-fixed-medium'>Johny Doesy</td>
										<td>Lorem ipsum sint laborum.</td>
										<td class='table-icon hidden-480'><i class="icon-paper-clip"></i></td>
										<td class='table-date hidden-480'>12. Feb</td>
									</tr>
									<tr class='unread'>
										<td class='table-checkbox hidden-480'>
											<input type="checkbox" class='selectable'>
										</td>
										<td class='table-icon hidden-480'>
											<a href="#" class="sel-star"><i class="icon-star"></i></a>
										</td>
										<td class='table-fixed-medium'>proident</td>
										<td>
											Lorem ipsum Incididunt consectetur Duis proident laboris nulla 
											cillum dolore elit esse enim tempor veniam.
										</td>
										<td class='table-icon hidden-480'><i class="icon-paper-clip"></i></td>
										<td class='table-date hidden-480'>11. Feb</td>
									</tr>
									<tr>
										<td class='table-checkbox hidden-480'>
											<input type="checkbox" class='selectable'>
										</td>
										<td class='table-icon hidden-480'>
											<a href="#" class="sel-star"><i class="icon-star"></i></a>
										</td>
										<td class='table-fixed-medium'>occaecat</td>
										<td>Lorem ipsum Consequat Duis adipisicing dolor occaecat cillum aliquip adipisicing in cupidatat irure id in.</td>
										<td class='table-icon hidden-480'></td>
										<td class='table-date hidden-480'>8. Feb</td>
									</tr>
									<tr>
										<td class='table-checkbox hidden-480'>
											<input type="checkbox" class='selectable'>
										</td>
										<td class='table-icon hidden-480'>
											<a href="#" class="sel-star active"><i class="icon-star"></i></a>
										</td>
										<td class='table-fixed-medium'>nisi</td>
										<td>Lorem ipsum Culpa magna aliqua Duis cillum dolor officia proident.</td>
										<td class='table-icon hidden-480'></td>
										<td class='table-date hidden-480'>12. Feb</td>
									</tr>
									<tr class='unread'>
										<td class='table-checkbox hidden-480'>
											<input type="checkbox" class='selectable'>
										</td>
										<td class='table-icon hidden-480'>
											<a href="#" class="sel-star"><i class="icon-star"></i></a>
										</td>
										<td class='table-fixed-medium'>eiusmod</td>
										<td>Lorem ipsum ut in in eiusmod ut occaecat tempor.</td>
										<td class='table-icon hidden-480'><i class="icon-paper-clip"></i></td>
										<td class='table-date hidden-480'>9. Feb</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="tab-pane" id="trash">
							<div class="highlight-toolbar">
								<div class="pull-left">
									<div class="btn-toolbar">
										<div class="btn-group">
											<a href="#" class='btn' rel="tooltip" data-placement="bottom" title="Undo"><i class="icon-arrow-left"></i></a>
										</div>
									</div>
								</div>
								<div class="pull-right">
									<div class="btn-toolbar">
										<div class="btn-group text hidden-768">
											<span><strong>1-25</strong> of <strong>348</strong></span>
										</div>
										<div class="btn-group">
											<a href="#" class="btn" data-toggle="dropdown"><i class="icon-angle-left"></i></a>
											<a href="#" class="btn" data-toggle="dropdown"><i class="icon-angle-right"></i></a>
										</div>
										<div class="btn-group hidden-768">
											<div class="dropdown">
												<a href="#" class="btn" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></a>
												<ul class="dropdown-menu pull-right">
													<li><a href="#">Settings</a></li>
													<li><a href="#">Account settings</a></li>
													<li><a href="#">Email settings</a></li>
													<li><a href="#">Themes</a></li>
													<li><a href="#">Help &amp; FAQ</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<table class="table table-striped table-nomargin table-mail">
								<thead>
									<tr>
										<th class='table-checkbox hidden-480'>
											<input type="checkbox" class='sel-all'>
										</th>
										<th class='table-icon hidden-480'></th>
										<th>Sender</th>
										<th>Subject</th>
										<th class='table-icon hidden-480'></th>
										<th class='table-date hidden-480'>Date</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class='table-checkbox hidden-480'>
											<input type="checkbox" class='selectable'>
										</td>
										<td class='table-icon hidden-480'>
											<a href="#" class="sel-star active"><i class="icon-star"></i></a>
										</td>
										<td class='table-fixed-medium'>veniam</td>
										<td>Lorem ipsum sint laborum.</td>
										<td class='table-icon hidden-480'><i class="icon-paper-clip"></i></td>
										<td class='table-date hidden-480'>12. Feb</td>
									</tr>
									<tr class='unread'>
										<td class='table-checkbox hidden-480'>
											<input type="checkbox" class='selectable'>
										</td>
										<td class='table-icon hidden-480'>
											<a href="#" class="sel-star"><i class="icon-star"></i></a>
										</td>
										<td class='table-fixed-medium'>Lorem ipsum</td>
										<td>Lorem ipsum veniam esse nisi in ut aliquip do laboris sed pariatur.</td>
										<td class='table-icon hidden-480'><i class="icon-paper-clip"></i></td>
										<td class='table-date hidden-480'>11. Feb</td>
									</tr>
									<tr>
										<td class='table-checkbox hidden-480'>
											<input type="checkbox" class='selectable'>
										</td>
										<td class='table-icon hidden-480'>
											<a href="#" class="sel-star"><i class="icon-star"></i></a>
										</td>
										<td class='table-fixed-medium'>
											mollit								
										</td>
										<td>
											Lorem ipsum sed sed elit nisi adipisicing mollit eu adipisicing. 
										</td>
										<td class='table-icon hidden-480'>
										</td>
										<td class='table-date hidden-480'>
											8. Feb
										</td>
									</tr>
									<tr>
										<td class='table-checkbox hidden-480'>
											<input type="checkbox" class='selectable'>
										</td>
										<td class='table-icon hidden-480'>
											<a href="#" class="sel-star active"><i class="icon-star"></i></a>
										</td>
										<td class='table-fixed-medium'>
											adipisicing
										</td>
										<td>Lorem ipsum Magna sunt mollit adipisicing est elit veniam nostrud.</td>
										<td class='table-icon hidden-480'>

										</td>
										<td class='table-date hidden-480'>
											12. Feb
										</td>
									</tr>
									<tr class='unread'>
										<td class='table-checkbox hidden-480'>
											<input type="checkbox" class='selectable'>
										</td>
										<td class='table-icon hidden-480'>
											<a href="#" class="sel-star"><i class="icon-star"></i></a>
										</td>
										<td class='table-fixed-medium'>
											Sed Laborum								
										</td>
										<td>
											Lorem ipsum ut in in eiusmod ut occaecat tempor.  
										</td>
										<td class='table-icon hidden-480'>
											<i class="icon-paper-clip"></i>
										</td>
										<td class='table-date hidden-480'>
											8. Feb
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>