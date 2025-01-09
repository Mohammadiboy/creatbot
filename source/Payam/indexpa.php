<?php
/*
اپن شد توسط تیم پامیک : @PaMicK
اصکی میری منبع بزن
*/
//========================================================//
ob_start();
$load = sys_getloadavg();
$telegram_ip_ranges = [
['lower' => '149.154.160.0', 'upper' => '149.154.175.255'], 
['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],    
];
$ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
$ok=false;
foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
$lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
$upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
if($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) $ok=true;
}
if(!$ok) die("سیلام گوگاب (:");
//========================================================//
ini_set('error_logs','off');
error_reporting(0);
//========================================================//
define('API_KEY',"[TOKEN]"); //توکن ربات
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
}
/*
اپن شد توسط تیم پامیک : @PaMicK
اصکی میری منبع بزن
*/
//========================================================//
function SendMessage($chat_id, $text){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>'MarkDown']);
}
//========================================================//
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
function SendDocument($chatid,$document,$caption = null){
	bot('SendDocument',[
	'chat_id'=>$chatid,
	'document'=>$document,
	'caption'=>$caption
	]);
}
function pinChatMessage($chat_id){
bot('pinChatMessage',[
'chat_id'=>$chat_id,
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
//========================================================//
function Forward($kojashe, $azkoja, $kodommsg){
bot('forwardmessage',[
'chat_id'=>$kojashe,
'from_chat_id'=>$azkoja,
'message_id'=>$kodommsg
]);
}
/*
اپن شد توسط تیم پامیک : @PaMicK
اصکی میری منبع بزن
*/
//========================================================//
function Ziper($folder_to_zip_path, $destination_zip_file_path){
$rootPath = realpath($folder_to_zip_path);
$zip = new ZipArchive();
$zip->open($destination_zip_file_path, ZipArchive::CREATE | ZipArchive::OVERWRITE);
$files = new RecursiveIteratorIterator(
new RecursiveDirectoryIterator($rootPath),
RecursiveIteratorIterator::LEAVES_ONLY);
foreach ($files as $name => $file){
if(!$file->isDir()){
$filePath = $file->getRealPath();
$relativePath = substr($filePath, strlen($rootPath) + 1);
$zip->addFile($filePath, $relativePath);
}
}
$zip->close();
}
//========================================================//
function getMUsage(){
     $mem = memory_get_usage();
     $kb = $mem / 1024;
return substr($kb, 0, -5).' KB';
}

function convert($string) {
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];
    $num = range(0, 9);
    $convertedPersianNums = str_replace($persian, $num, $string);
    $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);
    return $englishNumbersOnly;
}
//========================================================//
$update = json_decode(file_get_contents('php://input'));
//========================================================//
$admin = [ADMIN]; //ایدی عددی ادمین
$token = "[TOKEN]"; //توکن ربات
$PaMicKee = "[BOTIDD]"; //ایدی ربات
$channel = "[CHANNEL]";
//========================================================//
if(isset($update->message)){
$message = $update->message;
$message_id = $message->message_id;
$text = convert($message->text);
$chat_id = $message->chat->id;
$tc = $message->chat->type;
$first_name = $message->from->first_name;
$from_id = $message->from->id;
$text1 = $update->message->text;
}

$first_name = $update->message->from->first_name;
$last_name = $update->message->from->last_name;
$username = $update->message->from->username;
$dataPaMicK = $update->callback_query->dataPaMicK;

$step = file_get_contents("dataPaMicK/$from_id/step.txt");
@$onof = file_get_contents("dataPaMicK/onof.txt");
$eshterk = file_get_contents("eshterk.txt");
$Lock = file_get_contents("admin/Lock.txt");
$blocklist = file_get_contents("dataPaMicK/blocklist.txt");
$forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$channel&user_id=".$from_id));
$tch = $forchaneel->result->status;
$forchaneel1 = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$channel1&user_id=".$from_id));
$tch1 = $forchaneel1->result->status;
/*
اپن شد توسط تیم پامیک : @PaMicK
اصکی میری منبع بزن
*/
//========================================================//
mkdir("admin");
mkdir("dataPaMicK");
mkdir("dataPaMicK/$from_id");
//========================================================//
if(file_exists("admin/adminposh.txt")){
$adminposh = file_get_contents("admin/adminposh.txt");
}else{
$adminposh = "000000000";
}
if(file_exists("admin/textstarttt.txt")){
$textstarttt = file_get_contents("admin/textstarttt.txt");
$textstarttt = str_replace('ID',$from_id,$textstarttt);
}else{
$textstarttt = "متن استارت تنظیم نشده است ! 📝";
}
//========================================================//
if(file_exists("admin/textback.txt")){
$textback = file_get_contents("admin/textback.txt");
$textback = str_replace('ID',$from_id,$textback);
}else{
$textback = "متن برگشت تنظیم نشده است ! 🔙";
}
//========================================================//
if(file_exists("admin/textspanser.txt")){
$textspanser = file_get_contents("admin/textspanser.txt");
$textspanser = str_replace('ID',$from_id,$textspanser);
}else{
$textspanser = "متن اسپانسر تنظیم نشده است ! 👔";
}
//========================================================//
if(file_exists("admin/textersal.txt")){
$textersal = file_get_contents("admin/textersal.txt");
$textersal = str_replace('ID',$from_id,$textersal);
}else{
$textersal = "متن ارسال پیام تنظیم نشده است ! 📝";
}
//========================================================//
if(file_exists("admin/textresid.txt")){
$textresid = file_get_contents("admin/textresid.txt");
$textresid = str_replace('ID',$from_id,$textresid);
}else{
$textresid = "متن رسید پیام تنظیم نشده است ! 🗳";
}

if(strpos($text, '"') !== false or strpos($text, '#') !== false or strpos($text, '<') !== false or strpos($text, '>') !== false or strpos($text, '&') !== false or strpos($text, '{{') !== false or strpos($text, '}') !== false or strpos($text, '#') !== false or strpos($text, '{') !== false or strpos($text, '(') !== false or strpos($text, '(') !== false or strpos($text, '{{') !== false or strpos($text, '$') !== false or strpos($text, 'function') !== false){ 
exit;
}

if(strpos($blocklist, "$from_id") !== false){
exit;
}else{
function Spam($from_id){
@mkdir("dataPaMicK/spam");
$spam_status = json_decode(file_get_contents("dataPaMicK/spam/$from_id.json"),true);
if($spam_status != null){
if(mb_strpos($spam_status[0],"time") !== false){
if(str_replace("time ",null,$spam_status[0]) >= time())
exit(false);
else
$spam_status = [1,time()+2];
}
elseif(time() < $spam_status[1]){
if($spam_status[0]+1 > 3){
$time = time() + 60;
$spam_status = ["time $time"];
file_put_contents("dataPaMicK/spam/$from_id.json",json_encode($spam_status,true));
bot('SendMessage',[
'chat_id'=>$from_id,
'text'=>"❗️ شما به دلیل اسپم به مدت 60 ثانیه از ربات بلاک شدید."
]);
exit(false);
}else{
$spam_status = [$spam_status[0]+1,$spam_status[1]];
}
}else{
$spam_status = [1,time()+2];
}
}else{
$spam_status = [1,time()+2];
}
file_put_contents("dataPaMicK/spam/$from_id.json",json_encode($spam_status,true));
}}
Spam($from_id);
//========================================================//
if($onof == "off" && $from_id != $admin){
bot('sendmessage', [
'chat_id' => $chat_id,
'text' =>"
ربات برای آپدیت جدید خاموش میباشد 🛃
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "اطلاع رسانی ربات |🛃|", 'url' => "https://t.me/$channel"]]
]
])
]);
exit();
}
/*
اپن شد توسط تیم پامیک : @PaMicK
اصکی میری منبع بزن
*/
//========================================================//
if($tch != 'member' && $tch != 'creator' && $tch != 'administrator' && $tch1 != 'member' && $tch1 != 'creator' && $tch1 != 'administrator' && $Lock == "on" && $from_id != $Dev){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
برای استفاده از ربات اول عضو کانالمون شو 🫶

@$channel 

🔓 اگه جوین شدی دوباره رباتو استارت کن برات باز بشه /start
",
'parse_mode'=>"HTML",
]);
exit();
}
/*
اپن شد توسط تیم پامیک : @PaMicK
اصکی میری منبع بزن
*/
//========================================================//
if($text == '/start'){
$user = file_get_contents('MMBER.txt');
$members = explode("\n",$user);
if (!in_array($chat_id,$members)){
$add_user = file_get_contents('MMBER.txt');
$add_user .= $chat_id."\n";
file_put_contents('MMBER.txt',$add_user);
}
file_put_contents("dataPaMicK/$chat_id/Pamick.txt", "no");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textstarttt",'parse_mode' => "HTML",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پشتیبانی ربات 👩🏻‍💻"]],
[['text'=>"حساب کاربری 🔐"],['text'=>"اسپانسر ربات 👔"]],
],
'resize_keyboard'=>true,
  'selective' => true,
  ])
]);
bot('sendMessage',[   
'chat_id'=>$admin,
'text'=>"
🧜‍♂️ Fʀᴇᴅ [$first_name](tg://user?id=$chat_id) Sᴛᴀʀᴛᴇᴅ Tʜᴇ Rᴏʙᴏᴛ 

💫 id : $chat_id
",   
'parse_mode'=>'MarkDown'   
]);
}
//========================================================//
elseif($text == "🔙 بازگشت" or $text == "🔙 بازگشت️"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textback",
'parse_mode'=>"HTML",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پشتیبانی ربات 👩🏻‍💻"]],
[['text'=>"حساب کاربری 🔐"],['text'=>"اسپانسر ربات 👔"]],
],
'resize_keyboard'=>true,
])
]);
file_put_contents("dataPaMicK/$from_id/step.txt","none");
}
//========================================================//
elseif($text =="پشتیبانی ربات 👩🏻‍💻"){
$reree=file_get_contents("admin/poshtibanii.txt");
if($reree=='on'){
file_put_contents("dataPaMicK/$from_id/step.txt","pvresan");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
$textersal
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙 بازگشت️"]],
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
/*
اپن شد توسط تیم پامیک : @PaMicK
اصکی میری منبع بزن
*/
elseif($step == "pvresan" && $text !="🔙 بازگشت️" && $text != "پیام به کاربر 👤"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textresid",
]);
bot('ForwardMessage',[
'chat_id'=>$admin,
'from_chat_id'=>$from_id,
'message_id'=>$message_id
]);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"
🔱 پیام جدیدی ارسال شد

🔢 آیدی عددی ارسال کننده : $from_id
🚸 نام ارسال کننده : $first_name
🔰 یوزرنیم ارسال کننده : @$username
یوزرنیم خالی بود یعنی کاربر ندارد
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'پیام به کاربر 👤']],
[['text'=>"🔙 بازگشت"]],
],
'resize_keyboard'=>true,
])
]);
}
//========================================================//
elseif($text == "اسپانسر ربات 👔"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$textspanser",
'parse_mode'=>"HTML",  
]);
}
elseif($text == "/creator"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ساخته شده توسط🧑‍💻 : @LoTariee",
]);
}
//========================================================//
elseif($text == 'پینگ ربات 🗂' ){
$starttime = microtime(true);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"♻️ در حال بارگزاری اطلاعات و پینگ ...",
'parse_mode'=>"HTML",
]);
$endtime = (microtime(true) - $starttime);
$telegram_ping = substr($endtime, 0, -11);
$domain = $_SERVER['SERVER_NAME'];
$load = sys_getloadavg();
$mem = getMUsage();
$ver = phpversion();
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"اطلاعات دریافت شد ✅

🚀 پینگ تلگرام : $telegram_ping ms
📉 پینگ ربات : $load[0]
📌 ورژن پی اچ پی : $ver
📁 میزان مصرف حافظه : $mem
",
'parse_mode'=>"HTML",
]);
}
/*
اپن شد توسط تیم پامیک : @PaMicK
اصکی میری منبع بزن
*/
//========================================================//
elseif($text == "حساب کاربری 🔐"){
$profile = "https://telegram.me/$username";
 bot('sendphoto',[
'chat_id' => $chat_id,
'photo'=>$profile,
'caption' =>"عکس پروفایل شما 👆

👮‍♂ نام شما : $first_name
🚸 نام خانوادگی شما : $last_name
🔰 ایدی شما : @$username
🆔 ایدی عددی شما : $chat_id

",
'reply_to_message_id'=>$message_id,
	 ]); 
	}

//========================================================//
elseif($text == "/panel" or $text == "پنل" or $text == "موافق نیستم ✅"){
if($from_id == $admin){
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"مدیر عزیز به پنل مدیریت خوش آمدید 🌹",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⚙️ دیگر تنظیمات ربات"],['text'=>"📊 بخش آمار گیری 📊"]],
[['text'=>"بخش خاموش روشن 😴"],['text'=>"✍️ بخش تنظیم متن"]],
[['text'=>"پینگ ربات 🗂"]],
[['text'=>"پیام همگانی 📨"],['text'=>"📮 مدیریت کاربران"]],
[['text'=>"🔙 بازگشت"]],  
],
'resize_keyboard'=>true
])
]);
file_put_contents("dataPaMicK/$from_id/step.txt","none");
}else{
sendMessage($chat_id,"شما ادمین نیستی که 😐","HTML");
}
}

elseif($text == "⚙️ دیگر تنظیمات ربات"){
if($from_id == $admin){
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"مدیر عزیز به پنل مدیریت خوش آمدید 🌹",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"حذف لیست بلاکی ها 🌀"]], 
[['text'=> "حذف اسپم ها 🌀"],['text'=>"حذف دیتا ربات 🤖"]],
[['text'=>"پنل"]],  
],
'resize_keyboard'=>true
])
]);
file_put_contents("dataPaMicK/$from_id/step.txt","none");
}else{
sendMessage($chat_id,"شما ادمین نیستی که 😐","HTML");
}
}

elseif($text == "حذف دیتا ربات 🤖"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text' =>"با این کار تمامی متن های تنظیم شده و تنظیمات خاموش روشن پاک خواهند شد ایا موافق هستید؟؟!!",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"موافق نیستم ✅"],['text'=>"بله موافقم 📛"]],
[['text'=>"پنل"]],  
],
'resize_keyboard'=>true
])
]);
}

elseif($text == "بله موافقم 📛"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"کل دیتا (تنظیمات متن ها) ریست شد !!",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"حذف لیست بلاکی ها 🌀"]], 
[['text'=> "حذف اسپم ها 🌀"],['text'=>"حذف دیتا ربات 🤖"]],
[['text'=>"پنل"]],  
],
'resize_keyboard'=>true
])
]);
file_put_contents("dataPaMicK/$from_id/step.txt","none");
deleteFolder('admin');
sleep('2');
mkdir('admin');
}

elseif($text == "حذف لیست بلاکی ها 🌀"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لیست بلاکی ها با موفقیت حذف شدند✅",
]);
deleteFolder('dataPaMicK/blocklist.txt');
}

elseif($text == "حذف اسپم ها 🌀"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اسپم ها با موفقیت حذف شدند✅",
]);
deleteFolder('dataPaMicK/spam');
sleep('2');
mkdir('dataPaMicK/spam');
}


elseif($text == "بخش خاموش روشن 😴"){
if($from_id == $admin){
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"مدیر عزیز به پنل مدیریت خوش آمدید 🌹",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"ربات روشن ✅"],['text'=>"ربات خاموش 📛"]],
[['text'=>"جوین روشن 🔑"],['text'=>"جوین خاموش 🔒"]],
[['text'=>"پشتیبانی روشن 👤"],['text'=>"پشتیبانی خاموش 👤"]],
[['text'=>"پنل"]],  
],
'resize_keyboard'=>true
])
]);
file_put_contents("dataPaMicK/$from_id/step.txt","none");
}else{
sendMessage($chat_id,"شما ادمین نیستی که 😐","HTML");
}
}

//========================================================//
elseif($text == "جوین خاموش 🔒"&& $from_id == $admin){
file_put_contents("admin/Lock.txt","off");
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"جوین با موفقیت خاموش شد 🔒",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"ربات روشن ✅"],['text'=>"ربات خاموش 📛"]],
[['text'=>"جوین روشن 🔑"],['text'=>"جوین خاموش 🔒"]],
[['text'=>"پشتیبانی روشن 👤"],['text'=>"پشتیبانی خاموش 👤"]],
[['text'=>"پنل"]],  
],
])
]);
}
//========================================================//
elseif($text == "جوین روشن 🔑"&& $from_id == $admin){
file_put_contents("admin/Lock.txt","on");
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"جوین با موفقیت روشن شد 🔑",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"ربات روشن ✅"],['text'=>"ربات خاموش 📛"]],
[['text'=>"جوین روشن 🔑"],['text'=>"جوین خاموش 🔒"]],
[['text'=>"پشتیبانی روشن 👤"],['text'=>"پشتیبانی خاموش 👤"]],
[['text'=>"پنل"]],  
],
])
]);
}

elseif($text == "✍️ بخش تنظیم متن"){
if($from_id == $admin){
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"مدیر عزیز به پنل مدیریت خوش آمدید 🌹",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"متن بازگشت ✍"],['text'=>"متن استارت ✍"]],
[['text'=>"متن رسید پشتیبانی ✍"]],
[['text'=>"متن ارسال پشتیبانی ✍"],['text'=>"متن اسپانسر ✍"]],
[['text'=>"پنل"]],  
],
'resize_keyboard'=>true
])
]);
file_put_contents("dataPaMicK/$from_id/step.txt","none");
}else{
sendMessage($chat_id,"شما ادمین نیستی که 😐","HTML");
}
}

elseif($text == "👤 بخش ادمین ها و کانال ها 📋"){
if($from_id == $admin){
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"مدیر عزیز به پنل مدیریت خوش آمدید 🌹",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔐 لیست کانال های جوین اجباری 🔐"]],
[['text'=>"تنظیم جوین دوم 🔐"],['text'=>"تنظیم جوین اول 🔐"]],
[['text'=>"پنل"]],  
],
'resize_keyboard'=>true
])
]);
file_put_contents("dataPaMicK/$from_id/step.txt","none");
}else{
sendMessage($chat_id,"شما ادمین نیستی که 😐","HTML");
}
}


elseif($text == "📮 مدیریت کاربران"){
if($from_id == $admin){
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"مدیر عزیز به پنل مدیریت خوش آمدید 🌹",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پیام به کاربر 👤"]],
[['text'=>"بلاک کاربر ✅"],['text'=>"انبلاک کاربر 📛"]],
[['text'=>"پنل"]],  
],
'resize_keyboard'=>true
])
]);
file_put_contents("dataPaMicK/$from_id/step.txt","none");
}else{
sendMessage($chat_id,"شما ادمین نیستی که 😐","HTML");
}
}
/*
اپن شد توسط تیم پامیک : @PaMicK
اصکی میری منبع بزن
*/
//========================================================//
elseif($text == "پیام به کاربر 👤"){
file_put_contents("dataPaMicK/$from_id/step.txt","idnum1");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ایدی عددی کاربر رو ارسال کن 🆔",
'parse_mode'=>"HTML",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/panel️"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($step == "idnum1" && $text !="/panel️" ){
file_put_contents("dataPaMicK/$from_id/step.txt","sendpem");
file_put_contents("dataPaMicK/$from_id/idnum.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا پیام خودتو ارسال کن 📝",
'parse_mode'=>"HTML",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/panel️"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($step == "sendpem" && $text !="/panel️" ){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
file_put_contents("dataPaMicK/$from_id/ersalpm.txt","$text");
$ersalpm = file_get_contents("dataPaMicK/$from_id/ersalpm.txt");
$info = file_get_contents("dataPaMicK/$from_id/idnum.txt");
bot('sendMessage',[
'chat_id'=>$info,
'text'=>"
شما یه پیام از پشتیبانی دریافت کرده اید 🔰

پیام مدیر : $ersalpm 
 
",
'parse_mode'=>'HTML',
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام شما با موفقیت برای کاربر ارسال شد 👮‍♂️",
'parse_mode'=>"HTML",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'پیام به کاربر 👤']],
[['text'=>"/panel"]],
],
'resize_keyboard'=>true,
])
]);
}
//========================================================//
elseif($text == "متن بازگشت ✍" && $chat_id == $admin){
file_put_contents("dataPaMicK/$from_id/step.txt","textback");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❗ متن برگشت را ارسال کنید
ID ایدی عددی کاربر
",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($step =="textback" && $text !="پنل" ){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
file_put_contents("admin/textback.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد 📂",
]);
}
/*
اپن شد توسط تیم پامیک : @PaMicK
اصکی میری منبع بزن
*/
//========================================================//
elseif($text == "پشتیبانی خاموش 👤"&& $from_id == $admin){
file_put_contents("admin/poshtibanii.txt","off");
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"پشتیبانی با موفقیت خاموش شد 👤",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"ربات روشن ✅"],['text'=>"ربات خاموش 📛"]],
[['text'=>"جوین روشن 🔑"],['text'=>"جوین خاموش 🔒"]],
[['text'=>"پشتیبانی روشن 👤"],['text'=>"پشتیبانی خاموش 👤"]],
[['text'=>"پنل"]],  
],
])
]);
}
//========================================================//
elseif($text == "پشتیبانی روشن 👤"&& $from_id == $admin){
file_put_contents("admin/poshtibanii.txt","on");
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"پشتیبانی با موفقیت روشن شد 👤",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"ربات روشن ✅"],['text'=>"ربات خاموش 📛"]],
[['text'=>"جوین روشن 🔑"],['text'=>"جوین خاموش 🔒"]],
[['text'=>"پشتیبانی روشن 👤"],['text'=>"پشتیبانی خاموش 👤"]],
[['text'=>"پنل"]],  
],
])
]);
}
//========================================================//
elseif($text == "ربات خاموش 📛"&& $from_id == $admin){
file_put_contents("dataPaMicK/onof.txt","off");
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ربات با موفقیت خاموش شد 📛",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"ربات روشن ✅"],['text'=>"ربات خاموش 📛"]],
[['text'=>"جوین روشن 🔑"],['text'=>"جوین خاموش 🔒"]],
[['text'=>"پشتیبانی روشن 👤"],['text'=>"پشتیبانی خاموش 👤"]],
[['text'=>"پنل"]],  
],
])
]);
}
//========================================================//
elseif($text == "ربات روشن ✅"&& $from_id == $admin){
file_put_contents("dataPaMicK/onof.txt","on");
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ربات با موفقیت روشن شد ✅",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"ربات روشن ✅"],['text'=>"ربات خاموش 📛"]],
[['text'=>"جوین روشن 🔑"],['text'=>"جوین خاموش 🔒"]],
[['text'=>"پشتیبانی روشن 👤"],['text'=>"پشتیبانی خاموش 👤"]],
],
])
]);
}
//========================================================//
elseif($text == "متن استارت ✍" && $chat_id == $admin){
file_put_contents("dataPaMicK/$from_id/step.txt","textstarttt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❗ متن استارت را ارسال کنید
ID ایدی عددی کاربر
",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($step =="textstarttt" && $text !="پنل" ){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
file_put_contents("admin/textstarttt.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد 📂",
]);
}
//========================================================//
elseif($text == "متن اسپانسر ✍" && $chat_id == $admin){
file_put_contents("dataPaMicK/$from_id/step.txt","textspanser");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❗ متن اسپانسر را ارسال کنید
ID ایدی عددی کاربر
",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($step =="textspanser" && $text !="پنل" ){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
file_put_contents("admin/textspanser.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد 📂",
]);
}
//========================================================//
elseif ($text == "📊 بخش آمار گیری 📊"){
$user = file_get_contents("MMBER.txt");
$member_id = explode("\n",$user);
$member_count = count($member_id) -1;
$user1 = file_get_contents("dataPaMicK/blocklist.txt");
$member_id1 = explode("\n",$user1);
$member_count1 = count($member_id1) -1;
bot('sendMessage',[
'chat_id' => $admin,
'text' => "
👤 تعداد اعضای ربات : $member_count
❌ تعداد اعضای بلاک شده : $member_count1
",
'parse_mode' => 'HTML'
]);
}
//========================================================//
elseif($text == "متن رسید پشتیبانی ✍" && $chat_id == $admin){
file_put_contents("dataPaMicK/$from_id/step.txt","textresid");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❗ متن استارت را ارسال کنید
ID ایدی عددی کاربر
",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($step =="textresid" && $text !="پنل" ){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
file_put_contents("admin/textresid.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد 📂",
]);
}
//========================================================//
elseif($text == "متن ارسال پشتیبانی ✍" && $chat_id == $admin){
file_put_contents("dataPaMicK/$from_id/step.txt","textersal");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❗ متن اسپانسر را ارسال کنید
ID ایدی عددی کاربر
",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پنل"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($step =="textersal" && $text !="پنل" ){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
file_put_contents("admin/textersal.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد 📂",
]);
}
/*
اپن شد توسط تیم پامیک : @PaMicK
اصکی میری منبع بزن
*/
elseif($text == "پیام همگانی 📨"){
file_put_contents("dataPaMicK/$from_id/step.txt","pm");
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"📨 | پیام خود را ارسال کنید !",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'پنل']],
],
'resize_keyboard'=>true
])
]);
}
elseif($step == "pm" && $text != "پنل"){
file_put_contents("dataPaMicK/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"📥 | پیام شما با موفقیت ارسال شد !",
]);
$all_member = fopen( "MMBER.txt", "r");
while( !feof( $all_member)){
$user = fgets( $all_member);
sendMessage($user,$text,"html");
}
}

elseif($text == "بلاک کاربر ✅" && $chat_id == $admin){
file_put_contents("dataPaMicK/$from_id/step.txt","shar");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ایدی فرد مورد نظر را ارسال کنید",
]);
}
elseif($step == "shar" && $text !="🔙" ){
file_put_contents("dataPaMicK/$from_id/shar.txt","$text");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
کاربر $text از با موفقیت بلاک شد 😏
",
]);
$adduser = file_get_contents("dataPaMicK/blocklist.txt");
$adduser .= $text . "\n";
file_put_contents("dataPaMicK/blocklist.txt", $adduser);
file_put_contents("dataPaMicK/$from_id/step.txt","no");
$id11 = file_get_contents("dataPaMicK/$from_id/shar.txt");
bot('Sendmessage',[
'chat_id'=>$id11,
'text'=>"ارتباط شما با ربات به دلیل زیرپا گذاشتن قوانین ربات قطع شد ⛔️",
]);
}

elseif($text == "انبلاک کاربر 📛" && $chat_id == $admin){
file_put_contents("dataPaMicK/$from_id/step.txt","sharr");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ایدی عددی کاربر مورد نظر رو ارسال کنید",
]);
}
elseif($step == "sharr" && $text !="🔙" ){
$newlist = str_replace($text, "", $blocklist);
file_put_contents("dataPaMicK/blocklist.txt", $newlist);
file_put_contents("dataPaMicK/$chat_id/step.txt", "No");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
کاربر $text از بلاکی درامد 🫤
",
]);
bot('Sendmessage',[
'chat_id'=>$text,
'text'=>"ارتباط شما با ربات مجدد فعال شد ✅",
]);
}
//========================================================//
/*
اپن شد توسط تیم پامیک : @PaMicK
اصکی میری منبع بزن
*/
unlink('error_log');
?>