<?php 
require_once("util/db_manager.php");
require_once("main.php");
if(isset($_GET["lastValue"]) ){
    $lastValue=$_GET["lastValue"];
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $newdata = $pdo->query("SELECT * from user WHERE username LIKE '$lastValue%' && is_artist=1 ORDER BY user.id DESC")->fetchAll();



   
    foreach($newdata as $row2){
        echo$lastValue;
        echo"
        <div class='w3-container w3-card w3-round w3-margin TEXTO w3-animate-bottom'><br>
            <img src='".$row2["username_img_url"]."' alt='Avatar' class='w3-left w3-circle w3-margin-right hvr-rotate' style='width:60px;height:75px;'><br><br>
            <span class='w3-right w3-opacity'>
            <form action=''method='post'>
            <input type='hidden'  name='artist_name' value='".$row2["username"]."'>
            <input type='hidden'  name='artist_id' value='".$row2["id"]."'>
            <input type='hidden'  name='artist_img' value='".$row2["username_img_url"]."'>
            <button class='btn w3-button w3-left' type='submit' name='artist'>
            <span class='glyphicon glyphicon-log-out'></span> Check Channel
            </button>
            </form>
            </span>
            <h4 style='color:".$row2["username_color"]."'>
                ".$row2["username"]." 
            </h4>
            
            <hr class='w3-clear'>
            <p>
              
            </p>
        </div>
        ";

    
}
}




?>