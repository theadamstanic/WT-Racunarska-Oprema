<?php

$file = 'artikli.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);

	$ids=array();
	$nazivi=array();
	$cijene=array();
	$ikone=array();
	$data=array();
	
foreach($xml->children() as $artikal)
{
	array_push($data,$artikal->id.",".$artikal->naziv.",".$artikal->cijena.",".$artikal->ikona);
	array_push($ids,$artikal->id);
	array_push($nazivi,$artikal->naziv);
	array_push($cijene,$artikal->cijena);
	array_push($ikone,$artikal->ikona);
}




$fp = fopen('CSVFile.csv', 'w');
$pocetak=explode(",","id,naziv,cijena,ikona");
fputcsv($fp,$pocetak);
foreach ( $data as $line ) {
    $val = explode(",", $line);
    fputcsv($fp, $val);
}
fclose($fp);

$contenttype = "application/force-download";
        header("Content-Type: " . $contenttype);
        header("Content-Disposition: attachment; filename=\"" . basename('CSVFile.csv') . "\";");
        readfile('CSVFile.csv');
        exit();
?>