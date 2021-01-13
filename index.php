<?php

ob_start();
require './main.php';
define('API_KEY', $token);
//tokenni yozing
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

$update = json_decode(file_get_contents('php://input'));
if ($update) {
$message = $update->message;

$text = $message->text;
$photo = $update->message->photo;
$gif = $update->message->animation;
$video = $update->message->video;
$music = $update->message->audio;
$voice = $update->message->voice;
$sticker = $update->message->sticker;
$document = $update->message->document;

$mes_id = $update->message->message_id;
$from_id = $message->from->id;
$mid = $message->message_id;
$forid = $update->message->forward_from->message_id;
$edname = $editm ->from->first_name;
$forward = $update->message->forward_from;
$editm = $update->edited_message;
$fadmin = $message->from->id;

//group
$ctitle = $update->message->chat->title;
$cuname = $update->message->chat->username;
$chat_id = $update->message->chat->id;
$cid = $update->message->chat->id;
$turi = $update->message->chat->type;

$new_user = $message->new_chat_member;
$new_user_id= $message->new_chat_member->id;
$new_fname= $message->new_chat_member->first_name;
$username = $message->from->username;
$fname= $message->from->first_name;
$is_bot = $message->new_chat_member->is_bot;

$left_user = $message->left_chat_member;
$left_user_id= $message->left_chat_member->id;
$left_fname= $message->left_chat_member->first_name;
$left_is_bot = $message->left_chat_member->is_bot;

//<---------------START IN----------------->
if(mb_stripos($text,"/start")!==false){
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"Assalomu aleykum $ufname $uname,\n Ushbu bot @... guruhi uchun mahsus yaratilgan",
        'parse_mode'=>'html',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"Guruhga o'tish",'url'=>"https://telegram.me/@..."]],                
            ]
        ])
    ]);
}

if($left_user){
    bot('deletemessage',[
        'chat_id'=>$chat_id,
        'message_id'=>$mid,
    ]);
}

if($new_user){
    bot('deletemessage',[
        'chat_id'=>$chat_id,
        'message_id'=>$mid,
    ]);
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"[$new_fname](tg://user?id=$new_user_id) $ctitle gruhiga xush kelibsiz",
        'parse_mode'=>'markdown',
    ]);
}
}