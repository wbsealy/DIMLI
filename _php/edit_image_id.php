<?php
$urlpatch = (strpos($_SERVER['DOCUMENT_ROOT'], 'xampp') == true)?'/dimli':'';
if(!defined('MAIN_DIR')){define('MAIN_DIR',$_SERVER['DOCUMENT_ROOT'].$urlpatch);}
require_once(MAIN_DIR.'/_php/_config/session.php');
require_once(MAIN_DIR.'/_php/_config/connection.php');
require_once(MAIN_DIR.'/_php/_config/functions.php');
confirm_logged_in();
require_priv('priv_image_ids_edit'); 

if ($_POST['newImageId'] != ''){ 

$newImageId = $_POST['newImageId'];
}
else{
$newImageId = $_POST['imageNum'];	
}

$imageNum= ltrim($_POST['imageNum'], '0');

	$sql = "UPDATE dimli.image
				SET legacy_id = '{$newImageId}'
				WHERE id = '{$imageNum}' ";

	if ($result = db_query($mysqli, $sql)) { ?>
		

<script>msg(['Image id successfully updated'], 'success');</script>

	<?php
	} 

 else { ?>

	<script>msg(['There was an error'], 'error');</script>

<?php }
  
  ?>

 

