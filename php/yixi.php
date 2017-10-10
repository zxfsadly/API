<?php
	$url ="http://api.yixi.tv/api/v1/album";
              $content = "";
              $content = file_get_contents($url);
	$data = json_decode($content,true);
	$time = $data['data'][0]['created_at'];
	$title = $data['data'][0]['title'];
	$desc = $data['data'][0]['desc'];
	$img = $data['data'][0]['lectures'][0]['lecturer']['pic'];
	$video = $data['data'][0]['lectures'][0]['video'];
	echo "function yixi(){";
		echo "
			document.getElementById('yixi-img').src = '$img';
			document.getElementById('yixi-title').innerHTML = '$title';
			document.getElementById('yixi-desc').innerHTML = '$desc';
			document.getElementById('yixi-time').innerHTML = '$time';
			document.getElementById('yixi-video').href = 'http://v.youku.com/v_show/id_$video.html';
		";
	echo "}";
?>