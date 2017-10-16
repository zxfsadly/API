<?php
   header("Content-type: text/html; charset=utf-8");
	$url ="https://kyfw.12306.cn/otn/leftTicket/query?leftTicketDTO.train_date={$_GET["date"]}&leftTicketDTO.from_station={$_GET["from-station"]}&leftTicketDTO.to_station={$_GET["to-station"]}&purpose_codes=ADULT";
	$file = "";
		$opts = [
			"http" => [
				"method" => "GET",
				"header" => "User-Agent: Mozilla/15.0 (Macintosh; Intel Mac OS X 10.6; rv:9.0) Gecko/20100101 Firefox/9.0\r\nCookie:JSESSIONID=F7A3E654D6A8488E7B75459211AE21B3; fp_ver=4.5.1; RAIL_EXPIRATION=1506391435520; RAIL_DEVICEID=fKAPiANCID-FlJZ9rhKXHFe7Nvy1gqae7LosJGF30S5bDUlP6yWRrif1voEI4KASOkQ2MaKwgthdH_NsZpO4s_kNwnN1hw7vQyZV0QN5PvXYZe-7CIvC218lKWp8Qb5ig3MAR6oEcBW53MZwgFucHJLTsDsCaX76; route=495c805987d0f5c8c84b14f60212447d; BIGipServerpool_passport=334299658.50215.0000; _jc_save_czxxcx_toStation=%u5317%u4EAC%2CBJP; _jc_save_czxxcx_fromDate=2017-09-23; current_captcha_type=C; BIGipServerportal=3168010506.17183.0000; BIGipServerotn=1290797578.24610.0000; _jc_save_fromStation=%u4E0A%u6D77%2CSHH; _jc_save_toStation=%u5170%u5DDE%2CLZJ; _jc_save_fromDate=2017-09-25; _jc_save_toDate=2017-09-23; _jc_save_wfdc_flag=dc\r\n"
			]
		];
		$context = stream_context_create($opts);
		$file = file_get_contents($url, false, $context);
	$data = json_decode($file,true);
	$count_json = count($data['data']['result']);
	$train_no = array();
	$station_train_code = array();
	$train_no_bk = array();
	$station_train_code_bk = array();
	for($i = 0;$i <$count_json;$i++){
		$train_data[$i] = $data['data']['result'][$i];
		$train = explode('|', $train_data[$i]);
		$train_no[$i] = $train[2];
		$station_train_code[$i] = $train[3];
		$station_train_code_bk[$i] = $station_train_code[$i] . " ";
		if(substr($station_train_code[$i],0,1)=="G"){
			$from_station_no_G = $train[16];
			$to_station_no_G = $train[17];
			$train_no_G = $train_no[$i];
		}
		else{
			$from_station_no_D = $train[16];
			$to_station_no_D = $train[17];
			$train_no_D = $train_no[$i];
		}
	}

	$map_from = $data['data']['map'][$_GET["from-station"]];
	$map_to = $data['data']['map'][$_GET["to-station"]];
	
	$url_G = "https://kyfw.12306.cn/otn/leftTicket/queryTicketPrice?train_no=" . $train_no_G . "&from_station_no=" . $from_station_no_G . "&to_station_no=" . $to_station_no_G . "&seat_types=O9M&train_date={$_GET["date"]}";
	$content_G = "";
		$opts = [
			"http" => [
				"method" => "GET",
				"header" => "User-Agent: Mozilla/15.0 (Macintosh; Intel Mac OS X 10.6; rv:9.0) Gecko/20100101 Firefox/9.0\r\nCookie:JSESSIONID=A46589DDE42B6F20EAF89F34A33F49C2; fp_ver=4.5.1; RAIL_EXPIRATION=1506391435520; RAIL_DEVICEID=fKAPiANCID-FlJZ9rhKXHFe7Nvy1gqae7LosJGF30S5bDUlP6yWRrif1voEI4KASOkQ2MaKwgthdH_NsZpO4s_kNwnN1hw7vQyZV0QN5PvXYZe-7CIvC218lKWp8Qb5ig3MAR6oEcBW53MZwgFucHJLTsDsCaX76; _jc_save_czxxcx_toStation=%u5317%u4EAC%2CBJP; _jc_save_czxxcx_fromDate=2017-09-23; _jc_save_fromStation=%u4E0A%u6D77%2CSHH; _jc_save_toStation=%u5170%u5DDE%2CLZJ; _jc_save_fromDate=2017-09-25; _jc_save_toDate=2017-09-23; _jc_save_wfdc_flag=dc; route=c5c62a339e7744272a54643b3be5bf64; BIGipServerotn=384303370.24610.0000; BIGipServerportal=3084124426.16671.0000\r\n"
			]
		];
		$context = stream_context_create($opts);
		$content_G = file_get_contents($url_G, false, $context);
    	$content_G = str_replace("¥",'',$content_G);
	$data_G = json_decode($content_G,true);
	$O_G = $data_G['data']['O'];
	$WZ_G = $data_G['data']['WZ'];
	$M_G = $data_G['data']['M'];
	$A9_G = $data_G['data']['A9'];

	$url_D = "https://kyfw.12306.cn/otn/leftTicket/queryTicketPrice?train_no=" . $train_no_D . "&from_station_no=" . $from_station_no_D . "&to_station_no=" . $to_station_no_D . "&seat_types=O9M&train_date={$_GET["date"]}";
	$content_D = "";
		$opts = [
			"http" => [
				"method" => "GET",
				"header" => "User-Agent: Mozilla/15.0 (Macintosh; Intel Mac OS X 10.6; rv:9.0) Gecko/20100101 Firefox/9.0\r\nCookie:JSESSIONID=A46589DDE42B6F20EAF89F34A33F49C2; fp_ver=4.5.1; RAIL_EXPIRATION=1506391435520; RAIL_DEVICEID=fKAPiANCID-FlJZ9rhKXHFe7Nvy1gqae7LosJGF30S5bDUlP6yWRrif1voEI4KASOkQ2MaKwgthdH_NsZpO4s_kNwnN1hw7vQyZV0QN5PvXYZe-7CIvC218lKWp8Qb5ig3MAR6oEcBW53MZwgFucHJLTsDsCaX76; _jc_save_czxxcx_toStation=%u5317%u4EAC%2CBJP; _jc_save_czxxcx_fromDate=2017-09-23; _jc_save_fromStation=%u4E0A%u6D77%2CSHH; _jc_save_toStation=%u5170%u5DDE%2CLZJ; _jc_save_fromDate=2017-09-25; _jc_save_toDate=2017-09-23; _jc_save_wfdc_flag=dc; route=c5c62a339e7744272a54643b3be5bf64; BIGipServerotn=384303370.24610.0000; BIGipServerportal=3084124426.16671.0000\r\n"
			]
		];
		$context = stream_context_create($opts);
		$content_D = file_get_contents($url_D, false, $context);
    	$content_D = str_replace("¥",'',$content_D);
	$data_D = json_decode($content_D,true);
	$O_D = $data_D['data']['O'];
	$WZ_D = $data_D['data']['WZ'];
	$M_D = $data_D['data']['M'];
	$A9_D = $data_D['data']['A9'];

	$json_arr = array("station_train_code"=>$station_train_code_bk,"OG"=>$O_G,"WZG"=>$WZ_G,"MG"=>$M_G,"A9G"=>$A9_G,"OD"=>$O_D,"WZD"=>$WZ_D,"MD"=>$M_D,"A9D"=>$A9_D,"map_from"=>$map_from,"map_to"=>$map_to);
	$json_obj = json_encode($json_arr);
	echo $json_obj;
?>
