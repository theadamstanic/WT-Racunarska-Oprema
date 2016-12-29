<?php

$file = 'artikli.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);

	$index = 0;
	$rel=0;
	$id = $_REQUEST["id"];
	$atribut = $_REQUEST["atribut"];
	$vrijednost = $_REQUEST["vrijednost"];
	
	$atribut = htmlspecialchars($atribut, ENT_QUOTES, "UTF-8");
	$vrijednost = htmlspecialchars($vrijednost, ENT_QUOTES, "UTF-8");
	
	$node=null;
	$str = "";
	
	foreach($xml->children() as $artikal){

	if($artikal->id== $id)
	{
		$node = $artikal;
		
	}
	
}
	
	if($node!=null)
	{
		if($atribut=="naziv")
		{
			$node->naziv=$vrijednost;
		}
		else
		{
			$vrijednost=(string)$vrijednost;
			$node->cijena=($vrijednost.".00 KM");
		}
	}
	echo $xml->saveXML("artikli.xml");
?>