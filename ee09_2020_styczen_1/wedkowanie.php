<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Klub wędkowania</title>
    <link href="styl2.css" rel="stylesheet">
</head>
<body>
    <div id="baner">
        <h2>Wędkuj z nami!</h2>
    </div>

    <div id="lewy">
        <img src="ryba2.jpg" alt="Szczupak">
    </div>

    <div id="prawy">
        <h3>Ryby spokojnego żeru (białe)</h3>

        <?php

            #skrypt 1
            $conn = mysqli_connect('localhost','root','','wedkowanie2');

            $sql = "select id, nazwa, wystepowanie from ryby where ryby.styl_zycia=2";

            $wynik = mysqli_query($conn, $sql);

            while($row=mysqli_fetch_assoc($wynik))
            {
                echo $row['id'].". ".$row['nazwa'].", występuje w: ".$row['wystepowanie']."<br>";
            }

            mysqli_close($conn);

        ?>
        <ol>
            <li><a href="https://wedkuje.pl/" target="_blank">Odwiedź także</a></li>
            <li><a href="http://www.pzw.org.pl/" target="_blank">Polski Związek Wędkarski</a></li>
        </ol>
    </div>

    <div id="stopka">
        <p>Stronę wykonał: 481972871498</p>
    </div>

    
</body>
</html>