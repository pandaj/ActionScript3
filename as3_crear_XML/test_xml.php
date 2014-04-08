<?php

$archivo = rand(1, 9999).".xml";

$xml = new DOMDocument();
/*
$xml_album = $xml->createElement("Album");
$xml_track = $xml->createElement("Track");
$xml_album->appendChild( $xml_track );
$xml->appendChild( $xml_album );
*/
$xml->save($archivo);

if (isset($GLOBALS["HTTP_RAW_POST_DATA"])){  
	$xml_vars = $GLOBALS["HTTP_RAW_POST_DATA"];  
	$file = fopen($archivo,"wb");  
	fwrite($file, $xml_vars);  
	fclose($file);
	
	//no guardar cache
	header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT");
	header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
}
?>