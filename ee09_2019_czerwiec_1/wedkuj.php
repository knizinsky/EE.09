<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="styl_1.css">
<title>Wędkujemy</title>
</head>

<body>

    <div id="baner">
        <h1>Portal dla wędkarzy</h1>
    </div>
    
    <div id="lewy">
        <h2>Ryby drapieżne naszych wód</h2>
        
        <ul>
            
            <?php
            
                $connect = mysqli_connect('localhost','root','','wedkowanie') or die("Błąd połączenia!");
            
                $sql = "SELECT nazwa, wystepowanie FROM ryby";
                
                $kwerenda = mysqli_query($connect,$sql) or die("Błąd kwerendy");;
                
                while($row = mysqli_fetch_assoc($kwerenda))
                {
                   echo '<li>'.$row['nazwa'].', występowanie: '.$row['wystepowanie'].'<br>'.'</li>';
                }
                
                mysqli_close($connect);
            
            ?>
            
        </ul>
    </div>
    
    <div id="prawy">
    <img src="ryba_1.jpg" alt="Sum"><br>
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </div>
    
    <div id="stopka">
        <p>Stronę wykonał: 123123123123</p>
    </div>
    
</body>
</html>