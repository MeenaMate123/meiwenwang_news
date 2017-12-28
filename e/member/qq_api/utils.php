<?php
/*
 * @brief a utils file 
 * This is only a simple demo.
 * It is a free software; you can redistribute it 
 * and/or modify it. 
 */
//包含配置


function redirect_to_login($appid, $appkey, $callback)
{
    //授权登录页
    //$redirect = "http://openapi.qzone.qq.com/oauth/qzoneoauth_authorize?oauth_consumer_key=$appid&";

	//----oauth2.0 2013-1-24 
	$_SESSION['state']=md5(uniqid(rand(),TRUE));
	//拼接URL
	$redirect ="https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=".$appid."&redirect_uri=".urlencode($callback)."&state=".$_SESSION['state'];

    header("Location:$redirect");
}

function get_user_info($openid,$appid,$access_token)
{
    //get user info 的api接口，不要随便更改!!
	$url='https://graph.qq.com/user/get_user_info?access_token='.$access_token.'&oauth_consumer_key='.$appid.'&openid='.$openid.'';
	$result=http_request($url);
	//$result=file_get_contents($url);
	return $result;
	 
}

function api($url, $params, $method='GET'){
		$params['access_token']=$this->access_token;
		if($method=='GET'){
			$result_str=$this->http_request($url.'?'.http_build_query($params));
		}else{
			$result_str=$this->http_request($url, http_build_query($params), 'POST');
		}
		$result=array();
		if($result_str!='')$result=json_decode($result_str, true);
		return $result;
}
function http_request($url,$timeout=30,$header=array()){  
        if (!function_exists('curl_init')) {  
            throw new Exception('server not install curl');  
        }  
        $ch = curl_init();  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
        curl_setopt($ch, CURLOPT_HEADER, true);  
        curl_setopt($ch, CURLOPT_URL, $url);  
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);  

		//curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, FALSE); 
		//curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
		//curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 30);
		//curl_setopt($ci, CURLOPT_TIMEOUT, 30);

        if (!empty($header)) {  
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);  
        }  
        $data = curl_exec($ch);  
        list($header, $data) = explode("\r\n\r\n", $data);  
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
        if ($http_code == 301 || $http_code == 302) {  
            $matches = array();  
            preg_match('/Location:(.*?)\n/', $header, $matches);  
            $url = trim(array_pop($matches));  
            curl_setopt($ch, CURLOPT_URL, $url);  
            curl_setopt($ch, CURLOPT_HEADER, false);  
            $data = curl_exec($ch);  
        }  
  
        if ($data == false) {  
            curl_close($ch);  
        }  
        @curl_close($ch);  
        return $data;  
} 

?>