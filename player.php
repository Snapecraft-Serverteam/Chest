<?php
include 'uuid.php';
include 'data.php';

$found = false;
if(isset($_GET['p'])) {
        $found = true;
        $name = $_GET['p'];
        $uuid = username_to_uuid($name);
        $data = getData($uuid);
}


?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/player.css">
        <link rel="stylesheet" href="css/searchbar.css">
        <link rel="stylesheet" href="css/alert.css">
        <title>Chest</title>
        
        
    </head>
    <body>
        <aside>
            <figure>
                <figcaption>
                    <div class="uname">
                        <?php echo $name;?>
                    </div>
                     <div class="tag">
                         <p>Premium</p>
                     </div>
                 </figcaption>

                 <div class="avatar">
                   <img src="https://crafatar.com/renders/body/<?php echo $uuid;?>?scale=6&overlay">
                 </div>
                
            </figure>
            
            <img id="menuburger" src="images/menu.svg">
            <nav>
                <ul>
                    <li><a href="index.html" class="current-link">Profil</a></li>
                    <li><a href="#">Minigames</a></li>
                    <li><a href="#">Modpacks</a></li>
                    <li><a href="#">Achievements</a></li>
                </ul>
                
    
            </nav>
               
        </aside>
        <main>

            <!-- Error -->
            <?php if(!$found) {?>
            <div id="alertbox" class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    Der angegebene Spieler kann nicht gefunden werden
            </div>
            <?php } ?>
            <!-- Error ENDE -->


            <header>

                <div class="titleName">
                    <?php echo $name;?>
                    <div class="titleTag">
                        <p>Premium</p>
                    </div>
                </div>
                <div class="status">
                    <div>Spieler ist Offline</div>
                </div>


            </header>








            <div class="world-box" style="-webkit-font-smoothing: subpixel-antialiased">
                <div class="world-box-titlebar">
                    <p class="world-box-titlebar-text"><b>Bedwars</b></p>
                </div>
                <div class="world-box-body">
                    <p><b>Kills:</b> <?php echo $row[''] ?></p>
                    <p>Mitspieler: LordBuschos, Tallerik</p><br>
                    <p>Spielstunden: 71</p>
                </div>
            </div>
            <p class="bottom">Dieses Tool wurde von Snapecraft entwickelt und kann auf <a href="https://github.com/MayusYT/Chest">GitHub</a> heruntergeladen werden</p>
        </main>



        <script type="text/javascript" src="vanilla-tilt.js"></script>
        <script>
            VanillaTilt.init(document.querySelector(".world-box"), {
                max: 8,
                speed: 50
            });
            
        </script>
        
    </body>
</html>
