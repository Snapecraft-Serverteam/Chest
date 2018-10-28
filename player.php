<?php
include PlayerCorrect.php;
$found = false;
if(isset($_GET['p'])) {
    if(isAv($_GET['p'])) {
        $found = true;
        $name = $_GET['p'];
    }
}


?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/searchbar.css">
        <link rel="stylesheet" href="css/alert.css">
        <title>Chest</title>
        
        
    </head>
    <body>
        <aside>
            <figure>
                <div id="avatar"></div>
                <figcaption>Chest</figcaption>
                </figure>
                <img id="menuburger" src="images/menu.svg">
                <nav>
                    <ul>
                        <li><a href="index.html" class="current-link">Database</a></li>
                        <li><a href="client.html">Client</a></li>
                        <li><a href="#">Changelog</a></li>
                        <li><a href="#">Bugs</a></li>
                    </ul>
                    
        
                </nav>
               
        </aside>
        <main>
            <?php if(!$found) {?>
            <div id="alertbox" class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    Der angegebene Spieler kann nicht gefunden werden
            </div>
            <?php } ?>
            <div id="searchdiv">
                <svg xmlns="http://www.w3.org/2000/svg" style="display:none">
                    <symbol xmlns="http://www.w3.org/2000/svg" id="sbx-icon-search-8" viewBox="0 0 40 40">
                      <path d="M16 32c8.835 0 16-7.165 16-16 0-8.837-7.165-16-16-16C7.162 0 0 7.163 0 16c0 8.835 7.163 16 16 16zm0-5.76c5.654 0 10.24-4.586 10.24-10.24 0-5.656-4.586-10.24-10.24-10.24-5.656 0-10.24 4.584-10.24 10.24 0 5.654 4.584 10.24 10.24 10.24zM28.156 32.8c-1.282-1.282-1.278-3.363.002-4.643 1.282-1.284 3.365-1.28 4.642-.003l6.238 6.238c1.282 1.282 1.278 3.363-.002 4.643-1.283 1.283-3.366 1.28-4.643.002l-6.238-6.238z"
                      fill-rule="evenodd" />
                    </symbol>
                    <symbol xmlns="http://www.w3.org/2000/svg" id="sbx-icon-clear-1" viewBox="0 0 20 20">
                      <path d="M9.408 10L.296.888 0 .592.592 0l.296.296L10 9.408 19.112.296 19.408 0 20 .592l-.296.296L10.592 10l9.112 9.112.296.296-.592.592-.296-.296L10 10.592.888 19.704.592 20 0 19.408l.296-.296L9.408 10z" fill-rule="evenodd" />
                    </symbol>
                  </svg>
                  
                  
            </div>
            <?php if($found) {?>
            <h1>Spieler: <?php echo $name; ?></h1>
            <h3>Bedwars:</h3>
            <iframe style="border: none; width: 100%; height: auto;" src="bw.php?p=<?php echo $name;?>"></iframe>
            <p class="bottom">Dieses Tool wurde von Snapecraft entwickelt und kann auf <a href="https://github.com/MayusYT/Chest">GitHub</a> heruntergeladen werden</p>
        
        <script>
        
            

            (function() {
                var menu = document.querySelector('ul'),
                    menulink = document.querySelector('img');
                
                menulink.addEventListener('click', function(e) {
                    menu.classList.toggle('active');
                    e.preventDefault();
                })
            })();
            
        </script>
        
    </body>
</html>