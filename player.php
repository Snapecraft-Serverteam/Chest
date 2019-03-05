<?php
include 'uuid.php';
include 'data.php';

$found = false;
if(isset($_GET['p'])) {
        $found = true;
        $name = $_GET['p'];
        $uuid = username_to_uuid($name);
        $data = getData($uuid);
        $tag = array();
        $tag["color"] = "";
        $tag["content"] = "";
        if($data['ban']['uuid'] != "") { // Banned
            $tag["color"] = "red";
            $tag["content"] = "Gebannt";
        } else {
             if($data["online"]["online"] == "true") {
                 $tag["color"] = "green";
                 $server = $data["online"]["server"];
                 $tag["content"] = "Spielt auf ".$server;
             } else {
                 $tag["color"] = "gray";
                 $tag["content"] = "Offline";
             }
        }

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
                     <div class="tag" style="background-color: <?php echo $tag["color"];?>;">
                         <p><?php echo $tag["content"];?></p>
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
<!--                background-color: #D4913A;-->
                <div class="titleName">
                    <?php echo $name;?>
                    <div class="titleTag" style="background-color: <?php echo $tag["color"];?>;">
                        <p><?php echo $tag["content"];?></p>
                    </div>
                </div>
                <div class="status">
                    <div>Spieler ist Offline</div>
                </div>


            </header>



            <!--Bedwars-->
            <?php
                $bw = $data["bw"];
            ?>
            <div class="world-box" id="bw" style="-webkit-font-smoothing: subpixel-antialiased">
                <div class="world-box-titlebar">
                    <p class="world-box-titlebar-text"><b>Bedwars</b></p>
                </div>
                <div class="world-box-body">
                    <p><b>Wins:</b> <?php echo $bw['wins'] ?></p>
                    <p><b>Betten zerstört:</b> <?php echo $bw['destroyedBeds'] ?></p>
                    <p><b>Loses:</b> <?php echo $bw['loses'] ?></p>
                    <p><b>Kills:</b> <?php echo $bw['kills'] ?></p>
                    <p><b>Deaths:</b> <?php echo $bw['deaths'] ?></p>
                    <p><b>Score:</b> <?php echo $bw['score'] ?></p>
                </div>
            </div>

            <!--Playtime-->
            <?php
            $playtime = $data["pt"];
            if(sizeof($playtime) != 0) {
            ?>
                <div class="world-box" id="bw" style="-webkit-font-smoothing: subpixel-antialiased">
                    <div class="world-box-titlebar">
                        <p class="world-box-titlebar-text"><b>Spielzeit</b></p>
                    </div>
                    <div class="world-box-body">
                        <?php
                        foreach($playtime as $server) {

                         echo "<p><b>".$server["name"].":</b> ".date("m", $server["playtime"] / 1000)." Minuten</p>";

                        }
                        ?>
                    </div>
                </div>
            <?php } ?>


            <p class="bottom">Dieses Tool wurde von Snapecraft entwickelt und kann auf <a href="https://github.com/MayusYT/Chest">GitHub</a> heruntergeladen werden</p>
        </main>



        <script type="text/javascript" src="vanilla-tilt.js"></script>
        <script>
            VanillaTilt.init(document.querySelector("#bw"), {
                max: 8,
                speed: 50
            });
        </script>
        
    </body>
</html>
