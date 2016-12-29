<?php


$file = 'korisnici.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);

	$ime = $_REQUEST["q"];
	$nodeToRemove=null;
	foreach($xml->children() as $artikal){

	if($artikal->username == $ime)
	{
		$nodeToRemove = $artikal;
	}
	
}
	
	if($nodeToRemove!=null)
	{
		unset($nodeToRemove[0]);
	}
	echo $xml->saveXML("korisnici.xml");
	

?>