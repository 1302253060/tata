<?php



getFile('.css/assets/plugins/datatables/images/sort_desc.png','http://haohuzhu.pw/css/assets/plugins/datatables/images/sort_desc.png');




function getFile($path,$url){
	
	$pathinfo = pathinfo($path);
	if(!file_exists($pathinfo['dirname'])){
		mkdir($pathinfo['dirname'],0777,true);
	}	
	$data = file_get_contents($url);
	file_put_contents($path, $data);
}

