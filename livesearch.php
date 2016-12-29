<?php


$str = $_REQUEST['q'];
$str = htmlspecialchars($str, ENT_QUOTES, "UTF-8");
$rezultat ="";
$tip=false;
if(isset($_REQUEST["tip"]) && $_REQUEST["tip"]=="korisnici")
	$tip=true;

if($tip)
{
	$file = 'korisnici.xml';
		if(!$xml = simplexml_load_file($file))
		{
			$rezultat="greska";
			exit('Failed to open '.$file);
		}
		$brojac=0;
		
		
		

	foreach($xml->children() as $korisnik)
	{
		
		$el1 = strtolower($korisnik->ime);
		$el2 = strtolower($str);
		$el3 = strtolower($korisnik->prezime);
		
		if (((strpos($el1, $el2) !== false ) || (strpos($el3, $el2) !== false ))&& $brojac<10) 
		{
			$brojac++;
			$rezultat=$rezultat."|". $el1 ." ".$el3;
		}
		
		
	}
}

else
{
	$file = 'artikli.xml';
		if(!$xml = simplexml_load_file($file))
			exit('Failed to open '.$file);

		$brojac=0;
		
		

	foreach($xml->children() as $artikal)
	{
		
		$el1 = strtolower($artikal->naziv);
		$el2 = strtolower($str);
		//$el3 = $artikal->cijena;
		
		if (strpos($el1, $el2) !== false && $brojac<10) 
		{
			$brojac++;
			$rezultat=$rezultat."|". $el1;
		}
		/*if( strpos($el3,$el2)!== false && $brojac<10)
		{
			$brojac++;
			$rezultat=$rezultat."|".$el3;
		}*/
	}

}

echo $rezultat;

?>