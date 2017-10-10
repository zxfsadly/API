<?php
	header("Content-type: text/html; charset=utf-8");
	$urlB ="http://route.showapi.com/1367-1?showapi_appid=44241&showapi_sign=b7c79cd3435740cb9b1ee824304615c6&page=1";
              $content = "";
	$blink =array();
	$btype =array();
	$bname =array();
              $content = file_GET_contents($urlB);
	$data = json_decode($content,true);
	for($i=0;$i<4;$i++){
		$bname[$i]=$data['showapi_res_body']['data'][$i]['uname'];
		$btype[$i]=$data['showapi_res_body']['data'][$i]['area_v2_name'];
		$blink[$i]=$data['showapi_res_body']['data'][$i]['short_id'];
	}
	$urlP ="http://route.showapi.com/1369-1?showapi_appid=44241&showapi_sign=b7c79cd3435740cb9b1ee824304615c6&page=1";
              $content = "";
	$plink =array();
	$ptype =array();
	$pname =array();
              $content = file_GET_contents($urlP);
	$data = json_decode($content,true);
	for($i=0;$i<4;$i++){
		$pname[$i]=$data['showapi_res_body']['data'][$i]['userinfo']['nickName'];
		$ptype[$i]=$data['showapi_res_body']['data'][$i]['classification']['cname'];
		$plink[$i]=$data['showapi_res_body']['data'][$i]['id'];
	}
	$json_arr = array("bname"=>$bname,"blink"=>$blink,"btype"=>$btype,"pname"=>$pname,"plink"=>$plink,"ptype"=>$ptype);
	$json_obj = json_encode($json_arr);
	echo $json_obj;
?>