<?php

session_start();



$username = $_REQUEST['username'];
$password= $_REQUEST['password'];

$username = htmlspecialchars($username, ENT_QUOTES, "UTF-8");
$password = htmlspecialchars($password, ENT_QUOTES, "UTF-8");


$pronadjen=false;
$file = 'korisnici.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);

foreach($xml->children() as $korisnik)
{
	if($korisnik->username==$username)
	{
		if($korisnik->password==$password)
		{
			$pronadjen=true;

			if($korisnik->tip=="admin")
			{
				$_SESSION["username"]=$username;
				$_SESSION["tip"]="admin";
				echo "true admin";

				
			}
			else
			{
				$_SESSION["username"]=$username;
				$_SESSION["tip"]="obicni";
				echo "true";
			}
	
		}
	}
	
}
if($pronadjen==false)
{
	$_SESSION["username"]="none";
				$_SESSION["tip"]="none";
				echo "false";
}


?>