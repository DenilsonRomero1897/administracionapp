<?php 

define("base_url","http://".$_SERVER['SERVER_NAME']."");

if(!isset($_SESSION)){ 
     session_start();
}
     ob_start();
//peticion post
function consumoApi($url, $datos){
        $ch = curl_init();           
$data = json_encode($datos);
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type:application/json'));
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($ch);
if (curl_errno($ch)){
     echo curl_error($ch);
}else{
     $decoded = json_decode($response, true);
}
curl_close($ch);
return $decoded;
    

}
ob_end_flush();


?>