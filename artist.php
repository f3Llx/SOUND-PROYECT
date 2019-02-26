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
      <link type="text/css" rel="stylesheet" href="css/plyr.css" />
      <script type="text/javascript" src="js/main.js"></script>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   </head>
   <?php
      require_once("main.php");
      $newmusicdata=($_SESSION["musicData"]);
      $newmusicdata1=($_SESSION["musicData1"]);
      $newmusicdata2=0;
      $newmusicdata3=-1;
      if(empty($_SESSION["username"])){
         header("Location: index.php");
     }
   
      
      
      ?>
   <body>
      <!-- INICIO NAV BAR -->
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
                  <a class=" w3-button w3-right" data-toggle="modal" data-target="#insertme">
                  Upload
                  </a>
               </ul>
            </div>
         </div>
      </nav>
      <!-- FIN NAV BAR  -->
      <!-- INICIO MINI.MENU PARA DESLOGEARSE Y SETTINGS  -->
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
      <!-- FIN MINIMENU -->
      <!-- COMIENZO MAQUETACION PERFIL -->
      <div class="container text-center">
         <div class="row">
            <div class="col-sm-3 well">
               <div class="well">
                  <p><?php echo $_SESSION["this_artist"];?></p>
                  <img src="<?php echo $_SESSION["artist_img"];?>" class="img-circle hvr-bounce-in" height="65" width="65" alt="Avatar">
               </div>
               <div class="well">
                  <p><a href="#">Interests</a></p>
                  <p>Here goes the biograph</p>
               </div>
               <p><a href="#">Link</a></p>
               <p><a href="#">Link</a></p>
               <p><a href="#">Link</a></p>
            </div>
            <div class="col-sm-7">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="well" style="background-image: url('img/jeje.png');background-size: cover;" >
                        <p style="font-size:45px;color:white">.:<?php echo $_SESSION["this_artist"];?>:.</p>
                        <img src="<?php echo $_SESSION["artist_img"];?>" class="img-circle hvr-bounce-in" height="55" width="55" alt="Avatar" id="user_img">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <!-- INICIO PANEL PRINCIPAL  -->
                     <?php
                        foreach($newmusicdata1 as $row3){?> 
                     <div class="panel panel-default text-left"style="background-color:black;border-color:black;">
                        <div class="panel-body" style="background-color:black;border-color:black;">
                           <div class="player">
                              <audio class="player__audio viewer">
                                 <source  src="<?=$row3['music']?>" type="audio/mpeg" data-trackid="1">
                                 Your browser does not support the audio element.
                              </audio>
                              <div class="song-panel">
                                 <div class="song-info">
                                    <div class="song-info__title"><?=$row3['tittle']?></div>
                                    <div class="song-info__artist"><?=$row3['artist']?></div>
                                    <div class="progress">
                                       <div class="progress__filled"></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="player-controls">
                                 <div class="spinner">
                                    <div class="spinner__disc" style="background-image: url(<?=$row3['cover']?>)">
                                       <div class="center__disc"></div>
                                    </div>
                                 </div>
                                 <?php } ?>
                                 <button class="backward buttonjeje"><i class="fas fa-backward fa-2x"></i></button>
                                 <button class="play buttonjeje">
                                 <i class="fas fa-play fa-3x"></i>
                                 <span class="pause left"></span>
                                 <span class="pause right"></span>
                                 </button>
                                 <button class="forward buttonjeje"><i class="fas fa-forward fa-2x"></i></button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- FIN PANEL PRINCIPAL  -->
                     <!-- MUSICA SECUNDARIO  -->
                     <div class="playlist">
                        <div class="well text-left ">
                           <h1 class="hvr-forward">All <?php echo $_SESSION["this_artist"];?>´s Songs :</h1>
                        </div>
                        <ul class='playlist--list text-left' style="width:100%;max-height:150px;overflow-y: auto;">
                           <?php
                              foreach($newmusicdata as $row2){?> 
                           <li  data-id="<?php $newmusicdata3=$newmusicdata3+1; echo$newmusicdata3;  ?>" data-audio="<?=$row2['music']?>">
                              <span class="hvr-forward"><img src="<?=$row2['cover']?>" height="55px" width="55px" class="w3-circle hvr-skew" style=" padding:0;"> <?=$row2['tittle']?></span>
                              <span class="glyphicon glyphicon-thumbs-up w3-right hvr-rotate">
                                 <p>20
                                 <p>
                              </span>
                           </li>
                           <?php } ?>
                           <div style="display: none;">
                              <svg xmlns="http://www.w3.org/2000/svg">
                                 <symbol id="plyr-captions-off" viewBox="0 0 18 18">
                                    <path d="M1 1c-.6 0-1 .4-1 1v11c0 .6.4 1 1 1h4.6l2.7 2.7c.2.2.4.3.7.3.3 0 .5-.1.7-.3l2.7-2.7H17c.6 0 1-.4 1-1V2c0-.6-.4-1-1-1H1zm4.52 10.15c1.99 0 3.01-1.32 3.28-2.41l-1.29-.39c-.19.66-.78 1.45-1.99 1.45-1.14 0-2.2-.83-2.2-2.34 0-1.61 1.12-2.37 2.18-2.37 1.23 0 1.78.75 1.95 1.43l1.3-.41C8.47 4.96 7.46 3.76 5.5 3.76c-1.9 0-3.61 1.44-3.61 3.7 0 2.26 1.65 3.69 3.63 3.69zm7.57 0c1.99 0 3.01-1.32 3.28-2.41l-1.29-.39c-.19.66-.78 1.45-1.99 1.45-1.14 0-2.2-.83-2.2-2.34 0-1.61 1.12-2.37 2.18-2.37 1.23 0 1.78.75 1.95 1.43l1.3-.41c-.28-1.15-1.29-2.35-3.25-2.35-1.9 0-3.61 1.44-3.61 3.7 0 2.26 1.65 3.69 3.63 3.69z" fill-rule="evenodd" fill-opacity=".5"/>
                                 </symbol>
                                 <symbol id="plyr-captions-on" viewBox="0 0 18 18">
                                    <path d="M1 1c-.6 0-1 .4-1 1v11c0 .6.4 1 1 1h4.6l2.7 2.7c.2.2.4.3.7.3.3 0 .5-.1.7-.3l2.7-2.7H17c.6 0 1-.4 1-1V2c0-.6-.4-1-1-1H1zm4.52 10.15c1.99 0 3.01-1.32 3.28-2.41l-1.29-.39c-.19.66-.78 1.45-1.99 1.45-1.14 0-2.2-.83-2.2-2.34 0-1.61 1.12-2.37 2.18-2.37 1.23 0 1.78.75 1.95 1.43l1.3-.41C8.47 4.96 7.46 3.76 5.5 3.76c-1.9 0-3.61 1.44-3.61 3.7 0 2.26 1.65 3.69 3.63 3.69zm7.57 0c1.99 0 3.01-1.32 3.28-2.41l-1.29-.39c-.19.66-.78 1.45-1.99 1.45-1.14 0-2.2-.83-2.2-2.34 0-1.61 1.12-2.37 2.18-2.37 1.23 0 1.78.75 1.95 1.43l1.3-.41c-.28-1.15-1.29-2.35-3.25-2.35-1.9 0-3.61 1.44-3.61 3.7 0 2.26 1.65 3.69 3.63 3.69z" fill-rule="evenodd"/>
                                 </symbol>
                                 <symbol id="plyr-enter-fullscreen" viewBox="0 0 18 18">
                                    <path d="M10 3h3.6l-4 4L11 8.4l4-4V8h2V1h-7zM7 9.6l-4 4V10H1v7h7v-2H4.4l4-4z"/>
                                 </symbol>
                                 <symbol id="plyr-exit-fullscreen" viewBox="0 0 18 18">
                                    <path d="M1 12h3.6l-4 4L2 17.4l4-4V17h2v-7H1zM16 .6l-4 4V1h-2v7h7V6h-3.6l4-4z"/>
                                 </symbol>
                                 <symbol id="plyr-fast-forward" viewBox="0 0 18 18">
                                    <path d="M7.875 7.171L0 1v16l7.875-6.171V17L18 9 7.875 1z"/>
                                 </symbol>
                                 <symbol id="plyr-muted" viewBox="0 0 18 18">
                                    <path d="M12.4 12.5l2.1-2.1 2.1 2.1 1.4-1.4L15.9 9 18 6.9l-1.4-1.4-2.1 2.1-2.1-2.1L11 6.9 13.1 9 11 11.1zM3.786 6.008H.714C.286 6.008 0 6.31 0 6.76v4.512c0 .452.286.752.714.752h3.072l4.071 3.858c.5.3 1.143 0 1.143-.602V2.752c0-.601-.643-.977-1.143-.601L3.786 6.008z"/>
                                 </symbol>
                                 <symbol id="plyr-pause" viewBox="0 0 18 18">
                                    <path d="M6 1H3c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h3c.6 0 1-.4 1-1V2c0-.6-.4-1-1-1zM12 1c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h3c.6 0 1-.4 1-1V2c0-.6-.4-1-1-1h-3z"/>
                                 </symbol>
                                 <symbol id="plyr-play" viewBox="0 0 18 18">
                                    <path d="M15.562 8.1L3.87.225C3.052-.337 2 .225 2 1.125v15.75c0 .9 1.052 1.462 1.87.9L15.563 9.9c.584-.45.584-1.35 0-1.8z"/>
                                 </symbol>
                                 <symbol id="plyr-restart" viewBox="0 0 18 18">
                                    <path d="M9.7 1.2l.7 6.4 2.1-2.1c1.9 1.9 1.9 5.1 0 7-.9 1-2.2 1.5-3.5 1.5-1.3 0-2.6-.5-3.5-1.5-1.9-1.9-1.9-5.1 0-7 .6-.6 1.4-1.1 2.3-1.3l-.6-1.9C6 2.6 4.9 3.2 4 4.1 1.3 6.8 1.3 11.2 4 14c1.3 1.3 3.1 2 4.9 2 1.9 0 3.6-.7 4.9-2 2.7-2.7 2.7-7.1 0-9.9L16 1.9l-6.3-.7z"/>
                                 </symbol>
                                 <symbol id="plyr-rewind" viewBox="0 0 18 18">
                                    <path d="M10.125 1L0 9l10.125 8v-6.171L18 17V1l-7.875 6.171z"/>
                                 </symbol>
                                 <symbol id="plyr-volume" viewBox="0 0 18 18">
                                    <path d="M15.6 3.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4C15.4 5.9 16 7.4 16 9c0 1.6-.6 3.1-1.8 4.3-.4.4-.4 1 0 1.4.2.2.5.3.7.3.3 0 .5-.1.7-.3C17.1 13.2 18 11.2 18 9s-.9-4.2-2.4-5.7z"/>
                                    <path d="M11.282 5.282a.909.909 0 0 0 0 1.316c.735.735.995 1.458.995 2.402 0 .936-.425 1.917-.995 2.487a.909.909 0 0 0 0 1.316c.145.145.636.262 1.018.156a.725.725 0 0 0 .298-.156C13.773 11.733 14.13 10.16 14.13 9c0-.17-.002-.34-.011-.51-.053-.992-.319-2.005-1.522-3.208a.909.909 0 0 0-1.316 0zM3.786 6.008H.714C.286 6.008 0 6.31 0 6.76v4.512c0 .452.286.752.714.752h3.072l4.071 3.858c.5.3 1.143 0 1.143-.602V2.752c0-.601-.643-.977-1.143-.601L3.786 6.008z"/>
                                 </symbol>
                              </svg>
                           </div>
                        </ul>
                     </div>
                     <div class="plyr">
                        <audio controls></audio>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <br>
      <br><br><br><br><br><br><br>
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
   <script src='http://cdn.plyr.io/1.6.13/plyr.js'></script>
   <script  src="js/index.js"></script>
   <script>
      /* TODO:
                                                                - ADD timer (currentTime and duration)
                                                              */
      
      const tracks = [
          
          
          <?php
         foreach($newmusicdata as $row2){?> 
                         {
              id: '<?php $newmusicdata2=$newmusicdata2+1; echo$newmusicdata2;  ?>',
              title: '<?=$row2['tittle']?>',
              artist: '<?=$row2['artist']?>',
              src: '<?=$row2['music']?>',
              cover: '<?=$row2['cover']?>'
          },    
                      
          <?php } ?>
          
          
          
          
      
      ];
      const player = document.querySelector('.player');
      const audio = player.querySelector('.player__audio');
      const audioSource = audio.querySelector('source');
      const songPanel = player.querySelector('.song-panel');
      const songTitle = player.querySelector('.song-info__title');
      const songArtist = player.querySelector('.song-info__artist');
      const backButton = player.querySelector('.backward');
      const playButton = player.querySelector('.play');
      const forwardButton = player.querySelector('.forward');
      const spinner = player.querySelector('.spinner');
      const spinnerDisc = player.querySelector('.spinner__disc');
      const progress = player.querySelector('.progress');
      const progressBar = player.querySelector('.progress__filled');
      
      let playing = false;
      let trackSwitch = false;
      
      const togglePlay = () => {
          // Play / pause the audio
          const method = audio.paused ? 'play' : 'pause';
          playing = audio.paused ? true : false;
          audio[method]();

      };
      
      const toggleSongPanel = () => {
      
          if (!trackSwitch) {
              // Scale the disc
              spinnerDisc.classList.toggle('scale');
      
              // Show / hide song panel
              songPanel.classList.toggle('playing');
      
              // Change button icon
              playButton.classList.toggle('playing');
          }
      };
      
      const startSpin = () => {
          // Start spinning the disc
          spinner.classList.add('spin');
      };
      
      const stopSpin = () => {
          // Stop spinning the disc
          const spin = document.querySelector('.spin');
          spin.addEventListener("animationiteration", () => {
              if (!playing) {
                  spin.style.animation = 'none';
                  spinner.classList.remove('spin');
                  spin.style.animation = '';
              }
          }, {
              once: true
          });
      };
      
      const handleProgress = () => {
          // Update the progress bar.
          const percent = (audio.currentTime / audio.duration) * 100;
          progressBar.style.flexBasis = `${percent}%`;
      
          // Skip to next track if at the end of the song.
          if (percent === 100) {
              trackSwitch = true;
              handleForwardButton();
          }
      };
      
      const handleBackButton = () => {
          if (audio.currentTime <= 3) {
              const currentTrackId = parseInt(audioSource.dataset.trackid);
              const previousTrackId = currentTrackId === 1 ? '10' : (currentTrackId - 1).toString();
              const previousTrack = tracks.find(o => o.id === previousTrackId);
              changeTrack(previousTrack);
          } else {
              audio.currentTime = 0;
          }
      };
      
      const handleForwardButton = () => {
          const currentTrackId = parseInt(audioSource.dataset.trackid);
          const nextTrackId = currentTrackId === 10 ? '1' : (currentTrackId + 1).toString();
          const nextTrack = tracks.find(o => o.id === nextTrackId);
          changeTrack(nextTrack);
      };
      
      const changeTrack = (track) => {
          if (playing) trackSwitch = true;
          audioSource.setAttribute('src', track.src);
          audioSource.dataset.trackid = track.id;
          
          songTitle.innerHTML = track.title;
          songArtist.innerHTML = track.artist;
          spinnerDisc.style.backgroundImage = `url(${track.cover})`;
          audio.load();
          if (playing) {
              audio.addEventListener('canplay', () => {
                  audio.play();
              }, {
                  once: true
              });
              audio.addEventListener('play', () => {
                  trackSwitch = false;
              }, {
                  once: true
              });
          }
      };
      
      function scrub(e) {
          const scrubTime = (e.offsetX / progress.offsetWidth) * audio.duration;
          audio.currentTime = scrubTime;
      }
      
      audio.addEventListener('play', startSpin);
      audio.addEventListener('play', toggleSongPanel);
      audio.addEventListener('pause', stopSpin)
      audio.addEventListener('pause', toggleSongPanel);
      audio.addEventListener('timeupdate', handleProgress);
      
      backButton.addEventListener('click', handleBackButton);
      playButton.addEventListener('click', togglePlay);
      forwardButton.addEventListener('click', handleForwardButton);
      
      let mousedown = false;
      progress.addEventListener('click', scrub);
      progress.addEventListener('mousemove', (e) => mousedown && scrub(e));
      progress.addEventListener('mousedown', () => mousedown = true);
      progress.addEventListener('mouseup', () => mousedown = false);
      
      function abretesesamo2() {
          var x = document.getElementById("user_settings");
          if (x.className.indexOf("w3-show") == -1) {
              x.className += " w3-show";
          } else {
              x.className = x.className.replace(" w3-show", "");
          }
      }
      var fft, // Allow us to analyze the song
      numBars = 1024, // The number of bars to use; power of 2 from 16 to 1024
      song; // The p5 sound object
      
      // Load our song
      var loader = document.querySelector(".loader");
      document.getElementById("audiofile").onchange = function(event) {
      if(event.target.files[0]) {
        if(typeof song != "undefined") { // Catch already playing songs
            song.disconnect();
            song.stop();
        }
        
        // Load our new song
        song = loadSound(URL.createObjectURL(event.target.files[0]));
        loader.classList.add("loading");
      }
      }
      
      
   </script>
</html>