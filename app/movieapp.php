<?php
	$url ="https://api.douban.com/v2/movie/search?q={$_GET["movie"]}";
    $content = "";
    $content = file_get_contents($url);
	$data = json_decode($content,true);
	$count_json = count($data);
	$average = $data['subjects'][0]['rating']['average'];
	$name = $data['subjects'][0]['title'];
	$json_arr = array("aver"=>$average,"na"=>$name);
	$json_obj = json_encode($json_arr);
	echo $json_obj;
?>