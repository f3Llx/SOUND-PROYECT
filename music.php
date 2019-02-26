<?php
// Start the session
session_start();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Icsitter</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link type="text/css" rel="stylesheet" href="css/main.css" />
        <link type="text/css" rel="stylesheet" href="css/hover.css" />
        
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>


    <?php
require_once("main.php");
if(empty($_SESSION["username"])){
    header("Location: index.php");
}



?>

    <body>

    <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                                <span class="icon-bar"></span>                        
                     </button>
                    <img src="img/skulllogo.png" height="50px" width="50px">
                </div>
                <div class="collapse navbar-collapse default_text" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="about.php">About</a></li>
                        <li class="active"><a  href="music.php">Music!</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    <img src="<?php echo $_SESSION["current_user_img"]; ?>" height="50px" width="50px" class="w3-circle w3-right">
                        
                        <a class=" w3-button w3-right" onclick="abretesesamo2()">
                        <span class="glyphicon glyphicon-th-list"></span> <?php echo $_SESSION["username"];?>
                        </a>
                        <a class=" w3-button w3-right" data-toggle="modal" data-target="#insertme"">
                            Upload
                        </a>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <div id="user_settings" class=" w3-hide galaxybg2 posicion-magica">

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <button class="btn w3-button w3-left" type="submit" name="Log_me_out">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </button><br>
                <button class="btn w3-button w3-left" type="submit" name="settings">
          <span class="glyphicon glyphicon-cog"></span> settings 
        </button>
            </form>
        </div>

        <div class="container-fluid text-center default_text">
            <div class="row content">
                <div class="col-sm-2 sidenav">
                    <p><a href="#">Link</a></p>
                    <p><a href="#">Link</a></p>
                    <p><a href="#">Link</a></p>
                </div>
                <div class="col-sm-8 text-left" style="max-height:650px;overflow-y:auto;">
                    <h1>Artists<div class="searchbar w3-right">
                    <input type="text" id="searchbar-input">
                        <i class="fa fa-search" id="searchbar-icon" aria-hidden="true"></i>
                            <i class="fa fa-times" id="searchbar-cross" aria-hidden="true"></i>
</div></h1>
                    <div id="Search_Response" >
                    <?php
                    foreach($data as $row){?>
                        <div class="w3-container w3-card w3-round w3-margin TEXTO w3-animate-bottom"><br>
                            <img src="<?=$row['username_img_url']?>" alt="Avatar" class="w3-left w3-circle w3-margin-right hvr-rotate" style="width:60px;height:75px;"><br><br>
                            <span class="w3-right w3-opacity">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden"  name="artist_name" value="<?=$row['username']?>">
                            <input type="hidden"  name="artist_id" value="<?=$row['id']?>">
                            <input type="hidden"  name="artist_img" value="<?=$row['username_img_url']?>">
                            <button class="btn w3-button w3-left" type="submit" name="artist">
                            <span class="glyphicon glyphicon-log-out"></span> Check Channel
                            </button>
                            </form>
                            </span>
                            <h4 style="color:<?=$row['username_color']?>;">
                                <?=$row['username']?> 
                            </h4>
                            
                            <hr class="w3-clear">
                            <p>
                              
                            </p>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-2 sidenav"  >
                    <div class="well">
                        <p>ADS</p>
                    </div>
                    <div class="well">
                        <p>ADS</p>
                    </div>
                </div>
            </div>
        </div>

        <footer class="container-fluid text-center">
            <p>Footer Text</p>
        </footer>





        <!-- Modal de insercion -->
   <div class="modal fade" id="insertme" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <img src="img/skulllogo.png" height="200px" width="200px">
                    </center>
                    <h4 class="modal-title usernameCSS2">Song Uploader!</h4>
                </div>
                <div class="modal-body">
                    <!-- FORMULARIO DE REGISTRO!  -->
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label >Tittle:</label>
                            <input placeholder="Give your song a cool Tittle" style="font-family: Arial, Helvetica, sans-serif;" type="text" class="form-control" name="tittle">
                        </div>
                        <div class="form-group">
                            <label >Cover:</label>
                            <input placeholder="Submit your img Url!" style="font-family: Arial, Helvetica, sans-serif;" type="text" class="form-control" name="cover">
                        </div>

                        <div class="form-group">
                            <label >SONG:</label>
                            <input type="file" name="fileToUpload" >
                        </div>
                        
                        <button class="btn draw-border" type="submit" name="upload">Submit</button>
                        <button type="button" class="btn btn-default  pull-right" data-dismiss="modal">Close</button>
                    </form>
                    <!-- FIN FORMULARIO DE REGISTRO!  -->

    </body>

    <script>
        function abretesesamo2() {
            var x = document.getElementById("user_settings");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
        $(document).ready(function(){
  
  $('#searchbar-icon').click(function(){
    $('#searchbar-input').animate({width: 'toggle'});
    $("#searchbar-icon").toggle();
    $("#searchbar-cross").toggle(500);
  });
  
  $('#searchbar-cross').click(function(){
    $('#searchbar-input').animate({width: 'toggle'});
    $("#searchbar-input").val("");
    $("#searchbar-cross").toggle();
    $("#searchbar-icon").toggle(500);
  });
  
});

var lastValue = '';
function search_it(){
    if ($("#searchbar-input").val() != lastValue) {
        lastValue = $("#searchbar-input").val();
        ajax_this();
     
    }
}
function ajax_this(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log("jejeje2");
            document.getElementById("Search_Response").innerHTML = this.responseText; 
        }
    };
    xhttp.open("POST", "ajax.php?lastValue="+lastValue, true);
    xhttp.send(); 
}

search_it(); 
setInterval(function(){
    search_it()
}, 1500);


    </script>


    </html>
