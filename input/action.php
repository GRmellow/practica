<?php
$inputEmail = $_POST['inputEmail'];
$json_content = file_get_contents("emails.json");

function isNewEmail($collection, $email){
    foreach ($collection as $collection){
        if($collection == $email){
            return false;
        }
    }
    return true;
}

if($json_content){
    $emails = json_decode($json_content);
    if(isNewEmail($emails, $inputEmail)){
        array_push($emails, $inputEmail);
        $json_content = json_encode($emails);
        $fp = fopen('emails.json', 'w');
        fwrite($fp, $json_content);
        fclose($fp);
    } 
} else {
    $emails = [];
    array_push($emails, $inputEmail);
    $json_content = json_encode($emails);
    $fp = fopen('emails.json', 'w+');
    fwrite($fp, $json_content);
    fclose($fp);
}