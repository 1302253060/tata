<?php

$content =file_get_contents('./file.txt');

preg_match_all('/src=\"([^"]*)/ism',$content,$matchs);


foreach($matchs[1] as $key => $value){
	$url = 'http://www.v-huzhu.com'.$value;
	$pathinfo = pathinfo($value);
	mkdir('.'.$pathinfo['dirname'],0,true);
	$data = file_get_contents($url);
	file_put_contents('.'.$value, $data);
}