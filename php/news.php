<?php
	$url ="https://news-at.zhihu.com/api/4/news/latest";
              $content = "";
              $content = file_get_contents($url);
              $content = str_replace("\\r\\n",'',$content);
	$data = json_decode($content,true);
	$title = array();
	$id = array();
	for($i = 0;$i < 8;$i++){
		$title[$i] = $data['stories'][$i]['title'];
		$id[$i] = $data['stories'][$i]['id'];
	}
	echo "function gonews(){";
	for($i = 0;$i < 8;$i++){	
		echo "
			document.getElementById('zhihu$i').innerHTML = '$title[$i]';
			document.getElementById('zhihu$i').href = 'http://daily.zhihu.com/story/$id[$i]';
			document.getElementById('more').innerHTML = 'more';
			document.getElementById('more').href = 'http://daily.zhihu.com/story';
		";
		}
	echo "}";
?>
	
