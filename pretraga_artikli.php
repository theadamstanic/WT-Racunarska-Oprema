
<?php
session_start();


$naziv = $_REQUEST['q'];
$naziv = htmlspecialchars($naziv, ENT_QUOTES, "UTF-8");
$string =" ";
$pronadjen=false;
$file = 'artikli.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);

	
	
foreach($xml->children() as $artikal)
{
	if($naziv=="pretrazi_sve")
	{
		$string = $string."|". $artikal->id."*". $artikal->naziv . "^" . $artikal->cijena . "%" . $artikal->ikona;
		$pronadjen=true;
	}
	
	else
	{
		$el1 = strtolower($artikal->naziv);
		$el2 = strtolower($naziv);
		if(strpos($el1,$el2)!==false)
		{
			$string = $string."|". $artikal->id."*". $artikal->naziv . "^" . $artikal->cijena . "%" . $artikal->ikona;
			$pronadjen=true;
		}
	}
	
}

if(!$pronadjen)
	$string="false";

echo $string;

?>