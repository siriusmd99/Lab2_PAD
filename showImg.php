<?php
error_reporting(0);
require('includes\static_util.php');

if (!isset($_GET["id"])) 
{
	
  echo 'No File ID Specified!';
  exit();
}

$api_url = localURL()."getImg.php?id=".$_GET["id"];

$json = json_decode(file_get_contents($api_url));
if($json->status == 'Error')
{
	header("HTTP/1.1 404 Not Found");
	echo $json->msg;
}else{
	header("Content-type: image/gif");
    echo base64_decode($json->image);
}

	
?>