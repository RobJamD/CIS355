<?php
	//Name: Robert Dickens
	//Project: AS06
	
	ini_set("allow_url_fopen", true);
	ini_set("allow_url_include", true);
	main();
	
////////////////////////////////////////////////////////////////////////////////
function main(){
	$apicall = "http://api.covid19api.com/summary";
	
	$json = curl_get_contents($apicall);
	$obj = json_decode($json,true);
	var_dump($json);
	var_dump($obj);
	
	if(!($obj->Countries == null)){
		
		echo "<table border='3' width='50%'>";
		echo "<tr>";
		echo "<th>Country</th>";
		echo "<th>Total Confirmed Cases</th>";
		echo "</tr>";
		
		foreach ($obj->Countries as $country){
			$totalCases = $country->TotalConfirmed;
			$name = $country->Country;
			echo "<tr>";
			echo "<td>".$country."</td>";
			echo "<td>".$totalCases."</td>";
			echo "<tr>";
		}
		
		echo "</table>";
	}
	
	echo "It keeps failing, I don't know why, and I don't know how to fix it.";
}
function curl_get_contents($url) {

    // alternative to file_get_contents

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}
?>