<?php

error_reporting(0);
define('API_KEY','[TOKEEN]');
$asky_channel = "ProxyMTProto";
$adres_api = "https://api.pamickweb.ir/API/api.php";
$your_channel   = "@[CHANNEEL]";

function bot($method,$datas=[]){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,'https://api.telegram.org/bot'.API_KEY.'/'.$method );
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    return json_decode(curl_exec($ch));
}

function pingproxy($str){
preg_match('/server=(.*)&port=(\d{2,5})/i',$str,$m);
$mictime    = microtime(1);
$fsoc       = fsockopen($m[1],$m[2]);
$time2      = microtime(1);
$echo_time  = round(($time2-$mictime)*1e3,2);
return $fsoc?$echo_time:'fa';
}

$update     = json_decode(file_get_contents('php://input'));
$web_api    = json_decode(file_get_contents("$adres_api?channel=$asky_channel"),true);
$randserver = rand(0,15);
$server_api = $web_api['proxies']["$randserver"]['server'];
$port_api   = $web_api['proxies']["$randserver"]['port'];
$secret_api = $web_api['proxies']["$randserver"]['secret'];
$proxy_api  = $web_api['proxies']["$randserver"]['link'];
$ping_1 = pingproxy("$proxy_api");

if(strpos($proxy_api,'https://t.me/proxy?') !== false || strpos($proxy_api,'http://t.me/proxy?') !== false) {
if($ping_1 <= 999 && $ping_1 != "fa"){     
bot('sendmessage',[
'chat_id'=>$your_channel,
'text'=>"
🚀<b> ｎｅｗ ｐｒｏｘｙ </b>🚀

🌐 <b>sᴇʀᴠᴇʀ</b> › <code>$server_api</code>

🔌 <b>ᴘᴏʀᴛ</b> ›  <b>$port_api</b>
🔓‎<b>sᴇᴄʀᴇᴛ</b> › <b>$secret_api</b>

⏳ <b>Ping</b> › $ping_1

To SeT : <a href ='$proxy_api'>Connect Proxy</a>
______________________________________

🆔 <b>$your_channel</b>
",
'parse_mode' => "HTML",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "Connect ✅", 'url' => "$proxy_api"]],
]
])
]);
echo "OK..!";
}}