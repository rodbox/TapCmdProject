<?php
$destination    = "* DESTINATION DES/DU FICHIER(S)*";

$i     = 0;
$error = 0;

foreach ($_FILES as $key => $value) {
	$source = $_FILES[$key]['tmp_name'];
	$dest   = $destination . "/".$_FILES[$key]['name'];
	if(move_uploaded_file($source, $dest))
		$i++;
	else
		$error++;
}

?>