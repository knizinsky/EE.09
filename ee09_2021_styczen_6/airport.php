<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link href="styl6.css" rel="stylesheet">
    <title>Odloty samolotów</title>
</head>
<body>
    <div id="baner1">
        <h2>Odloty z lotniska</h2>
    </div>

    <div id="baner2">
        <img src="zad6.png" alt="logotyp">
    </div>

    <div id="glowny">
        <h4>Tabela odlotow</h4>

        <table>
            <tr>
                <th>lp</th><th>numer rejsu</th><th>czas</th><th>kieruek</th><th>status</th>
            </tr>
            
                <?php

                $conn = mysqli_connect('localhost','root','','egzamin') or die("Blad polaczenia!");

                $sql = "SELECT odloty.id, odloty.nr_rejsu, odloty.czas, odloty.kierunek, odloty.status_lotu from odloty order by czas desc";

                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($result))
                {
                    echo '<tr>'.'<td>'.$row['id']."</td>".'<td>'.$row['nr_rejsu']."</td>".'<td>'.$row['czas']."</td>".'<td>'.$row['kierunek']."</td>".'<td>'.$row['status_lotu']."</td>".'</tr>';
                }

                ?>
            
        </table>


    </div>

    <div id="stopka1">
        <a href="zad6.png" target="_blank">Pobierz obraz</a>
    </div>

    <div id="stopka2"></div>

        <?php
            setcookie("cookie", '1', time()+60*60);

            if(isset($_COOKIE['cookie']))
            {
                echo "Witaj ponowinie";
            }
            else
            {
                echo "Witaj po raz pierwszy";
            }
        ?>
        
    <div id="stopka3">
        <p>Autor: 123123123132</p>
    </div>
</body>
</html>