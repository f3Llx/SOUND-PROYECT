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
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<script>
    // Create a new instance of an audio object and adjust some of its properties
   



    function initMp3Player() {
        audio.crossOrigin = "anonymous";
        document.getElementById('audio_box').appendChild(audio);
        context = new AudioContext(); // AudioContext object instance
        analyser = context.createAnalyser(); // AnalyserNode method
        canvas = document.getElementById('analyser_render');
        ctx = canvas.getContext('2d');
        // Re-route audio playback into the processing graph of the AudioContext
        source = context.createMediaElementSource(audio);
        source.connect(analyser);
        analyser.connect(context.destination);
        frameLooper();
    }
    // frameLooper() animates any style of graphics you wish to the audio frequency
    // Looping at the default frame rate that the browser provides(approx. 60 FPS)
    function frameLooper() {
        window.webkitRequestAnimationFrame(frameLooper);
        fbc_array = new Uint8Array(analyser.frequencyBinCount);
        analyser.getByteFrequencyData(fbc_array);
        
        ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear the canvas
        ctx.fillStyle = 'white'; // Color of the bars
        bars = 100;
        for (var i = 0; i < bars; i++) {
            bar_x = i * 3;
            bar_width = 2;
            bar_height = -(fbc_array[i] / 2);
            //  fillRect( x, y, width, height ) // Explanation of the parameters below
            ctx.fillRect(bar_x, canvas.height, bar_width, bar_height);
            
                
        }
    }
    
    var audio = new Audio();
    audio.src = 'song.mp3';
    audio.controls = false;
    audio.loop = true;
    // Establish all variables that your Analyser will use
    var canvas, ctx, source, context, analyser, fbc_array, bars, bar_x, bar_width, bar_height;
    // Initialize the MP3 player after the page loads all of its HTML into the window
    
    
    function playAudio() {
    console.log("dabn");
    audio.play();
    audio.crossOrigin = "anonymous";
        document.getElementById('audio_box').appendChild(audio);
        context = new AudioContext(); // AudioContext object instance
        analyser = context.createAnalyser(); // AnalyserNode method
        canvas = document.getElementById('analyser_render');
        ctx = canvas.getContext('2d');
        // Re-route audio playback into the processing graph of the AudioContext
        source = context.createMediaElementSource(audio);
        source.connect(analyser);
        analyser.connect(context.destination);
        frameLooper();

}

    
    




</script>


<?php
require_once("main.php");


?>


<body>
<audio id="my_audio">
<source src="song.mp3" type="audio/mpeg">
</audio>
<div id="audio_box"></div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     <img src="img/skulllogo.png" height="50px" width="50px" >
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a ><span class="glyphicon glyphicon-log-in" onclick="abretesesamo()"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<div id="demo" class=" w3-hide galaxybg2 posicion-magica">
        <form class="form" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <input id="emailInput" placeholder="Username" class="form-control form-control-sm" type="text" name="username_log" required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password_log" placeholder="Password">
            </div>
            <div class="form-group">
                <center>
                    <button class="btn draw-border" type="submit" name="Log_me_in">log_in</button>
                </center>
            </div>
            <div class="form-group text-center TEXTO">
                <small><a href="#" data-toggle="modal" data-target="#register">Dont have an account?</a></small>
            </div>
        </form>
    </div>
  
<div class="container-fluid text-center default_text">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>
    <div class="col-sm-8 text-center"> 
    <img src="img/skulllogo.png" height="200px" width="200px" id="dank" onclick="playAudio()" >
      <h1>Welcome</h1>
      <p>You just came across the best musicServer out there. make yourself an account and start now!</p>
      <hr>
      <h3>Test</h3>
      <p>Lorem ipsum...</p>
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
  </div>
</div>
<canvas id="analyser_render"></canvas>
<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>
   <!-- Modal de registro -->
   <div class="modal fade" id="register" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <img src="img/skulllogo.png" height="200px" width="200px">
                    </center>
                    <h4 class="modal-title usernameCSS2">REGISTER</h4>
                </div>
                <div class="modal-body">
                    <!-- FORMULARIO DE REGISTRO!  -->
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                        <div class="form-group">
                            <label >N a m e :</label>
                            <input style="font-family: Arial, Helvetica, sans-serif;" type="text" class="form-control" name="Name">
                        </div>
                        <div class="form-group">
                            <label >L a s t  n a m e</label>
                            <input style="font-family: Arial, Helvetica, sans-serif;" type="text" class="form-control" name="Surname">
                        </div>

                        <div class="form-group">
                            <label >U s e r n a m e :</label>
                            <input style="font-family: Arial, Helvetica, sans-serif;" type="text" class="form-control"name="Username" >
                        </div>
                        <div class="form-group">
                            <label >E m a i l /  a d d r e s s :</label>
                            <input style="font-family: Arial, Helvetica, sans-serif;" type="email" class="form-control"name="Email" >
                        </div>
                        <div class="form-group">
                            <label for="pwd">P a ss w o r d :</label>
                            <input style="font-family: Arial, Helvetica, sans-serif;" type="password" class="form-control"name="Password" >
                        </div>
                        <button class="btn draw-border" type="submit" name="register">Submit</button>
                        <button type="button" class="btn btn-default  pull-right" data-dismiss="modal">Close</button>
                    </form>
                    <!-- FIN FORMULARIO DE REGISTRO!  -->
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</body>

<script src="dist/swapdogs.min.js"></script>
<script>
    var sd = new SwapDogs(
        document.getElementById('sd-1'), {
            autoInit: true,
            words: ["|/ICCSTWEETS:", "|/WELCOME!", "|/ICCSTWEETS:", "|/WELCOME!"],
            letters: 'абвгдеёзжклмнопрст',
            interval: 4000,
            interval2: 50
        }
    );
    function abretesesamo() {
        var x = document.getElementById("demo");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }



</script>



</html>
