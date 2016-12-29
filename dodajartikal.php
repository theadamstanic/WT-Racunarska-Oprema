<?php

	$naziv = $_REQUEST["naziv"];
	$cijena = $_REQUEST["cijena"];
	$link = $_REQUEST["link"];
	
	$naziv = htmlspecialchars($naziv, ENT_QUOTES, "UTF-8");
	$cijena = htmlspecialchars($cijena, ENT_QUOTES, "UTF-8");
	$link = htmlspecialchars($link, ENT_QUOTES, "UTF-8");
	
	
	$response="";
$file = 'artikli.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);
	$brojac=0;
	
	
foreach($xml->children() as $korisnik)
{
	$brojac++;	
}

	
	$child = $xml->addChild("artikal");
	$child->addChild("id",(string)($brojac+1));
	$child->addChild("naziv",$naziv);
	$child->addChild("cijena",$cijena);
	
	
	$child->addChild("ikona",$link);
	
	
	
	$response="true";
	/*$sxe = new SimpleXMLElement($xml->asXML());
	$korisniciNode = $sxe->korisnici[0];
	$korisnik = $korisnici->addChild("korisnik");
	
	$korisnik->addChild("username",$ime);
	$korisnik->addChild("password",$password);
	$korisnik->addChild("tip","obicni");
	$korisnik->addChild("email",$email);
	
	$sxe->asXML("korisnici.xml");
	echo "true";*/
	
	
	echo $response;
	$xml->asXML("artikli.xml");
	

?>