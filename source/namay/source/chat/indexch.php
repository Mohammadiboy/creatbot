<?php
//==========================================================//
$telegram_ip_ranges = [['lower' => '149.154.160.0', 'upper' => '149.154.175.255'],['lower' => '91.108.4.0',    'upper' => '91.108.7.255']];
$ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
$ok=false;
foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
//-
$lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
$upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
if ($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) $ok=true;}
if (!$ok) die();
//==========================================================//
date_default_timezone_set('Asia/Tehran');
$time = date('H:i:s');
error_reporting(0);
$token="[TOKEEN]";
define('API_KEY',$token); 
mkdir("admin");
mkdir("data");
mkdir("data/gp");
mkdir("data/int");
mkdir("data/gap");
mkdir("data/spam");
mkdir("data/user");
mkdir("data/users");// توکن
//==========================================================//
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);}}
function Botinfo($what){
    return bot('GetMe',[])->result->$what;}
    function sendphoto($chat_id, $photo, $captionl){
 bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>$photo,
 'caption'=>$caption,
 ]);
 }
 function sendaudio($chat_id, $audio, $caption){
 bot('sendaudio',[
 'chat_id'=>$chat_id,
 'audio'=>$audio,
 'caption'=>$caption,
 ]);
 }
 function sendvoice($chat_id, $voice, $caption){
 bot('sendvoice',[
 'chat_id'=>$chat_id,
 'voice'=>$voice,
 'caption'=>$caption,
 ]);
 }
 function sendvideo($chat_id, $video, $captionl){
 bot('sendvideo',[
 'chat_id'=>$chat_id,
 'video'=>$video,
 'caption'=>$caption,
 ]);
 }
 function SM($chat_id,$mode,$text,$message_id)
 {
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>$text,
        'parse_mode'=>$mode,
        'reply_to_message_id'=>$message_id
    ]);
}
function SendDocument($chatid,$document,$caption = null){
	bot('SendDocument',[
	'chat_id'=>$chatid,
	'document'=>$document,
	'caption'=>$caption
	]);
}

//==========================================================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$from_id = $message->from->id;
$text = $message->text;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->username;
$tc = $update->message->chat->type;
$data = $update->callback_query->data;
$messageid = $update->callback_query->message->message_id;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$textt = $update->callback_query->message->text;
$inline = $update->inline_query->query;
$inline_message_id = $update->callback_query->inline_message_id;
$new_chat_member_id = $update->message->new_chat_member->id;
$new_chat_member_username = $update->message->new_chat_member->username;
$rpto = $update->message->reply_to_message->forward_from->id;
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$textmassage = $message->text;
$fromid = $update->callback_query->from->id;
$data = $update->callback_query->data;
$membercall = $update->callback_query->id;
$firstname = $update->callback_query->from->first_name;
$usernameca = $update->callback_query->from->username;
$on = file_get_contents("users/$chat_id/onlines.txt");
$chatgptkey = file_get_contents("data/$from_id/chatvs.txt");
//==========================================================//
$up = json_decode(file_get_contents('php://input'));
$from_id = $up->message->from->id; 
$chat_id = $up->message->chat->id;
$message_id = $up->message->message_id;
$text = $up->message->text;
mkdir("data/$from_id");
//==========================================================//
$reply = $update->message->reply_to_message;
$rename = $reply->from->first_name;
$reid = $reply->from->id;
$repmsg = $reply->message_id;
$callback_query = $update->callback_query;
$chatid = $callback_query->message->chat->id;
$messageid = $callback_query->message->message_id;
$data = $callback_query->data;
$kos = $callback_query->message->text;
$kosk = $callback_query->from->first_name;
$admins = array("[ADMIIN]"); // شناسه مدیران
$textchaneel = file_get_contents("admin/textchaneel.json");
$blocklist = file_get_contents("data/blocklist.txt");
$channel = "$textchaneel"; // یوزرنیم چنل بدون @
$bottag = "[BOOT]"; // یوزرنیم ربات بدون@
$botid = "5675304486"; // شناسه ربات در ابتدای توکن
$IdCl = "LocalProGram"; // یوزرنیم چنل عکس بدون@
$IdPic = "12"; // شماره عکس داخل چنل
$fggwu = "[UUSSEE]"; // یوزرنیم پشتیبانی بدون @
$cactus = "[UUSSEE]"; // یوزرنیم مالک بدون @
//==========================================================//
$bugun = date('d-M Y',strtotime('3 hour'));
$name_bot = Botinfo('first_name');
$forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$channel&user_id=".$chat_id));
$user = json_decode(file_get_contents("data/users/$from_id.json"),true);
$stats_n = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$chat_id&user_id=".$from_id),true);
$statjsonq = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$chatid&user_id=".$fromid),true);
$setp = $user['step']; // User STEP
$status_n = $stats_n['result']['status']; // STATS
$statusq = $statjsonq['result']['status']; // STATS
$tch = $forchaneel->result->status; // True Channel
$all_gaps = file_get_contents("data/allgap.txt");
$all_users = file_get_contents("data/allusers.txt");
$yadauto = file_get_contents("data/autoYAD.txt");
if(isset($data)){
$fid = $update->callback_query->from->id;}
if(isset($message->from)){
$fid = $message->from->id;}
//==========================================================//
@$juser = json_decode(file_get_contents("data/user/$from_id.json"),true);
@$cuser = json_decode(file_get_contents("data/user/$fromid.json"),true);
@$getgp = json_decode(file_get_contents("data/gp/$chat_id.json"),true);
@$getgpc = json_decode(file_get_contents("data/gp/$chatid.json"),true);
@$database = json_decode(file_get_contents("data/database.json"),true);
@$rival = json_decode(file_get_contents("data/rival.json"),true);
//==========================================================//
function Download($link, $path){
    $file = fopen($link, 'r') or die("Can't Open Url !");
    file_put_contents($path, $file);
    fclose($file);
    return is_file($path);
 }
function deletefolder($path){
 if($handle=opendir($path)){
  while (false!==($file=readdir($handle))){
   if($file<>"." AND $file<>".."){
    if(is_file($path.'/'.$file)){ 
     @unlink($path.'/'.$file); } 
    if(is_dir($path.'/'.$file)) { 
     deletefolder($path.'/'.$file); 
     @rmdir($path.'/'.$file); }} } }}
function step($from_id,$step){
$user = json_decode(file_get_contents("data/users/$from_id.json"),true);
$user["step"] = "$step";
$outjson = json_encode($user,true);
file_put_contents("data/users/$from_id.json",$outjson);
return true;}

if(file_exists("admin/jointext.json")){
$jointext = file_get_contents("admin/jointext.json");
}else{
$jointext = "متن جوین اجباری تنظیم نشده است";
}
if(file_exists("admin/starttext.json")){
$starttext = file_get_contents("admin/starttext.json");
}else{
$starttext = "متن استارت تنظیم نشده است";
}
if(file_exists("admin/helpgrouptext.json")){
$helpgrouptext = file_get_contents("admin/helpgrouptext.json");
}else{
$helpgrouptext = "متن راهنما نصب گروه تنظیم نشده است";
}
if(file_exists("admin/helpgrouptexten.json")){
$helpgrouptexten = file_get_contents("admin/helpgrouptexten.json");
}else{
$helpgrouptexten = "The Group Installation Help Text is not set";
}
if(file_exists("admin/helptext.json")){
$helptext = file_get_contents("admin/helptext.json");
}else{
$helptext = "متن رهنما گروه تنظیم نشده است";
}
if(file_exists("admin/starttexten.json")){
$starttexten = file_get_contents("admin/starttexten.json");
}else{
$starttexten = "The starter text is not set";
}
//==========================================================//
$joinej = file_get_contents("admin/joinej.txt");
if($joinej == null ){
file_put_contents("admin/joinej.txt","OFF");
}

$offfer = file_get_contents("admin/offfer.txt");
if($offfer == null ){
file_put_contents("admin/offfer.txt","ON");
}
if($tc == "private" ){
$all_users2 = explode("\n",$all_users); 
if(!in_array($chat_id,$all_users2)){
$tctctct = fopen("data/allusers.txt", "a") or die("Unable to open file!");
fwrite($tctctct, "$chat_id\n");
fclose($tctctct);}}


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


$lang = file_get_contents("data/$from_id.txt");

//==========================================================//
// if($offfer == "OFF" && $chat_id != $admins && $chat_id != $admins[]){
// bot('sendmessage',[
// 'chat_id'=>$chat_id,
// 'text'=>"ربات برای اپدیت خاموش می باشد",
// 'message_id'=>$message_id,
// ]);
// exit;
// }

if($text == "/start"){
$langp = file_get_contents("data/$from_id.txt");
$chatgpt = file_get_contents("data/$from_id/chatvs.txt");
if($langp == null and $chatgpt == null){
mkdir("data/$from_id");
file_put_contents("data/$from_id.txt","none");
$chatgbt2 = file_get_contents("https://api.pamickweb.ir/API/chat.php?type=newChatID");
$data = json_decode($chatgbt2, true);
$chat_ids = $data['chat_id'];
file_put_contents("data/$from_id/chatvs.txt","$chat_ids");
step($chat_id,"none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ مجدد ربات رو استارت کنید .! /start",
]);
}
if($tc == "private" ){
if($tch != 'member' && $tch != 'creator' && $tch != 'administrator' and $joinej == "ON"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$jointext",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "🛎️ عضویت در کانال️", 'url' => "https://t.me/$channel"]],
[['text'=>"🌟 عضو شدم",'url'=>"https://t.me/$bottag?start"]],
]])
]);
}elseif ($lang == "iran"){
step($chat_id,"none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
$starttext
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⭐️ افزودن ربات به گروهتون ⭐️",'url'=>"https://t.me/$bottag?startgroup=new"]],
[['text' => "پشتیبانی ربات 💬", 'url' => "https://t.me/$cactus"],['text'=>"📚 راهنمای نصب ربات",'callback_data'=>'sar']],
[['text'=>"🏴󠁧󠁢󠁥󠁮󠁧󠁿 تغییر زبان شما به انگلیسی 🏴󠁧󠁢󠁥󠁮󠁧󠁿️",'callback_data'=>"engl"]],
]])
]);
}elseif ($lang == "eng"){
step($chat_id,"none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
$starttexten
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⭐️ Add the robot to the group ⭐️",'url'=>"https://t.me/$bottag?startgroup=new"]],
[['text' => "💬 Robot Support", 'url' => "https://t.me/$cactus"],['text'=>"Robot Installation Help 📚",'callback_data'=>'saren']],
[['text'=>"🇮🇷 Change your language to Farsi 🇮🇷️",'callback_data'=>"iranl"]],
]])
]);
}elseif ($lang == "none"){
step($chat_id,"none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
💬 برای شروع زبان مورد نظر خودتو انتخاب کن 
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
💬 Choose your desired language to start
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text' => "فارسی 🇮🇷", 'callback_data' => "iranl"],['text'=>"English 🏴󠁧󠁢󠁥󠁮󠁧󠁿",'callback_data'=>'engl']],
]])
]);
}}}
//==========================================================//
if(strpos($text,"'") !== false or strpos($text,"$") !== false or strpos($text,"!") !== false or strpos($text,";") !== false or strpos($text,'"') !== false or strpos($text,"}") !== false or strpos($text,"{") !== false){	
//==========================================================//
if($tc == "private" ){
$tt = time() + 9999999999999999;
file_put_contents("data/spam/$from_id.txt",$tt);
if(!in_array($chat_id,$admins)){
step($chat_id,"none");
  bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"🔔 به دلیل ارسال کد مخرب به ربات، بلاک شدید!",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
]); 
 bot('sendMessage',[
 'chat_id'=>$admins[0],
 'text'=>"[▫️ این کاربر کد مخرب ارسال کرد!](tg://user?id=$from_id)",
 'parse_mode'=>"MarkDown",
]); 
}else{
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"داش داری اشتباه میزنی !",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
 ]); exit;
    
}}}
//==========================================================//
elseif($data == "back"){
step($chatid,"none");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
'text' => "
$starttext
",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"⭐️ افزودن ربات به گروهتون ⭐️",'url'=>"https://t.me/$bottag?startgroup=new"]],
[['text' => "پشتیبانی ربات 💬", 'url' => "https://t.me/$cactus"],['text'=>"📚 راهنمای نصب ربات",'callback_data'=>'sar']],
[['text'=>"🏴󠁧󠁢󠁥󠁮󠁧󠁿 تغییر زبان شما به انگلیسی 🏴󠁧󠁢󠁥󠁮󠁧󠁿️",'callback_data'=>"engl"]],
]]) ]);}
//==========================================================//
elseif($data == "backen"){
step($chatid,"none");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
'text' => "
$starttexten
",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⭐️ Add the robot to the group ⭐️",'url'=>"https://t.me/$bottag?startgroup=new"]],
[['text' => "💬 Robot Support", 'url' => "https://t.me/$cactus"],['text'=>"Robot Installation Help 📚",'callback_data'=>'saren']],
[['text'=>"🇮🇷 Change your language to Farsi 🇮🇷️",'callback_data'=>"iranl"]],
]]) ]);}
//==========================================================//
elseif($data == "iranl"){
file_put_contents("data/$chatid.txt","iran");
step($chatid,"none");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
'text' => "
$starttext
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⭐️ افزودن ربات به گروهتون ⭐️",'url'=>"https://t.me/$bottag?startgroup=new"]],
[['text' => "پشتیبانی ربات 💬", 'url' => "https://t.me/$cactus"],['text'=>"📚 راهنمای نصب ربات",'callback_data'=>'sar']],
[['text'=>"🏴󠁧󠁢󠁥󠁮󠁧󠁿 تغییر زبان شما به انگلیسی 🏴󠁧󠁢󠁥󠁮󠁧󠁿️",'callback_data'=>"engl"]],
]]) ]);}
//==========================================================//
elseif($data == "engl"){
file_put_contents("data/$chatid.txt","eng");
step($chatid,"none");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
'text' => "
$starttexten
",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"⭐️ Add the robot to the group ⭐️",'url'=>"https://t.me/$bottag?startgroup=new"]],
[['text' => "💬 Robot Support", 'url' => "https://t.me/$cactus"],['text'=>"Robot Installation Help 📚",'callback_data'=>'saren']],
[['text'=>"🇮🇷 Change your language to Farsi 🇮🇷️",'callback_data'=>"iranl"]],
]]) ]);}
//==========================================================//
elseif($data == "sar"){
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
'text' => "
$helpgrouptext
",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=> "🏛 منوی اصلی", 'callback_data'=>"back"]],
]
])
]);}

elseif($data == "saren"){
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
'text' => "
$helpgrouptexten
",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=> "🏛 back", 'callback_data'=>"backen"]],
]
])
]);}
//==========================================================//
if($text == "panel" or $text == "پنل"){
   $id_bot = bot('GetMe',[]) -> result -> id;
$stats_b = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$chat_id&user_id=".$id_bot),true);
$status_b = $stats_b['result']['status'];
if ($status_b == 'creator' or $status_b == 'administrator' ){
if ($status_n == 'creator' or $status_n == 'administrator' ){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"
 $helptext
",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"⭐️ افزودن $name_bot به گروه ⭐️",'url'=>"https://t.me/$bottag?startgroup=new"]],
]]) ]); 
}else{
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "⚠️ برای فعالیت در گروه ابتدا من را ادمین کنید!",
 'parse_mode'=>"MarkDown",
 'reply_to_message_id'=>$message_id,
]);}}}

if($tc == "supergroup" or $tc == "group" ){
$all_gaps2 = explode("\n",$all_gaps); 
if(!in_array($chat_id,$all_gaps2)){
$tctctct = fopen("data/allgap.txt", "a") or die("Unable to open file!");
fwrite($tctctct, "\n$chat_id");
fclose($tctctct);
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "🔅 ربات $name_bot نصب شد!

📚 <b>ابتدا ربات را ادمین گروه کرده و سپس کلمه پنل را ارسال کنید!</b>

⚠️ <b>تا زمانی که ادمین گروه نباشم نمیتوانم فعالیتی انجام دهم!</b>",
 'parse_mode'=>"HTML",
]);
bot('sendMessage',[
            'chat_id' =>$admins[0],
'text' => "⚜ گروه `$chat_id` به ربات اضافه شد!",
 'parse_mode'=>"MarkDown",
]);}}
//==========================================================//
if($text == '!koydhdd' or $text == 'ستیnnnی' and !is_null($reply)){
$inline = json_encode(['inline_keyboard'=>[
[['text'=>'بله حق بود ✔️','callback_data'=>'kodd']],
]
]);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"مطالبی که ایشون [$rename](tg://user?id=$reid) فرموندند حق بود✔\nامضا کنندگان :\n$fname",
'parse_mode'=>'Markdown', 'reply_to_message_id'=>$repmsg,
'reply_markup'=>$inline
]);
}
//==========================================================//
elseif (strpos($text , "/insta ") !== false or strpos($text , "/insta") !== false) {
$messages = bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "درحال بررسی . . .",
'parse_mode'=>'Markdown', 
'reply_to_message_id'=>$message_id
])->result->message_id;
$matn = str_replace('/insta ','',$text) or str_replace('/insta','',$text); 
 $get = file_get_contents ("https://api.pamickweb.ir/API/insta.php?type=post&url=".urlencode($matn));
	$result = json_decode($get, true);
$ccce = $result['result']['medias'][0]['url'];
$extension = $result['result']['medias'][0]['extension'];
$quality = $result['result']['medias'][0]['quality'];
$formattedSize = $result['result']['medias'][0]['formattedSize'];
$cccess = $result['result']['title'];
$ture = $result['status'];
if($ture == "ture"){
bot('deletemessage', [
'chat_id' => $chat_id, 
'message_id' => $messages
]);
bot('Sendvideo',[
'chat_id'=>$chat_id,
'video'=>$ccce,
'caption'=>"
🎞 ویدیو شما با موفقیت دانلود شد

⏳ حجم فایل : $formattedSize
⚡️ کیفیت فایل : $quality
",
]);
}else {
bot('deletemessage', [
'chat_id' => $chat_id, 
'message_id' => $messages
]);
bot('deletemessage', [
'chat_id' => $chat_id, 
'message_id' => $messages
]);bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"خطایی در هنگام دانلود (ممکن است لینک اشتباه باشد)",
  'reply_to_message_id'=>$message_id,
]);
}
}

if(preg_match('/^[!\/#]?(/age|محاسبه سن) (\d+)\/(\d+)\/(\d+)$/i',$text,$match)){
$messages = bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "درحال بررسی . . .",
'parse_mode'=>'Markdown', 
'reply_to_message_id'=>$message_id
])->result->message_id;
$get = file_get_contents("http://api.novateamco.ir/age/?year=".$match[2]."&month=".$match[3]."&day=".$match[4]);
if($match[2] < 1000 or $match[3] >= 13 or $match[4] >= 32 or $match[2] >= 1403){
bot('deletemessage', [
'chat_id' => $chat_id, 
'message_id' => $messages
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ابتدا از صحت فرمت وارد شده اطمینان حاصل کنید و مجددا امتحان کنید !",'reply_to_message_id'=>$message_id,]);
}else{
$result = json_decode($get, true);
if($result['ok'] === true){
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"⚖️ محاسبه سن انجام شد !
🌲 سن دقیق شما : ".$result['result']['year']." سال و ".$result['result']['month']." ماه و ".$result['result']['day']." روز
🌏 کل روز های سپری شده : ".$result['other']['days']."\n🤤 حیوان سال شما : ".$result['other']['year_name']."\n🦅 روز های مانده به تولد بعدی شما : ".$result['other']['to_birth']."\n\n• Ch : @$channel", 
'MarkDown',
'reply_to_message_id'=>$message_id]);
}}
}


elseif (strpos($text , "/gif ") !== false or strpos($text , "/gif") !== false) {
$matn = str_replace('/gif ','',$text) or str_replace('/gif','',$text); 
$messages = bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "درحال بررسی . . .",
'parse_mode'=>'Markdown', 
'reply_to_message_id'=>$message_id
])->result->message_id;
$bot = [
"https://www.flamingtext.com/net-fu/proxy_form.cgi?imageoutput=true&script=alien-glow-anim-logo&text=$matn&doScale=true&scaleWidth=240&scaleHeight=120",
"https://www.flamingtext.com/net-fu/proxy_form.cgi?imageoutput=true&script=flash-anim-logo&text=$matn&doScale=true&scaleWidth=240&scaleHeight=120",
"https://www.flamingtext.com/net-fu/proxy_form.cgi?imageoutput=true&script=shake-anim-logo&text=$matn&doScale=true&scaleWidth=240&scaleHeight=120",
"https://www.flamingtext.com/net-fu/proxy_form.cgi?imageoutput=true&script=highlight-anim-logo&text=$matn&doScale=true&scaleWidth=240&scaleHeight=120",
"https://www.flamingtext.com/net-fu/proxy_form.cgi?imageoutput=true&script=blue-fire&text=$matn&doScale=true&scaleWidth=240&scaleHeight=120",
"https://www.flamingtext.com/net-fu/proxy_form.cgi?imageoutput=true&script=burn-in-anim-logo&text=$matn&doScale=true&scaleWidth=240&scaleHeight=120",
"https://www.flamingtext.com/net-fu/proxy_form.cgi?imageoutput=true&script=whirl-anim-logo&text=$matn&doScale=true&scaleWidth=240&scaleHeight=120",
"https://www.flamingtext.com/net-fu/proxy_form.cgi?imageoutput=true&script=inner-fire-anim-logo&text=$matn&doScale=true&scaleWidth=240&scaleHeight=120",
"https://www.flamingtext.com/net-fu/proxy_form.cgi?imageoutput=true&script=glitter-anim-logo&text=$matn&doScale=true&scaleWidth=240&scaleHeight=120",
"https://www.flamingtext.com/net-fu/proxy_form.cgi?imageoutput=true&script=flaming-logo&text=$matn&doScale=true&scaleWidth=240&scaleHeight=120",
"https://www.flamingtext.com/net-fu/proxy_form.cgi?imageoutput=true&script=memories-anim-logo&text=$matn&doScale=true&scaleWidth=240&scaleHeight=120",
];
$r = $bot[rand(0, count($bot)-1)];
$r2 = $bot[rand(0, count($bot)-1)];
$r3 = $bot[rand(0, count($bot)-1)];
bot('deletemessage', [
'chat_id' => $chat_id, 
'message_id' => $messages
]);
bot('senddocument',[
'chat_id'=>$chat_id,
'document'=>"$r",
'caption'=>"گیف : $matn",
'reply_to_message_id'=>$message_id,
]);
bot('senddocument',[
'chat_id'=>$chat_id,
'document'=>"$r2",
'caption'=>"گیف : $matn",
'reply_to_message_id'=>$message_id,
]);
bot('senddocument',[
'chat_id'=>$chat_id,
'document'=>"$r3",
'caption'=>"گیف : $matn",
'reply_to_message_id'=>$message_id,
]);
}

//==========================================================//
elseif (strpos($text , "/weather ") !== false or strpos($text , "/weather") !== false) {
$messages = bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "درحال بررسی . . .",
'parse_mode'=>'Markdown', 
'reply_to_message_id'=>$message_id
])->result->message_id;
$texte = str_replace('/weather', '+', $text);
$url = json_decode(file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$texte."&appid=eedbc05ba060c787ab0614cad1f2e12b&units=metric"), true);
$city = $url["name"];
$deg = $url["main"]["temp"];
$bad = $url["wind"]["speed"];
$did = $url["visibility"];
$feshar = $url["main"]["pressure"];
$type1 = $url["weather"][0]["main"];
if($type1 == "Clear"){
		$tpp = 'آفتابی☀';
		file_put_contents('type.txt',$tpp);
	}
	elseif($type1 == "Clouds"){
		$tpp = 'ابری ☁☁';
		file_put_contents('type.txt',$tpp);
	}
	elseif($type1 == "Rain"){
		 $tpp = 'بارانی ☔';
file_put_contents('type.txt',$tpp);
	}
	elseif($type1 == "Thunderstorm"){
		$tpp = 'طوفانی ☔☔☔☔';
file_put_contents('type.txt',$tpp);
	}
	elseif($type1 == "Mist"){
		$tpp = 'مه 💨';
file_put_contents('type.txt',$tpp);
	}
  if($city != ''){
$ziro = file_get_contents('type.txt');
bot('deletemessage', [
'chat_id' => $chat_id, 
'message_id' => $messages
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text' => "
  
✦<b> دمای شهر $city هم اکنون $deg درجه سانتی گراد می باشد . 
✦ سرعت باد $bad متر بر ثانیه است . 
✦ دید افقی $did متر است . 
✦ فشار هوای $feshar میلی بار است . 
✦ شرایط فعلی آب و هوا: $ziro </b>
", 
'parse_mode' => 'MarkDown',
'reply_to_message_id' => $message_id
, 'parse_mode' => 'html' ]);
unlink('type.txt');
}else{

bot('sendmessage',[
'chat_id'=>$chat_id,
'text' => "⚠️شهر مورد نظر شما يافت نشد"]);

 }
}
//==========================================================//
if (substr($text, 0, 3) === '// ') { #gpttext
    $messages = bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "درحال بررسی . . .",
        'parse_mode' => 'Markdown',
        'reply_to_message_id' => $message_id
    ])->result->message_id;

    $textt = str_replace('// ', '', $text);
    $texttt = urlencode($textt);
    $key = $chatgptkey;
    $json = file_get_contents("https://api.picassocode.ir/Ai.php?key=6650836810:u191uyfrsnjd@PicassoCode_APIManager_Bot&message=$texttt");
$chatgbt2 = json_decode($json, true);
$message = $chatgbt2['result']['message'];
    bot('deletemessage', [
        'chat_id' => $chat_id,
        'message_id' => $messages
    ]);

    bot('SendMessage', [
        'chat_id' => $chat_id,
        'text' => "
پاسخ سرور ربات : 🤖

$message
",
        'parse_mode' => 'Markdown',
        'reply_to_message_id' => $message_id,
    ]);
}
//==========================================================//
elseif (strpos($text , "/proxy") !== false) {
$messages = bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "درحال بررسی . . .",
'parse_mode'=>'Markdown', 
'reply_to_message_id'=>$message_id
])->result->message_id;
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

$server10 = $prox["Result"][5]["server"];
$port10 = $prox["Result"][5]["port"];
$secret10 = $prox["Result"][5]["secret"];
$server20 = $prox["Result"][6]["server"];
$port20 = $prox["Result"][6]["port"];
$secret20 = $prox["Result"][6]["secret"];
$server30 = $prox["Result"][7]["server"];
$port30 = $prox["Result"][7]["port"];
$secret30 = $prox["Result"][7]["secret"];
$server40 = $prox["Result"][8]["server"];
$port40 = $prox["Result"][8]["port"];
$secret40 = $prox["Result"][8]["secret"];
$server50 = $prox["Result"][9]["server"];
$port50 = $prox["Result"][9]["port"];
$secret50 = $prox["Result"][9]["secret"];

bot('deletemessage', [
'chat_id' => $chat_id, 
'message_id' => $messages
]);
bot('SendMessage',[
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
🌐 پروکسی 6

https://t.me/proxy?server=$server10&port=$port10&secret=$secret10
➖➖➖➖➖➖➖➖
🌐 پروکسی 7

https://t.me/proxy?server=$server20&port=$port20&secret=$secret20
 ➖➖➖➖➖➖➖➖
🌐 پروکسی 8

https://t.me/proxy?server=$server30&port=$port30&secret=$secret30
➖➖➖➖➖➖➖➖
🌐 پروکسی 9

https://t.me/proxy?server=$server40&port=$port40&secret=$secret40
➖➖➖➖➖➖➖➖
🌐 پروکسی 10

https://t.me/proxy?server=$server50&port=$port50&secret=$secret50
➖➖➖➖➖➖➖➖

🌐 با کلیک بر روی هر پروکسی به راحتی متصل شوید 
",
'parse_mode'=>'Markdown', 
  'reply_to_message_id'=>$message_id,
]);
}


elseif (strpos($text , "/music ") !== false or strpos($text , "/music") !== false) {
$messages = bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "درحال بررسی . . .",
'parse_mode'=>'Markdown', 
'reply_to_message_id'=>$message_id
])->result->message_id;
$textt = str_replace('/music ','',$text) or str_replace('/music','',$text); 
$texttt=urlencode($textt);
$get = file_get_contents("https://api.pamickweb.ir/API/searchmusic.php?name=$texttt&type=search");
$get = json_decode($get, true);
if ($get['ok'] == true) {
$inline_keyboard = [];
if ($get['ok'] && isset($get['Results'])) {
foreach ($get['Results'] as $index => $result) {
if (is_array($result)) {
$inline_keyboard[] = [
[
'text' => $result['title'],
'callback_data' => "dl_music|" . $text . "|" . $index
]
];
}}}
$reply_markup = json_encode(['inline_keyboard' => $inline_keyboard]);
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "👇 موزیک های زیر پیدا شد!",
'parse_mode' => 'markdown',
'reply_to_message_id' => $message_id,
'reply_markup' => $reply_markup
]);
} else {
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "⚠️ چیزی پیدا نشد!",
'parse_mode' => 'markdown',
'reply_to_message_id' => $message_id,
]);
}
exit;
}
#=========================================================#
if (strpos($data, "dl_music|") !== false) {
bot('answercallbackquery', [
'callback_query_id' => $callback_query_id,
'text' => 'صبر کنید . . .',
'show_alert' => false
]);
$getdata = explode("|", $data);
$music_title = $getdata[1];
$music_number = $getdata[2];
$get_dl_music = file_get_contents("https://api.pamickweb.ir/API/searchmusic.php?name=" . urlencode($music_title) . "&type=search");
$get_dl_music2 = json_decode($get_dl_music, true);
if ($get_dl_music2['ok'] && isset($get_dl_music2['Results']['number']) && $get_dl_music2['Results']['number'] > 0 && isset($get_dl_music2['Results'][$music_number])) {
bot("sendVoice", [
'chat_id' => $chatid,
'voice' => $get_dl_music2['Results'][$music_number]['music_link'],
'caption' => $get_dl_music2['Results'][$music_number]['title'],
]);
} else {
bot('sendMessage', [
'chat_id' => $chatid,
'text' => "⚠️ ارتباط ناموفق.",
]);
}
}

elseif (strpos($text , "/farsi ") !== false or strpos($text , "/farsi") !== false) {
$messages = bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "درحال بررسی . . .",
'parse_mode'=>'Markdown', 
'reply_to_message_id'=>$message_id
])->result->message_id;
$textt = str_replace('/farsi ','',$text) or str_replace('/farsi','',$text); 
$texttt=urlencode($textt);
$tofarsi = file_get_contents("http://api.codebazan.ir/lang/google/?FROM=en&TO=fa&TEXT=$texttt");
bot('deletemessage', [
'chat_id' => $chat_id, 
'message_id' => $messages
]);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
$tofarsi
",
'parse_mode'=>'Markdown', 
  'reply_to_message_id'=>$message_id,
]);
}

elseif (strpos($text , "/english ") !== false or strpos($text , "/english") !== false) {
$messages = bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "درحال بررسی . . .",
'parse_mode'=>'Markdown', 
'reply_to_message_id'=>$message_id
])->result->message_id;
$textt = str_replace('/english ','',$text) or str_replace('/english','',$text); 
$texttt=urlencode($textt);
$toen = file_get_contents("http://api.codebazan.ir/lang/google/?FROM=fa&TO=en&TEXT=$texttt");
bot('deletemessage', [
'chat_id' => $chat_id, 
'message_id' => $messages
]);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
$toen
",
'parse_mode'=>'Markdown', 
  'reply_to_message_id'=>$message_id,
]);
}
//==========================================================//
//==========================================================//
elseif (strpos($text , "/photo") !== false or strpos($text , "/photo ") !== false) {
$messages = bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "درحال بررسی . . .",
'parse_mode'=>'Markdown', 
'reply_to_message_id'=>$message_id
])->result->message_id;
$mahanphp = str_replace('/photo ', '+', $text);
$pmk = file_get_contents ("https://api.rexagpt.site/API/image.php?text=$mahanphp");
$true = json_decode($pmk,true); 
for( $i=0; $i <=9; $i++){
$pamick = $true['images'][$i]['image_url']; 
$list[]=[ "type"=>"photo", "media" => "$pamick",]; 
}
bot('deletemessage', [
'chat_id' => $chat_id, 
'message_id' => $messages
]);
bot('sendMediaGroup',[
 'chat_id'=>$chat_id, 
'media'=>json_encode($list),
'reply_to_message_id' => $message_id,
]);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تصاویر شما با موفقیت ساخته و ارسال شد ✅
",
'parse_mode'=>'Markdown', 
  'reply_to_message_id'=>$message_id,
]);
}
//==========================================================//
elseif (strpos($text , "/man") !== false or strpos($text , "/man ") !== false) {
$messages = bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "درحال بررسی . . .",
'parse_mode'=>'Markdown', 
'reply_to_message_id'=>$message_id
])->result->message_id;
$replace = str_replace('/man ', '', $text);
$texte = urlencode($replace);
$manv = file_get_contents ("https://api.rexagpt.site/API/text-to-voice/index.php?text=$texte&type=FaridNeural");
$decode = json_decode ($manv);
$mb = $decode->result;
$url = "https://api.telegram.org/bot".API_KEY."/sendAudio";
bot('deletemessage', [
'chat_id' => $chat_id, 
'message_id' => $messages
]);
$post_fields = [
    'chat_id' => $chat_id,
    'audio' => $mb,
    'caption'=>"صدا ساخته شد ✅",
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
$output = curl_exec($ch);
curl_close($ch);
}
//==========================================================//
elseif (strpos($text , "/woman") !== false or strpos($text , "/woman ") !== false) {
$messages = bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "درحال بررسی . . .",
'parse_mode'=>'Markdown', 
'reply_to_message_id'=>$message_id
])->result->message_id;
$replace = str_replace('/woman ', '', $text);
$texte = urlencode($replace);
$manv = file_get_contents ("https://api.rexagpt.site/API/text-to-voice/index.php?text=$texte&type=DilaraNeural");
$decode = json_decode ($manv);
$mb = $decode->result;
$url = "https://api.telegram.org/bot".API_KEY."/sendAudio";
bot('deletemessage', [
'chat_id' => $chat_id, 
'message_id' => $messages
]);
$post_fields = [
    'chat_id' => $chat_id,
    'audio' => $mb,
    'caption'=>"صدا ساخته شد ✅",
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
$output = curl_exec($ch);
curl_close($ch);
}
//==========================================================//
if($text == "/panel" or $text == "▪️ منوی اصلی ▪️"){
if($tc == "private" ){
if(in_array($chat_id,$admins)){
step($chat_id,"none");
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"💒 به پنل مدیریتی ربات خوش آمدید.",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"▫️ پاکسازی لیست اسپم و مسدود ▫️",'callback_data'=>'delspam']],
 [['text'=>"📊 آمار کلی",'callback_data'=>'stats']],
 [['text'=>"❓ بلاک شخص",'callback_data'=>'black'],['text'=>"❔ آنبلاک شخص",'callback_data'=>'unblack']],
 [['text'=>"🤖 تایید جوین اجباری : $joinej",'callback_data'=>'setAuto']],
[['text'=>"📨 فوروارد به گروه ها",'callback_data'=>'forgp'],['text'=>"📨 فوروارد به کاربران",'callback_data'=>'foruser']],
[['text'=>"🗳 ارسال به گروه ها",'callback_data'=>'sendgp'],['text'=>"🗳 ارسال به کاربران",'callback_data'=>'senduser']],
[['text'=>"📝 تنظیم متن راهنما نصب گروه انگلیسی",'callback_data'=>'texthelpgroupen']],
[['text'=>"📮 ارسال به همه",'callback_data'=>'sendall'],['text'=>"📮 فوروارد به همه",'callback_data'=>'forall']],
[['text'=>"📝 تنظیم متن استارت انگلیسی",'callback_data'=>'textstarten']],
[['text'=>"📝 تنظیم متن جوین اجباری",'callback_data'=>'textjoin'],['text'=>"📝 تنظیم متن استارت",'callback_data'=>'textstart']],
   [['text'=>"📝 تنظیم چنل جوین اجباری یک",'callback_data'=>'channeljoin']],
[['text'=>"📝 تنظیم متن راهنما گروه",'callback_data'=>'texthelp'],['text'=>"📝 تنظیم متن راهنما نصب ربات",'callback_data'=>'texthelpgroup']],
[['text'=> "🖥 منوی استارت", 'callback_data'=>"back"]],]])
]); }}}

if($data == "stats" ){
$allhagh1 = count($database["ha"]["normal"]);
$allhagh2 = count($database["ha"]["normal"]["boy"]);
$allhagh3 = count($database["ha"]["normal"]["girl"]);
$alljorat1 = count($database["jo"]["normal"]);
$alljorat2 = count($database["jo"]["plus"]["boy"]);
$alljorat3 = count($database["jo"]["plus"]["girl"]);
$ex1 = explode("\n",$all_users);
$ex2 = explode("\n",$all_gaps);
$c1 = count($ex1)-1;
$c2 = count($ex2)-1;
$document = 'data/kalamat';
$scan = scandir($document);
$scan = array_diff($scan, ['.','..']);
$fil = count($scan);
$ca = count($admins);
$ver = phpversion();
$load = sys_getloadavg();
$mem = memory_get_usage();
$updates = json_decode(file_get_contents('php://input'));
$messages = $updates->message;
$texts = $messages->text;
$chat_ids = $messages->chat->id;
bot('answercallbackquery', [
        'callback_query_id' => $update->callback_query->id,
 'text'=>"📊 آمار ربات شما:

🚻 کاربران: $c1
👥 گروه ها: $c2
🛃 ادمین ها: $ca

❗️پینگ: $load[0]
❕ورژن php  هاست: $ver
❗️حافظه مصرفی: $mem
",
 'show_alert' => true
]);}


if($data == "back_p" ){
step($chatid,"none");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"💒 به منوی اصلی پنل مدیریت بازگشتید!",
 'parse_mode'=>"MarkDown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"▫️ پاکسازی لیست اسپم و مسدود ▫️",'callback_data'=>'delspam']],
 [['text'=>"📊 آمار کلی",'callback_data'=>'stats']],
 [['text'=>"❓ بلاک شخص",'callback_data'=>'black'],['text'=>"❔ آنبلاک شخص",'callback_data'=>'unblack']],
 [['text'=>"🤖 تایید جوین اجباری : $joinej",'callback_data'=>'setAuto']],
[['text'=>"📨 فوروارد به گروه ها",'callback_data'=>'forgp'],['text'=>"📨 فوروارد به کاربران",'callback_data'=>'foruser']],
[['text'=>"🗳 ارسال به گروه ها",'callback_data'=>'sendgp'],['text'=>"🗳 ارسال به کاربران",'callback_data'=>'senduser']],
[['text'=>"📝 تنظیم متن راهنما نصب گروه انگلیسی",'callback_data'=>'texthelpgroupen']],
[['text'=>"📮 ارسال به همه",'callback_data'=>'sendall'],['text'=>"📮 فوروارد به همه",'callback_data'=>'forall']],
[['text'=>"📝 تنظیم متن استارت انگلیسی",'callback_data'=>'textstarten']],
[['text'=>"📝 تنظیم متن جوین اجباری",'callback_data'=>'textjoin'],['text'=>"📝 تنظیم متن استارت",'callback_data'=>'textstart']],
[['text'=>"📝 تنظیم چنل جوین اجباری یک",'callback_data'=>'channeljoin']],
[['text'=>"📝 تنظیم متن راهنما گروه",'callback_data'=>'texthelp'],['text'=>"📝 تنظیم متن راهنما نصب ربات",'callback_data'=>'texthelpgroup']],
[['text'=> "🖥 منوی استارت", 'callback_data'=>"back"]],]]) ]); }

elseif($data == "setAutos" ){
if($offfer == "ON"){
file_put_contents("admin/offfer.txt","OFF");}
if($offfer == "OFF"){
file_put_contents("admin/offfer.txt","ON");}
$jofffers = file_get_contents("admin/offfer.txt");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>$textt,
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"▫️ پاکسازی لیست اسپم و مسدود ▫️",'callback_data'=>'delspam']],
 [['text'=>"📊 آمار کلی",'callback_data'=>'stats']],
 [['text'=>"❓ بلاک شخص",'callback_data'=>'black'],['text'=>"❔ آنبلاک شخص",'callback_data'=>'unblack']],
 [['text'=>"🤖 تایید جوین اجباری : $joinej",'callback_data'=>'setAuto']],
[['text'=>"📨 فوروارد به گروه ها",'callback_data'=>'forgp'],['text'=>"📨 فوروارد به کاربران",'callback_data'=>'foruser']],
[['text'=>"🗳 ارسال به گروه ها",'callback_data'=>'sendgp'],['text'=>"🗳 ارسال به کاربران",'callback_data'=>'senduser']],
[['text'=>"📝 تنظیم متن راهنما نصب گروه انگلیسی",'callback_data'=>'texthelpgroupen']],
[['text'=>"📮 ارسال به همه",'callback_data'=>'sendall'],['text'=>"📮 فوروارد به همه",'callback_data'=>'forall']],
[['text'=>"📝 تنظیم متن استارت انگلیسی",'callback_data'=>'textstarten']],
[['text'=>"📝 تنظیم متن جوین اجباری",'callback_data'=>'textjoin'],['text'=>"📝 تنظیم متن استارت",'callback_data'=>'textstart']],
   [['text'=>"📝 تنظیم چنل جوین اجباری یک",'callback_data'=>'channeljoin']],
[['text'=>"📝 تنظیم متن راهنما گروه",'callback_data'=>'texthelp'],['text'=>"📝 تنظیم متن راهنما نصب ربات",'callback_data'=>'texthelpgroup']],
[['text'=> "🖥 منوی استارت", 'callback_data'=>"back"]],
              ]
        ])
]); 
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "✅ تغییرات انجام شد .",
'show_alert' => false
]);}

elseif($data == "setAuto" ){
if($joinej == "ON"){
file_put_contents("admin/joinej.txt","OFF");}
if($joinej == "OFF"){
file_put_contents("admin/joinej.txt","ON");}
$joinejs = file_get_contents("admin/joinej.txt");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>$textt,
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"▫️ پاکسازی لیست اسپم و مسدود ▫️",'callback_data'=>'delspam']],
 [['text'=>"📊 آمار کلی",'callback_data'=>'stats']],
 [['text'=>"❓ بلاک شخص",'callback_data'=>'black'],['text'=>"❔ آنبلاک شخص",'callback_data'=>'unblack']],
 [['text'=>"🤖 تایید جوین اجباری : $joinejs",'callback_data'=>'setAuto']],
[['text'=>"📨 فوروارد به گروه ها",'callback_data'=>'forgp'],['text'=>"📨 فوروارد به کاربران",'callback_data'=>'foruser']],
[['text'=>"🗳 ارسال به گروه ها",'callback_data'=>'sendgp'],['text'=>"🗳 ارسال به کاربران",'callback_data'=>'senduser']],
[['text'=>"📝 تنظیم متن راهنما نصب گروه انگلیسی",'callback_data'=>'texthelpgroupen']],
[['text'=>"📮 ارسال به همه",'callback_data'=>'sendall'],['text'=>"📮 فوروارد به همه",'callback_data'=>'forall']],
[['text'=>"📝 تنظیم متن استارت انگلیسی",'callback_data'=>'textstarten']],
[['text'=>"📝 تنظیم متن جوین اجباری",'callback_data'=>'textjoin'],['text'=>"📝 تنظیم متن استارت",'callback_data'=>'textstart']],
   [['text'=>"📝 تنظیم چنل جوین اجباری یک",'callback_data'=>'channeljoin']],
[['text'=>"📝 تنظیم متن راهنما گروه",'callback_data'=>'texthelp'],['text'=>"📝 تنظیم متن راهنما نصب ربات",'callback_data'=>'texthelpgroup']],
[['text'=> "🖥 منوی استارت", 'callback_data'=>"back"]],
              ]
        ])
]); 
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "✅ تغییرات انجام شد .",
'show_alert' => false
]);}
    
if($data == "delint"){
deletefolder("data/int");
bot('answercallbackquery', [
        'callback_query_id' => $update->callback_query->id,
        'text' => "🗑️ لیست انتظار پاکسازی شد!",
        'show_alert' => true
    ]);}
if($data == "delspam"){
deletefolder("data/spam");
bot('answercallbackquery', [
        'callback_query_id' => $update->callback_query->id,
        'text' => "🗑️ لیست مسدود و اسپم پاکسازی شد!",
        'show_alert' => true
    ]);}
if($data == "delgp"){
deletefolder("data/gp");
bot('answercallbackquery', [
        'callback_query_id' => $update->callback_query->id,
        'text' => "🗑️ لیست گروه های درحال بازی پاکسازی شد!",
        'show_alert' => true
    ]);}
if($data == "delus"){
deletefolder("data/user");
bot('answercallbackquery', [
        'callback_query_id' => $update->callback_query->id,
        'text' => "🗑️ لیست کاربران در حال بازی پاکسازی شد!",
        'show_alert' => true
    ]);}

if($data == "forall" ){
step($chatid,"forall");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"📥 پیام را فوروارد کنید:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
    'inline_keyboard'=>[[['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],]])
]); }
elseif($user['step'] == "forall"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📳 در حال انجام، لطفا صبر کنید ...",
 'parse_mode'=>"MarkDown",
 ]); 
      $ex = explode("\n",$all_users);
    foreach($ex as $key){
bot('ForwardMessage',[
'chat_id'=>$key,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);}
 $exs = explode("\n",$all_gaps);
      foreach($exs as $key){
 bot('ForwardMessage',[
'chat_id'=>$key,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);}
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📑 پیام برای همه فوروارد شد!",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
              ]
       ]) ]);  } }


if($data == "channeljoin" ){
step($chatid,"channeljoin");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"📥 ایدی چنل خود را بدون @ بفرستید !!",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
              ]
        ]) ]); }
	elseif($user['step'] == "channeljoin"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
file_put_contents("admin/textchaneel.json",$text);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📑 جوین اجباری جدید با موفقیت تنظیم شد!",
 'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
]
]) ]);  } }

if($data == "texthelp" ){
step($chatid,"texthelp");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"📥 متن راهنما گروه ربات ارسال کنید:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
              ]
        ]) ]); }
	elseif($user['step'] == "texthelp"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
file_put_contents("admin/helptext.json",$text);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📑 متن جدید با موفقیت تنظیم شد!",
 'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
]
]) ]);  } }


if($data == "texthelpgroupen" ){
step($chatid,"texthelpgroupen");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"📥 متن راهنما نصب ربات رو ارسال کنید:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
              ]
        ]) ]); }
	elseif($user['step'] == "texthelpgroupen"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
file_put_contents("admin/helpgrouptexten.json",$text);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📑 متن جدید با موفقیت تنظیم شد!",
 'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
]
]) ]);  } }


if($data == "texthelpgroup" ){
step($chatid,"texthelpgroup");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"📥 متن راهنما نصب ربات رو ارسال کنید:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
              ]
        ]) ]); }
	elseif($user['step'] == "texthelpgroup"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
file_put_contents("admin/helpgrouptext.json",$text);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📑 متن جدید با موفقیت تنظیم شد!",
 'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
]
]) ]);  } }



if($data == "textstarten" ){
step($chatid,"textstarten");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"📥 متن استارت ربات ارسال کنید:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
              ]
        ]) ]); }
	elseif($user['step'] == "textstarten"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
file_put_contents("admin/starttexten.json",$text);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📑 متن جدید با موفقیت تنظیم شد!",
 'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
]
]) ]);  } }


if($data == "textstart" ){
step($chatid,"textstart");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"📥 متن استارت ربات ارسال کنید:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
              ]
        ]) ]); }
	elseif($user['step'] == "textstart"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
file_put_contents("admin/starttext.json",$text);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📑 متن جدید با موفقیت تنظیم شد!",
 'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
]
]) ]);  } }

if($data == "textjoin" ){
step($chatid,"textjoin");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"📥 متن جوین اجباری را ارسال کنید:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
              ]
        ]) ]); }
	elseif($user['step'] == "textjoin"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
file_put_contents("admin/jointext.json",$text);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📑 متن جدید با موفقیت تنظیم شد!",
 'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
]
]) ]);  } }

if($data == "sendall" ){
step($chatid,"sendall");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"📥 پیام را ارسال کنید:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
              ]
        ]) ]); }
	elseif($user['step'] == "sendall"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📳 در حال انجام، لطفا صبر کنید ...",
 'parse_mode'=>"MarkDown",
	 ]); 
              $ex = explode("\n",$all_users);
               foreach($ex as $key){
 bot('sendMessage',[
 'chat_id'=>$key,
 'text'=>$text,
   'disable_web_page_preview'=>true,
]);}
$exs = explode("\n",$all_gaps);
            foreach($exs as $key){
bot('sendMessage',[
 'chat_id'=>$key,
 'text'=>$text,
   'disable_web_page_preview'=>true,
]);}
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📑 پیام برای همه ارسال شد!",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
              ]
        ]) ]);  } }
if($data == "senduser" ){
step($chatid,"senduser");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"📥 پیام را ارسال کنید:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
              ]
        ]) ]); }
elseif($user['step'] == "senduser"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📳 در حال انجام، لطفا صبر کنید ...",
 'parse_mode'=>"MarkDown",
 ]); 
     $ex = explode("\n",$all_users);
      foreach($ex as $key){
  bot('sendMessage',[
 'chat_id'=>$key,
 'text'=>$text,
   'disable_web_page_preview'=>true,
]);}
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📑 پیام به همه کاربران ارسال شد!",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
              ]  ]) ]);  } }
if($data == "sendgp" ){
step($chatid,"sendgp");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"📥 پیام را ارسال کنید:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
  ]
  ])
 ]); }
elseif($user['step'] == "sendgp"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📳 در حال انجام، لطفا صبر کنید ...",
 'parse_mode'=>"MarkDown",
 ]); 
 $ex = explode("\n",$all_gaps);
 foreach($ex as $key){
 bot('sendMessage',[
 'chat_id'=>$key,
 'text'=>$text,
   'disable_web_page_preview'=>true,
]);}
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📑 پیام به همه گروه ها ارسال شد!",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
             ] ]) ]);  } }
if($data == "foruser" ){
step($chatid,"foruser");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"📥 پیام را فوروارد کنید:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
              ] ]) ]); }
elseif($user['step'] == "foruser"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📳 در حال انجام، لطفا صبر کنید ...",
 'parse_mode'=>"MarkDown", ]); 
   $ex = explode("\n",$all_users);
   foreach($ex as $key){
   bot('ForwardMessage',[
'chat_id'=>$key,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);}
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📑 پیام به همه کاربران فوروارد شد!",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
    [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
              ] ]) ]);  } }
if($data == "forgp" ){
step($chatid,"forgp");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"📥 پیام را فوروارد کنید:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
              ]
        ]) ]); }
elseif($user['step'] == "forgp"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📳 در حال انجام، لطفا صبر کنید ...",
 'parse_mode'=>"MarkDown",
 ]); 
  $ex = explode("\n",$all_gaps);
  foreach($ex as $key){
  bot('ForwardMessage',[
'chat_id'=>$key,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);}
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📑 پیام به همه گروه ها فوروارد شد!",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
              ]
       ]) ]);  } }
if($data == "unblack" ){
step($chatid,"unblack");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"🎓 شناسه کاربر را ارسال کنید:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
              ]
        ]) ]); }
elseif($user['step'] == "unblack"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
$newlist = str_replace($text, "", $blocklist);
file_put_contents("data/blocklist.txt", $newlist);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"🗑️ کاربر از بلاک لیست خارج شد!",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
              ]
        ]) ]); 
 bot('sendMessage',[
 'chat_id'=>$text,
 'text'=>"♥️ شما توسط میدیرت از لیست بلاک خارج شدید!",
 'parse_mode'=>"MarkDown",
	 ]);  } }
if($data == "black" ){
step($chatid,"black");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"🎓 شناسه کاربر را ارسال کنید:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
              ]
       ]) ]); }
elseif($user['step'] == "black"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
$adduser = file_get_contents("dataPaMicK/blocklist.txt");
$adduser .= $text . "\n";
file_put_contents("data/blocklist.txt", $adduser);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"🛡️ کاربر از ربات بلاک شد!",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
              ]
       ]) ]); 
 bot('sendMessage',[
 'chat_id'=>$text,
 'text'=>"💬 شما توسط مدیریت از ربات مسدود شدید!",
 'parse_mode'=>"MarkDown",
 ]);  } }
if($data == "delkalame" ){
step($chatid,"delkalame");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"🎓 کلمه مورد نظر را ارسال کنید:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
              ]
      ]) ]); }
elseif($user['step'] == "delkalame"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
if(file_exists("data/kalamat/$text.txt")){
unlink("data/kalamat/$text.txt");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"🗑️ کلمه ارسالی از لیست ربات حذف شد!",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[ [['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']],
 ]
       ])
 ]); 
}else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"🎓 این کلمه از قبل در ربات ثبت نشده!",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[[['text'=>"🏛 منوی اصلی️",'callback_data'=>'back_p']], ]  ]) ]);  } 
}}
//---- کامل -----//
?>