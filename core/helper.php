<?php

function get_current_page(){
	$path = $_SERVER['PHP_SELF'];
	$file = basename($path, ".php");

	return $file;
}

class ajaxClass {
	function ajax_edit(){
?>
		<script language="javascript">
		function <?php echo $this->function_name;?>(<?php echo $this->arg; ?>) {
			ob=new XMLHttpRequest();
			ob.onreadystatechange=function() {
				if(ob.readyState==4) {
					document.getElementById("<?php echo $this->id; ?>").innerHTML=ob.responseText;
				}
			}
			ob.open("GET","ajax/<?php echo $this->filename; ?>.php?<?php echo $this->arg; ?>="+<?php echo $this->arg; ?>,true);
			ob.send();
		}
		</script>
<?php
	}
	function ajax_delete(){
?>
		<script language="javascript">
		function <?php echo $this->function_name;?>(<?php echo $this->arg; ?>) {
			var conf
			conf=confirm("Are you sure you want to Delete this? You cannot undo this operation.");
			if(conf) {
				ob=new XMLHttpRequest();
				ob.onreadystatechange=function() {
					if(ob.readyState==4) {
						document.getElementById("<?php echo $this->id; ?>").innerHTML=ob.responseText;
					}
				}
				ob.open("GET","ajax/<?php echo $this->filename; ?>.php?<?php echo $this->arg; ?>="+<?php echo $this->arg; ?>,true);
				ob.send();
			} else {
				return false;
			}
		}
		</script>
<?php
	}
	function ajax_active() {
?>
<script language="javascript">
		function <?php echo $this->function_name;?>(<?php echo $this->arg; ?>) {
			var conf
			conf=confirm("Are you sure about this?");
			if(conf) {
				ob=new XMLHttpRequest();
				ob.onreadystatechange=function() {
					if(ob.readyState==4) {
						document.getElementById("<?php echo $this->id; ?>").innerHTML=ob.responseText;
					}
				}
				ob.open("GET","ajax/<?php echo $this->filename; ?>.php?<?php echo $this->arg; ?>="+<?php echo $this->arg; ?>,true);
				ob.send();
			} else {
				return false;
			}
		}
		</script>
<?php
	}
}

function get_selected_value($type,$db,$user){
	if($db==$user){
		if($type == 'radio') return ' checked ';
		if($type == 'select') return ' selected ';
	}
}

function get_id_types($id_type = '', $editable = '' ){
	if($editable == '') {
?>
	<select name="id_type">
		<option value="">-- Select --</option>
		<option value="Voter ID Card" >Voter ID Card</option>
		<option value="Pan Card" >Pan Card</option>
		<option value="Driving License" >Driving Licence</option>
		<option value="Aadhar Card" >Aadhar Card</option>
	</select>
<?php } else { ?>
	<select name="id_type">
		<option value="">-- Select --</option>
		<option value="Voter ID Card" <?php echo get_selected_value('select',$id_type,'Voter ID Card'); ?>>Voter ID Card</option>
		<option value="Pan Card" <?php echo get_selected_value('select',$id_type,'Pan Card'); ?>>Pan Card</option>
		<option value="Driving License" <?php echo get_selected_value('select',$id_type,'Driving License'); ?>>Driving Licence</option>
		<option value="Aadhar Card" <?php echo get_selected_value('select',$id_type,'Aadhar Card'); ?>>Aadhar Card</option>
	</select>
<?php
	}
}
?>