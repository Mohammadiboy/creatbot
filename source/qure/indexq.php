<?php
//============================================================//
ob_start();
error_reporting(E_ALL);
date_default_timezone_set('Asia/Tehran');
$telegram_ip_ranges = [
['lower' => '149.154.160.0', 'upper' => '149.154.175.255'],
['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],];
$ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
$ok=false;
foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
$lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
$upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
if($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) $ok=true;}
if(!$ok) die("Fuck You :)");
//============================================================//
$Api_Token    = "[TOKEN]"; // توکن بات
$adminbot     = "[ADMIN]"; // ایدی عددی ادمین اصلی
$channel      = "[CHANNEL]"; // چنل بدون @ بزارید
$chnumber85   = "100[IDCHANNEL]"; // ایدی عددی کانال
$baner        = '[BANER]'; // لینک بنر زیرمجموعه گیری           
//============================================================//
define('API_KEY',$Api_Token);
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
        return json_decode($res);
    }
}
//============================================================//
function Zip($fzip, $zips){
    $rootPath = realpath($fzip);
    $zip = new ZipArchive();
    $zip->open($zips, ZipArchive::CREATE | ZipArchive::OVERWRITE);
    $files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY);
    foreach($files as $name => $file){
        if(!$file->isDir()){
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($rootPath) + 1);
            $zip->addFile($filePath, $relativePath);}}
            $zip->close();
}
function SendDocument($chat_id, $document, $caption = null){
    bot('SendDocument',[
        'chat_id'=>$chat_id,
        'document'=>$document,
        'caption'=>$caption
    ]);
}
function sendphoto($chat_id, $photo, $caption){
    bot('sendphoto',[
    'chat_id'=>$chat_id,
    'photo'=>$photo,
    'caption'=>$caption,
    ]);
}
function DeleteFolder($path){
    if($handle=opendir($path)){
    while (false!==($file=readdir($handle))){
    if($file<>"." AND $file<>".."){
    if(is_file($path.'/'.$file)){
    @unlink($path.'/'.$file);
    }
    if(is_dir($path.'/'.$file)) {
    deletefolder($path.'/'.$file);
    @rmdir($path.'/'.$file);
    }
    }
    }
    }
}
function IranTime(){
    date_default_timezone_set("Asia/Tehran");
    return date('H:i:s');
}
function IranDate(){
    date_default_timezone_set("Asia/Tehran");
   return date('Y/m/d');
}
function GetMe(){
    return Bot('getMe');
}
$botxd = GetMe(); 
$botid = getMe() -> result -> username; 
$botname = getMe() -> result -> first_name; 
$botusername = getMe() -> result -> username;
$botxdteam = getMe() -> result -> id;
//============================================================//
$update = json_decode(file_get_contents('php://input'));
if (isset($update->message)) {
$message = $update->message;
$text = $message->text;
$tc = $message->chat->type;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$message_id = $message->message_id;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$photo = $message->photo;
$caption = $message->caption;
$contact = $message->contact;
$contactid = $contact->user_id;
$contactnum = $contact->phone_number;
$username = $message->from->username;
}
//============================================================//
if (isset($update->callback_query)) {
$callback_query = $update->callback_query;
$data = $callback_query->data;
$tc = $callback_query->message->chat->type;
$chatid = $callback_query->message->chat->id;
$fromid = $callback_query->from->id;
$messageid = $callback_query->message->message_id;
$firstname = $callback_query->from->first_name;
$lastname = $callback_query->from->last_name;
$cusername = $callback_query->from->username;
$callbackid = $callback_query->id;
$calltext = $callback_query->message->text;
}
//============================================================//
$fid = $from_id    ??  $fromid;
$cid = $chat_id    ??  $chatid;
$time = iranTime();
$date = iranDate();
$ver = phpversion();  
$admins = array("$adminbot");
$banme = file_get_contents("data/$from_id/ban.txt");
$step = file_get_contents("data/$fid/step.txt");
$coin = file_get_contents("data/$from_id/coin.txt");
$memberxd = file_get_contents("data/$from_id/mems.txt");
$linkmember = "http://t.me/$botusername?start=$from_id";
//============================================================//
mkdir("data");
mkdir("data/$from_id");
mkdir("admin");
//============================================================//
if(file_exists("admin/starttext.txt")){
$starttext = file_get_contents("admin/starttext.txt");
}else{
$starttext = "متن استارت تنظیم نشده است 📝";
}
//============================================================//
if(file_exists("admin/jointext.txt")){
$jointext = file_get_contents("admin/jointext.txt");
}else{
$jointext = "متن جوین اجباری تنظیم نشده است 📝";
}
//============================================================//
if(file_exists("admin/offertext.txt")){
$offertext = file_get_contents("admin/offertextd.txt");
}else{
$offertext = "متن خاموشی ربات تنظیم نشده است 📝";
}
//============================================================//
if(file_exists("admin/referaltext.txt")){
$referaltext = file_get_contents("admin/referaltext.txt");
$referaltext = str_replace('LINK',$linkmember,$referaltext);
}else{
$referaltext = "متن زیرمجموعه گیری تنظیم نشده است 📝";
}
//============================================================//
if(file_exists("admin/backtext.txt")){
$backtext = file_get_contents("admin/backtext.txt");
}else{
$backtext = "متن بازگشت ربات تنظیم نشده است 📝";
}
//============================================================//
if(file_exists("admin/coingroupi.txt")){
$coingroupi = file_get_contents("admin/coingroupi.txt");
}else{
$coingroupi = "1";
}
//============================================================//
if(file_exists("admin/coinreferale.txt")){
$coinreferale = file_get_contents("admin/coinreferale.txt");
}else{
$coinreferale = "1";
}
//============================================================//
if(file_exists("admin/coinkamentie.txt")){
$coinkamentie = file_get_contents("admin/coinkamentie.txt");
}else{
$coinkamentie =  "1";
}
//============================================================//
if(file_exists("admin/banerrefral.txt")){
$banerrefral = file_get_contents("admin/banerrefral.txt");
}else{
$banerrefral = "https://t.me/PaMicKWeb/139";
}
//============================================================//
if(file_exists("admin/hesabtext.txt")){
$hesabtext = file_get_contents("admin/hesabtext.txt");
$hesabtext = str_replace('NAME',$first_name,$hesabtext);
$hesabtext = str_replace('ID',$chat_id,$hesabtext);
$hesabtext = str_replace('COIN',$coin,$hesabtext);
$hesabtext = str_replace('MEMBER',$memberxd,$hesabtext);
}else{
$hesabtext = "متن حساب کاربری ربات تنظیم نشده است 📝";
}
//============================================================//
if(file_exists("admin/quregroupi.txt")){
$quregroupi = file_get_contents("admin/quregroupi.txt");
}else{
$quregroupi = "🏆 قرعه کشی گروهی";
}
//============================================================//
if(file_exists("admin/quretakie.txt")){
$quretakie = file_get_contents("admin/quretakie.txt");
}else{
$quretakie = "🏆 قرعه کشی تک";
}
//============================================================//
if(file_exists("admin/qurekament.txt")){
$qurekament = file_get_contents("admin/qurekament.txt");
}else{
$qurekament = "🏆 قرعه کشی کامنتی";
}
//============================================================//
if(file_exists("admin/hesabkarbarei.txt")){
$hesabkarbarei = file_get_contents("admin/hesabkarbarei.txt");
}else{
$hesabkarbarei = "👤 اطلاعات شما";
}
//============================================================//
if(file_exists("admin/afzayeshmojody.txt")){
$afzayeshmojody = file_get_contents("admin/afzayeshmojody.txt");
}else{
$afzayeshmojody = "➕ افزایش موجودی";
}
//============================================================//
$starttxt    ="$starttext";
//============================================================//
if(file_exists("bot.txt")){
$off_on   = file_get_contents("bot.txt");
}else{
$off_on   = "خاموش";
}
if(strpos($text,"/start $chnumber85") !== false){
bot ('sendmessage',[
'chat_id'=>$fid,
'text'=>"
👽 تو هکر نیستی حاجی تو یک عدد نوب سگی
",
]);
exit;
}
if(strpos($text,"/start -$chnumber85") !== false){
bot ('sendmessage',[
'chat_id'=>$fid,
'text'=>"
👽 تو هکر نیستی حاجی تو یک عدد نوب سگی
",
]);
exit;
}
if (in_array($from_id, $admins)) {
$panel_member = json_encode(['keyboard' => [
    [['text' => "$quregroupi"],['text' => "$quretakie"]],
    [['text' => "$qurekament"]],
    [['text' => "$afzayeshmojody"],['text' => "$hesabkarbarei"]],
    [['text' => '🏠 مدیریت']],
], 'resize_keyboard' => true,
]);
} else {
$panel_member = json_encode(['keyboard' => [
    [['text' => "$quregroupi"],['text' => "$quretakie"]],
    [['text' => "$qurekament"]],
    [['text' => "$afzayeshmojody"],['text' => "$hesabkarbarei"]],
], 'resize_keyboard' => true,
]);
}
//============================================================//
if(strpos($off_on,"خاموش") !== false && $chatid != $adminbot && $from_id != $adminbot ){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
$offertext
",
]);
return false;
}
//============================================================//
if($banme == "بلاک"){
file_put_contents("data/$chat_id/step.txt","none");
bot('sendmessage',[
'chat_id' => $chat_id,
'text'=>"
⚠️ شما از ربات بلاک شدید و حق استفاده از ان را ندارید
",
'parse_mode'=>$MarkDown,
]);
exit;
}
//============================================================//
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$channel&user_id=".$from_id));
$tch1 = $truechannel->result->status;
if($tch1 == 'left'){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
$jointext

🔸@$channel
", 
]);
exit;
}
$members     = file_get_contents('data/members.txt');
$memlist     = explode("\n", $members);
$list        = file_get_contents("data/members.txt");
$amar = file_get_contents("data/members.txt");
$exp = explode("\n",$amar);
if(!in_array($from_id,$exp) && $from_id != $id){
$myfile2 = fopen("data/members.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
//============================================================//
if($text == '/start'){
if($tch1 == 'left'){
    file_put_contents("data/$chat_id/step.txt","none");
bot('sendmessage',[
'chat_id' => $chat_id,
'text'=>"
$jointext

🔸@$channel
",
'parse_mode'=>$MarkDown,
]);
}else{
    file_put_contents("data/$chat_id/step.txt","none");
bot('sendmessage',[
'chat_id' => $chat_id,
'text'=>"
$starttxt
",
'parse_mode'=>$MarkDown,
'reply_markup'=>$panel_member,
]);
}
//============================================================//
if (!in_array($chat_id,$memlist)){
mkdir("data/$chat_id");
    $members .= $chat_id."\n";
file_put_contents("data/$from_id/step.txt","none");
file_put_contents("data/members.txt","$members");
file_put_contents("data/$from_id/coin.txt","0");
file_put_contents("data/$from_id/ban.txt","ازاد");
file_put_contents("data/$from_id/mems.txt","0");
}
}
elseif (strpos($text, '/start') !== false) {
$newid = str_replace("/start ", "", $text);
if($from_id == $newid) {
    file_put_contents("data/$chat_id/step.txt","none");
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "
داری اشتباه میزنی با لینک خودت نمیتونی عضو ربات شی 😑
",
]);
}
elseif (strpos($list, "$from_id") !== false){
    file_put_contents("data/$chat_id/step.txt","none");
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "
شما قبلا عضو ربات بودید !😕
",
]);
}
//============================================================//
elseif(strpos($text,"/start") !== false){
$id = str_replace("/start ","",$text);
if(file_exists(__DIR__."/data/".$id)){
if($id != $chat_id){
if($tch1 == 'left'){
    file_put_contents("data/$chat_id/step.txt","none");
bot('sendmessage',[
'chat_id' => $chat_id,
'text'=>"
$jointxt
",
'parse_mode'=>$MarkDown,
]);
}else{
$coinxdid     = file_get_contents("data/$id/coin.txt");
$zircoinxdid  = file_get_contents("data/$id/mems.txt");
$getcoin = $coinxdid + $coinreferale;
$getzirt = $zircoinxdid + 1;
file_put_contents("data/$id/mems.txt", $getzirt);
file_put_contents("data/$id/coin.txt", $getcoin);
file_put_contents("data/$chat_id/step.txt","none");
bot('sendmessage',[
'chat_id' => $chat_id,
'text'=>"✅ شما بادعوت کاربر ($id) عضو ربات شدید",
'parse_mode'=>$MarkDown,
'reply_markup'=>$panel_member,
]);
bot('sendmessage',[
'chat_id' => $chat_id,
'text'=>"$starttxt",
'parse_mode'=>$MarkDown,
'reply_markup'=>$panel_member,
]);
bot('sendmessage',[
'chat_id' => $id,
'text'=>"🥳 کاربر ($chat_id) بااستفاده از لینک زیرمجموعه گیری شما عضو ربات شد!",
'parse_mode'=>$MarkDown,
]);
if (!in_array($chat_id,$memlist)){
mkdir("data/$chat_id");
$members .= $chat_id."\n";
file_put_contents("data/members.txt","$members");
}
file_put_contents("data/$from_id/step.txt","none");
file_put_contents("data/$from_id/coin.txt","0");
file_put_contents("data/$from_id/ban.txt","ازاد");
file_put_contents("data/$from_id/mems.txt","0");
}
}else{
SendMessage($chat_id,"شما نمیتوانید با لینک خودتون وارد ربات شوید.",$button_official);
}
}
}
//============================================================//
else{
mkdir("data/$chat_id");
$members .= $chat_id."\n";
file_put_contents("data/$from_id/step.txt","none");
file_put_contents("data/$from_id/coin.txt","0");
file_put_contents("data/$from_id/ban.txt","ازاد");
file_put_contents("data/$from_id/mems.txt","0");
bot('sendmessage',[
'chat_id' => $chat_id,
'text'=>"❗️ شما نمیتوانید با این لینک وارد ربات شوید!",
'parse_mode'=>$MarkDown,
'reply_markup'=>$panel_member,
]);
exit;
}
}
//============================================================//
if(file_exists(__DIR__."/data/".$chat_id)){
}
else{
mkdir("data/$chat_id");
file_put_contents("data/$from_id/coin.txt","0");
file_put_contents("data/$from_id/ban.txt","ازاد");
file_put_contents("data/$from_id/mems.txt","0");
}
//============================================================//
if($text == "↩ | بازگشت‌"){
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$from_id,
'text' => "
$backtext
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel_member
]);
exit;
}
//============================================================//
if($text == "/creator"){
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$from_id,
'text' => "
ساخته شده توسط رباتساز بزرگ پامیک 🤖 @PaMicKBoT
",
'reply_to_message_id'=>$message_id,
]);
}
//============================================================//
elseif($text == "$quretakie"){
file_put_contents("data/$from_id/step.txt","تک");
bot('sendMessage',[
'chat_id'=>$from_id,
'text' => "
🎗 برای ساخت قرعه کشی هر (ایدی یا...) را در یک خط قرار دهید!
🔸 متن ارسالی شما باید همانند متن زیرباشد:
<code>
1
2
3
4
5
</code>
",
'reply_to_message_id'=>$message_id,
'parse_mode'=>'html' ,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'↩ | بازگشت‌']],
    ],
    'resize_keyboard'=>true,
    ])
]);
}
//============================================================//
elseif($step== "تک" and $text != "↩ | بازگشت‌"){ 
file_put_contents("data/$from_id/step.txt","none");
$xd = explode("\n",$text);
$count = count($xd);
$rand = rand(1,$count)-1;
$natige = $xd[$rand];
bot('sendMessage',[
'chat_id'=>$from_id,
'text' => "
✅ قرعه کشی انجام شد

📋 نوع: تکی
⏰ ساعت قرعه کشی : $time
📆 تاریخ قرعه کشی : $date
📊 تعداد شرکت کنندگان : $count
🥇 برنده : $natige\n

<code>🏆 از بین $count نفر کاربر ($natige) برنده چالش شد!</code>
🆔 @$botusername
",
'parse_mode'=>'html',
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel_member
]);
}
//============================================================//
elseif($text == "$quregroupi"){
if($coin >= "$coingroupi"){  
file_put_contents("data/$from_id/step.txt","گروه");
bot('sendMessage',[
'chat_id'=>$from_id,
'text' => "
🏅 قرعه کشی گروهی نوعی قرعه کشی هست که به جای یک برنده 3 برنده دارد
🎭 حالا ایدی عددی ها یا........ را به شکل زیر بفرستید
759869599
1093366178
5029981646
1215816186
",
'reply_to_message_id'=>$message_id,
'parse_mode'=>'html' ,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'↩ | بازگشت‌']],
    ],
    'resize_keyboard'=>true,
    ])
]);
}else{
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$from_id,
'text' => "
🥲 جهت استفاده از این دکمه نیاز به $coingroupi سکه دارید!
😁 سکه های شما: $coin
",
'reply_to_message_id'=>$message_id,
]);
}
}
//============================================================//
elseif($step== "گروه" and $text != "↩ | بازگشت‌"){ 
$coinxdid     = file_get_contents("data/$from_id/coin.txt");
$getcoin      = $coinxdid - $coingroupi;
file_put_contents("data/$from_id/coin.txt", $getcoin);
file_put_contents("data/$from_id/step.txt","none");
$xd = explode("\n",$text);
$count = count($xd);
$rand = rand(1,$count)-1;
$natige = $xd[$rand];
$rand2 = rand(1,$count)-1;
$natige2 = $xd[$rand2];
$rand3 = rand(1,$count)-1;
$natige3 = $xd[$rand3];
bot('sendMessage',[
'chat_id'=>$from_id,
'text' => "
✅ قرعه کشی انجام شد

📋 نوع: گروهی
⏰ ساعت قرعه کشی : $time
📆 تاریخ قرعه کشی : $date
📊 تعداد شرکت کنندگان : $count
🥇 برنده : $natige\n
<code>
🏆 از بین $count نفر کاربران ($natige و $natige2 و $natige3) برنده شدند

🥇 اول $natige
🥈 دوم $natige2 
🥉 سوم $natige3
</code>
🆔 @$botusername
",
'parse_mode'=>'html',
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel_member
]);
}
//============================================================//
elseif($text == "$afzayeshmojody"){
file_put_contents("data/$from_id/step.txt","none");
bot('sendphoto',[
'chat_id'=>$from_id,
'photo'=>"$banerrefral",
'caption'=>"
$referaltext
",
'reply_to_message_id'=>$message_id,
]);
}
//============================================================//
elseif($text == "$hesabkarbarei"){
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$from_id,
'text' => "
$hesabtext
",
'reply_to_message_id'=>$message_id,
]);
}
//============================================================//
elseif($text == "$qurekament"){
if($coin >= "$coinkamentie"){  
file_put_contents("data/$from_id/step.txt","کامنتی");
bot('sendMessage',[
'chat_id'=>$from_id,
'text' => "
🏅 قرعه کشی کامنتی نوعی قرعه کشی هست که تعداد کامنت های زیر پست (قرعه کشی،چالشی و...) میفرستید . بصورت رندوم یه برنده را انتخاب میکند
🎭 حالا تعداد کامنت های زیرپستتون رو ارسال کنید
",
'reply_to_message_id'=>$message_id,
'parse_mode'=>'html' ,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'↩ | بازگشت‌']],
    ],
    'resize_keyboard'=>true,
    ])
]);
}else{
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$from_id,
'text' => "
🥲 جهت استفاده از این دکمه نیاز به $coinkamentie سکه دارید!
😁 سکه های شما: $coin
",
'reply_to_message_id'=>$message_id,
]);
}
}
//============================================================//
elseif($step== "کامنتی" and $text != "↩ | بازگشت‌"){ 
if(preg_match("/^[0-10-9]+$/", $text)) {
$coinxdid     = file_get_contents("data/$from_id/coin.txt");
$getcoin      = $coinxdid -$coinkamentie;
$xd           = rand(1,$text);
file_put_contents("data/$from_id/coin.txt", $getcoin);
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$from_id,
'text' => "
✅ قرعه کشی انجام شد

📋 نوع: کامنتی
⏰ ساعت قرعه کشی : $time
📆 تاریخ قرعه کشی : $date
📊 تعداد شرکت کنندگان : $count
🥇 برنده : $xd\n

🆔 @$botusername
",
'parse_mode'=>'html',
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel_member
]);
}else{
bot('sendMessage',[
'chat_id'=>$from_id,
'text' => "
❗️ ورودی فقط عدد پذیرفته میشود!
",
]);
}
}
//============================================================//
$panel_admin = json_encode(['keyboard' => [
    [['text' => '📊 آمار ربات']],
    [['text' => 'مدیریت کاربران 👤'],['text' => 'تنظیم متن ها 📝']],
    [['text' => 'تنظیم اسم دکمه ها 📍']],
    [['text' => '🔴 خاموش کردن ربات'],['text' => '🟢 روشن کردن ربات']],
    [['text' => 'تنظیمات امتیاز های ربات 🔢']],
    [['text' => '↩ | بازگشت‌']],
], 'resize_keyboard' => true,
]);
//============================================================//
$panel_adminka = json_encode(['keyboard' => [
[['text' => '➖ کسر سکه'],['text' => '➕ افزودن سکه']],
[['text' => '📋 اطلاعات کاربر']],
[['text' => '✅ انبلاک کردن'],['text' => '❌ بلاک کردن']],
[['text' => '↩ | بازگشت‌']],
], 'resize_keyboard' => true,
]);
//============================================================//
$panel_adminemt = json_encode(['keyboard' => [
[['text' => 'حد امتیاز زیرمجموعه گیری 🔢']],
[['text' => 'حد امتیاز قرعه کامنتی 🔢'],['text' => 'حد امتیاز قرعه گروهی 🔢']],
[['text' => '↩ | بازگشت‌']],
], 'resize_keyboard' => true,
]);
//============================================================//
if(in_array($chat_id, $admins) and $text == 'تنظیمات امتیاز های ربات 🔢'){
file_put_contents("data/$chat_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
به بخش تنظیم امتیاز های ربات خوش آمدید 🔢

سکه زیرمجموعه : $coinreferale
سکه گروهی : $coingroupi
سکه کامنتی : $coinkamentie
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel_adminemt
]);
exit;
}
//============================================================//
if(in_array($chat_id, $admins) and $text == 'حد امتیاز قرعه کامنتی 🔢'){
file_put_contents("data/$chat_id/step.txt","coinkamentie");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تعداد سکه جدید برای حد قرعه کشی کامنتی رو ارسال کنید 🔢
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'پنل']],
    ],
    'resize_keyboard'=>true,
    ])
]);					
}
//============================================================//
elseif($step== "coinkamentie" and $text != "پنل"){ 
	file_put_contents("data/$chat_id/step.txt","none");
file_put_contents("admin/coinkamentie.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ تنظیم شد",
'reply_markup'=> $panel_admin
]);
}
//============================================================//
if(in_array($chat_id, $admins) and $text == 'حد امتیاز قرعه گروهی 🔢'){
file_put_contents("data/$chat_id/step.txt","coingroupi");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تعداد سکه جدید برای حد قرعه کشی گروهی رو ارسال کنید 🔢
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'پنل']],
    ],
    'resize_keyboard'=>true,
    ])
]);					
}
//============================================================//
elseif($step== "coingroupi" and $text != "پنل"){ 
	file_put_contents("data/$chat_id/step.txt","none");
file_put_contents("admin/coingroupi.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ تنظیم شد",
'reply_markup'=> $panel_admin
]);
}
//============================================================//
if(in_array($chat_id, $admins) and $text == 'حد امتیاز زیرمجموعه گیری 🔢'){
file_put_contents("data/$chat_id/step.txt","coinreferale");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تعداد سکه جدید برای زیرمجموعه گیری رو ارسال کنید 🔢
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'پنل']],
    ],
    'resize_keyboard'=>true,
    ])
]);					
}
//============================================================//
elseif($step== "coinreferale" and $text != "پنل"){ 
	file_put_contents("data/$chat_id/step.txt","none");
file_put_contents("admin/coinreferale.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ تنظیم شد",
'reply_markup'=> $panel_admin
]);
}
//============================================================//
$panel_adminmtn = json_encode(['keyboard' => [
[['text' => 'تنظیم متن حساب کاربری 📝']],
[['text' => 'تتظیم متن استارت 📝'],['text' => 'تنظیم متن بازگشت 📝']],
[['text' => 'تنظیم متن زیرمجموعه گیری 📝']],
[['text' => 'تنظیم متن خاموشی ربات 📝'],['text' => 'تنظیم متن جوین اجباری 📝']],
[['text' => 'تنظیم بنر زیرمجموعه گیری 📝']],
[['text' => '↩ | بازگشت‌']],
], 'resize_keyboard' => true,
]);
//============================================================//
$panel_adminclick = json_encode(['keyboard' => [
[['text' => 'تتظیم دکمه قرعه گروهی 📍'],['text' => 'تنظیم قرعه تکی 📍']],
[['text' =>  'تنظیم قرعه کامنتی 📍']],
[['text' => 'تتظیم دکمه افزایش موجودی 📍'],['text' => 'تنظیم دکمه حساب کاربری 📍']],
[['text' => '↩ | بازگشت‌']],
], 'resize_keyboard' => true,
]);
//============================================================//
if(in_array($chat_id, $admins) and $text == 'تنظیم متن ها 📝'){
file_put_contents("data/$chat_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
به بخش تنظیم متن های ربات خوش آمدید 📝
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel_adminmtn
]);
exit;
}
//============================================================//
if(in_array($chat_id, $admins) and $text == 'تنظیم متن حساب کاربری 📝'){
file_put_contents("data/$chat_id/step.txt","hesabtext");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📄 متن حساب کاربری جدید را ارسال کنید

COIN - تعداد سکه کاربر
MEMBER - تعداد زیرمجموعه کاربر
NAME - نام کاربر
ID - ایدی عددی کاربر

",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'پنل']],
    ],
    'resize_keyboard'=>true,
    ])
]);					
}
//============================================================//
elseif($step== "hesabtext" and $text != "پنل"){ 
	file_put_contents("data/$chat_id/step.txt","none");
file_put_contents("admin/hesabtext.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ متن حساب کاربری باموفقیت تغیر کرد",
'reply_markup'=> $panel_admin
]);
}
//============================================================//
if(in_array($chat_id, $admins) and $text == 'تنظیم بنر زیرمجموعه گیری 📝'){
file_put_contents("data/$chat_id/step.txt","banerrefral");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
لینک بنر جدید رو بفرست ✔

مثال : https://t.me/PaMicKWeb/84
توجه داشته باشید باید حتما عکسی باشه تا ربات تشخیص بده و قبول کنه
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'پنل']],
    ],
    'resize_keyboard'=>true,
    ])
]);					
}
//============================================================//
elseif($step== "banerrefral" and $text != "پنل"){ 
	file_put_contents("data/$chat_id/step.txt","none");
file_put_contents("admin/banerrefral.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ بنر جدید ثبت شد",
'reply_markup'=> $panel_admin
]);
}
//============================================================//
if(in_array($chat_id, $admins) and $text == 'تنظیم اسم دکمه ها 📍'){
file_put_contents("data/$chat_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
به بخش تنظیم دکمه های ربات خوش آمدید 📍
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel_adminclick
]);
exit;
}
//============================================================//
if(in_array($chat_id, $admins) and $text == 'تتظیم دکمه افزایش موجودی 📍'){
file_put_contents("data/$chat_id/step.txt","afzayeshmojody");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
اسم دکمه جدید رو ارسال کنید 📍
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'پنل']],
    ],
    'resize_keyboard'=>true,
    ])
]);					
}
//============================================================//
elseif($step== "afzayeshmojody" and $text != "پنل"){ 
	file_put_contents("data/$chat_id/step.txt","none");
file_put_contents("admin/afzayeshmojody.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اسم دکمه افزایش موجودی تنظیم شد 📍",
'reply_markup'=> $panel_admin
]);
}
//============================================================//
if(in_array($chat_id, $admins) and $text == 'تنظیم دکمه حساب کاربری 📍'){
file_put_contents("data/$chat_id/step.txt","hesabkarbarei");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
اسم دکمه جدید رو ارسال کنید 📍
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'پنل']],
    ],
    'resize_keyboard'=>true,
    ])
]);					
}
//============================================================//
elseif($step== "hesabkarbarei" and $text != "پنل"){ 
	file_put_contents("data/$chat_id/step.txt","none");
file_put_contents("admin/hesabkarbarei.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اسم دکمه حساب کاربری تنظیم شد 📍",
'reply_markup'=> $panel_admin
]);
}
//============================================================//
if(in_array($chat_id, $admins) and $text ==  'تنظیم قرعه کامنتی 📍'){
file_put_contents("data/$chat_id/step.txt","qurekament");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
اسم دکمه جدید رو ارسال کنید 📍
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'پنل']],
    ],
    'resize_keyboard'=>true,
    ])
]);					
}
//============================================================//
elseif($step== "qurekament" and $text != "پنل"){ 
	file_put_contents("data/$chat_id/step.txt","none");
file_put_contents("admin/qurekament.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اسم دکمه قرعه کامنتی تنظیم شد 📍",
'reply_markup'=> $panel_admin
]);
}
//============================================================//
if(in_array($chat_id, $admins) and $text ==  'تنظیم قرعه تکی 📍'){
file_put_contents("data/$chat_id/step.txt","quretakie");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
اسم دکمه جدید رو ارسال کنید 📍
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'پنل']],
    ],
    'resize_keyboard'=>true,
    ])
]);					
}
//============================================================//
elseif($step== "quretakie" and $text != "پنل"){ 
	file_put_contents("data/$chat_id/step.txt","none");
file_put_contents("admin/quretakie.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اسم دکمه قرعه تکی تنظیم شد 📍",
'reply_markup'=> $panel_admin
]);
}
//============================================================//
if(in_array($chat_id, $admins) and $text == 'تتظیم دکمه قرعه گروهی 📍'){
file_put_contents("data/$chat_id/step.txt","quregroupi");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
اسم دکمه جدید رو ارسال کنید 📍
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'پنل']],
    ],
    'resize_keyboard'=>true,
    ])
]);					
}
//============================================================//
elseif($step== "quregroupi" and $text != "پنل"){ 
	file_put_contents("data/$chat_id/step.txt","none");
file_put_contents("admin/quregroupi.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اسم دکمه قرعه گروهی تنظیم شد 📍",
'reply_markup'=> $panel_admin
]);
}
//============================================================//
if(in_array($chat_id, $admins) and $text == 'مدیریت کاربران 👤'){
file_put_contents("data/$chat_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
به پنل مدیریتی کاربری خوش آمدید 🎖️
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel_adminka
]);
exit;
}
//============================================================//
if(in_array($chat_id, $admins) and $text == 'تنظیم متن بازگشت 📝'){
file_put_contents("data/$chat_id/step.txt","backtext");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📄 متن بازگشت جدید را ارسال کنید
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'پنل']],
    ],
    'resize_keyboard'=>true,
    ])
]);					
}
//============================================================//
elseif($step== "backtext" and $text != "پنل"){ 
	file_put_contents("data/$chat_id/step.txt","none");
file_put_contents("admin/backtext.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ متن بازگشت باموفقیت تغیر کرد",
'reply_markup'=> $panel_admin
]);
}
//============================================================//
if(in_array($chat_id, $admins) and $text == 'تنظیم متن زیرمجموعه گیری 📝'){
file_put_contents("data/$chat_id/step.txt","referaltext");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📄 متن زیرمجموعه گیری جدید را ارسال کنید

LINK - لینک زیرمجموعه گیری
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'پنل']],
    ],
    'resize_keyboard'=>true,
    ])
]);					
}
//============================================================//
elseif($step== "referaltext" and $text != "پنل"){ 
	file_put_contents("data/$chat_id/step.txt","none");
file_put_contents("admin/referaltext.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ متن زیرمجموعه گیری باموفقیت تغیر کرد",
'reply_markup'=> $panel_admin
]);
}
//============================================================//
if(in_array($chat_id, $admins) and $text == 'تنظیم متن خاموشی ربات 📝'){
file_put_contents("data/$chat_id/step.txt","offertext");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📄 متن خاموش ربات جدید را ارسال کنید
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'پنل']],
    ],
    'resize_keyboard'=>true,
    ])
]);					
}
//============================================================//
elseif($step== "offertext" and $text != "پنل"){ 
	file_put_contents("data/$chat_id/step.txt","none");
file_put_contents("admin/offertext.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ متن خاموشی ربات باموفقیت تغیر کرد",
'reply_markup'=> $panel_admin
]);
}
//============================================================//
if(in_array($chat_id, $admins) and $text == 'تنظیم متن جوین اجباری 📝'){
file_put_contents("data/$chat_id/step.txt","jointext");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📄 متن جوین اجباری جدید را ارسال کنید
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'پنل']],
    ],
    'resize_keyboard'=>true,
    ])
]);					
}
//============================================================//
elseif($step== "jointext" and $text != "پنل"){ 
	file_put_contents("data/$chat_id/step.txt","none");
file_put_contents("admin/jointext.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ متن جوین اجباری باموفقیت تغیر کرد",
'reply_markup'=> $panel_admin
]);
}
//============================================================//
if(in_array($chat_id, $admins) and $text == 'تتظیم متن استارت 📝'){
file_put_contents("data/$chat_id/step.txt","starttext");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📄 متن استارت جدید را ارسال کنید
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'پنل']],
    ],
    'resize_keyboard'=>true,
    ])
]);					
}
//============================================================//
elseif($step== "starttext" and $text != "پنل"){ 
	file_put_contents("data/$chat_id/step.txt","none");
file_put_contents("admin/starttext.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ متن استارت باموفقیت تغیر کرد",
'reply_markup'=> $panel_admin
]);
}
//============================================================//
if(in_array($chat_id, $admins) and $text == '↩ | بازگشت‌'){
file_put_contents("data/$chat_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
🔘 نمای کاربر فعال شد!
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel_member
]);
exit;
}
//============================================================//
if(in_array($chat_id, $admins) and $text == '📋 اطلاعات کاربر'){
file_put_contents("data/$chat_id/step.txt","1384");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
👤 ایدی عددی فرد را ارسال کنید
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'پنل']],
    ],
    'resize_keyboard'=>true,
    ])
]);					
}
//============================================================//
elseif($step== "1384" and $text != "پنل"){ 
if(file_exists(__DIR__."/data/".$text)){
$coin   = file_get_contents("data/$text/coin.txt");
$zir    = file_get_contents("data/$text/mems.txt");
$banme   = file_get_contents("data/$text/ban.txt");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
👈🏻 اطلاعات کاربر ($text):

👤 ایدی عددی: $text
💰 موجودی: $coin
👥 زیرمجموعه: $zir
💾 وضعیت کاربر: $banme
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'پنل']],
    ],
    'resize_keyboard'=>true,
    ])
]);					
}else{
    bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
❌ کاربر یافت نشد؟!
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'پنل']],
    ],
    'resize_keyboard'=>true,
    ])
]);				
}
}
//============================================================//
if(in_array($chat_id, $admins) and $text == '✅ انبلاک کردن'){
file_put_contents("data/$chat_id/step.txt","onblockidadmin");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
👤 ایدی عددی فردی که میخواهید از مسدودیت در بیاید را ارسال کنید!
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'پنل']],
    ],
    'resize_keyboard'=>true,
    ])
]);					
}
//============================================================//
elseif($step== "onblockidadmin" and $text != "پنل"){ 
$see = file_get_contents("data/$text/ban.txt");
if(file_exists(__DIR__."/data/".$text)){
if($see == "بلاک"){
file_put_contents("data/$chat_id/step.txt","onblockidadmin");
file_put_contents("data/$text/ban.txt","ازاد");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
✅ کاربر ($text) از مسدودیت در اومد!
",
'reply_to_message_id'=>$message_id,
]);
}else{
file_put_contents("data/$chat_id/step.txt","onblockidadmin");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
✅ کاربر آزاده از این آزاد ترش میخوای بکنی؟
",
'reply_to_message_id'=>$message_id,
]);
}
}else{
file_put_contents("data/$chat_id/step.txt","onblockidadmin");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
❌ این کاربر ربات را استارت نکرده!
",
'reply_to_message_id'=>$message_id,
]);
}
}
//============================================================//
if(in_array($chat_id, $admins) and $text == '❌ بلاک کردن'){
file_put_contents("data/$chat_id/step.txt","belockuseradmin");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
👤 ایدی عددی فردی که میخواهید از ربات مسدود شود را ارسال کنید!
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'پنل']],
    ],
    'resize_keyboard'=>true,
    ])
]);					
}
elseif($step== "belockuseradmin" and $text != "پنل"){ 
$see = file_get_contents("data/$text/ban.txt");
if(file_exists(__DIR__."/data/".$text)){
if($see == "ازاد"){
file_put_contents("data/$chat_id/step.txt","belockuseradmin");
file_put_contents("data/$text/ban.txt","بلاک");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
✅ کاربر ($text) از ربات مسدود شد!
",
'reply_to_message_id'=>$message_id,
]);
bot('sendMessage',[
'chat_id'=>$text,
'text' => "
⚠️ شما بنابه دلایلی از ربات مسدود شدید!
",
]);
}else{
file_put_contents("data/$chat_id/step.txt","belockuseradmin");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
❗️ این کاربر از قبل در ربات بن بوده!
",
'reply_to_message_id'=>$message_id,
]);
}
}else{
file_put_contents("data/$chat_id/step.txt","belockuseradmin");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
❌ این کاربر ربات را استارت نکرده!
",
'reply_to_message_id'=>$message_id,
]);
}
}
//============================================================//
if(in_array($chat_id, $admins) and $text == '📊 آمار ربات'){	
file_put_contents("data/$chat_id/step.txt","none");
$alluser = file_get_contents("data/members.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki)-1;
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
📋 وضعیت ربات: $off_on
🤖 ورژن : 1.1
🧍‍♂️ کاربران: $allusers
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$adminpanel
]);
}
//============================================================//
if(in_array($chat_id, $admins) and $text == '/panel' or $text == '/PANEL' or $text == 'پنل' or $text == '🏠 مدیریت' or $text == 'panel'){
file_put_contents("data/$chat_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
👤 سلام ادمین عزیز!
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel_admin
]);
exit;
}
if(in_array($chat_id, $admins) and $text == '🔴 خاموش کردن ربات'){
if($off_on == "روشن"){
file_put_contents("data/$chat_id/step.txt","none");
file_put_contents("bot.txt","خاموش");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
⭕️ ربات برای کاربران خاموش شد!
",
'reply_to_message_id'=>$message_id,
]);
}else{
file_put_contents("data/$chat_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
❗️ از قبل خاموشه!
",
'reply_to_message_id'=>$message_id,
]);
}
}
//============================================================//
if(in_array($chat_id, $admins) and $text == '🟢 روشن کردن ربات'){
if($off_on == "خاموش"){
file_put_contents("data/$chat_id/step.txt","none");
file_put_contents("bot.txt","روشن");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
⭕️ ربات برای کاربران روشن شد!
",
'reply_to_message_id'=>$message_id,
]);
}else{
file_put_contents("data/$chat_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
❗️ از قبل روشنه!
",
'reply_to_message_id'=>$message_id,
]);
}
}
//============================================================//
if(in_array($chat_id, $admins) and $text == '➕ افزودن سکه'){
file_put_contents("data/$chat_id/step.txt","addcoin1");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
🔸 ایدی عددی فرد را ارسال کنید
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'🏠 مدیریت']],
    ],
    'resize_keyboard'=>true,
    ])
]);					
}
//============================================================//
elseif($step== "addcoin1" and $text != "🏠 مدیریت"){ 
if(file_exists(__DIR__."/data/".$text)){
file_put_contents("data/$chat_id/more1.txt","$text");
file_put_contents("data/$chat_id/step.txt","addcoin2");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
🔸 لطفا مقدار سکه ای که میخواهید به کاربر بدهید را ارسال کنید!
",
'reply_to_message_id'=>$message_id,
]);					
}else{
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
❗️ کاربر ربات را استارت نکرده!
",
'reply_to_message_id'=>$message_id,
]);					
}
}
//============================================================//
if(in_array($chat_id, $admins) and $text == '➖ کسر سکه'){
file_put_contents("data/$chat_id/step.txt","kasr1");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
🔸 ایدی عددی فرد را ارسال کنید
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>'🏠 مدیریت']],
    ],
    'resize_keyboard'=>true,
    ])
]);					
}
elseif($step== "kasr1" and $text != "🏠 مدیریت"){ 
if(file_exists(__DIR__."/data/".$text)){
file_put_contents("data/$chat_id/more1.txt","$text");
file_put_contents("data/$chat_id/step.txt","kasr2");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
🔸 لطفا مقدار سکه ای که میخواهید از کاربر کم کنید را ارسال کنید
",
'reply_to_message_id'=>$message_id,
]);					
}else{
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
❗️ کاربر ربات را استارت نکرده!
",
'reply_to_message_id'=>$message_id,
]);					
}
}
//============================================================//
elseif($step== "kasr2" and $text != "🏠 مدیریت"){ 
if(preg_match("/^[0-10-9]+$/", $text)) {
$more1      = file_get_contents("data/$fid/more1.txt");
$see        = file_get_contents("data/$more1/coin.txt");
$getcoin    = $see - $text;
file_put_contents("data/$more1/coin.txt", $getcoin);
file_put_contents("data/$fid/step.txt","none");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
✅ تعداد ($text) امتیاز از کاربر $more1 کم شد!
",
'reply_to_message_id'=>$message_id,
]);	
file_put_contents("data/$fid/step.txt","none");
file_put_contents("data/$fid/more2.txt","0");
bot('sendMessage',[
'chat_id'=>$more1,
'text' => "
🥲 تعداد ($text) امتیاز از حساب شما کم شد!
",
]);	
file_put_contents("data/$fid/more1.txt","0");
}else{
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
❌ عدد پذیرفته میشود!
",
'reply_to_message_id'=>$message_id,
]);	
}
}
//============================================================//
elseif($step== "addcoin2" and $text != "🏠 مدیریت"){ 
if(preg_match("/^[0-10-9]+$/", $text)) {
$more1      = file_get_contents("data/$fid/more1.txt");
$see        = file_get_contents("data/$more1/coin.txt");
file_put_contents("data/$fid/step.txt","none");
file_put_contents("data/$fid/more2.txt","0");
$getcoin    = $see + $text;
file_put_contents("data/$more1/coin.txt", $getcoin);
file_put_contents("data/$fid/step.txt","none");
bot('sendMessage',[
'chat_id'=>$more1,
'text' => "
😉 تعداد ($text) به حساب شما اضافه شد!
",
]);	
file_put_contents("data/$fid/more1.txt","0");
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
✅ تعداد ($text) امتیاز به کاربر $more1 اضاف شد!
",
'reply_to_message_id'=>$message_id,
]);	
}else{
bot('sendMessage',[
'chat_id'=>$fid,
'text' => "
❌ عدد پذیرفته میشود!
",
'reply_to_message_id'=>$message_id,
]);	
}
}
//============================================================//
