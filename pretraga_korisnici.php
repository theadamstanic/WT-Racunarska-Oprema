<?php


$username= "";//= $_REQUEST['username'];
$nacin=$_REQUEST["nacin"];
$ime="";
$prezime="";
$string =" ";

$nacin = htmlspecialchars($nacin, ENT_QUOTES, "UTF-8");


$file = 'korisnici.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);

	
if($nacin=="username")
{
	$username=$_REQUEST["username"];
	$username = htmlspecialchars($username, ENT_QUOTES, "UTF-8");
		
	foreach($xml->children() as $korisnik)
	{
			$el1 = strtolower($korisnik->username);
			$el2 = strtolower($username);
		
		if(strpos($el1,$el2)!==false)
		{
			$string = $string."|".$korisnik->id."*".  $korisnik->username. "&" . $korisnik->ime . "?" . $korisnik->prezime . "^" . $korisnik->password. "%" . $korisnik->tip. "/". $korisnik->email;
		}
	}

}

else
{
	$ime=$_REQUEST["ime"];
	$prezime=$_REQUEST["prezime"];
	$ime = htmlspecialchars($ime, ENT_QUOTES, "UTF-8");
	$prezime = htmlspecialchars($prezime, ENT_QUOTES, "UTF-8");
	$praznoPrezime=true;
	$praznoIme=true;
	
	for($i=0;$i<strlen($prezime);$i++)
	{
		if($prezime[$i]!=" ")
			$praznoPrezime=false;
	}
	for($i=0;$i<strlen($ime);$i++)
	{
		if($ime[$i]!=" ")
			$praznoIme=false;
	}
	
	
	foreach($xml->children() as $korisnik)
	{
			$el1 = strtolower($korisnik->ime);
			$el2 = strtolower($korisnik->prezime);
			$ime = strtolower($ime);
			$prezime= strtolower($prezime);
			
		if(!$praznoPrezime && !$praznoIme)
		{
			if(strpos($el1,$ime)!==false && strpos($el2,$prezime)!==false)
			{
				$string = $string."|".$korisnik->id."*".  $korisnik->username. "&" . $korisnik->ime . "?" . $korisnik->prezime . "^" . $korisnik->password. "%" . $korisnik->tip. "/". $korisnik->email;
			}
		}
		elseif($praznoPrezime && !$praznoIme)
		{
			if(strpos($el1,$ime)!==false || strpos($el2,$ime)!==false )
			{
				$string = $string."|".$korisnik->id."*".  $korisnik->username. "&" . $korisnik->ime . "?" . $korisnik->prezime . "^" . $korisnik->password. "%" . $korisnik->tip. "/". $korisnik->email;
			}
		}
		elseif(!$praznoPrezime && $praznoIme)
		{
			if(strpos($el1,$prezime)!==false || strpos($el2,$prezime)!==false )
			{
				$string = $string."|".$korisnik->id."*".  $korisnik->username. "&" . $korisnik->ime . "?" . $korisnik->prezime . "^" . $korisnik->password. "%" . $korisnik->tip. "/". $korisnik->email;
			}
		}
		elseif($praznoIme && $praznoPrezime)
		{
							$string = $string."|".$korisnik->id."*".  $korisnik->username. "&" . $korisnik->ime . "?" . $korisnik->prezime . "^" . $korisnik->password. "%" . $korisnik->tip. "/". $korisnik->email;

		}
	}
}
echo $string;

?>