<div class="col1"> 
	<div id="content2">
		<h2 class="pad8">Search Result for "<?php echo $_GET['search'];?>"</h2>
		<ul class="listing">
			<?php
			if(isset($_GET['search'])){
				$Db = new Db;
				$errors = array();
				if(empty($_GET['search'])){
					$errors[] = 'Please enter a search term.';
				} elseif(strlen($_GET['search']) < 3){
					$errors[] = 'Your search term must be 3 or more characters.';
				} elseif($Db->search($_GET['search']) === false){
					$errors[] = 'Your search for <strong>'.$_GET['search'].'</strong> returned no results';
				}

				if(empty($errors)){
					
					$results = $Db->search($_GET['search']);
					$results_num = count($results);
					$suffix = ($results_num != 1) ? 's' : '';
					echo 'Your search for <strong>'.$_GET['search'].'</strong> returned '.$results_num.' result'.$suffix;
					
					foreach($results as $result){
			?>
				<li>
					<div class="thumb">
						<a href="<?php echo $page->link($result['slug']); ?>" title="<?php echo $result['title'];?>">
						<?php echo $page->thumb($result['slug'],'126','106'); ?></a>
					</div>
					<div class="description">
						<h6><a href="<?php echo $page->link($result['slug']);?>" class="colr"><?php echo $result['title'];?></a></h6>
						<p><?php echo $validation->strip_html($result['content'],220);?>...</p>
					</div>
					<div class="clear"></div>
				</li>
			<?php
					}
				} else {
					foreach($errors as $error){
						echo $error . '<br/>';
					}
				}
			}
			
			?>
		</ul>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
<?php echo $right_widget; ?>