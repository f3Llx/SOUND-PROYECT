<?php

function insertSong($userid, $music, $artist, $tittle, $cover) {
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = 'music';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql_insertCurrent_info = "INSERT INTO `music_songs` (`id`, `userid`, `music`, `artist`, `tittle`, `cover`) VALUES (NULL, '$userid', '$music', '$artist', '$tittle', '$cover');";
        $conn->exec($sql_insertCurrent_info);

        }
    catch(PDOException $e)
        {
        echo $sql_insertCurrent_info . "<br>" . $e->getMessage();
        }
    
    $conn = null;


}


function update_my_password($username_id, $new_edited_password) {
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = 'music';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql_insertCurrent_info = "UPDATE `user` SET `password` = '$new_edited_password' WHERE `user`.`id` = '$username_id';";
        $conn->exec($sql_insertCurrent_info);

        }
    catch(PDOException $e)
        {
        echo $sql_insertCurrent_info . "<br>" . $e->getMessage();
        }
    
    $conn = null;


}
function update_my_color($username_id, $new_edited_color) {
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = 'music';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql_insertCurrent_info = "UPDATE `user` SET `username_color` = '$new_edited_color' WHERE `user`.`id` = '$username_id';";
        $conn->exec($sql_insertCurrent_info);

        }
    catch(PDOException $e)
        {
        echo $sql_insertCurrent_info . "<br>" . $e->getMessage();
        }
    
    $conn = null;


}
function update_my_img($username_id, $new_edited_img) {
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = 'music';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql_insertCurrent_info = "UPDATE `user` SET `username_img_url` = '$new_edited_img' WHERE `user`.`id` = '$username_id';";
        $conn->exec($sql_insertCurrent_info);

        }
    catch(PDOException $e)
        {
        echo $sql_insertCurrent_info . "<br>" . $e->getMessage();
        }
    
    $conn = null;


}
function update_my_banner($username_id, $new_edited_banner) {
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = 'music';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql_insertCurrent_info = "UPDATE `user` SET `banner_img_url` = '$new_edited_banner' WHERE `user`.`id` = '$username_id';";
        $conn->exec($sql_insertCurrent_info);

        }
    catch(PDOException $e)
        {
        echo $sql_insertCurrent_info . "<br>" . $e->getMessage();
        }
    
    $conn = null;


}


function register_me($name_r,$lastname_r,$username_r,$email_r,$password_r) {
    
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = 'music';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql_insertRegister_info = "INSERT INTO user (name, lastname, username,email,password) VALUES ('$name_r','$lastname_r','$username_r','$email_r','$password_r')";
        $conn->exec($sql_insertRegister_info);
        $conn = null;


}
function LookMumImAnArtist($username_id) {
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = 'music';
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql_insertRegister_info = "UPDATE `user` SET `is_artist` = '1' WHERE `user`.`id` = '$username_id';";
    $conn->exec($sql_insertRegister_info);
    $conn = null;


}





// FUNCIONES
function validate_name($name){
    if(empty($name)){
        return 1;
    }
    elseif(preg_match('/^[a-zA-Z ]*$/', $name)){
        return 0;
    }
    else{
        return 2;
    }
}

function validate_surname($surname){
    if(empty($surname)){
        return 1;
    }elseif(preg_match('/^[a-zA-Z ]*$/',$surname)){
        return 0;
    }else{
        return 2;
    }
}

function validate_email($Email){
    if(empty($Email)){
        return 1;
    }elseif(filter_var($Email, FILTER_VALIDATE_EMAIL)){
        return 0;
    }else{
        return 2;
      
    }
}

function hash_my_thing($hashedPassword){
    $hashedPassword=sha1($hashedPassword);
    return $hashedPassword;
}
    