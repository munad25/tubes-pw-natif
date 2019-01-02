<?php
$url = 'http://localhost/tubes-pw/web-magang-natif/';

function is_active($param, $page){
	if($param == $page){
		return "active";
	}
	else{
		return "false";
	}
}

function base_url($session = null , $page = null){
	global $url;

	if($session != null && $page != null){
		return $url.$session.'/index.php?page='.$page;
	}
	else if($page == null){
		return $url.$session;
	}
	else{
		return $url;
	}	
}

function get_parse_url($url, $int){
	if($int == 1){
		return parse_url($url);
	}
	else if($int == 2){
		return parse_url($url, PHP_URL_SCHEME);	
	}
	else if($int == 3){
		return parse_url($url, PHP_URL_USER);
	}
	else if($int == 4){
		return parse_url($url, PHP_URL_PASS);
	}
	else if($int == 5){
		return parse_url($url, PHP_URL_HOST);
	}
	else if($int == 6){
		return parse_url($url, PHP_URL_PORT);
	}
	else if($int == 7){
		return parse_url($url, PHP_URL_PATH);
	}
	else if($int == 8){
		return parse_url($url, PHP_URL_QUERY);
	}
	else if($int == 9){
		return parse_url($url, PHP_URL_FRAGMENT);
	}
	else{
		return false;
	}
}

function get_fragment_value($url, $str){
	$fragment = get_parse_url($url, 9);

	parse_str($fragment, $value);

	if (isset($value[$str])) {	
		return $value[$str];
	}
	else{
		return false;
	}
}

function get_page($session, $str){

	if(!empty($session) && !empty($str)){

		$url = base_url($session, $str);
		$query_url = get_parse_url($url, 8);
		
		$page = parse_str($query_url, $value);

		return $value['page'];

	}
	else{
		return false;
	}

}

?>