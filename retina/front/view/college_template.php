<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
    function loading_show(){ 
        $('#loading').html("<img src='<?php echo DATA_VISION;?>/general/loading.gif' />").fadeIn('fast');
    }
    function loading_hide(){
        $('#loading').fadeOut('fast');
    }                
    function loadData(page,slug){
    	var slug = '<?php echo $slug; ?>';
        loading_show();                    
        $.ajax
        ({
            type: "POST",
            url: "<?php echo SITE_ROOT;?>/vision/ajax/ajax_front_pagination.php",
            data: "page="+page+"&slug="+slug,
            success: function(msg)
            {
                $("#container").ajaxComplete(function(event, request, settings)
                {
                    loading_hide();
                    $("#container").html(msg);
                });
            }
        });
    }
    loadData(1);  // For first time page load default results
    $('#container .pagination li.active').live('click',function(){
        var page = $(this).attr('p');
        var slug = '<?php echo $slug; ?>';
        loadData(page,slug);
        
    });           
    $('#go_btn').live('click',function(){
        var page = parseInt($('.goto').val());
        var slug = '<?php echo $slug; ?>';
        var no_of_pages = parseInt($('.total').attr('a'));
        if(page != 0 && page <= no_of_pages){
            loadData(page,slug);
        }else{
            alert('Enter a PAGE between 1 and '+no_of_pages);
            $('.goto').val("").focus();
            return false;
        }
        
    });
});
</script>
<style type="text/css">
#loading{ position:absolute; width:auto; margin-top:50px; margin-left:240px;}
#container .pagination ul li.inactive,#container .pagination ul li.inactive:hover{background-color:#ededed;color:#bababa;border:1px solid #bababa;cursor: default;}
#container .data ul li{list-style: none;font-family: verdana;margin: 5px 0 5px 0;color: #000;font-size: 13px;}
#container .pagination{width: 800px;height: 25px;}
#container .pagination ul li{list-style: none;float: left;border: 1px solid #006699;padding: 2px 6px 2px 6px;margin: 0 3px 0 3px;font-family: arial;font-size: 14px;color: #006699;font-weight: bold;background-color: #f2f2f2;}
#container .pagination ul li:hover{color: #fff;background-color: #006699;cursor: pointer;}
.go_button{background-color:#f2f2f2;border:1px solid #006699;color:#cc0000;padding:2px 6px 2px 6px;cursor:pointer;position:absolute;margin-top:-1px;}
.total{float:right;font-family:arial;color:#999;}
</style>
<div class="maindiv">
	<?php echo $left_sidebar; ?>
	<div class="middle-panel">
		<div class="mid-listing"><h1>Top Colleges Listing</h1></div>
		<div class="arrow"></div>
		<div class="listing">
			<div id="loading"></div>
			<div id="container">
				<div class="data"></div>
				<div class="pagination"></div>
			</div>
		</div>
		<?php /*<div class="paging">
			<div class="pagination">
				<ul>
					<li><a href="#">Prev</a></li>
					<li><span class="current">1</span></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">6</a></li>
					<li><a href="#">7</a></li>
					<li><a href="#">8</a></li>
					<li><a href="#">9</a></li>
					<li><a href="#">10</a></li>
					<li><a href="#">11</a></li>
					<li><a href="#">12</a></li>
					<li><a href="#">13</a></li>
					<li><a href="#">14</a></li>
					<li><a href="#">15</a></li>
					<li><a href="#">Next</a></li>
				</ul>
			</div>
		</div> */ ?>
	</div>
	<?php echo $right_sidebar; ?>
</div>