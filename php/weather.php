<?php

	$url ="http://www.sojson.com/open/api/weather/json.shtml?city={$_GET["city"]}";
	$content = file_get_contents($url);
	$data = json_decode($content,true);
	$count_json = count($data['data']['forecast']);
	$weather_date = array();
	$weather_high =array();
	$weather_low =array();
	$weather_type =array();
	for($i=0;$i<$count_json;$i++){
		$weather_date[$i] = $data['data']['forecast'][$i]['date'] . "  ";
		$weather_high[$i] = $data['data']['forecast'][$i]['high'] . "  ";
		$weather_type[$i] = $data['data']['forecast'][$i]['type'] . "  ";
		$weather_low[$i] = $data['data']['forecast'][$i]['low'] . "  ";
	}
	$json_arr = array("weather_date"=>$weather_date,"weather_high"=>$weather_high,"weather_low"=>$weather_low,"weather_type"=>$weather_type);
	$json_obj = json_encode($json_arr);
	echo $json_obj;
?>