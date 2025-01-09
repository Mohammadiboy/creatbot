<?php
//====================================================================//
ob_start();
error_reporting(0);
if(!is_dir('data'))@mkdir('data');
if(!is_dir('like'))@mkdir('like');
//====================================================================//
date_default_timezone_set('Asia/Tehran');
$users = json_decode(file_get_contents('users.json'),true);
$data = json_decode(file_get_contents('data.json'),true);
$admin = array('[ADMIN]' , null); // آیدی عددی ادمین های ربات
if($data['start'] == null) $data['start'] = "سلام به ربات لایک ساز خوش آمدید!";
//====================================================================//
define ('API_KEY' , '[TOKEN]');
//====================================================================//
$message= file_get_contents("php://input");
$Update = json_decode($message,true);
if(isset($Update['message'])){
$Message = $Update['message'];
$MessageId = $Message['message_id'];
$Text = $Message['text'];
$ChatId = $Message['chat']['id'];
$FromId = $Message['from']['id'];
$FirstName = $Message['from']['first_name'];
$UserName = $Message['from']['username'];
$Contact  = $Message['contact'];
$Phone_number  = $Message['contact']['phone_number'];
$First  = $Message['contact']['first_name'];
$join = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getChatMember?chat_id=@'.$data['channel'].'&user_id='.$FromId),true)['result']['status'];
}elseif(isset($Update['callback_query'])){
$Callback = $Update['callback_query'];
$Data = $Callback['data'];
$MessageId = $Callback['message']['message_id'];
$msgid = $Callback['inline_message_id'];
$FromId = $Callback['from']['id'];
$ChatId = $Callback['chat']['id'];
}
//====================================================================//
if(isset($Update['message'])){
$Message = $Update['message'];
$chat = $Message['chat']['id'];
$user = json_decode(file_get_contents('data/'.$chat.'.json'),true);
}elseif(isset($Update['callback_query'])){
$Callback = $Update['callback_query'];
$chat = $Callback['from']['id'];
$user = json_decode(file_get_contents('data/'.$FromId.'.json'),true);
}
//====================================================================//
function bot($method,$datas=[]){
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,'https://api.telegram.org/bot'.API_KEY.'/'.$method );
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
return json_decode(curl_exec($ch));
}
//====================================================================//
function sm($type ,$ss,$chatid,$text,$keyboard=null,$parse_mode= markdown,$disable_web_page_preview=false){
bot('send'.$type,[
'chat_id'=>$chatid,
$ss =>$text,
'parse_mode'=>$parse_mode,
'disable_web_page_preview'=>$disable_web_page_preview,
'reply_markup'=>$keyboard
]);
}
//====================================================================//
function fm($chatid,$userid,$message){
bot('ForwardMessage',[
'chat_id'=>$chatid,
'from_chat_id'=>$userid,
'message_id'=>$message
        ]);
}
//====================================================================//
function em($chatid,$text,$message,$keyboard=null,$disable_web_page_preview=false,$parse_mode =  markdown){
bot('EditMessageText',[
'chat_id'=>$chatid,
'text'=>$text,
'message_id'=>$message,
'parse_mode'=>$parse_mode,
'disable_web_page_preview'=>$disable_web_page_preview,
'reply_markup'=>$keyboard
]);
}
//====================================================================//
function erm($chatid,$message,$reply_markup){
bot('editMessageReplyMarkup',[
'chat_id'=>$chatid,
'message_id'=>$message,
'reply_markup'=>$reply_markup
]);
}
//====================================================================//
function json($file,$data){
$data = json_encode($data,448);
file_put_contents($file,$data);
}
//====================================================================//
function step($user2 ,$step = 'none'){
$user = json_decode(file_get_contents('data/'.$user2.'.json'),true);
$user['step'] = $step;
json('data/'.$user2.'.json', $user);
}
//====================================================================//
function rand_string( $length = 12 ) {
$chars = "ASDJFLASDBSCASCVCALSNVD83R3P438YQTdlsfhsfafdfadnvlandfv";
return substr(str_shuffle($chars),0,$length);
}
//====================================================================//
$main = json_encode([
'keyboard' => array_filter([
[['text' => "💕 لایک پیشرفته"], ['text' => "❤️ لایک ساده"]],
[['text' => "🔖 حساب کاربری"], ['text' => "🔐 تنظیم کانال"]],
(in_array($FromId, $admin) ? [['text' => "🔑 ورود به پنل"]] : []),
]),
'resize_keyboard' => true,
'one_time_keyboard' => true
]);
//====================================================================//
$back = json_encode(['keyboard'=>[
[['text'=>"🔙 بازگشت"]],
],'resize_keyboard'=>true,'one_time_keyboard'=>true
]);
//====================================================================//
$backs = json_encode(['keyboard'=>[
[['text'=>"🔙 برگشت"]],
],'resize_keyboard'=>true,'one_time_keyboard'=>true
]);
//====================================================================//
$channel = json_encode(['keyboard'=>[
[['text'=>"➕ تنظیم کانال"],['text'=>"➖ حذف کانال"]],
[['text'=>"🔙 بازگشت"]],
],'resize_keyboard'=>true,'one_time_keyboard'=>true
]);
//====================================================================//
$likes = json_encode(['keyboard'=>[
[['text'=>"😎 ثبت قالب"]],
[['text' => "1️⃣ ثبت تکی"], ['text' => "🔢 ثبت چند تایی"]],
[['text'=>"🔙 بازگشت"]],
],'resize_keyboard'=>true,'one_time_keyboard'=>true
]);
//====================================================================//
$panel = json_encode(['keyboard'=>[
[['text'=>"📊 آمار ربات"],['text'=>"📦 تنظیمات"]],
[['text'=>"📨 فروارد پیام"],['text'=>"📩 پیام همگانی"]],
[['text'=>"🔙 بازگشت"]],
],'resize_keyboard'=>true,'one_time_keyboard'=>true
]);
//====================================================================//
$settings = json_encode(['inline_keyboard'=>[
[['text'=>"✏️ تنظیم متن استارت",'callback_data'=>"text-start"]],
[['text'=>"✏️ تنظیم چنل",'callback_data'=>"channel"]],
]]);
//====================================================================//
$hash = rand_string(9);
$un = bot('GetMe')->result->username;
if($Text == '/start'){
if(preg_match('/^(text-(.*))/',$user['step'],$match)){
unlink('like/'.$match[2].'.json');
}
//====================================================================//
if(!in_array($FromId,$users)){
$user['like'] = '0';
$user['step'] = 'none';
json('data/'.$FromId.'.json', $user);
$users[] = $FromId;
json('users.json' , $users);
}
$user['step'] = 'none';
json('data/'.$FromId.'.json', $user);
SM('message','text',$FromId,$data['start'],$main,html);
}
//====================================================================//
if(isset($Text) && $join == 'left'){
SM('message','text',$FromId,"جهت استفاده از ربات ابتدا در کانال @{$data['channel']} عضو شوید! سپس دستور /start را ارسال کنید",null,'html');
return false;
}
//====================================================================//
if($Text == '🔖 حساب کاربری'){
if($user['channel'] != null) $user['channel'] = '@'.$user['channel']; else $user['channel'] = 'تنظیم نشده';
SM('message','text',$FromId,"🔘 وضعیت حساب کاربری شما به شرح زیر است : 👇🏻\n\n🎫 شناسه عددی : <a href = 'tg://user?id=$FromId'>$FromId</a>\n🗳 تعداد لایک های ساخته شده : {$user['like']}\n🆔 آیدی کانال : {$user['channel']}",$main,html);
}
//====================================================================//
if($Text == '❤️ لایک ساده'){
$user['step'] = 'like';
json('data/'.$FromId.'.json', $user);
SM('message','text',$FromId,"🏷 لطفا متنی که میخواهید در زیر آن دکمه لایک قرار گیرد را ارسال کنید.",$back);
}  elseif($user['step'] == 'like' && $Text != '/start' && $Text != '🔑 ورود به پنل' && $Text != '🔙 بازگشت' && $Text != '❤️ لایک ساده'){
if(isset($Message['text'])){
$type = 'متن';
$json = ['like' => '0' , 'admin' => $FromId , 'text' => $Text , 'type' => 'text'  , 'channel' => $user['channel']];
$user['step'] = 'none';
$user['like'] = $user['like'] + 1;
json('data/'.$FromId.'.json', $user);
$data['likes'] = $data['likes'] + 1;
json('data.json', $data);
$button = json_encode(['inline_keyboard'=>[[['text' => "اشتراک بنر️","switch_inline_query"=>"$hash"]],],]);
SM('message','text',$FromId,"✅ لایک شما ساخته شد.",$button,html);
SM('message','text',$FromId,"به منوی اصلی بازگشتید!",$main);
json('like/'.$hash.'.json' , $json);
$user['likes'][] = $hash;
json('data/'.$FromId.'.json' , $user);
} else {
SM('message','text',$FromId,"این نوع داده پشتیبانی نمیشود!!",$main);
}}
//====================================================================//
if($Text == '😎 ثبت قالب'){
$user['step'] = 'settemplate';
json('data/'.$FromId.'.json', $user);
$template = "شرکت در چالش لوکال لایک\n(TEXT)\nبرای شرکت بزنید روی @AcYoSeF";
$user['template'] = $template;
$user['template_status'] = 'yes';
json('data/'.$FromId.'.json', $user);
SM('message','text',$FromId,"یک قالب برای ارسال خودکار ارسال کنید :\n\nنمونه : \nشرکت در چالش لوکال لایک\n(TEXT)\nربات لوکال لایک\n\n⚠️ توجه کنید فقط و فقط حتما باید (TEXT) رو متن خود بزارید تا متن اصلی شما جایگزین این شود در غیر این صورت متنی که فرستادید ارسال میشه !!",$backs,html);
}
//====================================================================//
elseif($user['step'] == 'settemplate' && $Text != '/start' && $Text != '🔑 ورود به پنل' && $Text != '🔙 برگشت'){
$user['template'] = $Text;
$user['template_status'] = 'yes';
$user['step'] = 'none';
json('data/'.$FromId.'.json', $user);
SM('message','text',$FromId,"✅ قالب جدید با موفقیت ثبت شد:\n\n$Text",$likes,html);
}
//====================================================================//
if($Text == '1️⃣ ثبت تکی'){
if($user['template_status'] != 'yes'){
SM('message','text',$FromId,"⚠️ شما ابتدا باید یک قالب ثبت کنید!",$main);
} elseif($user['channel'] == null){
SM('message','text',$FromId,"⚠️ شما باید ابتدا کانال خود را تنظیم کنید!",$main);
} else {
$user['step'] = 'autopost';
json('data/'.$FromId.'.json', $user);
SM('message','text',$FromId,"📝 لطفا نام شرکت کننده یا متنی که می‌خواهید جایگزین (TEXT) شود را ارسال کنید.",$backs);
}}
//====================================================================//
if($Text == '🔢 ثبت چند تایی'){
if($user['template_status'] != 'yes'){
SM('message','text',$FromId,"⚠️ شما ابتدا باید یک قالب ثبت کنید!",$likes);
} elseif($user['channel'] == null){
SM('message','text',$FromId,"⚠️ شما باید ابتدا کانال خود را تنظیم کنید!",$channel);
} else {
$user['step'] = 'multiple_post';
json('data/'.$FromId.'.json', $user);
SM('message', 'text', $FromId, "📝 لطفا نام‌های شرکت‌کنندگان را با کاما (,) یا خط جدید جدا کنید. \n مثال : \nیوسف,ممد,اصغر,حنا", $backs);
}}
//====================================================================//
elseif($user['step'] == 'multiple_post' && $Text != '/start' && $Text != '🔑 ورود به پنل' && $Text != '🔙 برگشت'){
$names = explode(',', $Text); // جدا کردن نام‌ها با کاما
$user['step'] = 'none';
json('data/'.$FromId.'.json', $user);
$rank = 1;
foreach ($names as $name) {
$name = trim($name); 
if (!empty($name)) {
$template = str_replace('(TEXT)', "{$rank}. {$name}", $user['template']);
$hash = substr(md5(time() . $FromId . $name), 0, 10);
$json = ['like' => '0', 'admin' => $FromId, 'text' => $template, 'type' => 'text', 'channel' => $user['channel']];
json('like/'.$hash.'.json', $json);
$user['likes'][] = $hash;
json('data/'.$FromId.'.json', $user);
$user['like'] = $user['like'] + 1;
json('data/'.$FromId.'.json', $user);
$response = bot('sendMessage', [
'chat_id' => '@'.$user['channel'],
'text' => $template,
'parse_mode' => 'html'
]);
if ($response->ok) {
$message_id = $response->result->message_id;
$vote = json_decode(file_get_contents('like/'.$hash.'.json'), true);
$button = json_encode(['inline_keyboard' => [
[['text' => "❤️ {$vote['like']}", 'callback_data' => "likee-$hash"]],
]]);
bot('editMessageReplyMarkup', [
'chat_id' => '@'.$user['channel'],
'message_id' => $message_id,
'reply_markup' => $button
]);
SM('message', 'text', $FromId, "✅ پیام با موفقیت ارسال شد:\n\n$template", $likes, 'html');
} else {
SM('message', 'text', $FromId, "❌ ارسال پیام به کانال ناموفق بود. لطفاً مجدداً تلاش کنید.", $main, 'html');
}
$rank++; 
}}}
//====================================================================//
elseif($user['step'] == 'autopost' && $Text != '/start' && $Text != '🔑 ورود به پنل' && $Text != '🔙 برگشت'){
$template = str_replace('(TEXT)', $Text, $user['template']);
$user['step'] = 'none';
json('data/'.$FromId.'.json', $user);
$hash = substr(md5(time() . $FromId), 0, 10);
$json = ['like' => '0', 'admin' => $FromId, 'text' => $template, 'type' => 'text', 'channel' => $user['channel']];
json('like/'.$hash.'.json', $json);
$user['likes'][] = $hash;
json('data/'.$FromId.'.json', $user);
$user['like'] = $user['like'] + 1;
json('data/'.$FromId.'.json', $user);
$response = bot('sendMessage', [
'chat_id' => '@'.$user['channel'],
'text' => $template,
'parse_mode' => 'html'
]);
if ($response->ok) {
$message_id = $response->result->message_id;
$vote = json_decode(file_get_contents('like/'.$hash.'.json'), true);
$button = json_encode(['inline_keyboard' => [
[['text' => "❤️ {$vote['like']}", 'callback_data' => "likee-$hash"]],
]]);
bot('editMessageReplyMarkup', [
'chat_id' => '@'.$user['channel'],
'message_id' => $message_id,
'reply_markup' => $button
]);
SM('message', 'text', $FromId, "✅ پیام با موفقیت ارسال شد:\n\n$template", $likes, 'html');
} else {
SM('message', 'text', $FromId, "❌ ارسال پیام به کانال ناموفق بود. لطفاً مجدداً تلاش کنید.", $main, 'html');
}}
//====================================================================//
if($Text == '🔐 تنظیم کانال'){
SM('message','text',$FromId,"😄 یک گزینه را انتخاب کنید 👇🏻",$channel);
} 
//====================================================================//
if($Text == '💕 لایک پیشرفته' or $Text == "🔙 برگشت"){
$user['step'] = 'none';
json('data/'.$FromId.'.json', $user);
SM('message','text',$FromId,"🌸 به بخش ساخت لایک پیشرفته خوش امدید \n\n راهنما :\n بخش ثبت تکی به این صورته که فقط یه متن میفرستید و همون رو بدون ترتیب بندی میفرسته چنل \n بخش ثبت چند تایی به صورت لیستی اسم هارو میفرستی مثال : \n مهدی \n حنا \n یوسف \n ایدا و . . . \nربات دونه دونه میسازه و با تگ عددی مثلا #1 که به عنوان شماره یک بازی هست میفرسته چنل ✅",$likes);
} 
//====================================================================//
if($Text == '➕ تنظیم کانال'){
$user['step'] = 'setchannel';
json('data/'.$FromId.'.json', $user);
SM('message','text',$FromId,"🆔 لطفا آیدی کانال خود را بدون '@' ارسال کنید!",$back);
} 
//====================================================================//
if($Text == '➖ حذف کانال'){
if($user['channel'] != null) $user['channel'] = '@'.$user['channel']; else $user['channel'] = 'تنظیم نشده';
if($user['channel'] != 'تنظیم نشده'){
SM('message','text',$FromId,"✅ کانال {$user['channel']} باموفقیت حذف شد!",$back,html);
$user['channel'] = null;
$user['step'] = 'none';
json('data/'.$FromId.'.json',$user);
} else {
SM('message','text',$FromId,"شما هیچ کانالی ثبت نکرده اید!");
}}
//====================================================================//
if($Text == '🔙 بازگشت'){
$user['step'] = 'none';
json('data/'.$FromId.'.json', $user);
SM('message','text',$FromId,"به منوی اصلی بازگشتید!",$main);
}
//====================================================================//
if(in_array($FromId,$admin)){
if(in_array($Text,['پنل' , '/panel' , '🔑 ورود به پنل'])){
SM('message','text',$FromId,"به پنل مدیریت خوش آمدید!",$panel);
}
//====================================================================//
if($Text == '📊 آمار ربات'){
$members = count($users);
SM('message','text',$FromId,"👇🏻 آمار ربات به شرح زیر میباشد! \n👥 تعداد کاربران : $members\n🗳 تعداد کل نظر سنجی های ساخته شده : {$data['likes']}",$panel);
}
//====================================================================//
if($Text == '📨 فروارد پیام'){
step($FromId,'fm');
SM('message','text',$FromId,"لطفا پیام خود را ارسال یا فروارد کنید!",$back);
} elseif($user['step'] == 'fm' && $Text != '🔙 بازگشت'){
$user['step'] = 'none';
json('data/'.$FromId.'.json', $user);
$members = \count($users);
sm('message','text',$ChatId,"درحال فروارد پیام به $members کاربر.\nلطفا صبور باشید!");
foreach($users as $userss){
fm($userss,$ChatId,$MessageId);
}
sm('message','text',$ChatId,"فروارد پیام به پایان رسید!",$panel);
}
//====================================================================//
if($Text == '📩 پیام همگانی'){
step($FromId,'sm');
SM('message','text',$FromId,"لطفا پیام خود را ارسال کنید!",$back);
} elseif($user['step'] == 'sm' && $Text != '🔙 بازگشت'){
$user['step'] = 'none';
json('data/'.$FromId.'.json', $user);
$members = \count($users);
sm('message','text',$ChatId,"درحال ارسال پیام به $members کاربر.\nلطفا صبور باشید!");
foreach($users as $userss){
sm('message','text',$userss,$Text);
}
sm('message','text',$ChatId,"ارسال پیام به پایان رسید!",$panel);
}
//====================================================================//
if($Text == '📦 تنظیمات'){
SM('message','text',$FromId,"⚙️ به منوی تنظیمات ربات خوش آمدید!",$settings);
}
//====================================================================//
if(preg_match('/^(text-(.*))/',$Data,$match)){
step($FromId,'set-'.$match[2]);
if($data[$match[2]] != null)$data[$match[2]] = $data[$match[2]]; else $data[$match[2]] = 'تنظیم نشده است!';
em($FromId,"🏷 متن جدید را وارد کنید!\nمتن فعلی :\n{$data[$match[2]]}",$MessageId);
}
//====================================================================//
if($Data == 'channel'){
step($FromId,'set-channel');
em($FromId,"لطفا آیدی جدید را بدون @ ارسال کنید.",$MessageId);
}
else if(isset($Text) && preg_match('/^(set-(.*))/',$user['step'],$match) && $Text != '/start' && $Text != '🔙 بازگشت'){
step($FromId,'none');
$Text = str_replace('@',null,$Text);
$data[$match[2]] = $Text;
json('data.json', $data);
sm('message','text',$ChatId,'تنظیم شد.',$back);
}}
//====================================================================//
elseif($user['step'] == 'setchannel' && $Text != '/start' && $Text != '🔑 ورود به پنل' && $Text != '🔙 بازگشت' && $Text != '➕ تنظیم کانال'){
$Text = str_replace('@',null,$Text);
if(strlen($Text) > 5 && strlen($Text) < 32){
$s = bot('getChatMember',['chat_id'=>'@'.$Text,'user_id'=>bot('GetMe')->result->id])->result->status;
if($s == 'administrator'){
$b = bot('getChatMember',['chat_id'=>'@'.$Text,'user_id'=>$FromId])->result->status;
if(in_array($b,['creator','administrator'])){
$user['channel'] = $Text;
$user['step'] = 'none';
json('data/'.$FromId.'.json',$user);
SM('message','text',$FromId,"❇️ آیدی @$Text باموفقیت به عنوان قفل کانال تنظیم شد!",$main,html);
} else {
$user['step'] = 'none';
json('data/'.$FromId.'.json', $user);
SM('message','text',$FromId,"⚠️ شما در این کانال ادمین نیستید و امکان ثبت این کانال رو ندارید",$main,html);
}} else {
$user['step'] = 'setchannel';
json('data/'.$FromId.'.json', $user);
SM('message','text',$FromId,"⚠️ ربات در کانال ارسالی شما ادمین نیست \n ✅ لطفا ابتدا ادمین کنید سپس ایدی چنل را مجدد ارسال کنید",$back,html);
}} else {
$user['step'] = 'setchannel';
json('data/'.$FromId.'.json', $user);
SM('message','text',$FromId,"❌ آیدی ارسال شده باید بیشتر از 5 کاراکتر ، و کمتر از 32 کاراکتر باشد!",$back,html);
}}
//====================================================================//
elseif(preg_match('/^(text-(.*))/',$user['step'],$match)){
$vote = json_decode(file_get_contents('like/'.$match[2].'.json'),true);
$vote['text'] = $Text;
json('like/'.$match[2].'.json' , $vote);
$user['step'] = 'none';
$user['like'] = $user['like'] + 1;
json('data/'.$FromId.'.json', $user);
$data['likes'] = $data['likes'] + 1;
json('data.json', $data);
$button = json_encode(['inline_keyboard'=>[[['text' => "اشتراک بنر️","switch_inline_query"=>$match[2]]],],]);
SM('message','text',$FromId,"✅ لایک شما ساخته شد.",$button);
SM('message','text',$FromId,"به منوی اصلی بازگشتید!",$main);
}
//====================================================================//
if(preg_match('/^((.*))/',$Update['inline_query']['query'],$match)){
if(file_exists('like/'.$match[2].'.json')){
$vote = json_decode(file_get_contents('like/'.$match[2].'.json'),true);
if($vote['channel'] != null){
$key = ["inline_keyboard"=>[
[['text'=>"❤️ {$vote['like']}",'callback_data'=>"like-{$match[2]}"]],
],];
} else {
$key = ["inline_keyboard"=>[
[['text'=>"❤️ {$vote['like']}",'callback_data'=>"like-{$match[2]}"]],
],];
}
if($vote['type'] == 'text'){
bot("answerInlineQuery",[
"inline_query_id"=>$Update['inline_query']['id'],
"results"=>json_encode([[
"type"=>"article",
"id"=>base64_encode(rand(5,555)),
"title"=>"جهت ارسال لایک اینجا را کلیک کنید!",
"input_message_content"=>["parse_mode"=>"html","message_text"=>$vote['text']],
"reply_markup"=>$key]])
]);
} else {
bot('answerInlineQuery', [
'inline_query_id' => $Update['inline_query']['id'],
'cache_time' => 1,
'results' => json_encode([[
'type' => "article",
'id' => base64_encode(rand(5,555)),
'thumb_url' => "",
'title' => "👇🏻👇🏻👇🏻👇🏻👇🏻👇🏻👇🏻👇🏻",
'input_message_content' => ['parse_mode' => 'MarkDown', 'message_text' => "لطفا جهت ارسال فیلم بر روی گزینه دوم در حالت اینلاین کلیک کنید!\n@$un"]],[
'type' => $vote['type'],
'id' => base64_encode(rand(5,555)),
$vote['type'].'_file_id' => $vote['file'],
'caption' => $vote['text'],
'title' => "جهت ارسال لایک اینجا را کلیک کنید!",
'reply_markup' => $key]])
]);
}} else {
if($match[2] != null){
bot("answerInlineQuery",[
"inline_query_id"=>$Update['inline_query']['id'],
"results"=>json_encode([[
"type"=>"article",
"id"=>base64_encode(rand(5,555)),
"title"=>"این لایک وجود ندارد!",
"input_message_content"=>["parse_mode"=>"html","message_text"=>'این لایک وجود ندارد!'],
"reply_markup"=>["inline_keyboard"=>[
[['text'=>"ساخت لایک",'url'=>"t.me/$un"]],],]]])
]);
}}
//====================================================================//
if (preg_match('/^(likee-(.*))/', $Data, $match)) {
$voteFile = 'like/' . $match[2] . '.json';
if (!file_exists($voteFile)) {
bot('answerCallbackQuery', [
'callback_query_id' => $Update['callback_query']['id'],
'text' => "لایک پیدا نشد!",
'show_alert' => true
]);
return false;
}
$vote = json_decode(file_get_contents($voteFile), true);
if (json_last_error() !== JSON_ERROR_NONE) {
bot('answerCallbackQuery', [
'callback_query_id' => $Update['callback_query']['id'],
'text' => "خطا در پردازش داده‌ها!",
'show_alert' => true
]);
return false;
}
if ($vote['status'] == 'off') {
bot('answerCallbackQuery', [
'callback_query_id' => $Update['callback_query']['id'],
'text' => "این لایک متوقف شده است!",
'show_alert' => true
]);
return false;
}
//====================================================================//
if ($vote['channel'] != null) {
$chatMemberStatusUrl = 'https://api.telegram.org/bot' . API_KEY . '/getChatMember?chat_id=@' . $vote['channel'] . '&user_id=' . $FromId;
$one = json_decode(file_get_contents($chatMemberStatusUrl), true);
if (json_last_error() !== JSON_ERROR_NONE || !isset($one['result']['status'])) {
bot('answerCallbackQuery', [
'callback_query_id' => $Update['callback_query']['id'],
'text' => "خطا در بررسی وضعیت کانال!",
'show_alert' => true
]);
return false;
}
$oneStatus = $one['result']['status'];
if (!in_array($oneStatus, ['member', 'creator', 'administrator'])) {
bot('answerCallbackQuery', [
'callback_query_id' => $Update['callback_query']['id'],
'text' => "‼️ جهت ثبت رای شما، ابتدا در کانال @{$vote['channel']} عضو شوید!",
'show_alert' => true
]);
return false;
}}
//====================================================================//
if (!in_array($FromId, $vote['users'])) {
$vote['like'] += 1;
$vote['users'][] = $FromId;
file_put_contents($voteFile, json_encode($vote));
        
$key = json_encode([
"inline_keyboard" => [
[['text' => "❤️ {$vote['like']}", 'callback_data' => "likee-{$match[2]}"]],
]
]);
bot('editMessageReplyMarkup', [
'chat_id' => $Update['callback_query']['message']['chat']['id'],
'message_id' => $Update['callback_query']['message']['message_id'],
'reply_markup' => $key
]);
bot('answerCallbackQuery', [
'callback_query_id' => $Update['callback_query']['id'],
'text' => "رای شما ثبت شد!",
'show_alert' => true
]);
} else {
$key = array_search($FromId, $vote['users']);
unset($vote['users'][$key]);
$vote['users'] = array_values($vote['users']);
$vote['like'] -= 1;
file_put_contents($voteFile, json_encode($vote));
$key = json_encode([
"inline_keyboard" => [
[['text' => "❤️ {$vote['like']}", 'callback_data' => "likee-{$match[2]}"]],
]
]);
bot('editMessageReplyMarkup', [
'chat_id' => $Update['callback_query']['message']['chat']['id'],
'message_id' => $Update['callback_query']['message']['message_id'],
'reply_markup' => $key
]);
}}
//====================================================================//
if(preg_match('/^(like-(.*))/',$Data,$match)){
$vote = json_decode(file_get_contents('like/'.$match[2].'.json'),true);
if($vote['status'] == 'off'){
bot('answercallbackquery', [
'callback_query_id' => $Update['callback_query']['id'],
'text' => "این لایک متوقف شده است!",
'show_alert' => true
]);
return false;
}
//====================================================================//
if($vote['channel'] != null) {
$one = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getChatMember?chat_id=@'.$vote['channel'].'&user_id='.$FromId),true)['result']['status'];
if(!in_array($one , ['member' , 'creator' , 'administrator'])){
bot('answercallbackquery', [
'callback_query_id' => $Update['callback_query']['id'],
'text' => "‼️ جهت ثبت رای شما ، ابتدا در کانال @{$vote['channel']} عضو شوید!",
'show_alert' => true
]);
return false;
}}
//====================================================================//
if(!in_array($FromId , $vote['users'])){
$vote['like'] = $vote['like'] + 1;
$vote['users'][] = $FromId;
json('like/'.$match[2].'.json',$vote);
bot('answercallbackquery', [
'callback_query_id' => $Update['callback_query']['id'],
'text' => "رای شما ثبت شد!",
'show_alert' => true
]);
if($vote['channel'] != null){
$key = json_encode(["inline_keyboard"=>[[['text'=>"❤️ {$vote['like']}",'callback_data'=>"like-{$match[2]}"]],
]]);
} else {
$key = json_encode(["inline_keyboard"=>[[['text'=>"❤️ {$vote['like']}",'callback_data'=>"like-{$match[2]}"],['text'=>"ساخت لایک",'url'=>"t.me/$un"]],
]]);
}
bot("editmessagetext", [
"text"=>$vote['text'],
"inline_message_id"=>$msgid,
"parse_mode"=>"html",
"reply_markup"=>$key
]);
} else {
$key = array_search($FromId,$vote['users']);
unset($vote['users'][$key]);
$vote['users'] = array_values($vote['users']);
$vote['like'] = $vote['like'] - 1;
json('like/'.$match[2].'.json',$vote);
if($vote['channel'] != null){
$key = json_encode(["inline_keyboard"=>[[['text'=>"❤️ {$vote['like']}",'callback_data'=>"like-{$match[2]}"]],
]]);
} else {
$key = json_encode(["inline_keyboard"=>[[['text'=>"❤️ {$vote['like']}",'callback_data'=>"like-{$match[2]}"]],
]]);
}
bot("editmessagetext", [
"text"=>$vote['text'],
"inline_message_id"=>$msgid,
"parse_mode"=>"html",
"reply_markup"=>$key
]);
}}}
