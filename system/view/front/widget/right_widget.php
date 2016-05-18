<div class="right-panel">
	<div class="right-listing"><h1>Ad Listing</h1></div>
	<div class="arrow"></div>
	<div class="ads-panel">
		<ul>
			<?php
			$Db = new Db;
			$ads = $Db->select('ads',array('status=' => 1, 'position=' => 'right'));
			foreach($ads as $ad) { 
				$all_p = explode(',',$ad['pages']);
				foreach($all_p as $all){
					if($page_id == $all) {
			?>
			<li><a title="<?php echo $ad['title'];?>" href="<?php echo 'http://'.$ad['link']; ?>"><?php echo Html::img('/banners/'.$ad['image'],2); ?></a></li>
			<?php } else {
				//
			 } } 
			}?>
		</ul>
	</div>
</div>
<?php
if(isset($_POST['send'])){
	$to = 'pankajsanam@gmail.com';
    $subject = "Enquiry";
    $message="  Interest:- ".$_POST['interest']. 
              "<br />Budget:- ".$_POST['budget'].
              "<br />Query:- ".$_POST['queries'].
              "<br />Messenger Type:- ".$_POST['messenger_type'].
              "<br />Messenger ID:- ".$_POST['messenger'].
              "<br />Name:- ".$_POST['name'].
              "<br />Email:- ".$_POST['email'].
              "<br />Occupation:- ".$_POST['occupation'].
              "<br />Mobile:- ".$_POST['mobile'] .
              "<br />Address:- ".$_POST['address'] ;
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: <'.$_POST['email'].'>' . "\r\n";

    @mail($to,$subject,$message,$headers);
}
?>