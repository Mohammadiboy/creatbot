<?php
include("jdf.php");
ob_start();
define('API_KEY','[TOKEN]');
ini_set("log_errors" , "on");
//-----------------------------------------------------------------------------------------
function bot($method,$data){
  
  $url = "https://api.telegram.org/bot".API_KEY."/".$method;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, count($data));
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
 }
////////////////////////////////////////////////////////////////
$Dev = array("[ADMIN]","[ADMIN]","[ADMIN]");   ///////ایدی عددی ادمین
@$usernamebot = "[BOT]";    //////ایدی ربات بدون @
@$channel = "[CHANNEL]";   /////ایدی کانال بدون @
@$token = API_KEY;
$supppp = "[UUSSE]";
//-----------------------------------------------------------------------------------------------
$update = json_decode(file_get_contents('php://input'));
@$message = $update->message;
@$from_id = $message->from->id;
@$chat_id = $message->chat->id;
@$message_id = $message->message_id;
@$first_name = $message->from->first_name;
@$last_name = $message->from->last_name;
@$username = $message->from->username;
@$textmassage = $message->text;
@$firstname = $update->callback_query->from->first_name;
@$usernames = $update->callback_query->from->username;
@$chatid = $update->callback_query->message->chat->id;
@$fromid = $update->callback_query->from->id;
@$membercall = $update->callback_query->id;
@$reply = $update->message->reply_to_message->forward_from->id;
@$chat_idg = $update->callback_query->message->chat->id;
@$reply_id = $update->message->reply_to_message->from->id;
@$replyy = $update->message->reply_to_message;
@$first_name = $message->from->first_name;
@$textmassage = $message->text;
@$text = $message->text;
@$firstname = $update->callback_query->from->first_name;
@$usernames = $update->callback_query->from->username;
@$chatid = $update->callback_query->message->chat->id;
@$fromid = $update->callback_query->from->id;
@$membercall = $update->callback_query->id;
@$reply = $update->message->reply_to_message->forward_from->id;
//------------------------------------------------------------------------
@$message = $update->message;
@$from_id = $message->from->id;
@$chat_id = $message->chat->id;
@$chat_idg = $update->callback_query->message->chat->id;
@$reply_id = $update->message->reply_to_message->from->id;
@$replyy = $update->message->reply_to_message;
@$message_id = $message->message_id;
@$first_name = $message->from->first_name;
@$last_name = $message->from->last_name;
@$username = $message->from->username;
@$textmassage = $message->text;
@$text = $message->text;
@$firstname = $update->callback_query->from->first_name;
@$usernames = $update->callback_query->from->username;
@$chatid = $update->callback_query->message->chat->id;
@$fromid = $update->callback_query->from->id;
@$membercall = $update->callback_query->id;
@$reply = $update->message->reply_to_message->forward_from->id;
//------------------------------------------------------------------------
@$data = $update->callback_query->data;
@$messageid = $update->callback_query->message->message_id;
@$tc = $update->message->chat->type;
@$gpname = $update->callback_query->message->chat->title;
@$namegroup = $update->message->chat->title;
@$textt = $update->inline_qurey->qurey;
//------------------------------------------------------------------------
@$newchatmemberid = $update->message->new_chat_member->id;
@$newchatmemberu = $update->message->new_chat_member->username;
@$rt = $update->message->reply_to_message;
@$replyid = $update->message->reply_to_message->message_id;
@$tedadmsg = $update->message->message_id;
@$edit = $update->edited_message->text;
@$re_id = $update->message->reply_to_message->from->id;
@$re_user = $update->message->reply_to_message->from->username;
@$re_name = $update->message->reply_to_message->from->first_name;
@$re_msgid = $update->message->reply_to_message->message_id;
@$re_chatid = $update->message->reply_to_message->chat->id;
@$message_edit_id = $update->edited_message->message_id;
@$chat_edit_id = $update->edited_message->chat->id;
@$edit_for_id = $update->edited_message->from->id;
@$edit_chatid = $update->callback_query->edited_message->chat->id;
@$caption = $update->message->caption;
//------------------------------------------------------------------------
@$statjson = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chat_id&user_id=".$from_id),true);
@$status = $statjson['result']['status'];
@$statjsonrt = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chat_id&user_id=".$re_id),true);
@$statusrt = $statjsonrt['result']['status'];
@$statjsonq = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chatid&user_id=".$fromid),true);
@$statusq = $statjsonq['result']['status'];
@$info = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chat_edit_id&user_id=".$edit_for_id),true);
@$you = $info['result']['status'];
@$forchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$channel."&user_id=".$from_id));
@$tch = $forchannel->result->status;
//-----------------------------------------------------------------------------------------
@$settings = json_decode(file_get_contents("data/$chat_id.json"),true);
@$settings2 = json_decode(file_get_contents("data/$chatid.json"),true);
@$editgetsettings = json_decode(file_get_contents("data/$chat_edit_id.json"),true);
@$user = json_decode(file_get_contents("data/user.json"),true);
@$filterget = $settings["filterlist"];
//=======================================================================================
//فانکشن ها :
function SendMessage($chat_id, $text){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>'MarkDown']);
}
 function Forward($berekoja,$azchejaei,$kodompayam)
{
bot('ForwardMessage',[
'chat_id'=>$berekoja,
'from_chat_id'=>$azchejaei,
'message_id'=>$kodompayam
]);
}
function  getUserProfilePhotos($token,$from_id) {
  @$url = 'https://api.telegram.org/bot'.$token.'/getUserProfilePhotos?user_id='.$from_id;
  @$result = file_get_contents($url);
  @$result = json_decode ($result);
  @$result = $result->result;
  return $result;
}
function check_filter($str){
	global $filterget;
	foreach($filterget as $d){
		if (mb_strpos($str, $d) !== false) {
			return true;
		}
	}
}
//======================================= @tel_fire ================================================
// msg check
// lock link
if($settings["lock"]["link"] == "┃✓┃"){
if ($status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev)){
if (strstr($textmassage,"t.me") == true or strstr($textmassage,"telegram.me") == true or strstr($caption,"t.me") == true or strstr($caption,"telegram.me")) {   
bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id
    ]);
  }
}
}
// lock photo
if($settings["lock"]["photo"] == "┃✓┃"){
if ($status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev)){
if ($update->message->photo){  
bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id
    ]);
  }
}
}
// gif
if($settings["lock"]["gif"] == "┃✓┃"){
if ($status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev)){
if ($update->message->document){  
bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id
    ]);
  }
}
}
// document
if($settings["lock"]["document"] == "┃✓┃"){
if ($status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev)){
if ($update->message->document){  
bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id
    ]);
  }
}
}
// video
if($settings["lock"]["video"] == "┃✓┃"){
if ($status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev)){
if ($update->message->video){  
bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id
    ]);
  }
}
}
// edit 
if($editgetsettings["lock"]["edit"] == "┃✓┃"){
if ( $you != 'creator' && $you != 'administrator' && $edit_for_id != $Dev){
if ($update->edited_message->text){  
bot('deletemessage',[
    'chat_id'=>$chat_edit_id,
    'message_id'=>$message_edit_id
    ]);
  }
}
}
// contact
if ($settings["lock"]["contact"] == "┃✓┃"){
if($update->message->contact){
if ($tc == 'group' | $tc == 'supergroup'){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
	bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id
    ]);
	}
}
}
}
// tag
if ($settings["lock"]["tag"] == "┃✓┃"){
if (strstr($textmassage,"#") == true or strstr($caption,"#") == true) {
if ($tc == 'group' | $tc == 'supergroup'){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
	bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id
    ]);
	}
}
}
}// username 
if ($settings["lock"]["username"] == "┃✓┃"){
if (strstr($textmassage,"@") == true or strstr($caption,"@") == true) {
if ($tc == 'group' | $tc == 'supergroup'){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
	bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id
    ]);
	}
}
}
}
// audio
if ($settings["lock"]["audio"] == "┃✓┃"){
if($update->message->audio){
if ($tc == 'group' | $tc == 'supergroup'){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
	bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id
    ]);
	}
}
}
}
// voice 
if ($settings["lock"]["voice"] == "┃✓┃"){
if($update->message->voice){
if ($tc == 'group' | $tc == 'supergroup'){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
	bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id
    ]);
	}
}
}
}
// add
if($settings["information"]["add"] == "┃✓┃") {
if($newchatmemberid == true){
$add = $settings["addlist"]["$from_id"]["add"];
$addplus = $add +1;
$settings["addlist"]["{$from_id}"]["add"]="$addplus";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
}
if($settings["information"]["add"] == "┃✓┃"){
if ($status != "creator" && $status != "administrator" && !in_array($from_id,$Dev)){
if ($tc == 'group' | $tc == 'supergroup'){
$youadding = $settings["addlist"]["$from_id"]["add"];
$setadd = $settings["information"]["setadd"];
$addtext = $settings["addlist"]["$from_id"]["addtext"];
$msg = $settings["information"]["lastmsgadd"];
            if($youadding < $setadd){
			if($addtext == false){
            bot('SendMessage',[
			'parse_mode'=>"MarkDown",
                'chat_id'=>$chat_id,
                'text'=>"کاربر ( [$from_id](tg://user?id=$from_id) )
				جهت بدست آوردن توانایی چت در گروه باید $setadd نفر را به گروه اضافه کنید.",
            ]);
            bot('deletemessage',[
                'chat_id'=>$chat_id,
            'message_id'=>$message_id
            ]);
			            bot('deletemessage',[
                'chat_id'=>$chat_id,
            'message_id'=>$msg
            ]);
$msgplus = $message_id + 1;
$settings["information"]["lastmsgadd"]="$msgplus";
$settings["addlist"]["$from_id"]["addtext"]="true";
$settings["addlist"]["$from_id"]["add"]=0;
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
          }
		  else
		  {
			              bot('deletemessage',[
                'chat_id'=>$chat_id,
            'message_id'=>$message_id
			 ]);
       }
		}
		  }
		}
		}
//  game
if($settings["lock"]["game"] == "┃✓┃"){
if($update->message->game){
if ($tc == 'group' | $tc == 'supergroup'){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
	bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id
    ]);
	}
}
}
}
// location
if ($settings["lock"]["location"] == "┃✓┃"){
if($update->message->location){
if ($tc == 'group' | $tc == 'supergroup'){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
	bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id
    ]);
	}
}
}
}
// filter
if($settings["filterlist"] != false){
if ($status != 'creator' && $status != 'administrator' ) {
$check = check_filter("$textmassage");
if ($check == true) {
bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id
    ]);
}
}
}
// setrules
if($settings["information"]["step"] == "setrules"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
if ($tc == 'group' | $tc == 'supergroup'){
$plus = mb_strlen("$textmassage");
if($plus < 600) {
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"قوانین گروه شما ثبت شد.",
  'reply_to_message_id'=>$message_id,
 ]);
$settings["information"]["rules"]="$textmassage";
$settings["information"]["step"]="none";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"حداکثر میتوانید 600 حرف را وارد کنید.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
}
}
}
}
// lock channel 
if($settings["information"]["lockchannel"] == "┃✓┃"){
if ($status != "creator" && $status != "administrator" && !in_array($from_id,$Dev)){
if ($tc == 'group' | $tc == 'supergroup'){
$usernamechannel = $settings["information"]["setchannel"];
@$forchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=".$usernamechannel."&user_id=".$from_id));
@$tch = $forchannel->result->status;
if($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
$msg = $settings["information"]["lastmsglockchannel"];
$channeltext = $settings["channellist"]["$from_id"]["channeltext"];
			if($channeltext == false){
            bot('SendMessage',[
			'parse_mode'=>"MarkDown",
                'chat_id'=>$chat_id,
                'text'=>"کاربر ( [$from_id](tg://user?id=$from_id) )
جهت بدست آوردن توانایی چت در گروه باید عضو کانال ( $usernamechannel ) بشوید.",
            ]);
            bot('deletemessage',[
                'chat_id'=>$chat_id,
            'message_id'=>$message_id
            ]);
			            bot('deletemessage',[
                'chat_id'=>$chat_id,
            'message_id'=>$msg
            ]);
$msgplus = $message_id + 1;
$settings["information"]["lastmsglockchannel"]="$msgplus";
$settings["channellist"]["$from_id"]["channeltext"]="true";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
          }
		  else
		  {
			              bot('deletemessage',[
                'chat_id'=>$chat_id,
            'message_id'=>$message_id
			 ]);
       }
		}
		  }
		}
		}
if($settings["information"]["step"] == "setchannel"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
if ($tc == 'group' | $tc == 'supergroup'){
if(strpos($textmassage , '@') !== false) {
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"کانال ( $textmassage ) با موفقیت تنظیم شد.",
  'reply_to_message_id'=>$message_id,
 ]);
$settings["information"]["setchannel"]="$textmassage";
$settings["information"]["step"]="none";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
		bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"یوزرنیم کانال با @ شروع میشود!",
  'reply_to_message_id'=>$message_id,
            'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'lockchannel']
					 ],
                     ]
               ])
 ]);
}
}
}
}
// banall
elseif ($tc == 'private'){ 
if(in_array($from_id, $user["banlist"])) {
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"کاربر بصورت همگانی مسدود میباشد!",
'reply_markup'=>json_encode(['KeyboardRemove'=>[
],'remove_keyboard'=>true
])
]);
    }
}
elseif ($tc == 'group' | $tc == 'supergroup'){ 
if(in_array($from_id, $user["banlist"])) {
		bot('KickChatMember',[
    'chat_id'=>$chat_id,
    'user_id'=>$from_id
      ]);
}
}
// sup
if($user["userjop"]["$from_id"]["file"] == "sup"&& $tc == "private"){   
if ($textmassage != "بازگشت 🔙") {	
bot('ForwardMessage',[
'chat_id'=>$Dev[0],
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);
			bot('sendmessage',[       
			'chat_id'=>$chat_id,
			'text'=>"پیام شما با موفقیت ثبت شد\nبرای اتمام مکالمه /cancel را ارسال کنید.",
	]);	
	}
	}
// bots
if($settings["lock"]["bot"] == "┃✓┃"){
if ($message->new_chat_member->is_bot) {
$hardmodebot = $settings["information"]["hardmodebot"];
if($hardmodebot == "┃✘┃"){
 bot('kickChatMember',[
 'chat_id'=>$chat_id,
  'user_id'=>$update->message->new_chat_member->id
  ]);
  }
else
{
 bot('kickChatMember',[
 'chat_id'=>$chat_id,
  'user_id'=>$update->message->new_chat_member->id
  ]);
   bot('kickChatMember',[
 'chat_id'=>$chat_id,
  'user_id'=>$from_id
  ]);
}
}
}
// sticker
if ($settings["lock"]["sticker"] == "┃✓┃"){
if($update->message->sticker){
if ($tc == 'group' | $tc == 'supergroup'){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
	bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id
    ]);
	}
}
}
}
// forward
if ($settings["lock"]["forward"] == "┃✓┃"){
if($update->message->forward_from | $update->message->forward_from_chat){
if ($tc == 'group' | $tc == 'supergroup'){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
 bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message->message_id
    ]);
 }
}
}
}
// fosh 
if ($settings["lock"]["fosh"] == "┃✓┃"){
if (strstr($textmassage,"کسده") == true  or strstr($textmassage,"جنده") == true or strstr($textmassage,"کیر") == true  or  strstr($textmassage,"سکسی") == true   or strstr($textmassage,"ناموس") == true) {
if ($tc == 'group' | $tc == 'supergroup'){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
	bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id
    ]);
	}
}
}
}
// muteall
if ($settings["lock"]["mute_all"] == "┃✓┃"){
if($update->message){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
 bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message->message_id
    ]);
 }
}
}
// muteall time
if ($settings["lock"]["mute_all_time"] == "┃✓┃"){
$locktime = $settings["information"]["mute_all_time"];
date_default_timezone_set('Asia/Tehran');
$date1 = date("h:i:s");
if($date1 < $locktime){
if($update->message){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
 bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message->message_id
    ]);
 }
else
{
$settings["lock"]["mute_all_time"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
}
}
}
// replay
if ($settings["lock"]["reply"] == "┃✓┃"){
if($update->message->reply_to_message){
if ($tc == 'group' | $tc == 'supergroup'){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
 bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message->message_id
    ]);
 }
}
}
}
// tg
if ($settings["lock"]["tgservic"] == "┃✓┃"){
if($update->message->new_chat_member | $update->message->new_chat_photo | $update->message->new_chat_title | $update->message->left_chat_member | $update->message->pinned_message){
if ($tc == 'group' | $tc == 'supergroup'){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
 bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message->message_id
    ]);
 }
}
}
}
// text
if ($settings["lock"]["text"] == "┃✓┃"){
if($update->message->text){
if ($tc == 'group' | $tc == 'supergroup'){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
 bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message->message_id
    ]);
 }
}
}
}
// video note
if ($settings["lock"]["video_msg"] == "┃✓┃"){
if($update->message->video_note){
if ($tc == 'group' | $tc == 'supergroup'){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ) {
 bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message->message_id
    ]);
 }
}
}
}
// restart settings 
if($settings["information"]["step"] == "reset"){
if($textmassage == "بله"){
              bot('sendmessage', [
                'chat_id' => $chat_id,
             'text'=>"تنظیمات گروه با موفقیت ریست شد.",
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["link"]="┃✘┃";
$settings["lock"]["photo"]="┃✘┃";
$settings["lock"]["text"]="┃✘┃";
$settings["lock"]["tag"]="┃✘┃";
$settings["lock"]["username"]="┃✘┃";
$settings["lock"]["sticker"]="┃✘┃";
$settings["lock"]["video"]="┃✘┃";
$settings["lock"]["voice"]="┃✘┃";
$settings["lock"]["audio"]="┃✘┃";
$settings["lock"]["forward"]="┃✘┃";
$settings["lock"]["tgservices"]="┃✘┃";
$settings["lock"]["gif"]="┃✘┃";
$settings["lock"]["bot"]="┃✘┃";
$settings["lock"]["document"]="┃✘┃";
$settings["lock"]["tgservic"]="┃✘┃";
$settings["lock"]["edit"]="┃✘┃";
$settings["lock"]["reply"]="┃✘┃";
$settings["lock"]["contact"]="┃✘┃";
$settings["lock"]["game"]="┃✘┃";
$settings["lock"]["cmd"]="┃✘┃";
$settings["lock"]["mute_all"]="┃✘┃";
$settings["lock"]["mute_all_time"]="┃✘┃";
$settings["lock"]["fosh"]="┃✘┃";
$settings["lock"]["video_msg"]="┃✘┃";
$settings["lock"]["lockauto"]="┃✘┃";
$settings["lock"]["lockcharacter"]="┃✘┃";
$settings["information"]["welcome"]="┃✘┃";
$settings["information"]["add"]="┃✘┃";
$settings["information"]["lockchannel"]="┃✘┃";
$settings["information"]["setadd"]="3";
$settings["information"]["setwarn"]="3";
$settings["information"]["textwelcome"]="خوش امدید";
$settings["information"]["rules"]="ثبت نشده";
$settings["information"]["timelock"]="00:00";
$settings["information"]["timeunlock"]="00:00";
$settings["information"]["pluscharacter"]="300";
$settings["information"]["downcharacter"]="0";
$settings["information"]["step"]="none";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}else{
	bot('sendmessage',[
          'chat_id' => $chat_id,
'text'=>"درخواست ریست گروه با موفقیت رد شد.",
]);
$settings["information"]["step"]="none";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
 }
}
// buy charge
if(file_get_contents("data/$from_id.txt") == "true" && $tc == "private"){
		date_default_timezone_set('Asia/Tehran');
		$date1 = date('Y-m-d', time());
		$date2 = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
		$next_date = date('Y-m-d', strtotime($date2 ." +30 day"));
	bot('sendmessage',[
        "chat_id"=>$chat_id,
        "text"=>"گروه شما با موفقیت شارژ شد."
		]);
			bot('sendmessage',[
        "chat_id"=>$textmassage,
        "text"=>"شارژ با موفقیت برای این گروه خریداری شد."
		]);
$settings = json_decode(file_get_contents("data/$textmassage.json"),true);
$settings["information"]["expire"]="$next_date";
$settings["information"]["charge"]="30 روز";
$settings = json_encode($settings,true);
file_put_contents("data/$textmassage.json",$settings);
unlink("data/$from_id.txt");
}
 // left group when end charge
date_default_timezone_set('Asia/Tehran');
$date4 = date('Y-m-d', time());
if ($tc == 'group' | $tc == 'supergroup'){ 
if($settings["information"]["expire"] != false){
if($date4 > $settings["information"]["expire"]){
			bot('sendmessage',[
            'chat_id'=>$Dev[0],
            'text'=>"ادمین☑️
اشتراک این گروه به اتمام رسید

• ایدی گروه : [$chat_id]

• نام گروه : [$namegroup]",
        ]); 
			 bot('sendmessage',[
            'chat_id'=>$chat_id,
            'text'=>"اشتراک این گروه به اتمام رسید

• ایدی گروه : [$chat_id]

• نام گروه : [$namegroup]

برای خرید اشتراک دوباره به ادمین مراجعه کنید",
]);
        bot('LeaveChat', [
        'chat_id' =>$chat_id,
    ]);
    }
}
}
// welcome
if ($settings["information"]["welcome"] == "┃✓┃"){
if($update->message->new_chat_member){
if ($tc == "group" | $tc == "supergroup"){
$text2 = $settings["information"]["textwelcome"];
$newmemberuser = $update->message->new_chat_member->username;
$text = str_replace("gpname","$namegroup","$text2");
$text1 = str_replace("username","$newmemberuser","$text");
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"$text1",
	]);
}
}
}
// lock character
if($settings["lock"]["lockcharacter"] == "┃✓┃"){
if ($status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev)){
$plus = mb_strlen("$textmassage");
$pluscharacter = $settings["information"]["pluscharacter"];
$downcharacter = $settings["information"]["downcharacter"];
if ($pluscharacter < $plus or $plus < $downcharacter) {   
bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id
    ]);
  }
}
}
// autolock 
if ($settings["lock"]["lockauto"] == "┃✓┃"){
date_default_timezone_set('Asia/Tehran');
$date1 = date("H:i");
$timelockauto = $settings["information"]["timelock"];
$unlocktime = $settings["information"]["timeunlock"];
if($unlocktime > $date1 && $date1 > $timelockauto){
if ($tc == 'group' | $tc == 'supergroup'){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ) {
$timeremmber = $settings["information"]["timeremmber"];
if($date1 < $timeremmber){
 bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message->message_id
    ]);
}
else
{
	 bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message->message_id
    ]);

		bot('sendmessage',[
            'chat_id'=>$chat_id,
            'text'=>"هشدار

قفل گروه در ساعت $timelockauto
فعال شده است
و ساعت  $unlocktime غیر فعال میشود",
'reply_markup'=>$inlinebutton,
   ]);
$next_date = date('H:i', strtotime($date1 ."+180 Minutes"));
$settings["information"]["timeremmber"]="$next_date";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
}
}
}
}
// panel
elseif ($user["userjop"]["$from_id"]["file"] == 'forwarduser') {
$user["userjop"]["$from_id"]["file"]="none";
$numbers = $user["userlist"];
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);	
if ($textmassage != "بازگشت 🔙") {
         bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"پیام شما با موفقیت ارسال شد.",
	  'reply_to_message_id'=>$message_id,
 ]);
for($z = 0;$z <= count($numbers)-1;$z++){
Forward($numbers[$z], $chat_id,$message_id);
}
}
}
elseif ($user["userjop"]["$from_id"]["file"] == 'forwardgroup') {
$user["userjop"]["$from_id"]["file"]="none";
$numbers = $user["grouplist"];
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);	
if ($textmassage != "بازگشت 🔙") {
         bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"پیام با موفقیت ارسال شد.",
	  'reply_to_message_id'=>$message_id,
 ]);
for($z = 0;$z <= count($numbers)-1;$z++){
Forward($numbers[$z], $chat_id,$message_id);
}
}
}
elseif ($user["userjop"]["$from_id"]["file"] == 'sendgroup') {
$user["userjop"]["$from_id"]["file"]="none";
$numbers = $user["grouplist"];
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);	
if ($textmassage != "بازگشت 🔙") {
         bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"پیام با موفقیت ارسال شد.",
	  'reply_to_message_id'=>$message_id,
 ]);
for($z = 0;$z <= count($numbers)-1;$z++){
     bot('sendmessage',[
          'chat_id'=>$numbers[$z],        
		  'text'=>"$textmassage",
        ]);
}
}
}
elseif ($user["userjop"]["$from_id"]["file"] == 'senduser') {
$user["userjop"]["$from_id"]["file"]="none";
$numbers = $user["userlist"];
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);	
if ($textmassage != "بازگشت 🔙") {
         bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"پیام با موفقیت ارسال شد.",
	  'reply_to_message_id'=>$message_id,
 ]);
for($z = 0;$z <= count($numbers)-1;$z++){
     bot('sendmessage',[
          'chat_id'=>$numbers[$z],        
		  'text'=>"$textmassage",
        ]);
}
}
}
if($textmassage=="/panel admin" or $textmassage=="panel admin" or $textmassage=="پنل مدیریت"){
if ($tc == "private") {
if (in_array($from_id,$Dev)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🚦ادمین عزیز به پنل مدریت ربات خوش امدید
➖➖➖➖
لطفا از دکمه های زیر برای مدیریت گروه ها  استفاده کنید✅",
         'reply_to_message_id'=>$message_id,
	  'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"👥 مدیریت گروه ها"],['text'=>"💥 امار ربات"]
	],
 	[
	  	['text'=>"📌 فوروارد به گروه"],['text'=>"📍 فوروارد به کاربران"]
	  ],
	  	  	 [
		['text'=>"🔅 ارسال به گروه ها"],['text'=>"👤 ارسال به کابران"]                            
		 ],
		 	  	  	 [
					 ['text'=>"🔙 برگشت"]                            
		 ],
   ],
      'resize_keyboard'=>true
   ])
 ]);
}
}
}
elseif($textmassage=="👥 مدیریت گروه ها" or $textmassage=="مدیریت گروه ها" or $textmassage=="/panel group"){
if ($tc == "private") {
if (in_array($from_id,$Dev)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🚦ادمین عزیز به پنل مدریت گروه ها خوش امدید
➖➖➖➖
لطفا از دکمه های زیر برای مدیریت گروه ها  استفاده کنید✅",
         'reply_to_message_id'=>$message_id,
	  'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"📜 لیست گروه ها"],['text'=>"❗️ خروج ربات از گروه"]
	],
	[
	['text'=>"🔙 برگشت"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
}
}
}
elseif($textmassage=="📜 لیست گروه ها" ){
if ($tc == "private") {
if (in_array($from_id,$Dev)) {
	bot('senddocument',[
	'chat_id'=>$chat_id,
	'document'=>new CURLFile("data/group.txt"),
	'caption'=>"🚥 لیست گروه های ربات",
	'reply_to_message_id'=>$message_id,
	]);
}
}
}
elseif($textmassage=="❗️ خروج ربات از گروه" ){
if ($tc == "private") {
if (in_array($from_id,$Dev)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"📍 ادمین عزیز جهت خروج ربات ار گروه مورد نظر میتوانید از دستور :
➖➖➖
/left [ایدی گروه]
یا

ترک [ایدی گروه]

استفاده کنید ✅
➖➖➖➖
مثال : left -1001073837688/",
'reply_to_message_id'=>$message_id,
 ]);
}
}
}
elseif(strpos($textmassage , "ترک " ) !== false or strpos($textmassage , "/left " ) !== false) {
$text = str_replace("ترک ","",$textmassage);
if ($tc == "private") {
if (in_array($from_id,$Dev)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🤖ربات از گروه با ایدی :

$text

خارج شد ✅",
  ]);
bot('LeaveChat',[
  'chat_id'=>$text,
  ]);
unlink("data/$text.json");
}
}
}
elseif($textmassage=="💥 امار ربات"){
$users = count($user["userlist"]);
$group = count($user["grouplist"]);
				bot('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"🤖 امار ربات شما :

👥 تعداد گروه ها : $group

👤 تعداد کاربران : $users
",
                'hide_keyboard'=>true,
		]);
		}
elseif ($textmassage == '👤 ارسال به کابران' && in_array($from_id,$Dev)) {
         bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"لطفا متن خود را ارسال کنید 🚀",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"🔙 برگشت"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$user["userjop"]["$from_id"]["file"]="senduser";
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
}
elseif ($textmassage == '🔅 ارسال به گروه ها' && in_array($from_id,$Dev)) {
         bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"لطفا متن خود را ارسال کنید 🚀",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"🔙 برگشت"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$user["userjop"]["$from_id"]["file"]="sendgroup";
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
}
elseif ($textmassage == '📌 فوروارد به گروه' && in_array($from_id,$Dev)) {
         bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"لطفا متن خود را ارسال کنید 🚀",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"🔙 برگشت"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$user["userjop"]["$from_id"]["file"]="forwardgroup";
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
}
elseif ($textmassage == '📍 فوروارد به کاربران' && in_array($from_id,$Dev)) {
         bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"لطفا متن خود را فوروارد کنید 🚀",
				  'reply_to_message_id'=>$message_id,
				   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"🔙 برگشت"] 
	]
   ],
      'resize_keyboard'=>true
   ])
    		]);
$user["userjop"]["$from_id"]["file"]="forwarduser";
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
}
//-------------------------------------------- @tel_fire ---------------------------------------------
// save id
if ($tc == 'private'){  
@$user = json_decode(file_get_contents("data/user.json"),true);
if(!in_array($from_id, $user["userlist"])) {
$user["userlist"][]="$from_id";
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
    }
}
elseif ($tc == 'group' | $tc == 'supergroup'){  
@$user = json_decode(file_get_contents("data/user.json"),true);
if(!in_array($chat_id, $user["grouplist"])) {
$user["grouplist"][]="$chat_id";
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
    }
}
 // settings inline
	 elseif($data=="other" ){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
         bot('editmessagetext',[
             'chat_id'=>$chatid,
  'message_id'=>$messageid,
  'text'=>"• تنظیمات مدیریت :

» نام گروه : [$gpname]
» ایدی گروه : [$chatid]
",
	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'inline_keyboard'=>[
 [
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
	]
	])
	]);
	}else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
	}
	 }
elseif($data=="settings" ){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
			 $mute_all = $settings2["lock"]["mute_all"];
         bot('editmessagetext',[
             'chat_id'=>$chatid,
  'message_id'=>$messageid,
  'text'=>"⇜ به بخش تنظیمات و مدیریت خوشآمدید :",
	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'inline_keyboard'=>[
 [
 ['text'=>"تنظیمات گروه",'callback_data'=>'other'],['text'=>"قفل کانال و اد اجباری ",'callback_data'=>'panel3']
 ],
 [
 ['text'=>"اطلاعات گروه",'callback_data'=>'groupe'],['text'=>"راهنما",'callback_data'=>'helppanel']
 ],
 [
 ['text'=>"بستن پنل مدیریت",'callback_data'=>'exit']
 ],
 [
 ['text'=>"بازگشت 🔙",'callback_data'=>'back']
 ],
	]
	])
	]);
	}else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
	}
}
  elseif($data=="back"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
   'text'=>"⇜ به فهرست مدیریتی گروه خوشآمدید",
  
    'reply_markup'=>json_encode([
    'resize_keyboard'=>true,
    'inline_keyboard'=>[
   [
   ['text'=>"تنظیمات پیشرفته",'callback_data'=>'settings'],['text'=>"درخواست پشتیبانی",'callback_data'=>'yessup']
   ],
   [
   ['text'=>"بستن پنل مدیریت",'callback_data'=>'exit']
   ],
   [
   ['text'=>"کانال پشتیبانی",'url'=>"https://telegram.me/$channel"]
   ],
   ]
  	])
  	]);
	}else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  	}
  }
if($textmassage=="/panel" or $textmassage=="panel" or $textmassage=="پنل" or $textmassage=="/panel@$usernamebot"){
	if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
	if ($tc == 'group' | $tc == 'supergroup'){  
	$add = $settings["information"]["added"];
if ($add == true) {
  	bot('sendmessage',[
  	'chat_id'=>$chat_id,
  	'text'=>"⇜ به فهرست مدیریتی گروه خوشآمدید",
    'reply_to_message_id'=>$message_id,
  	'reply_markup'=>json_encode([
  	'resize_keyboard'=>true,
  	'inline_keyboard'=>[
   [
   ['text'=>"تنظیمات پیشرفته",'callback_data'=>'settings'],['text'=>"درخواست پشتیبانی",'callback_data'=>'yessup']
   ],
   [
   ['text'=>"بستن پنل مدیریت",'callback_data'=>'exit']
   ],
   [
   ['text'=>"کانال پشتیبانی",'url'=>"https://telegram.me/$channel"]
   ],
   ]
  	])
  	]);
  	}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,
 ]);
    }	
  }
	}
}
	elseif($data=="exit" ){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
            bot('deletemessage',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
	}
elseif($data=="groupe"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$url = file_get_contents("https://api.telegram.org/bot$token/getChatMembersCount?chat_id=$chatid");
$getchat = json_decode($url, true);
$howmember = $getchat["result"];
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• به بخش اطلاعت گروه خوش آمدید🏆

🎲 نام گروه : [$gpname]
🎲ایدی گروه : [$chatid]
🎲تعداد پیام ها : [$messageid]
🎲تعداد کل عضو های گروه : [$howmember]",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"•لینک گروه•",'callback_data'=>"link"],['text'=>"•قوانین گروه•",'callback_data'=>'rules']
				   ],
				   [
				   ['text'=>"•لیست ادمین ها•",'callback_data'=>'adminlist'],['text'=>"•لیست سایلنت•",'callback_data'=>'silentlist']
				   ],
				   [
				   ['text'=>"•لیست فیلتر•",'callback_data'=>'filterword']
				   ],
				   [
				   ['text'=>"بازگشت 🔙",'callback_data'=>'back']
				   ],
                   ]
               ])
           ]);
$settings2["information"]["step"]="none";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
}
	elseif($data=="adminlist"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
  $up = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatAdministrators?chat_id=".$chatid),true);
  $result = $up['result'];
$msg = "";
  foreach($result as $key=>$value){
    $found = $result[$key]['status'];
    if($found == "creator"){
      $owner = $result[$key]['user']['id'];
	  $owner2 = $result[$key]['user']['username'];
    }
if($found == "administrator"){
if($result[$key]['user']['first_name'] == true){
$innames = str_replace(['[',']'],'',$result[$key]['user']['first_name']);
$msg = $msg."\n"."📍"."[{$innames}](tg://user?id={$result[$key]['user']['id']})";
}
  }
		 }
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• صاحب گروه : @$owner2

• لیست ادمین های گروه :
$msg",
'parse_mode'=>"MarkDown",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'groupe']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
	}
	elseif($data=="yessup"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$getlink = file_get_contents("https://api.telegram.org/bot$token/exportChatInviteLink?chat_id=$chatid");
$jsonlink = json_decode($getlink, true);
$getlinkde = $jsonlink['result'];
            bot('sendmessage', [
                'chat_id' =>$Dev[0],
                'text' => "• گروه [$gpname] درخواست پشتیبانی کرده است !

> مشخصات درخواست دهنده :

» ایدی : [ $fromid ]
» نام : [ $firstname ]
» یوزرنیم : [ @$usernames ]

> مشخصات گروه :

» ایدی گروه : [ $chatid ]
» لینک گروه : [ $getlinkde ]",
            ]);
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"» درخواست پشتیبانی شما با موفقیت ثبت شد !
			   درخواست شما بزودی بررسی خواهد شد.",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'back']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
	}
	elseif($data=="filterword"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$filter = $settings2["filterlist"];
for($z = 0;$z <= count($filter)-1;$z++){
$result = $result.$filter[$z]."\n";
}
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• لیست کلمات فیلتر گروه :

$result",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"پاکسازی لیست",'callback_data'=>'cleanfilterlist']
				   ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'groupe']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
	}
		elseif($data=="cleanfilterlist"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"» لیست کلمات فیلتر گروه با موفقیت پاکسازی شد !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'groupe']
					 ],
                     ]
               ])
           ]);
unset($settings2["filterlist"]);
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
	}
	elseif($data=="link"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
		$getlink = file_get_contents("https://api.telegram.org/bot$token/exportChatInviteLink?chat_id=$chatid");
$jsonlink = json_decode($getlink, true);
$getlinkde = $jsonlink['result'];
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"» لینک گروه شما :
$getlinkde ",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'groupe']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
	}
		elseif($data=="rules"){
$text = $settings2["information"]["rules"];
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"» قوانین گروه شما :
$text",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   		   				   [
				   ['text'=>"تنظیم قوانین",'callback_data'=>'setrules']
				   ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'groupe']
					 ],
                     ]
               ])
           ]);

		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
		}
				elseif($data=="setrules"){
$text = $settings2["information"]["rules"];
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"» قوانین گروه خود را ارسال کنید",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'groupe']
					 ],
                     ]
               ])
           ]);
$settings2["information"]["step"]="setrules";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
		}
		elseif($data=="silentlist" ){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$silent = $settings2["silentlist"];
for($z = 0;$z <= count($silent)-1;$z++){
$result = $result.$silent[$z]."\n";
}
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"» لیست افراد ساکت گروه :

$result ",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
				   ['text'=>"پاکسازی لیست",'callback_data'=>'cleansilentlist']
				   ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'groupe']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
		}
				elseif($data=="cleansilentlist"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$silent = $settings2["silentlist"];
for($z = 0;$z <= count($silent)-1;$z++){
 bot('restrictChatMember',[
   'user_id'=>$silent[$z],   
   'chat_id'=>$chatid,
   'can_post_messages'=>true,
   'can_add_web_page_previews'=>false,
   'can_send_other_messages'=>true,
   'can_send_media_messages'=>true,
         ]);
}
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"» لیست افراد سکوت گروه با موفقیت پاکسازی شد !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'groupe']
					 ],
                     ]
               ])
           ]);
unset($settings2["silentlist"]);
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
	}
//====================================== @tel_fire =================================================
									    elseif($data=="restart"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"همه ی تنظیمات گروه به حالت اولیه برمیگردد !

آیا از ریست کردن تنظیمات گروه اطمینان دارید؟️",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[

					 [
					 ['text'=>"بله, اطمینان دارم",'callback_data'=>'yes']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel3']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
													    elseif($data=="yes"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$settings2["lock"]["link"]="┃✘┃";
$settings2["lock"]["photo"]="┃✘┃";
$settings2["lock"]["text"]="┃✘┃";
$settings2["lock"]["tag"]="┃✘┃";
$settings2["lock"]["username"]="┃✘┃";
$settings2["lock"]["sticker"]="┃✘┃";
$settings2["lock"]["video"]="┃✘┃";
$settings2["lock"]["voice"]="┃✘┃";
$settings2["lock"]["audio"]="┃✘┃";
$settings2["lock"]["forward"]="┃✘┃";
$settings2["lock"]["tgservices"]="┃✘┃";
$settings2["lock"]["gif"]="┃✘┃";
$settings2["lock"]["bot"]="┃✘┃";
$settings2["lock"]["document"]="┃✘┃";
$settings2["lock"]["tgservic"]="┃✘┃";
$settings2["lock"]["edit"]="┃✘┃";
$settings2["lock"]["reply"]="┃✘┃";
$settings2["lock"]["contact"]="┃✘┃";
$settings2["lock"]["game"]="┃✘┃";
$settings2["lock"]["cmd"]="┃✘┃";
$settings2["lock"]["mute_all"]="┃✘┃";
$settings2["lock"]["mute_all_time"]="┃✘┃";
$settings2["lock"]["fosh"]="┃✘┃";
$settings2["lock"]["lockauto"]="┃✘┃";
$settings2["lock"]["lockcharacter"]="┃✘┃";
$settings2["lock"]["video_msg"]="┃✘┃";
$settings2["information"]["welcome"]="┃✘┃";
$settings2["information"]["add"]="┃✘┃";
$settings2["information"]["lockchannel"]="┃✘┃";
$settings2["information"]["setadd"]="3";
$settings2["information"]["setwarn"]="3";
$settings2["information"]["textwelcome"]="خوش آمدید";
$settings2["information"]["rules"]="ثبت نشده";
$settings2["information"]["timelock"]="00:00";
$settings2["information"]["timeunlock"]="00:00";
$settings2["information"]["pluscharacter"]="300";
$settings2["information"]["downcharacter"]="0";
$settings2["information"]["step"]="none";
$settings = json_encode($settings,true);
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"» تنظیمات گروه با موفقیت ریست شد !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel3']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
			    elseif($data=="welcome"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$welcome = $settings2["information"]["welcome"];
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• به بخش خوش آمد گویی خوش آمدید.

> لطفا بخش مورد نظر خود را انتخاب کنید !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"خوش آمدگویی : $welcome",'callback_data'=>'pwelcome']
					 ],
					 [
					 ['text'=>"متن خوش آمد",'callback_data'=>'textwelcome']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'settings']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
				    elseif($data=="textwelcome"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$textwelcome = $settings2["information"]["textwelcome"];
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"» متن خوش آمد گویی گروه :
$textwelcome",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'welcome']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
					}
					    elseif($data=="pwelcome" && $settings2["information"]["welcome"] =="┃✓┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• به بخش خوش آمد گویی خوش آمدید.

» خوش آمد گویی گروه خاموش شد !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				     [
                     ['text'=>"خوش آمدگویی : غیر فعال",'callback_data'=>'pwelcome']
					 ],
					 [
					 ['text'=>"متن خوش آمد",'callback_data'=>'textwelcome']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'settings']
					 ],
                     ]
               ])
           ]);
$settings2["information"]["welcome"]="┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		   }
		  else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
						}
						    elseif($data=="pwelcome" && $settings2["information"]["welcome"] == "┃✘┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• به بخش خوش آمد گویی خوش آمدید.

» خوش آمد گویی گروه روشن شد !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				     [
                     ['text'=>"خوش آمدگویی : فعال",'callback_data'=>'pwelcome']
					 ],
					 [
					 ['text'=>"متن خوش آمد",'callback_data'=>'textwelcome']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'settings']
					 ],
                     ]
               ])
           ]);
$settings2["information"]["welcome"]="┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
							}
		  elseif($data=="lockall" && $settings2["lock"]["mute_all"] =="┃✓┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
         bot('editmessagetext',[
             'chat_id'=>$chatid,
  'message_id'=>$messageid,
  'text'=>"
» نام گروه : [$gpname]
» ایدی گروه : [$chatid]

> قفل گروه با موفقیت غیر فعال شد !",
	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'inline_keyboard'=>[
 [
 ['text'=>"تنظیمات گروه",'callback_data'=>'other'],['text'=>"قفل کانال و اد اجباری ",'callback_data'=>'panel3']
 ],
 [
 ['text'=>"اطلاعات گروه",'callback_data'=>'groupe'],['text'=>"راهنما",'callback_data'=>'helppanel']
 ],
 [
 ['text'=>"بستن پنل مدیریت",'callback_data'=>'exit']
 ],
 [
 ['text'=>"بازگشت 🔙",'callback_data'=>'back']
 ],
	]
	])
	]);
$settings2["lock"]["mute_all"]="┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
	}else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
	}
		  }
			  elseif($data=="lockall" && $settings2["lock"]["mute_all"] =="┃✘┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
         bot('editmessagetext',[
             'chat_id'=>$chatid,
  'message_id'=>$messageid,
  'text'=>"• به بخش اول پنل مدیریت گروه خوش آمدید.
  
» نام گروه : [$gpname]
» ایدی گروه : [$chatid]

> قفل گروه با موفقیت فعال شد !",
	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'inline_keyboard'=>[
 [
 ['text'=>"تنظیمات گروه",'callback_data'=>'other'],['text'=>"قفل کانال و اد اجباری ",'callback_data'=>'panel3']
 ],
 [
 ['text'=>"اطلاعات گروه",'callback_data'=>'groupe'],['text'=>"راهنما",'callback_data'=>'helppanel']
 ],
 [
 ['text'=>"بستن پنل مدیریت",'callback_data'=>'exit']
 ],
 [
 ['text'=>"بازگشت 🔙",'callback_data'=>'back']
 ],
	]
	])
	]);
$settings2["lock"]["mute_all"]="┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
	}else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
	}
			  }
			elseif($data=="panel3"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"به بخش ادد اجباری و قفل کانال خوش اومدید",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                    
					 [
					 ['text'=>"بخش اد اجباری",'callback_data'=>'addbzn'],['text'=>"بخش قفل کانال",'callback_data'=>'lockchannel']
					 ],
					 [
					 ['text'=>"ریست تنظیمات",'callback_data'=>'restart']
					 ],
					 [
					 ['text'=>"برگشت",'callback_data'=>'back']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
		}
			      elseif($data=="warn"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$setwarn = $settings2["information"]["setwarn"];
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• به بخش اخطار خوش آمدید.

» در این بخش میتوانید مقدار اخطار را تنظیم کنید

مقدار انتخابی باید بین 1 تا 20 باشد !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"⇩ میزان اخطار ⇩",'callback_data'=>'text']
					 ],
					 [
					 ['text'=>"《",'callback_data'=>'warn-'],['text'=>"$setwarn",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'warn+']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
	}
	elseif($data=="warn+"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$setwarn = $settings2["information"]["setwarn"];
    $manfi = $setwarn + 1;
    if ($manfi <= 20 && $manfi >= 1){
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"• به بخش اخطار خوش آمدید.

» مقدار اخطار افزایش یافت",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
					 [
					 ['text'=>"⇩ میزان اخطار ⇩",'callback_data'=>'text']
					 ],
					 [
					 ['text'=>"《",'callback_data'=>'warn-'],['text'=>"$manfi",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'warn+']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
	]);
$settings2["information"]["setwarn"]="$manfi";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
	}else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
	}
		  }
						}
								  		  		elseif($data=="warn-"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$setwarn = $settings2["information"]["setwarn"];
    $manfi = $setwarn - 1;
    if ($manfi <= 20 && $manfi >= 1){
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"• به بخش اخطار خوش آمدید.

» مقدار اخطار کاهش یافت",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
					 [
					 ['text'=>"⇩ میزان اخطار ⇩",'callback_data'=>'text']
					 ],
					 [
					 ['text'=>"《",'callback_data'=>'warn-'],['text'=>"$manfi",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'warn+']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
	]);
$settings2["information"]["setwarn"]="$manfi";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
	}else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
	}
		  }
						}
											    elseif($data=="hardmode"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$hardmodebot = $settings2["information"]["hardmodebot"];
$hardmodewarn = $settings2["information"]["hardmodewarn"];
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• به بخش حالت سخت گیرانه خوش آمدید.

» از دکمه های زیر استفاده کنید",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"افزودن ربات : $hardmodebot",'callback_data'=>'hardmodebot']
					 ],
					            [
                     ['text'=>"حداکثر اخطار : $hardmodewarn",'callback_data'=>'hardmodewarn']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
						  elseif($data=="hardmodebot" && $settings2["information"]["hardmodebot"] == "اخراج کاربر"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$hardmodewarn = $settings2["information"]["hardmodewarn"];
                    bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• به بخش حالت سخت گیرانه خوش آمدید.

» حالت سخت گیرانه اضافه کردن ربات غیرفعال شد !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"افزودن ربات : غیر فعال",'callback_data'=>'hardmodebot']
					 ],
					            [
                     ['text'=>"حداکثر اخطار : $hardmodewarn",'callback_data'=>'hardmodewarn']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
$settings2["information"]["hardmodebot"]="┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
	}else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
	}
		  }
		  						  elseif($data=="hardmodebot" && $settings2["information"]["hardmodebot"] == "┃✘┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$hardmodewarn = $settings2["information"]["hardmodewarn"];
                    bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• به بخش حالت سخت گیرانه خوش آمدید.

» حالت سخت گیرانه اضافه کردن ربات فعال شد !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"افزودن ربات : فعال",'callback_data'=>'hardmodebot']
					 ],
					            [
                     ['text'=>"حداکثر اخطار : $hardmodewarn",'callback_data'=>'hardmodewarn']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
$settings2["information"]["hardmodebot"]="اخراج کاربر";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
	}else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
	}
		  }
		  						  elseif($data=="hardmodewarn" && $settings2["information"]["hardmodewarn"] == "اخراج کاربر"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$hardmodebot = $settings2["information"]["hardmodebot"];
                    bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• به بخش حالت سخت گیرانه خوش آمدید.

» وضعیت اخطار به حالت سکوت تنظیم شد !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"افزودن ربات : $hardmodebot",'callback_data'=>'hardmodebot']
					 ],
					            [
                     ['text'=>"حداکثر اخطار : سکوت کاربر",'callback_data'=>'hardmodewarn']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
$settings2["information"]["hardmodewarn"]="سکوت کاربر️";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
	}else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
	}
		  }
		  						  elseif($data=="hardmodewarn" && $settings2["information"]["hardmodewarn"] == "سکوت کاربر"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$hardmodebot = $settings2["information"]["hardmodebot"];
                    bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• به بخش حالت سخت گیرانه خوش آمدید.

» وضعیت اخطار به حالت اخراج تنظیم شد !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"افزودن ربات : $hardmodebot",'callback_data'=>'hardmodebot']
					 ],
					            [
                     ['text'=>"حداکثر اخطار : اخراج کاربر",'callback_data'=>'hardmodewarn']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
$settings2["information"]["hardmodewarn"]="اخراج کاربر";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
	}else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
	}
		  }
		  
 if($data=="lockphoto" && $settings2["lock"]["photo"] == "┃✓┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل عکس غیرفعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["photo"]="┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockphoto" && $settings2["lock"]["photo"] == "┃✘┃"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل عکس فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["photo"]="┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockvideo" && $settings2["lock"]["video"] =="┃✓┃"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل فیلم غیرفعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["video"]="┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockvideo" && $settings2["lock"]["video"] =="┃✘┃"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل فیلم فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["video"] = "┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockgame" && $settings2["lock"]["game"] =="┃✓┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل انلاین غیر فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["game"]="┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockgame" && $settings2["lock"]["game"] =="┃✘┃"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل انلاین  فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["game"] = "┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="locksticker" && $settings2["lock"]["sticker"] =="┃✓┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل استیکر غیر  فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["sticker"]="┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="locksticker" && $settings2["lock"]["sticker"] =="┃✘┃"){
	 		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل استیکر فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["sticker"] = "┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockvoice" && $settings2["lock"]["voice"] =="┃✓┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل ویس غیر فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["voice"] = "┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockvoice" && $settings2["lock"]["voice"] =="┃✘┃"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل ویس فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["voice"] = "┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockaudio" && $settings2["lock"]["audio"] =="┃✓┃"){
	 		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل آهنگ غیر فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["audio"] = "┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockaudio" && $settings2["lock"]["audio"] =="┃✘┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل آهنگ فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["audio"] = "┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockforward" && $settings2["lock"]["forward"] =="┃✓┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل فوروارد غیر فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
	]
             ])
         ]);
$settings2["lock"]["forward"] = "┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockforward" && $settings2["lock"]["forward"] =="┃✘┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل فوروارد  فعال شد🎈
",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
	]
             ])
         ]);
$settings2["lock"]["forward"] = "┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockcontact" && $settings2["lock"]["contact"] =="┃✓┃"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل مخاطب غیر  فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["contact"] = "┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockcontact" && $settings2["lock"]["contact"] =="┃✘┃"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل مخاطب   فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["contact"] = "┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockluction" && $settings2["lock"]["location"] =="┃✓┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل مکان غیر   فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["location"] = "┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockluction" && $settings2["lock"]["location"] =="┃✘┃"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل مکان   فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["location"] = "┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockfosh" && $settings2["lock"]["fosh"] =="┃✓┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل فهش غیر   فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
	]
             ])
         ]);
$settings2["lock"]["fosh"] = "┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockfosh" && $settings2["lock"]["fosh"] =="┃✘┃" ){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل فهش  فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
	]
             ])
         ]);
$settings2["lock"]["fosh"] = "┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockedit" && $settings2["lock"]["edit"] =="┃✓┃"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل ادیت غیر  فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
	]
             ])
         ]);
$settings2["lock"]["edit"] = "┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockedit" && $settings2["lock"]["edit"] =="┃✘┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل ادیت  فعال شد🎈
",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
	]
             ])
         ]);
$settings2["lock"]["edit"] = "┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockusername" && $settings2["lock"]["username"] =="┃✓┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل یوزرنیم  غیر فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
	]
             ])
         ]);
$settings2["lock"]["username"] = "┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockusername" && $settings2["lock"]["username"] =="┃✘┃"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل یوزرنیم   فعال شد🎈 ",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
	]
             ])
         ]);
$settings2["lock"]["username"] = "┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
if($data=="locklink" && $settings2["lock"]["link"] == "┃✓┃"){
if($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev)){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل لینک  غیر  فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                  	]
             ])
         ]);
$settings2["lock"]["link"] = "┃✘┃";
$settings2 = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings2);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="locklink" && $settings2["lock"]["link"] == "┃✘┃"){
if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev)){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل لینک   فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                  	]
             ])
         ]);
$settings2["lock"]["link"] = "┃✓┃";
$settings2 = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings2);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockbots2" && $settings2["lock"]["bot"] =="┃✓┃"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل ورود ربات  غیر  فعال شد🎈
",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["bot"] = "┃✘┃";
$settings2 = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings2);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
  elseif($data=="lockbots2" && $settings2["lock"]["bot"] == "┃✘┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل ورود ربات    فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["bot"] = "┃✓┃";
$settings2 = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings2);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
      elseif($data=="lockdocument" &&  $settings2["lock"]["document"] =="┃✓┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل فایل  غیر  فعال شد🎈
",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["document"] = "┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
	  }
  elseif($data=="lockdocument" && $settings2["lock"]["document"] =="┃✘┃"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل فایل   فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["document"] = "┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
        elseif($data=="lockgif" && $settings2["lock"]["gif"] =="┃✓┃"){
				 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل گیف  غیر  فعال شد🎈
",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["gif"] = "┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
		}
  elseif($data=="lockgif" && $settings2["lock"]["gif"] =="┃✘┃"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل گیف   فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["gif"] = "┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
          elseif($data=="locktg" && $settings2["lock"]["tgservic"] =="┃✓┃"){
				 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل پیام های ورود.خروج و.. غیر  فعال شد🎈
",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["tgservic"] = "┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
		  }
  elseif($data=="locktg" && $settings2["lock"]["tgservic"] =="┃✘┃" ){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل پیام های ورود.خروج و.. فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["tgservic"] = "┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
              elseif($data=="lockvideo_note" && $settings2["lock"]["video_msg"] =="┃✓┃"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل پیام ویدیویی غیر فعال شد🎈
",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["video_msg"] = "┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
			  }
  elseif($data=="lockvideo_note" && $settings2["lock"]["video_msg"] == "┃✘┃" ){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل پیام ویدیویی فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["video_msg"] = "┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
                elseif($data=="lockreply" && $settings2["lock"]["reply"] =="┃✓┃"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل ریپلای غیر فعال شد🎈
",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["reply"] = "┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
			}
  elseif($data=="lockreply" && $settings2["lock"]["reply"] =="┃✘┃"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل ریپلای  فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["reply"] = "┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
                  elseif($data=="lockcmd" && $settings2["lock"]["cmd"] =="┃✓┃"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل دستورات عمومی غیر  فعال شد🎈
",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["cmd"] = "┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
			}
  elseif($data=="lockcmd" && $settings2["lock"]["cmd"] =="┃✘┃"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل دستورات عمومی   فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["cmd"] = "┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
               elseif($data=="locktext" && $settings2["lock"]["text"] =="┃✓┃"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل ارسال متن غیر فعال شد🎈
",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["text"] = "┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
			  }
  elseif($data=="locktext" && $settings2["lock"]["text"] == "┃✘┃" ){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل ارسال متن  فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["text"] = "┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  } 
                    elseif($data=="locktag" && $settings2["lock"]["tag"] =="┃✓┃"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل ارسال هشتگ غیر  فعال شد🎈
",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["tag"] = "┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
			}
  elseif($data=="locktag" && $settings2["lock"]["tag"] =="┃✘┃"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$locklink = $settings2["lock"]["link"];
$lockusername = $settings2["lock"]["username"];
$locktag = $settings2["lock"]["tag"];
$lockedit = $settings2["lock"]["edit"];
$lockfosh = $settings2["lock"]["fosh"];
$lockbots = $settings2["lock"]["bot"];
$lockforward = $settings2["lock"]["forward"];
$locktg = $settings2["lock"]["tgservic"];
$lockreply = $settings2["lock"]["reply"];
$lockcmd = $settings2["lock"]["cmd"];
$lockdocument = $settings2["lock"]["document"];
$lockgif = $settings2["lock"]["gif"];
$lockvideo_note = $settings2["lock"]["video_msg"];
$locklocation = $settings2["lock"]["location"];
$lockphoto = $settings2["lock"]["photo"];
$lockcontact = $settings2["lock"]["contact"];
$lockaudio = $settings2["lock"]["audio"];
$lockvoice = $settings2["lock"]["voice"];
$locksticker = $settings2["lock"]["sticker"];
$lockgame = $settings2["lock"]["game"];
$lockvideo = $settings2["lock"]["video"];
$locktext = $settings2["lock"]["text"];
$mute_all = $settings2["lock"]["mute_all"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🌿تنظیمات گروه:
📿 ایدی گپ : [$chatid]
📿 نام گپ : [$gpname]
> قفل ارسال هشتگ  فعال شد🎈",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
[
 ['text'=>"قفل کاراکتر",'callback_data'=>'character'],['text'=>"قفل خودکار",'callback_data'=>'lockauto'],['text'=>"★حساسیت اخطار★",'callback_data'=>'warn']
 ],
 [
 ['text'=>"بخش خوشامد گویی",'callback_data'=>'welcome'],['text'=>"قفل همه : $mute_all ★",'callback_data'=>'lockall'],['text'=>"حالت سختگیرانه",'callback_data'=>'hardmode']
 ],
 [
 ['text'=>"لينک : $locklink",'callback_data'=>'locklink'],['text'=>"فایل: $lockdocument",'callback_data'=>'lockdocument']
 ],
 [
 ['text'=>"هشتگ : $locktag",'callback_data'=>'locktag'],['text'=>"گیف: $lockgif",'callback_data'=>'lockgif']
 ],
 [
 ['text'=>"یوزرنیم : $lockusername",'callback_data'=>'lockusername'],['text'=>"پیام ویدیویی : $lockvideo_note",'callback_data'=>'lockvideo_note']
 ],
 [
 ['text'=>"ویرایش پیام : $lockedit",'callback_data'=>'lockedit'],['text'=>"مکان : $locklocation",'callback_data'=>'lockluction']
 ],
 [
 ['text'=>"فحش : $lockfosh",'callback_data'=>'lockfosh'],['text'=>"تصویر : $lockphoto",'callback_data'=>'lockphoto']
 ],
 [
 ['text'=>"ورود ربات ها : $lockbots",'callback_data'=>'lockbots2'],['text'=>"ارسال شماره : $lockcontact",'callback_data'=>'lockcontact']
 ],
 [
 ['text'=>"فوروارد : $lockforward",'callback_data'=>'lockforward'],['text'=>"موسیقی : $lockaudio",'callback_data'=>'lockaudio']
 ],
 [
 ['text'=>"خدمات تلگرام : $locktg",'callback_data'=>'locktg'],['text'=>"صدا : $lockvoice",'callback_data'=>'lockvoice']
 ],
 [
 ['text'=>"ریپلای : $lockreply",'callback_data'=>'lockreply'],['text'=>"استیکر : $locksticker",'callback_data'=>'locksticker']
 ],
 [
 ['text'=>"دستورات عمومی : $lockcmd",'callback_data'=>'lockcmd'],
 ],
 [
 ['text'=>"بازی : $lockgame",'callback_data'=>'lockgame']
 ],
 [
 ['text'=>"فیلم : $lockvideo",'callback_data'=>'lockvideo']
 ],
 [
 ['text'=>"متن : $locktext",'callback_data'=>'locktext']
 ],
 [
 ['text'=>"برگشت",'callback_data'=>'settings']
 ],
                    ]
             ])
         ]);
$settings2["lock"]["tag"] = "┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		 		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
  }
  }
elseif($textmassage=="/settings" or $textmassage=="settings" or $textmassage=="تنظیمات"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
$locklink = $settings["lock"]["link"];
$lockusername = $settings["lock"]["username"];
$locktag = $settings["lock"]["tag"];
$lockedit = $settings["lock"]["edit"];
$lockfosh = $settings["lock"]["fosh"];
$lockbots = $settings["lock"]["bot"];
$lockforward = $settings["lock"]["forward"];
$locktg = $settings["lock"]["tgservic"];
$lockreply = $settings["lock"]["reply"];
$lockcmd = $settings["lock"]["cmd"];
$lockdocument = $settings["lock"]["document"];
$lockgif = $settings["lock"]["gif"];
$lockvideo_note = $settings["lock"]["video_msg"];
$locklocation = $settings["lock"]["location"];
$lockphoto = $settings["lock"]["photo"];
$lockcontact = $settings["lock"]["contact"];
$lockaudio = $settings["lock"]["audio"];
$lockvoice = $settings["lock"]["voice"];
$locksticker = $settings["lock"]["sticker"];
$lockgame = $settings["lock"]["game"];
$lockvideo = $settings["lock"]["video"];
$locktext = $settings["lock"]["text"];
$mute_all = $settings["lock"]["mute_all"];
$welcome = $settings["information"]["welcome"];
$add = $settings["information"]["add"];
$setwarn = $settings["information"]["setwarn"];
$charge = $settings["information"]["charge"];
$lockauto = $settings["lock"]["lockauto"];
$lockcharacter = $settings["lock"]["lockcharacter"];
$startlock = $settings["information"]["timelock"];
$endlock = $settings["information"]["timeunlock"];
$startlockcharacter = $settings["information"]["pluscharacter"];
$endlockcharacter = $settings["information"]["downcharacter"];
$text = str_replace("| ┃✓┃ |","","تنظیمات گروه بدین شرح است✔️
▫️ دستورات عمومی : $lockcmd
▫️ فایل : $lockdocument
▫️ گیف : $lockgif
▫️ پیام ویدیویی : $lockvideo_note
▫️ ارسال مکان : $locklocation
▫️ تصویر : $lockphoto
▫️ ارسال شماره : $lockcontact
▫️ موسیقی : $lockaudio
▫️ لینک : $locklink
▫️ هشتگ : $locktag
▫️ یوزرنیم : $lockusername
▫️ ویرایش پیام : $lockedit
▫️ فحش : $lockfosh
▫️ ورود ربات : $lockbots
▫️ فوروارد : $lockforward
▫️ خدمات تلگرام : $locktg
▫️ ریپلای : $lockreply
▫️ صدا : $lockvoice
▫️ استیکر : $locksticker
▫️ بازی : $lockgame
▫️ فیلم : $lockvideo
▫️ متن : $locktext
▫️ سکوت همه :  $mute_all
▫️ خوش امد گویی : $welcome
▫️ اد اجباری : $add
▫️ حداکثر اخطار : $setwarn
▫️ قفل خودکار : $lockauto
▫️ زمان شروع سکوت گروه : $startlock
▫️ زمان خاموش شدن سکوت گروه : $endlock
▫️ قفل کاراکتر : $lockcharacter
▫️ حداقل تعداد کاراکتر پیام : $startlockcharacter
▫️ حداکثر تعداد کراکتر پیام : $endlockcharacter
▫️ نام گروه : $namegroup
▫️ ایدی گروه : [$chat_id]
▫️ میزان شارژ گروه : $charge
");
$text2 = str_replace("| ┃✘┃ |","","$text");
	bot('sendmessage',[ 
 'chat_id'=>$chat_id,
 'text'=>"$text2",
'reply_to_message_id'=>$message_id,
   ]);
}
}
//=======================================================================================
if($textmassage=="/filterlist" or $textmassage=="filterlist" or $textmassage=="لیست فیلتر"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)) {
$filter = $settings["filterlist"];
for($z = 0;$z <= count($filter)-1;$z++){
$result = $result.$filter[$z]."\n";
}
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔮 لیست کلمات فیلتر شده :

$result",
         'reply_to_message_id'=>$message_id,

 ]);
}
}
elseif (strpos($textmassage , "/filter ") !== false or strpos($textmassage , "افزودن فیلتر ") !== false) {
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)) {
$add = $settings["information"]["added"];
if ($add == true) {
$text = str_replace(['/filter ','افزودن فیلتر '],'',$textmassage);
bot('sendmessage',[
            'chat_id'=>$chat_id,
            'text'=>"✔️ کلمه  $text به لیست کلمات فیلتر اضافه شد.",
         'reply_to_message_id'=>$message_id,

 ]);
@$settings = json_decode(file_get_contents("data/$chat_id.json"),true);
$settings["filterlist"][]="$text";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,

 ]);
}
}
}
elseif (strpos($textmassage , "/unfilter " ) !== false or strpos($textmassage , "حذف فیلتر ") !== false) {
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)) {
$text = str_replace(['/unfilter ','حذف فیلتر '],'',$textmassage);
bot('sendmessage',[
            'chat_id'=>$chat_id,
            'text'=>"✔️ عبارت  $text  از لیست کلمات فیلتر شده حذف شد.✔️",
         'reply_to_message_id'=>$message_id,

 ]);
@$settings = json_decode(file_get_contents("data/$chat_id.json"),true);
$key = array_search($text,$settings["filterlist"]);
unset($settings["filterlist"][$key]);
$settings["filterlist"] = array_values($settings["filterlist"]); 
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
}
elseif($textmassage=="/clean filterlist" or $textmassage=="clean filterlist" or $textmassage=="حذف لیست فیلتر"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
$add = $settings["information"]["added"];
if ($add == true) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تمامی کلمات فیلتر شده حذف شدند☠️
",
         'reply_to_message_id'=>$message_id,

 ]);
@$settings = json_decode(file_get_contents("data/$chat_id.json"),true);
unset($settings["filterlist"]);
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,

 ]);
}
}
}
// delall
elseif($textmassage == "/delall" or $textmassage == "پاکسازی کلی"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
$add = $settings["information"]["added"];
if ($add == true) {
$time = $settings["information"]["timermsg"];
date_default_timezone_set('Asia/Tehran');
$date1 = date("H:i:s");
if($date1 > $time){
$msg_id = $settings["information"]["msg_id"];	
$manha = $message_id - $msg_id ;
if($manha < 1000){
for($i=$update->message->message_id; $i>= $msg_id; $i--){
bot('deletemessage',[
 'chat_id' =>$update->message->chat->id,
 'message_id' =>$i,
              ]);
}
bot('sendmessage',[
 'chat_id' =>$update->message->chat->id,
 'text' =>"⚠️تمامی پیام ها از زمان فعالسازی ربات جذف شد.
تمامی پیام ها حذف شدند
$manha 
 تعداد پیام های حذف شده🗳",
   ]);
date_default_timezone_set('Asia/Tehran');
$date1 = date("H:i:s");
$date2 = isset($_GET['date']) ? $_GET['date'] : date("H:i:s");;
$next_date = date('H:i:s', strtotime($date2 ."+120 Minutes"));
$settings["information"]["timermsg"]="$next_date";
$settings["information"]["msg_id"]="$message_id";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
$plus = $message_id - 500 ;
for($i=$update->message->message_id; $i>= $plus; $i--){
bot('deletemessage',[
 'chat_id' =>$update->message->chat->id,
 'message_id' =>$i,
              ]);
}
date_default_timezone_set('Asia/Tehran');
$date1 = date("H:i:s");
$date2 = isset($_GET['date']) ? $_GET['date'] : date("H:i:s");;
$next_date = date('H:i:s', strtotime($date2 ."+60 Minutes"));
$settings["information"]["timermsg"]="$next_date";
$settings["information"]["msg_id"]="$message_id";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
}
else
{
bot('sendmessage',[
 'chat_id' =>$update->message->chat->id,
 'text' =>"به دلیل پاکسازی انجام شده قبلی شما تا $time دیگر نمیتوانید از این دستور استفاده بکنید💚",
   ]);
}
}	
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,

 ]);
}
}
}
// lock auto 
											    elseif($data=="lockauto"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$lockauto = $settings2["lock"]["lockauto"];
$timelockauto = $settings2["information"]["timelock"];
$timeunlockauto = $settings2["information"]["timeunlock"];
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"•🎗🎽به بخش قفل خودکار گروه خوش آمدید.
			   
💚در این قسمت میتوانید سکوت گروه را به صورت خودکار تعیین کنید تا در زمان معین شده گروه از حالت سکوت خارج یا سکوت شود🖤",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"🏵وضعیت قفل : $lockauto",'callback_data'=>'lockautostats']
					 ],
					            [
                     ['text'=>"⇩ زمان فعال شدن ⇩",'callback_data'=>'text']
					 ],
					 [
                     ['text'=>"🎗《《",'callback_data'=>'hourlockautodown'],['text'=>"《",'callback_data'=>'minlockautodown'],['text'=>"$timelockauto",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'minlockautoplus'],['text'=>"》》🎗",'callback_data'=>'hourlockautoplus']
					 ],
					 [
                     ['text'=>"⇩ زمان غیر فعال شدن ⇩",'callback_data'=>'text']
					 ],
					 [
                     ['text'=>"🎗《《",'callback_data'=>'hourunlockautodown'],['text'=>"《",'callback_data'=>'minunlockautodown'],['text'=>"$timeunlockauto",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'minunlockautoplus'],['text'=>"》》🎗",'callback_data'=>'hourunlockautoplus']
					 ],

					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
											    elseif($data=="lockautostats" &&  $settings2["lock"]["lockauto"] == "┃✘┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$lockauto = $settings2["lock"]["lockauto"];
$timelockauto = $settings2["information"]["timelock"];
$timeunlockauto = $settings2["information"]["timeunlock"];
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
     'text'=>"•🎗🎽به بخش قفل خودکار گروه خوش آمدید.
			   
قفل خودکار گروه فعال شد ",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"وضعیت قفل : فعال",'callback_data'=>'lockautostats']
					 ],
					            [
                     ['text'=>"⇩ زمان فعال شدن ⇩",'callback_data'=>'text']
					 ],
					 					            [
                     ['text'=>"🎗《《",'callback_data'=>'hourlockautodown'],['text'=>"《",'callback_data'=>'minlockautodown'],['text'=>"$timelockauto",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'minlockautoplus'],['text'=>"》》🎗",'callback_data'=>'hourlockautoplus']
					 ],

					 		            [
                     ['text'=>"⇩ زمان غیر فعال شدن ⇩",'callback_data'=>'text']
					 ],
					 			 					            [
                     ['text'=>"🎗《《",'callback_data'=>'hourunlockautodown'],['text'=>"《",'callback_data'=>'minunlockautodown'],['text'=>"$timeunlockauto",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'minunlockautoplus'],['text'=>"》》🎗",'callback_data'=>'hourunlockautoplus']
					 ],

					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
$settings2["lock"]["lockauto"]="┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
															    elseif($data=="lockautostats" &&  $settings2["lock"]["lockauto"] == "┃✓┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$lockauto = $settings2["lock"]["lockauto"];
$timelockauto = $settings2["information"]["timelock"];
$timeunlockauto = $settings2["information"]["timeunlock"];
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
     'text'=>"•🎗🎽به بخش قفل خودکار گروه خوش آمدید.
			   
» قفل خودکار گروه غیر فعال شد !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"وضعیت قفل : غیر فعال",'callback_data'=>'lockautostats']
					 ],
					            [
                     ['text'=>"⇩ زمان فعال شدن ⇩",'callback_data'=>'text']
					 ],
					 					            [
                     ['text'=>"🎗《《",'callback_data'=>'hourlockautodown'],['text'=>"《",'callback_data'=>'minlockautodown'],['text'=>"$timelockauto",'callback_data'=>'text'],['text'=>"》🎗",'callback_data'=>'minlockautoplus'],['text'=>"》》",'callback_data'=>'hourlockautoplus']
					 ],

					 		            [
                     ['text'=>"⇩ زمان غیر فعال شدن ⇩",'callback_data'=>'text']
					 ],
					 			 					            [
                     ['text'=>"🎗《《",'callback_data'=>'hourunlockautodown'],['text'=>"《",'callback_data'=>'minunlockautodown'],['text'=>"$timeunlockauto",'callback_data'=>'text'],['text'=>"》🎗",'callback_data'=>'minunlockautoplus'],['text'=>"》》",'callback_data'=>'hourunlockautoplus']
					 ],

					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
$settings2["lock"]["lockauto"]="┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
											    elseif($data=="hourlockautoplus"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$lockauto = $settings2["lock"]["lockauto"];
$timelockauto = $settings2["information"]["timelock"];
$timeunlockauto = $settings2["information"]["timeunlock"];
$next_date = date('H:i', strtotime($timelockauto ."+60 Minutes"));
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"•🎗🎽به بخش قفل خودکار گروه خوش آمدید.

» زمان فعال سازی قفل یک ساعت افزایش یافت !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"وضعیت قفل : غیر فعال",'callback_data'=>'lockautostats']
					 ],
					            [
                     ['text'=>"⇩ زمان فعال شدن ⇩",'callback_data'=>'text']
					 ],
					 					            [
                     ['text'=>"🎗《《",'callback_data'=>'hourlockautodown'],['text'=>"《",'callback_data'=>'minlockautodown'],['text'=>"$next_date",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'minlockautoplus'],['text'=>"》》🎗",'callback_data'=>'hourlockautoplus']
					 ],

					 		            [
                     ['text'=>"⇩ زمان غیر فعال شدن ⇩",'callback_data'=>'text']
					 ],
					 			 					            [
                     ['text'=>"🎗《《",'callback_data'=>'hourunlockautodown'],['text'=>"《",'callback_data'=>'minunlockautodown'],['text'=>"$timeunlockauto",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'minunlockautoplus'],['text'=>"》》🎗",'callback_data'=>'hourunlockautoplus']
					 ],

					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
$settings2["information"]["timelock"]="$next_date";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
															    elseif($data=="hourlockautodown"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$lockauto = $settings2["lock"]["lockauto"];
$timelockauto = $settings2["information"]["timelock"];
$timeunlockauto = $settings2["information"]["timeunlock"];
$next_date = date('H:i', strtotime($timelockauto ."-60 Minutes"));
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"•🎗🎽به بخش قفل خودکار گروه خوش آمدید.

» زمان فعال سازی قفل یک ساعت کاهش یافت !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"وضعیت قفل : غیر فعال",'callback_data'=>'lockautostats']
					 ],
					            [
                     ['text'=>"⇩ زمان فعال شدن ⇩",'callback_data'=>'text']
					 ],
					 					            [
                     ['text'=>"🎗《《",'callback_data'=>'hourlockautodown'],['text'=>"《",'callback_data'=>'minlockautodown'],['text'=>"$next_date",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'minlockautoplus'],['text'=>"》》🎗",'callback_data'=>'hourlockautoplus']
					 ],

					 		            [
                     ['text'=>"⇩ زمان غیر فعال شدن ⇩",'callback_data'=>'text']
					 ],
					 			 					            [
                     ['text'=>"🎗《《",'callback_data'=>'hourunlockautodown'],['text'=>"《",'callback_data'=>'minunlockautodown'],['text'=>"$timeunlockauto",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'minunlockautoplus'],['text'=>"》》🎗",'callback_data'=>'hourunlockautoplus']
					 ],

					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
$settings2["information"]["timelock"]="$next_date";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
											    elseif($data=="minlockautoplus"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$lockauto = $settings2["lock"]["lockauto"];
$timelockauto = $settings2["information"]["timelock"];
$timeunlockauto = $settings2["information"]["timeunlock"];
$next_date = date('H:i', strtotime($timelockauto ."+5 Minutes"));
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"•🎗🎽به بخش قفل خودکار گروه خوش آمدید.

» زمان فعال سازی قفل پنج دقیقه افزایش یافت !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"وضعیت قفل : غیر فعال",'callback_data'=>'lockautostats']
					 ],
					            [
                     ['text'=>"⇩ زمان فعال شدن ⇩",'callback_data'=>'text']
					 ],
					 					            [
                     ['text'=>"🎗《《",'callback_data'=>'hourlockautodown'],['text'=>"《",'callback_data'=>'minlockautodown'],['text'=>"$next_date",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'minlockautoplus'],['text'=>"》》🎗",'callback_data'=>'hourlockautoplus']
					 ],

					 		            [
                     ['text'=>"⇩ زمان غیر فعال شدن ⇩",'callback_data'=>'text']
					 ],
					 			 					            [
                     ['text'=>"🎗《《",'callback_data'=>'hourunlockautodown'],['text'=>"《",'callback_data'=>'minunlockautodown'],['text'=>"$timeunlockauto",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'minunlockautoplus'],['text'=>"》》🎗",'callback_data'=>'hourunlockautoplus']
					 ],

					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
$settings2["information"]["timelock"]="$next_date";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
															    elseif($data=="minlockautodown"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$lockauto = $settings2["lock"]["lockauto"];
$timelockauto = $settings2["information"]["timelock"];
$timeunlockauto = $settings2["information"]["timeunlock"];
$next_date = date('H:i', strtotime($timelockauto ."-5 Minutes"));
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"•🎗🎽به بخش قفل خودکار گروه خوش آمدید.

» زمان فعال سازی قفل پنج دقیقه کاهش یافت !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"وضعیت قفل : غیر فعال",'callback_data'=>'lockautostats']
					 ],
					            [
                     ['text'=>"⇩ زمان فعال شدن ⇩",'callback_data'=>'text']
					 ],
					 					            [
                     ['text'=>"🎗《《",'callback_data'=>'hourlockautodown'],['text'=>"《",'callback_data'=>'minlockautodown'],['text'=>"$next_date",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'minlockautoplus'],['text'=>"》》🎗",'callback_data'=>'hourlockautoplus']
					 ],

					 		            [
                     ['text'=>"⇩ زمان غیر فعال شدن ⇩",'callback_data'=>'text']
					 ],
					 			 					            [
                     ['text'=>"🎗《《",'callback_data'=>'hourunlockautodown'],['text'=>"《",'callback_data'=>'minunlockautodown'],['text'=>"$timeunlockauto",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'minunlockautoplus'],['text'=>"》》🎗",'callback_data'=>'hourunlockautoplus']
					 ],

					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
$settings2["information"]["timelock"]="$next_date";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
												    elseif($data=="hourunlockautoplus"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$lockauto = $settings2["lock"]["lockauto"];
$timelockauto = $settings2["information"]["timelock"];
$timeunlockauto = $settings2["information"]["timeunlock"];
$next_date = date('H:i', strtotime($timeunlockauto ."+60 Minutes"));
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"•🎗🎽به بخش قفل خودکار گروه خوش آمدید.

» زمان خاموش شدن قفل یک ساعت افزایش یافت !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"وضعیت قفل : غیر فعال",'callback_data'=>'lockautostats']
					 ],
					            [
                     ['text'=>"⇩ زمان فعال شدن ⇩",'callback_data'=>'text']
					 ],
					 					            [
                     ['text'=>"🎗《《",'callback_data'=>'hourlockautodown'],['text'=>"《",'callback_data'=>'minlockautodown'],['text'=>"$next_date",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'minlockautoplus'],['text'=>"》》🎗",'callback_data'=>'hourlockautoplus']
					 ],

					 		            [
                     ['text'=>"⇩ زمان غیر فعال شدن ⇩",'callback_data'=>'text']
					 ],
					 			 					            [
                     ['text'=>"🎗《《",'callback_data'=>'hourunlockautodown'],['text'=>"《",'callback_data'=>'minunlockautodown'],['text'=>"$timeunlockauto",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'minunlockautoplus'],['text'=>"》》🎗",'callback_data'=>'hourunlockautoplus']
					 ],

					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
$settings2["information"]["timeunlock"]="$next_date";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
																    elseif($data=="hourunlockautodown"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$lockauto = $settings2["lock"]["lockauto"];
$timelockauto = $settings2["information"]["timelock"];
$timeunlockauto = $settings2["information"]["timeunlock"];
$next_date = date('H:i', strtotime($timeunlockauto ."-60 Minutes"));
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"•🎗🎽به بخش قفل خودکار گروه خوش آمدید.

» زمان خاموش شدن قفل یک ساعت کاهش یافت !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"وضعیت قفل : غیر فعال",'callback_data'=>'lockautostats']
					 ],
					            [
                     ['text'=>"⇩ زمان فعال شدن ⇩",'callback_data'=>'text']
					 ],
					 					            [
                     ['text'=>"🎗《《",'callback_data'=>'hourlockautodown'],['text'=>"《",'callback_data'=>'minlockautodown'],['text'=>"$next_date",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'minlockautoplus'],['text'=>"》》🎗",'callback_data'=>'hourlockautoplus']
					 ],

					 		            [
                     ['text'=>"⇩ زمان غیر فعال شدن ⇩",'callback_data'=>'text']
					 ],
					 			 					            [
                     ['text'=>"🎗《《",'callback_data'=>'hourunlockautodown'],['text'=>"《",'callback_data'=>'minunlockautodown'],['text'=>"$timeunlockauto",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'minunlockautoplus'],['text'=>"》》🎗",'callback_data'=>'hourunlockautoplus']
					 ],

					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
$settings2["information"]["timeunlock"]="$next_date";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
																    elseif($data=="minunlockautoplus"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$lockauto = $settings2["lock"]["lockauto"];
$timelockauto = $settings2["information"]["timelock"];
$timeunlockauto = $settings2["information"]["timeunlock"];
$next_date = date('H:i', strtotime($timeunlockauto ."+5 Minutes"));
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"•🎗🎽به بخش قفل خودکار گروه خوش آمدید.

» زمان خاموش شدن قفل پنج دقیقه افزایش یافت !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"وضعیت قفل : غیر فعال",'callback_data'=>'lockautostats']
					 ],
					            [
                     ['text'=>"⇩ زمان فعال شدن ⇩",'callback_data'=>'text']
					 ],
					 					            [
                     ['text'=>"🎗《《",'callback_data'=>'hourlockautodown'],['text'=>"《",'callback_data'=>'minlockautodown'],['text'=>"$next_date",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'minlockautoplus'],['text'=>"》》🎗",'callback_data'=>'hourlockautoplus']
					 ],

					 		            [
                     ['text'=>"⇩ زمان غیر فعال شدن ⇩",'callback_data'=>'text']
					 ],
					 			 					            [
                     ['text'=>"🎗《《",'callback_data'=>'hourunlockautodown'],['text'=>"《",'callback_data'=>'minunlockautodown'],['text'=>"$timeunlockauto",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'minunlockautoplus'],['text'=>"》》🎗",'callback_data'=>'hourunlockautoplus']
					 ],

					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
$settings2["information"]["timeunlock"]="$next_date";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
																				    elseif($data=="minunlockautodown"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$lockauto = $settings2["lock"]["lockauto"];
$timelockauto = $settings2["information"]["timelock"];
$timeunlockauto = $settings2["information"]["timeunlock"];
$next_date = date('H:i', strtotime($timeunlockauto ."-5 Minutes"));
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"•🎗🎽به بخش قفل خودکار گروه خوش آمدید.

» زمان خاموش شدن قفل پنج دقیقه کاهش یافت !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"وضعیت قفل : غیر فعال",'callback_data'=>'lockautostats']
					 ],
					            [
                     ['text'=>"⇩ زمان فعال شدن ⇩",'callback_data'=>'text']
					 ],
					 					            [
                     ['text'=>"🎗《《",'callback_data'=>'hourlockautodown'],['text'=>"《",'callback_data'=>'minlockautodown'],['text'=>"$next_date",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'minlockautoplus'],['text'=>"》》🎗",'callback_data'=>'hourlockautoplus']
					 ],

					 		            [
                     ['text'=>"⇩ زمان غیر فعال شدن ⇩",'callback_data'=>'text']
					 ],
					 			 					            [
                     ['text'=>"《《",'callback_data'=>'hourunlockautodown'],['text'=>"《",'callback_data'=>'minunlockautodown'],['text'=>"$timeunlockauto",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'minunlockautoplus'],['text'=>"》》",'callback_data'=>'hourunlockautoplus']
					 ],

					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
$settings2["information"]["timeunlock"]="$next_date";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
//=======================================================================================
// add kon and dell msg
if($textmassage == "/add on" or $textmassage == "add on" or $textmassage == "دعوت روشن"){
if ($tc == 'group' | $tc == 'supergroup'){  
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
$add = $settings["information"]["added"];
if ($add == true) {
$setadd = $settings["information"]["setadd"];
 bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"🔐قفل اد اجباری در گروه فعال شد.
مقدار اد اجباری : $setadd نفر",
		 'reply_to_message_id'=>$message_id,

   ]);
$settings["information"]["add"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
   } 
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,

 ]);
	}   
}
	}
}
elseif($textmassage == "/add off" or $textmassage == "add off" or $textmassage == "دعوت خاموش"){
if ($tc == 'group' | $tc == 'supergroup'){  
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
$add = $settings["information"]["added"];
if ($add == true) {
$setadd = $settings["information"]["setadd"];
 bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"🔓قفل اد اجباری در گروه غیر فعال شد.",
		 'reply_to_message_id'=>$message_id,

   ]);
$settings["information"]["add"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
   }
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,

 ]);   
}	   
}
	}
}
elseif (strpos($textmassage , '/setadd ') !== false or strpos($textmassage , 'تنظیم دعوت ') !== false ) {
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
$add = $settings["information"]["added"];
if ($add == true) {
$code = str_replace(['/setadd ','تنظیم دعوت '],'',$textmassage);
if($code <= 20 && $code >= 1){
 bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» مقدار اد اجباری به $code نفر تغییر پیدا کرد.🏅",
'reply_to_message_id'=>$message_id,

   ]);
$settings["information"]["setadd"]="$code";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
   } 
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» عددی بین 1 تا 20 وارد کنید.",
  'reply_to_message_id'=>$message_id,

 ]);  
}
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,

 ]);   
}	   
}
}
					elseif($data=="addbzn"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev)){
$add = $settings2["information"]["add"];
$setadd = $settings2["information"]["setadd"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"به بخش اد اجباری خوش اومدید",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
    [
                     ['text'=>"اد اجباری : $add",'callback_data'=>'lockadd']
					 ],
					 [
					 ['text'=>"میزان اد اجباری",'callback_data'=>'text']
					 ],
					 [
					 ['text'=>"کم کردن",'callback_data'=>'add-'],['text'=>"$setadd",'callback_data'=>'text'],['text'=>"افزایش تعداد",'callback_data'=>'add+']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel3']
					 ],
                     ]
               ])
	]);
	}else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
	}
		  }
		elseif($data=="lockadd" && $settings2["information"]["add"] == "┃✓┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev)){
$setadd = $settings2["information"]["setadd"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"به بخش اد اجباری خوش اومدید

❌ادد اجباری خاموش شد",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
    [
					 ['text'=>"اد اجباری : غیر فعال",'callback_data'=>'lockadd']
					 ],
					 [
					 ['text'=>"میزان اد اجباری",'callback_data'=>'text']
					 ],
					 [
					 ['text'=>"کم کردن",'callback_data'=>'add-'],['text'=>"$setadd",'callback_data'=>'text'],['text'=>"افزایش تعداد",'callback_data'=>'add+']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel3']
					 ],
                     ]
               ])
	]);
$settings2["information"]["add"]="┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
	}else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
	}
		  }
		  		elseif($data=="lockadd" && $settings2["information"]["add"] == "┃✘┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev)){
$setadd = $settings2["information"]["setadd"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"به بخش اد اجباری خوش اومدید 

✅ادد اجباری خاموش شد",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
    [
                     ['text'=>"اد اجباری : فعال",'callback_data'=>'lockadd']
					 ],
					 [
					 ['text'=>"میزان اد اجباری",'callback_data'=>'text']
					 ],
					 [
					 ['text'=>"کم کردن",'callback_data'=>'add-'],['text'=>"$setadd",'callback_data'=>'text'],['text'=>"افزایش تعداد",'callback_data'=>'add+']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel3']
					 ],
                     ]
               ])
	]);
$settings2["information"]["add"]="┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
	}else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
	}
		  }
		  		  		elseif($data=="add+"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev)){
$setadd = $settings2["information"]["setadd"];
$add = $settings2["information"]["add"];
$manfi = $setadd + 1;
if($manfi <= 20 && $manfi >= 1){
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"به بخش اد اجباری خوش اومدید 

تعداد اد افزایش یافت ➕",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
    [
                     ['text'=>"اد اجباری : فعال",'callback_data'=>'lockadd']
					 ],
					 [
					 ['text'=>"میزان اد اجباری",'callback_data'=>'text']
					 ],
					 [
					 ['text'=>"کم کردن",'callback_data'=>'add-'],['text'=>"$manfi",'callback_data'=>'text'],['text'=>"افزایش تعداد",'callback_data'=>'add+']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel3']
					 ],
                     ]
               ])
	]);
$settings2["information"]["setadd"]="$manfi";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
}
else
{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"امکان تغییر دیگر وجود ندارد ⚠️",
]);
	}
		 }
	else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
	}
		  }
								  		  		elseif($data=="add-"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev)){
$setadd = $settings2["information"]["setadd"];
$add = $settings2["information"]["add"];
$manfi = $setadd - 1;
    if ($manfi <= 20 && $manfi >= 1){
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"به بخش اد اجباری خوش اومدید 

تعداد اد کاهش یافت ➖",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
    [
                     ['text'=>"اد اجباری : فعال",'callback_data'=>'lockadd']
					 ],
					 [
					 ['text'=>"میزان اد اجباری",'callback_data'=>'text']
					 ],
					 [
					 ['text'=>"کم کردن",'callback_data'=>'add-'],['text'=>"$manfi",'callback_data'=>'text'],['text'=>"افزایش تعداد",'callback_data'=>'add+']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel3']
					 ],
                     ]
               ])
	]);
$settings2["information"]["setadd"]="$manfi";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
}
else
{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"امکان تغییر دیگر وجود ندارد ⚠️",
]);
	}
		 }
	else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
	}
		  }
//=======================================================================================
// lock
// lock link
if($textmassage=="/lock link" or $textmassage=="lock link" or $textmassage=="قفل لینک"){
if ($status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل لینک با موفقیت فعال شد.",
  'reply_to_message_id'=>$message_id,

 ]);
$settings["lock"]["link"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,

 ]);
	}
}
}
elseif($textmassage=="/unlock link" or $textmassage=="unlock link" or $textmassage=="بازکردن لینک"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل لینک با موفقیت غیر فعال شد.",
  'reply_to_message_id'=>$message_id,

 ]);
$settings["lock"]["link"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

 ",
  'reply_to_message_id'=>$message_id,

 ]);
	}
}
}
// lock photo
elseif($textmassage=="/lock photo" or $textmassage=="lock photo" or $textmassage=="قفل عکس"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {	
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» سکوت کردن #عکس با موفقیت فعال شد🔇\n➖➖➖➖➖➖➖\nℹ️پاک کردن عکس با موفقیت فعال شد از این پس ارسال عکس ممنوع میباشد",
  'reply_to_message_id'=>$message_id,

 ]);
$settings["lock"]["photo"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

 ",
  'reply_to_message_id'=>$message_id,

 ]);
	}
}
}
elseif($textmassage=="/unlock photo" or $textmassage=="unlock photo" or $textmassage=="بازکردن عکس"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل عکس غیر فعال شد.",
  'reply_to_message_id'=>$message_id,

 ]);
$settings["lock"]["photo"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

 ",
  'reply_to_message_id'=>$message_id,

 ]);
	}
}
}
// gif
elseif($textmassage=="/lock gif" or $textmassage=="قفل گیف"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل گیف فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["gif"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif($textmassage=="/unlock gif" or $textmassage=="بازکردن گیف"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل گیف غیر فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["gif"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
// document
elseif($textmassage=="/lock document" or $textmassage=="قفل فایل"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
'text'=>"» قفل فایل فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["document"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif($textmassage=="/unlock document" or $textmassage=="بازکردن فایل"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل فایل غیر فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["document"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
// video
elseif($textmassage=="/lock video" or $textmassage=="قفل ویدیو"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل ویدیو فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["video"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif($textmassage=="/unlock video" or $textmassage=="بازکردن ویدیو"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل  ویدیو غیر فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["video"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
// edit
elseif($textmassage=="/lock edit" or $textmassage=="قفل ویرایش"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل ویرایش فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["edit"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif($textmassage=="/unlock edit" or $textmassage=="بازکردن ویرایش"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل ویرایش غیر فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["edit"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
// game
elseif($textmassage=="/lock game" or $textmassage=="قفل بازی"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل بازی فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["game"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif($textmassage=="/unlock game" or $textmassage=="بازکردن بازی"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل بازی غیر فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
 $settings["lock"]["game"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
// location
elseif($textmassage=="/lock location" or $textmassage=="قفل مکان"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل مکان فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["location"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif($textmassage=="/unlock location" or $textmassage=="بازکردن مکان"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل مکان غیر فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["location"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
// contact
elseif($textmassage=="/lock contact" or $textmassage=="قفل مخاطب"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل مخاطب فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["contact"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif($textmassage=="/unlock contact" or $textmassage=="بازکردن مخاطب"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل مخاطب غیر فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["contact"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
// tag
elseif($textmassage=="/lock tag" or $textmassage=="قفل تگ"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل تگ فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["tag"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif($textmassage=="/unlock tag" or $textmassage=="بازکردن تگ"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
'text'=>"» قفل تگ غیر فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["tag"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
// username 
elseif($textmassage=="/lock username" or $textmassage=="قفل یوزرنیم"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل یوزرنیم فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["username"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif($textmassage=="/unlock username" or $textmassage=="بازکردن یوزرنیم"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل یوزرنیم غیر فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["username"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
// audio
elseif($textmassage=="/lock audio" or $textmassage=="قفل اهنگ"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل آهنگ فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["audio"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif($textmassage=="/unlock audio" or $textmassage=="بازکردن اهنگ"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل اهنگ غیر فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["audio"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
// voice
if($textmassage=="/lock voice" or $textmassage=="قفل ویس"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل ویس با موفقیت فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["voice"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif($textmassage=="/unlock voice" or $textmassage=="بازکردن ویس"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل ویس با موفقیت غیرفعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["voice"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
// sticker
elseif($textmassage=="/lock sticker" or $textmassage=="قفل استیکر"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل استیکر با موفقیت فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["sticker"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif($textmassage=="/unlock sticker" or $textmassage=="بازکردن استیکر"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
$add = $settings["information"]["added"];
if ($add == true) {
  	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل استیکر با موفقیت غیرفعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["sticker"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
// forward
elseif($textmassage=="/lock forward" or $textmassage=="قفل فوروارد"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل فوروارد با موفقیت فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["forward"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif($textmassage=="/unlock forward" or $textmassage=="بازکردن فوروارد"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل فوروارد با موفقیت غیرفعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["forward"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
// fosh
elseif($textmassage=="/lock fosh" or $textmassage=="قفل فحش"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل فحش با موفقیت فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["fosh"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif($textmassage=="/unlock fosh" or $textmassage=="بازکردن فحش"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل فحش با موفقیت غیرفعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["fosh"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
// muteall
elseif($textmassage=="/mute all"  or $textmassage=="mute all" or $textmassage=="سکوت همه"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» سکوت همگانی موفقیت فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["mute_all"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif($textmassage=="/unmute all"  or $textmassage=="unmute all" or $textmassage=="باصدا همه"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"سکوت همگانی با موفقیت غیرفعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["mute_all"]="┃✘┃";
$settings["lock"]["mute_all_time"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
// muteall time
elseif (strpos($textmassage , "/muteall ") !== false or strpos($textmassage , "سکوت همه ") !== false) {
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
	$num = str_replace(['/muteall ','سکوت همه '],'',$textmassage);
	$add = $settings["information"]["added"];
if ($add == true) {
	if ($num <= 100000 && $num >= 1){
		date_default_timezone_set('Asia/Tehran');
        $date1 = date("h:i:s");
        $date2 = isset($_GET['date']) ? $_GET['date'] : date("h:i:s");
        $next_date = date('h:i:s', strtotime($date2 ."+$num Minutes"));
			  bot('sendmessage',[
            'chat_id'=>$chat_id,
            'text'=>"» قفل گروه با موفقیت برای $num دقیقه فعال شد.
			
> قفل گروه از ساعت $date1 تا ساعت $next_date فعال خواهد بود !",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
   ]);
$settings["information"]["mute_all_time"]="$next_date";
$settings["lock"]["mute_all_time"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings); 
   }else{
bot('sendmessage',[
 'chat_id' => $chat_id,
 'text'=>"» عدد وارد شده باید بین 1 تا 1000 باشد.
$date1
$nextdata",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
   ]);
}
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
}
}
}
// farsi
if($textmassage=="/lock text" or $textmassage=="قفل متن"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل متن با موفقیت فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["text"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif($textmassage=="/unlock text" or $textmassage=="بازکردن متن"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل متن با موفقیت غیرفعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["text"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
// cmd
elseif($textmassage=="/lock cmd" or $textmassage=="قفل دستورات"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل دستورات با موفقیت فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["cmd"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif($textmassage=="/unlock cmd" or $textmassage=="بازکردن دستورات"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل دستورات با موفقیت غیرفعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["cmd"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
// replay
elseif($textmassage=="/lock reply" or $textmassage=="قفل ریپلای"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل ریپلای با موفقیت فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["reply"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif($textmassage=="/unlock reply" or $textmassage=="بازکردن ریپلای"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل ریپلای با موفقیت غیرفعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["reply"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
// tgservic
elseif($textmassage=="/lock tgservic" or $textmassage=="قفل خدمات"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل خدمات با موفقیت فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["tgservic"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif($textmassage=="/unlock tgservic" or $textmassage=="بازکردن خدمات"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل خدمات با موفقیت غیرفعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["tgservic"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
// video note
elseif($textmassage=="/lock videonote" or $textmassage=="قفل پیام ویدیویی"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل پیام ویدیویی با موفقیت فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["video_msg"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif($textmassage=="/unlock videonote" or $textmassage=="بازکردن پیام ویدیویی"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"☆》» قفل پیام ویدیویی با موفقیت غیرفعال شد",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["video_msg"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
// lock bots
elseif ($textmassage == "/lock bots" or $textmassage == "lock bots" or $textmassage == "قفل ربات") {
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)) {
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل ربات با موفقیت فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["bot"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif ($textmassage == "/unlock bots" or $textmassage == "unlock bots"  or $textmassage == "بازکردن ربات") {
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل ربات با موفقیت غیرفعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["bot"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
// end lock
//=======================================================================================
if($textmassage == "/channel on" or $textmassage == "channel on" or $textmassage == "قفل کانال روشن"){
if ($tc == 'group' | $tc == 'supergroup'){  
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
$add = $settings["information"]["added"];
if ($add == true) {
 bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"» عضویت اجباری کانال با موفقیت فعال شد.",
		 'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
   ]);
$settings["information"]["lockchannel"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
}
}
   }   
}
elseif($textmassage == "/channel off" or $textmassage == "channel off" or $textmassage == "قفل کانال خاموش"){
if ($tc == 'group' | $tc == 'supergroup'){  
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
$add = $settings["information"]["added"];
if ($add == true) {
 bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"» عضویت اجباری کانال با موفقیت غیر فعال شد.",
		 'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
   ]);
$settings["information"]["lockchannel"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
}
}
   }   
}
elseif ( strpos($textmassage , '/setchannel ') !== false or strpos($textmassage , 'تنظیم کانال ') !== false) {
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
$add = $settings["information"]["added"];
if ($add == true) {
$code = $num = str_replace(['/setchannel ','تنظیم کانال '],'',$textmassage);
 bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» کانال عضویت اجباری تنظیم شد.",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
   ]);
$settings["information"]["setchannel"]="$code";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
}
}
   }  
					elseif($data=="lockchannel"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev)){
$add = $settings2["information"]["lockchannel"];
$setadd = $settings2["information"]["setchannel"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🥇به بخش تنظیمات قفل کانال خوش آمدید .

از دکمه های زیر استفاده کنید🎤",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
    [
                     ['text'=>"قفل کانال : $add",'callback_data'=>'channellock']
					 ],
					 [
					 ['text'=>"کانال تنظیم شده : $setadd",'callback_data'=>'text'],['text'=>"تنظیم کانال🙃",'callback_data'=>'setchannel']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
	]);
$settings2["information"]["step"]="none";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
	}else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
	}
		  }
		elseif($data=="channellock" && $settings2["information"]["lockchannel"] == "┃✓┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev)){
$setadd = $settings2["information"]["setchannel"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🥇به بخش تنظیمات قفل کانال خوش آمدید .

» قفل کانال خاموش شد !",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
    [
                     ['text'=>"قفل کانال🎷: غیرفعال",'callback_data'=>'channellock']
					 ],
					 [
					 ['text'=>"کانال تنظیم شده : $setadd",'callback_data'=>'text'],['text'=>"تنظیم کانال🙃",'callback_data'=>'setchannel']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
	]);
$settings2["information"]["lockchannel"]="┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
	}else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
	}
		  }
		  		elseif($data=="channellock" && $settings2["information"]["lockchannel"] == "┃✘┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev)){
$setadd = $settings2["information"]["setchannel"];
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"🥇به بخش تنظیمات قفل کانال خوش آمدید .

» قفل کانال روشن شد !",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
    [
                     ['text'=>"قفل کانال : فعال",'callback_data'=>'channellock']
					 ],
					 [
					 ['text'=>"کانال تنظیم شده : $setadd",'callback_data'=>'text'],['text'=>"تنظیم کانال🙃",'callback_data'=>'setchannel']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
	]);
$settings2["information"]["lockchannel"]="┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
	}else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
	}
		  }
		  		  		elseif($data=="setchannel"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev)){
          bot('editmessagetext',[
              'chat_id'=>$chatid,
   'message_id'=>$messageid,
             'text'=>"💐یوزرنیم کانال خود را همراه با @ ارسال کنید :

هشدار:🔸 ربات حتما باید در کانال تنظیم شده ادمین شود تا بتواند عمل کند",
             'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'lockchannel']
					 ],
                     ]
               ])
	]);
$settings2["information"]["step"]="setchannel";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
	}else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
	}
		  }
// lock auto cmd 
if($textmassage=="/lock auto" or $textmassage=="قفل خودکار روشن"){
if ($status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل خودکار فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["lockauto"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif($textmassage=="/unlock auto" or $textmassage=="قفل خودکار خاموش"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» قفل خودکار غیر فعال شد.",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$settings["lock"]["lockauto"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
	}
}
}
elseif (strpos($textmassage , "/setlockauto ") !== false or strpos($textmassage , "تنظیم قفل خودکار ") !== false) {
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
$num = str_replace(['/setlockauto ','تنظیم قفل خودکار '],'',$textmassage);
$add = $settings["information"]["added"];
if ($add == true) {
$te = explode(" ",$num);
date_default_timezone_set('Asia/Tehran');
$date1 = date("H:i:s");
$startlock = $te[0];
$endlock = $te[1];
			  bot('sendmessage',[
            'chat_id'=>$chat_id,
            'text'=>"» قفل خودکار تنظیم شد.
			
» گروه بصورت خودکار ساعت $startlock قفل و در ساعت $endlock باز میشود !",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
   ]);
$settings["information"]["timelock"]="$startlock";
$settings["information"]["timeunlock"]="$endlock";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings); 
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
}
}
}
//=======================================================================================
//leave and rem
if($textmassage == '/leave'  or $textmassage == 'leave'  or $textmassage == 'ترک'){
if (in_array($from_id,$Dev)){
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"good bye",
  'reply_to_message_id'=>$message_id,

   ]);
bot('LeaveChat',[
  'chat_id'=>$chat_id,
  ]);
  }
}
  elseif($textmassage == '/rem' or $textmassage == 'rem'  or  $textmassage == 'حذف' ){
	  if (in_array($from_id,$Dev)){
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"» گروه از لیست گروه های پشتیبانی ربات حذف شد !",
'reply_to_message_id'=>$message_id,

   ]);
unlink("data/$chat_id.json");
   }  
  }   
 // tools and cmd
 //rules
elseif($textmassage=="/rules" or $textmassage=="rules" or $textmassage=="قوانین"){
if ($tc == 'group' | $tc == 'supergroup'){  
$lockcmd = $settings["lock"]["cmd"];
if ($lockcmd == "┃✘┃") {
$text = $settings["information"]["rules"];
 bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"• قوانین گروه شما :

$text",
		 
		 'reply_to_message_id'=>$message_id,

   ]);
   }   
}
}
elseif (strpos($textmassage , '/setrules ') !== false or strpos($textmassage , 'تنظیم قوانین ') !== false) {
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
$add = $settings["information"]["added"];
if ($add == true) {
$code = str_replace(['/setrules ','تنظیم قوانین '],'',$textmassage);
$plus = mb_strlen("$code");
if($plus < 600) {
 bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"» قوانین جدید  گروه با موفقیت ثبت شد !",
'reply_to_message_id'=>$message_id,

   ]);
$settings["information"]["rules"]="$code";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
	}
else
{
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» تعداد کلمات وارد شد بیش از حد مجاز است حداکثر میتوانید 600 حرف را وارد کنید",
  'reply_to_message_id'=>$message_id,

 ]);
}
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,

 ]);	
}
}
}
//pin
elseif($rt && $textmassage=="/pin"  or $rt && $textmassage=="pin" or $rt && $textmassage=="سنجاق"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
 bot('pinChatMessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$replyid
      ]);
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"» پیام با موفقیت سنجاق شد !",
'reply_to_message_id'=>$message_id,

 ]);
 }
}
elseif($textmassage=="/unpin"  or  $textmassage=="unpin"  or  $textmassage=="حذف سنجاق"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
 bot('unpinChatMessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$replyid
      ]);
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"» پیام با موفقیت از حالت سنجاق برداشته شد !",
'reply_to_message_id'=>$message_id,

 ]);
 }
}
// kick

 elseif($rt && $textmassage=="/ban"  or $rt && $textmassage=="ban" or $rt && $textmassage== "مسدود"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
if ( $statusrt != 'creator' && $statusrt != 'administrator' && !in_array($re_id,$Dev)) {
	bot('KickChatMember',[
    'chat_id'=>$chat_id,
    'user_id'=>$re_id
      ]);
bot('sendmessage',[
    'parse_mode'=>"MarkDown",
	'chat_id'=>$chat_id,
	'text'=>"
» کاربر ( [$re_id](tg://user?id=$re_id) ) از گروه مسدود شد",
'reply_to_message_id'=>$message_id,
	    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
     [
    ['text'=>"$re_name", 'url'=>"https://telegram.me/$re_user"]
    ],
    ]
    ])
   ]);
   } 
else	
{
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» کاربر مورد نظر جزو ( مالکین | سازندگان ) ربات میباشد!",
  'reply_to_message_id'=>$message_id,

 ]);
   }
}
 }
   //del
elseif($rt && $textmassage == "/del" or $rt && $textmassage == "del" or $rt && $textmassage == "حذف"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
 bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$re_msgid
    ]);
	 bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id
    ]);
 }
}
// rmsg
elseif ( strpos($textmassage , '/rmsg ') !== false or strpos($textmassage , 'پاک کردن ') !== false  ) {
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
$num = str_replace(['/rmsg ','پاک کردن '],'',$textmassage);
if ($num <= 300 && $num >= 1){
$add = $settings["information"]["added"];
if ($add == true) {
for($i=$message_id; $i>=$message_id-$num; $i--){
bot('deletemessage',[
 'chat_id' => $chat_id,
 'message_id' =>$i,
              ]);
}
bot('sendmessage',[
 'chat_id' => $chat_id,
 'text' =>"» تعداد [$num] پیام گروه با موفقیت پاک شد",

   ]);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,

 ]);
}
}
else
{
bot('sendmessage',[
 'chat_id' => $chat_id,
 'text'=>"عدد وارد شده باید بین 1 تا 300 باشد",

   ]);
}
}
}
//  setname
elseif ( strpos($textmassage , '/setname ') !== false or strpos($textmassage , 'تنظیم نام ') !== false  ) {
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
$newname= str_replace(['/setname ','تنظیم نام '],'',$textmassage);
 bot('setChatTitle',[
    'chat_id'=>$chat_id,
    'title'=>$newname
      ]);
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"» نام گروه به [$newname] تغییر پیدا کرد !",
'reply_to_message_id'=>$message_id,

   ]);
 }
}
// description
elseif ( strpos($textmassage , '/setdescription ') !== false or strpos($textmassage , 'تنظیم اطلاعات ') !== false  ) {
$newdec= str_replace(['/setdescription ','تنظیم اطلاعات '],'',$textmassage);
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
 bot('setChatDescription',[
    'chat_id'=>$chat_id,
    'description'=>$newdec
      ]);
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"» اطلاعات جدید گروه با موفقیت تغییر کرد !",
'reply_to_message_id'=>$message_id,

   ]);
 }
}
// set photo
elseif($textmassage=="/delphoto" or $textmassage=="delphoto" or $textmassage=="حذف عکس"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
bot('deleteChatPhoto',[
   'chat_id'=>$chat_id,
     ]);
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"» عکس گروه با موفقیت حذف شد !",
'reply_to_message_id'=>$message_id,

   ]);
 }
}
elseif($textmassage=="/setphoto" or $textmassage=="setphoto" or $textmassage=="تنظیم عکس"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
$photo = $update->message->reply_to_message->photo;
$file = $photo[count($photo)-1]->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      	  $getchat = json_decode($get, true);
      $patch = $getchat["result"]["file_path"];
    file_put_contents("data/photogp.png",file_get_contents("https://api.telegram.org/file/bot$token/$patch"));
bot('setChatPhoto',[
   'chat_id'=>$chat_id,
   'photo'=>new CURLFile("data/photogp.png")
     ]);
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"» عکس گروه با موفقیت تغییر کرد !",
'reply_to_message_id'=>$message_id,

   ]);
unlink("data/photogp.png");
 }
}
// link
 elseif($textmassage=="/link" or $textmassage=="link" or $textmassage=="لینک"){
if ($tc == 'group' | $tc == 'supergroup'){  
$lockcmd = $settings["lock"]["cmd"];
if ($lockcmd == "┃✘┃") {
$getlink = file_get_contents("https://api.telegram.org/bot$token/exportChatInviteLink?chat_id=$chat_id");
$jsonlink = json_decode($getlink, true);
$getlinkde = $jsonlink['result'];
bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>"• لینک گروه شما :
   
$getlinkde",
'reply_to_message_id'=>$message_id,

   ]);
 }
 }
 }
// warn
elseif($textmassage=="/warn" or $textmassage=="warn" or $textmassage=="اخطار" && $rt){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
if ($tc == 'group' | $tc == 'supergroup'){
if ( $statusrt != 'creator' && $statusrt != 'administrator' && !in_array($re_id,$Dev)) {
$add = $settings["information"]["added"];
if ($add == true) {
$warn = $settings["warnlist"]["$re_id"];
$setwarn = $settings["information"]["setwarn"];
$warnplus = $warn + 1;	
if ($warnplus >= $setwarn) {
$hardmodewarn = $settings["information"]["hardmodewarn"];
if($hardmodewarn == "اخراج کاربر"){
bot('KickChatMember',[
    'chat_id'=>$chat_id,
    'user_id'=>$re_id
	]);
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» کاربر ( $re_id ) به دلیل رسیدن به حداکثر اخطار ها مسدود شد !",
	'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				    [
                    ['text'=>"$re_name",'url'=>'https://telegram.me/$re_user']
				    ],
				    ]
               ])
   ]);
 }
else
{
   bot('restrictChatMember',[
   'user_id'=>$re_id,   
   'chat_id'=>$chat_id,
   'can_post_messages'=>false,
         ]);
		 	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» کاربر ( $re_id ) به دلیل رسیدن به حداکثر اخطار ها ساکت شد !",
	'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				    [
                    ['text'=>"$re_name",'url'=>'https://telegram.me/$re_user']
				    ],
				    ]
               ])
   ]);
$settings["silentlist"][]="$re_id";
$settings = json_encode($settings,true);
$msg = "[{$re_id}](tg://user?id={$re_id})";
file_put_contents("data/$chat_id.json",$settings);
}
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» کاربر ( $msg ) یک اخطار گرفت !",
'reply_to_message_id'=>$message_id,
	'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				    [
                    ['text'=>"$re_name",'url'=>'https://telegram.me/$re_user']
				    ],
				    ]
               ])
	 
   ]);
$settings["warnlist"]["{$re_id}"]=$warnplus;
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
}
 else
 {
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,

 ]);
 }
 }
else
{
		bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» کاربر مورد نظر جزو ( مالکین | سازندگان ) ربات میباشد!",
  'reply_to_message_id'=>$message_id,

 ]);
}
}
}
}
 elseif($textmassage=="/unwarn" or $textmassage=="unwarn" or $textmassage=="حذف اخطار"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
if ($tc == 'group' | $tc == 'supergroup'){  
$add = $settings["information"]["added"];
if ($add == true) {
$warn = $settings["warnlist"]["$re_id"];
$setwarn = $settings["information"]["setwarn"];
$warnplus = $warn - 1;	
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» کاربر ( $re_id ) یک اخطارش حذف شد.",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				    [
                    ['text'=>"$re_name",'url'=>'https://telegram.me/$re_user']
				    ],
				    ]
               ])

   ]);
$settings["warnlist"]["{$re_id}"]=$warnplus;
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
 }
 else
 {
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,

 ]);
 }
 }
}
}
elseif ( strpos($textmassage , '/setwarn ') !== false or strpos($textmassage , 'تنظیم اخطار ') !== false  ) {
$newdec = str_replace(['/setwarn ','تنظیم اخطار '],'',$textmassage);
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
$add = $settings["information"]["added"];
if ($add == true) {
if ($newdec <= 20 && $newdec >= 1){
bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"» تعداد جداکثر اخطار ها به [$newdec] تغییر پیدا کرد.",
'reply_to_message_id'=>$message_id,

   ]);
$settings["information"]["setwarn"]="$newdec";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
   }else{
bot('sendmessage',[
 'chat_id' => $chat_id,
 'text'=>"» عدد انتخابی باید بین 1 تا 20 باشد !",

   ]);
 }
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,

 ]);
}
}
}
elseif($textmassage=="/warn info" or $textmassage=="warn info" or $textmassage=="اطلاعات اخطار"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
if ($tc == 'group' | $tc == 'supergroup'){  
$warn = $settings["warnlist"]["$re_id"];
$setwarn = $settings["information"]["setwarn"];
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"
تعداد اخطار ها : $warn
حداکثر اخطار : $setwarn",
'reply_to_message_id'=>$message_id,
	 'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				    [
                    ['text'=>"$re_name",'url'=>'https://telegram.me/$re_user']
				    ],
				    ]
               ])
   ]);
 }
 }
 }
// setup and setowner
// add
if($textmassage == "/add" or $textmassage == "add" or $textmassage == "نصب" or $textmassage == "/start@$usernamebot" or $textmassage == "/add@$usernamebot") {
if ($status == 'creator' or in_array($from_id,$Dev)){
$url = file_get_contents("https://api.telegram.org/bot$token/getChatMembersCount?chat_id=$chat_id");
$getchat = json_decode($url, true);
$howmember = $getchat["result"];
$add = $settings["information"]["added"];
$dataadd = $settings["information"]["dataadded"];
if ($add == true) {
bot('sendMessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"» گروه قبلا در لیست گروه های پشتیبانی ربات بوده است !",
  'reply_to_message_id'=>$message_id,
     ]); 
}
else
{
if($howmember >= 1){
bot('sendMessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"» گروه با موفقیت به لیست پشتیبانی ربات اضافه شد !
			
			تمایل دارید مدیریت گروه به صورت اتوماتیک انجام شود؟",
'reply_to_message_id'=>$message_id,
		  	  'reply_markup'=>json_encode([
    'inline_keyboard'=>[
	  	  	 [
				 ['text'=>"بله",'callback_data'=>"auto1"],['text'=>"خیر",'callback_data'=>"auto2"]
		 ],
	 ],
	   ])
 ]); 
		        bot('sendmessage',[
            'chat_id'=>$Dev[0],
            'text'=>"•• یک گروه به لیست گروه های مدیریتی رایگان اضافه شد !

• اطلاعات گروه :

» ایدی گروه : [$chat_id]

» نام گروه : [$namegroup]

» توسط : [ @$username ] 
", 
        ]); 
$dateadd = date('Y-m-d', time());
$dateadd2 = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
$next_date = date('Y-m-d', strtotime($dateadd2 ." +2 day"));
        $settings = '{"lock": {
                "text": "┃✘┃",
                "photo": "┃✘┃",
                "link": "┃✘┃",
                "tag": "┃✘┃",
				"username": "┃✘┃",
                "sticker": "┃✘┃",
                "video": "┃✘┃",
                "voice": "┃✘┃",
                "audio": "┃✘┃",
                "gif": "┃✘┃",
                "bot": "┃✘┃",
                "forward": "┃✘┃",
                "document": "┃✘┃",
                "tgservic": "┃✘┃",
				"edit": "┃✘┃",
				"reply": "┃✘┃",
				"contact": "┃✘┃",
				"location": "┃✘┃",
				"game": "┃✘┃",
				"cmd": "┃✘┃",
				"mute_all": "┃✘┃",
				"mute_all_time": "┃✘┃",
				"fosh": "┃✘┃",
				"lockauto": "┃✘┃",
				"lockcharacter": "┃✘┃",
				"video_msg": "┃✘┃"
			},
			"information": {
            "added": "true",
			"welcome": "┃✘┃",
			"add": "┃✘┃",
			"lockchannel": "┃✘┃",
			"hardmodebot": "┃✘┃",
			"hardmodewarn": "سکوت کاربر️",
			"charge": "7 روز",
			"setadd": "3",
			"dataadded": "",
			"expire": "",
			"textwelcome": "خوش امدید",
			"rules": "ثبت نشده",
			"msg": "",
			"timelock": "00:00",
			"timeunlock": "00:00",
			"pluscharacter": "300",
			"downcharacter": "0",
			"setwarn": "3"
			}
}';
        $settings = json_decode($settings,true);
		$settings["information"]["expire"]="$next_date";
		$settings["information"]["dataadded"]="$dateadd";
		$settings["information"]["msg_id"]="$message_id";
        $settings = json_encode($settings,true);
        file_put_contents("data/$chat_id.json",$settings);
$gpadd = fopen("data/group.txt",'a') or die("Unable to open file!");  
fwrite($gpadd, "نام گروه : [$namegroup] | ایدی گروه : [$chat_id]\n");
fclose($gpadd);
}
else
{
if ($add != true) {
bot('sendMessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"برای فعالسازی ربات گروه باید حداقل 20 عضو داشته باشد !
			
			لطفا اعضای گروه را افزایش دهید سپس دوباره امتحان کنید.",
  'reply_to_message_id'=>$message_id,
     ]); 
	 bot('LeaveChat',[
  'chat_id'=>$chat_id,
  ]);
}
}
}
}
}
//add
elseif ($textmassage == "/adds"  or $textmassage == "adds" or $textmassage == "نصب") {
if (in_array($from_id,$Dev)){
if ($tc == 'group' | $tc == 'supergroup'){
$add = $settings["information"]["added"];
if ($add != true) {
bot('sendMessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"» گروه با موفقیت به لیست پشتیبانی ربات اضافه شد !",
'reply_to_message_id'=>$message_id,
		  	  'reply_markup'=>json_encode([
    'inline_keyboard'=>[
	  	  	 [
				 ['text'=>"پنل گروه",'callback_data'=>"back"],['text'=>"راهنمای دستورات",'callback_data'=>"help"]
		 ],

	 ],
	   ])
 ]);  
 		        bot('sendmessage',[
            'chat_id'=>$Dev[0],
            'text'=>"•• یک گروه توسط ادمین اضافه شد !

• اطلاعات گروه :

» ایدی گروه : [$chat_id]

» نام گروه : [$namegroup]

» توسط : [ @$username ] 
", 
        ]); 
$dateadd = date('Y-m-d', time());
$dateadd2 = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
$next_date = date('Y-m-d', strtotime($dateadd2 ." +10 day"));
        $settings = '{"lock": {
                "text": "┃✘┃",
                "photo": "┃✘┃",
                "link": "┃✘┃",
                "tag": "┃✘┃",
				"username": "┃✘┃",
                "sticker": "┃✘┃",
                "video": "┃✘┃",
                "voice": "┃✘┃",
                "audio": "┃✘┃",
                "gif": "┃✘┃",
                "bot": "┃✘┃",
                "forward": "┃✘┃",
                "document": "┃✘┃",
                "tgservic": "┃✘┃",
				"edit": "┃✘┃",
				"reply": "┃✘┃",
				"contact": "┃✘┃",
				"location": "┃✘┃",
				"game": "┃✘┃",
				"cmd": "┃✘┃",
				"mute_all": "┃✘┃",
				"mute_all_time": "┃✘┃",
				"fosh": "┃✘┃",
				"lockauto": "┃✘┃",
				"lockcharacter": "┃✘┃",
				"video_msg": "┃✘┃"
			},
			"information": {
            "added": "true",
			"welcome": "┃✘┃",
			"add": "┃✘┃",
			"lockchannel": "┃✘┃",
			"hardmodebot": "┃✘┃",
			"hardmodewarn": "سکوت کاربر️",
			"charge": "7 روز",
			"setadd": "3",
			"dataadded": "",
			"expire": "",
			"msg": "",
			"timelock": "00:00",
			"timeunlock": "00:00",
			"pluscharacter": "300",
			"downcharacter": "0",
			"textwelcome": "خوش امدید",
			"rules": "ثبت نشده",
			"setwarn": "3"
			}
}';
        $settings = json_decode($settings,true);
		$settings["information"]["expire"]="$next_date";
		$settings["information"]["dataadded"]="$dateadd";
		$settings["information"]["msg_id"]="$message_id";
        $settings = json_encode($settings,true);
        file_put_contents("data/$chat_id.json",$settings);
$gpadd = fopen("data/group.txt",'a') or die("Unable to open file!");  
fwrite($gpadd, "نام گروه : [$namegroup] | ایدی گروه : [$chat_id]\n");
fclose($gpadd);
}
else
{
$dataadd = $settings["information"]["dataadded"];
bot('sendMessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"» گروه قبلا در لیست گروه های پشتیبانی ربات بوده است !",
  'reply_to_message_id'=>$message_id,
     ]); 
}
}
}
}
//automatic

					 elseif($data=="auto1"){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"» مدیریت خودکار گروه فعال شد.
			   
			   لطفا بخش مورد نطر خود را انتخاب کنید !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
	  	  	 [
				 ['text'=>"پنل گروه",'callback_data'=>"back"]
				 ],
				 [
				 ['text'=>"راهنمای دستورات",'callback_data'=>"help"]
		 ],
	 ]
               ])
           ]);
		$settings["lock"]["link"]="┃✓┃";
		$settings["lock"]["username"]="┃✓┃";
		$settings["lock"]["bot"]="┃✓┃";
		$settings["lock"]["forward"]="┃✓┃";
		$settings["lock"]["tgservices"]="┃✓┃";
		$settings["lock"]["contact"]="┃✓┃";
        $settings = json_encode($settings,true);
        file_put_contents("data/$chat_id.json",$settings);
    }
					 elseif($data=="auto2"){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"» مدیریت خودکار گروه غیر فعال شد.
			   
			   لطفا بخش مورد نطر خود را انتخاب کنید !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
	  	  	 [
				 ['text'=>"پنل گروه",'callback_data'=>"back"]
				 ],
				 [
				 ['text'=>"راهنمای دستورات",'callback_data'=>"help"]
		 ],
	 ]
               ])
           ]);
    }
// setwelcome
if (strpos($textmassage , "/setwelcome ") !== false or strpos($textmassage , "تنظیم خوش امد ") !== false ) {
if ($status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)) {
$add = $settings["information"]["added"];
if ($add == true) {
$we = str_replace(['/setwelcome ','تنظیم خوش امد '],'',$textmassage);
$plus = mb_strlen("$we");
if($plus < 600) {
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» متن خوش امد گویی با موفقیت تغییر کرد.

$we",
  'reply_to_message_id'=>$message_id,

 ]);
$settings["information"]["textwelcome"]="$we";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
	}
else
{
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» تعداد کلمات وارد شد بیش از حد مجاز است حداکثر میتوانید 600 حرف را وارد کنید",
  'reply_to_message_id'=>$message_id,

 ]);
}
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,

 ]);	
}
}
}
// welcome enbale and disable
elseif ($textmassage == "/welcome enable"  or $textmassage == "welcome enable" or $textmassage == "خوش امد روشن") {
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)) {
$add = $settings["information"]["added"];
if ($add == true) {
$text = $settings["information"]["textwelcome"];
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» خوش امد گویی روشن شد.

متن خوش امد :
[$text]",
  'reply_to_message_id'=>$message_id,

 ]);
$settings["information"]["welcome"]="┃✓┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
	}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,

 ]);
}
}
}
elseif ($textmassage == "/welcome disable"  or $textmassage == "welcome disable" or $textmassage == "خوش امد خاموش") {
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)) {
$add = $settings["information"]["added"];
if ($add == true) {
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» خوش امد گویی خاموش شد.",
  'reply_to_message_id'=>$message_id,

 ]);
$settings["information"]["welcome"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
	}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,

 ]);
}
}
}
// report
elseif ($rt && $textmassage=="/report" or $rt && $textmassage=="report" or $rt && $textmassage=="ارسال گزارش" ) {
$lockcmd = $settings["lock"]["cmd"];
if ($lockcmd == "┃✘┃") {
$getlink = file_get_contents("https://api.telegram.org/bot$token/exportChatInviteLink?chat_id=$chat_id");
$jsonlink = json_decode($getlink, true);
$getlinkde = $jsonlink['result'];
$up = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatAdministrators?chat_id=".$chat_id),true);
$result = $up['result'];
        bot('sendmessage',[
            'chat_id'=>$chat_id,
            'text'=>"» گذارش شما با موفقیت ثبت شد.",
'reply_to_message_id'=>$message_id,

 ]);
  foreach($result as $key=>$value){
    $found = $result[$key]['status'];
    if($found == "creator"){
      $owner = $result[$key]['user']['id'];
    }
	        bot('sendmessage',[
            'chat_id'=>$owner,
            'text'=>"• یک مورد توسط اعضا گذارش شده است !

> اطلاعات کاربر گذارش دهنده :

» ایدی : [ $from_id ]
» نام : [ $first_name ]
» یوزرنیم : [ @$username ]

> اطلاعات کاربر گذارش شده :

» ایدی : [ $re_id ]
» نام : [ $re_name ]
» یوزرنیم : [ @$re_user ]

> مشخصات گروه :

» ایدی گروه : [ $chat_id ]
» نام گروه : [ $namegroup ]
» لینک گروه : [ $getlinkde  ]
",
        ]);
        bot('forwardMessage',[
            'chat_id'=>$owner,
            'from_chat_id'=>$chat_id,
            'message_id'=>$replyid,
        ]);
}
}
}
// support 
elseif ($textmassage=="/startgap" or $textmassage=="support" or $textmassage=="درخواست پشتیبانی" ) {
$lockcmd = $settings["lock"]["cmd"];
if ($lockcmd == "┃✘┃") {
$getlink = file_get_contents("https://api.telegram.org/bot$token/exportChatInviteLink?chat_id=$chat_id");
$jsonlink = json_decode($getlink, true);
$getlinkde = $jsonlink['result'];
            bot('sendmessage', [
                'chat_id' =>$Dev[0],
                'text' => "• گروه [$namegroup] درخواست پشتیبانی کرده است !

> مشخصات درخواست دهنده :

» ایدی : [ $from_id ]
» نام : [ $first_name ]
» یوزرنیم : [ @$username ]

> مشخصات گروه :

» ایدی گروه : [ $chat_id ]
» لینک گروه : [ $getlinkde  ]",
            ]);
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text'=>"» درخواست پشتیبانی شما با موفقیت ثبت شد !
			   درخواست شما بزودی بررسی خواهد شد.",
'reply_to_message_id'=>$message_id,

 ]);
        }
}
// hardmode
elseif($textmassage=="/modebot on" or $textmassage=="سختگیرانه ربات روشن"){
if ($status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» حالت سختگیرانه افزودن ربات فعال شد.",
  'reply_to_message_id'=>$message_id,

 ]);
$settings["information"]["hardmodebot"]="اخراج کاربر";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,

 ]);
	}
}
}
elseif($textmassage=="/modebot off" or $textmassage=="سختگیرانه ربات خاموش"){
if ($status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» حالت سختگیرانه افزودن ربات غیر فعال شد.",
  'reply_to_message_id'=>$message_id,

 ]);
$settings["information"]["hardmodebot"]="┃✘┃";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,

 ]);
	}
}
}
elseif($textmassage=="/modewarn on" or $textmassage=="سختگیرانه اخطار روشن"){
if ($status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» حالت سختگیرانه اخطار فعال شد.",
  'reply_to_message_id'=>$message_id,

 ]);
$settings["information"]["hardmodewarn"]="اخراج کاربر";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,

 ]);
	}
}
}
elseif($textmassage=="/modewarn off" or $textmassage=="سختگیرانه اخطار خاموش"){
if ($status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ){
$add = $settings["information"]["added"];
if ($add == true) {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» حالت سختگیرانه اخطار غیر فعال شد.",
  'reply_to_message_id'=>$message_id,

 ]);
$settings["information"]["hardmodewarn"]="سکوت کاربر️";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,

 ]);
	}
}
}
//=======================================================================================
// restart settings
if($textmassage=="/restart settings" or $textmassage=="restart settings" or $textmassage=="ریست تنظیمات"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)) {
$add = $settings["information"]["added"];
if ($add == true) {
bot('sendmessage',[
'reply_to_message_id'=>$message_id,
 'chat_id'=>$chat_id,
 'text'=>"» اگر از ریست کردن تنظیمات گروه اطمینان دارید بله را ارسال کنید",
 ]);
$settings["information"]["step"]="reset";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !",
  'reply_to_message_id'=>$message_id,

 ]);
	}
 }
}
// kick me
elseif($textmassage=="/kickme" or $textmassage=="kickme" or $textmassage=="اخراج من"){
$lockcmd = $settings["lock"]["cmd"];
if ($lockcmd == "┃✘┃") {
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
bot('KickChatMember',[
'parse_mode'=>"MarkDown",
    'chat_id'=>$chat_id,
    'user_id'=>$from_id
	]);
              bot('sendmessage', [
                'chat_id' => $chat_id,
             'text'=>"» کاربر ( [$from_id](tg://user?id=$from_id) ) به خواسته خودش اخراج شد.",

 ]);
 }
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» شما جزو ( مالکین | سازندگان ) ربات میباشید و من نمیتوانم شما را اخراج کنم.",
  'reply_to_message_id'=>$message_id,

 ]);
}
}
}
// silent
elseif($textmassage == "/silent" && $rt or $textmassage == "silent" && $rt or $textmassage == "سکوت" && $rt){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)) {
if ( $statusrt != 'creator' && $statusrt != 'administrator' && !in_array($re_id,$Dev)) {
$add = $settings["information"]["added"];
if ($add == true){
   bot('restrictChatMember',[
   'user_id'=>$re_id,   
   'chat_id'=>$chat_id,
   'can_post_messages'=>false,
         ]);
  bot('sendMessage',[
'parse_mode'=>"MarkDown",
'chat_id'=>$chat_id,
'text'=>"» کاربر ( [$re_id](tg://user?id=$re_id) ) در حالت سکوت قرار گرفت.",
'reply_to_message_id'=>$re_msgid,
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
     [
    ['text'=>"$re_name", 'url'=>"https://telegram.me/$re_user"]
    ],
	[
	
	]
    ]
    ])
]);
$settings["silentlist"][]="$re_id";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,

 ]);
 }
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» کاربر مورد نظر جزو ( مالکین | سازندگان ) ربات میباشد!",
  'reply_to_message_id'=>$message_id,

 ]);
}
}
}

elseif (strpos($textmassage , "/silent ") !== false && $rt or strpos($textmassage , "سکوت ") !== false && $rt) {
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)) {
if ( $statusrt != 'creator' && $statusrt != 'administrator' && !in_array($re_id,$Dev)) {
$add = $settings["information"]["added"];
$we = str_replace(['/silent ','سکوت '],'',$textmassage);
if ($we <= 1000 && $we >= 1){
if ($add == true) {
$weplus = $we + 5;
	bot('sendmessage',[
	'parse_mode'=>"MarkDown",
	'chat_id'=>$chat_id,
	'text'=>"» کاربر ( [$re_id](tg://user?id=$re_id) ) به مدت ( $we ) ثانیه در حالت سکوت قرار گرفت.",
  'reply_to_message_id'=>$message_id,
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
     [
    ['text'=>"$re_name", 'url'=>"https://telegram.me/$re_user"]
    ],
	[
	
	]
    ]
    ])
 ]);
    bot('restrictChatMember',[
   'user_id'=>$re_id,   
   'chat_id'=>$chat_id,
   'can_post_messages'=>false,
   'until_date'=>time()+$weplus*60,
         ]);
$settings["silentlist"][]="$re_id";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,

 ]);
}
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» عدد وارد شده باید بین 1 تا 100 باشد.",
  'reply_to_message_id'=>$message_id,

 ]);
}
}
else
{
bot('sendmessage',[
 'chat_id' => $chat_id,
 'text'=>"» کاربر مورد نظر جزو ( مالکین | سازندگان ) ربات میباشد!",

   ]);
}
}
}
elseif($textmassage == "/unsilent" && $rt or $textmassage == "unsilent" && $rt or $textmassage == "باصدا" && $rt){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev) ) {
$add = $settings["information"]["added"];
if ($add == true) {
 bot('restrictChatMember',[
   'user_id'=>$re_id,   
   'chat_id'=>$chat_id,
   'can_post_messages'=>true,
   'can_add_web_page_previews'=>false,
   'can_send_other_messages'=>true,
   'can_send_media_messages'=>true,
         ]);
  bot('sendMessage',[
'parse_mode'=>"MarkDown",
  'chat_id'=>$chat_id,
'text'=>"» کاربر ( [$re_id](tg://user?id=$re_id) ) از حالت سکوت خارج شد.",
'reply_to_message_id'=>$re_msgid,
 
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
     [
    ['text'=>"$re_name", 'url'=>"https://telegram.me/$re_user"]
    ],
	[
	
	]
    ]
    ])
]);
$key = array_search($re_id,$settings["silentlist"]);
unset($settings["silentlist"][$key]);
$settings["silentlist"] = array_values($settings["silentlist"]); 
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,

 ]);
}
}
}
elseif($textmassage == "/list silent"  or $textmassage == "list silent" or $textmassage == "لیست سکوت") {
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)) {
$silent = $settings["silentlist"];
for($z = 0;$z <= count($silent)-1;$z++){
$result = $result.$silent[$z]."\n";
}
	  bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لیست کابران سکوت گروه : 

$result",
'reply_to_message_id'=>$message_id,

 ]);
}
}
elseif($textmassage == "/clean silentlist"  or $textmassage == "clean silentlist" or $textmassage == "حذف لیست سکوت") {
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)) {
$add = $settings["information"]["added"];
if ($add == true) {
$silent = $settings["silentlist"];
for($z = 0;$z <= count($silent)-1;$z++){
 bot('restrictChatMember',[
   'user_id'=>$silent[$z],   
   'chat_id'=>$chat_id,
   'can_post_messages'=>true,
   'can_add_web_page_previews'=>false,
   'can_send_other_messages'=>true,
   'can_send_media_messages'=>true,
         ]);
}
	  bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"» لیست کابران ساکت گروه با موفقیت پاکسازی شد.",
'reply_to_message_id'=>$message_id,

 ]);
unset($settings["silentlist"]);
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
}
else
{
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👑 ربات در گروه شما نصب نیست !

",
  'reply_to_message_id'=>$message_id,

 ]);
}
}
}
// promote
elseif($textmassage=="/promote" or $textmassage=="promote" or $textmassage=="ترفیع"){
if ( $status == 'creator' or in_array($from_id,$Dev)) {
bot('sendmessage',[
'parse_mode'=>"MarkDown",
'chat_id'=>$chat_id,
'text'=>"» کاربر  ( [$re_id](tg://user?id=$re_id) ) به لیست مدیران گروه اضافه شد.",
'reply_to_message_id'=>$message_id,
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
     [
    ['text'=>"$re_name", 'url'=>"https://telegram.me/$re_user"]
    ],
	[
	
	]
    ]
    ])
 ]);
 bot('promoteChatMember',[
 'chat_id'=>$chat_id,
  'user_id'=>$re_id,
 'can_change_info'=>True,
  'can_delete_messages'=>True,
  'can_invite_users'=>True,
  'can_restrict_members'=>True,
  'can_pin_messages'=>True,
  'can_promote_members'=>false
]);
	}
}
elseif($textmassage=="/demote" or $textmassage=="demote" or $textmassage=="تنزل"){
if ( $status == 'creator' or in_array($from_id,$Dev)) {
bot('sendmessage',[
'parse_mode'=>"MarkDown",
'chat_id'=>$chat_id,
'text'=>"» کاربر  ( [$re_id](tg://user?id=$re_id) ) از لیست مدیران گروه حذف شد.",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
      'inline_keyboard'=>[
     [
    ['text'=>"$re_name", 'url'=>"https://telegram.me/$re_user"]
    ],
	[
	
	]
    ]
    ])
 ]);
 bot('restrictChatMember',[
   'user_id'=>$re_id,   
   'chat_id'=>$chat_id,
   'can_post_messages'=>true,
   'can_add_web_page_previews'=>false,
   'can_send_other_messages'=>true,
   'can_send_media_messages'=>true,
         ]);
	}
}
// admin list
elseif($textmassage=="/admin list" or $textmassage=="admin list" or $textmassage=="لیست ادمین"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)) {
  $up = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatAdministrators?chat_id=".$chat_id),true);
  $result = $up['result'];
  foreach($result as $key=>$value){
    $found = $result[$key]['status'];
    if($found == "creator"){
      $owner = $result[$key]['user']['id'];
	  $owner2 = $result[$key]['user']['username'];
    }
if($found == "administrator"){
if($result[$key]['user']['first_name'] == true){
$innames = str_replace(['[',']'],'',$result[$key]['user']['first_name']);
$msg = $msg."\n"."» "."[{$innames}](tg://user?id={$result[$key]['user']['id']})";
}
  }
		 }
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"> صاجب گروه :
[$owner](tg://user?id=$owner)

> ادمین های گروه :$msg",
'reply_to_message_id'=>$message_id,

'parse_mode'=>"MarkDown",
 ]);
	}
}
  // text callback
elseif ($data == 'text'){
bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"امکان تغییر این بخش وجود ندارد ⚠️",
]);
}
//=======================================================================================
//time 
$dt = json_decode(file_get_contents("https://Api.MahdiElvis.ir/date-time"));
$date = $dt->FAdate;
$dateE = $dt->ENdate;
$time = $dt->ENtime;
$timeF = $dt->FAtime;
if($textmassage=="time" or $textmassage=="ساعت" or $textmassage=="time"){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
$lockcmd = $settings["lock"]["cmd"];
if ($lockcmd == "┃✘┃") {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"امروز : $date
ساعت: $timeF

Today :$dateE
Time : $time",
'reply_to_message_id'=>$message_id,
   ]);
   }  
}
else
{
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"امروز : $date
ساعت: $timeF

Today :$dateE
Time : $time",
'reply_to_message_id'=>$message_id,
   ]);
}
}
// id
if($rt && $textmassage =="/id" or $rt && $textmassage =="ایدی" or $rt && $textmassage =="id"){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
$lockcmd = $settings["lock"]["cmd"];
if ($lockcmd == "┃✘┃") {
$getuserprofile = getUserProfilePhotos($token,$re_id);
$cuphoto = $getuserprofile->total_count;
$getuserphoto = $getuserprofile->photos[0][0]->file_id;
if ($getuserphoto != false) {
  bot('sendmessage',[
  'chat_id'=>$chat_id,
  'text'=>"
» ایدی : [$re_id]
» ایدی گروه : [$chat_id]",
'reply_to_message_id'=>$message_id,
   ]);
   }  
else
{
  bot('sendmessage',[
  'chat_id'=>$chat_id,
  'text'=>"
» ایدی : [$re_id]
» ایدی گروه : [$chat_id]",
'reply_to_message_id'=>$message_id,
   ]);
   }  
}
}   
else
{
$getuserprofile = getUserProfilePhotos($token,$re_id);
$cuphoto = $getuserprofile->total_count;
$getuserphoto = $getuserprofile->photos[0][0]->file_id;
  bot('sendmessage',[
  'chat_id'=>$chat_id,
  'text'=>"
» ایدی : [$re_id]
» ایدی گروه : [$chat_id]",

   ]);
   }
   }
elseif($textmassage=="/id" or $textmassage=="ایدی" or $textmassage=="id"){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
$lockcmd = $settings["lock"]["cmd"];
if ($lockcmd == "┃✘┃") {
$getuserprofile = getUserProfilePhotos($token,$from_id);
$cuphoto = $getuserprofile->total_count;
$getuserphoto = $getuserprofile->photos[0][0]->file_id;
if ($getuserphoto != false) {
  bot('sendmessage',[
      'parse_mode'=>"MarkDown",
  'chat_id'=>$chat_id,
  'text'=>"» نوع گروه : [$tc]
» ایدی گروه : [$chat_id]

⌯ با دستور `info` اطلاعات خود را دریافت کنید",
'reply_to_message_id'=>$message_id,

   ]);
   }
else
{
  bot('sendmessage',[
      'parse_mode'=>"MarkDown",
  'chat_id'=>$chat_id,
  'text'=>"» نوع گروه : [$tc]
» ایدی گروه : [$chat_id]

⌯ با دستور `info` اطلاعات خود را دریافت کنید",
'reply_to_message_id'=>$message_id,

   ]);
   }
}
}
else
{
$getuserprofile = getUserProfilePhotos($token,$from_id);
$cuphoto = $getuserprofile->total_count;
$getuserphoto = $getuserprofile->photos[0][0]->file_id;
  bot('sendmessage',[
      'parse_mode'=>"MarkDown",
  'chat_id'=>$chat_id,
  'text'=>"» نوع گروه : [$tc]
» ایدی گروه : [$chat_id]

⌯ با دستور `info` اطلاعات خود را دریافت کنید",
'reply_to_message_id'=>$message_id,

   ]);
}
}
// getpro
elseif(strpos($textmassage ,"/getpro ") !== false or strpos($textmassage ,"getpro ") !== false or strpos($textmassage ,"عکس پروفایل ") !== false) {
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
$lockcmd = $settings["lock"]["cmd"];
if ($lockcmd == "┃✘┃") {
$text = str_replace(['/getpro ','getpro ','عکس پروفایل '],'',$textmassage);
$getuserprofile = getUserProfilePhotos($token,$from_id);
$cuphoto = $getuserprofile->total_count;
$getuserphoto = $getuserprofile->photos[$text - 1][0]->file_id;
if ($getuserphoto != false) {
  bot('sendphoto',[
  'chat_id'=>$chat_id,
'photo'=>$getuserphoto,
  'caption'=>"عکس [$text] از [$cuphoto] کل",
'reply_to_message_id'=>$message_id,

   ]);
   }
else
{
	bot('sendmessage',[
  'chat_id'=>$chat_id,
  'text'=>"» شما عکس پروفایل ندارید !",
'reply_to_message_id'=>$message_id,

   ]);
   }
}
}
else
{
$text = str_replace(['/getpro ','getpro ','عکس پروفایل '],'',$textmassage);
$getuserprofile = getUserProfilePhotos($token,$from_id);
$cuphoto = $getuserprofile->total_count;
$getuserphoto = $getuserprofile->photos[$text - 1][0]->file_id;
  bot('sendphoto',[
  'chat_id'=>$chat_id,
'photo'=>$getuserphoto,
  'caption'=>"عکس [$text] از [$cuphoto] کل",
'reply_to_message_id'=>$message_id,

   ]);
}
}

      elseif($textmassage == "!me"){
bot('restrictChatMember',[
   'user_id'=>$re_id,   
   'chat_id'=>$chat_id,
   'can_post_messages'=>false,
   'until_date'=>time()+1*60,
         ]);
$settings["silentlist"][]="$re_id";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
   }
// Getpro help
elseif($textmassage=="/getpro" or $textmassage=="getpro"){
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» لطفا دستور را همراه با عدد عکس پروفایل مورد نظر ارسال کنید.
	
	به عنوان مثال برای دریافت عکس اول پروفایل از دستور زیر استفاده کنید :
	getpro 1",
'reply_to_message_id'=>$message_id,

   ]);
   }    
   // nerkh
elseif($textmassage=="/nerkh" or $textmassage=="نرخ" or $textmassage=="nerkh"){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
$lockcmd = $settings["lock"]["cmd"];
if ($lockcmd == "┃✘┃") {
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» سرور پرقدرت
» آپتایم 100% (بدون آفی و هنگی)
» پشتیبانی 24 ساعته
» امکانات فوق العاده

> نرخ ربات $usernamebot ANTi برای یک گروه :
» یک ماه : 3000 تومان
» دو ماه : 5000 تومن
» نامحدود : 10000 تومن

» جهت مشاهده امکانات ربات میتوانید به صورت آزمایشی 7 روز ربات را رایگان دریافت کنید !",
'reply_to_message_id'=>$message_id,
   'reply_markup'=>json_encode([
    'inline_keyboard'=>[
	[
	['text'=>"خرید ربات",'url'=>"https://t.me/$supppp"]
	],
              ],
        ])
   ]);
   }  
}
else
{
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» سرور پرقدرت
» آپتایم 100% (بدون آفی و هنگی)
» پشتیبانی 24 ساعته
» امکانات فوق العاده

> نرخ ربات $usernamebot ANTi برای یک گروه :
» یک ماه : 3000 تومان
» دو ماه : 5000 تومن
» نامحدود : 10000 تومن

» جهت مشاهده امکانات ربات میتوانید به صورت آزمایشی 2 روز ربات را رایگان دریافت کنید !",
'reply_to_message_id'=>$message_id,
   'reply_markup'=>json_encode([
    'inline_keyboard'=>[
	[
	['text'=>"خرید ربات",'url'=>"https://t.me/$supppp"]
	],
              ],
        ])
   ]);
}
}
//info
elseif($textmassage=="/info" && $rt or $textmassage=="اطلاعات" && $rt or $textmassage=="info" && $rt){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
$lockcmd = $settings["lock"]["cmd"];
if ($lockcmd == "┃✘┃") {
$getuserprofile = getUserProfilePhotos($token,$from_id);
$cuphoto = $getuserprofile->total_count;
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"
» نام : [$re_name]
» ایدی : [$re_id]
» یوزرنیم : [@$re_user]
» تعداد عکس پروفایل : [$cuphoto]
لینک : [http://t.me/$re_user]",
'reply_to_message_id'=>$message_id,

   ]);
   } 
}
else
{
$getuserprofile = getUserProfilePhotos($token,$from_id);
$cuphoto = $getuserprofile->total_count;
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"» نام : [$re_name]
» ایدی : [$re_id]
» یوزرنیم : [@$re_user]
» تعداد عکس پروفایل : [$cuphoto]
لینک : [http://t.me/$re_user]",
'reply_to_message_id'=>$message_id,

   ]);
}
}
elseif($textmassage=="/info"  or $textmassage=="me" or $textmassage=="/me"  or $textmassage=="اطلاعات"  or $textmassage=="info" ){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
$lockcmd = $settings["lock"]["cmd"];
if ($lockcmd == "┃✘┃") {
$getuserprofile = getUserProfilePhotos($token,$from_id);
$cuphoto = $getuserprofile->total_count;
	bot('sendmessage',[
	'parse_mode'=>"MarkDown",
	'chat_id'=>$chat_id,
	'text'=>"
» نام شما : [$first_name]
» ایدی شما : [$from_id]
» یوزرنیم  شما : [@$username]
» تعداد پیام ها : [$tedadmsg]
» تعداد عکس پروفایل : [$cuphoto]
» لینک شما : [http://t.me/$username]

⌯ با دستور `getpro` میتوانید عکس های پروفایل خود را دریافت کنید",
'reply_to_message_id'=>$message_id,

   ]);
   } 
}   
 else
 {
$getuserprofile = getUserProfilePhotos($token,$from_id);
$cuphoto = $getuserprofile->total_count;
	bot('sendmessage',[
	'parse_mode'=>"MarkDown",
	'chat_id'=>$chat_id,
	'text'=>"
» نام شما : [$first_name]
» ایدی شما : [$from_id]
» یوزرنیم  شما : [@$username]
» تعداد پیام ها : [$tedadmsg]
» تعداد عکس پروفایل : [$cuphoto]
» لینک شما : [http://t.me/$username]

⌯ با دستور `getpro` میتوانید عکس های پروفایل خود را دریافت کنید",
'reply_to_message_id'=>$message_id,

   ]);
} 
}
if(strpos($textmassage ,"/info ") !== false or strpos($textmassage ,"اطلاعات فرد ") !== false) {
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
$lockcmd = $settings["lock"]["cmd"];
if ($lockcmd == "┃✘┃") {
$text = str_replace(['/info ','اطلاعات فرد '],'',$textmassage);
if($text > 0){
              bot('sendmessage', [
                'chat_id' => $chat_id,
             'text'=>"» پروفایل فرد : [$text](tg://user?id=$text)",
			 'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,

   ]);
   }
}
}
else
{
$text = str_replace(['/info ','اطلاعات فرد '],'',$textmassage);
              bot('sendmessage', [
                'chat_id' => $chat_id,
             'text'=>"» پروفایل فرد : [$text](tg://user?id=$text)",
			 'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,

   ]);
}
}
// سرگرمی ها
elseif($textmassage=="اذان" or $textmassage=="azan" or $textmassage=="/azan"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
$text = file_get_contents("https://prayer.aviny.com/api/prayertimes/1");
$getchat = json_decode($text, true);
$city = $getchat["CityName"];
$sobeh = $getchat["Imsaak"];
$toloe = $getchat["Sunrise"];  
$zoher = $getchat["Noon"]; 
$qurob = $getchat["Sunset"]; 
$maghreb = $getchat["Maghreb"]; 
$nime = $getchat["Midnight"]; 
$rmroz = $getchat["Today"];
SendMessage($chat_id,"
🕋 اوقات شرعی $city :
 
⿻ اذان صبح : $sobeh
⿻ طلوع افتاب : $toloe
⿻ اذان ظهر : $zoher
⿻ غروب افتاب : $qurob
⿻ اذان مغرب : $maghreb
⿻ نیمه شب : $nime

● تاریخ امروز :  $rmroz ","MarkDown","true");
}}
// ping
if($textmassage=="/ping" or $textmassage=="انلاینی" or $textmassage=="ping"){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
$lockcmd = $settings["lock"]["cmd"];
if ($lockcmd == "┃✘┃") {
   bot('sendmessage',[
  'chat_id'=>$chat_id,
'text'=>"• ربات رایگان کرال آنلاین می‌باشد !",
		'reply_to_message_id'=>$message_id,

        ]);
   } 
}
else
{
   bot('sendmessage',[
  'chat_id'=>$chat_id,
'text'=>"• ربات رایگان کرال آنلاین می‌باشد !",
		'reply_to_message_id'=>$message_id,

        ]);
}
}
elseif($textmassage=="ربات"){
if($tc == 'group' | $tc == 'supergroup'){
$matn = array('جانم؟!!','بفرما!!!','بنال','چیههه','جونم','من و صدا کردی');
$count = count($matn)-1;
        $x = rand(0,$count);
        $answer = $matn[$x];
bot('Sendmessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"$answer",
]);
}
}
elseif(strpos($text , "بگوو ") !== false) {
 $text = str_replace('بگوو ','',$text);
bot('deletemessage',[
'chat_id' => $chat_id,
'message_id' => $message_id,
]);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>'Markdown',
'reply_to_message_id'=>$reply_msgid,
]);
}
elseif($text == "fal" or $text == "فال"){
$add = "http://www.beytoote.com/images/Hafez/".rand(1,149).".gif";
bot('sendphoto', [
'chat_id' => $chat_id,
'photo'=>$add,
'caption' =>"@$usernamebot",
'reply_to_message_id'=>$message_id,
]); 
}
elseif($text =="جوک" or $text == "jok"){
$jok = file_get_contents("http://api.codebazan.ir/jok");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$jok",
'reply_to_message_id'=>$message_id,
'parse_mode'=>'MarkDown',
]);
}
elseif(preg_match('/^[!\/#]?(age) (\d+)\/(\d+)\/(\d+)$/i',$text,$match)){
 $get = file_get_contents("http://api.novateamco.ir/age/?year=".$match[2]."&month=".$match[3]."&day=".$match[4]);
 $result = json_decode($get, true);
 if($result['ok'] === true){
     SendMessage($chat_id,"• محسابه سن انجام شد!
• سن دقیق شما : *".$result['result']['year']."* سال و *".$result['result']['month']."* ماه و *".$result['result']['day']."* روز
• کل روز های سپری شده : *".$result['other']['days']."*\n• حیوان سال شما : *".$result['other']['year_name']."*\n• روز های مانده به تولد بعدی شما : *".$result['other']['to_birth']."*", 'MarkDown', $message_id);
 }
}
elseif(preg_match('/^[!\/#]?(arz)$/i',$text)){
 $get = file_get_contents("http://api.novateamco.ir/arz/");
 $result = json_decode($get, true);
 SendMessage($chat_id," دلار : *".$result['Dollar']." ریال*\n یورو : *".$result['Euro']."* ریال\n طلای 18 عیار : *".$result['Gold_18']."* ریال\n طلای 24 عیار : *".$result['Gold_24']."* ریال\n سکه بهار آزادی : *".$result['coin']['Bahar_Azadi']."* ریال\n ربع سکه : *".$result['coin']['Quarter']."* ریال\n نیم سکه : *".$result['coin']['Half']."* ریال", 'MarkDown', $message_id);
}
elseif($rt && $textmassage == "/del" or $rt && $textmassage == "del" or $rt && $textmassage == "حذف"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
 jijibot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$re_msgid
    ]);
	 jijibot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id
    ]);
 }
}
// gif
elseif ( strpos($textmassage , '/gif ') !== false  ) {
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
$lockcmd = $settings["lock"]["cmd"];
if ($lockcmd == "┃✘┃") {
$text = str_replace("/gif ","",$textmassage);
$ran = rand(1,3);
if ($ran == "1") {
$info_user = file_get_contents("http://www.flamingtext.com/net-fu/image_output.cgi?_comBuyRedirect=false&script=memories-anim-logo&text=$text&symbol_tagname=popular&fontsize=70&fontname=futura_poster&fontname_tagname=cool&textBorder=15&growSize=0&antialias=on&hinting=on&justify=2&letterSpacing=0&lineSpacing=0&textSlant=0&textVerticalSlant=0&textAngle=0&textOutline=off&textOutline=false&textOutlineSize=2&textColor=%230000CC&angle=0&blueFlame=on&blueFlame=false&framerate=75&frames=5&pframes=5&oframes=4&distance=2&transparent=off&transparent=false&extAnim=gif&animLoop=on&animLoop=false&defaultFrameRate=75&doScale=off&scaleWidth=240&scaleHeight=120&&_=1469943010141");
$getchat = json_decode($info_user, true);
$gif = $getchat["src"];
 bot('senddocument',[
    'chat_id'=>$chat_id,
    'document'=>"$gif",
	'caption'=>"@$usernamebot",
	'reply_to_message_id'=>$message_id,

     ]);
}
if ($ran == "2") {
	$info_user = file_get_contents("http://www.flamingtext.com/net-fu/image_output.cgi?_comBuyRedirect=false&script=flash-anim-logo&text=$text&symbol_tagname=popular&fontsize=70&fontname=futura_poster&fontname_tagname=cool&textBorder=15&growSize=0&antialias=on&hinting=on&justify=2&letterSpacing=0&lineSpacing=0&textSlant=0&textVerticalSlant=0&textAngle=0&textOutline=off&textOutline=false&textOutlineSize=2&textColor=%230000CC&angle=0&blueFlame=on&blueFlame=false&framerate=75&frames=5&pframes=5&oframes=4&distance=2&transparent=off&transparent=false&extAnim=gif&animLoop=on&animLoop=false&defaultFrameRate=75&doScale=off&scaleWidth=240&scaleHeight=120&&_=1469943010141");
$getchat = json_decode($info_user, true);
$gif = $getchat["src"];
 bot('senddocument',[
    'chat_id'=>$chat_id,
    'document'=>"$gif",
	'caption'=>"@$usernamebot",
	'reply_to_message_id'=>$message_id,

     ]);
}
if ($ran == "3") {
		$info_user = file_get_contents("http://www.flamingtext.com/net-fu/image_output.cgi?_comBuyRedirect=false&script=alien-glow-anim-logo&text=$text&symbol_tagname=popular&fontsize=70&fontname=futura_poster&fontname_tagname=cool&textBorder=15&growSize=0&antialias=on&hinting=on&justify=2&letterSpacing=0&lineSpacing=0&textSlant=0&textVerticalSlant=0&textAngle=0&textOutline=off&textOutline=false&textOutlineSize=2&textColor=%230000CC&angle=0&blueFlame=on&blueFlame=false&framerate=75&frames=5&pframes=5&oframes=4&distance=2&transparent=off&transparent=false&extAnim=gif&animLoop=on&animLoop=false&defaultFrameRate=75&doScale=off&scaleWidth=240&scaleHeight=120&&_=1469943010141");
$getchat = json_decode($info_user, true);
$gif = $getchat["src"];
 bot('senddocument',[
    'chat_id'=>$chat_id,
    'document'=>"$gif",
	'caption'=>"@$usernamebot",
	'reply_to_message_id'=>$message_id,

     ]);
   }  
}
}
else
{
$text = str_replace("/gif ","",$textmassage);
$info_user = file_get_contents("http://www.flamingtext.com/net-fu/image_output.cgi?_comBuyRedirect=false&script=memories-anim-logo&text=$text&symbol_tagname=popular&fontsize=70&fontname=futura_poster&fontname_tagname=cool&textBorder=15&growSize=0&antialias=on&hinting=on&justify=2&letterSpacing=0&lineSpacing=0&textSlant=0&textVerticalSlant=0&textAngle=0&textOutline=off&textOutline=false&textOutlineSize=2&textColor=%230000CC&angle=0&blueFlame=on&blueFlame=false&framerate=75&frames=5&pframes=5&oframes=4&distance=2&transparent=off&transparent=false&extAnim=gif&animLoop=on&animLoop=false&defaultFrameRate=75&doScale=off&scaleWidth=240&scaleHeight=120&&_=1469943010141");
$getchat = json_decode($info_user, true);
$gif = $getchat["src"];
 bot('senddocument',[
    'chat_id'=>$chat_id,
    'document'=>"$gif",
	'caption'=>"@$usernamebot",
	'reply_to_message_id'=>$message_id,

     ]);
}
}
// logo 
elseif ( strpos($textmassage , '/logo ') !== false or strpos($textmassage , 'لوگو بساز ') !== false) {
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
$lockcmd = $settings["lock"]["cmd"];
if ($lockcmd == "┃✘┃") {
$text = str_replace(['/logo ','لوگو بساز '],'',$textmassage);
 bot('sendphoto',[
    'chat_id'=>$chat_id,
    'photo'=>"http://api.monsterbot.ir/pic/?text=$text&y=15&font=Steamy&fsize=90&bg=logo8",
	'caption'=>"@$usernamebot",
	'reply_to_message_id'=>$message_id,

   ]);
   } 
}
else
{
	$text = str_replace(['/logo ','لوگو بساز '],'',$textmassage);
 bot('sendphoto',[
    'chat_id'=>$chat_id,
    'photo'=>"http://api.monsterbot.ir/pic/?text=$text&y=15&font=Steamy&fsize=90&bg=logo8",
	'caption'=>"@$usernamebot",
	'reply_to_message_id'=>$message_id,

   ]);
   } 
}
// voice
elseif ( strpos($textmassage ,'/voice ') !== false  ) {
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
$lockcmd = $settings["lock"]["cmd"];
if ($lockcmd == "┃✘┃") {
$text = str_replace("/voice ","",$textmassage);
$trtext = urlencode($text);
 bot('sendvoice',[
    'chat_id'=>$chat_id,
    'voice'=>"http://tts.baidu.com/text2audio?lan=en&ie=UTF-8&text=$trtext",
	'caption'=>"@$usernamebot",
	'reply_to_message_id'=>$message_id,

   ]);
   } 
}
else
{	
$text = str_replace("/voice ","",$textmassage);
$trtext = urlencode($text);
 bot('sendvoice',[
    'chat_id'=>$chat_id,
    'voice'=>"http://tts.baidu.com/text2audio?lan=en&ie=UTF-8&text=$trtext",
	'caption'=>"@$usernamebot",
	'reply_to_message_id'=>$message_id,

   ]);
}
}
// sticker
elseif($textmassage=="/photo" or $textmassage=="photo" or $textmassage=="تبدیل به عکس"){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
$lockcmd = $settings["lock"]["cmd"];
if ($lockcmd == "┃✘┃") {
$file = $update->message->reply_to_message->sticker->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      	  $getchat = json_decode($get, true);
      $patch = $getchat["result"]["file_path"];
    file_put_contents("data/photo.png",file_get_contents("https://api.telegram.org/file/bot$token/$patch"));
bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>new CURLFile("data/photo.png"),
  'caption'=>"@$usernamebot",
  'reply_to_message_id'=>$message_id,

 ]);
unlink("data/photo.png");
 }
}
else
{
$file = $update->message->reply_to_message->sticker->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      	  $getchat = json_decode($get, true);
      $patch = $getchat["result"]["file_path"];
    file_put_contents("data/photo.png",file_get_contents("https://api.telegram.org/file/bot$token/$patch"));
bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>new CURLFile("data/photo.png"),
  'caption'=>"@$usernamebot",
  'reply_to_message_id'=>$message_id,

 ]);
unlink("data/photo.png");
}
}
// photo
elseif($textmassage=="/sticker" or $textmassage=="sticker" or $textmassage=="تبدیل به استیکر"){
if ( $status != 'creator' && $status != 'administrator' && !in_array($from_id,$Dev) ){
$lockcmd = $settings["lock"]["cmd"];
if ($lockcmd == "┃✘┃") {
$photo = $update->message->reply_to_message->photo;
$file = $photo[count($photo)-1]->file_id;
      $get = bot('getfile',['file_id'=>$file]);
	  $getchat = json_decode($get, true);
      $patch = $getchat["result"]["file_path"];
    file_put_contents("data/sticker.webp",file_get_contents("https://api.telegram.org/file/bot$token/$patch"));
bot('sendsticker',[
 'chat_id'=>$chat_id,
 'sticker'=>new CURLFile("data/sticker.webp"),
   'reply_to_message_id'=>$message_id,

 ]);
unlink("data/sticker.webp");
 }
} //// @tel_fire
else
{
	$photo = $update->message->reply_to_message->photo;
$file = $photo[count($photo)-1]->file_id;
      $get = bot('getfile',['file_id'=>$file]);
	  $getchat = json_decode($get, true);
      $patch = $getchat["result"]["file_path"];
    file_put_contents("data/sticker.webp",file_get_contents("https://api.telegram.org/file/bot$token/$patch"));
bot('sendsticker',[
 'chat_id'=>$chat_id,
 'sticker'=>new CURLFile("data/sticker.webp"),
   'reply_to_message_id'=>$message_id,

 ]);
unlink("data/sticker.webp");
}
}
//=======================================================================================
// charge
if (strpos($textmassage , "/expire ") !== false && in_array($from_id,$Dev) or strpos($textmassage , "تنظیم شارژ ") !== false && in_array($from_id,$Dev)) {
	$num = str_replace(['/expire ','تنظیم شارژ '],'',$textmassage);
	if ($num <= 1000 && $num >= 1){
		date_default_timezone_set('Asia/Tehran');
		$date1 = date('Y-m-d', time());
		$date2 = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
		$next_date = date('Y-m-d', strtotime($date2 ." +$num day"));
			  bot('sendmessage',[
            'chat_id'=>$chat_id,
            'text'=>"» گروه [$namegroup] با موفقیت [$num] روز شارژ شد.",
'reply_to_message_id'=>$message_id,

   ]);
$settings["information"]["expire"]="$next_date";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id.json",$settings);
   }else{
bot('sendmessage',[
 'chat_id' => $chat_id,
 'text'=>"1-1000",
'reply_to_message_id'=>$message_id,

   ]);
}
}
// check charge
elseif($textmassage == "میزان شارژ" or $textmassage == "/check"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
date_default_timezone_set('Asia/Tehran');
$date3 = date('Y-m-d');
$date2 = date('d');
$ndate = $settings["information"]["expire"];
$rdate = $settings["information"]["dataadded"];
$endtime = date('d', strtotime($ndate ."-$date2 day"));
        bot('sendmessage', [
            "chat_id" => $chat_id,
            "text" => "• به بخش میزان شارژ گروه خوش آمدید.

> اطلاعات گروه شما :

» ایدی گروه : [$chat_id]

» نام گروه : [$namegroup]

» گروه شما $endtime روز دیگر شارژ دارد !",
            'reply_to_message_id'=>$message_id,
        'reply_markup'=>json_encode([
            'resize_keyboard'=>true,
            'inline_keyboard'=>[
					 [
					 ['text'=>"خرید شارژ",'callback_data'=>'requstcharge']
					 ],
					 					      [
   ['text'=>"○ خروج",'callback_data'=>'exit']
   ],
            ]
        ])
        ]);
}
}
// panel for sharge
if (strpos($textmassage , "/plan1 ") !== false && in_array($from_id,$Dev) or strpos($textmassage , "ارسال شارژ ") !== false && in_array($from_id,$Dev)) {
    $panels = str_replace(['/plan1 ','ارسال شارژ '],'',$textmassage);
	$modified = ltrim($panels);
    $jam = "$modified";
    date_default_timezone_set('Asia/Tehran');
    $date1 = date('Y-m-d', time());
    $date2 = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
    $next_date = date('Y-m-d', strtotime($date2 ." +60 day"));
			       bot('sendmessage',[
            'chat_id'=>$panels,
            'text'=>"پلن یک برای گروه شما فعال شد.
			
			» فعالیت ربات برای 30 روز دیگر تمدید شد."
   ]);
        bot('sendmessage',[
            'chat_id'=>$chat_id,
            'text'=>"پلن یک در تاریخ $date1 با موفقیت ثبت شد.",
'reply_to_message_id'=>$message_id,

   ]);
@$getsettings = file_get_contents("data/$jam.json");
@$settings = json_decode($getsettings,true);
$settings["information"]["expire"]="$next_date";
$settings["information"]["charge"]="30 روز";
$settings = json_encode($settings,true);
file_put_contents("data/$jam.json",$settings);
}
// panel charge in pv
if ($textmassage == "/request" or $textmassage == "درخواست شارژ"){
if ( $status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)) {
$getlink = file_get_contents("https://api.telegram.org/bot$token/exportChatInviteLink?chat_id=$chat_id");
$jsonlink = json_decode($getlink, true);
$getlinkde = $jsonlink['result'];
$ndate = $settings["information"]["expire"];
$charge = $settings["information"]["charge"];
$rdate = $settings["information"]["dataadded"];
	bot('sendmessage',[
  'chat_id'=>$chat_id,
  'reply_to_message_id'=>$message_id,
        'text'=>"درخواست شما ثبت شد.",
  ]);
 bot('sendmessage',[
  'chat_id'=>$Dev[0],
  'parse_mode'=>"MarkDown",
        'text'=>"کاربر ( [$from_id](tg://user?id=$from_id) ) درخواست شارژ گروه کرده است.

• ایدی گروه : [$chat_id]

» گروه مذکور تا تاریخ $ndate شارژ دارد.",
	    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
     [
    ['text'=>"ورود به گروه", 'url'=>"$getlinkde"]
    ],
    ]
    ])
        ]);
}
}
// lock character
		    elseif($data=="character"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$lockcharacter = $settings2["lock"]["lockcharacter"];
$pluscharacter = $settings2["information"]["pluscharacter"];
$downcharacter = $settings2["information"]["downcharacter"];
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• به بخش تنظیم تعداد کارکتر یا حروف پیام خوش آمدید.
			   
» شما در این قسمت میتوانید حداکثر یا حداقل تعداد حروف پیام را تایین کنید

» از دکمه های زیر استفاده کنید",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"وضعیت قفل : $lockcharacter",'callback_data'=>'lockcharacter']
					 ],
					            [
                     ['text'=>"⇩ حداکثر کاراکتر ⇩",'callback_data'=>'text']
					 ],
					               [
                     ['text'=>"《",'callback_data'=>'dempluscharacter'],['text'=>"$pluscharacter",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'uppluscharacter']
					 ],
					 		            [
                     ['text'=>"⇩ حداقل کاراکتر ⇩",'callback_data'=>'text']
					 ],
					               [
                     ['text'=>"《",'callback_data'=>'demdowncharacter'],['text'=>"$downcharacter",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'updowncharacter']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
						    elseif($data=="lockcharacter" &&  $settings2["lock"]["lockcharacter"] == "┃✘┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$lockcharacter = $settings2["lock"]["lockcharacter"];
$pluscharacter = $settings2["information"]["pluscharacter"];
$downcharacter = $settings2["information"]["downcharacter"];
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• به بخش تنظیم تعداد کارکتر یا حروف پیام خوش آمدید.

» قفل کاراکتر پیام با موفقیت فعال شد !",
'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"وضعیت قفل : فعال",'callback_data'=>'lockcharacter']
					 ],
					            [
                     ['text'=>"⇩ حداکثر کاراکتر ⇩",'callback_data'=>'text']
					 ],
					               [
                     ['text'=>"《",'callback_data'=>'dempluscharacter'],['text'=>"$pluscharacter",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'uppluscharacter']
					 ],
					 		            [
                     ['text'=>"⇩ حداقل کاراکتر ⇩",'callback_data'=>'text']
					 ],
					               [
                     ['text'=>"《",'callback_data'=>'demdowncharacter'],['text'=>"$downcharacter",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'updowncharacter']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
$settings2["lock"]["lockcharacter"]="┃✓┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
		    elseif($data=="lockcharacter" &&  $settings2["lock"]["lockcharacter"] == "┃✓┃"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$lockcharacter = $settings2["lock"]["lockcharacter"];
$pluscharacter = $settings2["information"]["pluscharacter"];
$downcharacter = $settings2["information"]["downcharacter"];
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• به بخش تنظیم تعداد کارکتر یا حروف پیام خوش آمدید.

» قفل کاراکتر پیام با موفقیت غیر فعال شد !",
'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"وضعیت قفل : غیر فعال",'callback_data'=>'lockcharacter']
					 ],
					            [
                     ['text'=>"⇩ حداکثر کاراکتر ⇩",'callback_data'=>'text']
					 ],
					               [
                     ['text'=>"《",'callback_data'=>'dempluscharacter'],['text'=>"$pluscharacter",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'uppluscharacter']
					 ],
					 		            [
                     ['text'=>"⇩ حداقل کاراکتر ⇩",'callback_data'=>'text']
					 ],
					               [
                     ['text'=>"《",'callback_data'=>'demdowncharacter'],['text'=>"$downcharacter",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'updowncharacter']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
$settings2["lock"]["lockcharacter"]="┃✘┃";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
		    elseif($data=="uppluscharacter"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$lockcharacter = $settings2["lock"]["lockcharacter"];
$pluscharacter = $settings2["information"]["pluscharacter"];
$pluscharacterplus = $pluscharacter + 10 ;
$downcharacter = $settings2["information"]["downcharacter"];
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• به بخش تنظیم تعداد کارکتر یا حروف پیام خوش آمدید.

» حداکثر تعداد کاراکتر 10 عدد افزایش یافت",
'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"وضعیت قفل : $lockcharacter",'callback_data'=>'lockcharacter']
					 ],
					            [
                     ['text'=>"⇩ حداکثر کاراکتر ⇩",'callback_data'=>'text']
					 ],
					               [
                     ['text'=>"《",'callback_data'=>'dempluscharacter'],['text'=>"$pluscharacterplus",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'uppluscharacter']
					 ],
					 		            [
                     ['text'=>"⇩ حداقل کاراکتر ⇩",'callback_data'=>'text']
					 ],
					               [
                     ['text'=>"《",'callback_data'=>'demdowncharacter'],['text'=>"$downcharacter",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'updowncharacter']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
$settings2["information"]["pluscharacter"]="$pluscharacterplus";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
			    elseif($data=="dempluscharacter"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$lockcharacter = $settings2["lock"]["lockcharacter"];
$pluscharacter = $settings2["information"]["pluscharacter"];
$pluscharacterplus = $pluscharacter - 10 ;
if($pluscharacterplus >= 0){
$downcharacter = $settings2["information"]["downcharacter"];
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• به بخش تنظیم تعداد کارکتر یا حروف پیام خوش آمدید.

» حداکثر تعداد کاراکتر 10 عدد کاهش یافت",
'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"وضعیت قفل : $lockcharacter",'callback_data'=>'lockcharacter']
					 ],
					            [
                     ['text'=>"⇩ حداکثر کاراکتر ⇩",'callback_data'=>'text']
					 ],
					               [
                     ['text'=>"《",'callback_data'=>'dempluscharacter'],['text'=>"$pluscharacterplus",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'uppluscharacter']
					 ],
					 		            [
                     ['text'=>"⇩ حداقل کاراکتر ⇩",'callback_data'=>'text']
					 ],
					               [
                     ['text'=>"《",'callback_data'=>'demdowncharacter'],['text'=>"$downcharacter",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'updowncharacter']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
$settings2["information"]["pluscharacter"]="$pluscharacterplus";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		   }
		   else
		   {
			  			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"امکان تغییر به پایین تر از عدد 0 وجود ندارد ⚠️",
]); 
		 }
				}
		   else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
						 elseif($data=="demdowncharacter"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$lockcharacter = $settings2["lock"]["lockcharacter"];
$pluscharacter = $settings2["information"]["pluscharacter"];
$downcharacter = $settings2["information"]["downcharacter"];
$downcharacterplus = $downcharacter - 10 ;
if($downcharacterplus >= 0){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• به بخش تنظیم تعداد کارکتر یا حروف پیام خوش آمدید.

» حداقل تعداد کاراکتر 10 عدد کاهش یافت",
'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"وضعیت قفل : $lockcharacter",'callback_data'=>'lockcharacter']
					 ],
					            [
                     ['text'=>"⇩ حداکثر کاراکتر ⇩",'callback_data'=>'text']
					 ],
					               [
                     ['text'=>"《",'callback_data'=>'dempluscharacter'],['text'=>"$pluscharacter",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'uppluscharacter']
					 ],
					 		            [
                     ['text'=>"⇩ حداقل کاراکتر ⇩",'callback_data'=>'text']
					 ],
					               [
                     ['text'=>"《",'callback_data'=>'demdowncharacter'],['text'=>"$downcharacterplus",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'updowncharacter']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
$settings2["information"]["downcharacter"]="$downcharacterplus";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		   }
		   else
		   {
			  			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"امکان تغییر به پایین تر از عدد 0 وجود ندارد ⚠️",
]); 
		 }
				}
		   else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
							elseif($data=="updowncharacter"){
		 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
$lockcharacter = $settings2["lock"]["lockcharacter"];
$pluscharacter = $settings2["information"]["pluscharacter"];
$downcharacter = $settings2["information"]["downcharacter"];
$downcharacterplus = $downcharacter + 10 ;
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• به بخش تنظیم تعداد کارکتر یا حروف پیام خوش آمدید.

» حداقل تعداد کاراکتر 10 عدد افزایش یافت",
'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                     [
                     ['text'=>"وضعیت قفل : $lockcharacter",'callback_data'=>'lockcharacter']
					 ],
					            [
                     ['text'=>"⇩ حداکثر کاراکتر ⇩",'callback_data'=>'text']
					 ],
					               [
                     ['text'=>"《",'callback_data'=>'dempluscharacter'],['text'=>"$pluscharacter",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'uppluscharacter']
					 ],
					 		            [
                     ['text'=>"⇩ حداقل کاراکتر ⇩",'callback_data'=>'text']
					 ],
					               [
                     ['text'=>"《",'callback_data'=>'demdowncharacter'],['text'=>"$downcharacterplus",'callback_data'=>'text'],['text'=>"》",'callback_data'=>'updowncharacter']
					 ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'panel2']
					 ],
                     ]
               ])
           ]);
$settings2["information"]["downcharacter"]="$downcharacterplus";
$settings = json_encode($settings2,true);
file_put_contents("data/$chatid.json",$settings);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
//======================================================================================
// pv
if($textmassage=="/start" && $tc == "private" or $textmassage=="/panel" && $tc == "private"){
	if($tch == 'member' or $tch == 'creator' or $tch == 'administrator'){
	    $user = file_get_contents('Member.txt');
    $members = explode("\n",$user);
    if (!in_array($chat_id,$members)){
      $add_user = file_get_contents('Member.txt');
      $add_user .= $chat_id."\n";
     file_put_contents('Member.txt',$add_user);
    }	
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"سلام ⁪$name عزیز

◂ سپس ربات را داخل گروه ادمین کنید
◂ توصیه می‌شود ربات را ادمین کامل کنید 
◂ ربات بعد از ادمین شدن دستور نصب را ارسال کنید
◂ در صورت نبود یا دلیت بودن اکانت سازنده گروه
◂ ربات ادمینهای کامل را بعنوان مالک شناسایی و مقام می‌دهد


چنانچه بعد از اضافه کردن ربات دستور نصب ربات ارسال کنید تا ربات در گروه شما کار کند

① بررسی کنید که گروه شما حتما سوپرگروه باشد
② از ادمین بودن ربات اطمینان کامل کسب کنید 

━━ 🅚🅡🅐🅛 ━━",
'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'inline_keyboard'=>[
                [['text'=>"گروه پشتیبانی ♥️",'callback_data'=>'aboutus']],
                [['text'=>"خرید اشتراک ربات",'callback_data'=>'kharid2'],['text'=>"اضافه کردن ربات به گروه",'url'=>"https://t.me/$usernamebot?startgroup=add"]],
				[['text'=>"گزارش مشکلات ربات",'callback_data'=>'poshtibanipv']],
                [['text'=>"کانال پشتیبانی",'url'=>"https://telegram.me/$channel"]],
                ]
               ])
           ]);
}
else
{
		bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"لطفا جهت دریافت اخرین اخبار و آپدیت ها در کانال ربات عضو شوید.",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
	[
	['text'=>"ورود به کانال",'url'=>"https://t.me/$channel"]
	],
              ]
        ])
            ]);
}	
}
 elseif($data=="kharid2"){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"به بخش خرید اشتراک خوش آمدید شما میتوانید 
در این بخش ربات را برای گروه خود بخرید 

و یا 24 به عنوان تست از آن استفاده کنید✔️
",
'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				[
                ['text'=>"⇜  خرید اشتراک ⇜ ",'url'=>"https://t.me/$supppp"],['text'=>"⇜  اشتراک رایگان ⇜ ",'callback_data'=>'freepv']
                ],    
			    [
   ['text'=>"بازگشت 🔙",'callback_data'=>'backpv']
   ],
                     ]
               ])
           ]);
 }
  elseif($data=="backpv"){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"سلام ⁪$name عزیز

◂ سپس ربات را داخل گروه ادمین کنید
◂ توصیه می‌شود ربات را ادمین کامل کنید 
◂ ربات بعد از ادمین شدن دستور نصب را ارسال کنید
◂ در صورت نبود یا دلیت بودن اکانت سازنده گروه
◂ ربات ادمینهای کامل را بعنوان مالک شناسایی و مقام می‌دهد


چنانچه بعد از اضافه کردن ربات دستور نصب ربات ارسال کنید تا ربات در گروه شما کار کند

① بررسی کنید که گروه شما حتما سوپرگروه باشد
② از ادمین بودن ربات اطمینان کامل کسب کنید 

━━ 🅚🅡🅐🅛 ━━",
'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                [['text'=>"گروه پشتیبانی ♥️",'callback_data'=>'aboutus']],
                [['text'=>"خرید اشتراک ربات",'callback_data'=>'kharid2'],['text'=>"اضافه کردن ربات به گروه",'url'=>"https://t.me/$usernamebot?startgroup=add"]],
				[['text'=>"گزارش مشکلات ربات",'callback_data'=>'poshtibanipv']],
                [['text'=>"کانال پشتیبانی",'url'=>"https://telegram.me/$channel"]],
                ]
               ])
           ]);
 }
   elseif($data=="aboutus"){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"
این گروه متعلق به ربات $usernamebot ANTi می‌باشد !
پشتیبانی و پاسخ به سوالات برخی از کاربران ربات در این گروه انجام می‌شود. 

در گروه پشتیبانی قوانین زیر را رعایت کنید :

① چت ممنوع و از ارسال سوالات نامرتبط خودداری کنید !
② فحش و فحاشی به اعضای گروه، اکیدا ممنوع می‌باشد و در صورت مشاهده برخورد جدی خواهد شد !
③ ارسال تبلیغات به هر شکل در این گروه ممنوع است از جمله تبلیغات : ربات، کانال، گروه، وب سایت و ...
④ در صورت مشاهده از گروه مسدود و در صورت لزوم از تمامی گروه‌های ربات $usernamebot محروم خواهید شد !
⑤ راهنمایی و پاسخ به پرسشها برای عموم آزاد می‌باشد

لطفا به نکات بالا توجه فرمایید تا محیطی دوستانه و صمیمی را در کنار یکدیگر داشته باشیم 🌹
",
'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				[
   ['text'=>"بازگشت 🔙",'callback_data'=>'backpv']
   ],
                ]
               ])
           ]);
 }
     elseif($data=="poshtibanipv"){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"انتفادات پیشنهادات  خود را برای ما ارسال کنید✔️
برای شروع گفت و گو /startgap
را بزنید",
'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				[
                    ['text'=>"بازگشت 🔙",'callback_data'=>'backpv']
                ],
                ]
               ])
           ]);
 }
     elseif($data=="freepv"){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• به بخش دریافت رایگان ربات خوش آمدید !
			   
جهت جلب اطمینان کامل شما و مشاهده کامل قابلیت و کارکرد ربات میتوانید از دو روز (48 ساعت) اشتراک رایگان استفاده کنید و سپس اشتراک مورد نظر خود را خریداری کنید.

شرایط دریافت اشتراک رایگان :
① فقط سازنده گروه مجاز است ربات را به گروه اضافه کند.
② جهت مدیریت کامل گروه ربات حتما باید مدیر گروه باشد تا بصورت کامل عمل کند.

آموزش دریافت اشتراک رایگان :
① با استفاده از دکمه زیر ربات را به گروه خود اضافه کنید.
② ربات را مدیر گروه کنید
③ در گروه دستور نصب را ارسال کنید

سپس اشتراک رایگان برای شما فعال میشود !
پس از دو روز (48 ساعت) میتوانید با خرید اشتراک از ربات استفاده کنید.
",
'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                [
                    ['text'=>"اضافه کردن ربات به گروه",'url'=>"https://t.me/$usernamebot?startgroup=add"]
                ],
				[
                    ['text'=>"بازگشت 🔙",'callback_data'=>'backpv']
                ],
                ]
               ])
           ]);
 }
elseif($textmassage=="/cancel" && $tc == "private"){
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"عملیات با موفقیت لغو شد !
	برای نمایش منوی اول /start را ارسال کنید",
    		]);
$user["userjop"]["$from_id"]["file"]="none";
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);	
}
    elseif($textmassage=="/startgap" && $tc == "private"){
        bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"لطفا پیام خود را ارسال کنید✔️

جهت لغو عملیات /cancel را ارسال کنید",
  ]);
$user["userjop"]["{$from_id}"]["file"]="sup";
$user = json_encode($user,true);
$cna = 562842767;
file_put_contents("data/user.json",$user);  
  }
elseif($update->message && $rt && in_array($from_id,$cna) && $tc == "private"){
  bot('sendmessage',[
        "chat_id"=>$chat_id,
        "text"=>"پیام شما برای فرد ارسال شد."
    ]);
    if ($from_id == $cna){
  bot('sendmessage',[
        "chat_id"=>$reply,
        "text"=>"$textmassage",
'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                [
	['text'=>"ورود به کانال",'url'=>"https://t.me/$channel"]
                ],
                ]
        
               ])
    ]);
    }
    else
    {
      bot('sendmessage',[
        "chat_id"=>$reply,
        "text"=>"$textmassage",
'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                [
	['text'=>"ورود به کانال",'url'=>"https://t.me/$channel"]
                ],
                ]
        
               ])
    ]);
    }
}            
//=======================================================================================
// help
 if($textmassage=="/help" or $textmassage=="راهنما" or $textmassage=="help"){
	 if ($tc == 'group' | $tc == 'supergroup'){  
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"• به بخش راهنمای ربات خوش آمدید.
	
» لطفا زبان مورد نظر را برای دریافت لیست دستورات ربات انتخاب کنید",
	   'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"عمومی",'callback_data'=>"allen"],['text'=>"مدیریتی",'callback_data'=>"managefa"]],
[['text'=>"قفل ها",'callback_data'=>"lockfa"],['text'=>"سودو",'callback_data'=>"sudohelpfa"]],
[['text'=>"○ خروج",'callback_data'=>'exit']],
   ]
   ])
   ]);
   }  
  } 
   	    elseif($data=="help"){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• به بخش راهنمای ربات خوش آمدید.
	
» لطفا زبان مورد نظر را برای دریافت لیست دستورات ربات انتخاب کنید",
	   'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"عمومی",'callback_data'=>"allen"],['text'=>"مدیریتی",'callback_data'=>"managefa"]],
[['text'=>"قفل ها",'callback_data'=>"lockfa"],['text'=>"سودو",'callback_data'=>"sudohelpfa"]],
	  	  	 [
				 ['text'=>"○ خروج",'callback_data'=>'exit']
		 ],
   ]
   ])
   ]);
   } 
			    elseif($data=="manageen"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev)){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• راهنمای دستورات مدیریتی :


/panel
» دریافت پنل تنظیمات و پنل مدیریت گروه

/settings
» دریافت تنظیمات گروه به صورت متنی

/promote [ریپلای]
» ادمین کرد فرد مورد نظر

/demote [ریپلای]
» تنزل مقام فرد مورد نظر

/admin list 
» دریافت لیست ادمین های گروه

/pin [ریپلای]
» سنحاق کردن پیام مورد نظر توسط ربات

/unpin 
» برداشتن پیام از حالت سنجاق

/kick [ریپلای | ایدی]
» اخراج فرد مورد نظر از گروه

/del [ریپلای]
» حذف پیام مورد نظر

/rmsg [1-300]
» پاک کردن پیام های اخیر گروه

/setname [نام]
» تنظیم نام گروه

/setdescription [متن]
» تنظیم اطلاعات گروه

/delphoto 
» حذف عکس گروه

/setphoto [ریپلای]
» تنظیم عکس گروه

/check
» دریافت میزان شارژ گروه

/automatic
» فعال کردن قفل ها به صورت خودکار و مدیریت خود کار گروه

/mute all
» ساکت کردن همه گروه

/unmute all
» غیر فعال کردن سکوت گروه

/welcome [enable |disable]
» روشن و خاموش کردن خوش امد

/setwelcome [متن]
» تنظیم پیام خوش امد

/silent
» افزودن فرد به لیست سکوت گروه

/silent [دقیقه]
» افزودن فرد به لیست سکوت گروه به صورت زمان داره

/unsilent
» خارج کردن فرد از لیست سکوت گروه

/list silent
» دریافت لیست سکوت گروه

/clean silentlist
» پاک کردن لیست سکوت گروه

/request
» درخواست تمدید شارژ برای گروه

/filter
» افزودن کلمه به لیست کلمات فیلترشده

/unfilter
» حذف کلمه از لیست کلمات فیلتر شده

/filterlist
» دریافت لیست کلمات فیلتر شد

/clean filterlist
» پاک کردن تمام کلمات درون لیست فیلتر

/restart settings
» ریستارت کردن تنظیمات گروه به حالت اولیه

/add [on | off]
» روشن و خاموش کردن اد اجباری در گروه

/setadd [عدد]
» تنظیم مقدار کاربری که یک فرد باید دعوت کند تا بتواند در گروه چت کند

/setwarn [عدد]
» تنظیم حداکثر اخطار برای کاربر

/warn [ریپلای]
» اخطار دادن به کاربر مورد نظر

/unwarn [ریپلای]
» کم کردن اخطار های کاربر مورد نظر

/warn info [ریپلای]
» به دست اوردن تعداد اخطار های کاربر

/setrules [متن]
» تنظیم قوانین گروه

/muteall [دقیقه]
» سکوت همه به صورت زمان دار

/channel [on | off]
» روشن و خاموش کردن قفل کانال

/setchannel [@یوزرنیم کانال]
» قفل کردن ربات روی کانال تنظیم شد

/modebot [on | off]
» روشن و خاموش کردن حالت سختگیرانه اضافه کردن ربات

/modewarn [on | off]
» روشن و خاموش کردن حالت سختگیرانه اخراج کاربر پس از رسیدن به حداکثر اخطار

/delall
» پاکسازی پیام های اخیر گروه تا حد ممکن


> برای دستورات انگلیسی ان هارو تایپ کنید و روی ان ها کلیک نکنید!

> در جای که علامت های [] وجود دارد در دستورات از ان ها استفاده نکنید

> میتوانید در متن خوش امد و قوانین برای گرفتن نام و ایدی فرد از موارد زیر استفاده کنید
gpname = دریافت نام گروه
username = دریافت یوزرنیم طرف


/setrules hi
",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'help']
					 ],
                     ]
               ])
           ]);
		   		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
				    elseif($data=="managefa"){
				 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• راهنمای دستورات مدیریتی :

پنل
» دریافت پنل تنظیمات و پنل مدیریت گروه

تنظیمات
» دریافت تنظیمات گروه به صورت متنی

ترفیع [ریپلای]
» ادمین کرد فرد مورد نظر

تنزل [ریپلای]
» تنزل مقام فرد مورد نظر

لیست ادمین
» دریافت لیست ادمین های گروه

سنجاق [ریپلای]
» سنحاق کردن پیام مورد نظر توسط ربات

حذف سنجاق
» حذف سنجاق پیام سنجاق شده

اخراج فرد
» اخراج فرد مورد نظر از گروه

حذف [ریپلای]
» حذف پیام مورد نظر

پاک کردن [1-300]
» پاک کردن پیام های اخیر گروه

تنظیم نام [نام]
» تنظیم نام گروه

تنظیم اطلاعات [متن]
» تنظیم اطلاعات گروه

حذف عکس
» حذف عکس گروه

تنظیم عکس [ریپلای]
» تنظیم عکس گروه

میزان شارژ
» دریافت میزان شارژ گروه

اتوماتیک فعال
» فعال کردن قفل ها به صورت خودکار و مدیریت خود کار گروه

سکوت همه
» ساکت کردن همه گروه

باصدا همه
» غیر فعال کردن سکوت گروه

خوش امد [روشن - خاموش]
» روشن . خاموش کردن خوش امد گویی گروه

تنظیم خوش امد [متن]
» تنظیم پیام خوش امد

سکوت
» افزودن فرد به لیست سکوت گروه

سکوت [دقیقه]
» افزودن فرد به لیست سکوت گروه به صورت زمان داره

باصدا
» خارج کردن فرد از لیست سکوت گروه

لیست سکوت
» دریافت لیست سکوت گروه

حذف لیست سکوت
» پاک کردن لیست سکوت گروه

درخواست شارژ
» درخواست تمدید شارژ برای گروه

افزودن فیلتر [کلمه]
» افزودن کلمه به لیست کلمات فیلترشده

حذف فیلتر [کلمه]
» حذف کلمه از لیست کلمات فیلتر شده

لیست فیلتر
» دریافت لیست کلمات فیلتر شد

حذف لیست فیلتر
» پاک کردن تمام کلمات درون لیست فیلتر

ریست تنظیمات
» ریستارت کردن تنظیمات گروه به حالت اولیه

دعوت [روشن | خاموش]
» روشن و خاموش کردن اد اجباری در گروه

تنظیم دعوت [عدد]
» تنظیم مقدار کاربری که یک فرد باید دعوت کند تا بتواند در گروه چت کند

تنظیم اخطار [عدد]
» تنظیم حداکثر اخطار برای کاربر

اخطار [ریپلای]
» اخطار دادن به کاربر مورد نظر

حذف اخطار [ریپلای]
» کم کردن اخطار های کاربر مورد نظر

اطلاعات اخطار [ریپلای]
» به دست اوردن تعداد اخطار های کاربر

تنظیم قوانین [متن]
» تنظیم قوانین گروه

سکوت همه [دقیقه]
» سکوت همه به صورت زمان دار

قفل کانال [روشن | خاموش]
» روشن و خاموش کردن قفل کانال

تنظیم کانال [@یوزرنیم کانال]
» قفل کردن ربات روی کانال تنظیم شد

سختگیرانه ربات [روشن | خاموش]
» روشن و خاموش کردن حالت سختگیرانه اضافه کردن ربات

سختگیرانه اخطار [روشن | خاموش]
» روشن و خاموش کردن حالت سختگیرانه اخراج کاربر پس از رسیدن به حداکثر اخطار

پاکسازی کلی
» پاکسازی پیام های اخیر گروه تا حد ممکن


> در جای که علامت های [] وجود دارد در دستورات از ان ها استفاده نکنید

> میتوانید در متن خوش امد و قوانین برای گرفتن نام و ایدی فرد از موارد زیر استفاده کنید
gpname = دریافت نام گروه
username = دریافت یوزرنیم طرف


/setrules hi
",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'help']
					 ],
                     ]
               ])
           ]);
		   		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
					}
					 elseif($data=="allen"){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• راهنمای دستورات عمومی :


/rules
» دریافت قوانین گروه

/link
» دریافت لینک گروه

/time
» دریافت تاریخ و ساعت

/id
» دریافت اطلاعات خودتان

/id [ریپلای]
» دریافت اطلاعات فرد

/me
» دریافت اطلاعات شما به همراه مقام شما در ربات

/nerkh
» دریافت نرخ برای خرید ربات

/info
» دریافت اطلاعات گروه و خودتان

/info [ریپلای| ایدی]
» دریافت اطلاعات فرد مورد نظر

/ping
» اطمینان حاصل کردن از انلاینی ربات

/logo [متن]
» تبدیل متن شما به لوگو

/gif [متن]
» تبدیل متن شما به گیف به صورت رندوم

فال
» دریافت فال حافظ

جوک
» دریافت جوک حنده دار

بگوو [متن]
» گفتن کلمه خود با ربات

/voice [متن]
» تبدیل متن شما به صدا

/arz
» دریافت اطلاعات بروز قیمت ارز

/age [متن]
» مساحبه سن خود نمونه درخواست 
/age 1340/05/03

/sticker [ریپلای]
» تبدیل عکس شما به استیکر

/photo [ریپلای]
» تبدیل استیکر شما به عکس

/startgap
» در صورت وجود مشکل با ارسال این دستور پشتیبانی به گروه شما اعزام میشود

/report [ریپلای]
» ارسال گزارش برای مدیر گروه

/kickme
» اخراج شما از گروه

/azan
» دریافت اوقات شرعی شهر تهران

/getpro [عدد]
» دریافت عکس پروفایل شما به عدد

/weather [نام شهر]
» دریافت اطلاعات اب و هوایی شهر مورد نظر

/instagram [یوزرنیم اینستاگرام]
» دریافت اطلاعات اکانت اینستاگرام فرد مورد نظر


> برای دستورات انگلیسی ان هارو تایپ کنید و روی ان ها کلیک نکنید!

> در جای که علامت های [] وجود دارد در دستورات از ان ها استفاده نکنید",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'help']
					 ],
                     ]
               ])
           ]);
    }
						 elseif($data=="allfa"){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• راهنمای دستورات عمومی :


قوانین
» دریافت قوانین گروه

لینک
» دریافت لینک گروه

ساعت
» دریافت تاریخ و ساعت

ایدی
» دریافت اطلاعات خودتان

ایدی [ریپلای]
» دریافت اطلاعات فرد

من
» دریافت اطلاعات شما به همراه مقام شما در ربات

نرخ
» دریافت نرخ برای خرید ربات

اطلاعات
» دریافت اطلاعات گروه و خودتان

اطلاعات فرد [ریپلای| ایدی]
» دریافت اطلاعات فرد مورد نظر

انلاینی
» اطمینان حاصل کردن از انلاینی ربات

لوگو بساز [متن]
» تبدیل متن شما به لوگو

/gif [متن]
» تبدیل متن شما به گیف به صورت رندوم

/voice [متن]
» تبدیل متن شما به صدا

تبدیل به عکس
» تبدیل عکس شما به استیکر

تبدیل به استیکر
» تبدیل استیکر شما به عکس

درخواست پشتیبانی
» در صورت وجود مشکل با ارسال این دستور پشتیبانی به گروه شما اعزام میشود

ریپورت [ریپلای]
» ارسال گزارش برای مدیر گروه

اخراج من
» اخراج شما از گروه

اذان
» دریافت اوقات شرعی شهر تهران

عکس پروفایل [عدد]
» دریافت عکس پروفایل شما به عدد

اب و هوا [نام شهر]
» دریافت اطلاعات اب و هوایی شهر مورد نظر

اینستاگرام [یوزرنیم اینستاگرام]
» دریافت اطلاعات اکانت اینستاگرام فرد مورد نظر


> ایموجی های ابتدای دستورات را وارد نکنید

> در جای که علامت های [] وجود دارد در دستورات از ان ها استفاده نکنید",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'help']
					 ],
                     ]
               ])
           ]);
    }	//////  @source_home
				    elseif($data=="lockfa"){
				 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• راهنمای دستورات قفلی :

» پاک کردن لینک 
قفل لینک
بازکردن لینک
—————
» پاک کرد هشتگ
قفل تگ
بازکردن تگ
—————
» پاک کردن یوزرنیم
قفل یوزرنیم
بازکردن یوزرنیم
—————
» پاک کردن متن
قفل متن
بازکردن متن
—————
» پاک کردن ویرایش پیام
قفل ویرایش
بازکردن ویرایش
—————
» پاک کردن ربات های مخرب
قفل ربات
بازکردن ربات
—————
» پاک کردن کلمات رکیک
قفل فحش
بازکردن فحش
—————
» پاک کردن تصاویر متحرک
قفل گیف
بازکردن گیف
—————
» پاک کردن عکس
قفل عکس
بازکردن عکس
—————
» پاک کردن فیلم
قفل ویدیو
بازکردن ویدیو
—————
» پاک کردن اهنگ
قفل اهنگ
بازکردن اهنگ
—————
» پاک کردن ویس
قفل ویس
بازکردن ویس
—————
» پاک کردن استیکر
قفل استیکر
بازکردن استیکر
—————
» پاک کردن ارسال مخاطب
قفل مخاطب
بازکردن مخاطب
—————
» پاک کردن فوروارد
قفل فوروارد
بازکردن فوروارد
—————
» پاک کردن ارسال مکان
قفل مکان
بازکردن مکان
—————
» پاک کردن ارسال فایل
قفل فایل
بازکردن فایل
—————
» پاک کردن بازی تحت وب
قفل بازی
بازکردن بازی
—————
» پاک کردن پیام ویدیویی
قفل پیام ویدیویی
بازکردن پیام ویدیویی
—————
» پاک کردن ریپلای کردن پیام
قفل ریپلای
بازکردن ریپلای
—————
» جلو گیری از دستورات عمومی
قفل دستورات
بازکردن دستورات
—————
» قفل خدمات تلگرام
قفل خدمات
بازکردن خدمات
—————
» خاموش و روشن کردن قفل خودکار گروه
قفل خودکار روشن
قفل خودکار خاموش
❄️تنظیم قفل خودکار [زمان پایان زمان شروع] 
• زمان را باید با فرمت صحیح استفاده کنید 
تنظیم قفل خودکار 13:36 19:05
—————
» خاموش و روشن کردن و تنظیم کاراکتر پیام
قفل کاراکتر
بازکردن کاراکتر
❄️تنظیم کاراکتر [حداقل کاراکتر حداکثر کاراکتر]
• باید حتما به عدد وارد کنید 
تنظیم کاراکتر 10 320


> بازکردن و قفل کردن هم از طریق پنل و هم از طریق دستور ممکن است",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'help']
					 ],
                     ]
               ])
           ]);
		   		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
					}	
									    elseif($data=="locken"){
				 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• راهنمای دستورات قفلی :


» پاک کردن لینک 
/lock link
/unlock link
—————
» پاک کرد هشتگ
/lock tag
/unlock tag
—————
» پاک کردن یوزرنیم
/lock username
/unlock username
—————
» پاک کردن متن
/lock text
/unlock text
—————
» پاک کردن ویرایش پیام
/lock edit
/unlock edit
—————
» پاک کردن ربات های مخرب
/lock bots
/unlock bots
—————
» پاک کردن کلمات رکیک
/lock fosh
/unlock fosh
—————
» پاک کردن تصاویر متحرک
/lock gif
/unlock gif
—————
» پاک کردن عکس
/lock photo
/unlock photo
—————
» پاک کردن فیلم
/lock video
/unlock video
—————
» پاک کردن اهنگ
/lock audio
/unlock audio
—————
» پاک کردن ویس
/lock voice
/unlock voice
—————
» پاک کردن استیکر
/lock sticker
/unlock sticker
—————
» پاک کردن ارسال مخاطب
/lock contact
/unlock contact
—————
» پاک کردن فوروارد
/lock forward
/unlock forward
—————
» پاک کردن ارسال مکان
/lock location
/unlock location
—————
» پاک کردن ارسال فایل
/lock document
/unlock document
—————
» پاک کردن بازی تحت وب
/lock game
/unlock game
—————
» پاک کردن پیام ویدیویی
/lock videonote
/unlock videonote
—————
» پاک کردن ریپلای کردن پیام
/lock reply
/unlock reply
—————
» جلو گیری از دستورات عمومی
/lock cmd
/unlock cmd
—————
» قفل خدمات تلگرام
/lock tgservic
/unlock tgservic
—————
» خاموش و روشن کردن قفل خودکار گروه
/lock auto
/unlock auto
/setlockauto [زمان پایان زمان شروع]
• زمان را باید با فرمت صحیح استفاده کنید 
/setlockauto 13:36 19:05
—————
» خاموش و روشن کردن و تنظیم کاراکتر پیام
/lock character
/unlock character
/setlockcharacter [حداقل کاراکتر حداکثر کاراکتر]
• باید حتما به عدد وارد کنید 
/setlockcharacter 10 320


> برای دستورات انگلیسی ان هارو تایپ کنید و روی ان ها کلیک نکنید!

> بازکردن و قفل کردن هم از طریق پنل و هم از طریق دستور ممکن است",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'help']
					 ],
                     ]
               ])
           ]);
		   		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
					}
						 elseif($data=="sudohelpfa"){
				 if (in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• راهنمای دستورات سودو :


پنل مدیریت
» دریافت پنل مدیریت ربات و ارسال پیام به گروه ها و ممبر ها

مدیریت گروه ها
» دریافت پنل مدیریت گروه های ربات

ترک
» خروج ربات از گروه

حذف
» حدف گروه از لیست گروه های پشتیبانی

نصب
» اضافه کردن گروه به لیست گروه های پشتیبانی

تنظیم شارژ
» تنظیم شارژ برای گروه مورد نظر

ارسال شارژ [ایدی گروه]
» فعال سازی شارژ برای گروه مورد نظر به مدت 30 روز

ترک [ایدی گروه]
» ترک ربات از گروه مورد نظر

 مسدود همگانی [ایدی]
» مسدود کردن فرد هم از پیوی و هم از تمام گروه های ربات

 ازاد همگانی [ایدی]
» خارج کردن فرد از لیست مسدودت همگانی

 لیست مسدود همگانی
» مشاهده لیست مسدود همگانی ربات",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'help']
					 ],
                     ]
               ])
           ]);
		   		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما دسترسی ندارید🥇",
]);
    }
					}
							elseif($data=="sudohelpen"){
				 if (in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• راهنمای دستورات سودو :


/panel admin
» دریافت پنل مدیریت ربات و ارسال پیام به گروه ها و ممبر ها

/panel group
» دریافت پنل مدیریت گروه های ربات

/leave
» خروج ربات از گروه

/rem
» حدف گروه از لیست گروه های پشتیبانی

/add
» اضافه کردن گروه به لیست گروه های پشتیبانی

/charge
» تنظیم شارژ برای گروه مورد نظر

/sendcharge [ایدی گروه]
» فعال سازی شارژ برای گروه مورد نظر به مدت 30 روز

/left [ایدی گروه]
» ترک ربات از گروه مورد نظر

/banall [ایدی]
» مسدود کردن فرد هم از پیوی و هم از تمام گروه های ربات

/unbanall [ایدی]
» خارج کردن فرد از لیست مسدودت همگانی

/banlist
» مشاهده لیست مسدود همگانی ربات",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'help']
					 ],
                     ]
               ])
           ]);
		   		 }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما دسترسی ندارید🥇",
]);
    }
					}
  elseif($data=="helppanel"){
									 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• به بخش راهنمای ربات خوش آمدید.
	
» لطفا زبان مورد نظر را برای دریافت لیست دستورات ربات انتخاب کنید",
	   'reply_markup'=>json_encode([
    'inline_keyboard'=>[
 	[
	  ['text'=>"فارسی",'callback_data'=>"farsipanel"],['text'=>"انگلیسی",'callback_data'=>"englishpanel"]
	  ],
	  	  	 [
				 ['text'=>"بازگشت 🔙",'callback_data'=>'help']
		 ],
		      
   ]
   ])
   ]);
   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
   } 
						}
   	    elseif($data=="englishpanel"){
					 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"به بخش انگلیسی ربات خوش اومدید 

» لطفا بخش مورد نظر خورد را انتخاب کنید
",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				    	[
	  ['text'=>"☑️عمومی",'callback_data'=>"allenpanel"],['text'=>"☑️مدیریتی",'callback_data'=>"manageenpanel"]
	  ],
	  				    	[
	  ['text'=>"☑️قفل ها",'callback_data'=>"lockenpanel"],['text'=>"☑️سودو",'callback_data'=>"sudohelpenpanel"]
	  ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'helppanel']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
		}
		    elseif($data=="farsipanel"){
						 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"🏆به بخش راهنمای فارسی ربات خوش آمدید.

» لطفا بخش مورد نظر خورد را انتخاب کنید",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				    	[
	  ['text'=>"☑️عمومی",'callback_data'=>"allfapanel"],['text'=>"☑️مدیریتی",'callback_data'=>"managefapanel"]
	  ],
	  				    	[
	  ['text'=>"☑️قفل ها",'callback_data'=>"lockfapanel"],['text'=>"☑️سودو",'callback_data'=>"sudohelpfapanel"]
	  ],
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'helppanel']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
			}
			elseif($data=="manageenpanel"){
			 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• راهنمای دستورات مدیریتی :


/panel
» دریافت پنل تنظیمات و پنل مدیریت گروه

/settings
» دریافت تنظیمات گروه به صورت متنی

/promote [ریپلای]
» ادمین کرد فرد مورد نظر

/demote [ریپلای]
» تنزل مقام فرد مورد نظر

/admin list 
» دریافت لیست ادمین های گروه

/pin [ریپلای]
» سنحاق کردن پیام مورد نظر توسط ربات

/unpin 
» برداشتن پیام از حالت سنجاق

/kick [ریپلای | ایدی]
» اخراج فرد مورد نظر از گروه

/del [ریپلای]
» حذف پیام مورد نظر

/rmsg [1-300]
» پاک کردن پیام های اخیر گروه

/setname [نام]
» تنظیم نام گروه

/setdescription [متن]
» تنظیم اطلاعات گروه

/delphoto 
» حذف عکس گروه

/setphoto [ریپلای]
» تنظیم عکس گروه

/check
» دریافت میزان شارژ گروه

/automatic
» فعال کردن قفل ها به صورت خودکار و مدیریت خود کار گروه

/mute all
» ساکت کردن همه گروه

/unmute all
» غیر فعال کردن سکوت گروه

/welcome [enable |disable]
» روشن و خاموش کردن خوش امد

/setwelcome [متن]
» تنظیم پیام خوش امد

/silent
» افزودن فرد به لیست سکوت گروه

/silent [دقیقه]
» افزودن فرد به لیست سکوت گروه به صورت زمان داره

/unsilent
» خارج کردن فرد از لیست سکوت گروه

/list silent
» دریافت لیست سکوت گروه

/clean silentlist
» پاک کردن لیست سکوت گروه

/request
» درخواست تمدید شارژ برای گروه

/filter
» افزودن کلمه به لیست کلمات فیلترشده

/unfilter
» حذف کلمه از لیست کلمات فیلتر شده

/filterlist
» دریافت لیست کلمات فیلتر شد

/clean filterlist
» پاک کردن تمام کلمات درون لیست فیلتر

/restart settings
» ریستارت کردن تنظیمات گروه به حالت اولیه

/add [on | off]
» روشن و خاموش کردن اد اجباری در گروه

/setadd [عدد]
» تنظیم مقدار کاربری که یک فرد باید دعوت کند تا بتواند در گروه چت کند

/setwarn [عدد]
» تنظیم حداکثر اخطار برای کاربر

/warn [ریپلای]
» اخطار دادن به کاربر مورد نظر

/unwarn [ریپلای]
» کم کردن اخطار های کاربر مورد نظر

/warn info [ریپلای]
» به دست اوردن تعداد اخطار های کاربر

/setrules [متن]
» تنظیم قوانین گروه

/muteall [دقیقه]
» سکوت همه به صورت زمان دار

/channel [on | off]
» روشن و خاموش کردن قفل کانال

/setchannel [@یوزرنیم کانال]
» قفل کردن ربات روی کانال تنظیم شد

/modebot [on | off]
» روشن و خاموش کردن حالت سختگیرانه اضافه کردن ربات

/modewarn [on | off]
» روشن و خاموش کردن حالت سختگیرانه اخراج کاربر پس از رسیدن به حداکثر اخطار

/delall
» پاکسازی پیام های اخیر گروه تا حد ممکن


برای دستورات انگلیسی ان هارو تایپ کنید و روی ان ها کلیک نکنید!

در جای که علامت های [] وجود دارد در دستورات از ان ها استفاده نکنید

میتوانید در متن خوش امد و قوانین برای گرفتن نام و ایدی فرد از موارد زیر استفاده کنید
gpname = دریافت نام گروه
username = دریافت یوزرنیم طرف",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'englishpanel']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
				}
				    elseif($data=="managefapanel"){
				 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• راهنمای دستورات مدیریتی :

پنل
» دریافت پنل تنظیمات و پنل مدیریت گروه

تنظیمات
» دریافت تنظیمات گروه به صورت متنی

ترفیع [ریپلای]
» ادمین کرد فرد مورد نظر

تنزل [ریپلای]
» تنزل مقام فرد مورد نظر

لیست ادمین [ریپلای]
» دریافت لیست ادمین های گروه

سنجاق [ریپلای]
» سنحاق کردن پیام مورد نظر توسط ربات

حذف سنجاق
» حذف سنجاق پیام سنجاق شده

پاک کردن [1-300]
» پاک کردن پیام های اخیر گروه

تنظیم نام [نام]
» تنظیم نام گروه

تنظیم اطلاعات [متن]
» تنظیم اطلاعات گروه

حذف عکس
» حذف عکس گروه

تنظیم عکس
» تنظیم عکس گروه

میزان شارژ
» دریافت میزان شارژ گروه

اتوماتیک فعال
» فعال کردن قفل ها به صورت خودکار و مدیریت خود کار گروه

سکوت همه
» ساکت کردن همه گروه

باصدا همه
» غیر فعال کردن سکوت گروه

خوش امد روشن
» روشن کردن خوش امد

خوش امد خاموش
» خاموش کردن خوش امد

تنظیم خوش امد [متن]
» تنظیم پیام خوش امد

سکوت
» افزودن فرد به لیست سکوت گروه

سکوت [دقیقه]
» افزودن فرد به لیست سکوت گروه به صورت زمان داره

باصدا
» خارج کردن فرد از لیست سکوت گروه

لیست سکوت
» دریافت لیست سکوت گروه

پاک کردن لیست سکوت
» پاک کردن لیست سکوت گروه

درخواست شارژ
» درخواست تمدید شارژ برای گروه

افزودن فیلتر [کلمه]
» افزودن کلمه به لیست کلمات فیلترشده

حذف فیلتر [کلمه]
» حذف کلمه از لیست کلمات فیلتر شده

فیلتر لیست
» دریافت لیست کلمات فیلتر شد

حذف لیست فیلتر
» پاک کردن تمام کلمات درون لیست فیلتر

ریست تنظیمات
» ریستارت کردن تنظیمات گروه به حالت اولیه

ادد [روشن | خاموش]
» روشن و خاموش کردن اد اجباری در گروه

تنظیم دعوت [عدد]
» تنظیم مقدار کاربری که یک فرد باید دعوت کند تا بتواند در گروه چت کند

تنظیم اخطار [عدد]
» تنظیم حداکثر اخطار برای کاربر

اخطار [ریپلای]
» اخطار دادن به کاربر مورد نظر

حذف اخطار [ریپلای]
» کم کردن اخطار های کاربر مورد نظر

اطلاعات اخطار [ریپلای]
» به دست اوردن تعداد اخطار های کاربر

تنظیم قوانین [متن]
» تنظیم قوانین گروه

سکوت همه [دقیقه]
» سکوت همه به صورت زمان دار

قفل کانال [روشن | خاموش]
» روشن و خاموش کردن قفل کانال

تنظیم کانال [@یوزرنیم کانال]
» قفل کردن ربات روی کانال تنظیم شد

سختگیرانه ربات [روشن | خاموش]
» روشن و خاموش کردن حالت سختگیرانه اضافه کردن ربات

سختگیرانه اخطار [روشن | خاموش]
» روشن و خاموش کردن حالت سختگیرانه اخراج کاربر پس از رسیدن به حداکثر اخطار

 پاکسازی کلی
» پاکسازی پیام های اخیر گروه تا حد ممکن


> در جای که علامت های [] وجود دارد در دستورات از ان ها استفاده نکنید

> میتوانید در متن خوش امد و قوانین برای گرفتن نام و ایدی فرد از موارد زیر استفاده کنید
gpname = دریافت نام گروه
username = دریافت یوزرنیم طرف",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'farsipanel']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
					}
					 elseif($data=="allenpanel"){
						 	 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• راهنمای دستورات عمومی :


/rules
» دریافت قوانین گروه

/link
» دریافت لینک گروه

/time
» دریافت تاریخ و ساعت

/id
» دریافت اطلاعات خودتان

/id [ریپلای]
» دریافت اطلاعات فرد

/me
» دریافت اطلاعات شما به همراه مقام شما در ربات

/nerkh
» دریافت نرخ برای خرید ربات

/info
» دریافت اطلاعات گروه و خودتان

/info [ریپلای| ایدی]
» دریافت اطلاعات فرد مورد نظر

/ping
» اطمینان حاصل کردن از انلاینی ربات

/logo [متن]
» تبدیل متن شما به لوگو

/gif [متن]
» تبدیل متن شما به گیف به صورت رندوم

/voice [متن]
» تبدیل متن شما به صدا

/sticker [ریپلای]
» تبدیل عکس شما به استیکر

/photo [ریپلای]
» تبدیل استیکر شما به عکس

/startgap
» در صورت وجود مشکل با ارسال این دستور پشتیبانی به گروه شما اعزام میشود

/report [ریپلای]
» ارسال گزارش برای مدیر گروه

/kickme
» اخراج شما از گروه

/azan
» دریافت اوقات شرعی شهر تهران

/getpro [عدد]
» دریافت عکس پروفایل شما به عدد

/weather [نام شهر]
» دریافت اطلاعات اب و هوایی شهر مورد نظر

/instagram [یوزرنیم اینستاگرام]
» دریافت اطلاعات اکانت اینستاگرام فرد مورد نظر


> برای دستورات انگلیسی ان هارو تایپ کنید و روی ان ها کلیک نکنید!

> در جای که علامت های [] وجود دارد در دستورات از ان ها استفاده نکنید",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'englishpanel']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
					 }
						 elseif($data=="allfapanel"){
							 	 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• راهنمای دستورات عمومی :


قوانین
» دریافت قوانین گروه

لینک
» دریافت لینک گروه

ساعت
» دریافت تاریخ و ساعت

ایدی
» دریافت اطلاعات خودتان

ایدی [ریپلای]
» دریافت اطلاعات فرد

من
» دریافت اطلاعات شما به همراه مقام شما در ربات

نرخ
» دریافت نرخ برای خرید ربات

اطلاعات
» دریافت اطلاعات گروه و خودتان

اطلاعات فرد [ریپلای| ایدی]
» دریافت اطلاعات فرد مورد نظر

انلاینی
» اطمینان حاصل کردن از انلاینی ربات

لوگو بساز [متن]
» تبدیل متن شما به لوگو

/gif [متن]
» تبدیل متن شما به گیف به صورت رندوم

/voice [متن]
» تبدیل متن شما به صدا

تبدیل به عکس
» تبدیل عکس شما به استیکر

تبدیل به استیکر
» تبدیل استیکر شما به عکس

درخواست پشتیبانی
» در صورت وجود مشکل با ارسال این دستور پشتیبانی به گروه شما اعزام میشود

ریپورت [ریپلای]
» ارسال گزارش برای مدیر گروه

اخراج من
» اخراج شما از گروه

اذان
» دریافت اوقات شرعی شهر تهران

عکس پروفایل [عدد]
» دریافت عکس پروفایل شما به عدد

اب و هوا [نام شهر]
» دریافت اطلاعات اب و هوایی شهر مورد نظر

اینستاگرام [یوزرنیم اینستاگرام]
» دریافت اطلاعات اکانت اینستاگرام فرد مورد نظر


> در جای که علامت های [] وجود دارد در دستورات از ان ها استفاده نکنید",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'farsipanel']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }	
						 }
				    elseif($data=="lockfapanel"){
				 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• راهنمای دستورات قفلی :

» پاک کردن لینک 
قفل لینک
بازکردن لینک
—————
» پاک کرد هشتگ
قفل تگ
بازکردن تگ
—————
» پاک کردن یوزرنیم
قفل یوزرنیم
بازکردن یوزرنیم
—————
» پاک کردن متن
قفل متن
بازکردن متن
—————
» پاک کردن ویرایش پیام
قفل ویرایش
بازکردن ویرایش
—————
» پاک کردن ربات های مخرب
قفل ربات
بازکردن ربات
—————
» پاک کردن کلمات رکیک
قفل فحش
بازکردن فحش
—————
» پاک کردن تصاویر متحرک
قفل گیف
بازکردن گیف
—————
» پاک کردن عکس
قفل عکس
بازکردن عکس
—————
» پاک کردن فیلم
قفل ویدیو
بازکردن ویدیو
—————
» پاک کردن اهنگ
قفل اهنگ
بازکردن اهنگ
—————
» پاک کردن ویس
قفل ویس
بازکردن ویس
—————
» پاک کردن استیکر
قفل استیکر
بازکردن استیکر
—————
» پاک کردن ارسال مخاطب
قفل مخاطب
بازکردن مخاطب
—————
» پاک کردن فوروارد
قفل فوروارد
بازکردن فوروارد
—————
» پاک کردن ارسال مکان
قفل مکان
بازکردن مکان
—————
» پاک کردن ارسال فایل
قفل فایل
بازکردن فایل
—————
» پاک کردن بازی تحت وب
قفل بازی
بازکردن بازی
—————
» پاک کردن پیام ویدیویی
قفل پیام ویدیویی
بازکردن پیام ویدیویی
—————
» پاک کردن ریپلای کردن پیام
قفل ریپلای
بازکردن ریپلای
—————
» جلو گیری از دستورات عمومی
قفل دستورات
بازکردن دستورات
—————
» قفل خدمات تلگرام
قفل خدمات
بازکردن خدمات
—————
» خاموش و روشن کردن قفل خودکار گروه
قفل خودکار روشن
قفل خودکار خاموش
❄️تنظیم قفل خودکار [زمان پایان زمان شروع] 
• زمان را باید با فرمت صحیح استفاده کنید 
تنظیم قفل خودکار 13:36 19:05
—————
» خاموش و روشن کردن و تنظیم کاراکتر پیام
قفل کاراکتر
بازکردن کاراکتر
❄️تنظیم کاراکتر [حداقل کاراکتر حداکثر کاراکتر]
• باید حتما به عدد وارد کنید 
تنظیم کاراکتر 10 320


> بازکردن و قفل کردن هم از طریق پنل و هم از طریق دستور ممکن است",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'farsipanel']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
					}	
									    elseif($data=="lockenpanel"){
				 if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• راهنمای دستورات قفلی :


👑پاک کردن لینک 
/lock link
/unlock link
—————
👑پاک کرد هشتگ
/lock tag
/unlock tag
—————
👑 پاک کردن یوزرنیم
/lock username
/unlock username
—————
👑 پاک کردن متن
/lock text
/unlock text
—————
👑 پاک کردن ویرایش پیام
/lock edit
/unlock edit
—————
👑 پاک کردن ربات های مخرب
/lock bots
/unlock bots
—————
👑 پاک کردن کلمات رکیک
/lock fosh
/unlock fosh
—————
» 👑 پاک کردن تصاویر متحرک
/lock gif
/unlock gif
—————
👑 پاک کردن عکس
/lock photo
/unlock photo
—————
👑 پاک کردن فیلم
/lock video
/unlock video
—————
👑 پاک کردن اهنگ
/lock audio
/unlock audio
—————
👑 پاک کردن ویس
/lock voice
/unlock voice
—————
👑 پاک کردن استیکر
/lock sticker
/unlock sticker
—————
👑 پاک کردن ارسال مخاطب
/lock contact
/unlock contact
—————
👑 پاک کردن فوروارد
/lock forward
/unlock forward
—————
👑 پاک کردن ارسال مکان
/lock location
/unlock location
—————
👑 پاک کردن ارسال فایل
/lock document
/unlock document
—————
👑 پاک کردن بازی تحت وب
/lock game
/unlock game
—————
👑 پاک کردن پیام ویدیویی
/lock videonote
/unlock videonote
—————
👑 پاک کردن ریپلای کردن پیام
/lock reply
/unlock reply
—————
👑 جلو گیری از دستورات عمومی
/lock cmd
/unlock cmd
—————
👑 قفل خدمات تلگرام
/lock tgservic
/unlock tgservic
—————
👑 خاموش و روشن کردن قفل خودکار گروه
/lock auto
/unlock auto
/setlockauto [زمان پایان زمان شروع]
• زمان را باید با فرمت صحیح استفاده کنید 
/setlockauto 13:36 19:05
—————
👑 خاموش و روشن کردن و تنظیم کاراکتر پیام
/lock character
/unlock character
/setlockcharacter [حداقل کاراکتر حداکثر کاراکتر]
• باید حتما به عدد وارد کنید 
/setlockcharacter 10 320


> برای دستورات انگلیسی ان هارو تایپ کنید و روی ان ها کلیک نکنید!

> بازکردن و قفل کردن هم از طریق پنل و هم از طریق دستور ممکن است",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'englishpanel']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما ادمین نیستین تلاش نکنید",
]);
    }
					}
						 elseif($data=="sudohelpfapanel"){
				 if (in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• راهنمای دستورات سودو :


پنل مدیریت
🏆 دریافت پنل مدیریت ربات و ارسال پیام به گروه ها و ممبر ها

مدیریت گروه ها
» 🏆دریافت پنل مدیریت گروه های ربات

ترک
🏆خروج ربات از گروه

حذف
🏆حدف گروه از لیست گروه های پشتیبانی

نصب
🏆اضافه کردن گروه به لیست گروه های پشتیبانی

تنظیم شارژ
🏆تنظیم شارژ برای گروه مورد نظر

ارسال شارژ [ایدی گروه]
🏆فعال سازی شارژ برای گروه مورد نظر به مدت 30 روز

ترک [ایدی گروه]
🏆 ترک ربات از گروه مورد نظر

 مسدود همگانی [ایدی]
🏆 مسدود کردن فرد هم از پیوی و هم از تمام گروه های ربات

 ازاد همگانی [ایدی]
🏆خارج کردن فرد از لیست مسدودت همگانی

 لیست مسدود همگانی
🏆مشاهده لیست مسدود همگانی ربات",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'farsipanel']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما دسترسی ندارید🥇",
]);
    }
					}
							elseif($data=="sudohelpenpanel"){
				 if (in_array($fromid,$Dev) ){
            bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• راهنمای دستورات سودو :


/panel admin
🏆دریافت پنل مدیریت ربات و ارسال پیام به گروه ها و ممبر ها

/panel group
🏆 دریافت پنل مدیریت گروه های ربات

/leave
🏆خروج ربات از گروه

/rem
🏆حدف گروه از لیست گروه های پشتیبانی

/add
🏆 اضافه کردن گروه به لیست گروه های پشتیبانی

/charge
🏆تنظیم شارژ برای گروه مورد نظر

/sendcharge [ایدی گروه]
🏆فعال سازی شارژ برای گروه مورد نظر به مدت 30 روز

/left [ایدی گروه]
🏆ترک ربات از گروه مورد نظر

/banall [ایدی]
🏆مسدود کردن فرد هم از پیوی و هم از تمام گروه های ربات

/unbanall [ایدی]
🏆خارج کردن فرد از لیست مسدودت همگانی

/banlist
🏆مشاهده لیست مسدود همگانی ربات",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
					 [
					 ['text'=>"بازگشت 🔙",'callback_data'=>'englishpanel']
					 ],
                     ]
               ])
           ]);
		   }else{
			bot('answerCallbackQuery',[
'callback_query_id'=>$membercall,
'text'=>"شما دسترسی ندارید🥇",
]);
    }
					}
?>