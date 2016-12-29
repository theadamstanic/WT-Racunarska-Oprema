<?php

$file = 'korisnici.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);

	$index = 0;
	$rel=0;
	$username = $_REQUEST["username"];
	$atribut = $_REQUEST["atribut"];
	$vrijednost = $_REQUEST["vrijednost"];
	
	$username = htmlspecialchars($username, ENT_QUOTES, "UTF-8");
	$vrijednost = htmlspecialchars($vrijednost , ENT_QUOTES, "UTF-8");
	$atribut = htmlspecialchars($atribut, ENT_QUOTES, "UTF-8");
	
	
	
	$node=null;
	$str = "";
	
	foreach($xml->children() as $korisnik){

	if($korisnik->username== $username)
	{
		$node = $korisnik;
		
	}
	
}
	
	if($node!=null && $node->username!="Adam")
	{
		if($atribut=="username")
		{
			$node->username=$vrijednost;
		}
		if($atribut=="ime")
		{
			$node->ime=$vrijednost;
		}
		elseif($atribut=="prezime")
		{
			$node->prezime=$vrijednost;
		}
		
		elseif($atribut=="password")
		{
			$node->password=$vrijednost;
		}
		elseif($atribut=="tip")
		{
			$node->tip=$vrijednost;
		}
		elseif($atribut=="email")
		{
			$node->email=$vrijednost;
		}
		
	}
	 $xml->saveXML("korisnici.xml");
?>