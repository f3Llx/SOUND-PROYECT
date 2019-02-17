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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>


    <?php
require_once("main.php");
$newmusicdata=($_SESSION["musicData"]);
$newmusicdata1=($_SESSION["musicData1"]);
$newmusicdata2=0;



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
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="about.php">About</a></li>
                        <li "><a href="music.php">Music!</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li class="active"><a href="artist.php">Artist</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <a class="w3-right w3-button" onclick="abretesesamo2()">
                            <?php echo $_SESSION["username"];?>
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

        <div class="container text-center">
            <div class="row">
                <div class="col-sm-3 well">
                    <div class="well">
                        <p><a href="#">My Profile</a></p>
                        <img src="<?php echo $_SESSION["artist_img"];?>" class="img-circle" height="65" width="65" alt="Avatar">
                    </div>
                    <div class="well">
                        <p><a href="#">Interests</a></p>
                        
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
                                <img src="<?php echo $_SESSION["artist_img"];?>" class="img-circle" height="55" width="55" alt="Avatar">
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                    
                        <div class="col-sm-12">
                        
                        <?php
                        foreach($newmusicdata1 as $row3){?> 
                            <div class="panel panel-default text-left"style="background-color:black;border-color:black;">
                                <div class="panel-body" style="background-color:black;border-color:black;">
                                    
                                   <div class="player">
                                       
                                <audio class="player__audio viewer">
                                        <source src="<?=$row3['music']?>" type="audio/mpeg" data-trackid="1">
                                                            Your browser does not support the audio element.</audio>
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
                        </div>
                    </div>


                </div>

            </div>
        </div>

        <footer class="container-fluid text-center">
            <p>Footer Text</p>
        </footer>

    </body>





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

    </script>


    </html>
