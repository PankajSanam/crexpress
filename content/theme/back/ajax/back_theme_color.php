<?php
@session_start();
require_once '../../config.php';

/** Load core files **/
require_once '../../system/library/autoload.php';

//Auto load classes
spl_autoload_register('Autoload::libraries');

$code = $_POST['code'];

$query = $pdo->prepare(" UPDATE admin set color_theme = '".$code."' where id='".$_SESSION['id']."' ");
$query->execute();

$query2 = $pdo->prepare(" SELECT *from admin where id=".$_SESSION['id']." ");
$query2->execute();
$rows = $query2->fetchAll();
foreach($rows as $row){ }
echo $row['color_theme'];
?>