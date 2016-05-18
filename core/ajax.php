<?php
class ajaxClass {
	function ajax_show(){
?>
		<script language="javascript">
		function <?php echo $this->function_name;?>(<?php echo $this->arg; ?>) {
			ob=new XMLHttpRequest();
			ob.onreadystatechange=function() {
				if(ob.readyState==4) {
					document.getElementById("<?php echo $this->id; ?>").innerHTML=ob.responseText;
				}
			}
			ob.open("GET","<?php echo $this->path; ?>ajax/<?php echo $this->filename; ?>.php?<?php echo $this->arg; ?>="+<?php echo $this->arg; ?>,true);
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
?>