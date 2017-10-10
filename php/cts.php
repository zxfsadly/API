<?php
	header("Content-type: text/html; charset=utf-8");
	$url ="http://route.showapi.com/950-1?showapi_appid=44241&showapi_sign=b7c79cd3435740cb9b1ee824304615c6&page=1";
              $content = "";
	$blink =array();
	$btype =array();
	$bname =array();
              $content = file_GET_contents($url);
	$data = json_decode($content,true);
	for($i=0;$i<4;$i++){
		$bname[$i]=$data['data'][i]['uname'];
		$btype[$i]=$data['data'][i]['area_v2_name'];
		$blink[$i]="http://live.bilibili.com/" . $data['data'][i]['area_v2_name'];
	}
	$json_arr = array("cts"=>$cts);
	$json_obj = json_encode($json_arr);
	echo $json_obj;
?>