<script type="text/javascript">
function ConfirmDelete() {
  var confm = window.confirm("Are you sure want to delete this?");
  if(confm == true) {
      return true;
  } else {
      return false;
  }
}
</script>
<div style="height:0px;"></div>
<?php 
if($current_page=='index') {
	echo '';
} else {
?>
<div id="footer">
	<p>GIT BOX <span class="font-grey-4">|</span> <a href="http://www.gitinfosys.com/">GIT Infosys</a> </p>
	<a href="#" class="gototop"><i class="icon-arrow-up"></i></a>
</div>
<?php } ?>
</body>
</html>