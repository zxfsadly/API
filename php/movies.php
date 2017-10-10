<?php
	$url ="https://api.douban.com/v2/movie/search?q={$_POST["movie"]}";
    $content = "";
    $content = file_get_contents($url);
	$data = json_decode($content,true);
	$count_json = count($data);
	$average = array();
	$name = array();
	$id = array();
	for($i=0;$i<6;$i++){
		$average[$i] = $data['subjects'][$i]['rating']['average'];
		$name[$i] = $data['subjects'][$i]['title'];
		$id[$i]=$data['subjects'][$i]['id'];
	}
	$json_arr = array("aver"=>$average,"na"=>$name,"id"=>$id);
	$json_obj = json_encode($json_arr);
	echo $json_obj;
?>