<?php

// conexión con base de datos
require_once("util/functions.php");  
require_once("util/db_manager.php");

//get messages XD  

$modalScript7 = "<script>
  $( document ).ready(function() {
      $('#login_failed').modal({show:true});
  });
  </script>
  <!-- Modal failure! -->
    <div id='login_failed' class='modal fade' role='dialog' data-backdrop='static'>
    <div class='modal-dialog'>
  
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' type='button' >&times;</button>
        </div>
        <div class='modal-body'>
        <h4>Something went wrong
              <center>
              <section class='c-container'> 
    <div class='o-circle c-container__circle o-circle__sign--failure'>
      <div class='o-circle__sign'></div>  
    </div>   
    
  </section>   
          <h5>__$$%% A C C E S S DENIED!__$$%%</h5>
              <h5>maybe its your password!</h5>
              <h5>or your username...</h5>
              </center>
       </div>
        <div class='modal-footer'>
        <button type='button' class='btn btn-default  pull-right' data-dismiss='modal'>Close</button>
        </div>
      </div>
    </div>
  </div>
    <!-- Modal end -->";
  


$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$data = $pdo->query("SELECT * from user where is_artist=1 ORDER BY user.id DESC LIMIT 10")->fetchAll();


$name_err = $surname_err = $email_err = "";


if (isset($_POST['register'])) {
    
    $errorCount = 0;
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $username_log=($_POST['Username']);
    $sqlgenial   = "SELECT COUNT(*) AS LOG FROM user WHERE username='$username_log'";
    $querygenial  = $conn->query($sqlgenial);
    $countqgenial = $querygenial->fetch();
    $querygenial->closeCursor();
    require_once("utilities/errorConditions.php");  
   
}
if (isset($_POST['Log_me_in'])) {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $username_log = $_POST['username_log'];
    $password_log = hash_my_thing(($_POST['password_log']));
    $sqlgenial   = "SELECT COUNT(*) AS LOG FROM user WHERE username='$username_log' && password='$password_log';";
    $querygenial  = $conn->query($sqlgenial);
    $countqgenial = $querygenial->fetch();
    $querygenial->closeCursor();
    if($countqgenial['LOG']==1) {
    $_SESSION["username"] =$username_log ;
    // CURRENT USER FINDER
    $This_user_ID=$_SESSION["username"];
    $iduser_find = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $user_id = $iduser_find->query("SELECT id FROM `user` WHERE `username`='$This_user_ID';")->fetch(Pdo::FETCH_COLUMN);
    $user_img = $iduser_find->query("SELECT username_img_url FROM `user` WHERE `username`='$This_user_ID';")->fetch(Pdo::FETCH_COLUMN);
    $user_banner = $iduser_find->query("SELECT banner_img_url FROM `user` WHERE `username`='$This_user_ID';")->fetch(Pdo::FETCH_COLUMN);
    $user_color = $iduser_find->query("SELECT username_color FROM `user` WHERE `username`='$This_user_ID';")->fetch(Pdo::FETCH_COLUMN);
    $_SESSION["current_user_img"] =$user_img;
    $_SESSION["current_user_banner"] =$user_banner;
    $_SESSION["current_user_id"] =$user_id;
    $_SESSION["current_user_color"] =$user_color;

    header('Location: music.php');
    } else {
        echo $modalScript7;
    }


}
if (isset($_POST['upload'])) {
  $modal= "

  <div id='modal1' class='modal fade' role='dialog' data-backdrop='static'>
    <div class='modal-dialog'>
  
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' type='button' >&times;</button>
        </div>
        <div class='modal-body'>
        <h4>There are some errors...</h4>
            <h5>You might want to check:</h5>
            <section class='c-container'> 
    <div class='o-circle c-container__circle o-circle__sign--failure'>
      <div class='o-circle__sign'></div>  
    </div>   
  </section>        
                   <h6 class='text-center'> $name_err </h6>
                   <h6 class='text-center'> $surname_err  </h6>
                   <h6 class='text-center'>$username_err </h6>
                   <h6 class='text-center'> $email_err </h6>
       </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-toggle='modal' data-target='#register' data-dismiss='modal' >Try again</button>
        </div>
      </div>
    </div>
  </div>";
  
    $emptycheck =0;
    if (empty($_POST["tittle"])) {
        $tittle_err = "tittle is required";
        $emptycheck =$emptycheck +1;
      } 
    if (empty($_POST["cover"])) {
        $Cover_err = "Cover is required";
        $emptycheck =$emptycheck +1;
      } 
    if($emptycheck==0){
        $cover=$_POST['cover'];
        $tittle=$_POST['tittle'];
        $userid=$_SESSION["current_user_id"];
        $artist=$_SESSION["username"];
        $Success=1;
        
    }
   echo $tittle_err;
   echo $Cover_err;
    
    
    
    
    $target_dir = "music/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    
    $songFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 3000000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($songFileType != "mp3" ) {
        echo "Sorry, only .mp3 files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)&&$uploadOk==1&&$Success==1) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $filepath=$_FILES["fileToUpload"]["name"];
            $music= "music/$filepath";
            LookMumImAnArtist($userid);
            insertSong($userid, $music, $artist, $tittle, $cover);
            
            
            
            
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


}




if (isset($_POST['Log_me_out'])) {
    header('Location: index.php');
    // remove all session variables
    session_unset(); 
    
    // destroy the session 
    session_destroy(); 


}
if (isset($_POST['settings'])) {
    header('Location: user_settings.php');
    



}



if (isset($_POST['write_section'])) {
    header('Location: registered.php');




}


if (isset($_POST['artist'])) {
    unset($_SESSION['this_artist']);
    unset($_SESSION['this_artistid']);
    unset($_SESSION['artist_img']);
    unset($_SESSION['artist_banner']);
    unset($_SESSION['artist_color']);
    
    
    
    $_SESSION["artist_img"] =$_POST["artist_img"];
    $_SESSION["this_artist"] =$_POST["artist_name"];
    $_SESSION["this_artistid"] =$_POST["artist_id"];
    $_SESSION["artist_banner"] =$_POST["artist_banner"];
    $_SESSION["artist_color"] =$_POST["artist_color"];
    $artist_id= $_POST["artist_id"];
    
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $musicData = $pdo->query("SELECT music_songs.music,music_songs.tittle,music_songs.id,user.username_color,user.username_img_url,music_songs.artist,music_songs.cover FROM music_songs INNER JOIN user ON music_songs.userid = user.id WHERE user.id =    $artist_id ")->fetchAll();
    $musicData1 = $pdo->query("SELECT music_songs.music,music_songs.tittle,music_songs.id,user.username_color,user.username_img_url,music_songs.artist,music_songs.cover FROM music_songs INNER JOIN user ON music_songs.userid = user.id WHERE user.id =    $artist_id LIMIT 1")->fetchAll();
    $_SESSION["musicData"] =$musicData;
    $_SESSION["musicData1"] =$musicData1;

    header('Location: artist.php');

   

    
    // MUST BE AS AN ARTIST TO UPLOAD SHIT
    // ADD LIKES
    // ADD PROFILE VISITS
    // LMAO TO MUCH CRAP

  }
  if (isset($_POST['artist_settings'])) {
    unset($_SESSION['this_artist']);
    unset($_SESSION['this_artistid']);
    unset($_SESSION['artist_img']);
    
    
    
    $_SESSION["artist_img"] =$_POST["artist_img"];
    $_SESSION["this_artist"] =$_POST["artist_name"];
    $_SESSION["this_artistid"] =$_POST["artist_id"];
   
    $artist_id= $_POST["artist_id"];
    
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $musicData = $pdo->query("SELECT music_songs.music,music_songs.tittle,music_songs.id,user.username_color,user.username_img_url,music_songs.artist,music_songs.cover FROM music_songs INNER JOIN user ON music_songs.userid = user.id WHERE user.id =    $artist_id ")->fetchAll();
    $musicData1 = $pdo->query("SELECT music_songs.music,music_songs.tittle,music_songs.id,user.username_color,user.username_img_url,music_songs.artist,music_songs.cover FROM music_songs INNER JOIN user ON music_songs.userid = user.id WHERE user.id =    $artist_id LIMIT 1")->fetchAll();
    $_SESSION["musicData"] =$musicData;
    $_SESSION["musicData1"] =$musicData1;

    header('Location: user_settings.php');

   

    
    // MUST BE AS AN ARTIST TO UPLOAD SHIT
    // ADD LIKES
    // ADD PROFILE VISITS
    // LMAO TO MUCH CRAP

  }
  












       
        



     


?>
