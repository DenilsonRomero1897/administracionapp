<?php 
//peticion get
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,'URL');
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if (curl_errno($ch)) echo curl_error($ch);
else $decoded = json_decode($response, true);
var_dump($decoded);

curl_close($ch);

//peticion post

$ch = curl_init();
$array = [ 'name' => 'carlos',
            'job' => 'programmer'
];
$data = http_build_query($array);
curl_setopt($ch,CURLOPT_URL,'URL');
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($ch);
if (curl_errno($ch)) echo curl_error($ch);
else $decoded = json_decode($response, true);

foreach($decoded as $index => $value){
    echo "$index: $value";
}

curl_close($ch);



//peticion put o patch
$ch = curl_init();
$array = [ 'name' => 'carlos',
            'job' => 'programmer'
];
$data = http_build_query($array);
curl_setopt($ch,CURLOPT_URL,'URL');
curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'PUT');
curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($ch);
if (curl_errno($ch)) echo curl_error($ch);
else $decoded = json_decode($response, true);

foreach($decoded as $index => $value){
    echo "$index: $value";
}

curl_close($ch);
?>