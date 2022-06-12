<?php
$json = file_get_contents("php://input");
$update = json_decode($json,true);

$msgID=$update["message"]["chat"]["id"];
$name=$update["message"]["chat"]["username"];
$text=$update["message"]["text"];

function getapi($text)
{ 
    $curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://free-to-play-games-database.p.rapidapi.com/api/games?category=".$text,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: free-to-play-games-database.p.rapidapi.com",
		"x-rapidapi-key: 91d19340camsh16f1ea31cb9abcep18af0ejsn4b6021c2313f"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
return $response;
}


switch($text)
{
    case "/start" :
    sendmsg($msgID,"Selamat Datang Di F2P-bot,".$name.".
    Berikut Ini Adalah Command Yang Bisa Digunakan:
    1./list
    2./credits");
    break;
    case "/credits" :
    sendmsg($msgID,"Bot ini Diajukan untuk Memenuhi Tugas Besar
    Mata kuliah Aplikasi Teknologi Online
    
    Dengan Dosen Pengampu : Andri Heryandi, MT
    
    Bot Ini Dibuat Oleh:
    
    Nama    : Tri Tafriyadi
    NIM     : 10119213
    Kelas   : IF-6");
    break;
    case "/list" :
    sendmsg($msgID,"Berikut Adalah Command Kategori Yang Bisa Digunakan
    Untuk Melihat Daftar Gamenya:
    1./mmorpg
    2./mmo
    3./shooter
    4./strategy
    5./moba
    6./racing
    7./sports
    8./social
    9./fighting
    10./card
    11./mmorpgplus (untuk melihat daftar game mmorpg dari 17 sd 31)
    12./mmoplus (untuk melihat daftar game mmo dari 17 sd 31)
    13./shooterplus (untuk melihat daftar game shooter dari 17 sd 31)
    14./strategyplus (untuk melihat daftar game strategy dari 17 sd 31)
    15./mobaplus (untuk melihat daftar game moba dari 17 sd 32)
    16./cardplus (untuk melihat daftar game card dari 17 sd 31)");
    break;
    case "/mmorpg" :
        $text="mmorpg";
        $response=getapi($text);
        $data=json_decode($response,true);
        $i=0;
        do
        {
        $title=$data[$i]["title"];
        $gameurl=$data[$i]["game_url"];
        $j=$i+1;
        sendmsg($msgID,$j.".".$title." Link Download:".$gameurl);
        $i++;
        }
        while($i <=15);
        sendmsg($msgID,"jika ingin melihat lebih banyak ketik /mmorpgplus");
        break;
        case "/mmorpgplus" :
            $text="mmorpg";
            $response=getapi($text);
            $data=json_decode($response,true);
            $i=16;
            do
            {
            $title=$data[$i]["title"];
            $gameurl=$data[$i]["game_url"];
            $j=$i+1;
            sendmsg($msgID,$j.".".$title." Link Download:".$gameurl);
            $i++;
            }
            while($i <=30);
            break;
        break;
    case "/racing" :
        $text="racing";
        $response=getapi($text);
        $data=json_decode($response,true);
        $i=1;
        foreach($data as $datajadi)
        {
            $text=$i.".".$datajadi["title"]." Link Download:".$datajadi["game_url"];
            sendmsg($msgID,$text);
            $i++;
        }
    break;
    case "/mmo" :
        $text="mmo";
        $response=getapi($text);
        $data=json_decode($response,true);
        $i=0;
        do
        {
        $title=$data[$i]["title"];
        $gameurl=$data[$i]["game_url"];
        $j=$i+1;
        sendmsg($msgID,$j.".".$title." Link Download:".$gameurl);
        $i++;
        }
        while($i <=15);
        sendmsg($msgID,"jika ingin melihat lebih banyak ketik /mmoplus");
        break;
        case "/mmoplus" :
            $text="mmo";
            $response=getapi($text);
            $data=json_decode($response,true);
            $i=16;
            do
            {
            $title=$data[$i]["title"];
            $gameurl=$data[$i]["game_url"];
            $j=$i+1;
            sendmsg($msgID,$j.".".$title." Link Download:".$gameurl);
            $i++;
            }
            while($i <=30);
            break;
        break;
    case "/shooter" :
        $text="shooter";
        $response=getapi($text);
        $data=json_decode($response,true);
        $i=0;
        do
        {
        $title=$data[$i]["title"];
        $gameurl=$data[$i]["game_url"];
        $j=$i+1;
        sendmsg($msgID,$j.".".$title." Link Download:".$gameurl);
        $i++;
        }
        while($i <=15);
        sendmsg($msgID,"jika ingin melihat lebih banyak ketik /shooterplus");
        break;
        case "/shooterplus" :
            $text="shooter";
            $response=getapi($text);
            $data=json_decode($response,true);
            $i=16;
            do
            {
            $title=$data[$i]["title"];
            $gameurl=$data[$i]["game_url"];
            $j=$i+1;
            sendmsg($msgID,$j.".".$title." Link Download:".$gameurl);
            $i++;
            }
            while($i <=30);
            break;
        break;
    case "/strategy" :
        $text="strategy";
        $response=getapi($text);
        $data=json_decode($response,true);
        $i=0;
        do
        {
        $title=$data[$i]["title"];
        $gameurl=$data[$i]["game_url"];
        $j=$i+1;
        sendmsg($msgID,$j.".".$title." Link Download:".$gameurl);
        $i++;
        }
        while($i <=15);
        sendmsg($msgID,"jika ingin melihat lebih banyak ketik /strategyplus");
        break;
        case "/strategyplus" :
            $text="strategy";
            $response=getapi($text);
            $data=json_decode($response,true);
            $i=16;
            do
            {
            $title=$data[$i]["title"];
            $gameurl=$data[$i]["game_url"];
            $j=$i+1;
            sendmsg($msgID,$j.".".$title." Link Download:".$gameurl);
            $i++;
            }
            while($i <=30);
            break;
        break;
    case "/moba" :
        $text="moba";
        $response=getapi($text);
        $data=json_decode($response,true);
        $i=0;
        do
        {
        $title=$data[$i]["title"];
        $gameurl=$data[$i]["game_url"];
        $j=$i+1;
        sendmsg($msgID,$j.".".$title." Link Download:".$gameurl);
        $i++;
        }
        while($i <=15);
        sendmsg($msgID,"jika ingin melihat lebih banyak ketik /mobaplus");
        break;
        case "/mobaplus" :
            $text="moba";
            $response=getapi($text);
            $data=json_decode($response,true);
            $i=16;
            do
            {
            $title=$data[$i]["title"];
            $gameurl=$data[$i]["game_url"];
            $j=$i+1;
            sendmsg($msgID,$j.".".$title." Link Download:".$gameurl);
            $i++;
            }
            while($i <=31);
            break;
        break;
    case "/sports" :
        $text="sports";
        $response=getapi($text);
        $data=json_decode($response,true);
        $i=1;
        foreach($data as $datajadi)
        {
            $text=$i.".".$datajadi["title"]." Link Download:".$datajadi["game_url"];
            sendmsg($msgID,$text);
            $i++;
        }
        break;
    case "/social" :
        $text="social";
        $response=getapi($text);
        $data=json_decode($response,true);
        $i=1;
        foreach($data as $datajadi)
        {
            $text=$i.".".$datajadi["title"]." Link Download:".$datajadi["game_url"];
            sendmsg($msgID,$text);
            $i++;
        }
        break;
    case "/fighting" :
        $text="fighting";
        $response=getapi($text);
        $data=json_decode($response,true);
        $i=1;
        foreach($data as $datajadi)
        {
            $text=$i.".".$datajadi["title"]." Link Download:".$datajadi["game_url"];
            sendmsg($msgID,$text);
            $i++;
        }
        break;
    case "/card" :
        $text="card";
        $response=getapi($text);
        $data=json_decode($response,true);
        $i=0;
        do
        {
        $title=$data[$i]["title"];
        $gameurl=$data[$i]["game_url"];
        $j=$i+1;
        sendmsg($msgID,$j.".".$title." Link Download:".$gameurl);
        $i++;
        }
        while($i <=15);
        sendmsg($msgID,"jika ingin melihat lebih banyak ketik /cardplus");
        break;
        case "/cardplus" :
            $text="card";
            $response=getapi($text);
            $data=json_decode($response,true);
            $i=16;
            do
            {
            $title=$data[$i]["title"];
            $gameurl=$data[$i]["game_url"];
            $j=$i+1;
            sendmsg($msgID,$j.".".$title." Link Download:".$gameurl);
            $i++;
            }
            while($i <=30);
            break;
        break;
    default:
    sendmsg($msgID,"Pesan Tidak Dikenal");
}

function sendmsg($msgID,$msg)
{
    $text=urlencode($msg);
    $url = "https://api.telegram.org/bot1948027441:AAFW5KzFMWP9RMfaPbePMtLxV-Goumg6CWM/sendMessage?chat_id=".$msgID."&text=".$text;
    file_get_contents($url);
}
?>