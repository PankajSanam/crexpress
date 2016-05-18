<?php
require_once '../core/connection.php';
require_once '../core/validation.php';
require_once '../core/database.php';
require_once '../core/ajax.php';
require_once '../core/helper.php';
require_once '../model/private_jobs_model.php';

if($_GET['id']=='') { 	} else {
?>
<div class="control-group">
	<label for="textfield" class="control-label">City</label>
	<div class="controls">
		<div class="input-xlarge">
			<select name="city" id="city" class='chosen-select'>
				<option value=""></option>
				<?php 
				$cities = get_cities($_GET['id']);
				foreach($cities as $city) {
				?>
				<option value="<?php echo $city['id'];?>" <?php if(isset($_GET['id']) && $location_id==$city['id']) echo ' selected ';  ?>><?php echo @$city['name'];?></option>
				<?php } ?>
			</select>
		</div>
	</div>
</div>
<?php } ?>