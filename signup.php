<?php

	$ime = $_REQUEST["ime"];
	$prezime = $_REQUEST["prezime"];
	$email = $_REQUEST["email"];
	$password = $_REQUEST["password"];
	$username = $_REQUEST["username"];
	$tip=$_REQUEST["tip"];
	
	$response="";
	$pronadjen=false;
$file = 'korisnici.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);
	$brojac=0;
	
	
foreach($xml->children() as $korisnik)
{
	if($korisnik->email==$email || $korisnik->username==$username)
	{
		$response="zauzet";
		$pronadjen=true;  
	}
	
	$brojac++;
	
	
}
if($pronadjen==false)
{
	
	$child = $xml->addChild("korisnik");
	$child->addChild("id",(string)($brojac+1));
	$child->addChild("ime",$ime);
	$child->addChild("prezime",$prezime);
	
	
	$child->addChild("username",$username);
	$child->addChild("password",$password);
	$child->addChild("tip",$tip);
	$child->addChild("email",$email);
	
	
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
	
	}
	echo $response;
	$xml->asXML("korisnici.xml");
	

?>