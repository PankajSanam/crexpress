<?php if(isset($_SESSION['id'])) { ?>
</div>
</div>
</div>
<?php } ?>

<script type="text/javascript">
function confirmDelete() {
	var confm = window.confirm("Are you sure you want to delete this?");
	if(confm == true) {
		return true;
	} else {
		return false;
	}
}
</script>

<div style="height:10px;"></div>
</body>
</html>